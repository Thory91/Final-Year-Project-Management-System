<?php
	/*Connect to MySQL*/
	require_once('connect_db.php');
	/*--------------------------------------------------------------------------------------------------*/
	/*--------------------------------------------------------------------------------------------------*/
	
	/*Create table attendance*/
	$query = "CREATE TABLE attendance (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	eventname VARCHAR(50) NOT NULL,
	participant VARCHAR(50) NOT NULL,
	email VARCHAR(100) NOT NULL,
	tel VARCHAR(15) NOT NULL
	)";

	if (mysqli_query($constring,$query)) {
		  echo "Table attendance created successfully.<br>";
	} else {
		  echo "Error creating table: " . mysqli_error($constring) . "\n";
	}
	/*--------------------------------------------------------------------------------------------------*/
	/*--------------------------------------------------------------------------------------------------*/
	
	/*Closing server connection*/
	mysqli_close($constring);
?>