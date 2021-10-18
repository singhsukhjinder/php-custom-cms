<?php 
    session_start();
    include '../conn.php'; 
    if(isset($_SESSION['useradmin']['status'])) {

        if(isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == 'edit') {
            $cid = $_GET['id'];
            $sql2 = "SELECT * FROM courses WHERE id='$cid'";
            $res = mysqli_query($conn,$sql2) or die($conn->error);
            while ($row = mysqli_fetch_assoc($res)) {
                $crsid = $row['id'];
                $crstype = $row['crstype'];
                $crstitle = $row['crstitle'];
                $crsrewiews = $row['crsrewiews'];
                $crsrating = $row['crsrating'];
                $crstime = $row['crstime'];
                $crsprice = $row['crsprice'];
                $crsstrtdate = $row['crsstrtdate'];
                $crsduration = $row['crsduration'];
                $crsstudents = $row['crsstudents'];
                $crsbtntitle = $row['crsbtntitle'];  
                $crsbtnlink = $row['crsbtnlink'];
                $crsdesc = $row['crsdesc'];
                $crsimg = $row['crsimg'];            
            } 
        }
        if(isset($_POST['coursesave'])) {

            $crstype1 = stripslashes(mysqli_real_escape_string($conn, $_POST['crstype']));
            $crstitle1 = stripslashes(mysqli_real_escape_string($conn, $_POST['crstitle']));
            $crsdesc1 = stripslashes(mysqli_real_escape_string($conn, $_POST['crsdesc']));
            $crsrewiews1 = stripslashes(mysqli_real_escape_string($conn, $_POST['crsrewiews']));
            $crsrating1 = stripslashes(mysqli_real_escape_string($conn, $_POST['crsrating']));
            $crstime1 = stripslashes(mysqli_real_escape_string($conn, $_POST['crstime']));
            $crsprice1 = stripslashes(mysqli_real_escape_string($conn, $_POST['crsprice']));
            $crsstrtdate1 = stripslashes(mysqli_real_escape_string($conn, $_POST['crsstrtdate']));
            $crsduration1 = stripslashes(mysqli_real_escape_string($conn, $_POST['crsduration']));
            $crsstudents1 = stripslashes(mysqli_real_escape_string($conn, $_POST['crsstudents']));
            $crsbtntitle1 = stripslashes(mysqli_real_escape_string($conn, $_POST['crsbtntitle']));  
            $crsbtnlink1 = stripslashes(mysqli_real_escape_string($conn, $_POST['crsbtnlink']));
            $crsimg1 = $_FILES['crsimg']['name'];
            
            if(!empty($crstitle1)) {
                $target_path = "../uploads/courses/";  
                
                $filename = $_FILES['crsimg']['name'];
                $target_pathst = $target_path.basename( $_FILES['crsimg']['name']);   
                if(move_uploaded_file($_FILES['crsimg']['tmp_name'], $target_pathst)) {  
                    $_SESSION['fileupload']['uploaded'] = '<div style="color:green;font-size:14px;text-align:center;">File uploaded successfully!</div>';  
                } else{  
                    $_SESSION['fileupload']['uploaded'] = "Sorry, file not uploaded, please try again!";  
                }

                $sql = 'INSERT INTO courses (crstype, crstitle, crsdesc, crsrewiews, crsrating, crstime, crsprice, crsstrtdate, crsduration, crsstudents, crsbtntitle, crsbtnlink, crsimg) VALUES ("'.$crstype1.'", "'.$crstitle1.'", "'.$crsdesc1 .'" ,"'.$crsrewiews1.'", "'.$crsrating1.'", "'.$crstime1.'", "'.$crsprice1 .'", "'.$crsstrtdate1.'", "'.$crsduration1.'", "'.$crsstudents1.'", "'.$crsbtntitle1.'", "'.$crsbtnlink1.'", "'.$filename.'")';
    
                if ($conn->query($sql) === TRUE) {
                    $_SESSION['fileupload']['inserted'] = '<div style="color:green;font-size:14px;text-align:center;">Recod Inserted.</div>';
                }
                else{
                    echo $conn->error;
                    $_SESSION['fileupload']['inserted'] = '<div style="color:red;font-size:14px;text-align:center;">Something went wrong!</div>';
                }
                  
            }
        }
        elseif (isset($_POST['courseupdate'])){

            $crstype1 = stripslashes(mysqli_real_escape_string($conn, $_POST['crstype']));
            $crstitle1 = stripslashes(mysqli_real_escape_string($conn, $_POST['crstitle']));
            $crsdesc1 = stripslashes(mysqli_real_escape_string($conn, $_POST['crsdesc']));
            $crsrewiews1 = stripslashes(mysqli_real_escape_string($conn, $_POST['crsrewiews']));
            $crsrating1 = stripslashes(mysqli_real_escape_string($conn, $_POST['crsrating']));
            $crstime1 = stripslashes(mysqli_real_escape_string($conn, $_POST['crstime']));
            $crsprice1 = stripslashes(mysqli_real_escape_string($conn, $_POST['crsprice']));
            $crsstrtdate1 = stripslashes(mysqli_real_escape_string($conn, $_POST['crsstrtdate']));
            $crsduration1 = stripslashes(mysqli_real_escape_string($conn, $_POST['crsduration']));
            $crsstudents1 = stripslashes(mysqli_real_escape_string($conn, $_POST['crsstudents']));
            $crsbtntitle1 = stripslashes(mysqli_real_escape_string($conn, $_POST['crsbtntitle']));  
            $crsbtnlink1 = stripslashes(mysqli_real_escape_string($conn, $_POST['crsbtnlink']));
            $crsid1 = $_POST['crsid'];
            
            if($_FILES['crsimg']['name'] != '') {
                $crsimg1 = $_FILES['crsimg']['name'];
            }
            else {            
                $crsimg1 =  $_POST['crsimg1'];
            }

            $sql3 = 'UPDATE courses SET	crstype="'.$crstype1.'", crstitle="'.$crstitle1.'", crsdesc="'.$crsdesc1.'", crsrewiews="'.$crsrewiews1.'", crsrating="'.$crsrating1.'", crstime="'.$crstime1.'", crsstrtdate="'.$crsstrtdate1.'", crsprice="'.$crsprice1.'", crsduration="'.$crsduration1.'", crsstudents= "'.$crsstudents1.'", crsbtntitle="'.$crsbtntitle1.'", crsbtnlink="'.$crsbtnlink1.'", crsimg="'.$crsimg1.'" WHERE id="'.$crsid1.'"';

            if ($conn->query($sql3) === TRUE) {
                $_SESSION['fileupload']['inserted'] = '<div style="color:green;font-size:14px;text-align:center;">Recod Updated.</div>';
            }
            else{
                echo $conn->error;
                $_SESSION['fileupload']['inserted'] = '<div style="color:red;font-size:14px;text-align:center;">Something went wrong!</div>';
            }
        }
        include 'header.php';
?>

        <div id="content">
            <div id="content-header">
                <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> <a href="#" class="">Courses</a> <a href="#" class="current">Add Course</a> </div>
                <h1>Add Course</h1>
            </div>
            <div class="container-fluid"><hr>
            
            <!-- messages  -->
            <div class="row-fluid">
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
            </div>
            <form class="form-horizontal" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" name="basic_validate" id="basic_validate" novalidate="novalidate" enctype="multipart/form-data" >
                
                <!-- Testimonials section -->
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> 
                                <i class="icon-info-sign"></i> </span>
                                <h5>Course</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <div class="control-group">
                                    <label class="control-label">Course Type</label>
                                    <div class="controls">
                                        <input type="text" id="title" name="crstype"  value="<?php echo isset($crstype) ? $crstype : '' ?>" required>

                                        <input type="hidden" id="title" name="crsid"  value="<?php echo isset($crsid) ? $crsid : '' ?>" required>                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Course Title</label>
                                    <div class="controls">
                                        <input type="text" id="title" name="crstitle"  value="<?php echo isset($crstitle) ? $crstitle : '' ?>" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Course Description</label>
                                    <div class="controls">
                                        <textarea class="textarea_editor_csrdesc" rows="6" placeholder="Enter text ..." name="crsdesc"><?php echo isset($crsdesc) ? $crsdesc : '' ?></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Course Reviews</label>
                                    <div class="controls">
                                        <input type="text" id="title" name="crsrewiews"  value="<?php echo isset($crsrewiews) ? $crsrewiews : '' ?>" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Course Rating</label>
                                    <div class="controls">
                                        <input type="text" id="title" name="crsrating"  value="<?php echo isset($crsrating) ? $crsrating : '' ?>" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Course Time</label>
                                    <div class="controls">
                                        <input type="text" id="title" name="crstime"  value="<?php echo isset($crstime) ? $crstime : '' ?>" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Course Start Date</label>
                                    <div class="controls">
                                        <input type="date" id="title" name="crsstrtdate"  value="<?php echo isset($crsstrtdate) ? $crsstrtdate : '' ?>" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Course Duration</label>
                                    <div class="controls">
                                        <input type="text" id="title" name="crsduration"  value="<?php echo isset($crsduration) ? $crsduration : '' ?>" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Course Price</label>
                                    <div class="controls">
                                        <input type="text" id="title" name="crsprice"  value="<?php echo isset($crsprice) ? $crsprice : '' ?>" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Total Students</label>
                                    <div class="controls">
                                        <input type="text" id="title" name="crsstudents"  value="<?php echo isset($crsstudents) ? $crsstudents : '' ?>" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Course Button Title</label>
                                    <div class="controls">
                                        <input type="text" id="title" name="crsbtntitle"  value="<?php echo isset($crsbtntitle) ? $crsbtntitle : '' ?>" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Course Buttom Link</label>
                                    <div class="controls">
                                        <input type="text" id="title" name="crsbtnlink"  value="<?php echo isset($crsbtnlink) ? $crsbtnlink : '' ?>" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Image</label>
                                    <div class="controls">
                                        <input type="file" id="file" name="crsimg" required>
                                        <input type="hidden" id="file" name="crsimg1" value="<?php echo isset($crsimg) ? $crsimg : '';?>">
                                        <img src="../uploads/courses/<?php echo isset($crsimg) ? $crsimg : '';?>" width="70"> <?php echo isset($crsimg) ? $crsimg : '';?>
                                        <br>
                                        <span class="colorprimary">Image Size is (Width)730x270(Height)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
            <?php
                if(isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == 'edit') {       
            ?>
                    <input type="submit" value="Update" class="btn btn-success" name="courseupdate">
            <?php 
                }
                else{
            ?>
                <input type="submit" value="Save" class="btn btn-success" name="coursesave">
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
            $('.textarea_editor_csrdesc').wysihtml5();
        </script>
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
