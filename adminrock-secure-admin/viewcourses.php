<?php 
       session_start();
       include '../conn.php'; 
    if(isset($_SESSION['useradmin']['status'])) {
?>        
        <?php 
          include 'header.php';
          
          //deleting recored
          if(isset($_GET['action']) && $_GET['action'] == 'delete') {
            $did = $_GET['id'];
            $del = "DELETE FROM courses WHERE id='$did'";
            $res = mysqli_query($conn,$del) or die($conn->error);
            
          }

          $sql = "SELECT * FROM  courses";
          $res = mysqli_query($conn,$sql) or die($conn->error);
        ?>
        <div id="content">
          <div id="content-header">
            <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> <a href="#" class="current">Courses</a> <a href="#" class="current">View Courses</a> </div>
            <h1>Courses</h1>
          </div>
          <div class="container-fluid">
            <hr>
            <div class="row-fluid">
              <div class="span12">
                <div class="widget-box">
                  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>Courses</h5>
                  </div>
                  <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Course Type</th>
                          <th>Course Title</th>
                          <th>Course Description</th>
                          <th>Course Reviews</th>
                          <th>Course rating</th>
                          <th>Course Time</th>
                          <th>Course Price</th>
                          <th>Start Date</th>
                          <th>Course Duration</th>
                          <th>Course Students</th>
                          <th>Course Button Title</th>
                          <th>Course Link</th>
                          <th>Course Image</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                            if (mysqli_num_rows($res) >= 1 ) {
                     
                              while ($row = mysqli_fetch_assoc($res)) {
                                echo '<tr class="gradeX">
                                <td>'.$row['id'].'</td>
                                <td>'.$row['crstype'].'</td>
                                <td>'.$row['crstitle'].'</td>
                                <td>'.$row['crsdesc'].'</td>
                                <td>'.$row['crsrewiews'].'</td>
                                <td>'.$row['crsrating'].'</td>
                                <td>'.$row['crstime'].'</td>
                                <td>'.$row['crsprice'].'</td>
                                <td>'.$row['crsstrtdate'].'</td>
                                <td>'.$row['crsduration'].'</td>
                                <td>'.$row['crsstudents'].'</td>
                                <td>'.$row['crsbtntitle'].'</td>
                                <td>'.$row['crsbtnlink'].'</td>
                                <td><img src="../uploads/courses/'.$row['crsimg'].'" width="50"></td>
                                <td class="center"><a href="addcourse.php?action=edit&id='.$row['id'].'">Edit</a> | <a href="viewcourses.php?action=delete&id='.$row['id'].'">Delete</a></<td>
                              </tr>';
                            }
                          }
                          else{
                            echo '<tr class="gradeX" collspan="4"><td>No result found.</td></tr>';
                          }
                        ?>
                      </tbody>
                    </table>
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
        <script src="js/jquery.uniform.js"></script> 
        <script src="js/select2.min.js"></script> 
        <script src="js/jquery.dataTables.min.js"></script> 
        <script src="js/matrix.js"></script> 
        <script src="js/matrix.tables.js"></script>
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