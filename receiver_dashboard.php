<?php
session_start();
 include("connection.php");
 include("functions.php");

 $user_data = check_login($conn);

 if(isset($_POST['submit']))
{
  // posted details
  $search_donor = $_POST['search_donor'];
	$_SESSION['$got_donor']=$search_donor;
  $query= "SELECT * FROM users WHERE user_first_name= '$search_donor' and user_type='donor'";
  $result = mysqli_query($conn, $query);
  if($result)
  {
    if($result && mysqli_num_rows($result) > 0)
    {
      header("Location:search_donor.php");
    }
  else { header("Location: search_donor_not_found.php");
   }

  }
}

 ?>


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Receiver Dashboard</title>
</head>
<body>
<div>
<nav class="navbar navbar-expand-lg navbar-light navbar-custom fixed-top">
<h6>Hello <?php echo $_SESSION['user_first_name'] ?>, You are our honorable receiver. Your User Id is  <?php echo $_SESSION['user_id'] ?> </h6>
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
           <form action="receiver_dashboard.php" method='POST'><input class="form-control-outline-warning mr-sm-2" type="search" placeholder="Search for Donor" aria-label="Search" name="search_donor">
            <button class="btn btn-outline-warning my-2 my-sm-0 " type="submit" for='search_donor' name='submit'>Submit</button></form>
            
            <li class="nav-item nav-text">
              <a href="receiver_dashboard.php" class="btn" role="button">Home</a>
            </li>
            <li class="nav-item nav-text">
              <a href="received_history.php" class="btn" role="button">Received History</a>
            </li>
            <li class="nav-item nav-text">
              <a href="change_password.php" class="btn" role="button">Change Password</a>
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


<div class="container d-flex align-items-center justify-content-center color-bg text-center" id="whoweare">
    <div> 
        <h3>“Tough times never last, but tough people do”</h3>
        <h8>-Robert H. Schuller</h8>
    </div>
</div>



<div class="container d-flex align-items-center justify-content-center color-bg text-center" id="whoweare">
        
        <div> 
           <h3>List of donors</h3>
           <h4>Welcome <?php echo $_SESSION['user_first_name'] ?>!</h4>
           <h7>Your user id is <?php echo $_SESSION['user_id'] ?>. Here you can see the donor(s) list who have donated you.</h7>
           <table class="table table-striped table-primary" >
          <thead>
            <tr >
            <th scope="col " class="text-center">Donor's Name</th>
            <th scope="col " class="text-center">Donor's ID</th>
            </tr>
          </thead>
          <tbody>
            <tr class="td-text">
            <?php
              $ID= $_SESSION['user_id'];
			       $sql= "SELECT * FROM users where user_type='donor'";
			       $res=mysqli_query($conn, $sql);
							
			while ($row= mysqli_fetch_assoc($res)){
        echo	 "<tr><td>".$row['user_first_name'] . "</td><td>" .$row['user_id'] . "</td>" ;
			
      }
			
			echo "</table>";
            ?>
    
              
            </tr>
            
          </tbody>
        </table>
          </div>
         </div>
</div>

<div class="container d-flex align-items-center justify-content-center color-bg text-center" id="whoweare">
    <div> 
        <h6>For making a request press the button below</h6>
        <a href="request_form.php" class="btn btn-warning" role="button">Request for Donation</a>
    </div>
</div>

</body>
</html>
<div> 
           