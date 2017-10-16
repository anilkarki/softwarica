<?php
require 'admin.php';
$admin = new admin();
if (isset($_POST['Login']))
{
	$un=$_POST['Username'];
	$pass=$_POST['Password'];

	$admin->setUsername($un);
    $admin->setPassword($pass);
        
    if($admin->logIn1())
	{
	header('location:adminwc.php');
	}

	}

?>


<html>
<head>
	<title>login form</title>
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	<script type="text/javascript">
	function frmval()
	{
		var aa= document.forms["fmbook"]["Username"].value;
		var bb= document.forms["fmbook"]["Password"].value;
		

	
	
	if (aa=="")
	{
		alert("Sorry ! ! Enter Username first !");
		return false;
	}
	if(bb==""){
		alert("Sorry ! ! Enter Password first !");
		return false;

	}
	
}
</script>
</head>
<body class="loginn">
<div class="wrapp">
<div class="regss">

		<form class="rm" method="post" name="fmbook">
		<fieldset>
            <legend>Login Here ! !</legend><br><br>
			&nbsp &nbsp &nbsp &nbsp &nbsp Username :&nbsp &nbsp &nbsp &nbsp <input type="text" name="Username"  placeholder="Enter Username.." id="em" />
			</br> </br>
			&nbsp &nbsp &nbsp &nbsp &nbsp Password :&nbsp &nbsp &nbsp &nbsp &nbsp <input type="password" name="Password"  placeholder="Enter Password.." id="em" /> </br> </br> </br> </br>

			<input type="Submit" name="Login" value="Login" class="ag" onclick="return frmval()" />

			<input type="submit" name="Back" value="Back" class="bc">
           <?php
           if(isset($_POST['Back']))
           {
           header('location:index.php');
           }
           ?>
			</fieldset>

		</form>
		</div>
		</div>

</body>
</html>