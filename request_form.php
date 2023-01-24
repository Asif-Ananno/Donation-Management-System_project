<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($conn);

if(isset($_POST['submit'])){
  $request_id = random_num(5);
  $user_id = $_POST['user_id'];
  $name =$_POST['name'];
  $amount = $_POST['amount'];
  $reason = $_POST['reason'];
  $email = $_POST['email'];
  $user_password = $_POST['user_password'];

  $_SESSION['request_id'] = $request_id;


  if(!empty($name) && !empty($amount) && !empty($reason) && !empty($email) && !empty($user_id))
  {

    $query = "INSERT INTO request_details(user_id,name,email, amount,reason,request_id) VALUES ('$user_id','$name','$email','$amount','$reason','$request_id')";

      mysqli_query($conn, $query);

      header("Location: request_complete.php");




  }else
  {
    echo "Please enter some valid information!";
  }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="style.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="login.css">
    <title>Request process</title>
</head>
<body>
    
<div>
<nav class="navbar navbar-expand-lg navbar-light navbar-custom fixed-top">
<h6>Hello <?php echo $_SESSION['user_first_name'] ?>, You are our honorable receiver.Your User Id is  <?php echo $_SESSION['user_id'] ?> </h6>
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarScroll"
          aria-controls="navbarScroll"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse justify-content-end"
          id="navbarScroll"
        >
          <ul
            class="navbar-nav me-2 my-2 my-lg-0 navbar-nav-scroll"
            style="--bs-scroll-height: 100px"
          >
            <li class="nav-item nav-text">
              <a href="receiver_dashboard.php" class="btn" role="button">Home</a>
            </li>
            <li class="nav-item">
              <a href="logout.php" class="btn btn-warning" role="button"
                >Log Out</a>
            </li>
          </ul>
          <!-- <form class="d-flex">
            
            <li class="nav-item">
              <a class="nav-link disabled">Link</a>
            </li>
            <a href="logout.php" class="btn btn-warning" role="button"
              >Log Out</a
            >
          </form> -->
        </div>
      </div>
    </nav>
</div>

<section class="vh-150 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-custom text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
      
                  <div class="mb-md-5 mt-md-4 pb-5">
      
                    <h2 class="fw-bold mb-2 text-uppercase">Please provide details to request</h2>
                    <form action="request_form.php" method="POST">
                    <div class="form-outline form-white mb-4">
                      <label class="form-label" for="Text">Name</label>
                      <input type="text" id="name" class="form-control form-control-lg" name="name" value ="<?php if (isset($_POST['submit'])){echo $name ;}?>" />
                    </div>

                    <div class="form-outline form-white mb-4">
                      <label class="form-label" for="user_id">User ID</label>
                      <input type="number" id="user_id" class="form-control form-control-lg" name="user_id" value ="<?php if (isset($_POST['submit'])){echo $user_id ;}?>" />
                    </div>
                    
                    <div class="form-outline form-white mb-4">
                      <label class="form-label" for="email">Email</label>
                      <input type="text" id="email" class="form-control form-control-lg" name="email" value ="<?php if (isset($_POST['submit'])){echo $email ;}?>" />
                      
                    </div>
                    <div class="form-outline form-white mb-4">
                      <label class="form-label" for="amount">Amount</label>
                      <input type="number" id="amount" class="form-control form-control-lg" name="amount" value ="<?php if (isset($_POST['submit'])){echo $amount ;}?>" />
              
                    </div>

                    <div class="form-outline form-white mb-4">
                      <label class="form-label" for="reason">Reason for money</label>
                      <input type="text" id="reason" class="form-control form-control-lg" name="reason" value ="<?php if (isset($_POST['submit'])){echo $reason ;}?>" />
                    </div>

                    
              
              
      
                    <div class="form-outline form-white mb-4">
                      <label class="form-label" for="typePasswordX">Enter your password</label>
                      <input type="password" id="typePasswordX" class="form-control form-control-lg"name="user_password" />  
                    </div> 
                    
  
      
                    <button class="btn btn-outline-light btn-lg px-5" type="submit" name="submit">Proceed</button>
                    </form>
      
      
      
                    <div class="d-flex justify-content-center text-center mt-4 pt-1">
                      <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                      <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                      <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                    </div>
      
                  </div>
      
      
                </div>
              </div>
            </div>
          </div>
        </div>
</section>
</body>
</html>