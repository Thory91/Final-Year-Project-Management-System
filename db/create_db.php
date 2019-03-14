<?php
	/*Connect to MySQL*/
	$constring = mysqli_connect("localhost", "root", "");
	if (!$constring) {
		die("Could not connect: " . mysqli_connect_error());
	}

	/*Create database ems*/
	$db_selected = mysqli_select_db($constring,"ems");

	if (!$db_selected) {
	  //If db does not exist
	  $query = "CREATE DATABASE ems";
	  if (mysqli_query($constring,$query)) {
		  echo "Database ems created successfully.<br>";
		  $db_selected = mysqli_select_db($constring,"ems");} 
	  else {
		  echo "Error creating database: " . mysqli_error($constring) . "\n";
	  }
	}

	/*Closing server connection*/
	mysqli_close($constring);
?>