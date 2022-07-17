<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "hospital";

//create connection
$connection = new mysqli($servername, $username, $password, $database);

$type_treatment = "";
$staffID = "";
$patientID = "";

$errorMessage = "";
$successMessage = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$type_treatment = $_POST["type_treatment"];
	$staffID = $_POST["staffID"];
	$patientID = $_POST["patientID"];
	
	do{
		if(empty($type_treatment) || empty($staffID) || empty($patientID)){
			$errorMessage = "All fields are required";
			break;
		}
		
		//add new patient data to database
		$sql = "INSERT INTO treatment (type_treatment, staffID, patientID)".
			 "VALUES('$type_treatment', '$staffID', '$patientID')";
		$result = $connection->query($sql);
		
		if(!$result){
			$errorMessage = "Invalid query: " . $connection->error;
			break;
		}
		
		$type_treatment = "";
		$staffID = "";
		$patientID = "";
		
		$successMessage = "New data added successfully";
		
		header("location: /574/treatment.php");
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
	<title>Avenue Hospital: Treatment</title>
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
		<h2>Add New Treatment Data</h2>
		
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
				<label class= "col-sm-3 col-form-label">Type Of Treatment</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="type_treatment" value="<?php echo $type_treatment;?>">
				</div>
			</div>
			<div class ="row mb-3">
				<label class= "col-sm-3 col-form-label">Staff ID</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="staffID" value="<?php echo $staffID;?>">
				</div>
			</div>
			<div class ="row mb-3">
				<label class= "col-sm-3 col-form-label">Patient ID</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="patientID" value="<?php echo $patientID;?>">
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
					<a class = "btn btn-outline-primary" href="/574/treatment.php" role="button">Cancel</a>
			</div>
		</form>
	</div>
</body>
</html>