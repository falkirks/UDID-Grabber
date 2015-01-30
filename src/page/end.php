<?php
namespace udidgrabber\page;

use udidgrabber\Encryption;

class end extends Page{
    public function showPage(){
        if(isset($_GET['udid'])){
            $udid = Encryption::decrypt(urldecode($_GET['udid']));
            if(strlen($udid) == 40 || isset($_GET['osx'])){
                setcookie("udid", $_GET['udid'], time() + (86400 * 365));
                echo $this->getTemplateEngine()->render($this->getTemplateSnip("page"), [
                    "title" => "Closing...",
                    "content" => $this->getTemplateEngine()->render($this->getTemplate())
                ]);
            }
            else{
                (new index())->showPage("Your UDID data is invalid.");
            }
        }
        else{
            (new index())->showPage("No UDID could be found in the stream.");
        }
    }
    public function hasPermission(){
        return true;
    }
}