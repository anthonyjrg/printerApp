<?php

/**
 * Created by PhpStorm.
 * User: tony
 * Date: 2/3/17
 * Time: 8:59 PM
 */
class SubDepts
{
    public static function deptName($id){
        $sql = "Select deptId from printerApp.subDept where id = '$id'";
        $exe = Database::connect()->query($sql);
        $dept = $exe->fetch();
        $sql = "Select name from printerApp.depts WHERE id = '".$dept['deptId']."'";
        $exe = Database::connect()->query($sql);
        $name = $exe->fetch();
        return ucwords($name['name']);
    }

    public static function subDeptName($id){
        $sql = "Select name from printerApp.subDept where id = '$id'";
        $exe = Database::connect()->query($sql);
        $name = $exe->fetch();
        return $name['name'];
    }

    public static function getSubDeptByDeptId($id){
        $sql = "Select * from printerApp.subDept where deptId = '$id'";
        $exe = Database::connect()->query($sql);
        $dept = $exe->fetchAll();
        return $dept;
    }

    public static function getSubDeptById($subDeptId){
        $sql = "Select * from printerApp.subDept where id = '$subDeptId'";
        $exe = Database::connect()->query($sql);
        $dept = $exe->fetch();
        return $dept;
    }
}