<?php

session_start();
$username = "";
$passwd = "";
$email = "";
$id = 0;
$update = false;
$errors = array();

$db = mysqli_connect('localhost','root','','registration');
         require_once ('DBConn.php');
         
    

     

    if(isset($_POST['login'])){
          $username = $db-> real_escape_string($_POST['username']);
          $password = $db-> real_escape_string($_POST['password']);
   
    if(empty($username)){
        array_push($errors, "Username is required");
    }
    if(empty($password)){
        array_push($errors, "Password is required");     
    }
    
    if(count($errors)== 0){
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($db, $query);
        if(mysqli_num_rows($result)== 1){
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
            
        }else{
            array_push($errors, "wrong username/password combination");
        }
    }
   }
   
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }
    
   
    if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM users WHERE id=$id");
        $_SESSION['success'] = "Record is deleted.";
	header('location: index.php');
}

    if (isset($_POST['save'])) {
		
                $username = $_POST['username'];
		$email = $_POST['email'];
		//mysqli_query($db, "INSERT INTO users (username,email) VALUES ('$username', '$email')"); 
                 $sql = "INSERT INTO users (username,email) VALUES ('$username','$email')";     
                mysqli_query($db, $sql);
		$_SESSION['message'] = "Address saved"; 
                
		header('location: index.php');
    }
    
        if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$username = $_POST['username'];
	$email = $_POST['email'];

	mysqli_query($db, "UPDATE info users username='$username', email='$email' WHERE id=$id");
	$_SESSION['message'] = "Address updated!"; 
	header('location: index.php');
        }
        
        
?>
