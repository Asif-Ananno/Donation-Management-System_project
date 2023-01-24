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
    <title>Donation Request</title>
</head>
<body>
<div>
<nav class="navbar navbar-expand-lg navbar-light navbar-custom fixed-top">
<h6>Hello <?php echo $_SESSION['user_first_name'] ?>, You are our honorable donor.</h6>
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
           <h3>Donation Request</h3>
           <table class="table table-striped table-primary" >
          <thead>
            <tr >
              
              <th scope="col " class="text-center">Request ID</th>

              <th scope="col " class="text-center">User ID</th>
              <th scope="col " class="text-center">Name</th>
              


              <th scope="col " class="text-center">Email</th>

              <th scope="col " class="text-center">Requested Amount</th>

              <th scope="col " class="text-center">Reason</th>
              
            </tr>
          </thead>
          <tbody>
            <tr class="td-text">
            <?php
              $ID= $_SESSION['user_id'];
			 $sql= "SELECT * FROM request_details";
			$res=mysqli_query($conn, $sql);
							
			while ($row= mysqli_fetch_assoc($res)){
			
			echo "<tr><td>{$row["request_id"]}</td><td>{$row["user_id"]}</td><td>{$row["name"]}</td><td>{$row["email"]}</td><td>{$row["amount"]}</td><td>{$row["reason"]}</td></tr>";
			}
			
			echo "</table>";
            ?>
    
              
            </tr>
            
          </tbody>
        </table>
          </div>
         </div>
   

</body>
</html>