<?php
session_start();
include("includes/mydb.php");
include("functions/functions.php");
?>

<!DOCTYPE html>
<html>
<head>
	
	<title>multivendor ecommerce website</title>
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
				<a href="#" class="btn btn-danger btn-sm"><?php 
					if(!isset($_SESSION['customer_email']))
					{
						echo "welcome guest";
					}
					else
					{
						echo "welcome:".$_SESSION['customer_email']."";
					}
					?></a>
				<a href="#">shopping cart total price: INR <?php totalprice(); ?> , Total Items <?php item(); ?></a>
			
			</div>
			
			<!--top right-->
			<div>
				<ul class="menu">
					<li>
					<a href="customer_registration.php"> Register</a>
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
						<ul class="nav navbar-nav navbar-left">
							<li>
								<a href="index.php">Home</a>
							</li>
							<li class="active">
								<a href="shop.php">Shop</a>
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
								<a href="cart.php">Shopping Cart</a>
							</li>
							
							<li>
								<a href="contactus.php">Contact Us</a>
							</li>
						</ul>
					</div>
					<a href="cart.php" class="btn btn-primary navbar-btn right">
						<i class="fa fa-shoppin-cart"></i>
						<span><?php item(); ?> items in cart</span>
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
					<li>shop</li>
				</ul>
			</div>
			<div class="col-md-3">
				<?php 
				include("includes/sidebar.php");
				?>
			</div>
			<div class="col-md-9">
				
				<?php
					if(!isset($_GET['p_cat']))
					
						{ 
							if(!isset($_GET['cat_id']))
								{
									echo 
									"<div class='box'> 
									<h1>shop</h1>
									<p>buy something from my store else your wish..........thnks</p></div>";
								}

						}

				?>
				
<div class="row">
	<?php 
	if(!isset($_GET['p_cat']))
	{
		if(!isset($_GET['cat_id']))
		{	$per_page=6;
			if(isset($_GET['page']))
			{
				$page=$_GET['page'];

			}
			else
			{
				$page=1;
			}
			
			$start_from=($page-1)*$per_page;
			
#making of prodcut sections 

			$get_product="select * from products order by 1 DESC LIMIT $start_from, $per_page";
			
			$run_pro=mysqli_query($con,$get_product);
			
			while($row=mysqli_fetch_array($run_pro))
			{
				$pro_id=$row['p-id'];
				$pro_title=$row['p-title'];
				$pro_price=$row['p-price'];
				$pro_img1=$row['p-img1'];

				echo 
				"
				<div class='col-md-4 col-sm-6 center-responsive'>
					<div class='product'>
						<a href='details.php?pro_id=$pro_id'>
							<img src='images/$pro_img1' class='img-responsive'>
						</a>
						<div class='text'>
							<h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
							<p class='price'> INR $pro_price</p>
							<p class='button'>
							<a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
							<a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart></i>Add To Cart</a>
							</p>
						</div>
					</div>
				</div>";


			}
			
				
					</div>
						<center>
						<ul class="pagination">
						<?php
						$query="select * from products";
						$result=mysqli_query($con,$query);
						$total_record=mysqli_num_rows($result);		
						$total_pages=ceil($total_record/$per_page); 
						echo 
						"<li><a href='shop.php?page=1'>first page</a></li>";
						for( $i=1; $i<=$total_pages; $i++)
						{
						echo 
							"<li><a href='shop.php?page=$i>$i</a></li>";
						}
						echo
						"<li><a href='shop.php?page=$total_pages'>first page</a></li>";
	}}?>
					</ul>
						</center>
						<div class="row">
						<?php
						getcatpro();
						getcatitems();
						?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
<?php 
include("includes/footer.php");
?>