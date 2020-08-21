<?php

class DB{
    //put your code here
    private static $instance = null;
    private $db;
    
    private function __construct() {
        $host = 'localhost';
        $dbName = 'registration';
        $dbuser = 'root';
        $dbpassword = '';

        // set up DSN
        $dsn = "mysql:host=$host;dbname=$dbName";

        try {
            $this->db = new PDO($dsn, $dbuser, $dbpassword);
            echo "<p>Connection to database successful</p>";
        } catch (PDOException $ex) {
            echo "<p>ERROR: " . $ex->getMessage() . "</p>";
            exit;
        }
    }
    
    public static function getIntance(){
        if(self::$instance == null){
            self::$instance = new DB();
        }
        return self::$instance;
    }
    
    public function addUser($username, $passwd) {
          $query = "INSERT INTO users(username, passwd) VALUES (?, ?)";
          $stmt = $this->db->prepare($query);
          $stmt->bindParam(2, $username, PDO::PARAM_STR);
          $stmt->bindParam(4, $passwd, PDO::PARAM_STR);
          $stmt->execute();
    }
    
    public function searchProduct($searchterm){
        $query = "SELECT * FROM Products WHERE ProductName = ?";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $searchterm, PDO::PARAM_STR);
        $stmt->execute();
        
        $totalrows = $stmt->rowCount();
        if($totalrows == 0){
            return null;
        }
        else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
      
    }
    
    public function retrieveUser($username, $passwd){
        $query = "SELECT * FROM users WHERE username = ? AND passwd = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(2, $username, PDO::PARAM_STR);
        $stmt->bindParam(4, $passwd, PDO::PARAM_STR);
        $stmt->execute();
        
        $totalrows = $stmt->rowCount();
        if($totalrows == 0){
            return null;
        }
        else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $username;
        }
    }
    
    public function closeConnection(){
        $this->db = null;
    }
}
