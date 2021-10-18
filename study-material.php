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
		                    <h1 class="page-title">Study Material </h1>
		                    <ul>
		                        <li>
		                            <a class="active" href="index.html">Home</a>
		                        </li>
		                        <li>Study Material</li>
		                    </ul>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!-- Breadcrumbs End -->
		
		<!-- Blog Single Start Here -->
		<div class="single-blog-details sec-spacer">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-12">
						<div class="row">
							<?php
								include 'conn.php';
								$sql = "SELECT DISTINCT class FROM syllabus";
								$res = mysqli_query($conn,$sql) or die($conn->error);
								if (mysqli_num_rows($res) >= 1 ) {
									while ($row = mysqli_fetch_row($res)) {
										echo '<h1>'.$row[0].'</h1>';
										$sql1 = "SELECT * FROM syllabus WHERE class='$row[0]'";
										$res1 = mysqli_query($conn,$sql1) or die($conn->error);
										while ($row1 = mysqli_fetch_row($res1)) {
											print_r($row1);
							?>
											<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
											<a href="uploads/<?php echo $row1[2];?>" download='<?php echo $row1[2];?>'>this</a>
											</div>
							<?php
										}
									}
								}

							?>  
						</div>                         
					</div>
                    <div class="col-lg-4 col-md-12">
                        <div class="sidebar-area">
                            <div class="search-box">
                                <h3 class="title">Search Courses</h3>
                                <div class="box-search">
                                    <input class="form-control" placeholder="Search Here ..." name="srch-term" id="srch-term" type="text">
                                    <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </div>
                            </div><!-- .search-box end -->
                            <div class="cate-box">
                                <h3 class="title">Video Categories</h3>
                                <ul>
                                    <li>
                                        <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#">Analysis & Features <span>(05)</span></a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#">Video Lecture <span>(07)</span></a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#">Chemistry Classe <span>(09)</span></a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#"> Jee/Mains <span>(08)</span></a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#">General Education <span>(04)</span></a>
                                    </li>
                                </ul>
                            </div><!-- .cate-box end -->
                            <div class="latest-courses">
                                <h3 class="title">Latest Courses</h3>
                                <div class="post-item">
	                                <div class="post-img">
	                                    <a href="blog-details.html"><img src="images/blog-details/sm1.jpg" alt="" title="News image"></a>
	                                </div>
	                                <div class="post-desc">
	                                    <h4><a href="blog-details.html">Chemistry Classes</a></h4>
	                                    <span class="duration"> 
	                                        <i class="fa fa-clock-o" aria-hidden="true"></i> 1 Years
	                                    </span> 
	                                    <span class="price">Price: <span>$$</span></span>
	                                </div>
	                            </div><!-- .post-item end -->
	                            <div class="post-item">
	                                <div class="post-img">
	                                    <a href="blog-details.html"><img src="images/blog-details/sm2.jpg" alt="" title="News image"></a>
	                                </div>
	                                <div class="post-desc">
	                                    <h4><a href="blog-details.html">Online Courses</a></h4>
	                                    <span class="duration"> 
	                                        <i class="fa fa-clock-o" aria-hidden="true"></i> 1 Years
	                                    </span> 
	                                    <span class="price">Price: <span>$$</span></span>
	                                </div>
	                            </div><!-- .post-item end -->
	                            <div class="post-item">
	                                <div class="post-img">
	                                    <a href="blog-details.html"><img src="images/blog-details/sm3.jpg" alt="" title="News image"></a>
	                                </div>
	                                <div class="post-desc">
	                                    <h4><a href="blog-details.html">IELTS Classes</a></h4>
	                                    <span class="duration"> 
	                                        <i class="fa fa-clock-o" aria-hidden="true"></i> 1-3 Months
	                                    </span> 
	                                    <span class="price">Price: <span>$$</span></span>
	                                </div>
	                            </div><!-- .post-item end --> 
                            </div>
                            <div class="tags-cloud clearfix">
                                <h3 class="title">Product Tags</h3>
                                <ul>
                                    <li>
                                        <a href="#">SCIENCE</a>
                                    </li>
                                    <li>
                                        <a href="#">PHYSICS</a>
                                    </li>
                                    <li>
                                        <a href="#">MATHEMATICS</a>
                                    </li>
                                    <li>
                                        <a href="#">BUSINESS</a>
                                    </li>
                                    <li>
                                        <a href="#">BIOLOGY</a>
                                    </li>
                                    <li>
                                        <a href="#">RESEARCH</a>
                                    </li>
                                    <li>
                                        <a href="#">ARTS</a>
                                    </li>
                                    <li>
                                        <a href="#">COMMERCE</a>
                                    </li>
                                </ul>
                            </div><!-- .tags-cloud end --> 
                            <div class="newsletter">
                                <h4>Join Our Newsletter</h4>
                                <p>Sign up for our Newsletter !</p>
                                <div class="box-newsletter">
                                    <input class="form-control" placeholder="info@studyrocks.in" name="newsletter-term" id="newsletter-term" type="text">
                                    <button class="btn btn-default" type="submit"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                                </div>
                            </div><!-- .newsletter end --> 
                        </div><!-- .sidebar-area end --> 
                    </div>             
				</div>
			</div>
		</div>
		<!-- Blog Single End  -->     
       
        <!-- Partner Start -->
        <div id="rs-partner" class="rs-partner sec-color pt-70 pb-170">
            <div class="container">
				<div class="rs-carousel owl-carousel" data-loop="true" data-items="5" data-margin="80" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="false" data-nav-speed="false" data-mobile-device="2" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="4" data-ipad-device-nav="false" data-ipad-device-dots="false" data-md-device="5" data-md-device-nav="false" data-md-device-dots="false">
                    <div class="partner-item">
                        <a href="#"><img src="images/partner/1.png" alt="Partner Image"></a>
                    </div>
                    <div class="partner-item">
                        <a href="#"><img src="images/partner/2.png" alt="Partner Image"></a>
                    </div>
                    <div class="partner-item">
                        <a href="#"><img src="images/partner/3.png" alt="Partner Image"></a>
                    </div>
                    <div class="partner-item">
                        <a href="#"><img src="images/partner/4.png" alt="Partner Image"></a>
                    </div>
                    <div class="partner-item">
                        <a href="#"><img src="images/partner/5.png" alt="Partner Image"></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Partner End -->
       
        <?php include 'footer.php'; ?>
    </body>

<!-- Mirrored from keenitsolutions.com/products/html/edulearn/edulearn-demo/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 24 Sep 2018 11:25:49 GMT -->
</html>