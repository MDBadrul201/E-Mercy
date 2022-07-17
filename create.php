<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "hospital";

//create connection
$connection = new mysqli($servername, $username, $password, $database);

$staffName = "";
$staffDepartment = "";
$hospitalID = "";
$address = "";
$gender_staff = "";
$age_staff = "";

$errorMessage = "";
$successMessage = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$staffName = $_POST["staffName"];
	$staffDepartment = $_POST["staffDepartment"];
	$hospitalID = $_POST["hospitalID"];
	$address = $_POST["address"];
	$gender_staff = $_POST["gender_staff"];
	$age_staff = $_POST["age_staff"];
	
	do{
		if(empty($staffName) || empty($staffDepartment) || empty($hospitalID) || empty($address) || empty($gender_staff) || empty($age_staff) ){
			$errorMessage = "All fields are required";
			break;
		}
		
		//add new doctor data to database
		$sql = "INSERT INTO staff (staffName, staffDepartment, hospitalID, address, gender_staff, age_staff)".
			 "VALUES('$staffName', '$staffDepartment', '$hospitalID', '$address', '$gender_staff', '$age_staff')";
		$result = $connection->query($sql);
		
		if(!$result){
			$errorMessage = "Invalid query: " . $connection->error;
			break;
		}
		
		$staffName = "";
		$staffDepartment = "";
		$hospitalID = "";
		$address = "";
		$gender_staff = "";
		$age_staff = "";
		
		$successMessage = "New data added successfully";
		
		header("location: /574/listdoc.php");
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
	<title>Avenue Hospital: Doctor</title>
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
		<h2>Add New Doctor Data</h2>
		
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
				<label class= "col-sm-3 col-form-label">Doctor Name</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="staffName" value="<?php echo $staffName;?>">
				</div>
			</div>
			<div class ="row mb-3">
				<label class= "col-sm-3 col-form-label">Department</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="staffDepartment" value="<?php echo $staffDepartment;?>">
				</div>
			</div>
			<div class ="row mb-3">
				<label class= "col-sm-3 col-form-label">Hospital ID</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="hospitalID" value="<?php echo $hospitalID;?>">
				</div>
			</div>
			<div class ="row mb-3">
				<label class= "col-sm-3 col-form-label">Address</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="address" value="<?php echo $address;?>">
				</div>
			</div>
			<div class ="row mb-3">
				<label class= "col-sm-3 col-form-label">Gender</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="gender_staff" value="<?php echo $gender_staff;?>">
				</div>
			</div>
			<div class ="row mb-3">
				<label class= "col-sm-3 col-form-label">Age</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="age_staff" value="<?php echo $age_staff;?>">
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
					<a class = "btn btn-outline-primary" href="/574/listdoc.php" role="button">Cancel</a>
			</div>
		</form>
	</div>
</body>
</html>