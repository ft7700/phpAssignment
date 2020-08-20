<?php
 
/*
* Mysql database class - only one connection alowed
*/
class DBConn {  
    private $_connection;
    private static $_instance; //The single instance
    private $_host = "localhost";
    private $_username = "root";
    private $_password = "";
    private $_database = "registration";
    /*
    Get an instance of the Database
    @return Instance
    */
    //$db = mysqli_connect('localhost','root','','registration');
    
    public static function getInstance() {
        if(!self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    // Constructor
    private function __construct() {
        $this->_connection = new mysqli(
            $this->_host, 
            $this->_username, 
            $this->_password, 
            $this->_database
                
        );

        // Error handling
        if(mysqli_connect_error()) {
            trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(),
                 E_USER_ERROR);
            echo 'gay2';
        }
        
        echo 'gay';
    }
    // Magic method clone is empty to prevent duplication of connection
    private function __clone() { }
    // Get mysqli connection
    

    private function retrieveUser($username, $passwd){
        $query = "SELECT * FROM users WHERE username = ? AND password = ?";
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
    
    public function getConnection() {
        return $this->_connection;
    }
}
?>

<!--//class DBConn{
//    private $_mysqli,
//            $_query,
//            $_results = array(),
//            $_count = 0;
//    
//    public static $instance; 
//    
//    public static function getInstance(){
//        if(!isset(self::$instance)){
//            self::$instance = new DBConn();
//        }
//        return self::$instance;
//    }
//    
//    public function _construct(){
//       $this->_mysqli = new mysqli('localhost','root','','registration');
////        $this = mysqli_connect('localhost','root','','registration');
//        if($this->_mysqli->connect_error){
//            die($this->_mysqli->connect_error);
//        }
//    }
//    
//    public function query($sql){
//        if($this->_query === $this->_mysqli->query($sql)){
//            while($row = $this->_query->fetch_object()){
//                $this->_results[] =$row;
//            }
//            $this->_count = $this->_query->num_rows;
//        }
//        return $this;
//    }
//    
//    public function results(){
//        return $this->_results;
//    }
//    
//    public function count(){
//        return $this->_count;
//    }
//}

class DBConn{
    private $_mysqli,
            $_query,
            $_results = array(),
            $_count = 0;
    
    public static $instance;
    
    public static function getInstance(){
        if(!isset(self::$instance)){
            
            self::$instance = new DBConn();
            echo 'gay';
        }
        return self::$instance;
    }
    
    
    public function _construct(){
//       $this->_mysqli = new mysqli('localhost','root','','');

//        if($this->_mysqli->connect_error){
//            die($this->_mysqli->connect_error);
//        }
        echo 'connect to db';
    }
    
    public function query($sql){
//        if($this->_query === $this->_mysqli->query($sql)){
//            while($row = $this->_query->fetch_object()){
//                $this->_results[] =$row;
//            }
//            $this->_count = $this->_query->num_rows;
//        }
//        return $this;
        echo 'query';
    }
    
//    public function results(){
//        return $this->_results;
//    }
//    
//    public function count(){
//        return $this->_count;
//    }
    
    
}-->