<!DOCTYPE html>
<html lang="en">
<?php include 'conn.php'; ?>
<?php include 'header.php'; ?>
<?php

    $sql2 = "SELECT * FROM aboutus";
    $res = mysqli_query($conn,$sql2) or die($conn->error);
    if (mysqli_num_rows($res) >= 1 ) {
        while ($row = mysqli_fetch_row($res)) {
            //our story
            $scnst_title = $row[1];
            $scnst_desc = $row[2];
            $scnst_file = $row[3];
          
            //our mission
            $scnms_title = $row[4];
            $scnms_desc = $row[5];
            $scnms_file = $row[6];
            $scnms_file1 = $row[7];

            //what we offer
            $scnof_title = $row[8];
            $scnof_desc = $row[9];
            $scnof_file = $row[10];
            
            
            //join us
            $scnjn_title = $row[11];
            $scnjn_desc = $row[12];
            $scnjn_btntitle = $row[13];
            $scnjn_btnlink = $row[14];
            
            //our assosiates
            $scnas_title = $row[15];
            $scnass_desc = $row[16];
            $scnass_fileh =$row[17];

            $scnas1_title = $row[18];
            $scnass1_desc = $row[19];
            $scnass1_fileh =$row[20];

            $scnas2_title = $row[21];
            $scnass2_desc = $row[22];
            $scnass2_fileh =$row[23];

            $scnas3_title = $row[24];
            $scnass3_desc = $row[25];
            $scnass3_fileh =$row[26];
        }
    }
?>
<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs bg7 breadcrumbs-overlay">
    <div class="breadcrumbs-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="page-title">About Us</h1>
                    <ul>
                        <li>
                            <a class="active" href="index.html">Home</a>
                        </li>
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->

<!-- History Start -->
<div class="rs-history sec-spacer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 rs-vertical-bottom mobile-mb-50">
                <a href="#">
                    <img src="../uploads/<?php echo isset($scnst_file) ? $scnst_file :'default.png';?>" alt="History Image" />
                </a>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="abt-title">
                    <h2><?php echo $scnst_title ? $scnst_title : '';?></h2>
                </div>
                <div class="about-desc">
                    <?php echo $scnst_desc ? $scnst_desc : ''; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- History End -->

<!-- Mission Start -->
<div class="rs-mission sec-color sec-spacer">
    <div class="container">
        <div class="row">
        <div class="col-lg-6 col-md-12 mobile-mb-50">
                <div class="abt-title">
                    <h2><?php echo isset($scnms_title ) ? $scnms_title : '';?> </h2>
                </div>
                <div class="about-desc">
                <?php echo isset($scnms_desc ) ? $scnms_desc : '';?> 
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="row">
                    <div class="col-md-6 mobile-mb-30">
                        <a href="javascript:viod();">
                            <img src="../uploads/<?php echo isset($scnms_file ) ? $scnms_file : '';?> " alt="Mission Image" />
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="javascript:viod();">
                            <img src="../uploads/<?php echo isset($scnms_file1 ) ? $scnms_file1 : '';?>" alt="Mission Image" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mission End -->

<!-- Vision Start -->
<div class="rs-vision sec-spacer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 mobile-mb-50">
                <div class="vision-img rs-animation-hover">
                    <img src="images/about/vision.jpg" alt="img02" />
                    <a class="popup-youtube rs-animation-fade" href="https://www.youtube.com/channel/UC9mZUk1HJS1Cvom3YknekjQ" title="Video Icon">
                    </a>
                    <div class="overly-border"></div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="abt-title">
                    <h2><?php echo isset($scnof_title ) ? $scnof_title : '';?> </h2>
                </div>
                <div class="vision-desc">
                    <h5><?php echo isset($scnof_desc ) ? $scnof_desc : '';?> </h5>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Vision End -->

<!-- Calltoaction Start -->
<div id="rs-calltoaction" class="rs-calltoaction sec-spacer bg4">
    <div class="container">
        <div class="rs-cta-inner text-center">
            <div class="sec-title mb-50 text-center">
                <h2 class="white-color"><?php echo isset($scnjn_title ) ? $scnjn_title : '';?> </h2>
                <p class="white-color"><?php echo isset($scnjn_desc ) ? $scnjn_desc : '';?> </p>
            </div>
            <a class="cta-button" href="<?php echo isset($scnjn_btnlink ) ? $scnjn_btnlink : '';?> "><?php echo isset($scnjn_btntitle ) ? $scnjn_btntitle : '';?> </a>
        </div>
    </div>
</div>
<!-- Calltoaction End -->

<!-- Team Start -->
<!-- Team End -->

<!-- Branches Start -->
<div id="rs-branches" class="rs-branches sec-color pt-100 pb-70">
    <div class="container">
        <div class="abt-title mb-70 text-center">
            <h2><?php echo isset($scnms_title ) ? $scnms_title : '';?> </h2>
            <p></p>
        </div>
        <div class="row justify-content-center">  
            <?php if($scnas_title != '') { ?> 
            <div class="col-lg-3 col-md-6">
                <div class="branches-item">
                    <img src="../uploads/<?php echo isset($scnass_fileh ) ? $scnass_fileh : '';?>" alt="Australia Flag">
                    <h3>
                        <span>01</span> <?php echo isset($scnas_title ) ? $scnas_title : '';?> 
                    </h3>
                    <p>
                        <li>
                            <?php echo isset($scnass_desc ) ? $scnass_desc : '';?> 
                        </li>
                    </p>
                </div>
            </div>
            <?php }?>    
            <?php if($scnas1_title != '') { ?> 
            <div class="col-lg-3 col-md-6">
                <div class="branches-item">
                    <img src="../uploads/<?php echo isset($scnass1_fileh ) ? $scnass1_fileh : '';?>" alt="China Flag">
                    <h3>
                        <span>02</span> <?php echo isset($scnas1_title ) ? $scnas1_title : '';?> 
                    </h3>
                    <li>
                        <?php echo isset($scnass1_desc ) ? $scnass1_desc : '';?> 
                    </li>
                </div>
            </div>           
             <?php }?>    
            <?php if($scnas2_title != '') { ?> 
            <div class="col-lg-3 col-md-6">
                <div class="branches-item">
                    <img src="../uploads/<?php echo isset($scnass2_fileh ) ? $scnass2_fileh : '';?>" alt="China Flag">
                    <h3>
                        <span>02</span> <?php echo isset($scnas2_title ) ? $scnas2_title : '';?> 
                    </h3>
                    <li>
                        <?php echo isset($scnass2_desc ) ? $scnass2_desc : '';?> 
                    </li>
                </div>
            </div> 
            <?php }?>    
            <?php if($scnas3_title != '') { ?>       
            <div class="col-lg-3 col-md-6">
                <div class="branches-item">
                    <img src="../uploads/<?php echo isset($scnass3_fileh ) ? $scnass3_fileh : '';?>" alt="China Flag">
                    <h3>
                        <span>02</span> <?php echo isset($scnas3_title ) ? $scnas3_title : '';?> 
                    </h3>
                    <li>
                        <?php echo isset($scnass3_desc ) ? $scnass3_desc : '';?> 
                    </li>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>
<!-- Branches End -->

<!-- Partner Start -->
<?php include 'partners.php'; ?>
<!-- Partner End -->

<!-- Footer Start -->
<?php include 'footer.php'; ?>
<!-- Footer End -->

<!-- start scrollUp  -->
<div id="scrollUp">
    <i class="fa fa-angle-up"></i>
</div>
</body>
</html>