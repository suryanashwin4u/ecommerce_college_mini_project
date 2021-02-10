<?php
$customer_email=$_SESSION['customer_email'];
$get_customer="select * from customers where customer_email='$customer_email'";
$run_cust=mysqli_query($con,$get_customer);
$row_cust=mysqli_fetch_array($run_cust);
$customer_id=$row_cust['customer_id'];
$customer_name=$row_cust['customer_name'];
$customer_email=$row_cust['customer_email'];
$customer_country=$row_cust['customer_country'];
$customer_city=$row_cust['customer_city'];
$customer_contact=$row_cust['customer_contact'];
$customer_address=$row_cust['customer_address'];
$customer_image=$row_cust['customer_image'];
?>


	
	<div class="box">
		<form action="" method="POST" enctype="multipart/form-data">
	<center>
		<h1>edit your account</h1>
	</center>
	<div class="form-group">
		<label>customer name</label>
		<input type="text" value="<?php echo $customer_name; ?>" name="customername" required="">
	</div>

	<div class="form-group">
		<label>customer email</label>
		<input type="text" value="<?php echo $customer_email; ?>" name="customeremail" required="">
	</div>

	<div class="form-group">
		<label>customer Password</label>
		<input type="text" name="customerpassword"  required="">
	</div>

	<div class="form-group">
		<label>customer Country</label>
		<input type="text" name="customercountry" value="<?php echo $customer_country; ?>" required="">
	</div>
	<div class="form-group">
		<label>customer Contact</label>
		<input type="text" name="customercontact" value="<?php echo $customer_contact; ?>" required="">
	</div>
	<div class="form-group">
		<label>customer City</label>
		<input type="text" value="<?php echo $customer_city; ?>" name="customercity" required="">
	</div>

	<div class="form-group">
		<label>customer Address</label>
		<input type="text" name="customeraddress" value="<?php echo $customer_address; ?>" required="">
	</div>

	<div class="form-group">
		<label>customer Image</label>
		<input type="file" name="customerimage" required="">
		<img src="C-images/<?php echo $customer_image; ?>" class="img-responsive" height="100" width="100">
	</div>
	
	<div class="text-center">
		<button class="btn btn-primary" name="update">Update Now</button>
	</div>
	</form>
	</div>
	


<?php 
if(isset($_POST['update']))
{
	
	$update_id=$customer_id;
	$c_name=$_POST['customername'];
	$c_email=$_POST['customeremail'];
	$c_country=$_POST['customercountry'];
	$c_city=$_POST['customercity'];
	$c_contact=$_POST['customercontact'];
	$c_address=$_POST['customeraddress'];
	$c_image=$_FILES['customerimage']['name'];
	$c_image_tmp=$_FILES['customerimage']['tmp_name'];


	move_uploaded_file($c_image_tmp,"C-images/$c_image");
	
	$update_customer="update customers set 
	customer_name='$c_name'
	,
	customer_email='$c_email'
	,
	customer_country='$c_country'
	,
	customer_city='$c_city'
	,
	customer_contact='$c_contact'
	,
	customer_address='$c_address'
	,
	customer_image='$c_image' where customer_id='$update_id'";

	$run_customer=mysqli_query($con,$update_customer);

	if($run_customer)
	{
		echo "<script>alert('YOUR DETAILS UPDATED.')";
		echo "<script>window.open('../logout.php','_self')</script>";

	}}
?>