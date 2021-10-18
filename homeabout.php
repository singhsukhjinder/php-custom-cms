<?php include 'conn.php'; ?>
<?php
    $hmab = "SELECT * FROM homeabout";
    $hares = mysqli_query($conn,$hmab) or die($conn->error);
    if (mysqli_num_rows($hares) >= 1 ) {
?>
        <div id="rs-about-2" class="rs-about-2 sec-spacer">
    <div class="container">
        <div class="row rs-vertical-bottom">
            <div class="col-lg-7 col-md-12">
        <?php 
            while($row = mysqli_fetch_assoc($hares)) {
        ?>
                <div class="sec-title mb-30">
                    <h2><?php echo $row['title']; ?></h2>
                    <p><?php echo $row['description']; ?></p>
                </div>
                <p class="mobile-mb-50">
                    
                </p>
                <div class="row about-signature">
                    <div class="col-md-6">
                        <h3><?php echo $row['name']; ?></h3>
                        <h6><?php echo $row['study']; ?></h6>
                        <span><?php echo $row['position']; ?></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="about-img rs-image-effect-shine">
                    <img src="uploads/<?php echo $row['photo']; ?>" alt="img02">
                </div>
            </div>
        <?php
            }
        ?>
        </div>
    </div>
</div>
<?php
    }
?>