<?php

	require_once("config".DIRECTORY_SEPARATOR."config.php");

	
	$user = new TableUser();

	$user->loadById(6);

	echo $user;
	

	/*
	$cadastro = array(

		'fn' => "Son",
		'ln' => "Goku",
		'bd' => "1984-06-04",
		'e'  => "songoku@dragonball.com",
		'p'  => "1234567890"

	);

	$insert = new TableUser($cadastro);

	$insert->insert();

	echo $insert;
	*/