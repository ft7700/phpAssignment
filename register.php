<?php include('server.php'); 
require('user_validator.php');



$errors = [];

  $db = mysqli_connect('localhost','root','','registration');
  
  if(isset($_POST['register'])){
    // validate entries
    $validation = new user_validator($_POST);
    $errors = $validation->validateForm();

    $username = $db-> real_escape_string($_POST['username']);
    $email = $db-> real_escape_string($_POST['email']);
    $password = $db-> real_escape_string($_POST['password']);
    
    $sql_u = "SELECT * FROM users WHERE username='$username'";
    $sql_e = "SELECT * FROM users WHERE email='$email'";
    $res_u = mysqli_query($db, $sql_u) or die(mysqli_error($db));
    $res_e = mysqli_query($db, $sql_e) or die(mysqli_error($db));
          
    if (mysqli_num_rows($res_u) > 0){
        array_push($errors, "Sorry..Username already taken");
  	}
        if(mysqli_num_rows($res_e) > 0){
            array_push($errors, "Sorry..Email already taken"); 	  
        }
        
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