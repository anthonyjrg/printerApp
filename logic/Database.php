<?php

/**
 * Created by PhpStorm.
 * User: tony
 * Date: 1/18/17
 * Time: 2:01 PM
 */
class Database
{
    private static $DSN = "mysql:dbname=printerApp;host=127.0.0.1";
    private static $USER = "technician";
    private static $PASS = "rbdf";

    //Connect to database, if connection fails give error message before page loads.
    public static function connect(){
        try {
            $dbc = new PDO(self::$DSN,self::$USER,self::$PASS);
            return $dbc;
        }catch (Exception $e){
            return "We have a problem :".$e->getMessage();
        }
    }
    //show all printer based on department
    public static function showPrntByDpmt($dept) {
        $id = "SELECT id from rbdf.departments where dept = '$dept'";
        $id = self::connect()->query($id);
        $id = $id->fetch();
        $id = $id['id'];
        $sql = "Select * from rbdf.printers where deptId = '$id'";
        $rows = self::connect()->query($sql);
        return $rows;
    }

    //Get list of department names
    public static function genDeptsLst(){
        $sql = "SELECT dept from rbdf.departments";
        $rows = self::connect()->query($sql);
        return $rows;
    }

    //Return ink list
    public static function genInkLst(){
        $sql = "SELECT modelNum from rbdf.inks";
        $rows = self::connect()->query($sql);
        return $rows;
    }
    
    //Get ink by inkID
    public static function getInkByID($inkId) {
        $id = "SELECT modelNum from rbdf.inks where id = '$inkId'";
        $id = self::connect()->query($id);
        $id = $id->fetch();
        $ink = $id['modelNum'];
        return $ink;
    }
    //Get department based on Id
    public static function getDeptByID($deptId){
            $sql = "SELECT dept, subDept from rbdf.departments where id = '$deptId'";
            $dept = self::connect()->query($sql);
            $dept = $dept->fetch();
            return $dept;
    }
}