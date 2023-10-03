<?php $page_title = "User Dashboard"; include("include/header.php"); session_start(); ?>

<div class="container my-5">
<?php
if(!isset($_SESSION['username'])){
    header("Location: login.php");
}

echo "Welcome <p class='h1 text-primary text-uppercase'>".$_SESSION['username']."</p>";

?>
<a href="logout.php" class="btn btn-danger my-5">Log Out</a>
</div>



<?php include("include/footer.php"); ?>