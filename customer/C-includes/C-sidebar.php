
<div class="box">
	<div class="panel-heading ">
		<center>
			<img src="C-images/1.jpg" class="img-fluid">
		</center>
		<br>
		<h4 align="center" class="panel-title">Name:ashwin </h4>
	</div>
	<div class="  ">
		<ul class="d-flex flex-column">
			<li class="p-2 bd-highlight <?php if(isset($_GET[myorder])) {echo "active";}?>">
				<a href="myaccount.php?myorder"><i class="fa fa-list"></i>My order</a>
			</li>
			<li class="p-2 <?php if(isset($_GET[payoffline])) {echo "active";} ?>">
				<a href="myaccount.php?payoffline"><i class="fa fa-bolt"></i>Pay Offline</a>
			</li>
			<li class=" p-2 <?php if(isset($_GET[myaddress])) {echo "active";} ?>">
				<a href="myaccount.php?myaddress"><i class="fa fa-user"></i>My Address</a>
			</li>
			<li class="p-2 <?php if(isset($_GET[editaccount])) {echo "active";} ?>">
				<a href="myaccount.php?editaccount"><i class="fa fa-pencil"></i>Edit Account</a>
			</li>
			<li class="p-2 <?php if(isset($_GET[changepwd])) {echo "active";} ?>">
				<a href="myaccount.php?changepwd"><i class="fa fa-user"></i>Change Password</a>
			</li>
			<li class="p-2 <?php if(isset($_GET[mywishlist])) {echo "active";} ?>">
				<a href="myaccount.php?mywishlist"><i class="fa fa-bolt"></i>My Wish List</a>
			</li>
			<li class="p-2 <?php if(isset($_GET[deleteaccount])) {echo "active";} ?>">
				<a href="myaccount.php?deleteaccount"><i class="fa fa-trace"></i>Delete Account</a>
			</li>
			<li class="p-2 <?php if(isset($_GET[logout])) {echo "active";} ?>">
				<a href="myaccount.php?logout"><i class="fa fa-sign-out"></i>Log Out</a>
			</li>

		</ul>
	</div>
</div>


