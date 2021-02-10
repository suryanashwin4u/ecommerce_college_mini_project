<?php
session_start();
include("includes/mydb.php");
include("functions/functions.php");
?>


<!DOCTYPE html>
<html>
<head>
	
	<title>checkout</title>
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
		<div class="container">
			<div class="col-md-12 p-4">
				<ul class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li>Check-Out</li>
				</ul>
			</div>
		</div>
	</div>
<center>
	<div class="col-md-5">
		<?php
		if(!isset($_SESSION['customer_email']))
		{
			include('customer/customer_login.php');
		}
		else
		{
			include('payment_options.php');
		}
		?>
	</div>
</center>

	<?php 
	include("includes/footer.php");
	?>