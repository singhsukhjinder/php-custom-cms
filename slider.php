<?php include 'conn.php'; ?>
<?php
    $slides = "SELECT * FROM slides";
    $slres = mysqli_query($conn,$slides) or die($conn->error);
    if (mysqli_num_rows($slres) >= 1 ) {
?>
        <div id="rs-slider" class="slider-section4 slider">
            <div id="home-slider">
            <?php
                while ($row = mysqli_fetch_assoc($slres)) {
    ?>
                    <!-- Item 1 -->
                    <div class="item active">
                        <img src="uploads/slider/<?php echo $row['image']; ?>" alt="Slide1" />
                        <div class="slide-content">
                            <div class="display-table">
                                <div class="display-table-cell">
                                    <div class="container">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            ?>
            </div>
        </div>
<?php
    }
?>