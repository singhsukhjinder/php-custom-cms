<html>
    <head>
    <title>Study Rock Admin</title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/matrix-login.css" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
    <body>
		
    <?php 
    session_start();
        include '../conn.php'; 
        if(isset($_SESSION['useradmin']['status'])) {
    ?>
        <script>location.href = '/adminrock-secure-admin/dashboard.php';</script>
    <?php
        }
        else{
            if (isset($_POST['adminlogin'])) {
                $username = $_POST['username'];
                $password = hash('sha256', $_POST['password']);
                $sql = "SELECT * FROM  admimuser WHERE ad_user='$username' AND ad_pass ='$password' OR email='$password'";
                $res = mysqli_query($conn,$sql) or die($conn->error);
                if (mysqli_num_rows($res) >= 1 ) {
                    $row = mysqli_fetch_row($res);
                   // print_r($row);
                    $_SESSION['useradmin']['status'] = 'active';
                    $_SESSION['useradmin']['name'] = $username ;
                    $_SESSION['useradmin']['email'] = $row['3'] ;
                    //echo '<pre>';
                   // print_r($_SESSION['useradmin']);
                    header('Location:dashboard.php');

                }
                else{
                    $_SESSION['useradmin']['error'] = '<div style="color:red; font-size:14px;margin:0px auto 10px auto;text-align:center;">Invalid username ot password</div>';
                } 
            }
            elseif(isset($_POST['recover'])) {
                $remail = $_POST['remail'];
                $sql = "SELECT org_pass FROM  admimuser WHERE  email='$remail'";
                $res = mysqli_query($conn,$sql) or die($conn->error);
                if (mysqli_num_rows($res) >= 1 ) {
                    $row = mysqli_fetch_row($res);
                    print_r($row);die;
                    $_SESSION['useradmin']['remail'] = '<div style="color:green; font-size:14px;margin:0px auto 10px auto;text-align:center;">An email has been sent to your registerd email.</div>' ;

                }
                else{
                    $_SESSION['useradmin']['remail'] = '<div style="color:red; font-size:14px;margin:0px auto 10px auto;text-align:center;">There is no account associated with this email.</div>';
                }
            }
        }
        ?>

        <div id="loginbox">            
            <form id="loginform" class="form-vertical" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
				 <div class="control-group normal_text"> <h3><img src="../images/loh1.png" alt="Logo" /></h3></div>
                 <?php
                        if(isset($_SESSION['useradmin']['error'])) {
                            echo $_SESSION['useradmin']['error'];
                        }
                        if(isset($_SESSION['useradmin']['remail'])){
                            echo '<script>setTimeout(function(){$("#to-recover").click();},200);</script>';
                        }
                ?>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" placeholder="Username" name="username"/>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Password" name="password"/>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
                    <span class="pull-right"><input type="submit" class="btn btn-success" value="Login" name="adminlogin"/> </span>
                </div>
            </form>
            <form id="recoverform" class="form-vertical" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
				<p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
                <?php
                    if(isset($_SESSION['useradmin']['remail'])){
                        echo $_SESSION['useradmin']['remail'];
                    }
                ?>
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" name="remail"/>
                        </div>
                    </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><input type="submit" class="btn btn-info" value="Reecover" name="recover" style="width:100%;"></span>
                </div>
            </form>
        </div>
        <script src="js/jquery.min.js"></script>  
        <script src="js/matrix.login.js"></script> 
    </body>
</html>