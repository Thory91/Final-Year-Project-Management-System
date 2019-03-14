<?php
	/*Connect to MySQL*/
	require_once('connect_db.php');
	/*--------------------------------------------------------------------------------------------------*/
	/*--------------------------------------------------------------------------------------------------*/
	
	/*Create table event*/
	$query = "CREATE TABLE event (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	organizer VARCHAR(50) NOT NULL,
	eventname VARCHAR(50) NOT NULL UNIQUE,
	totalquan INT NOT NULL,
	eventquan INT NOT NULL,
	location VARCHAR(50) NOT NULL,
	sdate DATE NOT NULL,
	edate DATE NOT NULL,
	stime TIME NOT NULL,
	etime TIME NOT NULL,
	eventtel VARCHAR(15) NOT NULL,
	eventdesc VARCHAR(500) NOT NULL
	)";

	if (mysqli_query($constring,$query)) {
		  echo "Table event created successfully.<br>";
	} else {
		  echo "Error creating table: " . mysqli_error($constring) . "\n";
	}
	/*--------------------------------------------------------------------------------------------------*/
	/*--------------------------------------------------------------------------------------------------*/
	
	/*Closing server connection*/
	mysqli_close($constring);
?>