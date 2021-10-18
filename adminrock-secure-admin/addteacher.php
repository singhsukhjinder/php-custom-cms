<?php 
    session_start();
    include '../conn.php'; 
    if(isset($_SESSION['useradmin']['status'])) {
        
        //Edit teacher
        if(isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == 'edit') {
            $did = $_GET['id'];
            $updt = "SELECT * FROM teachers WHERE id='$did'";
            $res = mysqli_query($conn,$updt) or die($conn->error);
            while ($row = mysqli_fetch_assoc($res)) { 
                print_r($row );
                $teacherid  = $row['id'];
                $teachername = $row['teacher_name'];
                $teachfld = $row['teacher_field'];
                $teachlkdn = $row['teacher_inked'];
                $teachgpls = $row['teacher_gpls'];
                $teachtwt = $row['teacher_twt'];
                $teachfb = $row['teacher_fb'];
                $teacherimg =  $row['teacher_img'];
            }            
        }

        //Delete teacher
        if(isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == 'delete') {
            $did = $_GET['id'];
            $delt = "DELETE * FROM teachers WHERE id='$did'";
            $res = mysqli_query($conn,$delt) or die($conn->error);
            if ($conn->query($sql) === TRUE) {
                $_SESSION['fileupload']['inserted'] = '<div style="color:green;font-size:14px;text-align:center;">Recod Deleted.</div>';
             }
             else{
               $_SESSION['fileupload']['inserted'] = '<div style="color:red;font-size:14px;text-align:center;">Something went wrong!</div>';
             }
            
        }

    //add partner
      if(isset($_POST['addteacher'])) {
        $teacher_name = $_POST['teacher_name'];
        $teach_fld = $_POST['teach_fld'];
        $teach_lkdn = $_POST['teach_lkdn'];
        $teach_gpls = $_POST['teach_gpls'];
        $teach_twt = $_POST['teach_twt'];
        $teach_fb = $_POST['teach_fb'];
        $teacher_img =  $_FILES['teacher_img']['name'];

        if(empty($teacher_name) || empty(basename( $_FILES['teacher_img']['name']))) {
          $_SESSION['fileupload']['error'] = '<div style="font-size:14px;color:red;text-align:center;">Both fields are required.</div>';
        }
        else {
          unset( $_SESSION['fileupload']['error']);
          $target_path = "../uploads/teachers/";  
          $target_path = $target_path.basename($_FILES['teacher_img']['name']);  
          if(move_uploaded_file($_FILES['teacher_img']['tmp_name'], $target_path)) {  
            $_SESSION['fileupload']['uploaded'] = '<div style="color:green;font-size:14px;text-align:center;">File uploaded successfully!</div>';  
          } else{  
            $_SESSION['fileupload']['uploaded'] = "Sorry, file not uploaded, please try again!".$_FILES["teacher_img"]["error"];  
          } 
          $sql = "INSERT INTO teachers (teacher_name, teacher_img, teacher_fb, teacher_twt, teacher_gpls, teacher_inked, teacher_field) VALUES ('$teacher_name', '$teacher_img', '$teach_fb', '$teach_twt', '$teach_gpls', '$teach_lkdn', '$teach_fld')";

          if ($conn->query($sql) === TRUE) {
             $_SESSION['fileupload']['inserted'] = '<div style="color:green;font-size:14px;text-align:center;">Recod Inserted.</div>';
          }
          else{
            $_SESSION['fileupload']['inserted'] = '<div style="color:red;font-size:14px;text-align:center;">Something went wrong!</div>';
          }
        }
      }

      //update teacher
      if(isset($_POST['updateteacher'])) {
        $teacher_name = $_POST['teacher_name'];
        $teach_fld = $_POST['teach_fld'];
        $teach_lkdn = $_POST['teach_lkdn'];
        $teach_gpls = $_POST['teach_gpls'];
        $teach_twt = $_POST['teach_twt'];
        $teach_fb = $_POST['teach_fb'];
        $teacher_id = $_POST['teacherid'];
        $teacher_img =  $_FILES['teacher_img']['name'];

        if($_FILES['teacher_img']['name'] == '') {
            $teacher_img = $_POST['teach_img1'];
        }
        else {
          unset( $_SESSION['fileupload']['error']);
          $target_path = "../uploads/teachers/";  
          $target_path = $target_path.basename($_FILES['teacher_img']['name']);  
          echo $target_path; 
          if(move_uploaded_file($_FILES['teacher_img']['tmp_name'], $target_path)) {  
            $_SESSION['fileupload']['uploaded'] = '<div style="color:green;font-size:14px;text-align:center;">File uploaded successfully!</div>';  
          } else{  
            $_SESSION['fileupload']['uploaded'] = "Sorry, file not uploaded, please try again!".$_FILES["teacher_img"]["error"];  
          } 
        }
        $sql = "UPDATE teachers SET teacher_name='$teacher_name', teacher_img='$teacher_img', teacher_fb='$teach_fb', teacher_twt='$teach_twt', teacher_gpls='$teach_gpls', teacher_inked='$teach_lkdn', teacher_field='$teach_fld' WHERE id='$teacher_id'";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['fileupload']['inserted'] = '<div style="color:green;font-size:14px;text-align:center;">Recod Updated.</div>';
        }
        else{
          $_SESSION['fileupload']['inserted'] = '<div style="color:red;font-size:14px;text-align:center;">Something went wrong!</div>';
        }
      }
?>
        <?php include 'header.php'; ?>
        <div id="content">
          <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> <a href="#" class="">Teachers</a> <a href="#" class="current">Add Teacher</a> </div>
            <h1>Add Teacher</h1>
          </div>
          <div class="container-fluid"><hr>
            <div class="row-fluid">
              <div class="span12">
                <div class="widget-box">
                  <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Teacher</h5>
                  </div>
                  <div class="widget-content nopadding">
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
                      <div class="control-group">
                        <label class="control-label">Teacher Name</label>
                        <div class="controls">
                        <input type="text" name="teacher_name" id="text" value="<?php echo isset($teachername) ? $teachername : '';?>" required>
                        <input type="hidden" name="teacherid" value="<?php echo $teacherid ;?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Teacher Image</label>
                        <div class="controls">
                          <input type="file" name="teacher_img" id="file" required>
                          <input type="hidden" name="teach_img1" id="file" value="<?php echo $teacherimg; ?>"required>
                          <img src="../uploads/teachers/<?php echo isset($teacherimg) ? $teacherimg : ''; ?>" width="30"><?php echo isset($teacherimg) ? $teacherimg : ''; ?>
                                <br>
                                <span class="colorprimary">Image size is (width)640x1070(height)</span>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Teaching Field</label>
                        <div class="controls">
                          <input type="text" name="teach_fld" id="url" value="<?php echo isset($teachfld) ? $teachfld : '';?>" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Linkedin</label>
                        <div class="controls">
                          <input type="text" name="teach_lkdn" id="url" value="<?php echo isset($teachlkdn) ? $teachlkdn : '';?>" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Google Plus</label>
                        <div class="controls">
                          <input type="text" name="teach_gpls" id="url" value="<?php echo isset($teachgpls) ? $teachgpls : '';?>" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Twitter</label>
                        <div class="controls">
                          <input type="text" name="teach_twt" id="url" value="<?php echo isset($teachtwt) ? $teachtwt : '';?>" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Facebook</label>
                        <div class="controls">
                          <input type="text" name="teach_fb" id="url" value="<?php echo isset($teachfb) ? $teachfb : '';?>" required>
                        </div>
                      </div>
                      <div class="form-actions">
                            <?php 
                                if(isset($_GET['action']) && $_GET['action'] == 'edit') {
                            ?>
                                  <input type="submit" value="Update" class="btn btn-success" name="updateteacher">
                            <?php
                                }
                                else { ?>
                                  <input type="submit" value="Save" class="btn btn-success" name="addteacher">
                            <?php 
                                } 
                            ?>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
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
