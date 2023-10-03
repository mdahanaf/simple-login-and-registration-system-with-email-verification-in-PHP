<?php $page_title = "Verify Your OTP";
session_start();
include("include/header.php"); ?>



<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h4>Verify Your OTP</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="otp" class="form-label">Enter OTP</label>
                            <input type="number" name="otp" id="otp" class="form-control">
                        </div>
                        <input class="btn btn-primary" name="verify-otp-button" type="submit" value="Verify">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php



if (isset($_REQUEST["from"])) {
    if ($_REQUEST["from"] == "registration") {
        if(isset($_REQUEST["verify-otp-button"])){
            $otp = $_REQUEST["otp"];
            $username = $_SESSION["username"];
            
            $sql = "SELECT * FROM userdata WHERE username='$username';";
            $arr = getData($conn, $sql);
            $db_otp = $arr[0][5];

            if($db_otp == $otp){
                $sql = "UPDATE userdata SET is_email_verified='true', otp='198181512' WHERE username='$username';";
                updateData($conn, $sql);
                $_SESSION["is_otp_verified"] = "true";
                header("location: login.php");
            }else{
                echo "<script>alert('OTP did not match. Please try again.')</script>";
            }
        }
    }
}



if (isset($_REQUEST["from"])) {
    if ($_REQUEST["from"] == "login") {
        if(isset($_REQUEST["verify-otp-button"])){
            $otp = $_REQUEST["otp"];
            $username = $_SESSION["username"];
            
            $sql = "SELECT * FROM userdata WHERE username='$username';";
            $arr = getData($conn, $sql);
            $db_otp = $arr[0][5];

            if($db_otp == $otp){
                $sql = "UPDATE userdata SET is_email_verified='true', otp='198181512' WHERE username='$username';";
                updateData($conn, $sql);
                $_SESSION["is_otp_verified"] = "true";
                header("location: login.php");
            }else{
                echo "<script>alert('OTP did not match. Please try again.')</script>";
            }
        }
    }
}

if(isset($_REQUEST["reset"])){
    if($_REQUEST["reset"] == "true"){
        if(isset($_REQUEST["verify-otp-button"])){
            $otp = $_REQUEST["otp"];
            $username = $_SESSION["reset_username"];
            
            $sql = "SELECT * FROM userdata WHERE username='$username';";
            $arr = getData($conn, $sql);
            $db_otp = $arr[0][5];
            

            if($db_otp == $otp){
                $_SESSION["is_reset_otp_verified"] = "true";
                header("location: reset_password.php");
            }else{
                echo "<script>alert('OTP did not match. Please try again.')</script>";
            }
        }
    }
}


?>


<?php include("include/footer.php"); ?>