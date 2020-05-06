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
				<div class="container-fluid">
				<!--top left-->
				<div class="offer">
					<a href="#" class="btn btn-primary btn-md"><?php 
					if(!isset($_SESSION['customer_email']))
					{
						echo "welcome guest";
					}
					else
					{
						echo "welcome:".$_SESSION['customer_email']."";
					}
					?></a>
					<a href="#" >Total Items In Cart :<?php item(); ?> & Total Amount :
						<?php totalprice(); ?> </a>
				
				</div>
				
				<!--top right-->
				<div>
					<ul class="menu" >
						<li>
						<a href="cust-reg.php" "> Register</a>
						</li>

						<li>
						<?php 
						if(!isset($_SESSION['customer_email']))
						{
							echo "<a href='checkout.php'>My Account</a>";
						}
						else
						{
							echo "<a href='customer/myaccount.php?myorder'>My Account</a>";
						}
						?>
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
							<ul class="nav navbar-nav flex-row navbar-left">
								<li class="active">
									<a href="index.php">Home</a>
								</li>
								<li >
									<a href="shop.php">Shop</a>
								</li>
								<li >
									
						<?php 
						if(!isset($_SESSION['customer_email']))
						{
							echo "<a href='checkout.php'>My Account</a>";
						}
						else
						{
							echo "<a href='customer/myaccount.php?myorder'>My Account</a>";
						}
						?>
								</li>
								<li >
									<a href="cart.php">Shopping Cart</a>
								</li>
								
								<li >
									<a href="contactus.php">Contact Us</a>
								</li>
							</ul>
						</div>
						<a href="cart.php" class="btn btn-primary navbar-btn right">
							<i class="fa fa-shoppin-cart"></i>
							<span><?php item(); ?>items in cart</span>
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

<h1 class="box text-primary"><center>Trending Today</center></h1>

	<!--slider1-->

	<div class="container justify-content-center d-flex flex-row" style="margin: 30px;">
		<div class="col-md-4" id="slider">
			<div class="">
		    	<div id="carousel1" class="carousel slide" data-ride="carousel">
	  				<ol class="carousel-indicators">
	    				<li data-target="#carousel1" data-slide-to="0" class="active"></li>
	    				<li data-target="#carousel1" data-slide-to="1"></li>
	  				</ol>
	  					<div class="carousel-inner">
	  						<div class="carousel-item active">
	    					<a href="#" >
	    					<?php 
	  						$get_slider="select * from mysliderdb LIMIT 0,1";
	  						$run_slider=mysqli_query($con,$get_slider);
	  						while($row=mysqli_fetch_array($run_slider))
	  						{
	  							$slidername=$row['slidername'];
	  							$sliderimage=$row['sliderimage'];
	  							echo "<div class='item 	active'>
	  							<img src='images/$sliderimage' class='img-fluid'>
	  							</div>";
	  						}?>
							</a>
	    					</div>
	    					
	    					<div class="carousel-item">
	    					<a href="#" >
	    					<?php 
	  						$get_slider="select * from mysliderdb LIMIT 1,1";
	  						$run_slider=mysqli_query($con,$get_slider);
	  						while($row=mysqli_fetch_array($run_slider))
	  						{
	  							$slidername=$row['slidername'];
	  							$sliderimage=$row['sliderimage'];
	  							echo "<div class='item'>
	  							<img src='images/$sliderimage' class='img-fluid'>
	  							</div>";
	  						}?>
	  						</a>
	    					</div>
	  						</div>
	  						    <a class="carousel-control-prev" href="#carousel1" role="button" data-slide="prev">
	    						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    						<span class="sr-only">Previous</span>
	  							</a>
								<a class="carousel-control-next" href="#carousel1" role="button" data-slide="next">
	    						<span class="carousel-control-next-icon" aria-hidden="true"></span>
	    						<span class="sr-only">Next</span>
	    						</a>
				</div>
			</div>
		</div>

<!--slider 2--->

		<div class="col-md-4" id="slider">
			<div class="">
		    	<div id="carousel2" class="carousel slide" data-ride="carousel">
	  				<ol class="carousel-indicators">
	    				<li data-target="#carousel2" data-slide-to="0" class="active"></li>
	    				<li data-target="#carousel2" data-slide-to="1"></li>
	  				</ol>
	  					<div class="carousel-inner">
	  						<div class="carousel-item active">
	    					<a href="#" >
	    					<?php 
	  						$get_slider="select * from mysliderdb LIMIT 0,1";
	  						$run_slider=mysqli_query($con,$get_slider);
	  						while($row=mysqli_fetch_array($run_slider))
	  						{
	  							$slidername=$row['slidername'];
	  							$sliderimage=$row['sliderimage'];
	  							echo "<div class='item 	active'>
	  							<img src='images/$sliderimage' class='img-fluid'>
	  							</div>";
	  						}?>
							</a>
	    					</div>
	    					
	    					<div class="carousel-item">
	    					<a href="#" >
	    					<?php 
	  						$get_slider="select * from mysliderdb LIMIT 1,1";
	  						$run_slider=mysqli_query($con,$get_slider);
	  						while($row=mysqli_fetch_array($run_slider))
	  						{
	  							$slidername=$row['slidername'];
	  							$sliderimage=$row['sliderimage'];
	  							echo "<div class='item'>
	  							<img src='images/$sliderimage' class='img-fluid'>
	  							</div>";
	  						}?>
	  						</a>
	    					</div>
	  						</div>
	  						    <a class="carousel-control-prev" href="#carousel2" role="button" data-slide="prev">
	    						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    						<span class="sr-only">Previous</span>
	  							</a>
								<a class="carousel-control-next" href="#carousel2" role="button" data-slide="next">
	    						<span class="carousel-control-next-icon" aria-hidden="true"></span>
	    						<span class="sr-only">Next</span>
	    						</a>
				</div>
			</div>
		</div>

<!--slider 3--->

		<div class="col-md-4" id="slider">
			<div class="">
		    	<div id="carousel3" class="carousel slide" data-ride="carousel">
	  				<ol class="carousel-indicators">
	    				<li data-target="#carousel3" data-slide-to="0" class="active"></li>
	    				<li data-target="#carousel3" data-slide-to="1"></li>
	  				</ol>
	  					<div class="carousel-inner">
	  						<div class="carousel-item active">
	    					<a href="#" >
	    					<?php 
	  						$get_slider="select * from mysliderdb LIMIT 0,1";
	  						$run_slider=mysqli_query($con,$get_slider);
	  						while($row=mysqli_fetch_array($run_slider))
	  						{
	  							$slidername=$row['slidername'];
	  							$sliderimage=$row['sliderimage'];
	  							echo "<div class='item 	active'>
	  							<img src='images/$sliderimage' class='img-fluid'>
	  							</div>";
	  						}?>
							</a>
	    					</div>
	    					
	    					<div class="carousel-item">
	    					<a href="#" >
	    					<?php 
	  						$get_slider="select * from mysliderdb LIMIT 1,1";
	  						$run_slider=mysqli_query($con,$get_slider);
	  						while($row=mysqli_fetch_array($run_slider))
	  						{
	  							$slidername=$row['slidername'];
	  							$sliderimage=$row['sliderimage'];
	  							echo "<div class='item'>
	  							<img src='images/$sliderimage' class='img-fluid'> 
	  							</div>";
	  						}?>
	  						</a>
	    					</div>
	  						</div>
	  						    <a class="carousel-control-prev" href="#carousel3" role="button" data-slide="prev">
	    						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    						<span class="sr-only">Previous</span>
	  							</a>
								<a class="carousel-control-next" href="#carousel3" role="button" data-slide="next">
	    						<span class="carousel-control-next-icon" aria-hidden="true"></span>
	    						<span class="sr-only">Next</span>
	    						</a>
				</div>
			</div>
		</div>
	</div>


	<!--advantage start--->
	<div id="advantage">
		<div class="container d-flex flex-row">
			
				<div class="col-md-3 p-2">
					<div class="box">
						<div class="icon">
							<i class="fa fa-heart"></i>
						</div>
						<h2><a href="#">Best Prices</a></h2>
						<p>you can check on all others sites about he prices adn then compare with us.</p>
					</div>
				</div>
				<div class="col-md-3 p-2" >
					<div class="box">
						<div class="icon">
							<i class="fa fa-heart"></i>
						</div>
						<h2><a href="#">Best Prices</a></h2>
						<p>you can check on all others sites about he prices adn then compare with us.</p>
					</div>
				</div>
				<div class="col-md-3 p-2">
					<div class="box">
						<div class="icon">
							<i class="fa fa-heart"></i>
						</div>
						<h2><a href="#">Best Prices</a></h2>
						<p>you can check on all others sites about he prices adn then compare with us.</p>
					</div>
				</div>
				<div class="col-md-3 p-2">
					<div class="box">
						<div class="icon">
							<i class="fa fa-heart"></i>
						</div>
						<h2><a href="#">Best Prices</a></h2>
						<p>you can check on all others sites about he prices adn then compare with us.</p>
					</div>
				</div>
			
		</div>
	</div>
	<div id="hotbox">
		<div class="box">
			<div class="container">
				<div class="col-md-12">
					<h2>latest this week</h2>
				</div>
			</div>
		</div>
	</div>

	<!--product details start--->
	<div id="content" class="container">
		<div class="row">
			<?php
			getpro();
			?>
		</div>
	</div>


	<!--footer starts--->
	<?php include("includes/footer.php");
	?>

	</body>

	</html>
