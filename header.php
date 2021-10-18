<?php session_start(); ?>
<!-- Mirrored from keenitsolutions.com/products/html/edulearn/edulearn-demo/index4.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 24 Sep 2018 11:19:40 GMT -->
<head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <title>StudyRocks| E-learning hub worldwide Welcomes you</title>
        <meta name="description" content="">
        <!-- responsive tag -->
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- favicon -->
        <link rel="apple-touch-icon" href="apple-touch-icon.html">
        <link rel="shortcut icon" type="image/x-icon" href="images/fav.png">
        <!-- bootstrap v4 css -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <!-- font-awesome css -->
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <!-- animate css -->
        <link rel="stylesheet" type="text/css" href="css/animate.css">
        <!-- owl.carousel css -->
        <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
		<!-- slick css -->
        <link rel="stylesheet" type="text/css" href="css/slick.css">
        <!-- rsmenu CSS -->
        <link rel="stylesheet" type="text/css" href="css/rsmenu-main.css">
        <!-- rsmenu transitions CSS -->
        <link rel="stylesheet" type="text/css" href="css/rsmenu-transitions.css">
        <!-- magnific popup css -->
        <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
		<!-- flaticon css  -->
        <link rel="stylesheet" type="text/css" href="fonts/flaticon.css">
        <!-- flaticon2 css  -->
        <link rel="stylesheet" type="text/css" href="fonts/fonts2/flaticon.css">
        <!-- Offcanvas CSS -->
        <link rel="stylesheet" type="text/css" href="css/off-canvas.css">
        <!-- style css -->
        <link rel="stylesheet" type="text/css" href="style.css">
        <!-- responsive css -->
        <link rel="stylesheet" type="text/css" href="css/responsive.css">
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="home2">
        <?php $pages = array("/cbse", "/ncrt", "/icse", "/jee", "/jee-advance", "/neet", "/commerce", "/ilets", "/classes", "/class9", "/class10", "/class11", "/class12", "/stateboard"); ?>

        <!--Preloader area start here-->
        <div class="book_preload">
            <div class="book">
                <div class="book__page"></div>
                <div class="book__page"></div>
                <div class="book__page"></div>
            </div>
        </div>
		<!--Preloader area end here-->
		
        <!--Full width header Start-->
		<div class="full-width-header">

			<!-- Toolbar Start -->
			<div class="rs-toolbar">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="rs-toolbar-left">
								<!--div class="welcome-message">
									<i class="fa fa-bank"></i><span>Welcome to StudyRocks</span> 
									<i class="fa fa-contact"></i><span>Call us-00000</span>
									<i class="fa fa-email"></i><span>Email-info@studyrocks.in</span>
								</div-->
							</div>
						</div>
						<div class="col-md-6">
							<div class="rs-toolbar-right">
								<div class="toolbar-share-icon">
									<ul>
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
									</ul>
                                </div>
                            <?php 
                                if (isset($_SESSION['user']['name'])) {
                            ?>      <span class="current-user"> Welcome <?php echo $_SESSION['user']['name']; ?> | </span>
                                    <a href="/logout.php" class="apply-btn">Log out</a>
                            <?php
                                }
                                else{
                            ?>
								<a href="/login.php" class="apply-btn">Login</a> |
                                <a href="/signup.php" class="apply-btn">Register</a>
                            <?php 
                                } 
                            ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Toolbar End -->
			
			<!--Header Start-->
			<header id="rs-header" class="rs-header">
				<!-- Header Top Start -->
				<div class="rs-header-top">
					<div class="container">
						<div class="row rs-vertical-middle">
							<div class="col-lg-3 col-md-12">
								<div class="logo-area">
									<a href="index.php">
                                        <img src="images/logoo2-1.jpg" alt="logo" class="logodesktop">
                                        <img src="images/logoo2.png" alt="logo" class="mobilelogo">
                                    </a>
								</div>
							</div>
								   <div class="col-sm-12 col-md-12 col-lg-9">
									<div id="logo-right-side">
									<a href="index.php"><img src="images/logo111.png" alt="logo" size="100%"></a>
								</div>
								</div>
							</div>
						</div>						      
					</div>
				
				<!-- Header Top End -->

				<!-- Menu Start -->
				<div class="menu-area menu-sticky">
					<div class="container">
						<div class="main-menu">
							<div class="row">
								<div class="col-sm-12">
									 <!--div id="logo-sticky" class="text-center">
										<a href="index"><img src="images/logo.png" alt="logo"></a>
									</div--> 
									<a class="rs-menu-toggle"><i class="fa fa-bars"></i>Menu</a>
									<nav class="rs-menu">
										<ul class="nav-menu">
											<!-- Home -->
											<li class="<?php echo $_SERVER['SERVER_NAME'] == 'studyrocks.in' && $_SERVER['REQUEST_URI'] == '/index.php' ? 'current-menu-item current_page_item' :''; ?> menu-item-has-children"> <a href="index.php" class="home">Home</a>
											</li>
											<!-- End Home --> 
                                            
                                            <!--About Menu Start-->
                                            <li class="<?php echo $_SERVER['REQUEST_URI'] == '/about.php' ? 'current-menu-item current_page_item  ': '';?>menu-item-has-children"> <a href="about.php">About Us</a>
                                        
                                            </li>
                                            <!--About Menu End--> 

                                            <!-- Drop Down Pages Start -->
											<li class="<?php echo in_array('studyrock/'.$_SERVER['REQUEST_URI'], $pages) ? 'current-menu-item current_page_item  ': '';?>rs-mega-menu mega-rs"> <a href="#">Study Online</a>
                                                <ul class="mega-menu"> 
                                                    <li class="mega-menu-container">
                                                        <div class="mega-menu-innner">
                                                            <div class="single-magemenu">
                                                                <ul class="sub-menu">
                                                                    <li class="<?php echo $_SERVER['REQUEST_URI'] == '/cbse' ? 'current-menu-item current_page_item  ': '';?>"> <a href="cbse.php">CBSE</a></li>
                                                                    <li class="<?php echo $_SERVER['REQUEST_URI'] == '/ncert.php' ? 'current-menu-item current_page_item  ': '';?>"><a href="ncert.php">NCERT SOLUTIONS</a></li>
                                                                    <li class="<?php echo $_SERVER['REQUEST_URI'] == '/icse.php' ? 'current-menu-item current_page_item  ': '';?>"><a href="icse.php">ICSE</a></li>
													                <li class="<?php echo $_SERVER['REQUEST_URI'] == '/jee.php' ? 'current-menu-item current_page_item  ': '';?>"><a href="jee-main.php">JEE-Main</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="single-magemenu">
                                                                <ul class="sub-menu">
                                                                    <li class="<?php echo $_SERVER['REQUEST_URI'] == '/jee.php' ? 'current-menu-item current_page_item  ': '';?>"> <a href="jee-advance.php">JEE-ADVANCE</a> </li> 
                                                                    <li class="<?php echo $_SERVER['REQUEST_URI'] == '/neet.php' ? 'current-menu-item current_page_item  ': '';?>"> <a href="neet.php">NEET</a> </li>
																	<li class="<?php echo $_SERVER['REQUEST_URI'] == '/commerce.php' ? 'current-menu-item current_page_item  ': '';?>"> <a href="commerce.php">COMMERCE</a> </li>
                                                                    <!--li class="<?php //echo $_SERVER['REQUEST_URI'] == '/ielts.php' ? 'current-menu-item current_page_item  ': '';?>"> <a href="#">IELTS</a></li-->
                                                                </ul>
                                                            </div>
                                                            <div class="single-magemenu">
                                                                <ul class="sub-menu">
                                                                    <li> <a href="#">CLASSES</a> </li>
                                                                    <li class="<?php echo $_SERVER['REQUEST_URI'] == '/class9.php' ? 'current-menu-item current_page_item  ': '';?>"> <a href="class9.php">Class 9th</a> </li> 
                                                                    <li class="<?php echo $_SERVER['REQUEST_URI'] == '/class10.php' ? 'current-menu-item current_page_item  ': '';?>"> <a href="class10.php">Class 10th</a> </li>
                                                                    <li class="<?php echo $_SERVER['REQUEST_URI'] == '/class11.php' ? 'current-menu-item current_page_item  ': '';?>"><a href="class11.php">Class 11th</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="single-magemenu">
                                                                <ul class="sub-menu">
																    <li class="<?php echo $_SERVER['REQUEST_URI'] == '/class12.php' ? 'current-menu-item current_page_item  ': '';?>"><a href="class12.php">Class 12th</a></li>
                                                                    <li class="<?php echo $_SERVER['REQUEST_URI'] == '/stateboard.php' ? 'current-menu-item current_page_item  ': '';?>"> <a href="stateboard.php">STATE BOARD</a> </li> 
                                                    
                                                                    <li><a href="https://doubt.studyrocks.in/">ONLINE CLASSES</a></li>
                                                                    <li><a href="https://online.studyrocks.in/">FREE DEMO CLASS</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
											</li>
											<!--Drop Down Pages End -->
                                            
											<!--Courses Menu Start-->
		                                    <li class="menu-item-has-children"> <a href="https://doubt.studyrocks.in/">Doubt Online</a>
		                             
		                                    </li>
                                            <li class="menu-item-has-children"> <a href="https://onlinetest.studyrocks.in/">Test Online</a>
                                            </li>
                                            <li class="<?php echo $_SERVER['REQUEST_URI'] == '/demos.php' ? 'current-menu-item current_page_item  ': '';?>menu-item-has-children"> <a href="demos.php">Demos</a>
                                            </li>
                                            <li class="<?php echo $_SERVER['REQUEST_URI'] == '/courses.php' ? 'current-menu-item current_page_item  ': '';?>menu-item-has-children"> <a href="courses.php">Courses</a>
                                            </li>
		                                    <!--Courses Menu End-->
                                            
											<!--Events Menu Start-->
											<li class="<?php echo $_SERVER['REQUEST_URI'] == '/events.php' ? 'current-menu-item current_page_item  ': '';?>menu-item-has-children"> <a href="events.php">Events</a>
												
											</li>
											<!--Events Menu End-->
                                            
                                            <!-- Drop Down -->
											<li class="<?php echo $_SERVER['REQUEST_URI'] == '/teachers.php' ? 'current-menu-item current_page_item  ': '';?>menu-item-has-children"> <a href="teachers.php">TEACHERS</a>
											</li>
											<!--End Icons -->
											
											<!--blog Menu Start-->
											<li class="<?php echo $_SERVER['REQUEST_URI'] == '/gallery.php' ? 'current-menu-item current_page_item  ': '';?>menu-item-has-children"> <a href="gallery.php">Gallery</a>
												
											</li>
											<!--blog Menu End-->
                                            
											<!--Contact Menu Start-->
											<li class="<?php echo $_SERVER['REQUEST_URI'] == '/contact.php' ? 'current-menu-item current_page_item  ': '';?>"> <a href="contact.php">Contact</a></li>
                                            <!--Contact Menu End-->
                                            <!--Contact Menu Start-->
											<!--li class="<?php echo $_SERVER['REQUEST_URI'] == '/study-material.php' ? 'current-menu-item current_page_item  ': '';?>"> <a href="study-material.php">Test Online</a></li-->
								            <!--Contact Menu End-->
										</ul>
									</nav>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Menu End -->
			</header>
			<!--Header End-->

		</div>