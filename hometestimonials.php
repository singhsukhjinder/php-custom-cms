<?php include 'conn.php'; ?>
<?php 
    $test = "SELECT * FROM testimonials LIMIT 10";
    $testres = mysqli_query($conn, $test) or die($conn->error);
?>
<div class="container">
    <div class="row rs-vertical-middle">
        <div class="col-lg-4 col-md-12">
            <div class="sec-title mb-30">
                <h2 class="white-color">WHAT STUDENT SAYS</h2>
                <p class="white-color">Testimonial.</p>
            </div>
            <p class="white-color mobile-mb-50">
            </p>
        </div>
        <div class="col-lg-8  col-md-12">
            <div class="rs-carousel owl-carousel" data-loop="true" data-items="2" data-margin="30" data-autoplay="false" data-autoplay-timeout="5000" data-smart-speed="1200" data-dots="true" data-nav="false" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="false"
                data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="true" data-md-device="2" data-md-device-nav="false" data-md-device-dots="true">
        <?php
            while($row = mysqli_fetch_assoc($testres)) {
        ?>
                <div class="testimonial-item">
                    <div class="testi-img">
                        <img src="uploads/testimonials/<?php echo isset($row['photo']) ? $row['photo'] : '';?>" alt="Jhon Smith">
                    </div>
                    <div class="testi-desc">
                        <h4 class="testi-name"><?php echo isset($row['name']) ? $row['name'] : '';?></h4>
                        <p>
                        <?php echo isset($row['description']) ? $row['description'] : '';?>
                        </p>
                    </div>
                </div>
        <?php
            } 
        ?>
            </div>
        </div>
    </div>
</div>