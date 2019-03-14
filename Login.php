<?php
	//Starting session
	session_start();
	session_regenerate_id(true);

	//JS alert function
	function popup($message)
	{
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
	
	//Redirect function
	function Redirect($url)
	{
		if (headers_sent() === false)
		{
			header('Location: ' . $url);
		}
		exit();
	}
	
	
	if(isset($_POST['submit']))
	{
		//If HTML form POST action is submitted
		//Connect to MySQL
		require_once('./db/connect_db.php');
		
		//Select all from login
		$query = "SELECT * FROM login WHERE uname='$_POST[uname]'";
		$select = mysqli_query($constring,$query);
		
		//Store the selected row in array
		$row = mysqli_fetch_array($select);
		
		//Get value from stored array
		$hash_pword = $row['pword'];
		  
		if ((($rowcount = mysqli_num_rows($select))==1) && (password_verify($_POST['pword'],$hash_pword))) 
		{
			//Get value from stored array
			if($row['type'] == "organizer")
			{
				//If login as an organizer
				//Insert data into session
				$_SESSION['name'] = $_POST['uname'];
				$_SESSION['type'] = $row['type'];
				$_SESSION['status'] = true;
				
				//Redirect into organizer's main page
				Redirect('./Organizer/Main.php');
			}
			else
			{
				//If login as a user
				//Insert data into session
				$_SESSION['name'] = $_POST['uname'];
				$_SESSION['type'] = $row['type'];
				$_SESSION['status'] = true;
				
				//Redirect into user's main page
				Redirect('./User/Main.php');
			}		  
		} 
		else 
		{
			//Alert for unsuccessful login
			popup("Login Failed: Wrong Username or Password!");
		}
		
		//Closing MySQL connection
		mysqli_close($constring);
	}
	else
	{
		//If HTML form POST action is not submitted
		//Reset login status into session
		$SESSION['status'] = false;
	}
?>



<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Event Management System (EVENTCATOR)</title>
		
		<link rel="stylesheet" href="css/styles.css">
		
		<script = "text/javascript">
			function goHome() 
			{
				window.location='./default.html';
			}
		</script>
	</head>
	<body>
	<header>
		<h1>FYP MANAGEMENT SYSTEM</h1>
	</header>
		<div class="div-container">
			<div class="div-inner">
				<form method="POST" action="login.php">
					<p><label> ID	: </label><input type="text" class="form-control" name="uname" required /></p>
					<p><label> Password	: </label><input type="password" class="form-control" name="pword" required /></p>
					
					<p><button type="submit" class="btn" name="submit">Login</button></p>
				</form>
			</div>
			<div class="div-navbtn">
				<div class="div-navbtn-round">
					<button onclick=goHome() class= "btn-round" name="back"><img src="./resources/return.png"></button>
				</div>
			</div>
		</div>
	</body>
</html>