<?php
	/*Connect to MySQL*/
	require_once('connect_db.php');
	/*--------------------------------------------------------------------------------------------------*/
	/*--------------------------------------------------------------------------------------------------*/
	
	/*Create table login*/
	$query = "DROP TABLE login";

	if (mysqli_query($constring,$query)) {
		  echo "Table login deleted successfully.<br>";
	} else {
		  echo "Error deleting table: " . mysqli_error($constring) . "\n";
	}
	/*--------------------------------------------------------------------------------------------------*/
	/*--------------------------------------------------------------------------------------------------*/
	
	/*Closing server connection*/
	mysqli_close($constring);
?>