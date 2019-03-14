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
	getStateUser();

	if(isset($_POST['submit']))
	{	
		//If HTML form POST action is submitted
		//Connect to MySQL
		require_once('../db/connect_db.php');

		//Insert data into table attendance
		$insert = "INSERT INTO attendance(id,eventname,participant,email,tel) 
				VALUES('','$_POST[eventname]','$_POST[participant]',
				'$_POST[email]','$_POST[tel]')";
			
		//Select all from event
		$query = "SELECT * FROM event WHERE eventname='$_POST[eventname]'";
		$select = mysqli_query($constring,$query);
		
		//Store the selected row in array
		$row = mysqli_fetch_array($select);
		
		if($row['eventquan'] <1)
		{
			//Alert for unsuccessful joining event
			popup("Join Event Failed: No Available Tickets");
		}
		else
		{
			//Reduce the number of ticket by 1
			$new_eventquan = $row['eventquan'] - 1;

			if(mysqli_query($constring,$insert))
			{
				//Alert for successful joining event
				popup("Successfully Joining an Event");
				
				//Update event ticket quantity from event
				$update = "UPDATE event SET eventquan='$new_eventquan' 
						WHERE eventname='$_POST[eventname]'";
						
				if(mysqli_query($constring,$update))
				{
					//Alert for successful joining event
					//popup("Successfully Updating Event");
					
					//Refresh page
					RedirectJS('JoinEvent.php');
				}
				else
				{
					//Alert for unsuccessful reducing ticket quantity
					popup("Update Event Failed: DB Connection Failed");
				}
			}
			else
			{
				//Alert for unsuccessful joining event
				popup("Join Event Failed: DB Connection Failed");
			}
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
		
		<link rel="stylesheet" href="../css/styles.css">
			
		<script = "text/javascript">
			function goBack() 
			{
				window.history.back();
			}
			
			function goHome() 
			{
				window.location='../User/Main.php';
			}
		</script>
	</head>

	<body>
		<header>
			<h1>EVENT MANAGEMENT SYSTEM</h1>
		</header>
			
		<div class="div-container-fluid">
			<h2>Join Event</h2>
			<div class="div-inner-content">
				</br>
				<p>Please fill up the following form:</p>
				</br>
				<form method="POST" action="JoinEvent.php"/>
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
					<p><label>Participant Name: </label><input type="text" class="form-control" name="participant" 
														value="<?php echo $_SESSION['name']; ?>" Required /></p>
					<p><label>Email: </label><input type="email" class="form-control" name="email" Required /></p>
					<p><label>Phone Number: </label><input type="tel" class="form-control" name="tel" 
													placeholder="xxx-xxxxxxxx" pattern="(\d{3}-\d{8})|(\d{3}-\d{7})" Required /></p>
					
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