<?php $page_title = "Password Reset Page"; include("include/header.php"); session_start(); ?>

<?php

if(isset($_SESSION["username"])){
    header("Location: dashboard.php");
}

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h4>Password Reset form</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Username</label>
                            <input type="text" name="username" id="" class="form-control">
                        </div>
                        <input type="submit" value="Send OTP" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php

if(isset($_REQUEST["username"])){
    $username = $_REQUEST["username"];
    $sql = "SELECT * FROM userdata WHERE username='$username';";
    $arr = getData($conn, $sql);
    if($arr != array()){
        $otp = generateOTP();
        $_SESSION["reset_username"] = $username;
        $_SESSION["reset_otp"] = $otp;

        $sql = "UPDATE userdata SET otp='$otp' WHERE username='$username';";
        insertData($conn, $sql);
        
        $email = $arr[0][1];
        $subject = "OTP for Password Reset";
        $body = "Your OTP for password reset is: $otp";
        sendEmail($email, $subject, $body);
        header("Location: verify_otp.php?reset=true");

        
    } else{
        echo "<p class='h5 text-danger text-center my-5'>Sorry! Username not found.</p>";
    }
}


?>



<?php include("include/footer.php"); ?>