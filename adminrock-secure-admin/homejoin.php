<?php 
    session_start();
    include '../conn.php'; 
    if(isset($_SESSION['useradmin']['status'])) {
        $sql2 = "SELECT * FROM homejoin";
        $res = mysqli_query($conn,$sql2) or die($conn->error);
        if (mysqli_num_rows($res) >= 1 ) {
            while($row = mysqli_fetch_assoc($res)) {
                $hjtitle = $row['title'];
                $hjdesc = $row['description'];
                $hjbtntitle = $row['btntitle'];
                $hjbtnlink = $row['btnlink'];
            }
        }
        if(isset($_POST['hjsave'])) {
            $hjtitle = $_POST['hjtitle'];
            $hjdesc = $_POST['hjdesc'];
            $hjbtntitle = $_POST['hjbtntitle'];
            $hjbtnlink = $_POST['hjbtnlink'];
            if (mysqli_num_rows($res) < 1 ) {
            
                $ins = "INSERT INTO homejoin (title, description, btntitle, btnlink) VALUES('$hjtitle', '$hjdesc', '$hjbtntitle', '$hjbtnlink')";
                if ($conn->query($ins) === TRUE) {
                    $_SESSION['fileupload']['inserted'] = '<div style="color:green;font-size:14px;text-align:center;">Recod Inserted.</div>';
                }
                else{
                    $_SESSION['fileupload']['inserted'] = '<div style="color:red;font-size:14px;text-align:center;">Something went wrong!</div>';
                }
            }
            else{
                $sql = "UPDATE homejoin SET title='$hjtitle', description='$hjdesc', btntitle='$hjbtntitle', btnlink='$hjbtnlink'";
        
                if ($conn->query($sql) === TRUE) {
                    $_SESSION['fileupload']['inserted'] = '<div style="color:green;font-size:14px;text-align:center;">Recod Updated.</div>';
                }
                else{
                  $_SESSION['fileupload']['inserted'] = '<div style="color:red;font-size:14px;text-align:center;">Something went wrong!</div>';
                }
            }
        }

         
        include 'header.php';
?>
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> <a href="#" class="">Homepage</a> <a href="#" class="current">Join Us</a> </div>
            <h1>Join Us</h1>
        </div>
        <div class="container-fluid"><hr>

        <?php
            if(isset($_SESSION['fileupload']['error'])) {
            echo $_SESSION['fileupload']['error'];
            }
            if(isset($_SESSION['fileupload']['uploaded'])) {
            echo $_SESSION['fileupload']['uploaded'];
            }
            if(isset($_SESSION['fileupload']['inserted'])) {
            echo $_SESSION['fileupload']['inserted'];
            }
            unset($_SESSION['fileupload']);
        ?>
            <form class="form-horizontal" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" name="basic_validate" id="basic_validate" novalidate="novalidate" enctype="multipart/form-data">             
                 <!-- join section -->
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> 
                                <i class="icon-info-sign"></i> </span>
                                <h5>Join Section</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <div class="control-group">
                                    <label class="control-label">Title</label>
                                    <div class="controls">
                                        <input type="text" id="title" name="hjtitle"  value="<?php echo isset($hjtitle) ? $hjtitle : '' ?>" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                    <input type="text" id="file" name="hjdesc"  value="<?php echo isset($hjdesc) ? $hjdesc : '' ?>" required>
                                </div>
                                </div>
                                <div class="control-group">
                                <label class="control-label">Join button title</label>
                                <div class="controls">
                                    <input type="text" id="file" name="hjbtntitle"  value="<?php echo isset($hjbtntitle) ? $hjbtntitle : '' ?>" required>
                                </div>
                                </div>
                                <div class="control-group">
                                <label class="control-label">Join button link</label>
                                <div class="controls">
                                    <input type="text" id="file" name="hjbtnlink"  value="<?php echo isset($hjbtnlink) ? $hjbtnlink : '' ?>" required>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <input type="submit" value="Save" class="btn btn-success" name="hjsave">
                </div>
            </form>
        </div>
    </div>
        <!--Footer-part-->
        <div class="row-fluid">
        <div id="footer" class="span12"> 2019 &copy; StudyRock.</div>
        </div>
        <!--end-Footer-part-->
        <script src="js/jquery.min.js"></script> 
        <script src="js/jquery.ui.custom.js"></script> 
        <script src="js/bootstrap.min.js"></script> 
        <!--script src="js/jquery.uniform.js"></script> 
        <script src="js/select2.min.js"></script> 
        <script src="js/jquery.validate.js"></script--> 
        <script src="js/matrix.js"></script> 
        <script src="js/wysihtml5-0.3.0.js"></script> 
        <script src="js/jquery.peity.min.js"></script> 
        <script src="js/bootstrap-wysihtml5.js"></script> 
        <!--script src="js/matrix.form_validation.js"></script-->
        <?php include 'footer.php'; ?>
    </body>
</html>
<?php
    }
    else{
?>
        <script>location.href = '/index.php';</script>
<?php
    }
?>