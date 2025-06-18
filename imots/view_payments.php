<?php
include('header.php');
include('connection.php');



?>
			
			<!-- start banner Area -->
			<section class="banner-area relative" style="height: 125px;">
				<div class="overlay overlay-bg"></div>				
				<div class="container">
					<div class="row fullscreen align-items-center justify-content-between">
						
					</div>
				</div>					
			</section>
			<!-- End banner Area -->
			
			<!-- Start popular-destination Area -->
			<section class="popular-destination-area section-gap">
				<div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">View Payments</h1>
		                    </div>
		                </div>
		            </div>						
					<div class="row">
						<div class="col-lg-12">
							<table class="table table-bordered">
								<tr>
									<th style="text-align: center;">#</th>
									<th style="text-align: center;">Booking ID</th>
									<th style="text-align: center;">Amount</th>
									<th style="text-align: center;">Card Name</th>
									<th style="text-align: center;">Card Number</th>
									<th style="text-align: center;">Card Type</th>
									<th style="text-align: center;">Expiry</th>
									<th style="text-align: center;">Payment Date</th>
								</tr>

								<?php 
								$sel="SELECT * FROM payment WHERE uid='$_SESSION[uid]'";
								$res=mysqli_query($con,$sel);
								$rows=mysqli_num_rows($res);
								if($rows > 0) {
									$i = 1;
									while($row=mysqli_fetch_array($res)) {
										?>
										<tr>
											<td><?php echo $i; ?></td>
											<td><?php echo $row['booking_id']; ?></td>
											<td><?php echo $row['amount']; ?></td>
											<td><?php echo $row['cardname']; ?></td>
											<td><?php echo $row['cardnumber']; ?></td>
											<td><?php echo $row['card_type']; ?></td>
											<td><?php echo $row['expiry']; ?></td>
											<td><?php echo $row['date']; ?></td>
										</tr>
										<?php
										$i++;
									}
								} else {
									echo "<tr><td colspan='9'>No payment records found.</td></tr>";
								}
								?>
							</table>

						</div>
					</div>
				</div>	
			</section>
			<!-- End popular-destination Area -->
		
			<!-- start footer Area -->		
<?php
include('footer.php');
?>