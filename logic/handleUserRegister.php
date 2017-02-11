<?php require '../vendor/autoload.php'; ?>
<?php

$dbh = new PDO("mysql:host=localhost;dbname=printerApp", "technician", "rbdf");

$config = new PHPAuth\Config($dbh);
$auth   = new PHPAuth\Auth($dbh, $config);

$email = $_POST['name'];
$pass1 = $_POST['pass'];
$pass2 = $_POST['pass2'];

$message = $auth->register($email,$pass1,$pass2);
var_dump($message);
