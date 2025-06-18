<?php
include('header.php');
 include("connection.php");
if($_SESSION['uid']=='')
{
	echo '<script>
		  alert("Please login to continue!")
			  window.location="login.php";
			  </script>';
		  
}
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
										<label style="float: left;">Name</label>
										<input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">
									</div>
									<div class="col-lg-6 form-group">
										<label style="float: left;">No of seats</label>
										<input name="seats" placeholder="Enter no of seats" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="number">
									</div>
									<div class="col-lg-6 form-group">
										<label style="float: left;">Class Type</label>
										<?php 
										$travels_id=$_REQUEST['type'];
										$query = "SELECT class_1, class_2, class_3 FROM travels WHERE id = $travels_id";
										$result = mysqli_query($con, $query);
										$row=mysqli_fetch_array($result);
										if($row)
										{
										$class_1 = $row['class_1'];
										$class_2 = $row['class_2'];
										$class_3 = $row['class_3'];
										?>
										<select name="seat_type" class="common-input mb-20 form-control" >
											<option value="">Select type</option>
											<option value="<?php echo $class_1 ?>"><?php echo $class_1 ?></option>
											<option value="<?php echo $class_2 ?>"><?php echo $class_2 ?></option>
											<option value="<?php echo $class_3 ?>"><?php echo $class_3 ?></option>
											<!-- Add more options as needed -->
										</select>
										<?php
										}
										?>
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
			 
			  if(isset($_POST['submit']))
			  {
				  $name=$_POST['name'];
				  $type=$_POST['seat_type'];
				  $seat=$_POST['seats'];
				  $date=date('Y-m-d H:i:s');
				  $uid=$_SESSION['uid'];
				  $amt=$_REQUEST['amt'];
				  
				  //$_SESSION['useremail']=$email;
				  
				  $ins="INSERT INTO `booking`(`user_id`, `travel_id`, `user`, `seats`, `date`, `status`,price,type) values('$uid','$_REQUEST[id]','$name','$seat','$date','pending','$amt','$type')";
				  //echo $ins;
				  $res=mysqli_query($con,$ins);
				  if($res)
				  {
					  
				  echo '<script>
						alert("Seats booked!")
					  window.location="view_booking.php";
					  </script>';
				  }
				  
			  }
			 ?>

			<!-- start footer Area -->		
<?php
include('footer.php');
?>