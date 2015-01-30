<?php
namespace udidgrabber;

class Encryption {
    const KEY = "set a key here";
    const SALT = "set a salt here";
    public static function encrypt($str){
        return mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5(Encryption::KEY), $str, MCRYPT_MODE_CBC, md5(md5(Encryption::KEY)));
    }
    public static function decrypt($str){
        return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5(Encryption::KEY), $str, MCRYPT_MODE_CBC, md5(md5(Encryption::KEY))), "\0");
    }
    public static function hashSalt($str){
        return md5($str . Encryption::SALT);
    }
}