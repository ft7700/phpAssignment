<?php

class singleton{
    public static $instance;
    
    public static function getInstance(){
        if(!isset(self::$instance)){
            echo 'instantiated';
            self::$instance = new singleton();
        }
        return self::$instance;
    }
}
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