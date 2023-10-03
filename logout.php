<?php $page_title = ""; include("include/header.php"); session_start(); ?>

<?php

session_unset();
session_destroy();
header("location: login.php");

?>

<?php include("include/footer.php"); ?>