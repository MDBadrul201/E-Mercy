<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "hospital";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);

	if(isset($_POST['submit'])){
		if(!empty($_POST['staffID']) && !empty($_POST['staffName']) && !empty($_POST['staffDepartment']) && !empty($_POST['hospitalID']) && !empty($_POST['address']) && !empty($_POST['gender_staff']) && !empty($_POST['age_staff'])){ 
		
		$staffID = $_POST['staffID'];
		$staffName = $_POST['staffName'];
		$staffDepartment = $_POST['staffDepartment'];
		$hospitalID = $_POST['hospitalID'];
		$address = $_POST['address'];
		$gender_staff = $_POST['gender_staff'];
		$age_staff = $_POST['age_staff'];
		
		$query = "insert into staff(staffID,staffName,staffDepartment,hospitalID,address,gender_staff,age_staff) values('$staffID','$staffName','$staffDepartment','$hospitalID','$address','$gender_staff','$age_staff')";
		
		$query = mysqli_query($conn, $query) or die (mysqli_error($conn)); 
		

	}}
?>