<?php
$dbc = Database::connect();
session_start();
$config = new PHPAuth\Config($dbc);
$auth   = new PHPAuth\Auth($dbc, $config);
$browserHash = $_SESSION['hash'];

if($auth->checkSession($browserHash)) {
$uid = $auth->getSessionUID($browserHash);
$sql = "select * from printerApp.users WHERE id = '".$uid."'";
$rslt = $dbc->query($sql);
$usr = $rslt->fetch();
$username = $usr['username'];
$authLevel = $usr['level'];
}

if(isset($_GET['signout'])&&$_GET['signout']==1){
    $auth->logout($browserHash);
    $uid = NULL;
    $authLevel = 0;
}

Display::levelCheck($level,$authLevel);