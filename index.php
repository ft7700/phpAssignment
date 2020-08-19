<?php include('server.php');
 require('user_validator.php');
 
// require_once ('classes/singleton.php');
//
// $users = singleton::getInstance()->query('SELECT * from users');
//    if($users->count()){
//        foreach($users->results() as $user){
//            echo $user->username, '<br>';
//        }
//    }




    
    if(empty($_SESSION['username'])){
        header('location: login.php');
    }
    
    
?>
<html>
    <head>
        <title>User Registration system</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="header">
            <h2>Home Page</h2>
        </div>
        
        <div class="content">
            <?php if(isset($_SESSION['success'])): ?>
            <div class="error success">
                <h3>
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
            <?php endif ?>
            
            <?php if(isset($_SESSION['username'])): ?>
            <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
            <p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
            <?php endif ?>
        </div>
        
    </body>
</html>