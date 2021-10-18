<?php 
    session_start();
    include '../conn.php'; 
    if(isset($_SESSION['useradmin']['status'])) {
      $sql2 = "SELECT * FROM homeabout";
      $res = mysqli_query($conn,$sql2) or die($conn->error);
      if (mysqli_num_rows($res) >= 1 ) {
          while ($row = mysqli_fetch_assoc($res)) {
           
            $hmabtitle = $row['title'];
            $hmabdesc = $row['description'];
            $hmabname = $row['name'];
            $hmabstudy = $row['study'];
            $hmabposition = $row['position'];
            $hmabphoto = $row['photo'];
          
            
          }  
      }
      if(isset($_POST['homeaboutsave'])) {
       
        
        $hmabtitle1 = stripslashes(mysqli_real_escape_string($conn,$_POST['hmabtitle']));
        $hmabdesc1 = stripslashes(mysqli_real_escape_string($conn,$_POST['hmabdesc']));
        $hmabname1 = stripslashes(mysqli_real_escape_string($conn,$_POST['hmabname']));
        $hmabstudy1 = stripslashes(mysqli_real_escape_string($conn,$_POST['hmabstudy']));
        $hmabposition1 = stripslashes(mysqli_real_escape_string($conn,$_POST['hmabposition']));
        $hmabphoto1 = $_FILES['hmabpht']['name'];
       

        if(!empty($hmabtitle1)) {
          $target_path = "../uploads/";  
          
          //our story
          if($_FILES['hmabpht']['name'] !='') {
          $scnst_filename = $_FILES['hmabpht']['name'];
          $target_pathst = $target_path.basename( $_FILES['hmabpht']['name']);   
          if(move_uploaded_file($_FILES['hmabpht']['tmp_name'], $target_pathst)) {  
            $_SESSION['fileupload']['uploaded'] = '<div style="color:green;font-size:14px;text-align:center;">File uploaded successfully!</div>';  
          } else{  
            $_SESSION['fileupload']['uploaded'] = "Sorry, file not uploaded, please try again!";  
          }
          }
          else {
            $hmabphoto1 = $_POST['hmabpht1'];
          }

          if (mysqli_num_rows($res) < 1 ) {
            echo "insert";
            $sql = 'INSERT INTO homeabout (	title, description, name, study, position, photo) VALUES ("'.$hmabtitle1.'", "'.$hmabdesc1.'", "'.$hmabname1.'", "'.$hmabstudy1.'", "'.$hmabposition1.'", "'.$hmabphoto1.'")';

            if ($conn->query($sql) === TRUE) {
              $_SESSION['fileupload']['inserted'] = '<div style="color:green;font-size:14px;text-align:center;">Recod Inserted.</div>';
            }
            else{
              echo $conn->error;
              $_SESSION['fileupload']['inserted'] = '<div style="color:red;font-size:14px;text-align:center;">Something went wrong!</div>';
            }
          }
          else{
            echo 'update';
            $sql3 = 'UPDATE homeabout SET	title="'.$hmabtitle1.'", description="'.$hmabdesc1.'", name="'.$hmabname1.'", study="'.$hmabstudy1.'", position="'.$hmabposition1.'", photo="'.$hmabphoto1.'"';

            if ($conn->query($sql3) === TRUE) {
              $_SESSION['fileupload']['inserted'] = '<div style="color:green;font-size:14px;text-align:center;">Recod updates.</div>';
            }
            else{
              echo $conn->error;
              $_SESSION['fileupload']['inserted'] = '<div style="color:red;font-size:14px;text-align:center;">Something went wrong!</div>';
            }
          }
        }
      }
      include 'header.php';
?>

        <div id="content">
          <div id="content-header">
            <div id="breadcrumb"> <a href="" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> <a href="#" class="">Homepage</a> <a href="#" class="current">About us</a> </div>
            <h1>About us</h1>
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
              
              <!-- our story section -->
              <div class="row-fluid">
                <div class="span12">
                  <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> 
                      <i class="icon-info-sign"></i> </span>
                      <h5>About us</h5>
                    </div>
                    <div class="widget-content nopadding">
                      <div class="control-group">
                          <label class="control-label">Title</label>
                          <div class="controls">
                              <input type="text" id="title" name="hmabtitle"  value="<?php echo isset($hmabtitle) ? $hmabtitle : '' ?>" required>
                          </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Description</label>
                          <div class="controls">
                              <textarea class="textarea_editor_st span12" rows="6" placeholder="Enter text ..." name="hmabdesc"><?php echo isset($hmabdesc) ? $hmabdesc : '' ?></textarea>
                          </div>
                      </div>
                      
                      <div class="control-group">
                          <label class="control-label">Name</label>
                          <div class="controls">
                              <input type="text" id="title" name="hmabname"  value="<?php echo isset($hmabname) ? $hmabname : '' ?>" required>
                          </div>
                      </div>
                      <div class="control-group">
                          <label class="control-label">Education</label>
                          <div class="controls">
                              <input type="text" id="title" name="hmabstudy"  value="<?php echo isset($hmabstudy) ? $hmabstudy : '' ?>" required>
                          </div>
                      </div>
                      <div class="control-group">
                          <label class="control-label">Position</label>
                          <div class="controls">
                              <input type="text" id="title" name="hmabposition"  value="<?php echo isset($hmabposition) ? $hmabposition : '' ?>" required>
                          </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Image</label>
                        <div class="controls">
                          <input type="file" id="file" name="hmabpht" required>
                          <input type="hidden" id="file" name="hmabpht1" value="<?php echo isset($hmabphoto) ? $hmabphoto : '';?>">
                          <img src="../uploads/<?php echo isset($hmabphoto) ? $hmabphoto : '';?>" width="70"> <?php echo isset($hmabphoto) ? $hmabphoto : '';?>
                                <br>
                                <span class="colorprimary">Image size is (width)750x750(height)</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Save" class="btn btn-success" name="homeaboutsave">
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
            $('.textarea_editor_class9').wysihtml5();
        </script>
        <?php include 'footer.php'; ?>
        <script>
          $('.textarea_editor_st').wysihtml5();
          $('.textarea_editor_ms').wysihtml5();
          $('.textarea_editor_of').wysihtml5();
          $('.textarea_editor_ass').wysihtml5();
          $('.textarea_editor_ass1').wysihtml5();
          $('.textarea_editor_ass2').wysihtml5();
          $('.textarea_editor_ass3').wysihtml5();
          
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
