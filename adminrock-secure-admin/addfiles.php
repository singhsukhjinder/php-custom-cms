<?php 
    session_start();
    include '../conn.php'; 
    if(isset($_SESSION['useradmin']['status'])) {

        if(isset($_POST['addfiles'])) {

            $class = $_POST['class'];
            $subject = $_POST['subject'];
            $stdmtrplc = $_FILES['stdmtrplc']['name'];
            $stdmtrfls = $_FILES['stdmtrfls']['name'];
            
            if(($class != 'Select Class' || $subject != 'Select Subject') & ($stdmtrplc != '' & $stdmtrfls != '')) {
                if($class == '9th' || $class == '10th' || $class == '11th' || $class == '12th') {
                $target_path = "../uploads/class".$class."/";  
                }
                else {
                    $target_path = "../uploads/".$class."/";
                }
                
                $filename1 = $_FILES['stdmtrplc']['name'];
                $target_pathst = $target_path.basename( $_FILES['stdmtrplc']['name']);   
                if(move_uploaded_file($_FILES['stdmtrplc']['tmp_name'], $target_pathst)) {  
                    $_SESSION['fileupload']['uploaded'] = '<div style="color:green;font-size:14px;text-align:center;">File uploaded successfully!</div>';  
                } else{  
                    $_SESSION['fileupload']['uploaded'] = "Sorry, file not uploaded, please try again!";  
                }

                $filename = $_FILES['stdmtrfls']['name'];
                $target_pathst1 = $target_path.basename( $_FILES['stdmtrfls']['name']);   
                if(move_uploaded_file($_FILES['stdmtrfls']['tmp_name'], $target_pathst1)) {  
                    $_SESSION['fileupload']['uploaded'] = '<div style="color:green;font-size:14px;text-align:center;">File uploaded successfully!</div>';  
                } else{  
                    $_SESSION['fileupload']['uploaded'] = "Sorry, file not uploaded, please try again!";  
                }

                $sql = 'INSERT INTO syllabus (class, subject, filename, placehldrimg, uploaded_at) VALUES ("'.$class.'", "'.$subject.'", "'.$filename .'" ,"'.$filename1.'", NOW())';
    
                if ($conn->query($sql) === TRUE) {
                    $_SESSION['fileupload']['inserted'] = '<div style="color:green;font-size:14px;text-align:center;">Recod Inserted.</div>';
                }
                else{
                    echo $conn->error;
                    $_SESSION['fileupload']['inserted'] = '<div style="color:red;font-size:14px;text-align:center;">Something went wrong!</div>';
                }
                  
            }
            else {
                $_SESSION['fileupload']['inserted'] = '<div style="color:red;font-size:14px;text-align:center;">Both fields are required!</div>';
            }
        }
        include 'header.php';
?>

        <div id="content">
            <div id="content-header">
                <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> <a href="#" class="">Files</a> <a href="#" class="current">Add Files</a> </div>
                <h1>Add Files</h1>
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
                                    <label class="control-label">Classes</label>
                                    <div class="controls">
                                    <select name="class">
                                            <option>Select Class</option>
                                            <option value="9th">9th</option>
                                            <option value="10th">10th</option>
                                            <option value="11th">11th</option>
                                            <option value="12th">12th</option>
                                            <option value="commerce">Commerce</option>
                                            <option value="cbse">CBSE</option>
                                            <option value="icse">ICSE</option>
                                            <option value="jeeadvance">JEE ANDVANCE</option>
                                            <option value="jeemain">JEE MAIN</option>
                                            <option value="neet">NEET</option>
                                            <option value="ncert">NCERT</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Subjects</label>
                                    <div class="controls">
                                        <select name="subject">
                                            <option>Select Subject</option>
      										<option value="mathematics">Mathematics</option>
                                            <option value="mathematics-standard">Mathematics Standard</option>
                                            <option value="science">Science</option>
                                            <option value="social-science">Social Science</option>
                                            <option value="chemistry">English</option>
											<option value="commerce">Commerce</option>
                                            <option value="business-studies">Business Studies</option>
                                            <option value="accounts">Accounts</option>
                                            <option value="economics">Economics</option>
                                            <option value="physics">Physics</option>
                                            <option value="chemistry">Chemistry</option>
											<option value="biology">Biology</option>
                                            <option value="botany">Botany</option>
                                            <option value="zoology">Zoology</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Image</label>
                                    <div class="controls">
                                        <input type="file" id="file" name="stdmtrplc" required><br>
                                        <span class="colorprimary">Image size is (width)125x125(height)</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Syllabus File</label>
                                    <div class="controls">
                                        <input type="file" id="file" name="stdmtrfls" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <input type="submit" value="Save" class="btn btn-success" name="addfiles">
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
