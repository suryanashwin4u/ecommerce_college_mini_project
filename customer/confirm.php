<!DOCTYPE html>
<html>
<head>
	
	<title>multivendor ecommerce website</title>
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="C-styles/bootstrap framework.css" rel="stylesheet" type="text/css">
	<link href="C-styles/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="C-styles/style.css" rel="stylesheet" type="text/css">
	<link href="C-styles/media.css" rel="stylesheet" type="text/css">

	<script type="text/javascript" src="C-js/jqueryframework.js"></script>
	<script type="text/javascript" src="C-js/glm-ajax.js"></script>
	<script type="text/javascript" src="C-js/bootstrapjs.js"></script>
	<script type="text/javascript" src="C-js/popoverframework.js"></script>
	<script type="text/javascript" src="C-js/mymain.js"></script>

</head>

<body>
	
	<!--header1-->
	
	<div id="top">
		<div class="container">
			<!--top left-->
			<div class="offer">
				<a href="#" class="btn btn-danger btn-sm">welcome guest</a>
				<a href="#">shopping cart total price: INR 100, Total Items 2</a>
			
			</div>
			
			<!--top right-->
			<div>
				<ul class="menu">
					<li>
					<a href="../cust-reg.php"> Register</a>
					</li>

					<li class="active">
					<a href="myaccount.php"> My account</a>
					</li>


					<li>
					<a href="../cart.php"> go to cart</a>
					</li>


					<li>
					<a href="../login.php"> login</a>
					</li>
				</ul>
			</div>
		</div>

<!--header2--->
		<div class="navbar navbar-default" id="navbar">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand home" href="index.php">
						<img src="C-images/hcl.jpg" alt="myLlogo" class="hidden-xs">
						<img src="C-images/lg.jpg" alt="mySlogo" class="visible-xs">
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
							<li >
								<a href="../index.php">Home</a>
							</li>
							<li>
								<a href="../shop.php">Shop</a>
							</li>
							<li class="active">
								<a href="myaccount.php">My Account</a>
							</li>
							<li>
								<a href="../cart.php" >Shopping Cart</a>
							</li>
							<li>
								<a href="../about.php">About us</a>
							</li>
							<li>
								<a href="../services.php">Services</a>
							</li>
							<li>
								<a href="../contactus.php">Contact Us</a>
							</li>
						</ul>
					</div>
					<a href="../cart.php" class="btn btn-primary navbar-btn right">
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
					<li><a href="../index.php">Home</a></li>
					<li>myaccount</li>
				</ul>
			</div>
		</div>
	</div>

<div class="col-md-3">
	<?php include("C-includes/C-sidebar.php");?>
</div>
<div class="col-md-9">
	<div class="box">
		<h1 align="center">Please confirm your payment</h1>
		<form action="confirm.php" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Invoice Number</label>
				<input type="text" name="invoice number" class="form-control" required="">
			</div>
			<div class="form-group">
				<label>Amount</label>
				<input type="text" name="amount" class="form-control" required="">
			</div>
			<div class="form-group">
				<label>Select Payment Mode</label>
				<select>
					<option>Bank transfer</option>
					<option>Paypal</option>
					<option>PayuMoney</option>
					<option>PayTm</option>
					
				</select>
			</div>
			<div class="form-group">
				<label>Transaction Number</label>
				<input type="text" name="transaction number" class="form-control" required="">
			</div>
			<div class="form-group">
				<label>Payment Date</label>
				<input type="date" name="date" class="form-control" required="">
			</div>
			<div class="text-center">
				<button type="submit" name="confirm payment" class="btn btn-primary btn-lg">Confirm Payment</button>
			</div>

		</form>

	</div>
</div>
<?php include("C-includes/C-footer.php");?>
