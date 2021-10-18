<?php 
    session_start();
    include '../conn.php'; 
    if(isset($_SESSION['useradmin']['status'])) {
      $sql2 = "SELECT * FROM counter    ";
      $res = mysqli_query($conn,$sql2) or die($conn->error);
      if (mysqli_num_rows($res) >= 1 ) {
          while ($row = mysqli_fetch_assoc($res)) {

            $counter_count11 = $row['counter_count1'];
            $counter_title11 = $row['counter_title1'];
            $counter_count22 = $row['counter_count2'];
            $counter_title22 = $row['counter_title2'];
            $counter_count33 = $row['counter_count3'];
            $counter_title33 = $row['counter_title3'];
            $counter_count44 = $row['counter_count4'];
            $counter_title44 = $row['counter_title4'];

    
          }  
      }
      if(isset($_POST['countsave'])) {
       
        $counter_count1 = stripslashes(mysqli_real_escape_string($conn,$_POST['count1']));
        $counter_title1 = stripslashes(mysqli_real_escape_string($conn,$_POST['counttitle1']));
        $counter_count2 = stripslashes(mysqli_real_escape_string($conn,$_POST['count2']));
        $counter_title2 = stripslashes(mysqli_real_escape_string($conn,$_POST['counttitle2']));
        $counter_count3 = stripslashes(mysqli_real_escape_string($conn,$_POST['count3']));
        $counter_title3 = stripslashes(mysqli_real_escape_string($conn,$_POST['counttitle3']));
        $counter_count4 = stripslashes(mysqli_real_escape_string($conn,$_POST['count4']));
        $counter_title4 = stripslashes(mysqli_real_escape_string($conn,$_POST['counttitle4']));
       
          if (mysqli_num_rows($res) < 1 ) {
            echo "insert";
            $sql = 'INSERT INTO counter (counter_count1, counter_title1, counter_count2, counter_title2, counter_count3, counter_title3, counter_count4, counter_title4) VALUES ("'.$counter_count1.'", "'.$counter_title1.'", "'.$counter_count2.'", "'.$counter_title2.'", "'.$counter_count3.'", "'.$counter_title3.'", "'.$counter_count4.'", "'.$counter_title4.'")';

            if ($conn->query($sql) === TRUE) {
              $_SESSION['fileupload']['inserted'] = '<div style="color:green;font-size:14px;text-align:center;">Recod Inserted.</div>';
            }
            else{
              echo $conn->error;
              $_SESSION['fileupload']['inserted'] = '<div style="color:red;font-size:14px;text-align:center;">Something went wrong!</div>';
            }
          }
          else {

            $counter_count12 = stripslashes(mysqli_real_escape_string($conn,$_POST['count1']));
            $counter_title12 = stripslashes(mysqli_real_escape_string($conn,$_POST['counttitle1']));
            $counter_count22 = stripslashes(mysqli_real_escape_string($conn,$_POST['count2']));
            $counter_title22 = stripslashes(mysqli_real_escape_string($conn,$_POST['counttitle2']));
            $counter_count32 = stripslashes(mysqli_real_escape_string($conn,$_POST['count3']));
            $counter_title32 = stripslashes(mysqli_real_escape_string($conn,$_POST['counttitle3']));
            $counter_count42 = stripslashes(mysqli_real_escape_string($conn,$_POST['count4']));
            $counter_title42 = stripslashes(mysqli_real_escape_string($conn,$_POST['counttitle4']));

            $sql3 = 'UPDATE counter SET	counter_count1="'.$counter_count12.'", counter_title1="'.$counter_title12.'", counter_count2="'.$counter_count22.'", counter_title2="'.$counter_title22.'", counter_count3="'.$counter_count32.'", counter_title3="'.$counter_title32.'", counter_count4="'.$counter_count42.'", counter_title4="'.$counter_title42.'"';

            if ($conn->query($sql3) === TRUE) {
              $_SESSION['fileupload']['inserted'] = '<div style="color:green;font-size:14px;text-align:center;">Recod Updated.</div>';
            }
            else{
              echo $conn->error;
              $_SESSION['fileupload']['inserted'] = '<div style="color:red;font-size:14px;text-align:center;">Something went wrong!</div>';
            }
          }
        }
      include 'header.php';
?>

        <div id="content">
          <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> <a href="#" class="">Homepage</a> <a href="#" class="current">Acheivements</a> </div>
            <h1>Acheivements</h1>
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
                      <h5>Home Acheivements</h5>
                    </div>
                    <div class="widget-content nopadding">
                      <div class="control-group">
                          <label class="control-label">Counter1 Count</label>
                          <div class="controls">
                              <input type="text" id="title" name="count1"  value="<?php echo isset($counter_count11) ? $counter_count11 : '' ?>" required>
                          </div>
                      </div>
                      <div class="control-group">
                          <label class="control-label">Counter1 Title</label>
                          <div class="controls">
                              <input type="text" id="title" name="counttitle1"  value="<?php echo isset($counter_title11) ? $counter_title11 : '' ?>" required>
                          </div>
                      </div>
                      <div class="control-group">
                          <label class="control-label">Counter2 Count</label>
                          <div class="controls">
                              <input type="text" id="title" name="count2"  value="<?php echo isset($counter_count22) ? $counter_count22 : '' ?>" required>
                          </div>
                      </div>
                      <div class="control-group">
                          <label class="control-label">Counter2 Title</label>
                          <div class="controls">
                              <input type="text" id="title" name="counttitle2"  value="<?php echo isset($counter_title22) ? $counter_title22 : '' ?>" required>
                          </div>
                      </div> 
                      <div class="control-group">
                          <label class="control-label">Counter3 Count</label>
                          <div class="controls">
                              <input type="text" id="title" name="count3"  value="<?php echo isset($counter_count33) ? $counter_count33 : '' ?>" required>
                          </div>
                      </div>
                      <div class="control-group">
                          <label class="control-label">Counter3 Title</label>
                          <div class="controls">
                              <input type="text" id="title" name="counttitle3"  value="<?php echo isset($counter_title33) ? $counter_title33 : '' ?>" required>
                          </div>
                      </div> 
                      <div class="control-group">
                          <label class="control-label">Counter4 Count</label>
                          <div class="controls">
                              <input type="text" id="title" name="count4"  value="<?php echo isset($counter_count44) ? $counter_count44 : '' ?>" required>
                          </div>
                      </div>
                      <div class="control-group">
                          <label class="control-label">Counter4 Title</label>
                          <div class="controls">
                              <input type="text" id="title" name="counttitle4"  value="<?php echo isset($counter_title44) ? $counter_title44 : '' ?>" required>
                          </div>
                      </div>                                            
                    </div>
                  </div>
                </div>
              </div> 
              <div class="form-actions">
                <input type="submit" value="Save" class="btn btn-success" name="countsave">
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
