<?php
if (isset ($_GET["staffID"])){
	$staffID = $_GET["staffID"];
	
	$servername = "localhost";
			$username = "root";
			$password = "";
			$database = "hospital";
			
	//create connection
	$connection = new mysqli($servername, $username, $password, $database);
	
	$sql = "DELETE FROM staff WHERE staffID = $staffID";
	$connection->query($sql);
}

header ("location: /574/listdoc.php");
exit;
?>