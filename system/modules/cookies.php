<?php
// Copyright (c) 2020 by Onur KOL

class CookieManager {
    public function SetCookie($CookieName,$CookieValue,$CookieTime=null,$CookiePath=null){
        if($CookieTime==null)
            $CookieTime=time()+(86400*30);
        if($CookiePath==null)
            $CookiePath="/";
        // Set Cookie
        setcookie($CookieName,$CookieValue,$CookieTime, $CookiePath);
        return isset($_COOKIE[$CookieName]);
    }
    public function GetCookie($CookieName){
        if(isset($_COOKIE[$CookieName]))
            return $_COOKIE[$CookieName];
        else
            return false;
    }
    public function GetCookieExist($CookieName){
        return isset($_COOKIE[$CookieName]);
    }
}

// Define Class
global $CookieManager;
$CookieManager=new CookieManager();
?>