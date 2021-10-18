<!DOCTYPE html>
<html lang="en">
    
	<?php include 'conn.php'; ?>
	<?php include 'header.php'; ?>
	
	<?php
		$sql = "SELECT DISTINCT teacher_field FROM teachers";
		$res = mysqli_query($conn,$sql) or die($conn->error);
	?>
		<!-- Breadcrumbs Start -->
		<div class="rs-breadcrumbs bg7 breadcrumbs-overlay">
		    <div class="breadcrumbs-inner">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-12 text-center">
		                    <h1 class="page-title">OUR TEACHERS</h1>
		                    <ul>
		                        <li>
		                            <a class="active" href="index.html">Home</a>
		                        </li>
		                        <li>Our Teachers</li>
		                    </ul>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!-- Breadcrumbs End -->

		<!-- Team Start -->
        <div id="rs-team-2" class="rs-team-2 team-page sec-spacer">
			<div class="container">
                <div class="gridFilter">
					<button class="active" data-filter="*">ALL</>
					<?php
						while ($row = mysqli_fetch_assoc($res)) {
							echo '<button data-filter=".'.$row["teacher_field"].'">'.$row["teacher_field"].'</button>';
						}
					?>
                </div>
				<div class="row grid">
				<?php
					$sql1 = "SELECT * FROM teachers ORDER BY teacher_field";
					$res1 = mysqli_query($conn,$sql1) or die($conn->error);
					if (mysqli_num_rows($res1) >= 1 ) {
						while ($row1 = mysqli_fetch_assoc($res1)) { 
				?>
							<div class="col-lg-3 col-md-6 col-xs-6 grid-item <?php echo$row1['teacher_field']; ?>">
								<div class="team-item">
									<div class="team-img">
										<a href="#"><img src="uploads/teachers/<?php echo $row1['teacher_img']; ?>" alt="" /></a>
										<div class="social-icon">
											<a href="<?php echo $row1['teacher_fb']; ?>"><i class="fa fa-facebook"></i></a>
											<a href="<?php echo $row1['teacher_twt']; ?>"><i class="fa fa-twitter"></i></a>
											<a href="<?php echo $row1['teacher_gpls']; ?>"><i class="fa fa-google-plus"></i></a>
											<a href="<?php echo $row1['teacher_inked']; ?>"><i class="fa fa-linkedin"></i></a>
										</div>
									</div>
								</div>						
							</div>
				<?php
						}
					}
				?>

					
				</div>
			</div>
			    <!--nav-- aria-label="Page navigation example">
					<ul class="pagination">
						<li class="page-item disabled"><a class="page-link fa fa-angle-left" href="#" tabindex="-1"></a></li>
						<li class="page-item"><a class="page-link active" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link dotted" href="#">...</a></li>
						<li class="page-item"><a class="page-link" href="#">5</a></li>
						<li class="page-item"><a class="page-link" href="#">6</a></li>
						<li class="page-item"><a class="page-link fa fa-angle-right" href="#"></a></li>
					</ul>
			    </!--nav-->
			</div>
        </div>
        <!-- Team End -->
				
        <!-- Partner Start -->
		<?php include 'partners.php'; ?>
        <!-- Partner End -->
       
		<?php include 'footer.php'; ?>
    </body>

<!-- Mirrored from keenitsolutions.com/products/html/edulearn/edulearn-demo/teachers.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 24 Sep 2018 11:26:00 GMT -->
</html>