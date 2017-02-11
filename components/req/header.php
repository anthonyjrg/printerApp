<?php require_once "logic/connectCheckSignout.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo Display::showTitle($title) ?></title>
    <link rel="stylesheet" href="assets/css/foundation.css" type="text/css">
    <link rel="stylesheet" href="assets/css/app.css" type="text/css">
    <link href="assets/css/main.css" type="text/css" rel="stylesheet">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>

<body>
<div class="row top">

    <div class="column small-6 text-left techMenu">
        <?php if($uid){ ?>
            <a href="index.php?p=ic">
                <button class="button micro" >
                   Record A Ink Change
                </button >
            </a>
            <button class="button micro" >
                Record Ink Recieved
            </button >
            <button class="button micro" >
                Record Ink Order
            </button >
            <a href="index.php?p=pe">
            <button class="button micro" >
                Record Printer Event
            </button >
            </a>
            <a href="index.php?p=ps">
            <button class="button micro" >
                Change Printer Status
            </button >
            </a>
            <a href="index.php?p=pr">
                <button class="button micro" >
                    Printer Reports
                </button >
            </a>
        <?php } ?>
    </div >

    <div class="column small-6 text-right">
            <?php if($uid) { echo "Hello ".$username." "; ?>
                <a href="/printerApp/index.php?signout=1">
                    <button class="button">Sign Out</button>
                </a><?php } ?>
                <?php if($authLevel == 5){  ?>
                    <a href="adminCreate.php" class="button" >Create a User</a>
                <?php } else {  ?>
                    <a href="login.php" class="button" >Sign In</a>
                <?php } ?>
    </div>

</div>
<header class="row">
    <div class="column small-3">
        <a href="index.php"> <h1>RBDF I.T</h1>
        <h4>printer listing</h4></a>
    </div>
    <div class="small-9 menu column text-left">
        <ul class="menu">
            <li> <a href="index.php?p=a">see all printers</a></li>
            <li > <a href = "index.php?p=ap" > see inks inventory </a ></li >
            <?php if($uid) { ?>
             <li > <a href = "index.php?p=ad" > list new department </a ></li >
             <li > <a href = "index.php?p=ad" > list new ink </a ></li >
            <?php } ?>
        </ul>
    </div>
</header>