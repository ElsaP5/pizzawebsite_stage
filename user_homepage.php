<?php
include 'bdd_conect.php';
session_start();
if(!isset($_SESSION['user_name'])){
    header('location: Compte.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <title>Homepage</title>
</head>
<body>
    <h3>
        Hello welcome :  
        <?php echo $_SESSION['user_name'];
        echo $_SESSION['user_id']; ?>
    </h3>

<?php

        //add the order history and reservation confirmation
        // add the log out option 
        ?>
        
      
    <a href ="logout.php">Logut</a>
    <a href = "order.php">Get some Pizzas</a>
</body>
</html>
