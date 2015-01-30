<?php
namespace udidgrabber\page;

class query extends Page{
    public function showPage(){
        if(isset($_COOKIE['udid'])){
            echo "true";
        }
        else{
            echo "false";
        }
    }
    public function hasPermission(){
        return true;
    }
}