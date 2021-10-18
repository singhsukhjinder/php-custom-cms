
	<?php include 'conn.php'; ?>
	<?php
	
		$hpcnt = "SELECT * FROM counter";
		$hpcntres = mysqli_query($conn,$hpcnt);
	?>

<div class="rs-counter pt-100 pb-70 bg3">
    <div class="container">
        <div class="sec-title white-text mb-50 text-center">
            <h2>ACHEIVEMENTS</h2>
            <p>What Make us Diffrent from others?</p>
        </div>
        <div class="row">
            <?php
                $row = mysqli_fetch_assoc($hpcntres);
            ?>
            <div class="col-lg-3 col-md-6">
                <div class="rs-counter-list">
                    <h2 class="counter-number plus"><?php echo $row['counter_count1'];?></h2>
                    <span class="plussign">+</span>
                    <h4 class="counter-desc"><?php echo $row['counter_title1'];?></h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="rs-counter-list">
                    <h2 class="counter-number plus"><?php echo $row['counter_count2'];?></h2>
                    <span class="plussign">+</span>
                    <h4 class="counter-desc"><?php echo $row['counter_title2'];?></h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="rs-counter-list">
                    <h2 class="counter-number plus"><?php echo $row['counter_count3'];?></h2>
                    <span class="plussign">+</span>
                    <h4 class="counter-desc"><?php echo $row['counter_title3'];?></h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="rs-counter-list">
                    <h2 class="counter-number plus"><?php echo $row['counter_count4'];?></h2>
                    <span class="plussign">+</span>
                    <h4 class="counter-desc"><?php echo $row['counter_title4'];?></h4>
                </div>
            </div>
        </div>
    </div>
</div>