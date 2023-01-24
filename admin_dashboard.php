<?php
session_start();
 include("connection.php");
 include("functions.php");

 $user_data = check_login($conn);

 if(isset($_POST['submit1']))
{
  $search_donor = $_POST['search_donor'];
	$_SESSION['$got_donor']=$search_donor;
  $query= "SELECT * FROM users WHERE user_first_name= '$search_donor' and user_type='donor'";
  $result = mysqli_query($conn, $query);
  if($result)
  {
    if($result && mysqli_num_rows($result) > 0)
    {
      header("Location:admin_donor.php");
    }
  else { header("Location: search_donor_not_found.php");
   }

  }
}
if(isset($_POST['submit2']))
{
  $search_receiver = $_POST['search_receiver'];
	$_SESSION['$got_receiver']=$search_receiver;
  $query= "SELECT * FROM users WHERE user_first_name= '$search_receiver' and user_type='receiver'";
  $result = mysqli_query($conn, $query);
  if($result)
  {
    if($result && mysqli_num_rows($result) > 0)
    {
      header("Location:admin_receiver.php");
    }
  else { header("Location: search_receiver_not_found.php");
   }

  }
}

if(isset($_POST['submit3'])){
  $myquery = $_POST['customized_query'];

	    if(!empty($myquery))
	    {
	     
	      $_SESSION["custom_query"] = $myquery;
        header("Location:custom_query.php");
	      
      }
    
    else{
      echo "Failed";
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
    <link rel="stylesheet" href="style.css">
    <title>Admin Dashboard</title>
</head>
<body>

<div>
<nav class="navbar navbar-expand-lg navbar-light navbar-custom fixed-top">
<h6>Hello <?php echo $_SESSION['user_first_name'] ?>, You are our admin.</h6>
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
          <li class="nav-item">
              <a href="change_password.php" class="btn btn-warning" role="button"
                >Change Password</a
              >
            <li class="nav-item">
              <a href="logout.php" class="btn btn-warning" role="button"
                >Log Out</a
              >
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

<div class="container d-flex align-items-center justify-content-center color-bg text-center" id="whoweare">
    <div> 
        <h3>“The price of greatness is responsibility”</h3>
        <h8>-Winston Churchill</h8>
    </div>
</div>

<div class="container d-flex align-items-center justify-content-center color-bg text-center" id="whoweare">
    <div> 
      <form action="admin_dashboard.php" method='POST'>
      <h5>Here you can search for donor:</h5>
          <input class="form-control-outline-warning mr-sm-2" type="search" placeholder="Enter donor name" aria-label="Search" name="search_donor">
          <button class="btn btn-outline-warning my-2 my-sm-0 " type="submit" name='submit1'>Search</button>
          <br>
          <br>
          <br>
          <h5>Here you can search for receiver:</h5>
          <input class="form-control-outline-warning mr-sm-2" type="search" placeholder="Enter receiver name" aria-label="Search" name="search_receiver">
          <button class="btn btn-outline-warning my-2 my-sm-0 " type="submit" name="submit2">Search</button>
          <br>
          <br>
          <br>
      </form>               
    </div>
</div>
<div class="container d-flex align-items-center justify-content-center color-bg text-center" id="whoweare">
    <div>
      <form action="admin_dashboard.php"method="POST">
      <h4>Customized Query</h4> 
        <br>
        <br>
        <h5>Here you can execute your own SQL query here:</h5>
        <input class="form-control-outline-warning mr-sm-2" type="text" placeholder="Enter query" aria-label="Search" name="customized_query">
        <button class="btn btn-outline-warning my-2 my-sm-0 " type="submit" name='submit3'>Submit</button>
      </form>
        
    </div>
</div>

<div class="container d-flex align-items-center justify-content-center color-bg text-center" id="whoweare">
    <div class> 
        <h5>Information of the donor who has highest single donation:</h5>
        <br>
        <table class="table table-striped table-danger" >
          <thead>
            <tr>
              <th scope="col " class="text-center">Donation Id</th>
              <th scope="col " class="text-center">Donor Id</th>
              <th scope="col " class="text-center">Donor Name</th>
              <th scope="col " class="text-center">Receiver ID </th>
              <th scope="col " class="text-center">Receiver Name </th>
              <th scope="col " class="text-center">Amount </th>
              
            </tr>
          </thead>
          <tbody>
            <tr class="td-text">
  
              
              <?php
  
								$sql= "SELECT donation_id,donor_id,receiver_id,amount,donor_name,receiver_name FROM donation_details_1 WHERE amount=(SELECT MAX(amount) FROM donation_details_1)";
								$res=mysqli_query($conn, $sql);
  
                while ($row= mysqli_fetch_assoc($res)){
									$sql2="SELECT user_first_name FROM users WHERE user_id={$row['donor_id']}";
									$sql3="SELECT user_first_name FROM users WHERE user_id={$row['receiver_id']}";
									$res2= mysqli_query($conn, $sql2);
									$res3= mysqli_query($conn, $sql3);
									$row2= mysqli_fetch_assoc($res2);
									$row3= mysqli_fetch_assoc($res3);
									echo "<tr><td>{$row["donation_id"]}</td><td>{$row["donor_id"]}<td>{$row2["user_first_name"]}</td><td>{$row["receiver_id"]}</td><td>{$row3["user_first_name"]}</td><td>{$row["amount"]}</td></tr>";
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
        <h5>Information of the donor who has highest cumulative donation:</h5>
        <br>
        <table class="table table-striped table-success" >
          <thead>
            <tr>
              
              <th scope="col " class="text-center">Donor Name</th>
              <th scope="col " class="text-center">Amount</th>
              
            </tr>
          </thead>
          <tbody>
            <tr class="td-text">
              <?php
  
								$sql= "SELECT donor_id, SUM(amount) AS sum FROM donation_details_1 WHERE donor_id=(SELECT donor_id FROM donation_details_1 WHERE amount=(SELECT MAX(amount) FROM donation_details_1))";
								$res=mysqli_query($conn, $sql);
								
								while ($row= mysqli_fetch_assoc($res)){
									$sql2="SELECT user_first_name FROM users WHERE user_id={$row['donor_id']}";
									$res2= mysqli_query($conn, $sql2);
									$row2= mysqli_fetch_assoc($res2);
									echo "<tr><td>{$row2["user_first_name"]}</td><td>{$row["sum"]}</td></tr>";
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
        <h5>All donors total donation amount:</h5>
        <br>
        <table class="table table-striped table-primary" >
          <thead>
            <tr >
              
              <th scope="col " class="text-center">Donor Name</th>
              
              <th scope="col " class="text-center">Total Donated</th>
              
            </tr>
          </thead>
          <tbody>
            <tr class="td-text">
            <?php
              $sql= "SELECT donor_name, SUM(amount) AS sum FROM donation_details_1 GROUP by donor_id ORDER BY sum DESC";
              $res=mysqli_query($conn, $sql);
              
              while ($row= mysqli_fetch_assoc($res)){

                echo "<tr><td>{$row["donor_name"]}</td><td>{$row["sum"]}</td></tr>";
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
        <h5>All receivers total received amount:</h5>
        <br>
        <table class="table table-striped table-success" >
          <thead>
            <tr >
              
              <th scope="col " class="text-center">Receiver Name</th>
              
              <th scope="col " class="text-center">Total Donation Received</th>
              
            </tr>
          </thead>
          <tbody>
            <tr class="td-text">
            <?php
              $sql= "SELECT receiver_name, SUM(amount) AS sum FROM donation_details_1 GROUP by receiver_id ORDER BY sum DESC";
              $res=mysqli_query($conn, $sql);
              
              while ($row= mysqli_fetch_assoc($res)){

                echo "<tr><td>{$row["receiver_name"]}</td><td>{$row["sum"]}</td></tr>";
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