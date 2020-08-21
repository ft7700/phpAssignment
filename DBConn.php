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
            
        }
        
        
    }
    // Magic method clone is empty to prevent duplication of connection
    private function __clone() { }
    // Get mysqli connection
    

//    public function retrieveUser($username, $passwd){
//        if(count($errors)== 0){
//        $password = md5($password);
//        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
//        $result = mysqli_query($db, $query);
//        if(mysqli_num_rows($result)== 1){
//            $_SESSION['username'] = $username;
//            $_SESSION['success'] = "You are now logged in";
//            header('location: index.php');
//        }else{
//            array_push($errors, "wrong username/password combination");
//        }
//    }
//    }
    
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