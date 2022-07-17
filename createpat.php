<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "hospital";

//create connection
$connection = new mysqli($servername, $username, $password, $database);

$patientID = "";
$patientName = "";
$gender = "";
$age = "";
$patientIC = "";
$patientPhone = "";
$patientAddress = "";
$hospitalID = "";
$staffID = "";

$errorMessage = "";
$successMessage = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$patientID = $_POST["patientID"];
	$patientName = $_POST["patientName"];
	$gender = $_POST["gender"];
	$age = $_POST["age"];
	$patientIC = $_POST["patientIC"];
	$patientPhone = $_POST["patientPhone"];
	$patientAddress = $_POST["patientAddress"];
	$hospitalID = $_POST["hospitalID"];
	$staffID = $_POST["staffID"];
	
	do{
		if(empty($patientID) || empty($patientName) || empty($gender) || empty($age) || empty($patientIC) || empty($patientPhone) || empty($patientAddress) || empty($hospitalID) || empty($staffID)){
			$errorMessage = "All fields are required";
			break;
		}
		
		//add new patient data to database
		$sql = "INSERT INTO patient (patientID, patientName, gender, age, patientIC, patientPhone, patientAddress, hospitalID, staffID)".
			 "VALUES('$patientID', '$patientName', '$gender', '$age', '$patientIC', '$patientPhone', '$patientAddress', '$hospitalID', '$staffID')";
		$result = $connection->query($sql);
		
		if(!$result){
			$errorMessage = "Invalid query: " . $connection->error;
			break;
		}
		
		$patientID = "";
		$patientName = "";
		$gender = "";
		$age = "";
		$patientIC = "";
		$patientPhone = "";
		$patientAddress = "";
		$hospitalID = "";
		$staffID = "";
		
		$successMessage = "New data added successfully";
		
		header("location: /574/listpat.php");
		exit;
		
	}while(false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset = "UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale= 1.0">
	<title>Avenue Hospital: Patient</title>
	<link rel="stylesheet" href= "https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
	<script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
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
 </style>

</head>
<body>
	<div class = "container my-5">
		<h2>Add New Patient Data</h2>
		
		<?php
			if(!empty($errorMessage)){
				echo "
				<div class = 'alert alert-warning alert-dismissable fade show' role='alert'>
					<strong>$errorMessage</strong>
					<button type= 'button' class= 'btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
				</div>
				";
			}
		?>
		
		<form method ="post">
			<div class ="row mb-3">
				<label class= "col-sm-3 col-form-label">Patient ID</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="patientID" value="<?php echo $patientID;?>">
				</div>
			</div>
			<div class ="row mb-3">
				<label class= "col-sm-3 col-form-label">Patient Name</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="patientName" value="<?php echo $patientName;?>">
				</div>
			</div>
			<div class ="row mb-3">
				<label class= "col-sm-3 col-form-label">Gender</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="gender" value="<?php echo $gender;?>">
				</div>
			</div>
			<div class ="row mb-3">
				<label class= "col-sm-3 col-form-label">Age</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="age" value="<?php echo $age;?>">
				</div>
			</div>
			<div class ="row mb-3">
				<label class= "col-sm-3 col-form-label">Patient IC</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="patientIC" value="<?php echo $patientIC;?>">
				</div>
			</div>
			<div class ="row mb-3">
				<label class= "col-sm-3 col-form-label">Patient Phone</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="patientPhone" value="<?php echo $patientPhone;?>">
				</div>
			</div>
			<div class ="row mb-3">
				<label class= "col-sm-3 col-form-label">Patient Adress</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="patientAddress" value="<?php echo $patientAddress;?>">
				</div>
			</div>
			<div class ="row mb-3">
				<label class= "col-sm-3 col-form-label">Hospital ID</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="hospitalID" value="<?php echo $hospitalID;?>">
				</div>
			</div>
			<div class ="row mb-3">
				<label class= "col-sm-3 col-form-label">Staff ID</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="staffID" value="<?php echo $staffID;?>">
				</div>
			</div>
			
			<?php
				if(!empty($successMessage)){
				echo "
				<div class='row mb-3'>
					<div class='offset-sm-3 col-sm-6'>
						<div class = 'alert alert-success alert-dismissable fade show' role='alert'>
							<strong>$successMessage</strong>
							<button type= 'button' class= 'btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
						</div>
					</div>
				</div>
				";
			}
			?>
			
			<div class = "row mb-3">
				<div class ="offset-sm-3 col-sm-3 d-grid">
					<button type ="submit" class="btn btn-primary">Submit</button>
				</div>
				<div class = "col-sm-3 d-grid">
					<a class = "btn btn-outline-primary" href="/574/listpat.php" role="button">Cancel</a>
			</div>
		</form>
	</div>
</body>
</html>