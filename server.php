<?php

 
 
    
session_start();
$username = "";
$email = "";
$errors = array();


$db = mysqli_connect('localhost','root','','registration');
        
    if(isset($_POST['register'])){
 
          $username = $db-> real_escape_string($_POST['username']);
          $email = $db-> real_escape_string($_POST['email']);
          $password = $db-> real_escape_string($_POST['password']);
          $password_2 = $db-> real_escape_string($_POST['password_2']);
          
          $sql_u = "SELECT * FROM users WHERE username='$username'";
          $sql_e = "SELECT * FROM users WHERE email='$email'";
          $res_u = mysqli_query($db, $sql_u) or die(mysqli_error($db));
          $res_e = mysqli_query($db, $sql_e) or die(mysqli_error($db));
          
    
         
          
//    $uppercase = preg_match('@[A-Z]@', $password);
//    $lowercase = preg_match('@[a-z]@', $password);
//    $number    = preg_match('@[0-9]@', $password);
//    $specialChars = preg_match('@[^\w]@', $password);
    

//    if(empty($username)){
//        array_push($errors, "Username is required");
//    }
//    else if(!preg_match('/^[a-zA-Z0-9]{5,}$/', $username)) { 
//    array_push($errors, "Username should be at least 5 characters in length and should include only alphanumeric character.");
//    }
//    else if(mysqli_num_rows($res_u) > 0){
//         array_push($errors, "Sorry..Username already taken");
//    }
//   
//    
//    
//    if(empty($email)){
//        array_push($errors, "Email is required");
//    }else if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
//      if(mysqli_num_rows($res_e) > 0){
//         array_push($errors, "Sorry..Email already taken");
//    }
//   }else{
//      array_push($errors, "Email is invalid");
//   }
//   
    

//    if(empty($password)){
//        array_push($errors, "Password is required");
//        
//    }else if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
//    array_push($errors, "Password should be at least 8 characters in length and should include at least 1 upper case letter,1 number and 1 special character.");
//    }

    
//    if($password != $password_2){
//        array_push($errors, "The two passwords do not match");
//    }
//   
//   if(count($errors) == 0){
//       $password = md5($password);
//      $sql = "INSERT INTO users (username,email,password) VALUES ('$username','$email','$password')";     
//      mysqli_query($db, $sql);
//      
//       
//    }
}

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
?>
