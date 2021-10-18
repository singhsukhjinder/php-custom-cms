<!DOCTYPE html>
<html lang="zxx">
    
    <?php include 'conn.php'; ?>
    <?php include 'header.php'; ?>
        <!--Full width header End-->
	<?php
		if(isset($_POST['contactus'])) {
			
		    $to = "support@studyrocks.in";
            $subject = $_POST['subject'];

            $message = "
			Hi My name is ".$_POST['fname']." ".$_POST['lname'].". My email address is ".$_POST['email']." I would like to know about ".$_POST['message']."
			<br>
			
			<p style='color:black;'>For further enquires contact us on below details:</p>
			<table style='width:100%;text-align:left;'>
				<tr>
					 <th>Address</th>
					 <th>Phone No.</th>
					 <th>Email</th>
				</tr>
				<tr>
					 <td><div style='margin-bottom:10px;'></td>
				</tr>
				<tr>
					<td>
						<div>SF 20, 2nd Floor,</div>
						<div>City Emporium Mall Plot No. 143-A,</div>
						<div>Industrial Area Phase-1</div>
						<div>Chandigrah Punjab India</div>
					</td>
					<td>
						<div>0181-507-2918</div>
						<div>0181-297-6308</div>
					</td>
					<td>
						<div>support@studyrocks.in</div>
					</td>
				</tr>
				<tr>
				 <td colspan='3'><div style='text-alogn:center;margin-top:20px;'>All Rights Reserved &copy; <a href='studyrocks.in'>Study Rocks</a></div></td>
				
				</tr>
			</table>
			
			";
			
          // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: <support@studyrocks.in' . "\r\n";
            $headers .= 'Cc: support@studyrocks.in' . "\r\n";

            
			// send email
			if(mail($to,$subject,$message,$headers)) {
				$_SESSION['contactmail']['success'] = "Your mail is sent. We will come back to you as soon as posssible.";
			}
			else{
				$_SESSION['contactmail']['failed'] = "Your mail is not sent. something went wrong!";
			}
		}
		else{
			unset($_SESSION['contactmail']['failed']);
			unset($_SESSION['contactmail']['success']);
		}
	?>
		<!-- Breadcrumbs Start -->
		<div class="rs-breadcrumbs bg7 breadcrumbs-overlay">
		    <div class="breadcrumbs-inner">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-12 text-center">
		                    <h1 class="page-title">Contact</h1>
		                    <ul>
		                        <li>
		                            <a class="active" href="index.html">Home</a>
		                        </li>
		                        <li>Cantact Us</li>
		                    </ul>
		                </div>
		            </div>
		        </div>
		    </div><!-- .breadcrumbs-inner end -->
		</div>
		<!-- Breadcrumbs End -->
		
		<!-- Contact Section Start -->
		<div class="contact-page-section sec-spacer">
        	<div class="container">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3408.9842170461748!2d75.5666438395025!3d31.3041813446201!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a5b03d763b185%3A0x566d0b37dbc779ce!2sNBS%20GURUKUL!5e0!3m2!1sen!2sin!4v1569057453528!5m2!1sen!2sin" width="1080" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        		<div class="row contact-address-section">
    				<div class="col-md-4 pl-0">
    					<div class="contact-info contact-address">
    						<i class="fa fa-map-marker"></i>
    						<h4>Address</h4>
							<p>SF 20, 2nd Floor, City Emporium Mall Plot No.</p> <p>143-A, Industrial Area Phase-1. Chandigrah</p> 
							<p>Punjab India</p>
    					</div>
    				</div>
    				<div class="col-md-4">
    					<div class="contact-info contact-phone">
    						<i class="fa fa-phone"></i>
    						<h4>Phone Number</h4>
    						<a href="tel:+3453-909-6565">+0181-507-2918<br></a>
    						<a href="tel:+2390-875-2235">+0181-297-6308<br></a>
    					</div>
    				</div>
    				<div class="col-md-4 pr-0">
    					<div class="contact-info contact-email">
    						<i class="fa fa-envelope"></i>
    						<h4>Email Address</h4>
    						<a href="mailto:infoname@gmail.com"><p>support@studyrocks.in</p></a>
    						<a href="#"><p>www.studyrocks.in</p></a>
        				</div>
        			</div>
        		</div>

        		<div class="contact-comment-section">
        			<h3>Leave Comment</h3>
                    <div id="form-messages"></div>
					<form id="contact-form" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
						<fieldset>
							<div class="row">                                      
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label>First Name*</label>
										<input name="fname" id="fname" class="form-control" type="text">
									</div>
								</div>
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label>Last Name*</label>
										<input name="lname" id="lname" class="form-control" type="text">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label>Email*</label>
										<input name="email" id="email" class="form-control" type="email">
									</div>
								</div>
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label>Subject *</label>
										<input name="subject" id="subject" class="form-control" type="text">
									</div>
								</div>
							</div>
							<div class="row"> 
								<div class="col-md-12 col-sm-12">    
									<div class="form-group">
										<label>Message *</label>
										<textarea cols="40" rows="10" id="message" name="message" class="textarea form-control"></textarea>
									</div>
								</div>
							</div>							        
							<div class="form-group mb-0">
								<input class="btn-send" type="submit" value="Submit Now" name="contactus">
							</div>
							   
						</fieldset>
					</form>
					<div class="row">
						<div class="col-sm-12">
							<div class="success" style="color:green;text-align:center;font-size:14px;margin:20px 10px 10px;">
								<?php
									echo isset($_SESSION['contactmail']['success']) ? $_SESSION['contactmail']['success'] : ''; 
									
								?>
							</div>
							<div class="error" style="color:red;text-align:center;font-size:14px;margin:20px 10px 10px;">
								<?php
									echo isset($_SESSION['contactmail']['failed']) ? $_SESSION['contactmail']['failed'] : ''; 
								
								?>
							</div>
						</div>	
					</div>					
        		</div>
        	</div>
        </div>
        <!-- Contact Section End -->     
       
        <!-- Partner Start -->
		<?php include 'partners.php'; ?>
        <!-- Partner End -->
       
        <?php include 'footer.php'; ?>
    </body>
</html>