<?php 
include 'conn.php';
    $sql = "SELECT * FROM demos ORDER BY RAND() LIMIT 1"; 
    $res = mysqli_query($conn,$sql) or die($conn->error);
    while ($row = mysqli_fetch_assoc($res)) {

?>
        <div class="col-md-12 demo-home">
            <div class="video-item">
                <iframe width="100%" height="400" src="https://www.youtube.com/embed/<?php echo $row['demolink']; ?>?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                
                <h3><a href="javascript:void()"><?php echo $row['demotitle']; ?></a></h3>
                <p><?php echo $row['demodesc']; ?></p>            					
            </div>
            <a href="/demos.php" class="cta-button">View More</a>
        </div>  
<?php
    }
?>         		