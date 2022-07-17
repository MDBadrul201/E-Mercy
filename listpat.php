<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset = "UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale= 1.0">
	<title>Avenue Hospital: Patient</title>
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
		<h2>List of Patient</h2>
		<a class="btn btn-primary" href="/574/createpat.php" role="button">New Data</a>
		<br>
		<table class="table">
			<thead>
			<tr>
				<th>Patient ID</th>
				<th>Patient Name</th>
				<th>Gender</th>
				<th>Age</th>
				<th>Patient IC</th>
				<th>Patient Phone</th>
				<th>Patient Address</th>
				<th>Hospital ID</th>
				<th>Staff ID</th>
			</tr>
			</thead>
		<tbody>
			<?php
			include 'connect.php';
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
			$sql = "select * from patient";
			$result = $connection->query($sql);
			
			if(!$result){
				die("Invalid query: " . $connection->error);
			}
			
			//read data of each row
			while($row = $result->fetch_assoc()){
				echo "
				<tr>
					<td>$row[patientID]</td>
					<td>$row[patientName]</td>
					<td>$row[gender]</td>
					<td>$row[age]</td>
					<td>$row[patientIC]</td>
					<td>$row[patientPhone]</td>
					<td>$row[patientAddress]</td>
					<td>$row[hospitalID]</td>
					<td>$row[staffID]</td>
					<td>
						<a class='btn btn-primary btn-sm' href='/574/editpat.php?patientID=$row[patientID]'>Edit</a>
						<a class='btn btn-danger btn-sm' href='/574/deletepat.php?patientID=$row[patientID]'>Delete</a>
					</td>
				</tr>
				";
			}
			
		
			?>
			
		</table>
	</div>
</body>
</html>