<!DOCTYPE html>
<html lang="en">
    
	<?php include 'conn.php'; ?>
	<?php include 'header.php'; ?>
	<!--Full width header End-->
	<?php
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = 1;
	}

	$no_of_records_per_page = 10;
	$offset = ($page-1) * $no_of_records_per_page; 

	$total_pages_sql = "SELECT COUNT(*) FROM events";
	$result = mysqli_query($conn,$total_pages_sql);
	$total_rows = mysqli_fetch_array($result)[0];
	$total_pages = ceil($total_rows / $no_of_records_per_page);

	$crs = "SELECT * FROM events LIMIT $offset, $no_of_records_per_page";
	$cres = mysqli_query($conn,$crs) or die($conn->error);
?>		
		<!-- Breadcrumbs Start -->
		<div class="rs-breadcrumbs bg7 breadcrumbs-overlay">
		    <div class="breadcrumbs-inner">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-12 text-center">
		                    <h1 class="page-title">OUR EVENTS</h1>
		                    <ul>
		                        <li>
		                            <a class="active" href="index.html">Home</a>
		                        </li>
		                        <li>Events</li>
		                    </ul>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!-- Breadcrumbs End -->

		<!-- Events Start -->
        <div class="rs-events-2 sec-spacer">
            <div class="container">
                <div class="row space-bt30">
			<?php
				while ($row = mysqli_fetch_assoc($cres)){
			?>
                    <div class="col-lg-6 col-md-12">
                    	<div class="event-item">
	                        <div class="row rs-vertical-middle">
	                        	<div class="col-md-6">
	                        	    <div class="event-img">
	                        	        <img src="uploads/events/<?php echo $row['eventimg']; ?>" alt="events Images" width="250" height="279" />
                                        <a class="image-link" href="event-details.php?id=<?php echo $row['id']; ?>" title="<?php echo $row['eventtitle']; ?>">
                                            <i class="fa fa-link"></i>
                                        </a>
	                        	    </div>                        		
	                        	</div>
	                        	<div class="col-md-6">
	                    	        <div class="event-content">
	                    	        	<div class="event-meta">
		                    	        	<div class="event-date">
		                    	        		<i class="fa fa-calendar"></i>
		                    	        		<span><?php echo $row['eventdate']; ?></span>
		                    	        	</div>
	                    	        		<div class="event-time">
	                    	        			<i class="fa fa-clock-o"></i>
	                    	        			<span><?php echo $row['eventtime']; ?></span>
	                    	        		</div>
	                    	        	</div>
	                    	        	<h3 class="event-title"><a href="event-details.php?id=<?php echo $row['id']; ?>"><?php echo $row['eventtitle']; ?></a></h3>
                    	        		<div class="event-location">
                    	        			<i class="fa fa-map-marker"></i>
                    	        			<span><?php echo $row['eventvenue']; ?></span>
                    	        		</div>
	                    	        	<div class="event-desc">
	                    	        		<p>
											<?php echo substr(strip_tags($row['eventdesc']),0,100); ?>
	                    	        		</p>
	                    	        	</div>
	                    	        	<div class="event-btn">
	                    	        		<a href="contact.php">Join Event</a>
	                    	        	</div>
	                    	        </div>                    		
	                        	</div>
	                        </div>                    		
                    	</div>
					</div>
			<?php
				} 
			?>
                </div>
                
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
        <!-- Events End -->
				
        <!-- Partner Start -->
        <?php include 'partners.php'; ?>
        <!-- Partner End -->
       
		<?php include 'footer.php'; ?>
    </body>
</html>