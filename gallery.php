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
	
		$total_pages_sql = "SELECT COUNT(*) FROM gallery";
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
		                    <h1 class="page-title">StudyRocks-GALLERY </h1>
		                    <ul>
		                        <li>
		                            <a class="active" href="index.html">Home</a>
		                        </li>
		                        <li>StudyRocks-Gallery</li>
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
            	    <h2>StudyRocks Gallery</h2>      
            		<p></p>
            	</div>
            	<div class="row">
			<?php
				$sql = "SELECT * FROM gallery LIMIT $offset, $no_of_records_per_page"; 
				$res = mysqli_query($conn,$sql) or die($conn->error);
				if (mysqli_num_rows($res) >= 1 ) {
					while ($row = mysqli_fetch_assoc($res)) {

			?>
            		<div class="col-lg-3 col-md-6">
            			<div class="gallery-item">
            			    <img src="uploads/gallery/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>" />
            			    <div class="gallery-desc">
            					<h3><a href="javascript:void()"><?php echo $row['name']; ?></a></h3>
            					<p><?php echo $row['description']; ?></p>
            					<a class="image-popup" href="uploads/gallery/<?php echo $row['image']; ?>" title="">
            						<i class="fa fa-search"></i>
            					</a>
            			    </div>
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