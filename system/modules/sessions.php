<?php
// Copyright (c) 2020 by Onur KOL

class SessionManager {
    public function SetSession($SessionName,$SessionValue){
        return $_SESSION[$SessionName]=$SessionValue;
    }
    public function GetSession($SessionName){
        if(isset($_SESSION[$SessionName]))
            return $_SESSION[$SessionName];
        else
            return false;
    }
    public function GetSessionExist($SessionName){
        return isset($_SESSION[$SessionName]);
    }
    public function CloseSession(){
        return session_destroy();
    }
}

// Define Class
global $SessionManager;
$SessionManager=new SessionManager();
?>