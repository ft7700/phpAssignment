

<?php
require('user_validator.php');
$errors = [];

if(isset($_POST['update']))
{
    $validation = new user_validator($_POST);
    $errors = $validation->validateForm();

   
   $db = mysqli_connect('localhost','root','','registration');
   

   
   
   $username = $db-> real_escape_string($_POST['username']);
   $email = $db-> real_escape_string($_POST['email']);
   $password = $db-> real_escape_string($_POST['password']);
   $password = md5($password);
 
   $update_row = ("UPDATE users SET username ='$username',email='$email',password='$password' WHERE username='$username'");



   
   $result = mysqli_query($db, $update_row);
   if(count($errors) == 0){
   if($result)
   {      
       echo 'Data Updated';
   }else{
       echo 'Data Not Updated';
   }
   }
}

?>

<!DOCTYPE html>

<html>

    <head>
        <title>999 Mobile phone & Accessories system</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="header">
            <h2>Edit Profile</h2>
        </div>

    <body>

        <form method="post" action="edit.php">
            <?php include ('errors.php'); ?> 
            <div class="input-group">   
                <label>Username</label>
                <input type="text" name="username">
            </div>
            <div class="input-group">   
                <label>New Email</label>
                <input type="email" name="email">
            </div>
            <div class="input-group">   
                <label>Password</label>
                <input type="password" name="password">
            </div>
            <div class="input-group">   
                <label>Confirm Password</label>
                <input type="password" name="password_2">
            </div>
             <div class="input-group">   
                 <button type="submit" name="update" class="btn">Update</button>
            </div>
            <p>
                Already a member?<a href="login.php">Sign in</a>
            </p>
        </form>
    </body>


</html>
