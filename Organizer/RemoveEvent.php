<?php
	//Link getsession.php
	require_once('../siteSession.php');

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
	
	//Check current session state
	getStateOrganizer();
	
	if(isset($_POST['submit']))
	{
		//If HTML form POST action is submitted
		//Connect to MySQL
		require_once('../db/connect_db.php');

		//Delete data from table event
		$sql = "DELETE FROM event WHERE eventname='$_POST[eventname]'";

		if(mysqli_query($constring,$sql))
		{
			//Alert for successful deleting event
			popup("Successfully Removed an Event");
			
			//Refresh page
			RedirectJS('RemoveEvent.php');
		}
		else
		{
			//Alert for unsuccessful deleting event
			popup("Remove Event Failed: DB Connection Failed");
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
		<title>Remove Event</title>
		
		<link rel="stylesheet" href="../css/styles.css">
			
		<script = "text/javascript">
			function goBack() 
			{
				window.history.back();
			}
			
			function goHome() 
			{
				window.location='../Organizer/Main.php';
			}
		</script>
	</head>

	<body>
		<header>
			<h1>EVENT MANAGEMENT SYSTEM</h1>
		</header>
			
		<div class="div-container-fluid">
			<h2>Remove Event</h2>
			<div class="div-inner-content">
				</br>
				<p>Please fill up the following form:</p>
				</br>
				<form method="POST" action="RemoveEvent.php"/>
					<p><label>Event Name: </label>
						<select name="eventname" class="form-control" Autofocus>
							<?php
								//Connect to MySQL
								require_once('../db/connect_db.php');
									
								$query = "SELECT eventname FROM event";
								$sql = mysqli_query($constring,$query);
									
								while($row = mysqli_fetch_array($sql))
								{
									echo "<option>".$row['eventname']."</option>";
								}
							?>
						</select>
					</p>
					
					<p><button type="submit" class="btn" name="submit">Delete</button></p>
				</form>
			</div>
			<div class="div-navbtn">
				<div class="div-navbtn-round">
					<button onclick=goHome() class= "btn-round" name="back"><img src="../resources/return.png"></button>
				</div>
			</div>
		</div>
	</body>
</html>