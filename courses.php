<!DOCTYPE html>
<html lang="zxx">
    
	<?php include 'conn.php'; ?>
	<?php include 'header.php'; ?>
		<!--Full width header End-->
	<?php
		if (isset($_GET['page'])) {
			$page = $_GET['page'];
		} else {
			$page = 1;
		}

		$no_of_records_per_page = 9;
		$offset = ($page-1) * $no_of_records_per_page; 
	
		$total_pages_sql = "SELECT COUNT(*) FROM courses";
		$result = mysqli_query($conn,$total_pages_sql);
		$total_rows = mysqli_fetch_array($result)[0];
		$total_pages = ceil($total_rows / $no_of_records_per_page);

		$crs = "SELECT * FROM courses LIMIT $offset, $no_of_records_per_page";
		$cres = mysqli_query($conn,$crs) or die($conn->error);
	?>
		<!-- Breadcrumbs Start -->
		<div class="rs-breadcrumbs bg7 breadcrumbs-overlay">
		    <div class="breadcrumbs-inner">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-12 text-center">
		                    <h1 class="page-title">OUR COURSES</h1>
		                    <ul>
		                        <li>
		                            <a class="active" href="index.php">Home</a>
		                        </li>
		                        <li>Our Courses</li>
		                    </ul>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!-- Breadcrumbs End -->

		<!-- Courses Start -->
        <div class="rs-courses-list sec-spacer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
				<?php
					while ($row = mysqli_fetch_assoc($cres)){
				?>
                        <div class="row course-item">
                        	<div class="col-md-6">
                        	    <div class="course-img">
                        	        <img src="uploads/courses/<?php echo isset($row['crsimg']) ? $row['crsimg'] : '' ;?>" alt="Courses Images" />
                        	        <a class="image-link" href="course-details.php?id=<?php echo isset($row['id']) ? $row['id'] : '' ;?>" title="<?php echo isset($row['crstitle']) ? $row['crstitle'] : '' ;?>">
                        	        	<i class="fa fa-link"></i>
                        	        </a>
                        	    </div>                        		
                        	</div>
                        	<div class="col-md-6">
                    	        <div class="course-header">
                    	    		<span class="course-category"><?php echo isset($row['crstype']) ? $row['crstype'] : '' ;?></span>
                        	    	<h3 class="course-title"><a href="course-details.php?id=<?php echo isset($row['id']) ? $row['id'] : '' ;?>"><?php echo isset($row['crstitle']) ? $row['crstitle'] : '' ;?></a></h3>
                    	        	<div class="course-date">
                    	        		<i class="fa fa-clock-o"></i><?php echo isset($row['crsduration']) ? $row['crsduration'] : '' ;?>
                    	        	</div>
                    	        	<div class="course-value">
                    	        		Price: <span><?php echo isset($row['crsprice']) ? $row['crsprice'] : '' ;?></span>
                    	        	</div>
                    	        </div>
                        	    <div class="course-body">
                        	    	<div class="course-desc">
										<p>
											<?php echo isset($row['crsdesc']) ? $row['crsdesc'] : '' ;?>
										</p>
                        	    	</div>
                        	    	<div class="course-button">
                        	    		<a href="course-details.php?id=<?php echo isset($row['id']) ? $row['id'] : '' ;?>">READ MORE</a>
                        	    	</div>
                        	    </div>                       		
                        	</div>
						</div>
				<?php
					}
				?>
						<nav aria-label="Page navigation example">
							<ul class="pagination justify-content-center">
						<?php
							for($i = 1; $i <= $total_pages; $i++) {
						?>
								<li class="page-item">
									<a class="page-link <?php echo $i == $_GET['page'] ? 'active' : '';?>" href="courses.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
								</li>
						<?php
							}
						?>
							</ul>
						</nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Courses End -->
				
        <!-- Partner Start -->
        <?php include 'partners.php'; ?>
        <!-- Partner End -->
       
		<?php include 'footer.php'; ?>
    </body>
</html>