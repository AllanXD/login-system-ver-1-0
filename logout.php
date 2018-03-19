<?php 

	require_once("session_start.php");

	if (isset($_POST['logout'])) {
				
		session_destroy();

		header("Location: login.php");

	}

	

?>