<?php
namespace udidgrabber;

use udidgrabber\page\index;
use udidgrabber\page\Page;

class PageRouter{
    public static function route(){
        session_start();
        $path = strtok(isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $_SERVER['PATH_INFO'], '?');
        $path = explode("/", ltrim($path, "/"));
        $main = array_shift($path);
        /*
         * NOTE
         *  Only add pages to the switch if you need to. In most cases they can just be autoloaded.
         */
        switch($main){
            case 'example':

                break;
            default:
                if(class_exists("udidgrabber\\page\\$main") && is_subclass_of("udidgrabber\\page\\$main", "udidgrabber\\page\\Page")){
                    $page = "udidgrabber\\page\\$main";
                    /** @var  Page */
                    $page = new $page();
                    if($page->hasPermission()){
                        $page->showPage();
                    }
                    else{
                        (new index())->showPage("You don't have permission to access the page you requested.");
                    }
                }
                else{
                    (new index())->showPage();
                }
                break;
        }
    }
}