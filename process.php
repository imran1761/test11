<?php

$mysqli = new mysqli('localhost', 'root', '', 'document') or die(mysqli_error(mysqli));

if (isset($_POST['save'])) {
	$name = $_POST['name'];
	$location = $_POST['location'];
	
	$mysqli->query ("INSERT INTO users (name, location) values('$name', '$location')") or die($mysqli->error); 

	$_SESSION['message'] = "Record have been saved!";
	$_SESSION['msg_type'] = "success";

	header("location: intex.php");
}

if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$mysqli->query ("DELETE FROM users WHERE id = $id") or die($mysqli->error);

	$_SESSION['message'] = "Record have been deleted";
	$_SESSION['msg_type'] = "danger";

	header("location: intex.php");
}

?>