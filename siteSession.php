<?php
	//Start session
	session_start();
	
	//Redirect function
	function Redirect($url)
	{
		if (headers_sent() === false)
		{
			header('Location: ' . $url);
		}
		exit();
	}
	
	//Function to verify session state
	function getState()
	{
		if($_SESSION['status'] != true)
		{
			//Redirect into login page
			Redirect('../Login.php', false);
		}
	}
	
	//Function to verify user session state
	function getStateUser()
	{
		if(($_SESSION['status'] != true) || ($_SESSION['type'] != "user"))
		{
			//Redirect into login page
			Redirect('../Login.php', false);
		}
	}
	
	//Function to verify organizer session state
	function getStateOrganizer()
	{
		if(($_SESSION['status'] != true) || ($_SESSION['type'] != "organizer"))
		{
			//Redirect into login page
			Redirect('../Login.php', false);
		}
	}
	
	//Function to reset the session
	function resetSession()
	{
		//Destroying current sesion
		session_destroy();
		
		//Reset login status into session
		$_SESSION['status'] = false;
		$_SESSION['type'] != "";
	}
?>