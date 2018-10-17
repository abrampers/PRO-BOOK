<?php
class MarufDB {
  private $host;
  private $dbName;
  private $dbUser;
  private $dbPassword;
  private $pdo;

  public function __construct($host, $dbName, $dbUser, $dbPassword) {
    $this->host = $host;
    $this->dbName = $dbName;
    $this->dbUser = $dbUser;
    $this->dbPassword = $dbPassword;
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
      return $query->fetch()['id'];
    }
  }

  public function getUsername($token) {
    $user_id = $this->getUserId($token);
    if ($user_id == -1) {
      return "";
    } else {
      $query = $this->pdo->prepare("SELECT name FROM Users WHERE id = ?");
      $query->execute($array($user_id));
      return $query->fetch()['name'];
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
    $query = $this->pdo->prepare("SELECT * FROM Books WHERE title = ?");
    $query->execute(array("%{$title}%"));
    return $query->fetchAll();
  }

  public function addToken($user_id, $token) {
    $query = $this->pdo->prepare("INSERT INTO ActiveTokens (user_id, token, login_date) VALUES (?, ?, now())");
    $query->execute(array($user_id, $token));
    return 1;
  }

  public function checkToken($token) {
    $query = $this->pdo->prepare("SELECT login_date FROM ActiveTokens WHERE token = ?");
    $query->execute(array($token));
    if ($query->rowCount() > 0) {
      $curDate = date("Y-m-d");
      if (strtotime($curDate) - strtotime($query->fetch()['login_date']) < (24*60*60)) {
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

  public function orderBook($book_id, $user_id, $amount, $order_date) {
    $query = $this->pdo->prepare("INSERT INTO Orders (user_id, book_id, amount, order_date, is_review) VALUES (?, ?, ?, ?)");
    $query->execute(array($user_id, $book_id, $amount, $order_date));
    $query = $this->pdo->prepare("SELECT id FROM Orders WHERE book_id = ? AND user_id = ? ORDER BY id DESC LIMIT 1");
    $query->execute(array($book_id, $user_id));
    return $query->fetch()['id'];
  }

  public function addProfile($name, $username, $email, $password, $address, $phonenumber) {
    $query = $this->pdo->prepare("INSERT INTO Users (name, username, email, password, address, phonenumber) VALUES (?, ?, ?, ?, ?, ?)");
    $query->execute(array($name, $username, $email, md5($password), $address, $phonenumber));
    return 1;
  }

  public function showProfile($user_id) {
    $query = $this->pdo->prepare("SELECT * FROM Users WHERE id = ?");
    $query->execute(array($user_id));
    return $query->fetch();
  }

  public function editProfile($pathpp, $name, $address, $phonenumber, $user_id) {
    try {
      $query = $this->pdo->prepare("UPDATE Users SET pathpp = ?, name = ?, address = ?, phonenumber = ? WHERE id = ?");
      $query->execute(array($pathpp, $name, $address, $phonenumber, $user_id));
      return 1;
    } catch (PDOException $e){
      return 0;
    }
  }

  public function showHistory($user_id) {
    $query = $this->pdo->prepare("SELECT * FROM Orders JOIN Books ON Orders.book_id = Books.id WHERE user_id = ?");
    $query->execute($user_id);
    return $query->fetchAll();
  }

  public function showBookDetail($book_id){
    $query = $this->pdo->prepare("SELECT * FROM Books WHERE book_id = ?");
    $query->execute(array($book_id));
    return $query->fetch();
  }

  public function addReview($user_id, $book_id, $review, $comment){
    try {
      $query = $this->pdo->prepare("INSERT INTO Reviews (user_id, book_id, review, comment) VALUES (?, ?, ?, ?)");
      $query->execute(array($user_id, $book_id, $review, $comment));
      return 1;
    } catch (PDOException $e) {
      return 0;
    }
  }
}
