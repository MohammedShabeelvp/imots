<?php
include('header.php');
include('connection.php');


$sel=mysqli_query($con,"SELECT DISTINCT `start_location` FROM travel_mode");

?>
			
			<!-- start banner Area -->
			<section class="banner-area relative">
				<div class="overlay overlay-bg"></div>				
				<div class="container">
					<div class="row fullscreen align-items-center justify-content-between">
						<div class="col-lg-6 col-md-6 banner-left">
							<h6 class="text-white"></h6>
							<h1 class="text-white">Plan your journey</h1>
							
						</div>
						<div class="col-lg-6 col-md-6 banner-right">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
							  <li class="nav-item">
							    <a class="nav-link active" id="flight-tab" data-toggle="tab" href="#flight" role="tab" aria-controls="flight" aria-selected="true">Travel</a>
							  </li>
							</ul>
							<div class="tab-content" id="myTabContent">
							  <div class="tab-pane fade show active" id="flight" role="tabpanel" aria-labelledby="flight-tab">
								<form class="form-wrap" method="POST" action="travel.php">
									<select class="form-control" name="start">
										<option>From</option>
										<?php
										$sel=mysqli_query($con,"SELECT DISTINCT `start_location` FROM travels");
										while($row=mysqli_fetch_array($sel))
										{
										?>
										<option><?php echo $row['start_location']; ?></option>
										<?php
										}
										?>
									</select>
									
									<select class="form-control" name="end">
										<option>To</option>
										<?php
										$sel=mysqli_query($con,"SELECT DISTINCT `end_location` FROM travels");
										while($row=mysqli_fetch_array($sel))
										{
										?>
										<option><?php echo $row['end_location']; ?></option>
										<?php
										}
										?>
									</select>
									
									<input type="text" class="form-control date-picker" autocomplete="off" min="<?php echo date('Y-m-d');?>" name="datee" placeholder="Start Date" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Start '">
				
									<input type="submit" name="submit" class="primary-btn text-uppercase" value="Search Modes">									
								</form>
								
								
								<?php
								
								
								?>
							
							  </div>
							</div>
						</div>
					</div>
				</div>					
			</section>
			<!-- End banner Area -->


<?php
include('footer.php');
?>