<?php 

	require_once("config/config.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<!-- RESPONSIVE CODE -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- FONT -->
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

	<title>Register</title>
</head>
<body class="bg">

	<div class="register-container">
		
		<h1>DO YOUR REGISTER</h1>

		<form method="POST">

			<input type="text" placeholder="First Name" name="firstname">
			<input type="text" placeholder="Last Name" name="lastname">
			<input type="date" placeholder="Birth Date" name="birthdate">
			<input type="email" placeholder="Email Here" name="email">
			<input type="password" placeholder="Password Here" name="pass">
			<input type="password" placeholder="Password Again" name="verypass">
			<p>If you already have accont, <a href="login.php">Log in here</a>.</p>
			<input type="submit" value="Register" name="register">

		</form>

		<?php 

			if (isset($_POST['register'])) {
				
				$fn = $_POST['firstname'];
				$ln = $_POST['lastname'];
				$bd = $_POST['birthdate'];
				$e  = $_POST['email'];
				$p  = $_POST['pass'];
				$vp = $_POST['verypass'];

				$register_user = new TableUser();

				if ($p != $vp) {
					
					echo "<p class='register-alert'>Your password is not equal to verify</p>";

				} else if ($fn == "" || $ln == "" || $bd == "" || $e == "" || $p == "" || $vp == "") {

					echo "<p class='register-alert'>None of forms can be empty</p>";

				} else if ($register_user->isEmailExists($e)) {

					echo "<p class='register-alert'>This email already exists. Please go to <a href='login.php'>Login Page</a>.</p>";

				} else {

					$register_user = new TableUser($fn, $ln, $bd, $e, $p);

					$register_user->insert();

					header("Location: login.php?r=ok");

				}
			}

		?>

	</div>

</body>
</html>