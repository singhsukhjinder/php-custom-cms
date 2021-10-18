<?php 
    session_start();
    include '../conn.php'; 
    if(isset($_SESSION['useradmin']['status'])) {

      if(isset($_POST['uploadsyllabus'])) {
        $class = $_POST['classsl'];
        $filename =  $_FILES['syllabus']['name'];

        if(empty($class) || empty(basename( $_FILES['syllabus']['name']))) {
          $_SESSION['fileupload']['error'] = '<div style="font-size:14px;color:red;text-align:center;">Both fields are required.</div>';
        }
        else {
          unset( $_SESSION['fileupload']['error']);
          $target_path = "uploads/";  
          $target_path = $target_path.basename( $_FILES['syllabus']['name']);   
          if(move_uploaded_file($_FILES['syllabus']['tmp_name'], $target_path)) {  
            $_SESSION['fileupload']['uploaded'] = '<div style="color:green;font-size:14px;text-align:center;">File uploaded successfully!</div>';  
          } else{  
            $_SESSION['fileupload']['uploaded'] = "Sorry, file not uploaded, please try again!";  
          } 
          $sql = "INSERT INTO syllabus (class, filename, uploaded_at) VALUES ('$class', '$filename', NOW())";

          if ($conn->query($sql) === TRUE) {
             $_SESSION['fileupload']['inserted'] = '<div style="color:green;font-size:14px;text-align:center;">Recod Inserted.</div>';
          }
          else{
            $_SESSION['fileupload']['inserted'] = '<div style="color:red;font-size:14px;text-align:center;">Something went wrong!</div>';
          }
        }
      }
?>
        <?php include 'header.php'; ?>
        <div id="content">
          <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> <a href="#" class="current">Add Syllabus</a> </div>
            <h1>Add Syllabus</h1>
          </div>
          <div class="container-fluid"><hr>
            <div class="row-fluid">
              <div class="span12">
                <div class="widget-box">
                  <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Syllabus</h5>
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
                        <label class="control-label">Class</label>
                        <div class="controls">
                          <select name="classsl" id="classsl" required>
                            <option>Select class</option>
                            <option value="9th">9th</option>
                            <option value="10th">10th</option>
                            <option value="11th">11th</option>                            
                            <option value="12th">12th</option>
                          </select>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">File</label>
                        <div class="controls">
                          <input type="file" name="syllabus" id="file" required>
                        </div>
                      </div>
                      <div class="form-actions">
                        <input type="submit" value="Save" class="btn btn-success" name="uploadsyllabus">
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
        <script>location.href = '/studyrock/adminrock-secure-admin/index.php';</script>
<?php
    }
