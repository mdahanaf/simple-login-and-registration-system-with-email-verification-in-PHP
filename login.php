<?php $page_title = "Login Page";
session_start();
include("include/header.php"); ?>




<?php

if (isset($_SESSION["is_otp_verified"])) {
    if ($_SESSION["is_otp_verified"] == "true") {
        echo "<p class='h5 text-success text-center my-5'>OTP Successfully verified. Login Now.</p>";
        
    }
}


?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center text-primary">Login Form</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <input name="login_button" type="submit" value="Log In" class="btn btn-primary">
                        <p class="text-secondary mt-2">Don't have any account? <a href="index.php">Register</a></p>
                        <p class="text-secondary mt-2">Forgot Password? <a href="reset.php">Reset Now</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php

// $_SESSION["username"] = $_REQUEST["username"];

if(isset($_REQUEST["login_button"])){
    $_SESSION["username"] = $_REQUEST["username"];
}

if (isset($_REQUEST["login_button"])) {
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];

    $sql = "SELECT * FROM userdata WHERE username='$username';";
    $arr = getData($conn, $sql);

    if (($arr != array()) && ($arr[0][3] == $password)) {
        if ($arr[0][4] == "true") {
            $_SESSION["username"] = $username;
            header("location: dashboard.php");
        } else {
            echo "<form action='' method='post'>
                <center><input name='verify-email-button' type='submit' class='btn btn-primary' value='Please verify your email first'></center>
            </form>";
        }
    } else {
        echo "<p class='h5 text-danger text-center my-3'>Please enter correct username and password</p>";
    }
}

?>



<?php

if(isset($_REQUEST["verify-email-button"])){
    
    $username = $_SESSION["username"];
    $sql = "SELECT * FROM userdata WHERE username='$username';";
    $arr = getData($conn, $sql);
    $email = $arr[0][1];
    $otp = generateOTP();
    $subject = "New OTP for Email Verification";
    $body = "Your new OTP for e-mail verification is: $otp";
    
    $sql2 = "UPDATE userdata SET otp='$otp' WHERE username='$username';";
    insertData($conn, $sql2);
    sendEmail($email, $subject, $body);
    header("location: verify_otp.php?from=login");
    
}

?>

<?php include("include/footer.php"); ?>