<?php
	/*Connect to MySQL*/
	require_once('connect_db.php');
	/*--------------------------------------------------------------------------------------------------*/
	/*--------------------------------------------------------------------------------------------------*/
	
	/*Create table login*/
	$query = "CREATE TABLE login (
	uid INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	uname VARCHAR(20) NOT NULL UNIQUE,
	pword VARCHAR(255) NOT NULL,
	type VARCHAR(10) NOT NULL
	)";

	if (mysqli_query($constring,$query)) {
		  echo "Table login created successfully.<br>";
	} else {
		  echo "Error creating table: " . mysqli_error($constring) . "\n";
	}
	/*--------------------------------------------------------------------------------------------------*/
	/*--------------------------------------------------------------------------------------------------*/
	
	/*Closing server connection*/
	mysqli_close($constring);
?>