<?php
class MarufDB {
  private $host;
  private $dbName;
  private $dbUser;
  private $dbPassword;
  private $pdo;

  public function __construct() {
    $this->host = $_ENV['DB_HOST'];
    $this->dbName = $_ENV['DB_NAME'];
    $this->dbUser = $_ENV['DB_USERNAME'];
    $this->dbPassword = $_ENV['DB_PASSWORD'];
    $this->Connect();
  }

  private function Connect() {
    try {
      $this->pdo = new PDO('mysql:host='.$this->host.';dbname='.$this->dbName, $this->dbUser, $this->dbPassword);
    } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
  }

  public function getUserId($token) {
    $query = $this->pdo->prepare("SELECT * FROM ActiveTokens WHERE token = ?");
    $query->execute(array($token));
    if ($query->rowCount() < 1) {
      return -1;
    } else {
      return $query->fetch()['user_id'];
    }
  }

  public function getUser($token) {
    $user_id = $this->getUserId($token);
    if ($user_id == -1) {
      return "";
    } else {
      $query = $this->pdo->prepare("SELECT * FROM Users WHERE id = ?");
      $query->execute(array($user_id));
      return $query->fetch();
    }
  }

  public function getUsername($token) {
    $user_id = $this->getUserId($token);
    if ($user_id == -1) {
      return "";
    } else {
      $query = $this->pdo->prepare("SELECT username FROM Users WHERE id = ?");
      $query->execute(array($user_id));
      return $query->fetch()['username'];
    }
  }

  public function checkLogin($username, $password) {
    try {
      $query = $this->pdo->prepare("SELECT * FROM Users WHERE username = ? AND password = ?");
      $query->execute(array($username, md5($password)));
      if ($query->rowCount() > 0) {
        return $query->fetch()['id'];
      } else {
        return -1;
      }
    } catch (PDOException $e) {
      return -1;
    }
  }

  public function searchBook($title) {
    $query = $this->pdo->prepare("SELECT * FROM Books WHERE LOWER(title) LIKE LOWER(?)");
    $query->execute(array("%{$title}%"));
    return $query->fetchAll();
  }

  public function addToken($user_id, $token) {
    $query = $this->pdo->prepare("INSERT INTO ActiveTokens (user_id, token, login_timestamp) VALUES (?, ?, ?)");
    $query->execute(array($user_id, $token, time()));
    return 1;
  }

  public function checkToken($token) {
    $query = $this->pdo->prepare("SELECT login_timestamp FROM ActiveTokens WHERE token = ?");
    $query->execute(array($token));
    if ($query->rowCount() > 0) {
      $curTimestamp = time();
      if ($curTimestamp - $query->fetch()['login_timestamp'] < (int)$_ENV['COOKIE_EXPIRED_TIME']) {
        return 1;
      } else {
        return $this-> deleteToken($token);
      }
    } else {
      return 0;
    }
  }

  public function deleteToken($token) {
    $query = $this->pdo->prepare("DELETE FROM ActiveTokens WHERE token = ?");
    $query->execute(array($token));
    return 0;
  }

  public function validateUsername($username) {
    $query = $this->pdo->prepare("SELECT * FROM Users WHERE username = ?");
    $query->execute(array($username));
    if ($query->rowCount() > 0) {
      return 0;
    } else {
      return 1;
    }
  }

  public function validateEmail($email) {
    $query = $this->pdo->prepare("SELECT * FROM Users WHERE email = ?");
    $query->execute(array($email));
    if ($query->rowCount() > 0) {
      return 0;
    } else {
      return 1;
    }
  }

  public function orderBook($book_id, $user_id, $amount, $order_timestamp) {
    $query = $this->pdo->prepare("INSERT INTO Orders (user_id, book_id, amount, order_timestamp, is_review) VALUES (?, ?, ?, ?, 0)");
    $query->execute(array($user_id, $book_id, $amount, $order_timestamp));
    $query = $this->pdo->prepare("SELECT id FROM Orders WHERE book_id = ? AND user_id = ? ORDER BY id DESC LIMIT 1");
    $query->execute(array($book_id, $user_id));
    return $query->fetch()['id'];
  }

  public function addProfile($name, $username, $email, $password, $address, $phonenumber) {
    if ($this->validateUsername($username) == 1 && $this->validateEmail($email) == 1){
      $query = $this->pdo->prepare("INSERT INTO Users (name, username, email, password, address, phonenumber) VALUES (?, ?, ?, ?, ?, ?)");
      $query->execute(array($name, $username, $email, md5($password), $address, $phonenumber));
      return 1;
    } else {
      return 0;
    }
  }

  public function editProfile($name, $address, $phonenumber, $user_id) {
    try {
      $query = $this->pdo->prepare("UPDATE Users SET name = ?, address = ?, phonenumber = ? WHERE id = ?");
      $query->execute(array($name, $address, $phonenumber, $user_id));
      return 1;
    } catch (PDOException $e){
      return 0;
    }
  }

  public function getHistory($user_id) {
    $query = $this->pdo->prepare("SELECT Orders.id as order_id, Books.id as book_id, order_timestamp, is_review, title, amount  FROM Orders JOIN Books ON Orders.book_id = Books.id WHERE user_id = ? ORDER BY Orders.id DESC");
    $query->execute(array($user_id));
    return $query->fetchAll();
  }

  public function getBookIdByOrderId($order_id) {
    $query = $this->pdo->prepare("SELECT book_id FROM Orders WHERE id = ?");
    $query->execute(array($order_id));
    return $query->fetch()['book_id'];
  }

  public function getBookDetail($book_id) {
    $query = $this->pdo->prepare("SELECT * FROM Books WHERE id = ?");
    $query->execute(array($book_id));
    return $query->fetch();
  }

  public function addReview($user_id, $username, $book_id, $rating, $comment, $order_id) {
    try {
      $query = $this->pdo->prepare("INSERT INTO Reviews (username, book_id, rating, comment, user_id) VALUES (?, ?, ?, ?, ?)");
      $query->execute(array($username, $book_id, $rating, $comment, $user_id));
      $query = $this->pdo->prepare("SELECT * FROM Books WHERE id = ?");
      $query->execute(array($book_id));
      $result = $query->fetch();
      $currVote = $result['vote'] + 1;
      $currRating = ($result['rating'] * $result['vote'] + $rating) / $currVote;
      $query = $this->pdo->prepare("UPDATE Books SET rating = ?, vote = ? WHERE id = ?");
      $query->execute(array($currRating, $currVote, $book_id));
      $query = $this->pdo->prepare("UPDATE Orders SET is_review = 1 WHERE id = ?");
      $query->execute(array($order_id));
      return 1;
    } catch (PDOException $e) {
      return 0;
    }
  }

  public function getReviews($book_id) {
    $query = $this->pdo->prepare("SELECT * FROM Reviews WHERE book_id = ? ORDER BY id DESC");
    $query->execute(array($book_id));
    return $query->fetchAll();
  }
}
