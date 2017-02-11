<?php require 'vendor/autoload.php'; ?>
<?php
session_start();
$dbh = new PDO("mysql:host=localhost;dbname=printerApp", "technician", "rbdf");

$config = new PHPAuth\Config($dbh);
$auth   = new PHPAuth\Auth($dbh, $config);

if (isset($_POST['submit'])){
    $email = $_POST['name'];
    $password = $_POST['password'];

    $login = $auth->login($email,$password);

    $_SESSION['hash']=$login['hash'];

    if($login['error']){
        $msg = $login;
    }else{
        header('Location: /printerApp');
    }
}
$browserHash = $_SESSION['hash'];
if($auth->checkSession($browserHash)) {
    $uid = $auth->getSessionUID($browserHash);
    $sql = "select * from printerApp.users WHERE id = '".$uid."'";
    echo $sql;
    $rslt = $dbh->query($sql);
    $rslt = $rslt->fetch();
    $username = $rslt['username'];
}


if (isset($_GET['signout'])&&$_GET['signout']=='true'){
    $auth->logout($browserHash);
    $uid = NULL;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Printer App Login</title>
    <link rel="stylesheet" href="assets/css/foundation.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link href="assets/css/main.css" type="text/css" rel="stylesheet">
</head>
<body>
    <header class="row">
        <div class="column small-12 text-center">
            <a href="index.php"> <h1>RBDF IT</h1>
                <h4>Printer App</h4></a>
        </div>
    </header>

    <div class="row allTop">
        <section class="column small-centered text-center loginForm small-6">
            <h2>Login</h2>
            <div class="small-9 small-centered">
                <?php if($msg){
                    echo $msg["message"];
                }
                ?>
                <form class="" method="post" action="login.php">
                    <label for="loginName">Username/Email</label>
                    <input type="text" name="name" id="loginName">

                    <label for="password">Password</label>
                    <input type="text" id="password" name="password">

                    <input class="button" type="submit" name="submit" value="Sign In">
                </form>
            </div>
            <div>
            <?php
                if($uid){?>
                    Do you want to Sign Out <?php echo $username ?> ?
                    <form action="login.php" method="get" name="signout">
                        <button type="submit" name="signout" class="button" value="true">Sign Out</button>
                    </form>
                <?php }
            ?>
            </div>
        </section>
    </div>
</body>
</html>
<?php require_once("components/req/footer.php") ?>