<?php
namespace udidgrabber\page;

class api extends Page{
    public function showPage(){
        (new index())->showPage("This API accesspoint is <b>deprecated</b>. Use the main page instead.");
    }
    public function hasPermission(){
        return true;
    }
}