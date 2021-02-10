<?php
session_start();
if(!isset($_SESSION['customer_email']))
{
	echo "<script>window.open('../checkout.php','_self')</script>";
}
else
{
include("C-includes/C-mydb.php");
include("C-functions/C-functions.php");
if(isset($_GET['order_id']))
{
	$order_id=$_GET['order_id'];
}
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Confirm Your Order</title>
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
	<?php
	include("C-includes/C-header.php");
	?>
	

	<div id="content">
		<div class="container">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="../index.php">Home</a></li>
					<li>Confirm Payment Page</li>
				</ul>
			</div>
		</div>
	</div>
<div class="d-flex flex-row">
<div class="col-md-3">
	<?php include("C-includes/C-sidebar.php"); ?>
</div>
<div class="col-md-9">
	<div class="box">
		<h1 align="center">Please confirm your payment</h1>


<!--form start-->
		<form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Invoice Number</label>
				<input type="text" name="invoice_number" class="form-control" required="">
			</div>
			<div class="form-group">
				<label>Amount</label>
				<input type="text" name="amount" class="form-control" required="">
			</div>
			<div class="form-group">
				<label>Select Payment Mode</label>
				<select class="form-control" name="payment_mode">
					<option>Bank transfer</option>
					<option>Paypal</option>
					<option>PayuMoney</option>
					<option>PayTm</option>
					
				</select>
			</div>
			<div class="form-group">
				<label>Transaction Number</label>
				<input type="text" name="transaction_number" class="form-control" required="">
			</div>
			<div class="form-group">
				<label>Payment Date</label>
				<input type="date" name="date" class="form-control" required="">
			</div>
			<div class="text-center">
				<button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">Confirm Payment</button>
			</div>

		</form>
		<?php 
		if(isset($_POST['confirm_payment']))
		{
			$update_id=$_GET['update_id'];
			$invoice_number=$_POST['invoice_number'];
			$amount=$_POST['amount'];
			$payment_mode=$_POST['payment_mode'];
			$trfr_number=$_POST['transaction_number'];
			$date=$_POST['date'];
			$complete="completed";
			$insert="insert into payments(invoice_id,amount,payment_mode,ref_no,payment_date) values('$invoice_number','$amount','$payment_mode','$trfr_number','$date')";
			$run_insert=mysqli_query($con,$insert);
			
			$update_q="update customer_order set order_status='$complete' where order_id='$update_id'";
			$run_update1=mysqli_query($con,$update_q);
			
			$update_p="update pending_order set order_status='$complete' where order_id='$update_id'";
			$run_update2=mysqli_query($con,$update_p);
			
			echo "<script>alert('your order has been received')</script>";
			echo "<script>window.open('myaccount.php?order','_self')</script>";

		}
		?>

	</div>
</div>
</div>
<?php include("C-includes/C-footer.php");?>
<?php } ?>