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
								Seat Booking			
							</h1>	
							<p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="contact.html"> Booking</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->				  

			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<form class="form-area contact-form text-right"   method="post">
								<div class="row">	
									<div class="col-lg-6 form-group">
										<label style="float: left;">Amount</label>
										<input name="amount" placeholder="Enter amount" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text" value="<?php echo $_REQUEST['amt'] ?>" readonly>
									</div>
									<div class="col-lg-6 form-group">
										<label style="float: left;">Card Name</label>
										<input name="cardname" placeholder="Enter name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter name'" class="common-input mb-20 form-control" required="" type="text">
									</div>
									<div class="col-lg-6 form-group">
										<label style="float: left;">Card Number</label>
										<input name="cardnumber" placeholder="Enter card number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter card number'" class="common-input mb-20 form-control" required="" type="text">
									</div>
									<div class="col-lg-6 form-group">
										<label style="float: left;">Card Type</label>
										<select name="card_type" class="common-input mb-20 form-control">
											<option value="debit">debit</option>
											<option value="credit">credit</option>
										</select>
									</div>
									<div class="col-lg-6 form-group">
										<label style="float: left;">Expiry</label>
										<input name="expiry" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="month">
									</div>
									<div class="col-lg-6 form-group">
										<label style="float: left;">Cvv</label>
										<input name="cvv" placeholder="Enter cvv" pattern="[0-9]{3}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter  cvv'" class="common-input mb-20 form-control" required="" type="password">
									</div>
									<div class="col-lg-12">
										<div class="alert-msg" style="text-align: left;"></div>
										<button class="genric-btn primary" style="float: left;" name="submit">Submit</button>	<br><br><br>
									
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

			if(isset($_POST['submit'])) {
				// Retrieve form data
				$booking_id = $_REQUEST['id'];
				$uid = $_SESSION['uid'];
				$amount = $_POST['amount'];
				$cardname = $_POST['cardname'];
				$cardnumber = $_POST['cardnumber'];
				$card_type = $_POST['card_type'];
				$expiry = $_POST['expiry'];
				$cvv = $_POST['cvv'];
				$date = date('Y-m-d'); // Current date

				// Insert payment details into the payment table
				$insert_payment_query = "INSERT INTO `payment`(`uid`, `booking_id`, `amount`, `cardname`, `cardnumber`, `card_type`, `expiry`, `cvv`, `date`)
										 VALUES ('$uid', '$booking_id', '$amount', '$cardname', '$cardnumber', '$card_type', '$expiry', '$cvv', '$date')";
				$payment_result = mysqli_query($con, $insert_payment_query);

				if($payment_result) {
					// Payment insertion successful
					
					mysqli_query($con,"update booking set status='completed' where id='$booking_id'");
					
					echo '<script>
							alert("Payment successful!");
							window.location="view_booking.php";
						  </script>';
				} else {
					// Payment insertion failed
					echo '<script>
							alert("Payment failed. Please try again.");
						  </script>';
				}
			}
			?>


			<!-- start footer Area -->		
<?php
include('footer.php');
?>