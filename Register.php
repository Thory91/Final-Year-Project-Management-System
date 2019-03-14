<?php
	//JS alert function
	function popup($message)
	{
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
	
	//JS redirect function
	function RedirectJS($url)
	{
		echo "<script type='text/javascript'>window.location='" . $url . "';</script>";
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
		require_once('db/connect_db.php');
		
		//Hashing the user password using BCRYPT
		$hash_pword = password_hash($_POST['pword'],PASSWORD_BCRYPT);

		//Insert data into table attendance
		$sql = "INSERT INTO login(uid,uname,pword,type) 
				VALUES('','$_POST[uname]','$hash_pword','$_POST[type]')";

		if(mysqli_query($constring,$sql))
		{
			//Alert for successful creating account
			popup("Successfully Created New Account");
			
			//Redirect into user's main page
			RedirectJS('default.html');
		}
		else
		{
			//Alert for unsuccessful creating account
			popup("Register Failed: Account Existed or DB Connection Failed");
		}
			
		//Closing MySQL connection
		mysqli_close($constring);
	}
	else
	{
		//If HTML form POST action is not submitted
		//Do Nothing
	} 
?>



<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Join Event</title>
		
		<link rel="stylesheet" href="css/styles.css">
			
		<script = "text/javascript">
			function goBack() 
			{
				window.history.back();
			}
			
			function goHome() 
			{
				window.location='default.html';
			}
		</script>
	</head>

	<body>
		<header>
			<h1>FYP MANAGEMENT SYSTEM</h1>
		</header>
			
		<div class="div-container">
			<h2>Register New Account</h2>
			<div class="div-inner-content">
				</br>
				<p>Please fill up the following form:</p>
				</br>
				<form method="POST" action="Register.php"/>
					<p><label>Account Type: </label>
						<select name="type" class="form-control" Autofocus>
							<option value="user">Student</option>
							<option value="organizer">Lecturer</option>
						</select>
					</p>
					<p><label>ID: </label><input type="text" class="form-control" name="uname" Required /></p>
					<p><label>New Password: </label><input type="password" class="form-control" name="pword" Required /></p>
					
					<p><button type="submit" class="btn" name="submit">Create</button></p>
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