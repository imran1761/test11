<!DOCTYPE html>
<html>
<head>

    <title>Login</title>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<body>
	<?php include 'process.php'; ?>
	

	<?php
		if (isset($_SESSION['message'])): ?>

		<div class="alert alert-success">
			<?php
			echo $_SESSTION['message'];
			unset($_SESSTION['message']);
			?>
		</div>
	<?php endif ?>
	<div class="container">

	<?php
		$mysqli = new mysqli('localhost', 'root', '', 'document') or die(mysqli_error(mysqli));
		$result = $mysqli->query("select * from users") or die($mysqli->error);

		//pre_r($res->fetch_assoc());
		?>

		<div class="row justify-content-center">
			<table class="table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Location</th>
						
						<th colspan="2">Action</th>
					</tr>
				</thead>
		<?php

			while ($row = $result->fetch_assoc()):
			?>
				<tr>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['location']; ?></td>
					<td>
						<a href="intex.php?edit=<?php echo $row['id']; ?>"
							class="btn btn-info">Edit</a>
						<a href="process.php?delete=<?php echo $row['id']; ?>"/* need add date and time*/
							class="btn btn-danger">Delet</a>
					</td>
				</tr>
			<?php endwhile; ?>
		</table>
	</div>

		<?php
		function pre_r( $array ){
			echo '<pre>';
			print_r($array);
			echo '</pre>';
		}
		?>
	<div class="row justify-content-center">
	<form action="process.php" method="post">
		<div class="form-group">
		<label>Name</label>
		<input type="text" name="name" class="form-control" value="Enter Your Name">
		</div>
		<div class="form-group">
		<label>location</label>
		</div>
		<input type="text" name="location" class="form-control" value="Enter Your location">
		<div class="form-group">
		<button type="submit" name="save" class="btn btn-primary"> save </button>
		</div>
	</div>
	</form>

</body>
</html>