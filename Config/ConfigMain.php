<?php
namespace Config;


class ConfigMain{

    private static $MAIN_URL = "http://localhost/g_t_task/";


    public static function getMainUrl(){
        return self::$MAIN_URL;
    }

    public static function getPublicUrl(){
        return self::$MAIN_URL . "public/";
    }

    public static function getDirView(){
        return "Views/";
    }

}
