<?php include 'conn.php'; ?>
<?php
    $hmcr = "SELECT * FROM courses";
    $hcres = mysqli_query($conn,$hmcr) or die($conn->error);
    if (mysqli_num_rows($hcres) >= 1 ) {
        while($row = mysqli_fetch_assoc($hcres)) {          
?>
    
            <div class="cource-item">
                <div class="cource-img">
                    <img src="uploads/courses/<?php echo isset($row['crsimg']) ? $row['crsimg'] : '';?>" alt="" width="370" height="270" />
                    <a class="image-link" href="course-details.php?id=<?php echo isset($row['id']) ? $row['id'] : '';?>" title="">
                        <i class="fa fa-link"></i>
                    </a>
                    <a href="course-details.php?id=<?php echo isset($row['id']) ? $row['id'] : '';?>">
                        <span class="course-value"><?php echo isset($row['crsbtntitle']) ? $row['crsbtntitle'] : '';?></span>
                    </a>
                </div>
                <div class="course-body">
                    <a href="#" class="course-category"><?php echo isset($row['crstype']) ? $row['crstype'] : '';?></a>
                    <h4 class="course-title"><a href="course-details.php?id=<?php echo isset($row['id']) ? $row['id'] : '';?>"><?php echo isset($row['crstitle']) ? $row['crstitle'] : '';?></a></h4>
                    <div class="review-wrap">
                        <ul class="rating">
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star-half-empty"></li>
                        </ul>
                        <span class="review"><?php echo isset($row['crsrewiews']) ? $row['crsrewiews'] : '';?> Reviews</span>
                    </div>
                    <div class="course-desc">
                        <p>
                            <?php echo isset($row['crsdesc']) ? $row['crsdesc'] : '';?>
                        </p>
                    </div>
                </div>
                <!--div class="course-footer">
                    <div class="course-time">
                        <span class="label">Course Time</span>
                        <span class="desc"><?php //echo isset($row['crstime']) ? $row['crstime'] : '';?></span>
                    </div>
                    <div class="course-student">
                        <span class="label">Course Student</span>
                        <span class="desc"><?php //echo isset($row['crsstudents']) ? $row['crsstudents']  : ''; ?></span>
                    </div>
                    <div class="class-duration">
                        <span class="label">Class Duration</span>
                        <span class="desc"><?php //echo isset($row['crsduration']) ? $row['crsduration'] : '';?></span>
                    </div>
                </div-->
            </div>
<?php
        }
    }
?>