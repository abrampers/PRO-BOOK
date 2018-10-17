<?php
class DBConnection {
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

    public function check_login($username, $password) {
        $query = $this->pdo->prepare("SELECT * FROM Users WHERE username = ? AND password = ?");
        $query->execute(array($username, $password));
        return $query->rowCount();
    }

    public function search_book($title) {
        $query = $this->pdo->prepare("SELECT * FROM Books WHERE title = ?");
        $query->execute(array("%{$title}%"));
        return $query->fetchAll();
    }

    public function order_book($book_id, $user_id, $amount, $order_date) {
        $query = $this->pdo->prepare("INSERT INTO Orders (user_id, book_id, amount, order_date, is_review) VALUES (?, ?, ?, ?)");
        $query->execute(array($user_id, $book_id, $amount, $order_date));
        $query = $this->pdo->prepare("SELECT id FROM Orders WHERE book_id = ? AND user_id = ? ORDER BY id DESC LIMIT 1");
        $query->execute(array($book_id, $user_id));
        return $query->fetch()['id'];
    }

    public function show_profile($user_id) {
        $query = $this->pdo->prepare("SELECT * FROM Users WHERE id = ?");
        $query->execute(array($user_id));
        return $query->fetch();
    }

    public function edit_profile($pathpp, $name, $address, $phonenumber, $user_id) {
        try {
            $query = $this->pdo->prepare("UPDATE Users SET pathpp = ?, name = ?, address = ?, phonenumber = ? WHERE id = ?");
            $query->execute(array($pathpp, $name, $address, $phonenumber, $user_id));
            return 1;
        } catch (PDOException $e){
            return 0;
        }
    }

    public function show_history($user_id) {
        $query = $this->pdo->prepare("SELECT * FROM Orders JOIN Books ON Orders.book_id = Books.id WHERE user_id = ?");
        $query->execute($user_id);
        return $query->fetchAll();
    }

    public function show_book_detail($book_id){
        $query = $this->pdo->prepare("SELECT * FROM Books WHERE book_id = ?");
        $query->execute(array($book_id));
        return $query->fetch();
    }

    public function add_review($user_id, $book_id, $review, $comment){
        try {
            $query = $this->pdo->prepare("INSERT INTO Reviews (user_id, book_id, review, comment) VALUES (?, ?, ?, ?)");
            $query->execute(array($user_id, $book_id, $review, $comment));
            return 1;
        } catch (PDOException $e) {
            return 0;
        }
    }
}
