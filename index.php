<?php include("db_connect_Login.php"); session_start(); $_SESSION["loggedIn"] =0; ?>

<?php
	
	$error=$uname=$pass=""; $count = 0;
	


if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	if(empty($_POST["username"]) || empty($_POST["pass"])){
		$error = "Please Enter All the Fields !";}
	
	
	else{
		$pass = $_POST["pass"];
		$uname =$_POST["username"];
	
	
	$sql = "SELECT userName FROM login_info WHERE userName = 'shreya' AND pass= 'shreya' ";
	$match = mysqli_query($link, $sql);
	$count = mysqli_num_rows($match);
	
	if($count == 1){
		$_SESSION["user"] = $_POST["username"];
		$_SESSION["loggedIn"] = 1;
		header("location: front.php");
	}
	
		else
		$error = "Invalid Password or Username";
}
}

function lr($lrsrt){

	return strtolower($lrsrt);
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Gestion visites</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<style>


	.bar {
		position: relative;
		display: block;
		width: 300px;
	}

	.bar:before,
	.bar:after {
		content: '';
		height: 2px;
		width: 0;
		bottom: 1px;
		position: absolute;
		background: #5264AE;
		transition: 0.2s ease all;
	}

	.bar:before {
		left: 50%;
	}

	.bar:after {
		right: 50%;
	}

	/* active state */
	input:focus~.bar:before,
	input:focus~.bar:after {
		width: 50%;
	}
</style>
</head>
<?php echo $error;?>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<p id="error">
				<?php echo $error ;?>
			</p>
			<div class="wrap-login100">
				<form class="login100-form validate-form"  action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>"  method = "POST">
					<span class="login100-form-title p-b-43">
						Systeme de gestion des visites
					</span>
					
					
					<div class="wrap-input100 validate-input" data-validate = "entrez un username">
						<input class="input100" type="text" name="username" required>
						<span class="focus-input100"></span>
						<span class="bar"></span>
						<span class="label-input100"></span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass">
						<span class="focus-input100"></span>
						<span class="bar"></span>
						<span class="label-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								se souvenir de moi
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Mot de passe oublié
							</a>
						</div>
					</div>
			

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type = "submit">
							Se connecter
						</button>
					</div>
					
					
				</form>

				<div class="login100-more" style="background-image: url('img/bg-01.jpg');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>