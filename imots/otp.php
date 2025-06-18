<?php
include('header.php');
$rand=rand(100000,999999);
?>
	  
			<!-- start banner Area -->
			<section class="relative about-banner">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Login to continue				
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
							<form class="form-area contact-form text-right" method="post">
								<div class="row">	
									<div class="col-lg-12 form-group">
										<label style="float: left;">An Otp has sent to your registered mail</label>
										<input  type="text" name="rand1" placeholder="Enter Otp" class="form-control input-md" required>
										<input type="hidden" name="rand2" value="<?php echo $rand; ?>" />
										<br>
										
									</div>
									<div class="col-lg-12">
										<div class="alert-msg" style="text-align: left;"></div>
										<button type="submit" class="genric-btn primary" name="submit" style="float: right;">Verify</button>											
									</div>
								</div>
							</form>	
						</div>
					</div>
				</div>	
			</section>
			<!-- End contact-page Area -->
			
			
<?php
if(isset($_POST['submit']))
{
	// Compare 
	if ($_POST['rand1'] == $_POST['rand2']) {
			
			
			 echo '<script>
				  alert("Succesfully Registered!")
					  window.location="login.php";
					  </script>';
	} else {
		echo '<script>
				  alert("Ivalid otp!")
					  window.location="otp.php";
					  </script>';
	}
	
}
else
{
	
  $subject="Welcome To IMOTS";
  $title="Account Verification";
  $msg="Greetings from IMOTS. \n Otp: $rand \n To verify your account pleas enter the otp to continue.";
  
  $email=$_SESSION['useremail'];
	

	$url="https://alc-training.in/gateway.php"; 

	$ch = curl_init();
	if (!$ch){die("Couldn't initialize a cURL
	handle");} $ret = curl_setopt($ch,CURLOPT_URL,$url); 
	curl_setopt ($ch,CURLOPT_POST, 1);
	curl_setopt($ch,
	CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch,CURLOPT_SSL_VERIFYHOST, 2);
	curl_setopt ($ch,CURLOPT_POSTFIELDS,"email=$email&msg=$msg&subject=$subject&title=$title");
	$ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	 curl_exec($ch); //
	 curl_close($ch);
	
	
	
}


?>			


			<!-- start footer Area -->		
<?php
include('footer.php');
?>