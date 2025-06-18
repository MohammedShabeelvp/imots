<?php
include('header.php');
?>
	  
			<!-- start banner Area -->
			<section class="relative about-banner">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Register to continue				
							</h1>	
							<p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="contact.html"> Login</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->				  

			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 d-flex flex-column address-wrap">
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-home"></span>
								</div>
								<div class="contact-details">
									<h5>Binghamton, New York</h5>
									<p>
										4343 Hinkle Deegan Lake Road
									</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-phone-handset"></span>
								</div>
								<div class="contact-details">
									<h5>00 (958) 9865 562</h5>
									<p>Mon to Fri 9am to 6 pm</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-envelope"></span>
								</div>
								<div class="contact-details">
									<h5>support@colorlib.com</h5>
									<p>Send us your query anytime!</p>
								</div>
							</div>														
						</div>
						<div class="col-lg-8">
							<form class="form-area contact-form text-right"   method="post">
								<div class="row">	
									<div class="col-lg-12 form-group">
										<input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">
									
										<input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">

										<input name="phone" placeholder="Enter Phone" onfocus="this.placeholder = ''" pattern="[0-9]{10}" onblur="this.placeholder = 'Enter phone'" class="common-input mb-20 form-control" required="" type="text">
										
										<input name="password" placeholder="Enter password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter password'" class="common-input mb-20 form-control" required="" type="password">
										
										<textarea class="common-textarea form-control" name="address" placeholder="Enter Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Address'" required=""></textarea>			
									</div>
									<div class="col-lg-12">
										<div class="alert-msg" style="text-align: left;"></div>
										<button class="genric-btn primary" style="float: right;" name="submit">Register</button>	<br><br><br>
										Already a user? <a href="login.php">Login Now</a>
									</div>
								</div>
							</form>	
						</div>
					</div>
				</div>	
			</section>
			<!-- End contact-page Area -->
			
			<?php
			  include("connection.php");
			  if(isset($_POST['submit']))
			  {
				  $name=$_POST['name'];
				  $email=$_POST['email'];
				  $phone=$_POST['phone'];
				  $password=$_POST['password'];
				  $address=$_POST['address'];
				  
				  $_SESSION['useremail']=$email;
				  
				  $ins="insert into user(name,email,phone,password,address) values('$name','$email','$phone','$password','$address')";
				  //echo $ins;
				  $res=mysqli_query($con,$ins);
				  if($res)
				  {
					  
				  echo '<script>
				  //alert("Succesfully Registered!")
					  window.location="otp.php";
					  </script>';
				  }
				  
			  }
			 ?>

			<!-- start footer Area -->		
<?php
include('footer.php');
?>