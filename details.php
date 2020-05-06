<?php
session_start();
include("includes/mydb.php");
include("functions/functions.php");
?>
<?php
if(isset($_GET['pro_id']))
{
$pro_id=$_GET['pro_id'];
$get_product="select * from products where p-id=$pro_id";
$run_product=mysqli_query($con,$get_product);
$row_product=mysqli_fetch_array($run_product);
$p_cat_id=$row_product['p-cat-id'];
$p_title=$row_product['p-title'];
$p_price=$row_product['p-price'];
$p_desc=$row_product['p-desc'];
$p_img1=$row_product['p-img1'];
$p_img2=$row_product['p-img2'];
$p_img3=$row_product['p-img3'];
$get_p_cat="select * from product_categories where p-cat-id=$p_cat_id";
$run_p_cat=mysqli_query($con,$get_p_cat);
$row_p_cat=mysqli_fetch_array($run_p_cat);
$p_cat_id=$row_p_cat['p-cat-id'];
$p_cat_title=$row_p_cat['p-title'];

}
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
	<script type="text/javascript" src="js/popoverframework.js"></scriptz>
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
							echo "<a href='checkout.php'>Login</a>";
						}
						else
						{
							echo "<a href='logout.php'>logout</a>";
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
					<li><a href="shop.php?p_cat=<?php echo '$p_cat_id';?>"><?php echo $p_cat_title; ?></a></li>
					<li> <?php echo $p_title; ?></li>
				</ul>
			</div>
			<div class="col-md-3">
				<?php 
				include("includes/sidebar.php");
				?>
			</div>
			<div class="col-md-9">
				<div class="row" id="productmain">
					<div class="col-sm-6">
						<div id="mainimage">
					    	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  								<ol class="carousel-indicators">
    								<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    								<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    								<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  								</ol>
  									<div class="carousel-inner">
    									<div class="carousel-item active">
    									<a href="#" ><img class="d-block w-100" src="images\<?php echo $p_img1 ?>" alt="First slide"></a>
    									</div>
    									<div class="carousel-item">
    									<a href="#" ><img class="d-block w-100" src="images\<?php echo $p_img2 ?>" alt="First slide"></a>
    									</div>
    									<div class="carousel-item">
    									<a href="#" ><img class="d-block w-100" src="images\<?php echo $p_img3 ?>" alt="First slide"></a>
    									</div>
  									</div>
  										<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
    									<span class="sr-only">Previous</span>
  										</a>
										<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    									<span class="carousel-control-next-icon" aria-hidden="true"></span>
    									<span class="sr-only">Next</span>
    									</a>
							</div>
						</div>
					</div>


					<div class="col-sm-6">
						<div class="box">
							<h1 class="text-center"><?php echo $p_title ?></h1>
							<?php
							addcart();
							?>

							<form action="details.php?add_cart=<?php echo $pro_id ?>" method="post" class="form-horizontal">
								<div class="form-group">
									<label class="col-md-5 control-label">Product Quantity</label>
									<div class="col-md-7">
										<select name="product_qty" class="form-control">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-5 control-label">Product size</label>
									<div class="col-md-7">
										<select name="product_size" class="form-control">
											<option>select a size</option>
											<option>small</option>
											<option>medium</option>
											<option>large</option>
											<option>extra large</option>
										</select>
							
									</div>
								</div>
								<p class="price"><?php echo $p_price; ?></p>
								<p class="text-center buttons">
									<button class="btn btn-primary" type="submit">
										<i class="fa fa-shopping-cart"></i>add to cart
									</button>
								</p>
							</form>
						</div>

						<div class="col-xs-4">
							<a href="#" class="thumb">
								<img src="images/<?php echo $p_img1 ?>" class="img-responsive">
								
							</a>
						</div>
						<div class="col-xs-4">
							<a href="#" class="thumb">
								<img src="images/<?php echo $p_img2 ?>" class="img-responsive">
								
							</a>
						</div>
						<div class="col-xs-4">
							<a href="#" class="thumb">
								<img src="images/<?php echo $p_img3 ?>" class="img-responsive">
							</a>
						</div>
					</div>
				</div>
				<div class="box" id="details">
					<h4>Product Details</h4>
					<p> <?php echo $p_desc ?></p>
					<h4>size</h4>
					<ul>
						<li>small</li>
						<li>medium</li>
						<li>large</li>
						<li>extra large</li>
				
					</ul>
				</div>
				<div id="row same-height-row">
					<div class="col-md-3 col-sm-6">
						<div class="box same-height-row headline">
							<h3 class="text-center">You also like these products</h3>
						</div>
					</div>
					
					<?php 
					$get_product="select * from products order by 1 LIMIT 0,3";
					$run_product=mysqli_query($con,$get_product);
					while ($row=mysqli_fetch_array($run_product)) 
					{

						$pro_id=$row_product['p-id'];
						$pro_title=$row_product['p-title'];
						$pro_price=$row_product['p-price'];
						$pro_img1=$row_product['p-img1'];
						echo "

						<div class='center-responsive col-md-3 col-sm-6'>
						<div class='product same-height'>
						<a href='details.php?pro_id=$pro_id'>
						<img src='admin-area/images/$pro_img1' class='img-responsive'>
						</a>
						<h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
						<p class='price'>$pro_price</p>
						</div>
						</div>";
					}
				</div>

			</div>
		</div>
	</div>	

<!--footer starts--->
<?php include("includes/footer.php");
?>

</body>

</html>
