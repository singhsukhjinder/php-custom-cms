<?php 
    session_start();
    include '../conn.php'; 
    if(isset($_SESSION['useradmin']['status'])) {
        $sql2 = "SELECT * FROM latestnews";
        $res = mysqli_query($conn,$sql2) or die($conn->error);
        if (mysqli_num_rows($res) >= 1 ) {
            while($row = mysqli_fetch_assoc($res)) {
                $hjtitle = $row['title'];
            }
        }
        if(isset($_GET['action']) && $_GET['action'] == 'edit') {
            $did = $_GET['id'];
            $edt = "SELECT * FROM latestnews WHERE id='$did'";
            $resedt = mysqli_query($conn,$edt) or die($conn->error);
            $rowedt = mysqli_fetch_assoc($resedt);
            $lntitle1 = $rowedt['title'];
            $lnid = $rowedt['id'];
        }
        if(isset($_POST['ltnewssave'])) {
            $lntitle = $_POST['lntitle'];
            
            $ins = "INSERT INTO latestnews (title) VALUES('$lntitle')";
            if ($conn->query($ins) === TRUE) {
                $_SESSION['fileupload']['inserted'] = '<div style="color:green;font-size:14px;text-align:center;">Recod Inserted.</div>';
            }
            else{
                $_SESSION['fileupload']['inserted'] = '<div style="color:red;font-size:14px;text-align:center;">Something went wrong!</div>';
            }
        }

        elseif(isset($_POST['ltnewsupdate'])){
            $lntitle = $_POST['lntitle'];
            $lnid = $_POST['lnid'];
            $sql = "UPDATE latestnews SET title='$lntitle' WHERE id='$lnid'";
    
            if ($conn->query($sql) === TRUE) {
                $_SESSION['fileupload']['inserted'] = '<div style="color:green;font-size:14px;text-align:center;">Recod Updated.</div>';
            }
            else{
                $_SESSION['fileupload']['inserted'] = '<div style="color:red;font-size:14px;text-align:center;">Something went wrong!</div>';
            }
        }

         
        include 'header.php';
?>
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> <a href="#" class="">Homepage</a> <a href="#" class="">Latest News</a> <a href="#" class="current">Add Latest News</a> </div>
            <h1>Add Latest News</h1>
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
                                <h5>Latest News</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <div class="control-group">
                                    <label class="control-label">Title</label>
                                    <div class="controls">
                                        <input type="text" id="lntitle" name="lntitle"  value="<?php echo isset($lntitle1) ? $lntitle1 : '' ?>" required>
                                        <input type="hidden" id="lnid" name="lnid"  value="<?php echo isset($lnid) ? $lnid : '' ?>" required>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
            <?php
                if(isset($_GET['action']) && $_GET['action'] == 'edit') {
            ?>
            <input type="submit" value="Update" class="btn btn-success" name="ltnewsupdate">
                    
            <?php 
                }
                else {
            ?> 
                 <input type="submit" value="Save" class="btn btn-success" name="ltnewssave">
            <?php 
                } 
            ?>
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