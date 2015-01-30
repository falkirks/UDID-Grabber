<?php
namespace udidgrabber\page;

use udidgrabber\Encryption;

class get extends Page{
    public function showPage(){
        $data = file_get_contents("php://input");
        preg_match_all("`<key>UDID</key>\n.<string>(.*)</string>`", $data, $out);
        if(isset($out[1][0])) {
            header("Location: /end?udid=" . urlencode(Encryption::encrypt($out[1][0])) . (strlen($out[1][0]) == 40 ? "&ios" : "&osx"), true, 301);
        }
        else{
            header("Location: /end", true, 301);
        }
    }
    public function hasPermission(){
        return true;
    }
}