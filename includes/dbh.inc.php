<?php 
	$servername = "localhost";
	$dbUsername = "root";
	$dbPassword = "strawberrychampagne28";
	$dbName = "remade_phonebook";

	$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

	if (!$conn) {
		die("Connection failed: ".mysqli_connect_error());
	} 