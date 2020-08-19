<?php

class Database{
    
    public static $connection; 
    
    private function _construct(){
       echo "Connection created";
    }
    
    public static function Connect(){
        if(!isset(self::$connection)){
            self::$connection = new Database;
        }
        return self::$connection;
    }
    
    public static function Query($sql){
        mysql_query($sql);
    }
}
$DB = Database::Connect();
$DB2 = Database::Connect();
//class singleton{
//    private $_mysqli,
//            $_query,
//            $_results = array(),
//            $_count = 0;
//    
//    public static $instance;
//    
//    public static function getInstance(){
//        if(!isset(self::$instance)){
//            self::$instance = new singleton();
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
//        if($this->_query = $this->_mysqli->query($sql)){
//            while($row = $this->_query->fetch_object()){
//                $this->_results[] =$row;
//            }
//            $this->_count = $this->_query->num_rows;
//        }
//        return $this;
//    }
//}