<?php
$db=mysqli_connect("localhost","root","","mydb");
function getpro(){
	global $db;
	$get_product="select * from product order by 1 DESC LIMIT 0,6";
	$run_products=mysqli_query($db,$get_product);
	while ($row_product=mysqli_fetch_array($run_products)) 
	{
		$pro_id=$row_product['p-id'];
		$pro_price=$row_product['p-price'];
		$pro_img1=$row_product['p-img1'];
		echo "	<div class='col-md-4 col-sm-6'>
					<div class='product'>
						<a href='details.php'?pro_id=$pro_id'>
							<img src='admin-area/images/$pro_img1' class='img-responsive'>
						</a>
						<div class='text'>
							<h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
								<p class='price'>INR $pro_price</p>
							<p class='buttons'>
								<a href='details.php?pro_id=$pro_id' class='btn btn-default'> view-details</a>
								<a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i>Add to cart</a>
							</p>
						</div>	
					</div>
				</div>";


	
	}
}
?>