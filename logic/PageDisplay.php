<?php

/**
 * Created by PhpStorm.
 * User: tony
 * Date: 11/30/16
 * Time: 9:08 PM
 */
class PageDisplay
{

    /**
     * returns name of file to be loaded and array of css files to be loaded based on given url
     * @param String $url
     * @return array|string
     */
    public static function selectPage($url){
        switch($url){
            case ('a'):
                $sect = array(
                    "page"=>"all",
                    "css"=>array()
            ); break;
            //byDept.php
            case ('bd'):
                $sect = array(
                    "page"=>"byDept",
                    "title"=>"Printers By Department"
                ); break;
           //appPrinter.php
            case ('ap'):
                $sect = array(
                    "page"=>"addPrt",
                    "title"=>"Add a Printer",
                    "level"=>"4"
                ); break;

            case ('r'):
                $sect = array(
                    "page"=>"request"
                ); break;
               
            case ('ad'):
                $sect = array(
                    "page"=>"request"
                ); break;
            
            //ink change
            case ('ic'):
                $sect = array(
                    "page"=>"inkChange",
                    "title"=>"Ink Change",
                    "level"=>"2"
                ); break;
            //printer event
            case ('pe'):
                $sect = array(
                    "page"=>"prtrEvnt",
                    "title"=>"Log Printer Event",
                    "level"=>"3"
                ); break;
            case('ps'):
                $sect = array(
                    "page"=>"prtrSts",
                    "title"=>"Log Printer Status",
                    "level"=>"3"
                ); break;
            case('io'):
                $sect = array(
                    "page"=>"inkOrder",
                    "title"=>"Log Printer Status",
                    "level"=>"3"
                ); break;
            case('ir'):
                $sect = array(
                    "page"=>"inkRecvd",
                    "title"=>"Log Printer Status",
                    "level"=>"3"
                ); break;
            case('pr'):
                $sect = array(
                    "page"=>"prtrRpt",
                    "title"=>"Log Printer Status",
                    "level"=>"3"
                ); break;
            
            default:
                $sect = array(
                    "page"=>"index",
                );
        }
        return $sect;
    }
    
    
    public static function loginCheck($page){

        $dbh = new PDO("mysql:host=localhost;dbname=printerApp", "technician", "rbdf");

        $config = new PHPAuth\Config($dbh);
        $auth   = new PHPAuth\Auth($dbh, $config);

        if (!$auth->isLogged()) {
            if($page=="index"){
                $auth = 0;
            }else {
                header('HTTP/1.0 403 Forbidden');
                echo "Forbidden";

                exit();
            }
        }
    }
}