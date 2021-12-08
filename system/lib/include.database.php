<?php
// System Library File by Onur KOL

function includeDatabase($host, $username, $password, $database, $sIniManager=null, $ServerManager=null, $QueryManager=null, $SqlManager=null){
    // Get Database File
    $DatabaseFile=PATH_DATABASE."/database.sql";
    $ServerFile=PATH_SERVER."/server.ini";

    // Classes
    $IniManager=$sIniManager;
    $Server=$ServerManager;
    $Query=$QueryManager;
    $SQL=$SqlManager;

    if($IniManager==null)
        if(class_exists('IniFileManager'))
            $IniManager=new IniFileManager();
    if($Server==null)
        if(class_exists('ServerManager'))
            $Server=new ServerManager();
    if($Query==null)
        if(class_exists('QueryManager'))
            $Query=new QueryManager();
    if($SQL==null)
        if(class_exists('SQLManager'))
            $SQL=new SQLManager();

    // Read Server File
    $ServerDataFromIni=$IniManager->Read($ServerFile,true);

    // Check Server Connection
    if($Server->ConnectHost($host, $username, $password)){
        // Connect for Database
        if(!$Server->Mysqli->select_db($database)){
            // Create Database
            if(!$Query->Query($Server, "CREATE DATABASE $database")){
                header("Location: ?error=database");
            }
        }
        // Saving Data in system/server/server.ini File.
        $ServerDataFromIni['database']['db_server']=$host;
        $ServerDataFromIni['database']['db_name']=$database;
        $ServerDataFromIni['database']['db_user']=$username;
        $ServerDataFromIni['database']['db_password']=$password;
        // Commit
        $IniManager->Write($ServerFile, $ServerDataFromIni);

        // Include Database
        $SQL->Import($Server->Mysqli, $DatabaseFile);

        // Next Page
        header('Location: /install/account');
    }
    else{
        header("Location: ?error=connect");
    }
}
?>