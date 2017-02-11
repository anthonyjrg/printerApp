<?php
require '../vendor/autoload.php';
$id = $_GET['id'];
$result = Display::allPrtrsBySubDeptId($id);
$li = "";
foreach ($result as $prtr){
    $prtMM = Display::prntById($prtr['printerId']);
    $li .= "<option value='".$prtr['id']."'>".ucwords($prtMM['make'])." ".$prtMM['model']."</option> ";
}
echo $li;