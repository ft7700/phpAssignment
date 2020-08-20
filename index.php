<?php include('server.php');
// require_once ('DBConn.php');
// 
// $users = DBConn::getInstance()->query('SELECT * FROM users');
// if($users->count()){
//     foreach($users->results() as $user){
//         echo $user->name, '<br>';
//     }
// }
 require_once ('DBConn.php');
 $db = DBConn::getInstance();
    $mysqli = $db->getConnection(); 
    $sql_query = "SELECT * FROM users";
    $result = $mysqli->query($sql_query);

    
         
 
// $users = 
//         DBConn::getInstance()->query('SELECT * FROM users');
//         DBConn::getInstance()->query('SELECT * FROM users');
//         DBConn::getInstance()->query('SELECT * FROM users');
         
// if($users->count()){
//     foreach($users->results() as $user){
//         echo $user->name, '<br>';
//     }
// }
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