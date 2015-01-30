<?php
namespace udidgrabber\page;

use udidgrabber\Encryption;

class index extends Page{
    public function showPage($message = false){
        //$user = SessionStore::getCurrentSession();
        echo $this->getTemplateEngine()->render($this->getTemplateSnip("page"), [
            "title" => "Welcome!",
            "content" => $this->getTemplateEngine()->render($this->getTemplate(), [
                "message" => ($message === false ? false : $message),
                "udid" => (isset($_COOKIE['udid']) ? Encryption::decrypt($_COOKIE['udid']) : false),
                "ios" => preg_match('~^(?:(?:(?:Mozilla/\d\.\d\s*\()+|Mobile\s*Safari\s*\d+\.\d+(\.\d+)?\s*)(?:iPhone(?:\s+Simulator)?|iPad|iPod);\s*(?:U;\s*)?(?:[a-z]+(?:-[a-z]+)?;\s*)?CPU\s*(?:iPhone\s*)?(?:OS\s*\d+_\d+(?:_\d+)?\s*)?(?:like|comme)\s*Mac\s*O?S?\s*X(?:;\s*[a-z]+(?:-[a-z]+)?)?\)\s*)?(?:AppleWebKit/\d+(?:\.\d+(?:\.\d+)?|\s*\+)?\s*)?(?:\(KHTML,\s*(?:like|comme)\s*Gecko\s*\)\s*)?(?:Version/\d+\.\d+(?:\.\d+)?\s*)?(?:Mobile/\w+\s*)?(?:Safari/\d+\.\d+(?:\.\d+)?.*)?$~',$_SERVER['HTTP_USER_AGENT']),
                "callback" => (isset($_GET['callback']) ? base64_decode($_GET['callback']) : false) //TODO add support for already set params
            ])
        ]);
    }
    public function hasPermission(){
        return true;
    }
}