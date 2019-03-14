<?php
	//Link getsession.php
	require_once('../siteSession.php');
	
	if(isset($_POST['logout']))
	{
		//If HTML form POST logout action is submitted
		//Reset the session
		resetSession();
		
		//Redirect into default page
		Redirect('../default.html');
	}
	else
	{
		//If HTML form POST logout action is not submitted
		//Do Nothing
	}
	
	//Check current session state
	getStateUser();
?>



<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Event Management System (EVENTCATOR)</title>
		<link rel="stylesheet" href="../css/styles.css" >
		<script = "text/javascript">
		</script>
	</head>
	<body>
	<header>
		<h1>EVENT MANAGEMENT SYSTEM</h1>
	</header>
		<div class="div-container">
			<div class="div-inner">
			
				<form action="../Management/Events.php" method="post">
					<button type="submit" class="btn" name="viewevent">View Events</button>
				</form>
				
				<form action="../User/JoinEvent.php" method="post">
					<button type="submit" class="btn" name="joinevent">Join Event</button>
				</form>
				
				<form action="Main.php" method="post">
					<button type="submit" class="btn" name="logout">Logout</button>
				</form>
			</div>
		</div>
	</body>
</html>