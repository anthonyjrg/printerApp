<?php require 'vendor/autoload.php'; ?>
<?php $page = PageDisplay::selectPage(
    $_GET["p"])["page"]; 
    $level = PageDisplay::selectPage($_GET["p"])["level"] ;
    $title = PageDisplay::selectPage($_GET["p"])["title"]
?>
<?php require_once("components/req/header.php") ?>
<?php require_once (Display::displayPage($page)); ?>
<?php require_once("components/req/footer.php") ?>


