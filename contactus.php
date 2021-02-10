<?php
session_start();
include("includes/mydb.php");
include("functions/functions.php");
?>

<!DOCTYPE html>
<html>
<head>
	
	<title>Contact-Us</title>
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
<!--header--->
<?php
	include("includes/header.php");
?>

<!--breadcrumb--->
	<div id="content">
		<div class="container-fluid m-md-2">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li>Contact Us</li>
				</ul>
			</div>
		</div>
	</div>

	<!--sidebar-->
<div class="d-flex">
	<?php include("includes/sidebar.php"); ?>
	
	<div class="col-md-9">
		<div class="box">
			<div class="box-header">
				<center>
					<h2>contact us</h2>
					<p class="text-muted"> if you have any questions, please feel free to contact us, our customer service center is working for you 24/7.</p>
				</center>
				</div>
				<form action="contactus.php" method="post">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" required="" class="form-control">

					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" required="" class="form-control">

					</div>

					<div class="form-group">
						<label>Subject
						</label>
						<input type="text" name="subject" required="" class="form-control">

					</div>


					<div class="form-group">
						<label>Message
						</label>
						<textarea class="form-control" name="message"></textarea>

					</div>


					<div class="text-center">
						<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-user-md"></i>
							Send Massage
						</button>
					</div>
				</form>
			</div>
			</div>
			</div>




<?php 
include("includes/footer.php");
?>


</div>
</div>
</body>
</html>


<?php 
if(isset($_POST['submit']))
{

$sender_name=$_POST['name'];	
$sender_email=$_POST['email'];
$sender_subject=$_POST['subject'];
$sender_message=$_POST['message'];
$receiver_email="suryanashwin4u@gmail.com";
mail($receiver_email,$sender_name,$sender_subject,$sender_message,$sender_email);

$email=$_POST['email'];
$subject="welcome to our website";
$msg="i shall get you soon, thanks for sending email";
$from="suryanashwin4u@gmail.com";
mail($email,$subject,$msg,$from);
echo "<h2 align='center'>Your message has been sent</h2>";

}
?>