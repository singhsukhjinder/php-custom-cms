<!DOCTYPE html>
<html lang="en">
<?php include 'conn.php'; ?>
<?php include 'header.php'; ?>
<!--Full width header End-->
<?php
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = hash('sha256', $_POST['password']);

        $sql = "SELECT * FROM  users WHERE name='$username' AND password ='$password' OR email='$password'";
        $res = mysqli_query($conn,$sql) or die($conn->error);
        if (mysqli_num_rows($res) >= 1 ) {
            $row = mysqli_fetch_row($res);
            print_r($row);
            $_SESSION['user']['status'] = 'active';
            $_SESSION['user']['name'] = $username ;
            $_SESSION['user']['email'] = $row['2'] ;
	?>
			<script>location.href = '/studyrocks.in/';</script>
	<?php

        }
        else{
            $_SESSION['user']['error'] = $conn->error;
        }
    }
?>
<div class="container loginPage">
    <div class="row">
        <div class="col-lg-4 offset-lg-4 col-md-8 offset-lg-2 col=sm-10 offset-sm-1">
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                <div class="form-group has-success has-feedback">
                    <label class="control-label" for="username">Username or Email</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="form-group has-warning has-feedback">
                    <label class="control-label" for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group has-warning has-feedback">
                    <input type="submit" class="form-control btn btn-black btn-orange-hover" id="submit" value="Login" name="login">
                </div>
            </form>
        </div>
    </div>
</div>



<?php include 'footer.php'; ?>
</body>
</html>