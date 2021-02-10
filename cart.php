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
	
	<?php
		include("includes/header.php");
	?>

	<div id="content">
		<div class="container p-2">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li>cart</li>
				</ul>
			</div>
		</div>
	</div>

<div class="d-flex flex-row">
	<div class="col-md-8	 " id="cart">
		<div class="box">
			<form action="cart.php" method="post" enctype="multipart-form-data">
				<h1>Shopping cart</h1>
				
				<?php

				$ip_add=getuserip();
				$select_cart="select * from cart where ip_add='$ip_add'";
				$run_cart=mysqli_query($con,$select_cart);
				$count=mysqli_num_rows($run_cart);
				?>
				
				<p class="text-muted ">Currently you have <?php echo $count; ?> item(s) in your cart</p>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th colspan="2">product</th>
								<th> Quantity</th>
								<th>Unit Price</th>
								<th>Size</th>
								<th colspan="1">Delete</th>
								<th colspan="1">Sub Total</th>
							</tr>
						</thead>
						<tbody>

							<?php
							$total=0;
								while ($row=mysqli_fetch_array($run_cart)) 
							{   	
								$pro_id=$row['p_id'];
								$pro_size=$row['size'];
								$pro_qty=$row['qty'];
								$get_product="select * from products where p-id='$pro_id'";
								$run_pro=mysqli_query($con,$get_product);
								while($row=mysqli_fetch_array($run_pro))
								{

									$p_title=$row['p-title'];
									$p_img1=$row['p-img1'];
									$p_price=$row['p-price'];
									$sub_total=$row['p-price'] * $pro_qty;
									$total+=$sub_total;
							?>
							
							<tr>
								<td><img src="images/<?php echo $p_img1; ?> class='image-fluid'"></td>
								<td><?php echo $p_title; ?></td>
								<td><?php echo $pro_qty; ?></td>
								<td><?php echo $p_price; ?></td>
								<td><?php echo $pro_size; ?></td>
								<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id ?>"></td>
								<td><?php echo $sub_total; ?></td>
							</tr>
						
							<?php
							}}
							?>
						
						</tbody>
						<tfoot>
							<tr>
								<th colspan="6">Total</th>
								<th colspan="1">INR <?php echo $total; ?></th>
							</tr>
						</tfoot>
					</table>
				</div>




				<div class="box-footer">
					<div class="pull-left">
						<a href="index.php" class="btn btn-primary">
							<i class="fa fa-chevron-left">continue shopping</i>
						</a>
					</div>
					<div class="pull-right">
						<button class="btn btn-danger" type="submit" name="update" value="update cart">
							<i class="fa fa-refresh">Update cart</i>
						</button>
						<a href="checkout.php" class="btn btn-primary">
							proceed to checkout<i class="fa fa-chevron-right"></i>
						</a>
					</div>
				</div>


			</form>

			
		</div>

<?php

	function updatecart(){
		global $con;
		if(isset($_POST['update']))
		{
			foreach($_POST['remove'] as $remove_id)
			{
				$delete_product="delete from cart where p_id='$remove_id'";
				$run_del=mysqli_query($con,$delete_product);
				if($run_del)
				{
					echo"<script> window.open('cart.php','_self')</script>";

				}

			}
		}

}

echo @$up_cart=updatecart();
?>






	</div>




	<div class="col-md-4">
		<div class="box" id="order-summary">
			<div class="box-header">
				<h3>order summary</h3>
			</div>
			<p class="text-muted">
				shipping and additional costs are calculated based on the value you have entered
			</p>
			<div class="table-responsive">
				<table class="table">
					<tbody>
						<tr>
							<td>order subtotal</td>
							<th>INR <?php echo $total; ?></th>
						</tr>
						<tr>
							<td>shipping and handling Tax</td>
							<td>INR 0 </td>
						</tr>
						<tr>
							<td>Tax</td>
							<td> INR 0 </td>
						</tr>
						<tr class="Total">
							<td>total </td>
							<th>INR <?php echo $total;?></th>
						</tr>
					</tbody>
				</table>
			</div>
		</div>		

	</div>
</div>

				<div id="row">
					<div class="col-md-12 col-sm-6">
						<div class="box">
							<h3 class="text-center">You also like these products</h3>
						</div>

					</div>
				</div>
					



					<div class="d-flex flex-row ">
					<div class="col-md-3 p-1 box  ">
							<a href="">
								<img src="images/1.jpg" class="img-fluid">
							</a>
							<div class="text">
								<h3> <a href="details.php"> Mardaz Pack of 5</a></h3>
								<p class="price">INR 20</p>
							</div>
							
						</div>
					
					
					<div class="col-md-3 p-1 box  ">
							<a href="">
								<img src="images/1.jpg" class="img-fluid">
							</a>
							<div class="text">
								<h3> <a href="details.php"> Mardaz Pack of 5</a></h3>
								<p class="price">INR 20</p>
							</div>
							
						</div>
					
					
						<div class="col-md-3 p-1 box  ">
							<a href="">
								<img src="images/1.jpg" class="img-fluid">
							</a>
							<div class="text">
								<h3> <a href="details.php"> Mardaz Pack of 5</a></h3>
								<p class="price">INR 20</p>
							</div>
							
						</div>
						<div class="col-md-3 p-1 box  ">
							<a href="">
								<img src="images/1.jpg" class="img-fluid">
							</a>
							<div class="text">
								<h3> <a href="details.php"> Mardaz Pack of 5</a></h3>
								<p class="price">INR 20</p>
							</div>
							
						</div>
					</div>

	<?php include("includes/footer.php");?>


</body>

</html>
