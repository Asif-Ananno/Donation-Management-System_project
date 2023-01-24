<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($conn);
if(isset($_POST["submit"])){
$current_password = $_POST["current_password"];
$new_password = $_POST["new_password"];
$confirm_new_password = $_POST["confirm_new_password"];

$user_password=$_SESSION["user_password"];
$user_id = $_SESSION["user_id"];


if(!empty($current_password) && !empty($new_password) &&!empty($confirm_new_password)){
    if($current_password===$user_password && $new_password===$confirm_new_password){
        $query = "update users set user_password='$new_password' where user_id='$user_id'";
        $result = mysqli_query($conn, $query);
        header("Location:login2.php");

    }
    else{
        echo "Please enter properly";
    }
}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="login.css">
    <title>Change Password</title>
</head>
<body>
<section class="vh-150 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-custom text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
      
                  <div class="mb-md-5 mt-md-4 pb-5">
      
                    <h2 class="fw-bold mb-2 text-uppercase">Change Password</h2>
                    <p class="text-white-50 mb-5">Please enter your login and password!</p>
                    <form action="change_password.php" method = "POST">
                    <div class="form-outline form-white mb-4">
                      <label class="form-label" for="typePasswordX">Current Password</label>
                      <input type="password" id="typePasswordX" class="form-control form-control-lg"  name = "current_password" />
                      
                    </div>
                   
      
                    <div class="form-outline form-white mb-4">
                      <label class="form-label" for="typePasswordX">New Password</label>
                      <input type="password" id="typePasswordX" class="form-control form-control-lg"  name = "new_password" />
                      
                    </div>
                    <div class="form-outline form-white mb-4">
                      <label class="form-label" for="typePasswordX">Confirm New Password</label>
                      <input type="password" id="typePasswordX" class="form-control form-control-lg"  name = "confirm_new_password" />
                      
                    </div>
      
                   
      
                    <button class="btn btn-outline-light btn-lg px-5" type="submit" name='submit'>Submit</button>
                    </form>
    
</body>
</html>