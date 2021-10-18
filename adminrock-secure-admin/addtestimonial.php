<?php 
    session_start();
    include '../conn.php'; 
    if(isset($_SESSION['useradmin']['status'])) {

        //Edit slide
        if(isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == 'edit') {
            $did = $_GET['id'];
            $updt = "SELECT * FROM testimonials WHERE id='$did'";
            $res1 = mysqli_query($conn,$updt) or die($conn->error);
            while ($row = mysqli_fetch_assoc($res1)) { 
                $tsigid = $row['id'];
                $tstitle1= $row['name'];
                $tsdesc1 = $row['description'];
                $tsimage1 = $row['photo'];

            }            
        }

        //Delete slide
        if(isset($_GET['action']) && $_GET['action'] == 'delete') {
            $did = $_GET['id'];
            $delt = "DELETE * FROM testimonials WHERE id='$did'";
            $res = mysqli_query($conn,$delt) or die($conn->error);
            if ($conn->query($sql) === TRUE) {
                $_SESSION['fileupload']['inserted'] = '<div style="color:green;font-size:14px;text-align:center;">Recod Deleted.</div>';
            }
            else{
               $_SESSION['fileupload']['inserted'] = '<div style="color:red;font-size:14px;text-align:center;">Something went wrong!</div>';
            }
        }

        //add gallery image
        if(isset($_POST['addtesti'])) {
            $tstitle= stripslashes($_POST['tstitle']);
            $tsdesc = stripslashes($_POST['tsdesc']);
            $tsimage = $_FILES['tsimage']['name'];

            if(empty($tsimage)) {
                $_SESSION['fileupload']['error'] = '<div style="font-size:14px;color:red;text-align:center;">Both fields are required.</div>';
            }
            else {
                unset( $_SESSION['fileupload']['error']);
                $target_path = "../uploads/testimonials/";  

                    
                    //Get the temp file path
                    $tmpFilePath = $_FILES['tsimage']['tmp_name'];
                    $newFilePath = $target_path  . $_FILES['tsimage']['name'];
                    $filename = $_FILES['tsimage']['name'];

                    //Upload the file into the temp dir
                    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                        $filename = $_FILES['tsimage']['name'];
                        //$target_path = $target_path.basename( $_FILES['syllabusmath']['name']);   
                        $_SESSION['fileupload']['uploaded'] = '<div style="color:green;font-size:14px;text-align:center;">File uploaded successfully!</div>';  
                    } 
                    else{  
                        $_SESSION['fileupload']['uploaded'] = "Sorry, file not uploaded, please try again!";  
                    } 
                    $sql = "INSERT INTO testimonials (name, description, photo) VALUES ('$tstitle', '$tsdesc', '$filename')";
                    if ($conn->query($sql) === TRUE) {
                        $_SESSION['fileupload']['inserted'] = '<div style="color:green;font-size:14px;text-align:center;">Recod Inserted.</div>';
                    }
                    else{
                        $_SESSION['fileupload']['inserted'] = '<div style="color:red;font-size:14px;text-align:center;">Something went wrong! try to add again</div>';
                    }
                }
            }
            elseif (isset($_POST['updatetesti'])) {
                $tstitle= stripslashes($_POST['tstitle']);
                $tsdesc = stripslashes($_POST['tsdesc']);
                $tsimage = $_FILES['tsimage']['name'];
                $tsimage1 = $_POST['tsimage1'];
                $tsid1 = $_POST['tsid1'];

                if($_FILES['tsimage']['name'] == '') {
                    $tsimage1 = $_POST['tsimage1'];
                }
                else {
                  unset( $_SESSION['fileupload']['error']);
                  $target_path = "../uploads/testimonials/";  
                  $target_path = $target_path.basename($_FILES['tsimage']['name']);  
                  if(move_uploaded_file($_FILES['tsimage']['tmp_name'], $target_path)) { 
                    $tsimage1 = $_FILES['tsimage']['name'];
                    $_SESSION['fileupload']['uploaded'] = '<div style="color:green;font-size:14px;text-align:center;">File uploaded successfully!</div>';  
                  } else{  
                    $_SESSION['fileupload']['uploaded'] = "Sorry, file not uploaded, please try again!".$_FILES["tsimage"]["error"];  
                  } 
                }
                $sql = "UPDATE testimonials SET name='$tstitle', description='$tsdesc', photo= '$tsimage1'";
        
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
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> <a href="#" class="">Testimonials</a> <a href="#" class="current">Add Testimonial</a> </div>
            <h1>Add Testimonial</h1>
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
                <div class="row-fluid">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Add Testimonial</h5>
                        </div>
                        <div class="widget-content">
                            <div class="control-group">
                                <label class="control-label">Name</label>
                                <div class="controls">
                                    <input type="text" name="tstitle" id="title" value="<?php echo isset($tstitle1) ? $tstitle1 : '' ?>" >
                                    <input type="hidden" name="tsid1" id="file" value="<?php echo isset($tsigid ) ? $tsigid : '' ?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">description</label>
                                <div class="controls">
                                    <input type="text" name="tsdesc" id="title" value="<?php echo isset($tsdesc1) ? $tsdesc1 : '' ?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Image</label>
                                <div class="controls">
                                    <input type="file" name="tsimage" id="file" required>
                                    <input type="hidden" name="tsimage1" id="file" value="<?php echo isset($tsimage1) ? $tsimage1 : '' ?>">
                                    <img src="../uploads/testimonials/<?php echo isset($tsimage1) ? $tsimage1 : '' ?>" width="50"><br>
                                <span class="colorprimary">Image size is (width)100x100(height)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <?php 
                        if(isset($_GET['action']) && $_GET['action'] == 'edit') {
                    ?>
                    <input type="submit" value="Update" class="btn btn-success" name="updatetesti">
                    <?php
                        }
                        else {
                    ?>
                            <input type="submit" value="Save" class="btn btn-success" name="addtesti">
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
        <script>
            $('.textarea_editor_class9').wysihtml5();
        </script>
        <?php include 'footer.php'; ?>
        <script>
	$('.textarea_editor').wysihtml5();
</script>
          
        </body>
        </html>
        <?php
    }
    else{
?>
        <script>location.href = '/index.php';</script>
<?php
    }
