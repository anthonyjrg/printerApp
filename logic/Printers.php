<?php

/**
 * Created by PhpStorm.
 * User: tony
 * Date: 1/19/17
 * Time: 1:44 PM
 */
class Printers
{
   public static function addPrinter($make,$model,$ip,$ink,$deptid){

    }

    public static function showAllPrinters(){
        try {
            $sql = "SELECT * FROM printerApp.subDeptPrtr order by subDeptId";
            $result = Database::connect()->query($sql);
            $result = $result->fetchAll();
        }catch(Exception $e){
            $result = "This is the problem ".$e;
        }
        return $result;
    }
    
    public static function prntInfoBySubDeptPrtrId($id){
        $sql = "SELECT printerId from printerApp.subDeptPrtr where id = '$id'";
        $exe = Database::connect()->query($sql);
        $prntId = $exe->fetch()['printerId'];
        $sql = "SELECT * from printerApp.prtr WHERE id = '$prntId'";
        $exe = Database::connect()->query($sql);
        $prntr = $exe->fetch() ;
        return $prntr;
    }


    /**
     * takes a department id and returns a arrayObject of the printers info
     * @param int $id
     * @return PDOStatement
     */
    public static function prntrBySubDeptId($id){
        $sql = "SELECT * from printerApp.subDeptPrtr where id = '$id'";
        $dept = Database::connect()->query($sql);
        $dept = $dept->fetchAll();
        return $dept;
    }

    /**
     * Takes Department ID and returns all subDeptsPrtr ID's under the department
     * @param $id
     * @return array|PDOStatement
     */
    public static function prntrByDeptId($id){
        $sql = "SELECT * from printerApp.subDept where deptId = '$id'";
        $dept = Database::connect()->query($sql);
        $subDepts = $dept->fetchAll();
        $prtAry = array();
        foreach ($subDepts as $depts){
            $depts = $depts['id'];
            $sql = "Select * from printerApp.subDeptPrtr where subDeptId = '$depts'";
            $prtrs = Database::connect()->query($sql);
            if($prtrs){
            foreach ($prtrs as $prtr ){
                array_push($prtAry,$prtr);
                }
            }
        }
        return $prtAry;
    }

    public static function ShowPrtrBySubDeptId($id){
        $sql = "SELECT printerId from printerApp.subDeptPrtr where subDeptId = '$id'";
        $exe = Database::connect()->query($sql);
        $prntId = $exe->fetchAll()['printerId'];
        return $prntId;
    }

    public static function getPrtById($id){
        $sql = "SELECT printerId from printerApp.prtr where subDeptId = '$id'";
        $exe = Database::connect()->query($sql);
        $prnt = $exe->fetch();
        return $prnt;
    }


    public static function subDeptOfPrntr($deptId){
//        $sql = "Select * from printerApp.subDept WHERE id = ''"
    }
    
}