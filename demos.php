<!DOCTYPE html>
<html lang="en">
    
	<?php include 'conn.php'; ?>
	<?php include 'header.php'; ?>
	<?php
		if (isset($_GET['page'])) {
			$page = $_GET['page'];
		} else {
			$page = 1;
		}

		$no_of_records_per_page = 20;
		$offset = ($page-1) * $no_of_records_per_page; 
	
		$total_pages_sql = "SELECT COUNT(*) FROM demos";
		$result = mysqli_query($conn,$total_pages_sql);
		$total_rows = mysqli_fetch_array($result)[0];
		$total_pages = ceil($total_rows / $no_of_records_per_page);
	?>
		<!-- Breadcrumbs Start -->
		<div class="rs-breadcrumbs bg7 breadcrumbs-overlay">
		    <div class="breadcrumbs-inner">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-12 text-center">
		                    <h1 class="page-title">StudyRocks-DEMOS </h1>
		                    <ul>
		                        <li>
		                            <a class="active" href="index.html">Home</a>
		                        </li>
		                        <li>StudyRocks-Demos</li>
		                    </ul>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!-- Breadcrumbs End -->

		<!-- Gallery Start -->
        <div class="rs-gallery-4 rs-gallery sec-spacer">
            <div class="container">
            	<div class="sec-title-2 mb-50 text-center">
            	    <h2>StudyRocks Demos</h2>      
            		<p></p>
            	</div>
            	<div class="row">
			<?php
				$sql = "SELECT * FROM demos LIMIT $offset, $no_of_records_per_page"; 
				$res = mysqli_query($conn,$sql) or die($conn->error);
				if (mysqli_num_rows($res) >= 1 ) {
					while ($row = mysqli_fetch_assoc($res)) {

			?>
            		<div class="col-lg-6 col-md-12">
            			<div class="video-item">
                        <iframe width="100%" height="400" src="https://www.youtube.com/embed/<?php echo $row['demolink']; ?>?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        
            					<h3><a href="javascript:void()"><?php echo $row['demotitle']; ?></a></h3>
            					<p><?php echo $row['demodesc']; ?></p>            					
            					</a>
            		    </div>
					</div>  
					<?php
					}
				}
			?>          		
                </div>
        	    <nav aria-label="Page navigation example">
        			<ul class="pagination justify-content-center">
				<?php
					for($i = 1; $i <= $total_pages; $i++) {
				?>
						<li class="page-item">
							<a class="page-link <?php echo $i == $_GET['page'] ? 'active' : '';?>" href="gallery.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
						</li>
				<?php
					}
				?>
        			</ul>
        	    </nav>
            </div>
        </div>
        <!-- Gallery End -->
				
        <!-- Partner Start -->
       <?php include 'partners.php'; ?>
        <!-- Partner End -->
       
		<?php include 'footer.php'; ?>
    </body>

<!-- Mirrored from keenitsolutions.com/products/html/edulearn/edulearn-demo/gallery3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 24 Sep 2018 11:26:06 GMT -->
</html>