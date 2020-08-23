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

