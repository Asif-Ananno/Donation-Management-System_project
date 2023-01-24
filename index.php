<?php
session_start();
include("connection.php");
include("functions.php");

if(isset($_POST['submit'])){
  $subscriber_name = $_POST['subscriber_name'];
  $subscriber_email = $_POST['subscriber_email'];
  $subscriber_phn = $_POST['subscriber_phn'];
  $subscriber_id = random_num(5);


 
 


  if(!empty($subscriber_name) && !empty($subscriber_email) && !empty($subscriber_phn)){
         $sql = "INSERT INTO subscriber (subscriber_id,subscriber_name,subscriber_email,subscriber_phn) VALUES(' $subscriber_id','$subscriber_name','  $subscriber_email','$subscriber_phn')";
         if($conn -> query($sql)==TRUE){
             header('location:subscribe_done.php');
         }else{
          header('location:subscribe_not_done.php');
         }
  }else{
      echo 'cannot create';
     }
  

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rural Development Bangladesh Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light navbar-custom fixed-top">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">
                  <img src="images/newlogo.png" alt="">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
                  <a class="nav-link" href="#whoweare">Who we are</a>
                  <a class="nav-link" href="#whatwedo">What we do</a>
                  <a class="nav-link" href="#activities">Activities</a>
                  <a class="nav-link " href="#contact">Contact us</a>
                  <a class="nav-link " href="#subscribe">Subscribe</a>
                  <a class="nav-link " href="login2.php">Login</a>
                  <a class="nav-link " href="registration2.php">Registration</a>

                  

                </div>
              </div>
            </div>
          </nav>
    </div>
    <div
          id="carouselExampleInterval"
          class="carousel slide"
          data-bs-ride="carousel"
        >
          <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="2000">
              <img src="images/c1.jpg" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item" data-bs-interval="2000">
              <img src="images/c2.jpg" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
              <img src="images/c3.jpg" class="d-block w-100" alt="..." />
            </div>
          </div>
          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carouselExampleInterval"
            data-bs-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carouselExampleInterval"
            data-bs-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>

        <div class="container d-flex align-items-center justify-content-center color-bg text-center" id="whoweare">
          <div> 
           <h1>Who we are</h1>
           <h5>We act as a catalyst, creating opportunities for people living in poverty to realise their potential.</h5>
           <h5>Join the world’s biggest family.</h5>
           <h5>Small is beautiful, scale is necessary.</h5>
           <button class="submit-button">Learn More</button>
          </div>
         </div>
   

       <div class="container text-center" id="whatwedo">
        <h1>What we do</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <div class="col">
            <div class="card h-100">
              <img src="images/social-development1.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Social-development</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <button class="submit-button">Learn More</button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img src="images/women empowerment.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Women empowerment</h5>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                <button class="submit-button">Learn More</button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img src="images/education1.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Education</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                <button class="submit-button">Learn More</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    <div class="container text-center" id="activities">
      <h1>Activities</h1>
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card h-100">
            <img src="images/disabling-world-fet-600x400.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Disabling World</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <button class="submit-button">Learn More</button>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <img src="images/Social-Protection-thumb-600x400.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Social protection</h5>
              <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
              <button class="submit-button">Learn more</button>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <img src="images/Doing-development-differently.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Doing-development-differently</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
              <button class="submit-button">Learn More</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container d-flex align-items-center justify-content-center color-bg text-center" id="subscribe">
      <div>
      <h1>SUBSCRIBE</h1>
      <form action="index.php" method = "POST">
          <div class="form-outline form-white mb-4">
                <label class="form-label" for="subscriber_name">Name</label>
                <input type="Text" id="subscriber_name" class="form-control form-control-lg"  name = "subscriber_name" value ="<?php if (isset($_POST['submit'])){echo $subscriber_email ;}?>" />             
          </div>
                    <div class="form-outline form-white mb-4" >
                        <label class="form-label" for="subscriber_email">Email</label>
                        <input type="email" id="subscriber_email" class="form-control form-control-lg" name="subscriber_email" value ="<?php if (isset($_POST['submit'])){echo $subscriber_email ;}?>" />
                    
                    </div>
      
                    <div class="form-outline form-white mb-4">
                      <label class="form-label" for="subscriber_phn">Phone no</label>
                      <input type="Number" id="subscriber_phn" class="form-control form-control-lg"  name = "subscriber_phn" value ="<?php if (isset($_POST['submit'])){echo $subscriber_phn ;}?>" />
                      
                    </div>
      
                
      
                    <button class="submit-button" type="submit" name='submit'>Submit</button>
                    </form>

      </div>
    </div>
     <div>
      
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>   
</body>
</html>