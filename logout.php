<?php
include 'bdd_connect.php';
session_start();
session_unset(); 
session_destroy(); 

header('location:Compte.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <title>Logout</title>
</head>
<body>
    
</body>
</html>