<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset = "UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale= 1.0">
	<title>Avenue Hospital: Doctor</title>
	<link rel="stylesheet" href= "https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
	<style>

/* Style the body */
body {
	font-family: Arial, Helvetica, sans-serif;
	margin: 0;
	background-image: url('image/baker.jpg');
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-size: cover;
  
}

/* Header/logo Title */
.header {
  padding: 20px;
  text-align: center;
  background: #3ac2fc;
  color: white;
}

/* Increase the font size of the heading */
.header h1 {
  font-size: 40px;
}

/* Sticky navbar - toggles between relative and fixed, depending on the scroll position. 
It is positioned relative until a given offset position is met in the viewport - then it 
"sticks" in place (like position:fixed). The sticky value is not supported in IE or Edge 15 
and earlier versions. However, for these versions the navbar will inherit default position */
.navbar {
  overflow: hidden;
  background-color: #0da1e0;
  position: sticky;
  position: -webkit-sticky;
  top: 0;
}

/* Style the navigation bar links */
.navbar a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 20px;
  text-decoration: none;
}


/* Right-aligned link */
.navbar a.right {
  float: right;
}

/* Change color on hover */
.navbar a:hover {
  background-color: #ddd;
  color: black;
}

/* Active/current link */
.navbar a.active {
  background-color: #666;
  color: white;
}

/* Column container */
.row {  
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
}

/* Create two unequal columns that sits next to each other */
/* Sidebar/left column */
.side {
  -ms-flex: 30%; /* IE10 */
  flex: 30%;
  background-color: #f1f1f1;
  padding: 20px;
}

/* Main column */
.main {   
  -ms-flex: 70%; /* IE10 */
  flex: 70%;
  padding: 20px;
}

/* Footer */
.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
}

/* Responsive layout - when the screen is less than 700px wide, 
make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 700px) {
  .row {   
    flex-direction: column;
  }
}

/* Responsive layout - when the screen is less than 400px wide, 
make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
  .navbar a {
    float: none;
    width: 100%;
  }
}
</style>
</head>
<body>
	<div class="navbar">
	  <a href="Hospital_list_private.html">About</a>
	  <a href="listdoc.php">Doctors</a>
	  <a href="contactus.html">Contact</a>
	  <a href="FAQ_private.html" >FAQ</a>
	  <a href="listpat.php" >Patient</a>
	  <a href="treatment.php" >Treatment</a>
	</div>

	<div class="header">
	   <p align ="left"><b>Avenue Hospital</b></p>
	   <h1>ADMIN E-MERCY</h1>
	</div>

	<div class="navbar">
	  <a href="homepagepub.html" class="right" >Logout</a>
	</div>
	
	<div class="container my-5">
		<h2>List of Doctor</h2>
		<a class="btn btn-primary" href="/574/create.php" role="button">New Data</a>
		<br>
		<table class="table">
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
			
			//Create connection
			$connection = new mysqli($servername, $username, $password, $database);
			
			//Check connection
			if($connection->connect_error){
				die("Connection failed: " . $connection->connect_error);
			}
			
			//read all row from database table
			$sql = "select * from staff";
			$result = $connection->query($sql);
			
			if(!$result){
				die("Invalid query: " . $connection->error);
			}
			
			//read data of each row
			while($row = $result->fetch_assoc()){
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
						<a class='btn btn-primary btn-sm' href='/574/edit.php?staffID=$row[staffID]'>Edit</a>
						<a class='btn btn-danger btn-sm' href='/574/delete.php?staffID=$row[staffID]'>Delete</a>
					</td>
				</tr>
				";
			}
			?>
			
		</table>
	</div>
</body>
</html>