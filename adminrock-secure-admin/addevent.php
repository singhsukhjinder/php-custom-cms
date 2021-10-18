<?php 
    session_start();
    include '../conn.php'; 
    if(isset($_SESSION['useradmin']['status'])) {

        if(isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == 'edit') {
            $cid = $_GET['id'];
            $sql2 = "SELECT * FROM events WHERE id='$cid'";
            $res = mysqli_query($conn,$sql2) or die($conn->error);
            while ($row = mysqli_fetch_assoc($res)) {
                $eventid = $row['id'];
                $eventtitle = $row['eventtitle'];
                $eventdate = $row['eventdate'];
                $eventtime = $row['eventtime'];
                $eventvenue = $row['eventvenue'];
                $eventdesc = $row['eventdesc'];
                $eventimg = $row['eventimg'];  
                $eventimgbnn = $row['eventimgbnn'];          
            } 
        }
        if(isset($_POST['eventsave'])) {

            $eventtitle1 = stripslashes(mysqli_real_escape_string($conn, $_POST['eventtitle']));
            $eventdate1 = stripslashes(mysqli_real_escape_string($conn, $_POST['eventdate']));
            $eventtime1 = stripslashes(mysqli_real_escape_string($conn, $_POST['eventtime']));
            $eventvenue1 = stripslashes(mysqli_real_escape_string($conn, $_POST['eventvenue']));
            $eventdesc1 = stripslashes(mysqli_real_escape_string($conn, $_POST['eventdesc']));
            $eventimg1 = $_FILES['eventimg']['name'];
            $eventimg2 = $_FILES['eventimg2']['name'];
            
            if(!empty($eventtitle1)) {
                $target_path = "../uploads/events/";  
                
                $filename = $_FILES['eventimg']['name'];
                $target_pathst = $target_path.basename( $_FILES['eventimg']['name']);   
                if(move_uploaded_file($_FILES['eventimg']['tmp_name'], $target_pathst)) {  
                    $_SESSION['fileupload']['uploaded'] = '<div style="color:green;font-size:14px;text-align:center;">File uploaded successfully!</div>';  
                } else{  
                    $_SESSION['fileupload']['uploaded'] = "Sorry, file not uploaded, please try again!";  
                }

                $filename1 = $_FILES['eventimg2']['name'];
                $target_pathst = $target_path.basename( $_FILES['eventimg2']['name']);   
                if(move_uploaded_file($_FILES['eventimg2']['tmp_name'], $target_pathst)) {  
                    $_SESSION['fileupload']['uploaded'] = '<div style="color:green;font-size:14px;text-align:center;">File uploaded successfully!</div>';  
                } else{  
                    $_SESSION['fileupload']['uploaded'] = "Sorry, file not uploaded, please try again!";  
                }

                $sql = 'INSERT INTO events (eventtitle, eventdate, eventtime, eventvenue, eventdesc, eventimg, eventimgbnn) VALUES ("'.$eventtitle1.'", "'.$eventdate1.'", "'.$eventtime1 .'" ,"'.$eventvenue1.'", "'.$eventdesc1.'", "'.$filename.'", "'.$filename1.'")';
    
                if ($conn->query($sql) === TRUE) {
                    $_SESSION['fileupload']['inserted'] = '<div style="color:green;font-size:14px;text-align:center;">Recod Inserted.</div>';
                }
                else{
                    echo $conn->error;
                    $_SESSION['fileupload']['inserted'] = '<div style="color:red;font-size:14px;text-align:center;">Something went wrong!</div>';
                }
                  
            }
        }
        elseif (isset($_POST['eventupdate'])){

            $eventtitle1 = stripslashes(mysqli_real_escape_string($conn, $_POST['eventtitle']));
            $eventdate1 = stripslashes(mysqli_real_escape_string($conn, $_POST['eventdate']));
            $eventtime1 = stripslashes(mysqli_real_escape_string($conn, $_POST['eventtime']));
            $eventvenue1 = stripslashes(mysqli_real_escape_string($conn, $_POST['eventvenue']));
            $eventdesc1 = stripslashes(mysqli_real_escape_string($conn, $_POST['eventdesc']));
            $eventimg1 = $_FILES['eventimg']['name'];
            $eventimg2 = $_FILES['eventimg2']['name'];
            $eventid = $_POST['eventid'];
            
            //image
            if($_FILES['eventimg']['name'] != '') {
                $eventimg1 = $_FILES['eventimg']['name'];
                $target_path = "../uploads/events/";  
                    
                $filename = $_FILES['eventimg']['name'];
                $target_pathst = $target_path.basename( $_FILES['eventimg']['name']);   
                if(move_uploaded_file($_FILES['eventimg']['tmp_name'], $target_pathst)) {  
                    $_SESSION['fileupload']['uploaded'] = '<div style="color:green;font-size:14px;text-align:center;">File upl  oaded successfully!</div>';  
                } else{  
                    $_SESSION['fileupload']['uploaded'] = "Sorry, file not uploaded, please try again!";  
                }     
            }
            else {            
                $eventimg1 =  $_POST['eventimg1'];
            }


            //banner image
            if($_FILES['eventimg2']['name'] != '') {
                $eventimg2 = $_FILES['eventimg2']['name'];
                $target_path = "../uploads/events/";  
                    
                $filename2 = $_FILES['eventimg2']['name'];
                $target_pathst = $target_path.basename( $_FILES['eventimg2']['name']);   
                if(move_uploaded_file($_FILES['eventimg2']['tmp_name'], $target_pathst)) {  
                    $_SESSION['fileupload']['uploaded'] = '<div style="color:green;font-size:14px;text-align:center;">File upl  oaded successfully!</div>';  
                } else{  
                    $_SESSION['fileupload']['uploaded'] = "Sorry, file not uploaded, please try again!";  
                }     
            }
            else {            
                $eventimg2 =  $_POST['eventimg3'];
            }

            $sql3 = 'UPDATE events SET	eventtitle="'.$eventtitle1.'", eventdate="'.$eventdate1.'", eventtime="'.$eventtime1.'", eventvenue="'.$eventvenue1.'", eventdesc="'.$eventdesc1.'", eventimg="'.$eventimg1.'", eventimgbnn="'.$eventimg2.'" WHERE id="'.$eventid.'"';

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
                <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> <a href="#" class="">Events</a> <a href="#" class="current">Add Event</a> </div>
                <h1>Add Event</h1>
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
                                <h5>Event</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <div class="control-group">
                                    <label class="control-label">Event Title</label>
                                    <div class="controls">
                                        <input type="text" id="title" name="eventtitle"  value="<?php echo isset($eventtitle) ? $eventtitle : '' ?>" required>

                                        <input type="hidden" id="title" name="eventid"  value="<?php echo isset($eventid) ? $eventid : '' ?>" required>                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Event Date</label>
                                    <div class="controls">
                                        <input type="date" id="title" name="eventdate"  value="<?php echo isset($eventdate) ? $eventdate : '' ?>" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Event Time</label>
                                    <div class="controls">
                                        <input type="text" id="title" name="eventtime"  value="<?php echo isset($eventtime) ? $eventtime : '' ?>" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Event venue</label>
                                    <div class="controls">
                                        <input type="text" id="title" name="eventvenue"  value="<?php echo isset($eventvenue) ? $eventvenue : '' ?>" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Event Description</label>
                                    <div class="controls">
                                        <textarea class="textarea_editor_csrdesc" rows="6" placeholder="Enter text ..." name="eventdesc"><?php echo isset($eventdesc) ? $eventdesc : '' ?></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Event Image</label>
                                    <div class="controls">
                                        <input type="file" id="file" name="eventimg" required>
                                        <input type="hidden" id="file" name="eventimg1" value="<?php echo isset($eventimg) ? $eventimg : '';?>">
                                        <img src="../uploads/events/<?php echo isset($eventimg) ? $eventimg : '';?>" width="70"> <?php echo isset($eventimg) ? $eventimg : '';?>
                                        <br>
                                        <span class="colorprimary">Image size is (Width)270x300(height)</span>
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label class="control-label">Event Banner</label>
                                    <div class="controls">
                                        <input type="file" id="file" name="eventimg2" required>
                                        <input type="hidden" id="file" name="eventimg3" value="<?php echo isset($eventimgbnn) ? $eventimgbnn : '';?>">
                                        <img src="../uploads/events/<?php echo isset($eventimgbnn) ? $eventimgbnn : '';?>" width="70"> <?php echo isset($eventimgbnn) ? $eventimgbnn : '';?>
                                        <br>
                                        <span class="colorprimary">Image size is (width)665x325(height)</span>
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
                    <input type="submit" value="Update" class="btn btn-success" name="eventupdate">
            <?php 
                }
                else{
            ?>
                <input type="submit" value="Save" class="btn btn-success" name="eventsave">
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
