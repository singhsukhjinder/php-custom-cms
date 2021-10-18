<!DOCTYPE html>
<html lang="en">
    
    <?php include 'conn.php'; ?>
    <?php include 'header.php'; ?>
    <!--Full width header End-->
    <?php 
        if(isset($_GET['id'])) {
            $did = $_GET['id'];
            $sql = "SELECT * FROM courses WHERE id='$did'";
            $res = mysqli_query($conn,$sql) or die($conn->error);
            $row = mysqli_fetch_assoc($res);
            $crstype = isset($row['crstype']) ? $row['crstype'] : '-';
            $crstitle = isset($row['crstitle']) ? $row['crstitle'] : '-';
            $crsdesc = isset($row['crsdesc']) ? $row['crsdesc'] : '-';
            $crsrewiews = isset($row['crsrewiews']) ? $row['crsrewiews'] : '-';
            $crsrating = isset($row['crsrating']) ? $row['crsrating'] : '-';
            $crstime = isset($row['crstime']) ? $row['crstime'] : '-';
            $crsprice = isset($row['crsprice']) ? $row['crsprice'] : '-';
            $crsstrtdate = isset($row['crsstrtdate']) ? $row['crsstrtdate'] : '-';
            $crsduration = isset($row['crsduration']) ? $row['crsduration'] : '-';
            $crsstudents = isset($row['crsstudents']) ? $row['crsstudents'] : '-';
            $crsbtntitle = isset($row['crsbtntitle']) ? $row['crsbtntitle'] : '-';
            $crsbtnlink = isset($row['crsbtnlink']) ? $row['crsbtnlink'] : '-';
            $crsimg = isset($row['crsimg']) ? $row['crsimg'] : '-';
        }
    ?>
		<!-- Breadcrumbs Start -->
		<div class="rs-breadcrumbs bg7 breadcrumbs-overlay">
		    <div class="breadcrumbs-inner">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-12 text-center">
		                    <h1 class="page-title"><?php echo $crstitle; ?></h1>
		                    <ul>
		                        <li>
		                            <a class="active" href="index.php">Home</a>
		                        </li>
		                        <li><?php echo $crstitle; ?></li>
		                    </ul>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!-- Breadcrumbs End -->

		<!-- Courses Details Start -->
        <div class="rs-courses-details pt-100 pb-70">
            <div class="container">
                <div class="row mb-30">
                    <div class="col-lg-12 col-md-12">
                	    <div class="detail-img" style="text-align:center;">
                	        <img src="uploads/courses/<?php echo $crsimg ?>" alt="<?php echo $crstitle; ?>" style="margin:auto;" />
                	        <div class="course-seats">
                	        	<?php echo  $crsstudents; ?> <span>STUDENTS</span>
                	        </div>
                	    </div>
                	    <div class="course-content">
                	    	<!--<h3 class="course-title">Computer Science And Engineering</h3>-->
                	    	<div class="course-instructor">
                	    		<div class="row">
                	    			<div class="col-md-12">
                	    				<h3 class="instructor-title">BASIC <span class="primary-color">INFORMATION</span></h3>
                	    				<div class="row info-list">
                	    					<div class="col-md-6">
                	    						<ul>
                	    							<li>
                	    								<span>Price :</span> INR <?php echo $crsprice; ?>
                	    							</li>
                	    							<li>
                	    								<span>Length :</span> <?php echo $crsduration; ?>
                	    							</li>
                	    							<li>
                	    								<span>TIME :</span> <?php echo $crstime; ?>
                	    							</li>
                	    						</ul>
                	    					</div>
                	    					<div class="col-md-6">
                	    						<ul>
                                                    <li>
                	    								<span>Category :</span> <?php echo $crstype; ?>
                	    							</li>
                	    							<li>
                	    								<span>Started :</span> <?php echo $crsstrtdate; ?>
                	    							</li>
                	    						</ul>
                	    					</div>
                	    				</div>
        	    						<div class="apply-btn">
        	    							<a href="<?php echo $crsbtnlink; ?>"><?php echo $crsbtntitle; ?></a>
        	    						</div>
                	    			</div>
                	    		</div>
                	    	</div>
                	    </div>
                	    <div class="course-desc">
                	    	<h3 class="desc-title">Course Description</h3>
                	    	<div class="desc-text">
                            <?php echo $crsdesc; ?>
                	    	</div>
                	    </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Courses Details End -->
				
        <!-- Partner Start -->
        <?php include 'partners.php';?>
        <!-- Partner End -->
       
        <?php include 'footer.php'; ?>
    </body>

<!-- Mirrored from keenitsolutions.com/products/html/edulearn/edulearn-demo/courses-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 24 Sep 2018 11:26:58 GMT -->
</html>