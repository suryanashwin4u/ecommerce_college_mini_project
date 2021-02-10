<div id="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6">
				
				<h4>Important Pages</h4>
				<ul>
					<li><a href="../cart.php">Check Cart</a></li>
					<li><a href="../contact.php">Contact Us</a></li>
					<li><a href="../shop.php">Check Shop</a></li>
					<li><a href="../checkout.php">My Account</a></li>
				</ul>

				<hr>

				<h4>user area</h4>
				<ul>
					<li><a href="../checkout.php">Login</a></li>
					<li><a href="../cus-reg.php">Register</a></li>
				</ul>
				
				<hr class="hidder-md hidder-lg hidder-sm">

			</div>
			<div class="col-md-3 col-sm-6">
				<h4>top product categories</h4>
				<ul>
					<?php
					$get_p_cats="select * from product_categories order by 1";
					$run_p_cats=mysqli_query($con,$get_p_cats);
					while($row_p_cat=mysqli_fetch_array($run_p_cats))
					{
						$p_cat_id=$row_p_cat['p-cat-id'];
						$p_cat_title=$row_p_cat['p-cat-title'];
						echo "<li><a href='shop.php?p_cat=$p_cat_id'> $p_cat_id . $p_cat_title</a></li>";
					}
					?>
				</ul>
				
				<hr class="hidder-md hidder-lg">

			</div>
			<div class="col-md-3 col-sm-6">
				<h4>find us here</h4>
				<p>
					<strong>Ashwani</strong>
					<br>delhi
					<br>suryanashwin4u@gmail.com
					<br>9292929292
				</p>
				<a href="contact.php">Contact Us</a>
				<hr class="hidder-md hidder-lg">
			</div>
			<div class="col-md-3 col-sm-6">
				<h4>Subscribe Us:</h4>
				<p class="text-muted">
					Get Latest Updates On Your Favourite Products 
				</p>
				<form action="" method="post">
					<div class="input-group">
						<input type="text" name="email" class="form-control">
						<span class="input-group-btn">
							<input type="submit" class="btn btn-primary" value="subscribe">
						</span>
					</div>
				</form>
				<hr>
				<h4>Connect With Us:</h4>
				<p class="social">
					<a href="www.facebook.com"><i class="fa fa-facebook"></i></a>
					<a href="www.twitter.com"><i class="fa fa-twitter"></i></a>
					<a href="www.instagram.com"><i class="fa fa-instagram"></i></a>
					<a href="www.gmail.com"><i class="fa fa-google-plus"></i></a>
					

				</p>
			</div>
		</div>
	</div>
</div>
<div id="copyright">
	<div class="container">
		<div class="col-sm-6">
			<p class="pull-left">
				&copy; 2020 Er. SURYAN ASHWIN(MCA)
			</p>
		</div>
		<div class="col-md-6">
			<p class="pull-right">
				CREATED BY:ASHWIN
			</p>
		</div>
	</div>
</div>