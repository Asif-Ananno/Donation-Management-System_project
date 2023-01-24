<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($conn);

 $query = $_SESSION['custom_query'];

 $result = mysqli_query($conn, $query);
while ($row= mysqli_fetch_assoc($result))
 {
	$result = mysqli_query($conn, $query);
	while ($row= mysqli_fetch_assoc($result))
	{
		print_r($row);
	    echo "<br><br>";

	}

	 }
					                        
      


?>