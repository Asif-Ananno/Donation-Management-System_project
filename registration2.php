<?php
session_start();
include("connection.php");
include("functions.php");

if(isset($_POST['submit'])){
  $user_first_name = $_POST['user_first_name'];
  $user_last_name = $_POST['user_last_name'];
  $user_email = $_POST['user_email'];
  $user_password = $_POST['user_password'];
  $user_password_again = $_POST['user_password_again'];
  $user_type = $_POST['user_type'];


 
 


  if(!empty($user_first_name) && !empty($user_last_name) && !empty($user_email) && !empty($user_password) && !empty($user_password_again)){
     if($user_password===$user_password_again){
         $sql = "INSERT INTO users (user_first_name,user_last_name,user_email,user_password,user_type) VALUES('$user_first_name','$user_last_name','$user_email','$user_password','$user_type')";
         if($conn -> query($sql)==TRUE){
             header('location:login2.php');
         }else{
             echo "Could not create.";
         }
     }else{
         echo 'not match';
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>
<body>
    <section class="vh-150 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-custom text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
      
                  <div class="mb-md-5 mt-md-4 pb-5">
      
                    <h2 class="fw-bold mb-2 text-uppercase">Sign up</h2>
                    <form action="registration2.php" method="POST">
                    <div class="form-outline form-white mb-4">
                      <label class="form-label" for="Text">First Name</label>
                      <input type="Text" id="user_first_name" class="form-control form-control-lg" name="user_first_name" value ="<?php if (isset($_POST['submit'])){echo $user_first_name ;}?>" />
                      
                    </div>
                    <div class="form-outline form-white mb-4">
                      <label class="form-label" for="Text">Last Name</label>
                      <input type="Text" id="user_last_name" class="form-control form-control-lg" name="user_last_name" value ="<?php if (isset($_POST['submit'])){echo $user_last_name ;}?>" />
                      
                    </div>
                    <div class="form-outline form-white mb-4">
                      <label class="form-label" for="typeEmailX">Email</label>
                      <input type="email" id="typeEmailX" class="form-control form-control-lg" name="user_email" value ="<?php if (isset($_POST['submit'])){echo $user_email ;}?>" />
                      
                    </div>
                    
      
                    <div class="form-outline form-white mb-4">
                      <label class="form-label" for="typePasswordX">Password</label>
                      <input type="password" id="typePasswordX" class="form-control form-control-lg"name="user_password" />
                      
                    </div> 
                    
                    <div class="form-outline form-white mb-4">
                      <label class="form-label" for="typePasswordX">Password Again</label>
                      <input type="password" id="typePasswordX" class="form-control form-control-lg" name="user_password_again" />
                      
                    </div>  

                    <div class="form-outline form-white mb-4">
                        <label for="user_type">Choose your user type:</label>
                        <select name="user_type" id="user_type">
                        <option value="donor">Donor</option>
                        <option value="receiver">Receiver</option>
                        </select>
                    </div>
      
                    <button class="btn btn-outline-light btn-lg px-5" type="submit" name="submit">Sign up</button>
                    </form>
      
      
      
                    <div class="d-flex justify-content-center text-center mt-4 pt-1">
                      <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                      <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                      <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                    </div>
      
                  </div>
      
                  <div>
                    <p class="mb-0">Already have an account? <a href="login2.php" class="text-white-50 fw-bold">Sign in</a>
                    </p>
                  </div>
      
                </div>
              </div>
            </div>
          </div>
        </div>

      </section>
    </body>
</html>