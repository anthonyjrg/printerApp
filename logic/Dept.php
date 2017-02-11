<?php

/**
 * Created by PhpStorm.
 * User: tony
 * Date: 1/21/17
 * Time: 7:01 PM
 */
class Dept
{
    public static function deptById($id){
        $sql = "SELECT * from rbdf.departments where id = '$id'";
        $dept = Database::connect()->query($sql);
        $dept = $dept->fetch();
        return $dept;
    }

    public static function showAllDept(){
        try {
            $sql = "SELECT * FROM printerApp.depts order by name";
            $result = Database::connect()->query($sql);
        }catch(Exception $e){
            $result = "This is the problem ".$e;
        }
        return $result;
    }

    /**
     * Takes a subdept deptid and returns its department
     * @param int $deptID
     * @return object
     */
    public static function DeptByDeptId($deptID){
        $sql = "Select * from printerApp.depts WHERE id = $deptID";
        $result = Database::connect()->query($sql);
        $result = $result->fetch();
        return $result;
    }

    public static function getDeptId($deptName){
        $sql="select id from rbdf.departments where dept = '".$deptName."'";
        $id = Database::connect()->query($sql);
        $id = $id->fetch();
        return $id;
    }
    
}