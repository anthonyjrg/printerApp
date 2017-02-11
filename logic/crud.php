<?php
/**
 * Created by PhpStorm.
 * User: tony
 * Date: 1/21/17
 * Time: 9:08 PM
 */
if ($_POST['submit']) {
    //check hidden field on form to determine CRUD
    if($_POST['type']=="addPrntr") {
        
       $sql = "INSERT INTO `rbdf`.`printers` (`make`, `model`, `ipAddr`, `inkId`, `deptId`, `lstInkChg`, `pthToDrvr`) VALUES ('$make', '$model', '$ip', '$inkId', '$deptId', '', '$dvrPt');
";
    }
}