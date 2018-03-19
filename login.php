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

	<title>Login</title>
</head>
<body class="bg">

	<div class="login-container">
		
		<h1>DO YOUR LOGIN!</h1>

		<form method="POST">

			<input type="email" placeholder="Email Here" name="email"><br>
			<input type="password" placeholder="Password Here" name="pass"><br>
			<p>If you don't have account, <a href="register.php">Register Here</a>.</p>
			<input type="submit" value="Log In" name="login">

		</form>

		<?php 

			if (isset($_POST['login'])) {

				$valid_login = new TableUser();

				$valid_login->setEmail($_POST['email']);
				$valid_login->setPass($_POST['pass']);

				if ($valid_login->verify()) {

					$email = $valid_login->getEmail();
					
					session_start();

					$_SESSION['login'] = $email;

					header("Location: index.php");

				} else {

					echo "<p class='login-alert'>Email or Password Incorrect</p>";

				}


			}

			if (isset($_GET['r'])) {

				echo "<p class='register-success'>Register Success</p>";

			}

		?>

	</div>

</body>
</html>