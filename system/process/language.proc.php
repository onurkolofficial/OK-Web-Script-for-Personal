<?php
// System Process File by Onur KOL

// Set Default Language
$VAR_SYSTEM_LANGUAGE=CODE_LANGUAGE_ENGLISH;

// Language change and save cookie if get value.
// Note! $_GET[' lang '] 
// 'lang' keyword set to .htaccess file. Change .htaccess file if change 'lang' keyword.
if(isset($_GET['lang']) && !empty($_GET['lang'])){
    // Check Exists
    $dir = PATH_LANGUAGES.'/'.$_GET['lang'].'/';
    if($FileManager->FileExists($dir))
        $VAR_SYSTEM_LANGUAGE=$_GET['lang'];
}
else{
    // Checking & setting cookies to standard boot. 
    if($CookieManager->GetCookie(KEY_COOKIE_LANGUAGE))
        $VAR_SYSTEM_LANGUAGE=$CookieManager->GetCookie(KEY_COOKIE_LANGUAGE);
}
// Set Language Cookie
$CookieManager->SetCookie(KEY_COOKIE_LANGUAGE,$VAR_SYSTEM_LANGUAGE);

// Include All Language Files
foreach(glob(PATH_LANGUAGES.'/'.$VAR_SYSTEM_LANGUAGE.'/*.language.php') as $language){
    require $language;
}
?>