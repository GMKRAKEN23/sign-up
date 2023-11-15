<?php

if(session_status() === PHP_SESSION_NONE){
    session_start();
}

function get_language_file()
{
    $_SESSION['lang'] = $_SESSION['lang'] ?? "fr";
    $_SESSION['lang'] = $_GET['lang'] ?? $_SESSION['lang'];

    return $_SESSION['lang'] . '.php';
}

function __($str)
{
    global $lang;

    {
        $languagefile = get_language_file();

        if(file_exists($languagefile)){
            include $languagefile;

            if(!empty($lang[$str])){
            return $lang[$str];
        }
        }
        return $str; 
    }


}
?>