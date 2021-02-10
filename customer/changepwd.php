<?php
if(isset($_POST['update']))
{
$c_email=$_SESSION['customer_email'];
$old_password=$_POST['oldpwd'];
$new_password=$_POST['newpwd'];
$c_n_password=$_POST['confirmnewpwd'];
$select_cust="select * from customers where customer_email='$c_email' AND customer_pass='$old_password'";
$run_q=mysqli_query($con,$select_cust);
$check_old_pass=mysqli_num_rows($run_q);
if($check_old_pass==0)
{
	echo "<script>alert('your current password is not valid...try again')</script>";
	exit();
}
if($new_password!=$c_n_password)
{
echo "<script>alert('your new password does not match with confirm password')</script>";
	exit();
}
$update_q="update customers set customer_pass='$new_password' where customer_email='$c_email'";
$run_q=mysqli_query($con,$update_q);
echo "<script>alert('password changes successfully')</script>";
echo "<script>window.open('myaccount.php?myorder','_self')</script>";
}
?>


<div class="box">
	<form action="" method="post" enctype="multipart/form-data">
	<center>
		<h3>Change your password</h3>
	</center>
	<div class="form-group">
		<label>enter current password</label>
		<input type="password" name="oldpwd" class="form-control">
	</div>

	<div class="form-group">
		<label>enter new password</label>
		<input type="password" name="newpwd" class="form-control">
	</div>

	<div class="form-group">
		<label>confirm new password</label>
		<input type="password" name="confirmnewpwd" class="form-control">
	</div>
	<div class="text-center">
		<button class="btn btn-primary btn-lg" type="submit" name="update">
			Update Now
		</button>
		
	</div>
</form>
</div>