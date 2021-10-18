<?php 
       session_start();
       include '../conn.php'; 
    if(isset($_SESSION['useradmin']['status'])) {
?>        
        <?php 
          include 'header.php';

          if(isset($_GET['action']) && isset($_GET['id'])) {
            $did = $_GET['id'];
            $del = "DELETE FROM partners WHERE id='$did'";
            $res = mysqli_query($conn,$del) or die($conn->error);
            
          }

          $sql = "SELECT * FROM  partners";
          $res = mysqli_query($conn,$sql) or die($conn->error);
        ?>
        <div id="content">
          <div id="content-header">
            <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> <a href="#" class="current">Partners</a> </div>
            <h1>Partners</h1>
          </div>
          <div class="container-fluid">
            <hr>
            <div class="row-fluid">
              <div class="span12">
                <div class="widget-box">
                  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>Partners</h5>
                  </div>
                  <div class="widget-content nopadding">
                    <table class="table table-bordered data-table text-center">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Partner Name</th>
                          <th>Partner Image</th>
                          <th>Partner Url</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                            if (mysqli_num_rows($res) > 0 ) {                              
                              while ($row = mysqli_fetch_assoc($res)) { 
                                echo '<tr class="gradeX  text-center">
                                <td class="text-center">'.$row['id'].'</td>
                                <td class="text-center">'.$row['name'].'</td>
                                <td class="text-center"><img src="../uploads/partners/'.$row['prtnr_img'].'" width="50"></td>
                                <td class="center">'.$row['prtnr_url'].'</td>
                                <td class="center"><a href="addtopper.php?action=edit&id='.$row['id'].'">Edit</a> | <a href="toppers.php?action=delete&id='.$row['id'].'">Delete</a></td>
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