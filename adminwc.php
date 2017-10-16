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
		<h1 class="hm">Home<hr></h1>
		<h2 class="wc">Welcome ! ! to the Admin Panel ! !</h2>
		<p class="word">Here, you can add, update and delete the cabins service, you can check the booking <br>details and you can update your info..</p>
	</div>
	
</div>
</div>
<!-- 
<?php
//require "admin.php";
//$admin = new admin();

//if(isset($_POST['add']))
{
//$n = $_POST['cabin_no'];
//$l=$_POST['cabin_type'];
//$u=$_POST['cabin_price'];
 //$pr= $_POST['cabin_img'];
//$e = $_POST['cabin_feature'];

$admin->setCabin_no($n);
$admin->setCabin_type($l);
$admin->setCabin_price($u);
$admin->setCabin_img($pr);
$admin->setCabin_feature($e);
//if($admin->AddCabin())
{
	//echo 'Inserted seccussfully!';
}
}

?>
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