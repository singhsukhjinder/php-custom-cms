<!DOCTYPE html>
<html lang="en">
    
    <?php include 'conn.php'; ?>
    <?php include 'header.php'; ?>
        <!--Full width header End-->
    <?php 
        if(isset($_GET['id'])) {
            $did = $_GET['id'];
            $sql = "SELECT * FROM events WHERE id='$did'";
            $res = mysqli_query($conn,$sql) or die($conn->error);
            $row = mysqli_fetch_assoc($res);
            $eventtitle = isset($row['eventtitle']) ? $row['eventtitle'] : '-';
            $eventdate = isset($row['eventdate']) ? $row['eventdate'] : '-';
            $eventtime = isset($row['eventtime']) ? $row['eventtime'] : '-';
            $eventvenue = isset($row['eventvenue']) ? $row['eventvenue'] : '-';
            $eventdesc = isset($row['eventdesc']) ? $row['eventdesc'] : '-';
            $eventimg = isset($row['eventimg']) ? $row['eventimg'] : '-';
            $eventimgbnn = isset($row['eventimgbnn']) ? $row['eventimgbnn'] : '-';
    ?>	
		<!-- Breadcrumbs Start -->
		<div class="rs-breadcrumbs bg7 breadcrumbs-overlay">
		    <div class="breadcrumbs-inner">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-12 text-center">
		                    <h1 class="page-title"><?php echo $eventtitle;?></h1>
		                    <ul>
		                        <li>
		                            <a class="active" href="index.html">Home</a>
		                        </li>
		                        <li><?php echo $eventtitle; ?></li>
		                    </ul>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!-- Breadcrumbs End -->

        <!-- Event Details Start -->
        <div class="rs-event-details pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="event-details-content">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="event-img">
                                        <img src="uploads/events/<?php echo $eventimgbnn; ?>" alt="<?php echo $eventtitle; ?>" />
                                </div>
                                </div>
                                <div class="col-lg-6 col-md-6-col-sm-12">
                                    <h3 class="event-title"><?php echo $eventtitle; ?></h3>
                                    <div class="event-meta">
                                        <div class="event-date">
                                            <i class="fa fa-calendar"></i>
                                            <span><?php echo $eventdate; ?></span>
                                        </div>
                                        <div class="event-time">
                                            <i class="fa fa-clock-o"></i>
                                            <span><?php echo $eventtime; ?></span>
                                        </div>
                                        <div class="event-location">
                                            <i class="fa fa-map-marker"></i>
                                            <span><?php echo $eventvenue; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="event-desc">
                                <?php echo $eventdesc; ?>
                                <p></p> 
                            </div>
                            <!--div class="share-area">
                                <div class="row rs-vertical-middle">
                                    <div class="col-md-4">
                                        <div class="book-btn">
                                            <a href="#">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php 
        }
    ?>
        <!-- Event Details End -->

        <!-- Partner Start -->
        <?php include 'partners.php'; ?>
        <!-- Partner End -->
       
        <?php include 'footer.php'; ?>
    </body>
</html>