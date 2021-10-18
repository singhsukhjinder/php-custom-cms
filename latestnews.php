<?php include 'conn.php'; ?>
<?php
    $hmltnws = "SELECT * FROM latestnews";
    $hmltnwsres = mysqli_query($conn,$hmltnws) or die($conn->error);
    if (mysqli_num_rows($hmltnwsres) >= 1 ) {
?>
<div class="col-lg-4 col-md-12">
    <div class="sec-title mb-30">
        <h2>LASTEST UPDATES</h2>
        <p>Join now for latest updates.</p>
    </div>
    <p class="mobile-mb-50">
        <marquee direction="up" height="400px" scrollamount="2">
            <?php
                while ($row = mysqli_fetch_assoc($hmltnwsres)) {
                    echo '<p>'.$row['title'].'</p>';
                }
            ?>
        </marquee>
    </p>
</div>
<?php
    }
?>