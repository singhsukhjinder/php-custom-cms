<!DOCTYPE html>
<html lang="en">
<head>
    <title>Study Rock Admin Login</title>
    <style>
        @import url(http://weloveiconfonts.com/api/?family=entypo);
        @import url(https://fonts.googleapis.com/css?family=Roboto);
        /* zocial */
        [class*="entypo-"]:before {
            font-family: 'entypo', sans-serif;
        }
        *,
        *:before,
        *:after {
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box; 
        }
        h2 {
            color:rgba(255,255,255,.8);
            margin-left:12px;
        }
        body {
            background: #272125;
            font-family: 'Roboto', sans-serif;
        
        }
        form {
            position:relative;
            margin: 50px auto;
            width: 380px;
            height: auto;
        }
        input {
            padding: 16px;
            border-radius:7px;
            border:0px;
            background: rgba(255,255,255,.2);
            display: block;
            margin: 15px;
            width: 300px;  
            color:white;
            font-size:18px;
            height: 54px;
        }
        input:focus {
            outline-color: rgba(0,0,0,0);
            background: rgba(255,255,255,.95);
            color: #e74c3c;
        }
        button {
            float:right;
            height: 121px;
            width: 50px;
            border: 0px;
            background: #e74c3c;
            border-radius:7px;
            padding: 10px;
            color:white;
            font-size:22px;
        }
        .inputUserIcon {
            position:absolute;
            top:68px;
            right: 80px;
            color:white;
        }
        .inputPassIcon {
            position:absolute;
            top:136px;
            right: 80px;
            color:white;
        }
        input::-webkit-input-placeholder {
            color: white;
        }
        input:focus::-webkit-input-placeholder {
            color: #e74c3c;
        }
    </style>
</head>
<body>
<div id="div1"></div>
<?php include '../conn.php'; ?>
<?php
    if (isset($_POST['adminlogin'])) {
        $username = $_POST['username'];
        $password = hash('sha256', $_POST['password']);
        $sql = "SELECT * FROM  admimuser WHERE ad_user='$username' AND ad_pass ='$password' OR email='$password'";
        $res = mysqli_query($conn,$sql) or die($conn->error);
        if (mysqli_num_rows($res) >= 1 ) {
            $row = mysqli_fetch_row($res);
            print_r($row);
            $_SESSION['useradmin']['status'] = 'active';
            $_SESSION['useradmin']['name'] = $username ;
            $_SESSION['useradmin']['email'] = $row['3'] ;
            echo '<pre>';
            print_r($_SESSION['useradmin']);
            header('Location:dashboard.php');

        }
        else{
            $_SESSION['useradmin']['error'] = $conn->error;
        }
    }       

	else{
?>
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <h2><span class="entypo-login"><i class="fa fa-sign-in"></i></span> Login</h2>
            <!--button class="submit" type="submit"><span class="entypo-lock"><i class="fa fa-lock"></i></span></button-->
            
            <span class="entypo-user inputUserIcon">
                <i class="fa fa-user"></i>
            </span>
            <input type="text" class="user" placeholder="ursername" name="username">
            <span class="entypo-key inputPassIcon">
                <i class="fa fa-key"></i>
            </span>
            <input type="password" class="pass" placeholder="password" name="password">
            <input type="submit" class="submit" type="submit" value="Log In" name="adminlogin">
        </form>

<?php } ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(".user").focusin(function(){
            $(".inputUserIcon").css("color", "#e74c3c");
        }).focusout(function(){
            $(".inputUserIcon").css("color", "white");
        });

        $(".pass").focusin(function(){
            $(".inputPassIcon").css("color", "#e74c3c");
        }).focusout(function(){
            $(".inputPassIcon").css("color", "white");
        });
    </script>
</body>
</html>