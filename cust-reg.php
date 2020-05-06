<?php
session_start();
include("includes/mydb.php");
include("functions/functions.php");
?>

<!DOCTYPE html>
<html>
<head>
	
	<title>myecommerce.com</title>
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
	
	<div id="top">
		<div class="container">
			<!--top left-->
			<div class="offer">
				<a href="#" class="btn btn-danger btn-sm">
					<?php 
					if(!isset($_SESSION['customer_email']))
					{
						echo "welcome guest";
					}
					else
					{
						echo "welcome:".$_SESSION['customer_email']."";
					}
					?>
				</a>
				<a href="#">shopping cart total price: INR  , Total Items:  </a>
			
			</div>
			
			<!--top right-->
			<div>
				<ul class="menu">
					<li>
					<a href="cus_reg.php"> Register</a>
					</li>

					<li>
					<a href="checkout.php"> My account</a>
					</li>


					<li>
					<a href="cart.php"> go to cart</a>
					</li>


					<li>
						<?php
						if(!isset($_SESSION['customer_email']))
						{
							echo "<a href='checkout.php'>Login</a>";
						}
						else
						{
							echo "<a href='logout.php'>logout</a>";
						}
						?>
					</li>
				</ul>
			</div>
		</div>

<!--header2--->
		<div class="navbar navbar-default" id="navbar">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand home" href="index.php">
						<img src="images/hcl.jpg" alt="myLlogo" class="hidden-xs">
						<img src="images/lg.jpg" alt="mySlogo" class="visible-xs">
					</a>	
					
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
						<span class="sr-only">toggle navigation</span>
						<i class="fa fa-align-justify"></i>
					</button>
					
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
						<span class="sr-only"></span>
						<i class="fa fa-search"></i>
					</button>
				</div>

				<div class="navbar-collapse"  id="navigation">
					<div class="padding-nav">
						<ul class="nav navbar-nav navbar-left">
							<li class="active">
								<a href="index.php">Home</a>
							</li>
							<li>
								<a href="shop.php">Shop</a>
							</li>
							<li>
								<a href="checkout.php">My Account</a>
							</li>
							<li>
								<a href="cart.php" >Shopping Cart</a>
							</li>
							<li>
								<a href="about.php">About us</a>
							</li>
							<li>
								<a href="services.php">Services</a>
							</li>
							<li>
								<a href="contactus.php">Contact Us</a>
							</li>
						</ul>
					</div>
					<a href="cart.php" class="btn btn-primary navbar-btn right">
						<i class="fa fa-shoppin-cart"></i>
						<span>4 items in cart</span>
					</a>
					
					<div class="navbar-collapse collapse right">
						<button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
							<span class="sr-only">Toggle Search</span>
							<i class="fa fa-search"></i>
						</button>
					</div>
					

					<div class="collapse clearfix" id="search">
						<form class="navbar-form" method="get" action="result.php">
							<div class="input-group">
								<input type="text" name="user_query" placeholder="search" class="form-control" required="">
							
							<span class="input-group-btn">
								<button type="button" value="search" name="search" class="btn btn-primary">
									<i class="fa fa-search"></i>
								</button>
							</span>
							</div>
						</form>
					</div>
				</div>
				
			</div>	

		</div>
	</div>


	<div id="content">
		<div class="container">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li>customer-registration</li>
				</ul>
			</div>
		</div>
	</div>

<div class="col-md-9">
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