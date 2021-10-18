<!DOCTYPE html>
<html lang="en">
<?php include 'conn.php'; ?>
<?php include 'header.php'; ?>
<!--Full width header End-->

<!-- Slider Area Start -->
<?php include 'slider.php'; ?>
<!-- Slider Area End -->

<!-- Services Start -->
<div class="rs-services rs-services-style1">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="services-item rs-animation-hover">
                    <div class="services-icon">
                        <i class="fa fa-american-sign-language-interpreting rs-animation-scale-up"></i>
                    </div>
                    <div class="services-desc">
                        <h4 class="services-title">Free Counselling</h4>
                        <p>Anytime you need?</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="services-item rs-animation-hover">
                    <div class="services-icon">
                        <i class="fa fa-book rs-animation-scale-up"></i>
                    </div>
                    <div class="services-desc">
                        <a href="https://online.studyrocks.in/"><h4 class="services-title">Buy Any Course</h4></a>
                        <p>Online you want?</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="services-item rs-animation-hover">
                    <div class="services-icon">
                        <i class="fa fa-user rs-animation-scale-up"></i>
                    </div>
                    <div class="services-desc">
                        <a href="https://studyrocks.in/teachers.php"><h4 class="services-title">Certified Teachers</h4></a>
                        <p>Around the world.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="services-item rs-animation-hover">
                    <div class="services-icon">
                        <i class="fa fa-graduation-cap rs-animation-scale-up"></i>
                    </div>
                    <div class="services-desc">
                        <a href="https://onlinetest.studyrocks.in/"><h4 class="services-title">Unlimited Practice</h4></a>
                        <p>More Practice More learning.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Services End -->

<!-- About Us Start -->
<?php include 'homeabout.php'; ?>
<!-- About Us End -->
<!-- Calltoaction Start -->
<?php include 'homejoin.php'; ?>
<!-- Calltoaction End -->

<!--TEAM -->
<div id="rs-team" class="rs-team sec-color sec-spacer">
    <div class="container">
        <div class="sec-title mb-50 text-left-side">
            <h2>OUR EXPERIENCED TEACHERS</h2>
            <p></p>
        </div>
        <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="true" data-autoplay-timeout="100" data-smart-speed="1000" data-dots="true" data-nav="true" data-nav-speed="true" data-mobile-device="1" data-mobile-device-nav="true"
            data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="true" data-ipad-device-dots="true" data-md-device="3" data-md-device-nav="true" data-md-device-dots="true">
            <?php 
                $team = "SELECT * FROM teachers";
                $tmres = mysqli_query($conn,$team) or die($conn->error);
                while ($tmrow = mysqli_fetch_assoc($tmres)) { 
            ?>
                    <div class="team-item">
                        <div class="team-img">
                            <img src="uploads/teachers/<?php echo $tmrow['teacher_img'];?>" alt="team Image" >
                        </div>
                    </div>
            <?php
                }         
            ?>
        </div>
    </div>
</div>
<!--TEAMSTARTS-->
		
<!-- Counter Up Section Start-->
<?php include 'counter.php'; ?>
<!-- Counter Up Section End -->

<!-- Team Start -->
<!-- Team End -->

<!-- Latest News Start -->
<div id="rs-latest-news" class="rs-latest-news sec-spacer">
    <div class="container">
        <div class="row rs-vertical-middle">
           <?php include 'latestnews.php'; ?>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <?php include 'demohome.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Latest News End -->

<!-- COURSE Products Start -->
<div id="rs-courses" class="rs-courses sec-color sec-spacer">
    <div class="container">
        <div class="sec-title mb-50 text-center">
            <h2>OUR POPULAR COURSES</h2>
            <p></p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="false" data-autoplay-timeout="5000" data-smart-speed="1200" data-dots="true" data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="true"
                    data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="true" data-ipad-device-dots="true" data-md-device="3" data-md-device-nav="true" data-md-device-dots="true">

					<?php include 'hmcourses.php'; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- COURSE Products End -->

<!-- Testimonial Start -->
<div id="rs-testimonial" class="rs-testimonial bg5 sec-spacer mb-50">
    <?php include 'hometestimonials.php'; ?>
</div>
<!-- Testimonial End -->

<!-- Partner Start -->
<?php include 'partners.php'; ?>
<!-- Partner End -->

<?php include 'footer.php'; ?>

  <!--button type="button" class="btn btn-primary" data-toggle="modal" data-target="#subscribe">
    Open modal
  </button-->
<?php 
    if(isset($_POST['subs'])) {
        $email = $_POST['sbsemail'];

        $sbs = 'INSERT INTO subscribers (email) VALUES("'.$email.'")';
        $sbsres = mysqli_query($conn,$sbs) or die($conn->error);
        if ($conn->query($sbs) === TRUE) {
            $_SESSION['subscrption']['success'] = '<div style="color:green;font-size:16px;text-align:center;padding:40px 20px;">You are subscribed successfully.</div>';
        }
        else{
            $_SESSION['subscrption']['error'] = '<div style="color:red;font-size:16px;text-align:center;padding:40px 20px;">'.$conn->error.'</div>';
        }
    }
?>
  <!-- The Modal -->
  <div class="modal" id="subscribe">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h2 class="modal-title" style="color:#fff;">Subscribe Our Newsletter For Latest Updates</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" enctype="multipart/form-data" id="subscrbrs" >
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Your Email Address" name="sbsemail" required>
                </div>                
                <div class="form-group">
                <input type="submit" class="btn btn-danger" value="Subscribe" name="subs">
                </div>
            </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
    <!-- The Modal -->
    <div class="modal" id="subscribemessage">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <?php
                        if(isset($_SESSION['subscrption']['success'])) {
                            echo $_SESSION['subscrption']['success'] ;
                        }
                        else{
                            echo $_SESSION['subscrption']['error'];
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
  <?php 
    if(isset($_SESSION['subscrption']['error']) || isset($_SESSION['subscrption']['success'])) {
?>
    <script>
        $(document).ready(function(){
            $('#subscribemessage').modal('show');
            setTimeout(function(){
                $('#subscribemessage').modal('hide');
            },8000);
        });
    </script>
<?php
        unset($_SESSION['subscrption']['error']);
        unset($_SESSION['subscrption']['success']);
    }
    else{
  ?>

<script>
    $(document).ready(function(){
        setTimeout(function(){
            $('#subscribe').modal('show');
        },8000);
    });
</script>

<?php
    }
?>
</body>
</html>