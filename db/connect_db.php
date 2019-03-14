<?php
	/*Connect to MySQL*/
	$constring = mysqli_connect("localhost","root","");
	if (!$constring) {
		die("Could not connect: " . mysqli_connect_error());
	}
	
	/*Select database ems*/
	$db_selected = mysqli_select_db($constring,"ems");
	
	if (!$db_selected) {
	  // If we couldn't, then it either doesn't exist, or we can't see it.
	  echo "Error connecting to database: " . mysqli_error($constring) . "\n";
	}
?>