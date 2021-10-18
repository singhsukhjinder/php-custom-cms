<?php 
    session_start();
    include '../conn.php'; 
    if(isset($_SESSION['useradmin']['status'])) {
      $sql2 = "SELECT * FROM aboutus";
      $res = mysqli_query($conn,$sql2) or die($conn->error);
      if (mysqli_num_rows($res) >= 1 ) {
          while ($row = mysqli_fetch_row($res)) {
            //our story
            $scnst_title = $row[1];
            $scnst_desc = $row[2];
            $scnsth_file = $row[3];
          
            //our mission
            $scnms_title = $row[4];
            $scnms_desc = $row[5];
            $scnmsh_file = $row[6];
            $scnmsh_file1 = $row[7];

            //what we offer
            $scnof_title = $row[8];
            $scnof_desc = $row[9];
            $scnofh_file = $row[10];
            
            
            //join us
            $scnjn_title = $row[11];
            $scnjn_desc = $row[12];
            $scnjn_btntitle = $row[13];
            $scnjn_btnlink = $row[14];
            
            //our assosiates
            $scnas_title = $row[15];
            $scnass_desc = $row[16];
            $scnassh_file =$row[17];

            $scnas1_title = $row[18];
            $scnass1_desc = $row[19];
            $scnassh1_file =$row[20];

            $scnas2_title = $row[21];
            $scnass2_desc = $row[22];
            $scnassh2_file =$row[23];

            $scnas3_title = $row[24];
            $scnass3_desc = $row[25];
            $scnassh3_file =$row[26];
          }  
      }
      if(isset($_POST['aboutussave'])) {
       
        //our story
        $scnst_title = stripslashes(mysqli_real_escape_string($conn,$_POST['scnst-title']));
        $scnst_desc = stripslashes(mysqli_real_escape_string($conn,$_POST['scnst-desc']));
        //$scnst_file = $_FILES['scnst-file']['name'];
       
        //our mission
        $scnms_title = stripslashes(mysqli_real_escape_string($conn,$_POST['scnms-title']));
        $scnms_desc = stripslashes(mysqli_real_escape_string($conn,$_POST['scnms-desc']));
        //$scnms_file = $_FILES['scnms-file']['name'];
        //$scnms_file1 = $_FILES['scnms-file'1]['name'];

        //what we offer
        $scnof_title = stripslashes(mysqli_real_escape_string($conn,$_POST['scnof-title']));
        $scnof_desc = stripslashes(mysqli_real_escape_string($conn,$_POST['scnof-desc']));
        //$scnof_file = $_FILES['scnof-file']['name'];
        
        
        //join us
        $scnjn_title = stripslashes(mysqli_real_escape_string($conn,$_POST['scnjn-title']));
        $scnjn_desc = stripslashes(mysqli_real_escape_string($conn,$_POST['scnjn-desc']));
        $scnjn_btntitle = stripslashes(mysqli_real_escape_string($conn,$_POST['scnjn-btntitle']));
        $scnjn_btnlink = stripslashes(mysqli_real_escape_string($conn,$_POST['scnjn-btnlink']));
        
        //our assosiates
        $scnas_title = stripslashes(mysqli_real_escape_string($conn,$_POST['scnas-title']));
        $scnass_desc = stripslashes(mysqli_real_escape_string($conn,$_POST['scnass-desc']));
        //$scnass_file =$_POST['scnass-file']['name'];

        $scnas1_title = stripslashes(mysqli_real_escape_string($conn,$_POST['scnas1-title']));
        $scnass1_desc = stripslashes($_POST['scnass1-desc']);
        //$scnass1_file =$_POST['scnass1-file']['name'];

        $scnas2_title = stripslashes(mysqli_real_escape_string($conn,$_POST['scnas2-title']));
        $scnass2_desc = stripslashes(mysqli_real_escape_string($conn,$_POST['scnass2-desc']));
       // $scnass2_file =$_POST['scncass2-file']['name'];

        $scnas3_title = stripslashes(mysqli_real_escape_string($conn,$_POST['scnas3-title']));
        $scnass3_desc = stripslashes(mysqli_real_escape_string($conn,$_POST['scnass3-desc']));
        //$sncass3_file =$_POST['scnass3-file']['name'];

        //$filename =  $_FILES['syllabus']['name'];

        if(!empty($scnst_title)) {
          $target_path = "../uploads/";  
          
          //our story
          if($_FILES['scnst-file']['name'] !='') {
          $scnst_filename = $_FILES['scnst-file']['name'];
          $target_pathst = $target_path.basename( $_FILES['scnst-file']['name']);   
          if(move_uploaded_file($_FILES['scnst-file']['tmp_name'], $target_pathst)) {  
            $_SESSION['fileupload']['uploaded'] = '<div style="color:green;font-size:14px;text-align:center;">File uploaded successfully!</div>';  
          } else{  
            $_SESSION['fileupload']['uploaded'] = "Sorry, file not uploaded, please try again!";  
          }
          }
          else {
            $scnst_filename = $_POST['scnsth-file'];
          }

          //our mission
          if($_FILES['scnms-file']['name'] != '') {
            $scnms_filename = $_FILES['scnms-file']['name'];
            $target_pathms = $target_path.basename( $_FILES['scnms-file']['name']);   
            if(move_uploaded_file($_FILES['scnms-file']['tmp_name'], $target_pathms)) {     
              $_SESSION['fileupload']['uploaded'] = '<div style="color:green;font-size:14px;text-align:center;">File uploaded successfully!</div>';  
            } else{  
              $_SESSION['fileupload']['uploaded'] = "Sorry, file not uploaded, please try again!";  
            }
          }
          else {
            $scnms_filename = $_POST['scnmsh-file'];
          }

          if($_FILES['scnms-file1']['name'] != '') {
            $scnms_filename1 = $_FILES['scnms-file1']['name'];
            $target_pathms1 = $target_path.basename( $_FILES['scnms-file1']['name']);   
            if(move_uploaded_file($_FILES['scnms-file1']['tmp_name'], $target_pathms1)) {     
              $_SESSION['fileupload']['uploaded'] = '<div style="color:green;font-size:14px;text-align:center;">File uploaded successfully!</div>';  
            } else{  
              $_SESSION['fileupload']['uploaded'] = "Sorry, file not uploaded, please try again!";  
            }
          }
          else{
            $scnms_filename1 = $_POST['scnmsh-file1'];
          }
          
          //what we offer
          if ($_FILES['scnof-file']['name'] != '') {
            $scnof_filename = $_FILES['scnof-file']['name'];
            $target_pathof = $target_path.basename( $_FILES['scnof-file']['name']);   
            if(move_uploaded_file($_FILES['scnof-file']['tmp_name'], $target_pathof)) {  
              $_SESSION['fileupload']['uploaded'] = '<div style="color:green;font-size:14px;text-align:center;">File uploaded successfully!</div>';  
            } else{  
              $_SESSION['fileupload']['uploaded'] = "Sorry, file not uploaded, please try again!";  
            }
          }
          else {
            $scnof_filename = $_POST['scnofh-file'];
          }
          
          //our assosiates 
          if($_FILES['scnass-file']['name'] != '') { 
            $scnass_file = $_FILES['scnass-file']['name'];
            $target_pathct = $target_path.basename( $_FILES['scnass-file']['name']);   
            if(move_uploaded_file($_FILES['scnass-file']['tmp_name'], $target_pathct)) {
              $_SESSION['fileupload']['uploaded'] = '<div style="color:green;font-size:14px;text-align:center;">File uploaded successfully!</div>';  
            } else{  
              $_SESSION['fileupload']['uploaded'] = "Sorry, file not uploaded, please try again!";  
            }
          }
          else {
            $scnass_file = $_POST['scnassh-file'];
          }  

          if($_FILES['scnass1-file']['name'] != '') { 
          $scnass1_file = $_FILES['scnass1-file']['name'];
          $target_pathct1 = $target_path.basename( $_FILES['scnass1-file']['name']);   
          if(move_uploaded_file($_FILES['scnass1-file']['tmp_name'], $target_pathct1)) {
            $_SESSION['fileupload']['uploaded'] = '<div style="color:green;font-size:14px;text-align:center;">File uploaded successfully!</div>';  
          } else{  
            $_SESSION['fileupload']['uploaded'] = "Sorry, file not uploaded, please try again!";  
          }  
          }
          else {
            $scnass1_file = $_POST['scnassh1-file'];
          }

          if($_FILES['scnass2-file']['name'] != '') { 
            $scnass2_file = $_FILES['scnass2-file']['name'];
            $target_pathct2 = $target_path.basename( $_FILES['scnass2-file']['name']);   
            if(move_uploaded_file($_FILES['scnass2-file']['tmp_name'], $target_pathct2)) {
              $_SESSION['fileupload']['uploaded'] = '<div style="color:green;font-size:14px;text-align:center;">File uploaded successfully!</div>';  
            } else{  
              $_SESSION['fileupload']['uploaded'] = "Sorry, file not uploaded, please try again!";  
            }
          }
          else{
            $scnass2_file = $_POST['scnassh2-file'];
          }

          if($_FILES['scnass3-file']['name'] != '') { 
            $scnass3_file = $_FILES['scnass3-file']['name'];
            $target_pathct3 = $target_path.basename( $_FILES['scnass3-file']['name']);   
            if(move_uploaded_file($_FILES['scnass3-file']['tmp_name'], $target_pathct3)) {              
              $_SESSION['fileupload']['uploaded'] = '<div style="color:green;font-size:14px;text-align:center;">File uploaded successfully!</div>';  
            } else{  
              $_SESSION['fileupload']['uploaded'] = "Sorry, file not uploaded, please try again!";  
            }
          }
          else {
            $scnass3_file = $_POST['scnassh3-file'];
          }

          if (mysqli_num_rows($res) < 1 ) {
            echo "insert";
            $sql = 'INSERT INTO aboutus (	os_title, os_desc, os_img, ms_title, ms_desc, ms_img, ms_img1, wo_title, wo_desc, wo_img, jn_title, jn_desc, jn_bttitle, 	jn_btlink, uass_city1, uass_list1, uass_file1, uass_city2, uass_list2, uass_file2, uass_city3, uass_list3, uass_file3, uass_city4, uass_list4, uass_file4) VALUES ("'.$scnst_title.'", "'.$scnst_desc.'", "'.$scnst_filename.'", "'.$scnms_title.'", "'.$scnms_desc.'", "'.$scnms_filename.'", "'.$scnms_filename1.'", "'.$scnof_title.'", "'.$scnof_desc.'", "'.$scnof_filename.'", "'.$scnjn_title.'", "'.$scnjn_desc.'", "'.$scnjn_btntitle.'", "'.$scnjn_btnlink.'", "'.$scnas_title.'", "'.$scnass_desc.'", "'.$scnass_file.'", "'.$scnas1_title.'", "'.$scnass1_desc.'", "'.$scnass1_file.'", "'.$scnas2_title.'", "'.$scnass2_desc.'", "'.$scnass2_file.'", "'.$scnas3_title.'", "'.$scnass3_desc.'", "'.$scnass3_file.'")';

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
            $sql3 = 'UPDATE aboutus SET	os_title="'.$scnst_title.'", os_desc="'.$scnst_desc.'", os_img="'.$scnst_filename.'", ms_title="'.$scnms_title.'", ms_desc="'.$scnms_desc.'", ms_img="'.$scnms_filename.'", ms_img1= "'.$scnms_filename1.'", wo_title="'.$scnof_title.'", wo_desc="'.$scnof_desc.'", wo_img= "'.$scnof_filename.'", jn_title="'.$scnjn_title.'", jn_desc="'.$scnjn_desc.'", jn_bttitle="'.$scnjn_btntitle.'", jn_btlink="'.$scnjn_btnlink.'", uass_city1="'.$scnas_title.'", uass_list1="'.$scnass_desc.'", uass_file1="'.$scnass_file.'", uass_city2="'.$scnas1_title.'", uass_list2="'.$scnass1_desc.'", uass_file2="'.$scnass1_file.'", uass_city3="'.$scnas2_title.'", uass_list3="'.$scnass2_desc.'", uass_file3="'.$scnass2_file.'", uass_city4="'.$scnas3_title.'", uass_list4="'.$scnass3_desc.'"';

            if ($conn->query($sql3) === TRUE) {
              $_SESSION['fileupload']['inserted'] = '<div style="color:green;font-size:14px;text-align:center;">Recod Inserted.</div>';
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
            <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> <a href="#" class="current">About Us</a> </div>
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
                      <h5>Our Story</h5>
                    </div>
                    <div class="widget-content nopadding">
                      <div class="control-group">
                          <label class="control-label">Title</label>
                          <div class="controls">
                              <input type="text" id="title" name="scnst-title"  value="<?php echo isset($scnst_title) ? $scnst_title : '' ?>" required>
                          </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Description</label>
                          <div class="controls">
                              <textarea class="textarea_editor_st span12" rows="6" placeholder="Enter text ..." name="scnst-desc"><?php echo isset($scnst_desc) ? $scnst_desc : '' ?></textarea>
                          </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Image</label>
                        <div class="controls">
                          <input type="file" id="file" name="scnst-file" required>
                          <input type="hidden" id="file" name="scnsth-file" value="<?php echo isset($scnsth_file) ? $scnsth_file : '';?>">
                          <img src="../uploads/<?php echo isset($scnsth_file) ? $scnsth_file : '';?>" width="70"> <?php echo isset($scnsth_file) ? $scnsth_file : '';?>
                            <br>
                            <span class="colorprimary">Image size is (width)750x750(height)</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- our mission section -->
              <div class="row-fluid">
                <div class="span12">
                  <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> 
                      <i class="icon-info-sign"></i> </span>
                      <h5>Our Mission</h5>
                    </div>
                    <div class="widget-content nopadding">
                      <div class="control-group">
                          <label class="control-label">Title</label>
                          <div class="controls">
                              <input type="text" id="title" name="scnms-title"  value="<?php echo isset($scnms_title) ? $scnms_title : '' ?>" required>
                          </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Description</label>
                          <div class="controls">
                              <textarea class="textarea_editor_ms span12" rows="6" placeholder="Enter text ..." name="scnms-desc"><?php echo isset($scnms_desc) ? $scnms_desc : '' ?></textarea>
                          </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Image1</label>
                        <div class="controls">
                          <input type="file" id="file" name="scnms-file" required>
                          <input type="hidden" id="file" name="scnmsh-file" value="<?php echo isset($scnmsh_file) ? $scnmsh_file : '';?>">
                          <img src="../uploads/<?php echo isset($scnmsh_file) ? $scnmsh_file : '';?>" width="70"> <?php echo isset($scnmsh_file) ? $scnmsh_file : '';?>
                            <br>
                            <span class="colorprimary">Image size is (width)300x600(height)</span>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Image2</label>
                        <div class="controls">
                          <input type="file" id="file1" name="scnms-file1" required>
                          <input type="hidden" id="file" name="scnmsh-file1" value="<?php echo isset($scnmsh_file1) ? $scnmsh_file1 : '';?>"> 
                          <img src="../uploads/<?php echo isset($scnmsh_file1) ? $scnmsh_file1 : '';?>" width="70"> <?php echo isset($scnmsh_file1) ? $scnmsh_file1 : '';?>
                            <br>
                            <span class="colorprimary">Image size is (width)300x600(height)</span>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>

              <!-- what we offering section -->
              <div class="row-fluid">
                <div class="span12">
                  <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> 
                      <i class="icon-info-sign"></i> </span>
                      <h5>What We Offering</h5>
                    </div>
                    <div class="widget-content nopadding">
                      <div class="control-group">
                          <label class="control-label">Title</label>
                          <div class="controls">
                              <input type="text" id="title" name="scnof-title"  value="<?php echo isset($scnof_title) ? $scnof_title : '' ?>" required>
                          </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Description</label>
                          <div class="controls">
                              <textarea class="textarea_editor_of span12" rows="6" placeholder="Enter text ..." name="scnof-desc"><?php echo isset($scnof_desc) ? $scnof_desc : '' ?></textarea>
                          </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Image</label>
                        <div class="controls">
                          <input type="file" id="file" name="scnof-file" required>
                          <input type="hidden" id="file" name="scnofh-file" value="<?php echo isset($scnofh_file) ? $scnofh_file : '';?>">
                          <img src="../uploads/<?php echo isset($scnofh_file) ? $scnofh_file : '';?>" width="70"> <?php echo isset($scnofh_file) ? $scnofh_file : '';?>
                          <br>
                          <span class="colorprimary">Image size is (width)370x270(height)</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- join section -->
              <div class="row-fluid">
                <div class="span12">
                  <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> 
                      <i class="icon-info-sign"></i> </span>
                      <h5>Join Section</h5>
                    </div>
                    <div class="widget-content nopadding">
                      <div class="control-group">
                          <label class="control-label">Title</label>
                          <div class="controls">
                              <input type="text" id="title" name="scnjn-title"  value="<?php echo isset($scnjn_title) ? $scnjn_title : '' ?>" required>
                          </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Description</label>
                        <div class="controls">
                          <input type="text" id="file" name="scnjn-desc"  value="<?php echo isset($scnjn_desc) ? $scnjn_desc : '' ?>" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Join button title</label>
                        <div class="controls">
                          <input type="text" id="file" name="scnjn-btntitle"  value="<?php echo isset($scnjn_btntitle) ? $scnjn_title : '' ?>" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Join button link</label>
                        <div class="controls">
                          <input type="text" id="file" name="scnjn-btnlink"  value="<?php echo isset($scnjn_btnlink) ? $scnjn_btnlink : '' ?>" required>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- OUR PROUD ASSOCIATIONS section -->
              <div class="row-fluid">
                <div class="span12">
                  <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> 
                      <i class="icon-info-sign"></i> </span>
                      <h5>Our Proud Associations</h5>
                    </div>
                    <div class="widget-content nopadding">
                      <div class="control-group">
                          <label class="control-label">City</label>
                          <div class="controls">
                              <input type="text" id="title" name="scnas-title" value="<?php echo isset($scnas_title) ? $scnas_title : '' ?>" required>
                          </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">List</label>
                          <div class="controls">
                              <textarea class="textarea_editor_ass span12" rows="6" placeholder="Enter text ..." name="scnass-desc"><?php echo isset($scnass_desc) ? $scnass_desc : '' ?></textarea>
                          </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Image</label>
                        <div class="controls">
                          <input type="file" id="file" name="scnass-file" required>
                          <input type="hidden" id="file" name="scnassh-file" value="<?php echo isset($scnassh_file) ? $scnassh_file : '';?>">
                          <img src="../uploads/<?php echo isset($scnassh_file) ? $scnassh_file : '';?>" width="70"> <?php echo isset($scnassh_file) ? $scnassh_file : '';?>
                            <br>
                            <span class="colorprimary">Image size is (width)70x70(height)</span>
                        </div>
                      </div>

                      <div class="control-group">
                          <label class="control-label">City</label>
                          <div class="controls">
                              <input type="text" id="title" name="scnas1-title"  value="<?php echo isset($scnas1_title) ? $scnas1_title : '' ?>" required>
                          </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">List</label>
                          <div class="controls">
                              <textarea class="textarea_editor_ass1 span12" rows="6" placeholder="Enter text ..." name="scnass1-desc"><?php echo isset($scnass1_desc) ? $scnass1_desc : '' ?></textarea>
                          </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Image</label>
                        <div class="controls">
                          <input type="file" id="file" name="scnass1-file" required>
                          <input type="hidden" id="file" name="scnassh1-file" value="<?php echo isset($scnassh1_file) ? $scnassh1_file : ''; ?>">
                          <img src="../uploads/<?php echo isset($scnassh1_file) ? $scnassh1_file : ''; ?>" width="70"> <?php echo isset($scnassh1_file) ? $scnassh1_file : ''; ?>
                                <br>
                                <span class="colorprimary">Image size is (width)70x70(height)</span>
                        </div>
                      </div>

                      <div class="control-group">
                          <label class="control-label">City</label>
                          <div class="controls">
                              <input type="text" id="title" name="scnas2-title"  value="<?php echo isset($scnas2_title) ? $scnas2_title : '' ?>" required>
                          </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">List</label>
                          <div class="controls">
                              <textarea class="textarea_editor_ass2 span12" rows="6" placeholder="Enter text ..." name="scnass2-desc"><?php echo isset($scnass2_desc) ? $scnass2_desc : '' ?></textarea>
                          </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Image</label>
                        <div class="controls">
                          <input type="file" id="file" name="scnass2-file" required>
                          <input type="hidden" id="file" name="scnassh2-file" value="<?php echo isset($scnassh2_file) ? $scnassh2_file : '';?>">
                          <img src="../uploads/<?php echo isset($scnassh2_file) ? $scnassh2_file : '';?>" width="70"> <?php echo isset($scnassh2_file) ? $scnassh2_file : '';?>
                                <br>
                                <span class="colorprimary">Image size is (width)70x70(height)</span>
                        </div>
                      </div>

                      <div class="control-group">
                          <label class="control-label">City</label>
                          <div class="controls">
                              <input type="text" id="title" name="scnas3-title"  value="<?php echo isset($scnas3_title) ? $scnas3_title : '' ?>" required>
                          </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">List</label>
                          <div class="controls">
                              <textarea class="textarea_editor_ass3 span12" rows="6" placeholder="Enter text ..." name="scnass3-desc"><?php echo isset($scnass3_desc) ? $scnass3_desc : '' ?></textarea>
                          </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Image</label>
                        <div class="controls">
                          <input type="file" id="file" name="scnass3-file" required>
                          <input type="hidden" id="file" name="scnassh3-file" value="<?php echo isset($scnassh3_file) ? $scnassh3_file : '';?>">
                          <img src="../uploads/<?php echo isset($scnassh3_file) ? $scnassh3_file : '';?>" width="70"> <?php echo isset($scnassh3_file) ? $scnassh3_file : '';?>
                                <br>
                                <span class="colorprimary">Image size is (width)70x70(height)</span>
                        </div>
                      </div>                     
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Save" class="btn btn-success" name="aboutussave">
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
