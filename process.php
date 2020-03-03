<?php
session_start();
date_default_timezone_set("Asia/Kolkata");

$mysqli = new mysqli('localhost', 'root', '', 'document') or die(mysqli_error(mysqli));

if (isset($_POST['save'])) {
	$name = $_POST['name'];
	$location = $_POST['location'];
	
	$mysqli->query ("INSERT INTO users (name, location) values('$name', '$location')") or die($mysqli->error); 

	$_SESSION["message"] = "Record have been saved!";
	$_SESSION["msg_type"] = "success";

	header("location: index.php");
}

if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$mysqli->query ("DELETE FROM users WHERE id = $id") or die($mysqli->error);

	$_SESSION["message"] = "Record have been deleted";
	$_SESSION["msg_type"] = "danger";

	header("location: index.php");
}
    if (isset($_POST['search'])) {
    	  $from_date = $_POST['from_date'];
    	  $to_date = $_POST['to_date'];
  
  	$mysqli->query ("SELECT name, location from users where joindate between '$from_date' and '$to_date' order by joindate")
  	or die($mysqli->error);
}

?>