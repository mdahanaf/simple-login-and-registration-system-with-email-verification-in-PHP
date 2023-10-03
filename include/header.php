<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("functions.php"); include("conn.php");?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="include/css/bootstrap.min.css">
    <link rel="stylesheet" href="include/css/style.css">
    <title><?php  if(isset($page_title)){echo $page_title;}  ?></title>
</head>

<body>
    <nav class="nav justify-content-end box-shadow">
        <a href="index.php" class="nav-link">Register</a>
        <a href="login.php" class="nav-link">Login</a>
        <a href="reset.php" class="nav-link">Password Reset</a>
        <a href="dashboard.php" class="nav-link">Dashboard</a>
    </nav>