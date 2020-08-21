<?php



//$info ="";
//$data ="";
//
//$db = mysqli_connect('localhost','root','','registration');
//$sql_query = "SELECT * FROM users";
//
//if(isset($_POST)){
//    $info ="Data is fetched successfully";
//    $data=$_POST;
//}else{
//    $info ="Data is not fetched successfully";
//    $data="No data found";
//}
//
//$result['data']=$data;
//$result['info']=$info;
//echo json_encode([$result]);

$con= mysqli_connect('localhost','root','','registration');
$response = array();

if($con){
    $sql = "SELECT * FROM users";
    $result = mysqli_query($con, $sql);
    if($result){
        $i=0;
        while($row = mysqli_fetch_assoc($result)){
            $response[$i]['id'] = $row['id'];
            $response[$i]['username'] = $row['username'];
            $response[$i]['email'] = $row['email'];
            $response[$i]['password'] = $row['password'];
            $i++;
        }
        echo json_encode($response,JSON_PRETTY_PRINT);
    }
}
else{
    echo "Database connection failed.";
}
?>
