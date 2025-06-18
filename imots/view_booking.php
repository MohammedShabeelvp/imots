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
			<section class="popular-destination-area section-gap"style="background-image: url('path/to/your/image.jpg');" >
				<div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Your Bookings</h1>
		                        <p>Check all your booking and proceed for payments </p>
		                    </div>
		                </div>
		            </div>						
					<div class="row">
						<div class="col-lg-12">
							<table class="table table-bordered">
								<tr>
									<th style="text-align: center;">#</th>
									<th style="text-align: center;">Travel id</th>
									<th style="text-align: center;">Name</th>
									<th style="text-align: center;">Seats</th>
									<th style="text-align: center;">Seat Type</th>
									<th style="text-align: center;">Price</th>
									<th style="text-align: center;">Booking Date</th>
									<th style="text-align: center;">Status</th>
								</tr>

								<?php 
								$sel="select * from booking where user_id='$_SESSION[uid]'";
								$res=mysqli_query($con,$sel);
								$rows=mysqli_num_rows($res);
								if($rows>0)
								{
									$i=1;
								while($row=mysqli_fetch_array($res))
								{
									$sql=mysqli_query($con,"select * from travels where id='$row[travel_id]'");
									$cc=mysqli_fetch_array($sql);
									
								?>
								
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $cc['travel_name']; ?></td>
									<td><?php echo $row['user']; ?></td>
									<td><?php echo $row['seats']; ?></td>
									<td><?php echo $row['type']; ?></td>
									<td><?php echo $row['price']; ?></td>
									<td><?php echo $row['date']; ?></td>
									<td><?php echo $row['status']; ?></td>
									<td>
										<?php
										if($row['status']=='pending')
										{
											$cc=$row['seats']*$row['price'];
											echo "<a href='payment.php?id=$row[id]&amt=$cc'>payment</a>";
										}
										?>
									</td>
								</tr>
								
								<?php
								$i++;
								}
								}
								else{
									echo "<tr><td colspan='6'>No data found for Air travel type.</td></tr>";
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