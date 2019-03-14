<?php
	//Link getsession.php
	require_once('../siteSession.php');
	
	//Check current session state
	getStateOrganizer();
?>



<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Join Event</title>
		
		<link rel="stylesheet" href="../css/styles.css" >
			
		<script = "text/javascript">
			function goBack() {
				window.history.back();
			}
			
			function goHome() {
				window.location='../Organizer/Main.php';
			}
		</script>
	</head>

	<body>
		<header>
			<h1>EVENT MANAGEMENT SYSTEM</h1>
		</header>
			
		<div class="div-container-fluid">
			<h2>Attendance Tracking</h2>
			<div class="div-inner-table">
				</br>
				<table>
					<tr>
						<th>Event</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone Number</th>
					</tr>
					<?php
						//connect to mysql
						require_once('../db/connect_db.php');

						$query = "SELECT * FROM attendance ORDER BY eventname ASC";
						$sql = mysqli_query($constring,$query);

						while($row = mysqli_fetch_array($sql)){
							echo "<tr>
									<td>".$row['eventname']."</td>
									<td>".$row['participant']."</td>
									<td>".$row['email']."</td>
									<td>".$row['tel']."</td>
								</tr>";
						}
						
						//Closing MySQL connection
						mysqli_close($constring);
					?>
				</table>		
			</div>
			<div class="div-navbtn">
				<div class="div-navbtn-round">
					<button onclick=goHome() class= "btn-round" name="back"><img src="../resources/return.png"></button>
				</div>
			</div>
		</div>
	</body>
</html>