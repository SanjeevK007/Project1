<?php
	$servername = "localhost";
	$database = "youtube";
	$username = "root";
	$password = "";

	$conn = mysqli_connect($servername, $username, $password, $database);

	// Check connection

	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}

	echo “Connected successfully”;

	mysqli_close($conn);

?>