<?php
session_start();
include("includes/mydb.php");
include("functions/functions.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>registration form</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="styles/bootstrap framework.css" rel="stylesheet" type="text/css">
	<link href="styles/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="styles/style.css" rel="stylesheet" type="text/css">
	<link href="styles/media.css" rel="stylesheet" type="text/css">

	<script type="text/javascript" src="js/jqueryframework.js"></script>
	<script type="text/javascript" src="js/glm-ajax.js"></script>
	<script type="text/javascript" src="js/bootstrapjs.js"></script>
	<script type="text/javascript" src="js/popoverframework.js"></script>
	<script type="text/javascript" src="js/mymain.js"></script>

</head>

<body>
	
	<!--header1-->
	<?php
		include("includes/header.php");
	?>
	
	

	<div id="content">
		<div class="container p-2 m-2">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li>Customer-Registration</li>
				</ul>
			</div>
		</div>
	</div>

<center>
<div class="col-md-7">
		<div class="box">
			<div class="box-header">
				<center>
					<h2>Register a New Account</h2>
					
				</center>
				</div>
				
				<form action="cust-reg.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Customer Name</label>
						<input type="text" name="c_name" required="" class="form-control">

					</div>
					<div class="form-group">
						<label>Customer Email</label>
						<input type="text" name="c_email" required="" class="form-control">
					</div>

					<div class="form-group">
						<label>Customer password</label>
						<input type="password" name="c_password" required="" class="form-control">

					</div>
					<div class="form-group">
						<label>Country</label>
						<input type="text" name="c_country" required="" class="form-control">

					</div>
					<div class="form-group">
						<label>City</label>
						<input type="text" name="c_city" required="" class="form-control">

					</div>

					<div class="form-group">
						<label>Contact Number</label>
						<input type="text" name="c_contact" required="" class="form-control">

					</div>



					<div class="form-group">
						<label>Address</label>
						<input type="text" name="c_address" required="" class="form-control">

					</div>

					<div class="form-group">
						<label>Image</label>
						<input type="file" name="c_image" required="" class="form-control">

					</div>


					<div class="text-center">
						<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-user-md"></i>
						Register
						</button>
					</div>

				</form>
			</div>
		</div>
	</center>



<?php 
include("includes/footer.php");
?>


<?php

if(isset($_POST['submit']))
{
	$c_name=$_POST['c_name'];
	$c_email=$_POST['c_email'];
	$c_password=$_POST['c_password'];
	$c_country=$_POST['c_country'];
	$c_city=$_POST['c_city'];
	$c_contact=$_POST['c_contact'];
	$c_address=$_POST['c_address'];
	$c_image=$_FILES['c_image']['name'];
	$c_tmp_image=$_FILES['c_image']['tmp_name'];
	$c_ip=getuserip();

	move_uploaded_file($c_tmp_image, "customer/C-images/$c_tmp_image");

	$insert_customer="insert into customers(customer_name,customer_email,customer_pass,customer_country, customer_city,customer_contact,customer_address,customer_image,customer_ip) values('$c_name','$c_email','$c_password','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";

	
	$run_customer=mysqli_query($con,$insert_customer);
	
	$sel_cart="select * from cart where ip_add='$c_ip'";
	$run_cart=mysqli_query($con,$sel_cart);
	$check_cart=mysqli_num_rows($run_cart);
	if($check_cart>0)
		{
			$_SESSION['customer_email']=$c_email;
			echo "<script>alert('already registered')</script>";
			echo "<script>window.open('checkout.php','_self')</script>";
		}
	else
		{
			$_SESSION['customer_email']=$c_email;
			echo "<script>alert('registration successfull')</script>";
			echo "<script>window.open('index.php','_self')</script>";

		}

}
?>