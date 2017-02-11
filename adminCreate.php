<?php require 'vendor/autoload.php'; ?>

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
    $rslt = $rslt->fetch();
    $username = $rslt['username'];
    $authLevel = $rslt['level'];
}else{
    header("Location: /printerApp");
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
                <h4>Admin</h4></a>
        </div>
    </header>

    <div class="row allTop">
        <section class="column small-centered text-center loginForm small-6">
            <h2>Create User</h2>
            <div class="small-9 small-centered">
                <form class="" action="logic/handleUserRegister.php" method="post">
                    <label for="loginName">Username/Email</label>
                    <input type="text" name="name" id="loginName">

                    <label for="password">Password</label>
                    <input type="text" name="pass" id="password">

                    <label for="password">Enter Password Again</label>
                    <input type="text" name="pass2" id="password2">

                    <input class="button" type="submit" name="submit" value="Create User">
                </form>
            </div>
        </section>
    </div>
</body>
</html>
<?php require_once("components/req/footer.php") ?>