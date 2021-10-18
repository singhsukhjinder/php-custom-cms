<?php include 'conn.php'; ?>
<div id="rs-partner" class="rs-partner pb-70">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="toppersHeading text-left" style="padding-bottom: 30px;">OUR TOPPERS</h2>
            </div>
        </div>
        <div class="rs-carousel owl-carousel" data-loop="true" data-items="5" data-margin="80" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="false" data-nav-speed="false" data-mobile-device="2" data-mobile-device-nav="false"
            data-mobile-device-dots="false" data-ipad-device="4" data-ipad-device-nav="false" data-ipad-device-dots="false" data-md-device="5" data-md-device-nav="false" data-md-device-dots="false">
            <?php
                $sql2 = "SELECT * FROM partners";
                $res = mysqli_query($conn,$sql2) or die($conn->error);
                if (mysqli_num_rows($res) >= 1 ) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo '<div class="partner-item">
                        <a href="'.$row['prtnr_url'].'"><img src="uploads/partners/'.$row['prtnr_img'].'" alt="'.$row['name'].'"></a>
                    </div>';
                    }
                }
            ?>
        </div>
    </div>
</div>