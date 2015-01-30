<?php
namespace udidgrabber\page;

class remove extends Page{
    public function showPage(){
        setcookie ("udid", "", time() - 3600);
    }
    public function hasPermission(){
        return true;
    }
}