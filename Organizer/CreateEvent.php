<?php
	//Link getsession.php
	require_once('../siteSession.php');

	//JS alert function
	function popup($message)
	{
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
	
	//Check current session state
	getStateOrganizer();
	
	if(isset($_POST['submit']))
	{
		//If HTML form POST action is submitted
		//Connect to MySQL
		require_once('../db/connect_db.php');
		
		//Insert data into table event
		$sql = "INSERT INTO event(id,organizer,eventname,totalquan,eventquan,location,sdate,edate,stime,etime,eventtel,eventdesc) 
				VALUES ('','$_POST[organizer]','$_POST[eventname]','$_POST[eventquan]','$_POST[eventquan]','$_POST[location]','$_POST[sdate]',
				'$_POST[edate]','$_POST[stime]','$_POST[etime]','$_POST[eventtel]','$_POST[desc]')";

		if (mysqli_query($constring,$sql))
		{
			//Alert for successful creating event
			popup("Successfully Created New Event");
		}
		else
		{
			//Alert for unsuccessful creating event
			popup("Create Event Failed: Event Existed or DB Connection Failed");
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
		<title>Create Event</title>
		
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
			<h2>Create Event</h2>
			<div class="div-inner-content">
				</br>
				<p>Please fill up the following form:</p>
				</br>
				<form method="POST" action="CreateEvent.php"/>

					<p><label>Organizer Name: </label><input type="text" class="form-control" name="organizer" 
												value="<?php echo $_SESSION['name']; ?>" required /></p>
					<p><label>Event Name: </label><input type="text" class="form-control" name="eventname" required autofocus /></p>
					<p><label>Ticket Quantity: </label><input type="text" class="form-control" name="eventquan" required /></p>
					<p><label>Location: </label><input type="text" class="form-control" name="location" required /></p>
					<p><label>Start Date: </label><input type="date" class="form-control" name="sdate" required /></p>						
					<p><label>End Date: </label><input type="date" class="form-control" name="edate" required /></p>
					<p><label>Start Time: </label><input type="time" class="form-control" name="stime" required /></p>
					<p><label>End Time:  </label><input type="time" class="form-control" name="etime" required /></p>
					<p><label>Telephone Number: </label><input type="tel" class="form-control" name="eventtel" 
															placeholder ="xxx-xxxxxxx" pattern="(\d{3}-\d{8})|(\d{3}-\d{7})" required /></p>
					<p><label>Event Descriptions: </label><textarea name="desc" class="form-control" rows="3" cols="36" 
															placeholder="Enter descriptions here..."></textarea></p>
						
					<p><button type="submit" class="btn" name="submit">Submit</button></p>					
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