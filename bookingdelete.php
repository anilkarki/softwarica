<?php
session_start();
if(!isset($_SESSION['acc-admin']))
{
	header('location:adminlog.php');
}
?>
<html>
<head>
<Title>Customer</title>
<link rel="stylesheet" type="text/css" href="css/dash.css">
<script type="text/javascript">

	function confirming(){
		if (confirm("Are you sure?") == true) {
            return true;
        }
        else{
        	return false;
        }
	}
</script>

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
		<h1 class="hm">Delete Booking Details.<hr></h1><br>
		<div class="msg">
		<?php
require "User.php";
$usr = new User();



if(isset($_POST['delete']))
{
$l=$_POST['bus_no'];
$u=$_POST['dep_date'];
$e = $_POST['dep_time'];
$f = $_POST['seat_no'];
$g = $_POST['customer'];
$h = $_POST['contact'];

$usr->setBusno($l);
$usr->setDepdate($u);
$usr->setDeptime($e);
$usr->setSeatno($f);
$usr->setCustomer($g);
$usr->setContact($h);

if($usr->DeleteBook($_POST['b_id']))
{
?>
	<script type="text/javascript">
	alert("Deleted Successfully");
	</script>
	<?php
}

}

?>

		<form class="fm" method="post">
			Booking No :&nbsp &nbsp &nbsp &nbsp 
			<select name="booking">
			<?php
			$cid = $usr->selectBook2();
			foreach($cid as $value)
			{
				echo "<option value='".$value['b_id']."'>".$value['b_id']."</option>";

			}
			
            ?></select> 
           <input type="submit" name="select" value="Select">
           <?php
           if(isset($_POST['select']))
           {
           	$bno = $_POST['booking'];
           	$usr->selectBook($bno);
           	echo "$bno";
           }
           ?>
           </form>

            </br> </br>
            <form class="fm" method="post" enctype="multipart/form-data">
            Booking No: &nbsp &nbsp &nbsp &nbsp <input type="text" name="b_id" readonly="readonly"  required="required" placeholder="Enter Booking no..." id="em" 
			value="<?php echo $usr->getB_id();?>" /> </br> </br>

			Bus Type :&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<select name="bus_no">
			<option value="<?php echo $usr->getBusno();?>"><?php echo $usr->getBusno();?></option>
			<?php
			require "admin.php";
            $admin = new admin();
			$ctype = $admin->selectBus();
			foreach($ctype as $value)
			{
				echo "<option value='".$value['busno']."'>".$value['bustype']."</option>";

			}
			
            ?></select>  </br> </br>

			Travelling Date :&nbsp &nbsp<input type="date" name="dep_date" required="required" placeholder="Choose Date.." id="pn" 
			value="<?php echo $usr->getDepdate();?>"/>&nbsp&nbsp
			<button> <a href="calendar.php">Check Available Date</a> </button> </br> </br>
			Depature Time:&nbsp &nbsp &nbsp<select name="dep_time">
			<option value="<?php echo $usr->getDeptime();?>"><?php echo $usr->getDeptime();?></option>
			<?php
			$ctype = $admin->selectBus();
			foreach($ctype as $value)
			{
				echo "<option value='".$value['deptime']."'>".$value['deptime']."</option>";

			}
			
            ?></select>  </br> </br>
			Seat no:&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp<input type="text" name="seat_no" required="required" placeholder="Enter Seat no.." id="pn"  value="<?php echo $usr->getSeatno();?>"/> &nbsp&nbsp
			<button> <a href="checkseat.php">Check Available Seat</a> </button> </br> </br>
			No of Customer :&nbsp &nbsp<input type="text" name="customer" required="required" placeholder="Enter no of customer.." id="pn" value="<?php echo $usr->getCustomer();?>"/> </br> </br>

			Contact no:&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input type="text" name="contact" required="required" placeholder="Enter contact no.." id="pn" value="<?php echo $usr->getContact();?>"/>
			 </br> </br> </br> </br>

            <input type="Submit" name="delete" class="ud" value="Delete" onclick="return confirming()" />
            
            </form>


		
	</div>
	</div>
	
</div>
</div>



</body>
</html>