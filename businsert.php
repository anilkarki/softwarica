<?php
session_start();
if(!isset($_SESSION['acc-admin']))
{
	header('location:adminlog.php');
}
?>
<html>
<head>
<Title>Admin</title>
<link rel="stylesheet" type="text/css" href="css/dash.css">

</head>
<body>
<div class="wrapper">
<div id="header">
	<div class="logo"><a href="#">All Nepal<span>Bus Sewa</span></a></div>
	<div class="userl">Admin Panel<hr></div>
</div>
</div>
<div class="wrapper">
<div id="container">
	<div class="sidebar">
		<ul id="nav">
			<li><a href="adminwc.php">Home</a></li>
			
			<li><a href="businsert.php">Insert Bus Details</a></li>
			<li><a href="updatebus.php">Update Bus Details </a></li>
			<li><a href="deletebus.php">Delete Bus Details </a></li>
			<li><a href="customerdetails.php">Customer Table</a></li>
			<li><a href="bookingdelete.php">Delete Bookings</a></li>
			<li><a href="calendarinsert.php">Insert Calendar </a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>

	<div class="content">
		<h1 class="hm">Insert Bus Details<hr></h1>
		<div class="msg">
		<?php
require "admin.php";
$admin = new admin();

if(isset($_POST['submit']))
{
$n = $_POST['bus_no'];
$l=$_POST['bus_type'];
$u=$_POST['ticket_price'];
$e = $_POST['bus_route'];
$h=$_POST['dep_time'];


$admin->setBusno($n);
$admin->setBustype($l);
$admin->setBusroute($e);
$admin->setTicketprice($u);
$admin->setDeptime($h);

if($admin->AddBus())
{
	
	?>
	<script type="text/javascript">
	alert("Inserted Successfully");
	</script>
	<?php
}
}

?>
		<form class="fm" method="post" enctype="multipart/form-data">
			Bus No :&nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp  <input type="text" name="bus_no" required="required" placeholder="Enter Bus no." id="nam" /> </br> </br>
			Bus Type :&nbsp &nbsp &nbsp &nbsp &nbsp  <select name="bus_type">
				<option value="AC-Deluxe">AC-Deluxe</option>
				<option value="Deluxe">Deluxe</option>
				<option value="Normal">Normal</option>
			</select></br> </br>
			Bus Route :&nbsp &nbsp &nbsp &nbsp <input type="text" name="bus_route" required="required" placeholder="Enter Route.." id="pn" /> </br> </br>
			Depature Time :&nbsp &nbsp &nbsp<input type="time" name="dep_time" required="required" placeholder="Enter time.." id="pn" />  </br> </br>
			Ticket Price :&nbsp &nbsp &nbsp<input type="text" name="ticket_price" required="required" placeholder="Enter Price.." id="pn" /> (Rs) </br> </br></br> </br>

			<input type="Submit" name="submit" value="Insert" class="ins" />

		</form>
	</div>
	</div>
	
</div>
</div>
<!-- 

<div class="regis">

<h1>&nbsp &nbsp Cabin register</h1><br>
<form method="post" enctype="multipart/form.data">
<fieldset>
		<legend>
			&nbsp &nbsp Register Here!! <br><br>
		</legend>
		<p>
			<label>Cabin No:</label>

		 <input type="text" name="cabin_no" tabindex="1" accesskey="u"  required="required"> </p></br>
		<p>
			<label>Cabin Type:</label>
		 <input type="text" name="cabin_type" tabindex="3" accesskey="w" required="required"> </p></br>
		<p>
			<label>Cabin Price:</label>
		<input type="text" name="cabin_price" tabindex="4" accesskey="x" required="required"> </p></br>
		
		<p>
			<label>Cabin Images:</label>
		 <input type="hidden" name="size" value="1000000" required="required">
		 <input type="file" name="cabin_img"><br>
		 
		 </p>
		 <br>

		<p> <label>Cabin Features:</label>
		&nbsp &nbsp <textarea name="cabin_feature" cols="40" rows="4" placeholder="Say something about this......!!" 
		required="required"></textarea></p></br>
		<p>
		</br></br>
		<p>
			&nbsp &nbsp &nbsp &nbsp <button name="add" >INSERT</button>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
			<button name="Exit"><a href="#">
			CANCEL</a></button>
		</p>
		</br></br></br><br><br><br><br><br><br>

	</fieldset>
</form>

</div>
!-->


</body>
</html>