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
            $del = "DELETE FROM events WHERE id='$did'";
            $res = mysqli_query($conn,$del) or die($conn->error);
            
          }

          $sql = "SELECT * FROM  events";
          $res = mysqli_query($conn,$sql) or die($conn->error);
        ?>
        <div id="content">
          <div id="content-header">
            <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> <a href="#" class="current">Events</a> <a href="#" class="current">View Events</a> </div>
            <h1>Events</h1>
          </div>
          <div class="container-fluid">
            <hr>
            <div class="row-fluid">
              <div class="span12">
                <div class="widget-box">
                  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>Events</h5>
                  </div>
                  <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Event Title</th>
                          <th>Event Date</th>
                          <th>Event Time</th>
                          <th>Event Venue</th>
                          <th>Event Description</th>
                          <th>Event Image</th>
                          <th>Event Banner</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                            if (mysqli_num_rows($res) >= 1 ) {
                     
                              while ($row = mysqli_fetch_assoc($res)) {
                                
                              
                                
                                echo '<tr class="gradeX">
                                <td>'.$row['id'].'</td>
                                <td>'.$row['eventtitle'].'</td>
                                <td>'.$row['eventdate'].'</td>
                                <td>'.$row['eventtime'].'</td>
                                <td>'.$row['eventvenue'].'</td>
                                <td>'.substr(strip_tags($row['eventdesc']),0,100).'..</td>
                                <td><img src="../uploads/events/'.$row['eventimg'].'" width="50"><br>'.$row['eventimg'].'</td>
                                <td><img src="../uploads/events/'.$row['eventimgbnn'].'" width="50"><br>'.$row['eventimgbnn'].'</td>
                                <td class="center"><a href="addevent.php?action=edit&id='.$row['id'].'">Edit</a> | <a href="viewevents.php?action=delete&id='.$row['id'].'">Delete</a></<td>
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