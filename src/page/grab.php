<?php
namespace udidgrabber\page;

class grab extends Page{
    public function showPage(){
        header('Content-type: application/x-apple-aspen-config; chatset=utf-8');
        if(file_exists(MAIN_PATH . "/private/signed.mobileconfig")){
            echo file_get_contents(MAIN_PATH . "/private/signed.mobileconfig");
        }
        else {
            echo $this->getTemplateEngine()->render(file_get_contents(MAIN_PATH . "/private/unsigned.mobileconfig"), ["url" => "http://$_SERVER[HTTP_HOST]/get"]);
        }
    }
    public function hasPermission(){
        return true;
    }
}