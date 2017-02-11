<?php

/**
 * Created by PhpStorm.
 * User: tony
 * Date: 1/20/17
 * Time: 5:29 PM
 */
class Inks
{
    public static function showAllInks(){
        try {
            $sql = "SELECT * FROM printerApp.inks order by inkModel";
            $result = Database::connect()->query($sql);
        }catch(Exception $e){
            $result = "This is the problem ".$e;
        }
        return $result;
    }

    public static function inkById($id){
        $sql = "SELECT * from rbdf.inks where id = '$id'";
        $dept = Database::connect()->query($sql);
        $dept = $dept->fetch();
        return $dept;
    }

    public static function inkSum(){
        $sql = "SELECT SUM(qnty) as total FROM printerApp.inkInventory";
        $exc = Database::connect()->query($sql);
        $total = $exc->fetch();
        if($total = NULL){
            return 0;
        }
        return $total['total'];
    }

}