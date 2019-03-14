<?php
	//Link getsession.php
	require_once('../siteSession.php');
	
	//Check current session state
	getState();
?>



<!Doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>View Event</title>
		
		<link rel="stylesheet" href="../css/styles.css">
		
		<script = "text/javascript">
			function goBack() {
				window.history.back();
			}
		</script>
	</head>
	
	<body>
		<header>
			<h1>EVENT MANAGEMENT SYSTEM</h1>
		</header>
	
		<div class="div-container-fluid">
			<h2>Event Calendar</h2>
			<div class="div-inner-table">
				</br>
				<?php
					//Connect to MySQL
					require_once('../db/connect_db.php');
						
					$query = "SELECT * FROM event ORDER BY sdate ASC";
					$sql = mysqli_query($constring,$query);
						
					while($row = mysqli_fetch_array($sql))
					{	
						echo	"<h3>Date: ".$row['sdate']."</h3>";
						echo	"<h4>Time: ".$row['stime']." - ".$row['etime']."</h4>";
						echo	"<table>
									<thead>
										<th>Event Name</th>
										<th>Organizer</th>
										<th>Location</th>
										<th>Telephone No.</th>
										<th>Description</th>
										<th>Ticket Quantity</th>
										<th>Available Ticket</th>
									</thead>
									<tbody>
										<tr>
											<td>".$row['eventname']."</td>
											<td>".$row['organizer']."</td>
											<td>".$row['location']."</td>
											<td>".$row['eventtel']."</td>
											<td>".$row['eventdesc']."</td>
											<td><center>".$row['totalquan']."</center></td>
											<td><center>".$row['eventquan']."</center></td>
										</tr>
									</tbody>
								</table>";
					}
					
					//Closing MySQL connection
					mysqli_close($constring);
				?>
			</div>
			<div class="div-navbtn">
				<div class="div-navbtn-round">
					<button onclick=goBack() class= "btn-round" name="back"><img src="../resources/return.png"></button>
				</div>
			</div>
		</div>
	</body>
</html>