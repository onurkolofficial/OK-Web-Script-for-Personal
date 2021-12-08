<?php
// System Variable File by Onur KOL

//*** Constants
// Paths
define('PATH_ROOT',$_SERVER['DOCUMENT_ROOT']);
define('PATH_SYSTEM',$_SERVER['DOCUMENT_ROOT'].'/system');
define('PATH_MODULES',$_SERVER['DOCUMENT_ROOT'].'/system/modules');
define('PATH_MODULES_BADLOAD',$_SERVER['DOCUMENT_ROOT'].'/system/modules/badload');
define('PATH_LIB',$_SERVER['DOCUMENT_ROOT'].'/system/lib');
define('PATH_LANGUAGES',$_SERVER['DOCUMENT_ROOT'].'/system/languages');
define('PATH_PROCESS',$_SERVER['DOCUMENT_ROOT'].'/system/process');
define('PATH_DATA',$_SERVER['DOCUMENT_ROOT'].'/system/data');
define('PATH_DATABASE',$_SERVER['DOCUMENT_ROOT'].'/system/database');
define('PATH_SERVER',$_SERVER['DOCUMENT_ROOT'].'/system/server');
define('PATH_SYSTEM_WEB',$_SERVER['DOCUMENT_ROOT'].'/system/web');
define('PATH_WEB',$_SERVER['DOCUMENT_ROOT'].'/web');

// Boot Modes
define('BOOT_MODE_WEB', 1000001);
define('BOOT_MODE_CONFIG', 1000000);

// Keys
define('KEY_SESSION_USER_NAME','SYSTEM_SESSION_USER_NAME');
define('KEY_NO_LANGUAGE','SYSTEM_NO_LANGUAGE');
define('KEY_COOKIE_LANGUAGE','COOKIE_LANGUAGE');
define('KEY_GET_LANGUAGE','GET_LANGUAGE');

// Language Codes
define('CODE_LANGUAGE_ENGLISH','en');
define('CODE_LANGUAGE_TURKISH','tr');

//  Variables
if(!isset($VAR_BOOT_MODE))
    $VAR_BOOT_MODE=BOOT_MODE_WEB;
$VAR_SYSTEM_LANGUAGE=KEY_NO_LANGUAGE;
?>