<?php
session_start();
if(!isset($_SESSION['acc']))
{
	header('location:loginform.php');
}
?>
<html>
<head>
<Title>Customer</title>
<link rel="stylesheet" type="text/css" href="css/dash.css">

</head>
<body>




<div class="wrapper">
<div id="header">
	<div class="logo"><a href="#">All Nepal<span>Bus Sewa</span></a></div>
	<div class="userl">Customer Panel<hr></div>
</div>
</div>
<div class="wrapper">
<div id="container">
	<div class="sidebar">
		<ul id="nav">
			<li><a href="welcomeclient.php">Home</a></li>
			<li><a href="ticketbook.php">Book Ticket</a></li>
			<li><a href="bookcheck.php">Check Details</a></li>
			<li><a href="bookingupdate.php">Update & Cancel Book</a></li>
			<li><a href="userforum.php">User Forum</a></li>
			<li><a href="logout1.php">Logout</a></li>
		</ul>
	</div>

	<div class="content">
		<h1 class="hm">Customer Table<hr></h1>
		<div class="dsg">
		<?php
		require "User.php";
        $usr = new User();

        $data =$usr->selectbooked($_SESSION['id']);
echo"<table border='1' width='700'>
<tr>
<th>Booking No</th><th>Customer Name</th><th>Bus Type</th><th>Travelling Date</th><th>Depature Time</th><th>Seat no</th><th>Customer Count</th>
<th>Total Price(Rs)</th><th>STATUS</th>
</tr>
";
foreach($data as $key)
{
echo "<tr><td>".$key['b_id']."</td><td>"
               .$key['firstname']." " .$key['lastname']."</td><td>"
               .$key['bustype']."</td><td>"
               .$key['depdate']."</td><td>"
               .$key['dep_time']."</td><td>"
               .$key['seatno']."</td><td>"
               .$key['customer']."</td><td>"
               .$key['Total']."</td><td>"
               .$key['status_cancel']."</td><td>
               
</tr>";
}
echo"</table>";

		?>
		
	</div>
	</div>
	
</div>
</div>



</body>
</html>