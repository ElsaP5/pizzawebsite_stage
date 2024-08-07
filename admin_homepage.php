<?php
include 'bdd_conect.php';
session_start();
if(!isset($_SESSION['admin_name'])){
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
    <title>Admin page </title>
</head>
<body>
<h1>Welcome : <?php echo" $_SESSION['admin_name']"; ?></h1>

<h2>What do you want to do ?</h2>

<a href ="logout.php">Logut</a>
<a href = "Reservation.php">Look at the reservations </a>

</body>
</html>