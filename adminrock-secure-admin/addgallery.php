<?php 
    session_start();
    include '../conn.php'; 
    if(isset($_SESSION['useradmin']['status'])) {

        //Edit teacher
        if(isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == 'edit') {
            $did = $_GET['id'];
            $updt = "SELECT * FROM gallery WHERE id='$did'";
            $res1 = mysqli_query($conn,$updt) or die($conn->error);
            while ($row = mysqli_fetch_assoc($res1)) { 
                $glimgid = $row['id'];
                $imagetitle1= $row['name'];
                $imagedesc1 = $row['description'];
                $glimage1 = $row['image'];

            }            
        }

        //Delete teacher
        if(isset($_GET['action']) && $_GET['action'] == 'delete') {
            $did = $_GET['id'];
            $delt = "DELETE * FROM gallery WHERE id='$did'";
            $res = mysqli_query($conn,$delt) or die($conn->error);
            if ($conn->query($sql) === TRUE) {
                $_SESSION['fileupload']['inserted'] = '<div style="color:green;font-size:14px;text-align:center;">Recod Deleted.</div>';
             }
             else{
               $_SESSION['fileupload']['inserted'] = '<div style="color:red;font-size:14px;text-align:center;">Something went wrong!</div>';
             }
            
        }

        //add gallery image
        if(isset($_POST['addgallery'])) {
            $imagetitle = stripslashes($_POST['imagetitle']);
            $imagedesc = stripslashes($_POST['imagedesc']);
            $glimage = $_FILES['glimage']['name'];

            if(empty($glimage)) {
                $_SESSION['fileupload']['error'] = '<div style="font-size:14px;color:red;text-align:center;">Both fields are required.</div>';
            }
            else {
                unset( $_SESSION['fileupload']['error']);
                $target_path = "../uploads/gallery/";  

                    
                    //Get the temp file path
                    $tmpFilePath = $_FILES['glimage']['tmp_name'];
                    $newFilePath = $target_path  . $_FILES['glimage']['name'];
                    $filename = $_FILES['glimage']['name'];

                    //Upload the file into the temp dir
                    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                        //$target_path = $target_path.basename( $_FILES['syllabusmath']['name']);   
                        $_SESSION['fileupload']['uploaded'] = '<div style="color:green;font-size:14px;text-align:center;">File uploaded successfully!</div>';  
                    } 
                    else{  
                        $_SESSION['fileupload']['uploaded'] = "Sorry, file not uploaded, please try again!";  
                    } 
                    $sql = "INSERT INTO gallery (name, description, image) VALUES ('$imagetitle', '$imagedesc', '$filename')";
                    if ($conn->query($sql) === TRUE) {
                        $_SESSION['fileupload']['inserted'] = '<div style="color:green;font-size:14px;text-align:center;">Recod Inserted.</div>';
                    }
                    else{
                        $_SESSION['fileupload']['inserted'] = '<div style="color:red;font-size:14px;text-align:center;">Something went wrong!</div>';
                    }
                }
            }
            elseif (isset($_POST['updategallery'])) {
                $imagetitle = stripslashes($_POST['imagetitle']);
                $imagedesc = stripslashes($_POST['imagedesc']);
                $glimage = $_FILES['glimage']['name'];
                $glimgid = $_POST['glimgid1'];

                if($_FILES['glimage']['name'] == '') {
                    $glimage = $_POST['glimage1'];
                }
                else {
                  unset( $_SESSION['fileupload']['error']);
                  $target_path = "../uploads/gallery/";  
                  $target_path = $target_path.basename($_FILES['glimage']['name']);  
                  if(move_uploaded_file($_FILES['glimage']['tmp_name'], $target_path)) {  
                    $_SESSION['fileupload']['uploaded'] = '<div style="color:green;font-size:14px;text-align:center;">File uploaded successfully!</div>';  
                  } else{  
                    $_SESSION['fileupload']['uploaded'] = "Sorry, file not uploaded, please try again!".$_FILES["glimage"]["error"];  
                  } 
                }
                $sql = "UPDATE gallery SET name='$imagetitle', description='$imagedesc', image='$glimage' WHERE id='$glimgid'";
        
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
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> <a href="#" class="current">Add Gallery Image</a> </div>
            <h1>Gallery</h1>
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
                            <h5>Add Gallery Image</h5>
                        </div>
                        <div class="widget-content">
                        <div class="control-group">
                            <label class="control-label">Title</label>
                            <div class="controls">
                                <input type="text" name="imagetitle" id="title" value="<?php echo isset($imagetitle1) ? $imagetitle1 : '' ?>" >
                                <input type="hidden" name="glimgid1" id="file" value="<?php echo isset($glimgid ) ? $glimgid : '' ?>">
                            </div>
                        </div>
                            <div class="control-group">
                                <label class="control-label">File</label>
                                <div class="controls">
                                    <input type="file" name="glimage" id="file" required>
                                    <input type="hidden" name="glimage1" id="file" value="<?php echo isset($glimage1) ? $glimage1 : '' ?>">
                                    <img src="../uploads/gallery/" width="50"> <?php echo isset($glimage1) ? $glimage1 : '' ?>
                                    <br>
                                    <span class="colorprimary">Image size is (width)740x960(height)</span>
                                </div>
                            </div>
                            <div class="control-group">
                            <label class="control-label">Description</label>
                                <div class="controls">
                                    <textarea class="textarea_editor_class9 span12" rows="6" placeholder="Enter text ..." name="imagedesc"><?php echo isset($imagedesc1) ? $imagedesc1 : '' ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <?php 
                        if(isset($_GET['action']) && $_GET['action'] == 'edit') {
                    ?>
                    <input type="submit" value="Update" class="btn btn-success" name="updategallery">
                    <?php
                        }
                        else {
                    ?>
                            <input type="submit" value="Save" class="btn btn-success" name="addgallery">
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
