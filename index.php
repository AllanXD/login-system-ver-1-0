<?php 

	require_once("session_start.php");

	require_once("config/config.php");

	$datas = new TableUser();

	if (!isset($_SESSION['login'])) {

		header("Location: login.php");

	} else {

		$datas->loadByEmail($_SESSION['login']);

	}

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

	<title>Home Page</title>
</head>
<body class="bg">

	<div class="index-container">
		
		<h1>Welcome, <?php echo $datas->getFirstName()." ".$datas->getLastName(); ?></h1>
		
		<form method="POST" action="logout.php">
		
			<input type="submit" value="Log Out" name="logout">
		
		</form>

	</div>

</body>
</html>