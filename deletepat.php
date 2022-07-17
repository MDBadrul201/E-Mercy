<?php
if (isset ($_GET["patientID"])){
	$patientID = $_GET["patientID"];
	
	$servername = "localhost";
			$username = "root";
			$password = "";
			$database = "hospital";
			
	//create connection
	$connection = new mysqli($servername, $username, $password, $database);
	
	$sql = "DELETE FROM patient WHERE patientID = $patientID";
	$connection->query($sql);
}

header ("location: /574/listpat.php");
exit;
?>