<?php require '../vendor/autoload.php'; ?>

<?php
    $id = $_GET['id'];
    echo "<option value=\"\" disabled selected> </option> ".Display::subDeptOptListByDeptId($id);
    

