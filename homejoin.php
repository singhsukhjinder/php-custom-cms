<?php include 'conn.php'; ?>
<?php
    $hmjn = "SELECT * FROM homejoin";
    $hjres = mysqli_query($conn,$hmjn) or die($conn->error);
    if (mysqli_num_rows($hjres) >= 1 ) {
?>
        <div id="rs-calltoaction" class="rs-calltoaction sec-spacer bg4">
            <div class="container">
                <div class="rs-cta-inner text-center">
                    <div class="sec-title mb-50 text-center">
                <?php
                        while ($row = mysqli_fetch_assoc($hjres)) {
                            $hjtitle = $row['title'];
                            $hjdesc = $row['description'];
                            $hjbtntitle = $row['btntitle'];
                            $hjbtnlink = $row['btnlink'];
                        }
                ?>
                        <h2 class="white-color"><?php echo $hjtitle; ?></h2>
                        <p class="white-color"><?php echo $description; ?></p>
                    </div>
                    <a class="cta-button" href="<?php echo $hjbtnlink; ?>"><?php echo $hjbtntitle; ?></a>

                </div>
            </div>
        </div>
<?php
    }
?>