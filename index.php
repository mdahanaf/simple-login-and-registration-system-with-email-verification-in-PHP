<?php $page_title = "Registration Page";
session_start();
include("include/header.php"); ?>



<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center text-primary">Registration Form</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label class="form-label">E-mail</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <input name="register_button" type="submit" value="Register" class="btn btn-primary">
                        <p class="text-secondary mt-2">Already have an account? <a href="login.php">Login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php

if(isset($_REQUEST["register_button"])){
    $email = $_REQUEST["email"];
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];
    $otp = generateOTP();

    $sql = "INSERT INTO userdata (email, username, password, is_email_verified, otp) VALUES ('$email', '$username', '$password', 'false', '$otp')";
    insertData($conn, $sql);

    $subject = $otp." is Your Registration OTP";
    $body = "Your registration otp is: ".$otp.$br."-thanks from Md. Ahanaf";

    sendEmail($email, $subject, $body);
    $_SESSION["username"] = $username;
    header("location: verify_otp.php?from=registration");
}

?>


<?php include("include/footer.php"); ?>