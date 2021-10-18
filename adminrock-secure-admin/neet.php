<?php 
    session_start();
    include '../conn.php'; 
    $sql2 = "SELECT * FROM classescontent WHERE class='neet'";
    $res = mysqli_query($conn,$sql2) or die($conn->error);
    if (mysqli_num_rows($res) >= 1 ) {
        while ($row = mysqli_fetch_row($res)) {
            $id = $row['0'];
            $title = $row['2'];
            $description = $row['3'];
        }
    }
    if(isset($_SESSION['useradmin']['status'])) {

        if(isset($_POST['neet'])) {
            $pagetitle = stripslashes($_POST['pagetitle']);
            $classdesc = stripslashes($_POST['classdesc']);
            
            // Count # of uploaded files in array
            //$neet= count($_FILES['syllabusneet']['name']);
            if(empty($pagetitle)) {
                $_SESSION['fileupload']['error'] = '<div style="font-size:14px;color:red;text-align:center;">Both fields are required.</div>';
            }
            else {
                unset( $_SESSION['fileupload']['error']);
               /* $target_path = "../uploads/";  

                // Loop through each math file
                for( $i=0 ; $i < $neet ; $i++ ) {
                    
                    //Get the temp file path
                    $tmpFilePath = $_FILES['syllabusneet']['tmp_name'][$i];
                    $newFilePath = $target_path  . $_FILES['syllabusneet']['name'][$i];
                    $filename = $_FILES['syllabusneet']['name'][$i];

                    //Upload the file into the temp dir
                    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                        //$target_path = $target_path.basename( $_FILES['syllabusneet']['name']);   
                        $_SESSION['fileupload']['uploaded'] = '<div style="color:green;font-size:14px;text-align:center;">File uploaded successfully!</div>';  
                    } 
                    else{  
                        $_SESSION['fileupload']['uploaded'] = "Sorry, file not uploaded, please try again!";  
                    } 
                    $sql = "INSERT INTO syllabus (class, subject, filename, uploaded_at) VALUES ('neet', 'neet', '$filename', NOW())";
                    if ($conn->query($sql) === TRUE) {
                        $_SESSION['fileupload']['inserted'] = '<div style="color:green;font-size:14px;text-align:center;">Recod Inserted.</div>';
                    }
                    else{
                        $_SESSION['fileupload']['inserted'] = '<div style="color:red;font-size:14px;text-align:center;">Something went wrong!</div>';
                    }
                } */           

                if (mysqli_num_rows($res) < 1 ) {
                    $sql1 = "INSERT INTO classescontent (class, title, description, created_at) VALUES ('neet', '$pagetitle', '$classdesc', NOW())";
                    if ($conn->query($sql1) === TRUE) {
                        $_SESSION['fileupload']['inserted'] = '<div style="color:green;font-size:14px;text-align:center;">Recod Inserted.</div>';
                    }
                    else{
                        $_SESSION['fileupload']['inserted'] = '<div style="color:red;font-size:14px;text-align:center;">Something went wrong!</div>';
                    }
                }
                else {
                    $sql3= "UPDATE `classescontent` SET `class`='neet',`title`='$pagetitle',`description`='$classdesc',`created_at`='now()' WHERE id='$id'";
                    if ($conn->query($sql3) === TRUE) {
                        $_SESSION['fileupload']['inserted'] = '<div style="color:green;font-size:14px;text-align:center;">Recod Inserted.</div>';
                    }
                    else{
                        $_SESSION['fileupload']['inserted'] = '<div style="color:red;font-size:14px;text-align:center;">Something went wrong!</div>';
                    }
                }
            }
        }

    include 'header.php';
?>

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> <a href="#" class="">NEET</a> <a href="#" class="current">NEET Content</a> </div>
            <h1>NEET Content</h1>
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
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Page title</h5>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Title</label>
                            <div class="controls">
                                <input type="text" name="pagetitle" id="title" value="<?php echo isset($title) ? $title : '' ?>" required>
                            </div>
                        </div>
                    </div>
                </div>
                <!--div class="row-fluid">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Neet Files</h5>
                        </div>
                        <div class="control-group">
                            <label class="control-label">File</label>
                            <div class="controls">
                                <input type="file" name="syllabusneet[]" id="file" required multiple>
                            </div>
                        </div>
                    </div>
                </div-->                
                <div class="row-fluid">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Page content</h5>
                        </div>
                    <div class="widget-content">
                        <div class="control-group">
                        <label class="control-label">Description</label>
                            <div class="controls">
                                <textarea class="textarea_editor_neet span12" rows="6" placeholder="Enter text ..." name="classdesc"><?php echo isset($description) ? $description : '' ?></textarea>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="form-actions">
                    <input type="submit" value="Save" class="btn btn-success" name="neet">
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
            $('.textarea_editor_neet').wysihtml5();
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
