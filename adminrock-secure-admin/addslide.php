<?php 
    session_start();
    include '../conn.php'; 
    if(isset($_SESSION['useradmin']['status'])) {

        //Edit slide
        if(isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == 'edit') {
            $did = $_GET['id'];
            $updt = "SELECT * FROM slides WHERE id='$did'";
            $res1 = mysqli_query($conn,$updt) or die($conn->error);
            while ($row = mysqli_fetch_assoc($res1)) { 
                $slmgid = $row['id'];
                $sltitle1= $row['title'];
                $sldesc1 = $row['description'];
                $slimage1 = $row['image'];
                $slbtn1tlt1 = $row['btn1_title'];
                $slbtn1lnk1 = $row['btn1_link'];
                $slbtn2tlt1 = $row['btn2_title'];
                $slbtn2lnk1 = $row['btn2_link'];

            }            
        }

        //Delete slide
        if(isset($_GET['action']) && $_GET['action'] == 'delete') {
            $did = $_GET['id'];
            $delt = "DELETE * FROM slides WHERE id='$did'";
            $res = mysqli_query($conn,$delt) or die($conn->error);
            if ($conn->query($sql) === TRUE) {
                $_SESSION['fileupload']['inserted'] = '<div style="color:green;font-size:14px;text-align:center;">Recod Deleted.</div>';
             }
             else{
               $_SESSION['fileupload']['inserted'] = '<div style="color:red;font-size:14px;text-align:center;">Something went wrong!</div>';
             }
            
        }

        //add gallery image
        if(isset($_POST['addslide'])) {
            $sltitle= stripslashes($_POST['sltitle']);
            $sldesc = stripslashes($_POST['sldesc']);
            $slimage = $_FILES['slimage']['name'];
            $slbtn1tlt = stripslashes($_POST['slbtn1tlt']);
            $slbtn1lnk = stripslashes($_POST['slbtn1lnk']);
            $slbtn2tlt = stripslashes($_POST['slbtn2tlt']);
            $slbtn2lnk = stripslashes($_POST['slbtn2lnk']);


            if(empty($slimage)) {
                $_SESSION['fileupload']['error'] = '<div style="font-size:14px;color:red;text-align:center;">Both fields are required.</div>';
            }
            else {
                unset( $_SESSION['fileupload']['error']);
                $target_path = "../uploads/slider/";  

                    
                    //Get the temp file path
                    $tmpFilePath = $_FILES['slimage']['tmp_name'];
                    $newFilePath = $target_path  . $_FILES['slimage']['name'];
                    $filename = $_FILES['slimage']['name'];

                    //Upload the file into the temp dir
                    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                        //$target_path = $target_path.basename( $_FILES['syllabusmath']['name']);   
                        $_SESSION['fileupload']['uploaded'] = '<div style="color:green;font-size:14px;text-align:center;">File uploaded successfully!</div>';  
                    } 
                    else{  
                        $_SESSION['fileupload']['uploaded'] = "Sorry, file not uploaded, please try again!";  
                    } 
                    $sql = "INSERT INTO slides (title, description, image, btn1_title, btn1_link, btn2_title, btn2_link) VALUES ('$sltitle', '$sldesc', '$filename', '$slbtn1tlt','$slbtn1lnk', '$slbtn2tlt', '$slbtn2lnk')";
                    if ($conn->query($sql) === TRUE) {
                        $_SESSION['fileupload']['inserted'] = '<div style="color:green;font-size:14px;text-align:center;">Recod Inserted.</div>';
                    }
                    else{
                        $_SESSION['fileupload']['inserted'] = '<div style="color:red;font-size:14px;text-align:center;">Something went wrong!</div>';
                    }
                }
            }
            elseif (isset($_POST['updateslide'])) {
                $sltitle= stripslashes($_POST['sltitle']);
                $sldesc = stripslashes($_POST['sldesc']);
                $slimage = $_FILES['slimage']['name'];
                $slbtn1tlt = stripslashes($_POST['slbtn1tlt']);
                $slbtn1lnk = stripslashes($_POST['slbtn1lnk']);
                $slbtn2tlt = stripslashes($_POST['slbtn2tlt']);
                $slbtn2lnk = stripslashes($_POST['slbtn2lnk']);
                $slimage1 = $_POST['slimage1'];
                $slimgid1 = $_POST['slimgid1'];

                if($_FILES['slimage']['name'] == '') {
                    $slimage1 = $_POST['slimage1'];
                }
                else {
                  unset( $_SESSION['fileupload']['error']);
                  $target_path = "../uploads/slider/";  
                  $target_path = $target_path.basename($_FILES['slimage']['name']);  
                  if(move_uploaded_file($_FILES['slimage']['tmp_name'], $target_path)) { 
                    $slimage1 = $_FILES['slimage']['name'];
                    $_SESSION['fileupload']['uploaded'] = '<div style="color:green;font-size:14px;text-align:center;">File uploaded successfully!</div>';  
                  } else{  
                    $_SESSION['fileupload']['uploaded'] = "Sorry, file not uploaded, please try again!".$_FILES["slimage"]["error"];  
                  } 
                }
                $sql = "UPDATE slides SET title='$sltitle', description='$sldesc', image= '$slimage1', btn1_title='$slbtn1tlt', btn1_link='$slbtn1lnk', btn2_title='$slbtn2tlt', btn2_link='$slbtn2lnk' WHERE id='$slimgid1'";
        
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
            <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> <a href="#" class="current">Homepage</a> <a href="#" class="current">Slider</a> <a href="#" class="current">Add Slide Image</a> </div>
            <h1>Add Slide</h1>
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
                            <h5>Add Slide Image</h5>
                        </div>
                        <div class="widget-content">
                            <div class="control-group">
                                <label class="control-label">Title</label>
                                <div class="controls">
                                    <input type="text" name="sltitle" id="title" value="<?php echo isset($sltitle1) ? $sltitle1 : '' ?>" >
                                    <input type="hidden" name="slimgid1" id="file" value="<?php echo isset($slmgid ) ? $slmgid : '' ?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">description</label>
                                <div class="controls">
                                    <input type="text" name="sldesc" id="title" value="<?php echo isset($sldesc1) ? $sldesc1 : '' ?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Slide Image</label>
                                <div class="controls">
                                    <input type="file" name="slimage" id="file" required>
                                    <input type="hidden" name="slimage1" id="file" value="<?php echo isset($slimage1) ? $slimage1 : '' ?>">
                                    <img src="../uploads/slider/<?php echo isset($slimage1) ? $slimage1 : '' ?>" width="50"> <?php echo isset($slimage1) ? $slimage1 : '' ?>
                                <br>
                                <span class="colorprimary">Image size is (width)1920x820(height)</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Button Title</label>
                                <div class="controls">
                                    <input type="text" name="slbtn1tlt" id="title" value="<?php echo isset($slbtn1tlt1) ? $slbtn1tlt1 : '' ?>" >
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Button Link</label>
                                <div class="controls">
                                    <input type="text" name="slbtn1lnk" id="title" value="<?php echo isset($slbtn1lnk1) ? $slbtn1lnk1 : '' ?>" >
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Button2 Title</label>
                                <div class="controls">
                                    <input type="text" name="slbtn2tlt" id="title" value="<?php echo isset($slbtn2tlt1) ? $slbtn2tlt1 : '' ?>" >
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Button2 Link</label>
                                <div class="controls">
                                    <input type="text" name="slbtn2lnk" id="title" value="<?php echo isset($slbtn2lnk1) ? $slbtn2lnk1 : '' ?>" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <?php 
                        if(isset($_GET['action']) && $_GET['action'] == 'edit') {
                    ?>
                    <input type="submit" value="Update" class="btn btn-success" name="updateslide">
                    <?php
                        }
                        else {
                    ?>
                            <input type="submit" value="Save" class="btn btn-success" name="addslide">
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
