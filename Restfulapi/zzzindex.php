<!DOCTYPE html>

  
<?php
require_once("DB.php");

$db = mysqli_connect('localhost','root','','registration');
//$db = new DB("127.0.0.1", "SocialNetwork", "root", "");

if ($_SERVER['REQUEST_METHOD'] == "GET") {
        echo json_encode($db->query("SELECT * FROM users"));
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {
        echo "POST";
} else {
        http_response_code(405);
}
?>

<!--//require_once 'DB.php';
//
//    $db = new DB('localhost','root','','registration');
//    
//    if($_SERVER['REQUEST_METHOD'] == "GET"){
//        echo json_encode(($db->query("SELECT * FROM users")));
//        http_response_code(200);
//    }else if ($_SERVER['REQUEST_METHOD'] == "POST"){
//             echo "POST";
//    }else{
//        http_response_code(405);
//}

?>-->

