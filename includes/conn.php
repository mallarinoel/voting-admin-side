<?php
	$conn = new mysqli('0.0.0.0:3306', 'root', 'root', 'votesystem');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>