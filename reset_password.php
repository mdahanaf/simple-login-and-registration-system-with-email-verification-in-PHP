<?php $page_title = ""; include("include/header.php"); session_start(); ?>





<?php

if($_SESSION["is_reset_otp_verified"] != "true"){
    header("location: reset.php");
}

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h4>Reset Your Password</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">New Password</label>
                            <input type="password" name="password" id="" class="form-control">
                        </div>
                        <input name="reset_password_button" type="submit" value="Finally Reset Your Password" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

if($_SESSION["is_reset_otp_verified"] == "true"){
    if(isset($_REQUEST["reset_password_button"])){
        $password = $_REQUEST["password"];
        $username = $_SESSION["reset_username"];
        
        $sql = "UPDATE userdata SET password='$password' WHERE username='$username';";
        updateData($conn, $sql);
        header("location: login.php");
    }
}

?>


<?php include("include/footer.php"); ?>