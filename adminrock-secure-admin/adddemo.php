<?php 
    session_start();
    include '../conn.php'; 
    if(isset($_SESSION['useradmin']['status'])) {

        if(isset($_GET['action']) && $_GET['action'] == 'edit') {
            $did = $_GET['id'];
            $sql2 = "SELECT * FROM demos WHERE id='$did'";
            $res = mysqli_query($conn,$sql2) or die($conn->error);
            if (mysqli_num_rows($res) >= 1 ) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $demoid = $row['id'];
                    $demotitle2 = $row['demotitle'];
                    $demolink2 = $row['demolink'];
                    $demodesc2 = $row['demodesc'];
                }  
            }
        }
        if(isset($_POST['demosave'])) {
        
            $demotitle = stripslashes(mysqli_real_escape_string($conn,$_POST['demotitle']));
            $demolink = stripslashes(mysqli_real_escape_string($conn,$_POST['demolink']));
            $demodesc = stripslashes(mysqli_real_escape_string($conn,$_POST['demodesc']));

            echo "insert";
            $sql = 'INSERT INTO demos (demotitle, demolink, demodesc) VALUES ("'.$demotitle.'", "'.$demolink.'", "'.$demodesc.'")';

            if ($conn->query($sql) === TRUE) {
            $_SESSION['fileupload']['inserted'] = '<div style="color:green;font-size:14px;text-align:center;">Recod Inserted.</div>';
            }
            else{
            echo $conn->error;
            $_SESSION['fileupload']['inserted'] = '<div style="color:red;font-size:14px;text-align:center;">Something went wrong!</div>';
            }
        }
        elseif(isset($_POST['demoupdate'])) {

            $demotitle1 = stripslashes(mysqli_real_escape_string($conn,$_POST['demotitle']));
            $demolink1 = stripslashes(mysqli_real_escape_string($conn,$_POST['demolink']));
            $demodesc1 = stripslashes(mysqli_real_escape_string($conn,$_POST['demodesc']));
            $demoid = $_POST['demoid'];

            $sql3 = 'UPDATE demos SET	demotitle="'.$demotitle1.'", demolink="'.$demolink1.'", demodesc="'.$demodesc1.'" WHERE id="'.$demoid.'"';

            if ($conn->query($sql3) === TRUE) {
                $_SESSION['fileupload']['inserted'] = '<div style="color:green;font-size:14px;text-align:center;">Recod Updated.</div>';
            }
            else{
                $_SESSION['fileupload']['inserted'] = '<div style="color:red;font-size:14px;text-align:center;">Something went wrong!</div>';
            }
        }
    include 'header.php';
?>

        <div id="content">
            <div id="content-header">
                <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> <a href="#" class="">Demos</a><a href="#" class="current">Add Demo</a> </div>
                <h1>Add Demo</h1>
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
                                <label class="control-label">Title</label>
                                <div class="controls">
                                    <input type="text" id="title" name="demotitle"  value="<?php echo isset($demotitle2) ? $demotitle2 : '' ?>" required>
                                    <input type="hidden" name="demoid" value="<?php echo isset($demoid) ? $demoid : ''?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Link</label>
                                <div class="controls">
                                    <input type="text" id="title" name="demolink"  value="<?php echo isset($demolink2) ? $demolink2 : '' ?>" required>
                                    <span>Enter only the video id from the youtube url. Like https://www.youtube.com/watch?v=<span style="color:green;">fFljhFcS8Jo</span> the part is the vodeo id that is after the watch?v= </span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                    <input type="text" id="title" name="demodesc"  value="<?php echo isset($demodesc2) ? $demodesc2 : '' ?>" required>
                                </div>
                            </div>                                            
                        </div>
                    </div>
                </div>
            </div> 
            <div class="form-actions">
        <?php 
            if(isset($_GET['action']) && $_GET['action'] == 'edit') {
                echo '<input type="submit" value="Update" class="btn btn-success" name="demoupdate">';
            }
            else {
                echo '<input type="submit" value="Save" class="btn btn-success" name="demosave">';
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
        <?php include 'footer.php'; ?>
        <script>
          $('.textarea_editor_demo').wysihtml5();
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
