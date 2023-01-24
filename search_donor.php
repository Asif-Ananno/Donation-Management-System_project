<?php
session_start();
include('connection.php');
include('functions.php');

 $user_data = check_login($conn);


$search_donor=$_SESSION['$got_donor'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1> User Found!! User_name: <?php  echo"$search_donor" ?> </h1>
</body>
</html>