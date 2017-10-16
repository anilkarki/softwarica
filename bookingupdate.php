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
<script type="text/javascript">
 
	function frmval()
	{
		
        
    

		var aa= document.forms["fmbook"]["b_id"].value;
		var bb= document.forms["fmbook"]["bus_no"].value;
		var cc= document.forms["fmbook"]["dep_date"].value;
		var dd= document.forms["fmbook"]["seat_no"].value;
		var ee= document.forms["fmbook"]["customer"].value;
		var ff= document.forms["fmbook"]["contact"].value;

	
	
	if (aa=="")
	{
		alert("Sorry ! ! please first click on select butoon on top right of booking no !");
		return false;
	}
	if(bb==""){
		alert("Sorry ! ! please select bustype first !");
		return false;

	}
	if(cc==""){
		alert("Sorry ! ! Enter date first !");
		return false;

	}
	if(dd==""){
		alert("Sorry ! ! Enter seat no first !");
		return false;

	}
	if(ee==""){
		alert("Sorry ! ! Enter no of customer first !");
		return false;

	}
	if(ff==""){
		alert("Sorry ! ! Enter contact no first !");
		return false;

	}
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
			<li><a href="welcomeclient.php">Home</a></li>
			<li><a href="ticketbook.php">Book Ticket</a></li>
			<li><a href="bookcheck.php">Check Details</a></li>
			<li><a href="bookingupdate.php">Update & Cancel Book</a></li>
			<li><a href="userforum.php">User Forum</a></li>
			<li><a href="logout1.php">Logout</a></li>
		</ul>
	</div>

	<div class="content">
		<h1 class="hm">Update & Cancel Ticket Booking Details.<hr></h1><br>
		<div class="msg">
		<?php
require "User.php";
$usr = new User();



if(isset($_POST['update']))
{
$l=$_POST['bus_no'];
$u=$_POST['dep_date'];
$f = $_POST['seat_no'];
$g = $_POST['customer'];
$h = $_POST['contact'];

$usr->setBusno($l);
$usr->setDepdate($u);
$usr->setSeatno($f);
$usr->setCustomer($g);
$usr->setContact($h);

if($usr->UpdateBook($_POST['b_id']))
{
?>
	<script type="text/javascript">
	alert("Updated Successfully");
	</script>
	<?php
}

}

if(isset($_POST['cancel']))
{
$l=$_POST['bus_no'];
$u=$_POST['dep_date'];
$f = $_POST['seat_no'];
$g = $_POST['customer'];
$h = $_POST['contact'];

$usr->setBusno($l);
$usr->setDepdate($u);
$usr->setSeatno($f);
$usr->setCustomer($g);
$usr->setContact($h);

if($usr->CancelBook($_POST['b_id']))
{
?>
	<script type="text/javascript">
	alert("Your Booking...Canceled Successfully..!!");
	</script>
	<?php
}

}
?>

		<form class="fm" method="post">
			Booking No :&nbsp &nbsp &nbsp &nbsp 
			<select name="booking">
			<?php
			$cid = $usr->selectBook1($_SESSION['id']);
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
            <form class="fm" method="post" name="fmbook" enctype="multipart/form-data">
            Booking No: &nbsp &nbsp &nbsp &nbsp <input type="text" name="b_id" readonly="readonly"  placeholder="Enter Booking no..." id="em" 
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
			
            ?></select> 
             </br> </br>

			Travelling Date :&nbsp &nbsp<input type="date" name="dep_date" placeholder="Choose Date.." id="pn" 
			value="<?php echo $usr->getDepdate();?>"/>&nbsp&nbsp
			<input type="submit" name="chkd" value="Check Available Date" /><?php
             if(isset($_POST['chkd']))
           {
           
           	header('location:calendar.php');
           	
           }
           ?>  </br> </br>
			
			Seat no:&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<input type="text" name="seat_no"  placeholder="Enter Seat no.." id="pn"  value="<?php echo $usr->getSeatno();?>"/> &nbsp
			<input type="submit" name="seat" value="Check Available Seatno" /><?php
             if(isset($_POST['seat']))
           {
           
           	header('location:checkseat.php');
           	
           }
           ?> </br> </br>
			No of Customer :&nbsp &nbsp<input type="text" name="customer"  placeholder="Enter no of customer.." id="pn" value="<?php echo $usr->getCustomer();?>"/> </br> </br>

			Contact no:&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input type="text" name="contact"  placeholder="Enter contact no.." id="pn" value="<?php echo $usr->getContact();?>"/>
			 </br> </br> </br> </br>

            <input type="Submit" name="update" class="ud" value="update"  onclick="return frmval()" />
            <input type="Submit" name="cancel" class="ud" value="Cancel Booking" onclick="return frmval()"/>
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