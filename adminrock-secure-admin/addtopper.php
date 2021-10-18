<?php 
    session_start();
    include '../conn.php'; 
    if(isset($_SESSION['useradmin']['status'])) {
        
        //Edit partner
        if(isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == 'edit') {
            $did = $_GET['id'];
            $del = "SELECT * FROM partners WHERE id='$did'";
            $res = mysqli_query($conn,$del) or die($conn->error);
            while ($row = mysqli_fetch_assoc($res)) { 
                $prtnrid  = $row['id'];
                $prtnrname  = $row['name'];
                $prtnrimg  = $row['prtnr_img'];
                $prtnrurl  = $row['prtnr_url'];
            }
            
        }
        //add partner
      if(isset($_POST['addpartner'])) {
        $prtnr_name = $_POST['prtnr_name'];
        $prtnr_url = $_POST['prtnr_url'];
        $prtnr_img =  $_FILES['prtnr_img']['name'];

        if(empty($prtnr_name) || empty(basename( $_FILES['prtnr_img']['name']))) {
          $_SESSION['fileupload']['error'] = '<div style="font-size:14px;color:red;text-align:center;">Both fields are required.</div>';
        }
        else {
          unset( $_SESSION['fileupload']['error']);
          $target_path = "../uploads/partners/";  
          $target_path = $target_path.basename( $_FILES['prtnr_img']['name']);   
          if(move_uploaded_file($_FILES['prtnr_img']['tmp_name'], $target_path)) {  
            $_SESSION['fileupload']['uploaded'] = '<div style="color:green;font-size:14px;text-align:center;">File uploaded successfully!</div>';  
          } else{  
            $_SESSION['fileupload']['uploaded'] = "Sorry, file not uploaded, please try again!";  
          } 
          $sql = "INSERT INTO partners (name, prtnr_img, prtnr_url) VALUES ('$prtnr_name', '$prtnr_img', '$prtnr_url')";

          if ($conn->query($sql) === TRUE) {
             $_SESSION['fileupload']['inserted'] = '<div style="color:green;font-size:14px;text-align:center;">Recod Inserted.</div>';
          }
          else{
            $_SESSION['fileupload']['inserted'] = '<div style="color:red;font-size:14px;text-align:center;">Something went wrong!</div>';
          }
        }
      }
      elseif(isset($_POST['updatepartner'])) {
        $prtnr_name1 = $_POST['prtnr_name'];
        $prtnr_url1 = $_POST['prtnr_url'];
        $prtnr_id = $_POST['prtnr_id'];
        $prtnr_img1 =  $_FILES['prtnr_img']['name'];

        if($_FILES['prtnr_img']['name'] == '') {
          $prtnr_img1 =  $_POST['prtnr_img1'];
        }
        else {
          unset( $_SESSION['fileupload']['error']);
          $target_path = "../uploads/partners/";  
          $target_path = $target_path.basename( $_FILES['prtnr_img']['name']);   
          if(move_uploaded_file($_FILES['prtnr_img']['tmp_name'], $target_path)) {  
            $prtnr_img1 =  $_FILES['prtnr_img']['name'];
            $_SESSION['fileupload']['uploaded'] = '<div style="color:green;font-size:14px;text-align:center;">File uploaded successfully!</div>';  
          } else{  
            $_SESSION['fileupload']['uploaded'] = "Sorry, file not uploaded, please try again!";  
          }
        } 
        $sql = "UPDATE partners SET name='$prtnr_name1', prtnr_img='$prtnr_img1', prtnr_url='$prtnr_url1' WHERE id='$prtnr_id'";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['fileupload']['inserted'] = '<div style="color:green;font-size:14px;text-align:center;">Recod Inserted.</div>';
        }
        else{
          $_SESSION['fileupload']['inserted'] = '<div style="color:red;font-size:14px;text-align:center;">Something went wrong!</div>';
        }
      }
?>
        <?php include 'header.php'; ?>
        <div id="content">
          <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> <a href="#" class="current">Add Partner</a> </div>
            <h1>Add Partner</h1>
          </div>
          <div class="container-fluid"><hr>
            <div class="row-fluid">
              <div class="span12">
                <div class="widget-box">
                  <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Partner</h5>
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
                        <label class="control-label">Partner Name</label>
                        <div class="controls">
                        <input type="text" name="prtnr_name" id="text" value="<?php echo isset($prtnrname) ? $prtnrname : '';?>" required>
                        <input type="hidden" value="<?php echo isset($prtnrid) ?$prtnrid :'';?>" name="prtnr_id">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Partner Image</label>
                        <div class="controls">
                          <input type="file" name="prtnr_img" id="file" required>
                          <input type="hidden" name="prtnr_img1" id="file" value="<?php echo isset( $prtnrimg) ? $prtnrimg : '';?>" required>
                          <img src="../uploads/partners/<?php echo isset( $prtnrimg) ? $prtnrimg : '';?>" width="50"> 
                                <br>
                                <span class="colorprimary">Image size is (width)540x520(height)</span>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Partner Link</label>
                        <div class="controls">
                          <input type="text" name="prtnr_url" id="url" value="<?php echo isset($prtnrurl) ? $prtnrurl : '';?>" required>
                        </div>
                      </div>
                      <div class="form-actions">
                      <?php 
                          if(isset($_GET['action']) && $_GET['action'] == 'edit') {
                      ?>
                            <input type="submit" value="Update" class="btn btn-success" name="updatepartner">
                      <?php
                          }
                          else { ?>
                            <input type="submit" value="Save" class="btn btn-success" name="addpartner">
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
