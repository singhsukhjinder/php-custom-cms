<!DOCTYPE html>
<html lang="en">
<?php include 'conn.php'; ?>
<?php include 'header.php'; ?>
<!--Full width header End-->
<?php
    if(isset($_POST['signup'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $password1= hash('sha256', $password);

        $sql = "INSERT INTO users (name, email, password,created_at) VALUES ('$username', '$email', '$password1', NOW())";

        if ($conn->query($sql) === TRUE) {
           $_SESSION['user']['status'] = 'active';
           $_SESSION['user']['name'] = $username ;
           $_SESSION['user']['email'] = $email ;
           $to = $email;
            $subject = "Welcome to Study Rock";

            $message = "
            <h1 style='text-align:center;color:#CC0000;'></h1>
			<p style='font-size:15px;'>Hello, ".$username."</p>
			<p style='font-size:15px;color:black;'>Welcome to Studyrocks ".$username.". Your account with Sutdyrocks is created Below are details of your account.</p>
			<p style='font-size:15px;color:black;'><span style=';font-size:15px;color:#CC0000;'></span>Username:- <span>".$username."</span></p>
			<p style='font-size:15px;color:black;'><span style='text-align:center;font-size:15px;color:#CC0000;'></span>Email:- <span>".$email."</span></p>
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
            $headers .= 'From: support@studyrocks.in' . "\r\n";
            $headers .= 'Cc: support@studyrocks.in' . "\r\n";

            mail($to,$subject,$message,$headers);
            
           ?>
	<script>location.href = '/index.php';</script>
	<?php

        } else {
            $_SESSION['user']['error'] = $conn->error;
        }

    }
?>
<div class="container loginPage">
    <div class="row">
        <div class="col-lg-4 offset-lg-4 col-md-8 offset-lg-2 col=sm-10 offset-sm-1">
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                <div class="form-group has-success has-feedback">
                    <label class="control-label" for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="form-group has-success has-feedback">
                    <label class="control-label" for="username">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group has-warning has-feedback">
                    <label class="control-label" for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group has-warning has-feedback">
                    <input type="submit" class="form-control btn btn-black btn-orange-hover" id="submit" value="Signup" name="signup">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
</body>

<!-- Mirrored from keenitsolutions.com/products/html/edulearn/edulearn-demo/index4.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 24 Sep 2018 11:21:10 GMT -->

</html>