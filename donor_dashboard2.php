<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($conn);



if(isset($_POST['submit'])){
  $donation_id = random_num(5);
  $receiver_id = $_POST['receiver_id'];
  $receiver_name =$_POST['receiver_name'];
  $amount = $_POST['amount'];
  $trx_id = random_num(6);
  $user_id =  $_POST['user_id'] ;
  $account = $_POST['account'];
  $donor_name = $_SESSION['user_first_name'];
  $user_password = $_POST['user_password'];


  if(!empty($receiver_id) && !empty($amount) && !empty($trx_id) && !empty($user_id) && !empty($account) && !empty($user_id) && !empty($user_password) && $user_password===$_SESSION['user_password'])
  {

    $query = "INSERT INTO donation_details_1(donation_id,donor_id,receiver_id,amount,trx_id,account,donor_name,receiver_name) VALUES ('$donation_id','$user_id','$receiver_id','$amount',	'$trx_id','$account','$donor_name','$receiver_name')";

      mysqli_query($conn, $query);

      header("Location: donation_complete.php");




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
    <title>Donation process</title>
</head>
<body>

<div>
<nav class="navbar navbar-expand-lg navbar-light navbar-custom fixed-top">
<h6>Hello <?php echo $_SESSION['user_first_name'] ?>, You are our honorable donor. Your User Id is  <?php echo $_SESSION['user_id'] ?> </h6>
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
              <a href="donor_dashboard.php" class="btn" role="button">Home</a>
            </li>
            <li class="nav-item nav-text">
              <a href="donation_history.php" class="btn" role="button">Donation History</a>
            </li>
            <li class="nav-item nav-text">
              <a href="donation_request.php" class="btn" role="button">Donation Request</a>
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
<div class='container'></div>
<div class="container d-flex align-items-center justify-content-center color-bg text-center" id="whoweare">
<table class="table table-striped table-primary" >
  <thead>
    <tr >
      
    <th scope="col " class="text-center">ID</th>
   
    <th scope="col " class="text-center">Name</th>
      
    </tr>
  </thead>
  <tbody>
    <tr class="td-text">
    <?php
      $ID= $_SESSION['user_id'];
      $sql= "SELECT user_id,user_first_name FROM users WHERE user_type='receiver'";
      $res=mysqli_query($conn, $sql);
      
      while ($row= mysqli_fetch_assoc($res)){

        echo "<tr><td>{$row["user_id"]}</td><td>{$row["user_first_name"]}</td></tr>";
      }

      echo "</table>";
    ?>

      
    </tr>
    
  </tbody>
</table>

</div>
<section class="vh-150 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-custom text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
      
                  <div class="mb-md-5 mt-md-4 pb-5">
      
                    <h2 class="fw-bold mb-2 text-uppercase">Please provide details to donate</h2>
                    <form action="donor_dashboard2.php" method="POST">
                    <div class="form-outline form-white mb-4">
                      <label class="form-label" for="Text">Receiver Name</label>
                      <input type="text" id="receiver_name" class="form-control form-control-lg" name="receiver_name" value ="<?php if (isset($_POST['submit'])){echo $receiver_name ;}?>" />
                    </div>

                    <div class="form-outline form-white mb-4">
                      <label class="form-label" for="receiver_id">Receiver ID</label>
                      <input type="number" id="receiver_id" class="form-control form-control-lg" name="receiver_id" value ="<?php if (isset($_POST['submit'])){echo $receiver_id ;}?>" />
                    </div>
                    
                    <div class="form-outline form-white mb-4">
                      <label class="form-label" for="amount">Enter Amount</label>
                      <input type="number" id="amount" class="form-control form-control-lg" name="amount" value ="<?php if (isset($_POST['submit'])){echo $amount ;}?>" />
                      
                    </div>
                    <div class="form-outline form-white mb-4">
                      <label class="form-label" for="account_no">Account no</label>
                      <input type="number" id="account_no" class="form-control form-control-lg" name="account" value ="<?php if (isset($_POST['submit'])){echo $account ;}?>" />
              
                    </div>

                    <div class="form-outline form-white mb-4">
                      <label class="form-label" for="user_id">User ID</label>
                      <input type="number" id="user_id" class="form-control form-control-lg" name="user_id" value ="<?php if (isset($_POST['submit'])){echo $user_id ;}?>" />
                    </div>

                    
              
              
      
                    <div class="form-outline form-white mb-4">
                      <label class="form-label" for="typePasswordX">Password</label>
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