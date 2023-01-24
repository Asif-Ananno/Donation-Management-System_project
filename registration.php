<?php
   $conn = new mysqli('localhost','root','','project_1');
   if (!$conn){
    echo 'not connect';
   }

   if(isset($_POST['submit'])){
     $user_first_name = $_POST['user_first_name'];
     $user_last_name = $_POST['user_last_name'];
     $user_email = $_POST['user_email'];
     $user_password = $_POST['user_password'];
     $user_password_again = $_POST['user_password_again'];
    
     $md5_user_password = md5($user_password);
     



     if(!empty($user_first_name) && !empty($user_last_name) && !empty($user_email) && !empty($user_password) && !empty($user_password_again)){
        if($user_password===$user_password_again){
            $sql = "INSERT INTO users (user_first_name,user_last_name,user_email,user_password) VALUES('$user_first_name','$user_last_name','$user_email','$md5_user_password ')";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class = "container">
        <div class = "row">
            <div class="col-4">
            </div>
            <div class="col-4" style="margin-top: 150px">
            <form action="registration.php" method = "POST">
                <div class="mt-2">
                    <label class="form-label">First name</label>
                    <input type="Text" class="form-control" name = "user_first_name" value = "<?php if (isset($_POST['submit'])){echo $user_first_name ;}?>">
                </div>
                <div class="mt-2">
                    <label  class="form-label">Last name</label>
                    <input type="Text" class="form-control" name = "user_last_name" value = "<?php if (isset($_POST['submit'])){echo $user_last_name ;}?>">
                </div>
                <div class="mt-2">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" name = "user_email" value = "<?php if (isset($_POST['submit'])){echo $user_email ;}?>">
                    
                </div>
                <div class="mt-2">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name = "user_password">
                    
                </div>
                <div class="mt-2">
                    <label for="exampleInputPassword1" class="form-label">Password Again</label>
                    <input type="password" class="form-control" name = "user_password_again">
                </div>
                <div class = "mt-2"><button type="submit" class="btn btn-primary" name = 'submit'>Submit</button>
                </div>
                
                </form>
                <h5>Already have an account?<a href="login2.php">Login<a></h5>
            </div>
            <div class = "col-4">
            </div>
        </div>

    </div>

</body>
</html>