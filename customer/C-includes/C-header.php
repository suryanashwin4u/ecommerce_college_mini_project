<!--header1-->
		
				<div id="top">
				<div class="container-fluid">
				<!--top left-->
				<div class="offer">
			<a href="#" class="btn btn-primary ">
				<?php 
					if(!isset($_SESSION['customer_email']))
					{
						echo "welcome guest";
					}
					else
					{
						echo "welcome:".$_SESSION['customer_email']."";
					}
				?>
					
			</a>
			<span style="margin-left:30px;">
			<a href="#" >Total Items In Cart :<?php item();?> & Total Amount :<?php totalprice();?></a>
			</span>
				
				</div>
				
				<!--top right-->
				<div>
					<ul class="menu" >
						<li>
						<a href="../cust-reg.php" > Register</a>
						</li>

						<li>
						<?php 
						if(!isset($_SESSION['customer_email']))
						{
							echo "<a href='../checkout.php'>My Account</a>";
						}
						else
						{							echo "<a href='customer/myaccount.php?myorder'>My Account</a>";
						}
						?>
						</li>


						<li>
						<a href="../cart.php"> go to cart</a>
						</li>


						<li>
						
						<?php
						if(!isset($_SESSION['customer_email']))
						{
							echo "<a href='../checkout.php'>Login</a>";
						}
						else
						{
							echo "<a href='../logout.php'>logout</a>";
						}
						?>

						</li>
					</ul>
				</div>
			</div>

	<!--header2--->
			
				<div class="container">
					<div class="navbar">
						<a class="navbar-brand" href="index.php">
							
							<img src="C-images/panasonic.jpg" alt="mySlogo" >
						</a>	

					
						<div class="navbar-nav">
						
							<ul class="nav" >
								
								<li class="active" style="">
									<a href="../index.php">Home</a>
								</li>
								
								<li >
									<a href="../shop.php">Shop</a>
								</li>
								
								<li >
									
								<?php 
								if(!isset($_SESSION['customer_email']))
								{
									echo "<a href='../checkout.php'>My Account</a>";
								}
								else
								{
								echo "<a href='myaccount.php?myorder'>My Account</a>";
								}
								?>
								
								</li>
								
								<li >
									<a href="../cart.php">Shopping Cart</a>
								</li>
								
								<li >
									<a href="../contactus.php">Contact Us</a>
								</li>
						
								<li>
									<a href="../cart.php" class="btn btn-primary change-align">
										<i class="fa fa-shoppin-cart"></i>
										<span><?php item(); ?> items in cart</span>
									</a>
								</li>
							</ul>

						</div>
				
					</div>

				</div>	

							<center><form class="navbar-form" method="get" action="result.php">
								<div class="input-group">
									<input type="text" name="user_query" placeholder="search" class="form-control" required="">
								
									<span class="input-group-btn">
									<button type="button" value="search" name="search" class="btn btn-primary">
										<i class="fa fa-search"></i>
									</button>
									</span>
								</div>
							</form>
							</center>

			</div>