<?php
session_start();
include("connection.php");
if(isset($_POST['submit'])){
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    $_SESSION["user_password"] = $user_password;

    if(!empty($user_email) && !empty($user_password)){

        $query = "select * from users where user_email = '$user_email' limit 1";
        $result = mysqli_query($conn, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {

                $user_data = mysqli_fetch_assoc($result);

                if($user_data['user_password'] === $user_password)
                {

                    $_SESSION['user_id'] = $user_data['user_id'];
                    $_SESSION['user_first_name'] = $user_data['user_first_name'];
                    if($user_data['user_type']==='donor'){
                        header("Location: donor_dashboard.php");
                    }
                    if($user_data['user_type']==='receiver'){
                        header("Location: receiver_dashboard.php");
                    }
                    if($user_data['user_type']==='admin'){
                        header("Location: admin_dashboard.php");
                    }

                    die;
        }
    }
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
    <title>Login</title>
</head>
<body>
    <section class="vh-150 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-custom text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
      
                  <div class="mb-md-5 mt-md-4 pb-5">
      
                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                    <p class="text-white-50 mb-5">Please enter your login and password!</p>
                    <form action="login2.php" method = "POST">
                    <div class="form-outline form-white mb-4" >
                        <label class="form-label" for="typeEmailX">Email</label>
                        <input type="email" id="typeEmailX" class="form-control form-control-lg" name="user_email" value ="<?php if (isset($_POST['submit'])){echo $user_email ;}?>" />
                    
                    </div>
      
                    <div class="form-outline form-white mb-4">
                      <label class="form-label" for="typePasswordX">Password</label>
                      <input type="password" id="typePasswordX" class="form-control form-control-lg"  name = "user_password" />
                      
                    </div>
      
                    <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>
      
                    <button class="btn btn-outline-light btn-lg px-5" type="submit" name='submit'>Submit</button>
                    </form>
                    
                    <div class="d-flex justify-content-center text-center mt-4 pt-1">
                      <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                      <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                      <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                    </div>
      
                  </div>
      
                  <div>
                    <p class="mb-0">Don't have an account? <a href="registration2.php" class="text-white-50 fw-bold">Sign Up</a>
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