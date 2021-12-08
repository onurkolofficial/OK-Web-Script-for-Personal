<?php
// Web Script Boot File by Onur KOL
// Exec System Files
require "session.php";
require "version.php";
require "vars.php";

// Exec All Modules
foreach(glob(PATH_MODULES.'/*.php') as $module){
    require $module;
}
// Bad Load Modules
foreach(glob(PATH_MODULES_BADLOAD.'/*.php') as $module){
    require $module;
}

// Check Secure Boot for Web (install page)
if(isset($BOOT_FOR_SECURE)){
    $VAR_BOOT_MODE=BOOT_MODE_CONFIG;
}

// Exec Language
require PATH_PROCESS."/language.proc.php";
// Exec Cookies
// require PATH_PROCESS."/cookie.proc.php";

// Check Connections
require PATH_SERVER."/connect.php";

// Exec Sessions
if($VAR_BOOT_MODE==BOOT_MODE_WEB){
    require PATH_PROCESS."/session.proc.php";
}


// Completed Booting System.
// Next look is Web Index Files.
?>