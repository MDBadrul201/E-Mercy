<?php
	session_start();
	include("connect.php");
	$conn;
	mysqli_select_db($conn, "hospital");

	if (isset($_POST["login"])){

		$USERNAME = mysqli_real_escape_string($conn, $_POST["USERNAME"]);
        $PASS = mysqli_real_escape_string($conn, $_POST["PASS"]);
   
		$sql = "SELECT * FROM login WHERE USERNAME = '$USERNAME' AND PASS = '$PASS'";

		$result = mysqli_query($conn, $sql);
 		$rows = mysqli_num_rows($result);

		if($rows == 1) 
		{
			echo ("<SCRIPT LANGUAGE='JavaScript'>
 			window.alert('Login Succesfully! Welcome!')
 			window.location.href='homepagepri.html'
            </SCRIPT>");
            $_SESSION["USERNAME"]=$USERNAME;
            exit();
        }
        else{
			echo ("<SCRIPT LANGUAGE='JavaScript'>
			 window.alert('Wrong username password combination.Please re-enter.')
			 window.location.href='login.php'
			 </SCRIPT>");
			exit();
        }
    }

else{
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login Page</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- Site Metas -->
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <style>
        body {
		font-family: Arial, Helvetica, sans-serif;
		margin: 0;
		background-image: url('image/baker.jpg');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: cover;
  
		}

        .box { 
            width: 500px;
            padding: 40px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #93CAED;
            text-align: center;
        }

        .box input[type="text"], .box input[type="password"] {
            border: 0;
            background: none;
            display: block;
            margin: 20px auto;
            text-align: center;
            border: 2px solid #d0a772;
            padding: 14px 10px;
            width: 200px;
            outline: none;
            color: #fff;
            border-radius: 24px;
            transition: 0.25s;
        }

        .box input[type="text"]:focus, .box input[type="password"]:focus {
            width: 280px;
            border-color: #ddd;
        }

        .box input[type="submit"] {
            border: 0;
            background: none;
            display: block;
            margin: 20px auto;
            text-align: center;
            border: 2px solid #ddd;
            padding: 14px 40px;
            outline: none;
            color: #fff;
            border-radius: 24px;
            transition: 0.25s;
            cursor: pointer;
        }

        .box input[type="submit"]:hover {
            background: #ddd;
            color: #000;
        }

        .box h1 {
            color: #fff;
            text-transform: uppercase;
            font-weight: 500;
        }

        .box h4 {
            color: #fff;
            /*font-weight: 500;*/
        }

        .btnReg {
			width: 100%;
			background: none;
			color: #fff;
			padding: 5px;
			font-size: 18px;
			cursor: pointer;
			margin: 12px 0;
            text-decoration: none;
		}

		.btnReg:hover {
			text-decoration: none;
			color: #d0a772;
		}

    </style>
</head>

<body>
 
    <form class="box" action="login.php" method="POST">
        <h1>Login</h1>
        <input type="text" name="USERNAME" placeholder="Username">
        <input type="password" name="PASS" placeholder="Password">
        <input type="submit" name="login" value="Login">

        <a href="forgotpass.html">Forgot password? Click here</a>
    </form>
</body>
</html>