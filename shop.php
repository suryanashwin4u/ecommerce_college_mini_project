<?php
session_start();
include("includes/mydb.php");
include("functions/functions.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Shop Page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="styles/bootstrap framework.css" rel="stylesheet" type="text/css">
	<link href="styles/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="styles/style.css"  rel="stylesheet" type="text/css">
	<link href="styles/media.css"  rel="stylesheet" type="text/css">
	<script type="text/javascript" src="js/jqueryframework.js"></script>
	<script type="text/javascript" src="js/glm-ajax.js"></script>
	<script type="text/javascript" src="js/bootstrapjs.js"></script>
	<script type="text/javascript" src="js/popoverframework.js"></script>
	<script type="text/javascript" src="js/mymain.js"></script>
</head>

<body>

<?php
include("includes/header.php");
?>

	<div id="content">
		<div class="container">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li>Shop</li>
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
									 <p>buy something from my store</p>
									 </div>";
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
				"<div class='col-md-4 col-sm-6 center-responsive'>
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