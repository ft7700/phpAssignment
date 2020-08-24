<!--
  *index webpage
  *@author Francis Tan Eng Yee
*-->
<?php include('server.php');
    
    $id = 0;
    $username ="";
    $email ="";
    
    require_once ('../controller/DBConn.php');
    $db = DBConn::getInstance();
   
    if(empty($_SESSION['username'])){
        header('location: login.php');
    }
    
    
    $mysqli = $db->getConnection(); 
    $sql_query = "SELECT * FROM users";
    $result = $mysqli->query($sql_query); 
         
?>

 <?php while ($row = mysqli_fetch_array($result))if($_SESSION['username'] == 'admin123'){ { 
     ?>
		<tr>
                    
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
                        
		</tr>
                <br>
                
                
                        
 <?php }} ?>
                

<html>
    <head>
        <title>999 Mobile phone & Accessories system</title>
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
            <p style="text-align: center">Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
            <p><a href="item.php? style="color: darkblue;">Next</a></p>
            <p><a href="edit.php?" style="color: darkblue;">Edit</a></p>
            <p><a href="../xml,xslt,xpath/showList.php?" style="color: darkblue;">Show XML</a></p>
            <p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
            
            <?php endif ?>
        </div>
        
    </body>
</html>