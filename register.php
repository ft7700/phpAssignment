<?php include('server.php'); 

require('user_validator.php');

if(isset($_POST['register'])){
    // validate entries
    $validation = new user_validator($_POST);
    $errors = $validation->validateForm();

    $username = $db-> real_escape_string($_POST['username']);
    $email = $db-> real_escape_string($_POST['email']);
    $password = $db-> real_escape_string($_POST['password']);
    $password_2 = $db-> real_escape_string($_POST['password_2']);
    
    if(count($errors) == 0){
      $password = md5($password);
      $sql = "INSERT INTO users (username,email,password) VALUES ('$username','$email','$password')";     
      mysqli_query($db, $sql);
      }
    }
    
?>
<html>
    <head>
        <title>User Registration system</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="header">
            <h2>Register</h2>
        </div>
        
        <form method="post" action="register.php">
            <?php include ('errors.php'); ?> 
            <div class="input-group">   
                <label>Username</label>
                <input type="text" name="username" value="<?php echo $username; ?>">
            </div>
            <div class="input-group">   
                <label>Email</label>
                <input type="text" name="email" value="<?php echo $email; ?>">
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
                 <button type="submit" name="register" class="btn">Register</button>
            </div>
            <p>
                Already a member?<a href="login.php">Sign in</a>
            </p>
        </form>
    </body>
</html>