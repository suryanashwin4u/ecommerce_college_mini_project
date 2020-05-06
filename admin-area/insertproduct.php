<?php
include("includes/mydb.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert Product</title>
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
	<div class="row">
		<div class="col-lg-12">
			<div class="breadcrumb">
				<li class="active">
					<i class="fa fa-dashboard"></i>
					dashboard/Insert Product
				</li>
			</div>
		</div>
	</div>
	
	<div class="row">

		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa a-money fa-w"></i>Insert Product
					</h3>
				</div>
				<div class="panel-body">
					<form method="post" class="form-horizontal" action="" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-md-3 control-label">Product title</label>
							<input type="text" name="pt" class="form-control" required="">

						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product categories</label>
							<select name="pc" class="form-control">
								<option>select a product category</option>
								<?php 
		  						$get_p_cats="select * from product_categories";
		  						$run_p_cats=mysqli_query($con,$get_p_cats);
		  						while($row=mysqli_fetch_array($run_p_cats))
		  						{
		  							$pcid=$row['p-cat-id'];
		  							$pct=$row['p-cat-title'];
		  							echo "<option value='$pcid'>$pct</option>";
		  						}
		  						?>	
						
							
							</select>
							
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label">Categories</label>
							<select name="c" class="form-control">
								<option>select category</option>
							<?php 
	  						$get_p_cats="select * from categories";
	  						$run_p_cats=mysqli_query($con,$get_p_cats);
	  						while($row=mysqli_fetch_array($run_p_cats))
	  						{
	  							$pcid=$row['cat-id'];
	  							$pct=$row['cat-title'];
	  							echo "<option value='$pcid'>$pct</option>";
	  						}
	  						?>
							</select>
							
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label">Product image 1</label>
							<input type="file" name="img1 " class="form-control" required="">
							
						</div>
							
						</div>
							<div class="form-group">
							<label class="col-md-3 control-label">Product image 2</label>
							<input type="file" name="img2 " class="form-control" required="">
							
						</div>
							
						</div>
							<div class="form-group">
							<label class="col-md-3 control-label">Product image 3</label>
							<input type="file" name="img3 " class="form-control" required="">
							
						</div>
							<div class="form-group">
							<label class="col-md-3 control label">Product price</label>
							<input type="text" name="pp" class="form-control" required="">
							
						</div>

							<div class="form-group">
							<label class="col-md-3 control label">Product keyword</label>
							<input type="text" name="pk" class="form-control" required="">
							
						</div>

							<div class="form-group">
							<label class="col-md-3 control label">Product description</label>
							<textarea name="pd" class="form-control" rows="6" cols="19"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" name="submited" value="Insert Products" class="btn btn-primary form-control">
						</div>

							
						
					</form>
				</div>
			</div>
		</div>
	
	</div>
</body>
</html>

<?php
if(isset($_POST['submited']))
{
	$product_title=$_POST['pt'];
	$product_category=$_POST['pc'];
	$catogries=$_POST['c'];
	$product_price=$_POST['pp'];
	$product_description=$_POST['pd'];
	$product_keyword=$_POST['pk'];

	$product_img1=$_FILES['img1']['name'];
	$product_img2=$_FILES['img2']['name'];
	$product_img3=$_FILES['img3']['name'];

	$temp_name1=$_FILES['img1']['tmp_name'];
	$temp_name2=$_FILES['img2']['tmp_name'];
	$temp_name3=$_FILES['img3']['tmp_name'];

	move_uploaded_file($temp_name1, "images/$product_img1");
	move_uploaded_file($temp_name2, "images/$product_img2");
	move_uploaded_file($temp_name3, "images/$product_img3");
	
	$insert_product="insert into products(p-cat-id,cat-id,date,p-title,p-img1,p-img2,p-img3,p-price,p-desc,p-key) 
	values('$product_category','$catogries','NOW()','$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_description','$product_keyword')";

	$run_product=mysqli_query($con, $insert_product);

	if($run_product){
	echo "<script>alert('product inserted successfully')</script>";
	echo "<script>window.open('insertproduct.php')</script>";
}}?>