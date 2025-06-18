<?php
include('header.php');
include('connection.php');

if(isset($_POST['submit']))
{
	$start=$_POST['start'];
	$to=$_POST['end'];
	$datee=$_POST['datee'];
	
	//echo "start". $start;
	//echo "to". $to;
	//echo "date". $datee;
	
	//$sel=mysqli_query($con,"SELECT * FROM travel_mode WHERE start_location = '$start'   AND end_location = '$to'  AND date = '$datee'");
	
	//$date = "04/17/2024";
	$datetime = DateTime::createFromFormat('m/d/Y', $datee);
	$formatted_date = $datetime->format('Y-m-d');

	//echo $formatted_date;
	
}

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
		                        <h1 class="mb-10">Choose Your Journey</h1>
		                        <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast,day by day.</p>
		                    </div>
		                </div>
		            </div>						
					<div class="row">
						<div class="col-lg-12">
							<table class="table table-bordered">
								<tr>
									<th>Start Location : <?php echo $start ?></th>
									<th>End Location: <?php echo $to ?></th>
									<th colspan="2">Date : <?php echo $formatted_date ?></th>
								</tr>
								<tr>
									<th style="text-align: center;">type</th>
									<th style="text-align: center;">start time</th>
									<th style="text-align: center;">end time</th>
									<th style="text-align: center;">price</th>
								</tr>

								<tr style="background-color: beige;">
									<td colspan="4">
										<img src="img/plane.png" alt="Air Image" style="vertical-align: middle; margin-right: 10px; width: 25px;"> 
										<span style="vertical-align: middle;"><b style="color:black;">Flight</b></span>
									</td>
								</tr>
								<?php 
								$sel="select * from travels where start_location='$start' and end_location='$to' and date='$formatted_date' and travel_type='3'";
								$res=mysqli_query($con,$sel);
								$rows=mysqli_num_rows($res);
								if($rows>0)
								{
								while($row=mysqli_fetch_array($res))
								{
								?>
								
								<tr>
									<td>
										<a href='book.php?id=<?php echo $row['id']; ?>&amt=<?php echo $row['price']; ?>&type=<?php echo $row['travel_type']; ?>'><?php echo $row['travel_name']; ?></a><br>
										<b><?php echo $row['class_1'] ?>:</b> <?php echo $row['class_1seat'] ?> || <b><?php echo $row['class_2'] ?>:</b> <?php echo $row['class_2seat'] ?> || <b><?php echo $row['class_3'] ?>:</b> <?php echo $row['class_3seat'] ?>
									</td>
									<td><?php echo $row['start_time']; ?></td>
									<td><?php echo $row['end_time']; ?></td>
									<td><?php echo "₹". $row['price']; ?></td>
								</tr>
								
								<?php
								}
								}
								else{
									echo "<tr><td colspan='4'>No Service in this area.</td></tr>";
								}
								?>
								
								<tr style="background-color: beige;">
									<td colspan="4">
										<img src="img/train.png" alt="Air Image" style="vertical-align: middle; margin-right: 10px; width: 25px;"> 
										<span style="vertical-align: middle;"><b style="color:black;">Train</b></span>
									</td>
								</tr>
								<?php 
								$sel="select * from travels where start_location='$start' and end_location='$to' and date='$formatted_date' and travel_type='2'";
								$res=mysqli_query($con,$sel);
								$rows=mysqli_num_rows($res);
								if($rows>0)
								{
								while($row=mysqli_fetch_array($res))
								{
								?>
								<tr>
									<td>
										<a href='book.php?id=<?php echo $row['id']; ?>&amt=<?php echo $row['price']; ?>&type=<?php echo $row['travel_type']; ?>'><?php echo $row['travel_name']; ?></a><br>
										<b><?php echo $row['class_1'] ?>:</b> <?php echo $row['class_1seat'] ?> || <b><?php echo $row['class_2'] ?>:</b> <?php echo $row['class_2seat'] ?> || <b><?php echo $row['class_3'] ?>:</b> <?php echo $row['class_3seat'] ?>
									</td>
									<td><?php echo $row['start_time']; ?></td>
									<td><?php echo $row['end_time']; ?></td>
									<td><?php echo "₹". $row['price']; ?></td>
								</tr>
								<?php
								}
								}
								else{
									echo "<tr><td colspan='4'>No Service in this area.</td></tr>";
								}
								?>
								<tr style="background-color: beige;">
									<td colspan="4">
										<img src="img/bus.png" alt="Air Image" style="vertical-align: middle; margin-right: 10px; width: 25px;"> 
										<span style="vertical-align: middle;"><b style="color:black;">Bus</b></span>
									</td>
								</tr>
								<?php 
								$sel="select * from travels where start_location='$start' and end_location='$to' and date='$formatted_date' and travel_type='1'";
								$res=mysqli_query($con,$sel);
								$rows=mysqli_num_rows($res);
								if($rows>0)
								{
								while($row=mysqli_fetch_array($res))
								{
								?>
								<tr>
									<td><a href='book.php?id=<?php echo $row['id']; ?>&amt=<?php echo $row['price']; ?>&type=<?php echo $row['travel_type']; ?>'><?php echo $row['travel_name']; ?></a></td>
									<td><?php echo $row['start_time']; ?></td>
									<td><?php echo $row['end_time']; ?></td>
									<td><?php echo "₹". $row['price']; ?></td>
								</tr>
								<?php
								}
								}
								else{
									echo "<tr><td colspan='4'>No Service in this area.</td></tr>";
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