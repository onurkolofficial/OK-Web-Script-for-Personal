<?php
// System Process File by Onur KOL

// Get User Session
$UserSession=$SessionManager->GetSession(KEY_SESSION_USER_NAME);

require PATH_DATA."/admin.account.count.php";

// Check Admin Pages (uri /admin*) & User Info
// for PHP 7
if(strpos($_SERVER['REQUEST_URI'],"/admin") !== false){
    if($UserSession==false){
        // Not Logged in.
        header("Location: /");
    }
    else{
        // Logged in but account is not admin.
        $Count=getAdminCount($Server, $Query, $UserSession);
        if($Count<=0){
            header("Location: /");
        }
    }
}
?>