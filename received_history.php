<?php
session_start();
 include("connection.php");
 include("functions.php");
 $user_data = check_login($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Received History</title>
</head>
<body>
<div>
<nav class="navbar navbar-expand-lg navbar-light navbar-custom fixed-top">
<h6>Hello <?php echo $_SESSION['user_first_name'] ?>, You are our honorable receiver.</h6>
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


<div class="container d-flex align-items-center justify-content-center color-bg text-center" id="whoweare">
    <div> 
        <h3>“Tough times never last, but tough people do”</h3>
        <h8>-Robert H. Schuller</h8>
    </div>
</div>

<div class="container d-flex align-items-center justify-content-center color-bg text-center" id="whoweare">
<div> 
        <h4><?php echo $_SESSION['user_first_name'] ?>'s donation received history</h4>
      
        <h5 class="text-center"> Received activity log (From oldest to newest)</h5>

        <table class="table table-striped table-primary" >
          <thead>
            <tr >
              
            <th scope="col " class="text-center">Donated From</th>
            <th scope="col " class="text-center">Amount Donated</th>
            <th scope="col " class="text-center">Account Number</th>
              
            </tr>
          </thead>
          <tbody>
            <tr class="td-text">
            <?php
              $ID= $_SESSION['user_id'];
							$sql= "SELECT donor_name,amount,account FROM donation_details_1 WHERE receiver_id='$ID'";
							$res=mysqli_query($conn, $sql);
							
							while ($row= mysqli_fetch_assoc($res)){
			
								echo "<tr><td>{$row["donor_name"]}</td><td>{$row["amount"]}</td><td>{$row["account"]}</td></tr>";
							}
			
							echo "</table>";
            ?>
    
              
            </tr>
            
          </tbody>
        </table>
                        
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
     