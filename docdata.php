<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Doctors in Avenue Hospital Malaysia</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	</head>
<body>
	<div class="container my-5">
		<h2>Data Table of Doctors in Avenue Hospital Malaysia </h2>
		<a class="btn btn-primary" href="/574/create.php" role="button">Add New Data</a>
		<br>
		<table class = "table">
			<thead>
			<tr>
				<th>Staff ID</th>
				<th>Name</th>
				<th>Department</th>
				<th>Hospital ID</th>
				<th>Address</th>
				<th>Gender</th>
				<th>Age</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$database = "hospital";
			
			// Create connection
			$connection = new mysqli($servername, $username, $password, $database);
			
			// Check connection
			if ($connection->connect_error) {
				die("Connection failed: " . $connection->connect_error);
			}
			
			// read all row from database table
			$sql = "SELECT * FROM staff"; I
			$result = $connection->query($sql);
			
			if (!$result) {
				die("Invalid query: " . $connection->error);
			}
			
			// read data of each row
			while ($row = $result->fetch_assoc()) {
				echo "
				<tr>
					<td>$row[staffID]</td>
					<td>$row[staffName]</td>
					<td>$row[staffDepartment]</td>
					<td>$row[hospitalID]</td>
					<td>$row[address]</td>
					<td>$row[gender_staff]</td>
					<td>$row[age_staff]</td>
					<td>
						<a class='btn btn-primary btn-sm' href='/574/edit.php?id=$row[staffID]'>Edit</a>
						<a class='btn btn-danger btn-sm' href='/574/delete.php?id=$row[staffID]'>Delete</a>
					</td>
				</tr>
				";
			}
		?>
			
		</tbody>
		</table>
	</div>
</body>
</html>
