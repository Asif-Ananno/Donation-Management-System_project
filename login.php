<?php
    session_start();
    $conn = new mysqli('localhost','root','','store_management_system');
    if (!$conn){
    echo 'not connect';
    }
    if(isset($_POST['submit'])){
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];

        $md5_user_password = md5($user_password);

        if(!empty($user_email) && !empty($user_password)){

            $sql = "SELECT * FROM users WHERE user_email = '$user_email' AND user_password = '$md5_user_password'";
            $query = $conn -> query($sql);

            if($query->num_rows > 0){
                header("location:dashboard.php");
                $_SESSION['welcome'] = "$user_email";

            } else{
                echo 'cannot login';
            }
               
        }else{
            echo 'fillup the forms';
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
            <form action="login.php" method = "POST">
                <div class="mt-2">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="user_email" value = "<?php if (isset($_POST['submit'])){echo $user_email ;}?>">
                </div>
                <div class="mt-2">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name = "user_password">
                </div>
                <div class = "mt-2"><button type="submit" class="btn btn-primary" name='submit'>Submit</button>
                </div>
                
                </form>
                <h5>Not have an account?<a href="registration.php">Register<a></h5>
            </div>
            <div class = "col-4">
            </div>
        </div>

    </div>

</body>
</html>