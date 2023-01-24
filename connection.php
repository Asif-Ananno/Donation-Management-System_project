<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="project_1";

if (!$conn = mysqli_connect($dbhost,$dbuser, $dbpass, $dbname))
{
    die("Failed to connect to the database!");

}
