<!DOCTYPE html>
        <html lang="en">
        <head>
        <title>Study Rock Admin</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/uniform.css" />
        <link rel="stylesheet" href="css/select2.css" />
        <link rel="stylesheet" href="css/matrix-style.css" />
        <link rel="stylesheet" href="css/matrix-media.css" />
        <link rel="stylesheet" href="css/bootstrap-wysihtml5.css" />
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
        </head>
        <body>

        <!--Header-part-->
        <div id="header">
          <h1><a href="dashboard.html">Study Rock Admin</a></h1>
        </div>
        <!--close-Header-part--> 

        <!--sidebar-menu-->
        <div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard <?php echo $_SERVER['SCRIPT_FILENAME'];?></a>
            <ul>
                <li class="<?php strpos($_SERVER['REQUEST_URI'], 'dashboard.php') !== false ? 'active': '';?>"><a href="dashboard.php"><i class="icon-dashboard"></i> <span>Dashboard</span></a> </li>
                <li class="submenu <?php strpos($_SERVER['REQUEST_URI'], 'addsyllabus.php') !== false ? '': '';?>"><a href="#"><i class="icon-home"></i></i> <span>Homepage</span></a>
                  <ul>
                    <li class="submenu subsubmenu"><a href="#">Slider</a>
                    <ul>
                      <li><a href="addslide.php" >Add Slide</a></li>
                      <li><a href="viewslides.php">View Slides</a></li>
                    </ul>
                    </li>
                    <li class="submenu subsubmenu"><a href="#">Latest News</a>
                      <ul>
                        <li class=""><a href="addlatestnews.php"></i> <span>Add Home latesnews</span></a> </li>
                        <li><a href="viewlatestnews.php">View Latest News</a></li>
                      </ul>
                    </li>  
                    <li class=""><a href="homejoin.php"></i> <span>Home Join Section</span></a> </li>  
                    <li class=""><a href="homeabout.php"></i> <span>Home About Section</span></a> </li>
                    <li class=""><a href="homeacheivements.php"></i> <span>Our Achievements</span></a> </li>
                  </ul>
                </li>
                <!--Demo page -->
                <li class="submenu <?php strpos($_SERVER['REQUEST_URI'], 'addsyllabus.php') !== false ? '': '';?>"><a href="#"><i class="icon-home"></i></i> <span>Demos</span></a>
                  <ul>
                    <li><a href="adddemo.php" >Add Demo</a></li>
                    <li><a href="viewdemos.php">View Demos</a></li>
                  </ul>
                </li>
                <!--testimonials page -->
                <li class="submenu <?php strpos($_SERVER['REQUEST_URI'], 'addsyllabus.php') !== false ? '': '';?>"><a href="#"><i class="icon-home"></i></i> <span>Testimonials</span></a>
                  <ul>
                    <li><a href="addtestimonial.php" >Add Testimonial</a></li>
                    <li><a href="viewtestimonials.php">View Testimonials</a></li>
                  </ul>
                </li>
                <!--testimonials page -->
                <li class="submenu <?php strpos($_SERVER['REQUEST_URI'], 'addcourses.php') !== false ? '': '';?>"><a href="#"><i class="icon-home"></i></i> <span>Courses</span></a>
                  <ul>
                    <li><a href="addcourse.php" >Add Course</a></li>
                    <li><a href="viewcourses.php">View Courses</a></li>
                  </ul>
                </li>
                <!--classes page -->
                <li class="<?php strpos($_SERVER['REQUEST_URI'], 'users.php') !== false ? 'active': 'fgdfg';?>"><a href="users.php"><i class="icon-user"></i> <span>Users</span></a></li>
                <li class="<?php strpos($_SERVER['REQUEST_URI'], 'subscribers.php') !== false ? 'active': 'fgdfg';?>"><a href="subscribers.php"><i class="icon-user"></i> <span>Subscribers</span></a></li>
                <li class="submenu subsubmenu"><a href="#"><i class="icon-book"></i><span>Class 9th</span></a>
                <ul>
                  <li><a href="class9.php" >Class 9th content</a></li>
                  <li><a href="addfiles.php">Add files</a></li>
                  <li><a href="class9-files.php">class9th files</a></li>
                </ul>
                </li>
                <li class="submenu subsubmenu"><a href="#"><i class="icon-book"></i><span>Class 10th</span></a>
                <ul>
                  <li><a href="class10.php" >Class 10th content</a></li>
                  <li><a href="addfiles.php">Add files</a></li>
                  <li><a href="class10-files.php">class10th files</a></li>
                </ul>
                </li>
                <li class="submenu subsubmenu"><a href="#"><i class="icon-book"></i><span>Class 11th</span></a>
                <ul>
                  <li><a href="class11.php" >Class 11th content</a></li>
                  <li><a href="addfiles.php">Add files</a></li>
                  <li><a href="class11-files.php">class11th files</a></li>
                </ul>
                </li>
                <li class="submenu subsubmenu"><a href="#"><i class="icon-book"></i><span>Class 12th</span></a>
                <ul>
                  <li><a href="class12.php" >Class 12th content</a></li>
                  <li><a href="addfiles.php">Add files</a></li>
                  <li><a href="class12-files.php">class12th files</a></li>
                </ul>
                </li>                     
                <li class="submenu subsubmenu"><a href="#"><i class="icon-book"></i><span>CBSE</span></a>
                <ul>
                  <li><a href="cbse.php" >CBSE content</a></li>
                  <li><a href="addfiles.php">Add files</a></li>
                  <li><a href="cbse-files.php">CBSE files</a></li>
                </ul>
                </li> 
                <li class="submenu subsubmenu"><a href="#"><i class="icon-book"></i><span>NCERT</span></a>
                <ul>
                  <li><a href="ncert.php" >NCERT content</a></li>
                  <li><a href="addfiles.php">Add files</a></li>
                  <li><a href="ncert-files.php">NCERT files</a></li>
                </ul>
                </li> 
                <li class="submenu subsubmenu"><a href="#"><i class="icon-book"></i><span>ICSE</span></a>
                <ul>
                  <li><a href="icse.php" >ICSE content</a></li>
                  <li><a href="addfiles.php">Add files</a></li>
                  <li><a href="icse-files.php">ICSE files</a></li>
                </ul>
                </li> 
                <li class="submenu subsubmenu"><a href="#"><i class="icon-book"></i><span>JEE-Main</span></a>
                <ul>
                  <li><a href="jee-main.php" >JEE-Main content</a></li>
                  <li><a href="addfiles.php">Add files</a></li>
                  <li><a href="jee-main-files.php">JEE-Main files</a></li>
                </ul>
                </li> 
                <li class="submenu subsubmenu"><a href="#"><i class="icon-book"></i><span>JEE-Advance</span></a>
                <ul>
                  <li><a href="jee-advance.php" >JEE-Advance</a></li>
                  <li><a href="addfiles.php">Add files</a></li>
                  <li><a href="jee-advance-files.php">JEE-Advance files</a></li>
                </ul>
                </li> 
                <li class="submenu subsubmenu"><a href="#"><i class="icon-book"></i><span>NEET</span></a>
                <ul>
                  <li><a href="neet.php" >NEET content</a></li>
                  <li><a href="addfiles.php">Add files</a></li>
                  <li><a href="neet-files.php">NEET files</a></li>
                </ul>
                </li> 
                <li class="submenu subsubmenu"><a href="#"><i class="icon-book"></i><span>Commerce</span></a>
                <ul>
                  <li><a href="commerce.php" >Commerce content</a></li>
                  <li><a href="addfiles.php">Add files</a></li>
                  <li><a href="commerce-files.php">Commerce files</a></li>
                </ul>
                </li> 
                <!--li class="submenu subsubmenu"><a href="#"><i class="icon-book"></i><span>Ielts</a>
                <ul>
                  <li><a href="class9.php" >Ielts content</a></li>
                  <li><a href="class9-files.php">Ielts files</a></li>
                </ul>
                </li--> 
                <li class="<?php strpos($_SERVER['REQUEST_URI'], 'about.php') == true ? 'active': 'sfsdfs';?>"><a href="about.php"><i class="icon-user"></i> <span>About us</span></a></li>
                <li class="submenu subsubmenu"><a href="#"><i class="icon-group"></i><span>Our Toppers</span></a>
                  <ul>
                    <li><a href="addtopper.php" >Add Topper</a></li>
                    <li><a href="toppers.php">View Toppers</a></li>
                  </ul>
                </li>
                <li class="submenu subsubmenu"><a href="#"><i class="icon-group"></i><span>Events</span></a>
                  <ul>
                    <li><a href="addevent.php" >Add Event</a></li>
                    <li><a href="viewevents.php">View Events</a></li>
                  </ul>
                </li>
                <li class="submenu <?php strpos($_SERVER['REQUEST_URI'], 'addteacher.php') !== false ? 'active': '';?>"><a href="#"><i class="icon-user"></i> <span>Gallery</span></a>
                  <ul>
                    <li><a href="addgallery.php" >Add Gallery Image</a></li>
                    <li><a href="gallery.php">View Gallery Images</a></li>
                  </ul>
                </li>
                <li class="submenu <?php strpos($_SERVER['REQUEST_URI'], 'addteacher.php') !== false ? 'active': '';?>"><a href="#"><i class="icon-user"></i> <span>Teachers</span></a>
                  <ul>
                    <li><a href="addteacher.php" >Add Tescher</a></li>
                    <li><a href="teachers.php">View Teachers</a></li>
                  </ul>
                </li>
                <li><a href="logout.php"><i class="icon-signout"></i></i> <span>Log Out</span></a></li>
            </ul>
        </div>
        