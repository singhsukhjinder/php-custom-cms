<!DOCTYPE html>
<html lang="en">
    
    <?php include 'conn.php'; ?>
    <?php include 'header.php'; ?>
        <!--Full width header End-->
		
		<!-- Breadcrumbs Start -->
		<div class="rs-breadcrumbs bg7 breadcrumbs-overlay">
		    <div class="breadcrumbs-inner">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-12 text-center">
		                    <h1 class="page-title">ncrt </h1>
		                    <ul>
		                        <li>
		                            <a class="active" href="index.html">Home</a>
		                        </li>
		                        <li>ncrt</li>
		                    </ul>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!-- Breadcrumbs End -->
		
		<!-- Blog Single Start Here -->
		<div class="single-blog-details sec-spacer">
			<div class="container" style="padding-bottom:50px;">
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="single-image  text-center">
							<img src="images/blog-details/ncrt.jpeg" alt="single">
						</div><!-- .single-image End -->
						<?php
							$sql = "SELECT * FROM classescontent WHERE class='ncert'";
							$res = mysqli_query($conn,$sql) or die($conn->error);
							if (mysqli_num_rows($res) >= 1 ) {
								while ($row = mysqli_fetch_assoc($res)) {
									$title = $row['title'];
									$description = $row['description'];
								}
							}
							echo isset($title) ? '<h1>'.$title.'</h1>' : '';
							echo isset($description) ? $description : '';
						?>     
					</div>            
				</div>
			</div>
			<div class="container-fluid" style="background: #f4f4f4;padding-top:50px;padding-bottom:50px;">
			<div class="row justify-content-center text-center">
				<div class="col-md-12 justify-content-center"><h1 class=" justify-content-center text-center" style="text-transform:uppercase">Syllabus</h1></div>
			</div>
					<?php
						$sql = "SELECT DISTINCT subject FROM syllabus WHERE class='ncert'";
						$res = mysqli_query($conn,$sql) or die($conn->error);
						if (mysqli_num_rows($res) >= 1 ) {
							while ($row = mysqli_fetch_assoc($res)) {
							
								echo '<div class="row justify-content-center"><div class="col-lg-12 text-center"><h2 class="subjectname">'.$row['subject'].'</h2></div></div>
								<div class="row justify-content-center">';
								$sql1 = "SELECT * FROM syllabus WHERE class='ncert' AND subject='$row[subject]'";
								$res1 = mysqli_query($conn,$sql1) or die($conn->error);
								if (mysqli_num_rows($res1) >= 1 ) {
									while ($row1 = mysqli_fetch_assoc($res1)) {
										
										$dt = explode(".",$row1['filename']);
										if($dt[0] != ''){
											echo '<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 text-center" style="word-break: break-all">
												<div class="borderred">
													<div class="row">
														<div class="col-sm-12 col-md-6 col-lg-6 mb-sm-3">
															<img src="uploads/'.$row1['class'].'/'.$row1['placehldrimg'].'" alt="Download" width="100">
														</div>
														<div class="col-sm-12 col-md-6 col-lg-6 filename">'.$dt[0].'<br><br>
															<a href="uploads/'.$row1['class'].'/'.$row1['filename'].'"  download="'.$row1['filename'].'" class="">
																<img src="uploads/downloadbtn.png" alt="download">
																</a>
														</div>
													</div>
												</div>
											</div>';
										}
									}
								}
								echo '</div>';
							}
						}
					?> 
				</div>
			</div>
		</div>
		<!-- Blog Single End  -->     
       
        <!-- Partner Start -->
        <?php include 'partners.php';?>
        <!-- Partner End -->
       
        <?php include 'footer.php'; ?>
    </body>
</html>