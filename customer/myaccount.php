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

?>

<!DOCTYPE html>
<html>
<head>
	
	<title>My Account</title>
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
	
	<!--header--->
	<?php
		include("C-includes/C-header.php");
	?>



	<div id="content">
		<div class="container">
			<div class="col-md-12 p-3">
				<ul class="breadcrumb">
					<li><a href="../index.php">Home</a></li>
					<li>My Account</li>
				</ul>
			</div>
		</div>
	</div>




	<div class="d-flex flex-row">
		
		<div class="col-md-3">
		<?php include("C-includes/C-sidebar.php");?>
		</div>
		
		<div class="col-md-9">

			<?php
			if(isset($_GET['myorder']))
			{
			include("myorder.php");
			}
			?>

			<?php
			if(isset($_GET['payoffline']))
			{
				include("payoffline.php");
			}
			?>

			<?php
			if(isset($_GET['myaddress']))
			{
				include("myaddress.php");
			}
			?>

			<?php
			if(isset($_GET['editaccount']))
			{
				include("editaccount.php");
			}
			?>

			<?php
			if(isset($_GET['changepwd']))
			{
				include("changepwd.php");
			}
			?>
			<?php
			if(isset($_GET['mywishlist']))
			{
				include("mywishlist.php");
			}
			?>
			<?php
			if(isset($_GET['deleteaccount']))
			{
				include("deleteaccount.php");
			}
			?>
			<?php
			if(isset($_GET['logout']))
			{
				include("../logout.php");
			}
			?>
		</div>
	</div>

<?php include("C-includes/C-footer.php"); ?>
<?php } ?>