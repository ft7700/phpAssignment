<?php include('server.php'); 

require_once 'DB.php';
?>

<!--<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        //<?php 
//    if ((!isset($_POST['name'])) || !isset($_POST['password'])) {
//        ?>
    <h1>Please Log In</h1>
    <p><h3>Please enter your username and password</h3></p>
    <p>
      <form method="post" action="index.php">
        <p><label for="name">Username:</label>
        <input type="text" name="name" id="name" size="15" /></p>
        <p><label for="password">Password:</label>
        <input type="password" name="password" id="password" size="15" value=""/></p>
        <button type="submit" name="login">Login</button>
    </form>
//<?php
//    } else {
//        $db = DB::getIntance();
//        $username = trim($_POST['name']);
//        $passwd = sha1(trim($_POST['password']));
//        
//        $authUser = $db->retrieveUser($username, $passwd);
//        

       
        
//        if($authUser == null){
//            echo "<p>Unauthorized user. </p>";
//            echo "<p><a href='register.php'>Click here to register as a new user</a></p>";
//        }
//        else {
//            echo "<p><h2>Welcome $authUser!</h2></p>";
//            echo "<p><a href='index.php'>Search Products</a></p>";
//        }
//        
//        $db->closeConnection();
//    }
//  ?>
    </body>
</html>-->

<html>
    <head>
        <title>999 Mobile phone & Accessories system</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="header">
            <h2>Login</h2>
        </div>
        
        <form method="post" action="login.php">
            <?php include ('errors.php'); ?> 
            <div class="input-group">   
                <label>Username</label>
                <input type="text" name="username">
            </div>
            <div class="input-group">   
                <label>Password</label>
                <input type="password" name="password">
            </div>
             <div class="input-group">   
                 <button type="submit" name="login" class="btn">Login</button>
            </div>
            <p>
                Not yet a member?<a href="register.php">Sign up</a>
            </p>
        </form>
    </body>
</html>