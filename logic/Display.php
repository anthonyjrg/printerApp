<?php

/**
 * Created by PhpStorm.
 * User: tony
 * Date: 1/19/17
 * Time: 8:43 AM
 */
class Display
{

    public static function showTitle($title="Printers"){
        return $title;
    }
    /**
     * Return a string of li's, each containing the departments name and linking to printer listings by department, setting the id to the selected printer id
     * @return string
     */
    public static function liOfDept(){
        $list = "";
        foreach (Dept::showAllDept() as $dept){
            $list .= "<a href='index.php?p=bd&&deptId=".$dept['id']."'><li>".ucfirst($dept['name'])."</li></a> ";
        }
        return $list;
    }


    /**
     * Return a count of all object from given paramater
     * @param $listing
     * @return int
     */
    public static function total($listing=[]){
        return count($listing);
    }

    //Return list of all printers
    public static function unFrmtDeptList(){
        $list = "";
        foreach (Database::genDeptsLst() as $row){
            $list[] = $row['dept'];
        }
        return $list;
    }

    //Return list of all printers
    public static function unFrmtInkList(){
        $list = "";
        foreach (Database::genInkLst() as $row){
            $list[] = $row['modelNum'];
        }
        return $list;
    }


    /**
     * Takes string of file located in segments folder and returns fully qualified file name
     * @param $sect
     * @return string
     */
    public static function displayPage($sect){
        return "components/segments/".$sect.".php";
    }
    
    public static function dsplyDeptTable($deptId){
        $prnts = Printers::prntrByDeptId($deptId);
        if ($prnts){
                $deptTbl = "<table class='column small-12'><tr><th></th><th></th><th>IP Address</th><th>Ink Model</th><th>Last Ink Changed</th><th>Dept</th><th>Sub Dept</th><th></th></tr>";
                    foreach ($prnts as $prt) {
                        $subDept = SubDepts::getSubDeptById($prt['subDeptId']);
                        $deptTbl .= "<tr>
                        <td><h3>" . strtoupper(Printers::prntInfoBySubDeptPrtrId($prt['id'])['make']) . "</h3></td>
                        <td><h3>" . strtoupper(Printers::prntInfoBySubDeptPrtrId($prt['id'])['model']) . "</h3></td>
                        <td><a href='http://" . $prt['ip'] . "'>" . $prt['ip'] . "</a></td>
                        <td>" . Inks::inkById($prt['inkId'])['modelNum'] . " <span>(" . Inks::inkById($prt['inkId'])['qntInStck'] . " in stock)</span></td>
                        <td>" . $prt['lstInkChg'] . "</td>
                        <td>" . ucwords(Dept::DeptByDeptId($deptId['deptId'])) . "</td>
                        <td>" .ucwords($subDept['name']). "</td>
                        <td><a class='sm' href='index?p=ed'>edit</a><br><a class='sm' href='index?p=drv'>get driver-></a></td>
                        </tr>";
                }
                $deptTbl .= "</table>";
                return $deptTbl;
            }
        else{
            return "Sorry there are no printers for this department.";
        }
    }

    public static function dsplyAppPrtrTable(){
        $printers = Printers::showAllPrinters();
        if ($printers) {
            $deptTbl = "<table class='column small-12'><tr>
                    <th></th><th></th><th>IP Address</th><th>Ink Model</th><th>Last Ink Changed</th><th>Dept</th><th>Sub Dept</th><th></th>
                </tr>";
            foreach ($printers as $printer) {
                $deptId = $printer['id'];
                $deptTbl .= "<tr>
                    <td><h3>" . strtoupper(Printers::prntInfoBySubDeptPrtrId($deptId)['make']) . "</h3></td>
                    <td><h3>" .strtoupper(Printers::prntInfoBySubDeptPrtrId($deptId)['model']) . "</h3></td>
                    <td><a href='http://" . $printer['ip'] . "'>" . $printer['ip'] . "</a></td>
                    <td>" . Inks::inkById($printer['inkId'])['modelNum'] . " <span>(" . Inks::inkById($printer['inkId'])['qntInStck'] . " in stock)</span></td>
                    <td>" . $printer['lstInkChg'] . "</td>
                    <td>" . ucwords(SubDepts::deptName($deptId)). "</td>
                    <td>" . ucwords(SubDepts::subDeptName($deptId)). "</td>
                    <td><a class='sm' href='index?p=ed'>edit</a><br><a class='sm' href='index?p=drv'>get driver-></a></td>
                    </tr>";
            }
            $deptTbl .=  "</table>";

            return $deptTbl;
        }else{
            return "Sorry there are no printers for this department.";
        }
    }

    public static function levelCheck($pageLevel=5,$userLevel=0){
        if($userLevel>=$pageLevel){
            //do nothing
        }else{
            header("Location: /printerApp");
        }
    }
    //option lists
    public static function deptOptList(){
        $allDepts = Dept::showAllDept();
        $opt = "";
        foreach ($allDepts as $dept){
            $opt .= " <option value='".$dept['id']."'>".ucfirst($dept['name'])."</option> ";
        }
        return $opt;
    }
    
    public static function inksOptList(){
        $inks = Inks::showAllInks();
        $opts = "";
        foreach ($inks as $ink){
            $opts .= "<option value=".$ink['id'].">".$ink['inkModel']."</option> ";
        }
        return $opts;
    }

    public static function prntById($prntrId){
        $sql = "SELECT * from printerApp.prtr where id = '$prntrId' ";
        $exe = Database::connect()->query($sql);
        $prnt = $exe->fetch();
        return $prnt;
    }

    public static function subDeptOptListByDeptId($id){
        $subDepts = SubDepts::getSubDeptByDeptId($id);
        $opt = "";
        foreach ($subDepts as $subDept){
            $opt .= "<option value='".$subDept['id']."'>".ucwords($subDept['name'])."</option>";
        }
        return $opt;
    }

    public static function prtrOptListById($id){
        $sql = "SELECT printerId from printerApp.prtr where id = '$id'";
        $exe = Database::connect()->query($sql);
        $prntId = $exe->fetchAll()['printerId'];
        return $prntId;
    }
    
//    return printerId column, need to be refactored 
    public static function prtrsBySubDeptId($id){
        $sql = "SELECT * from printerApp.subDeptPrtr where subDeptId = '$id'";
        $exe = Database::connect()->query($sql);
        $prntrs = $exe->fetchAll()['printerId'];
        return $prntrs;
    }

    public static function allPrtrsBySubDeptId($id){
        $sql = "SELECT * from printerApp.subDeptPrtr where subDeptId = '$id'";
        $exe = Database::connect()->query($sql);
        $prntrs = $exe->fetchAll();
        return $prntrs;
    }

}
