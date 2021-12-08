<?php
// Connection Server

$serverFile=PATH_SERVER."/server.ini";

// Check Server File
if(file_exists($serverFile)){
    // Reading Server File
    $serverInfo=$IniManager->Read($serverFile);

    // Get Values
    $server=$serverInfo['db_server'];
    $user=$serverInfo['db_user'];
    $password=$serverInfo['db_password'];
    $database=$serverInfo['db_name'];

    // Check Server Connection
    $Server->SetConnectInfo($server,$user,$password,$database);
    $Server->Connect();
    if($Server->isConnectError()){
        // Connection Failed
        if($VAR_BOOT_MODE==BOOT_MODE_WEB)
            header("Location: /install");
    }
    else{
        // Connection Success.
        if($VAR_BOOT_MODE==BOOT_MODE_CONFIG)
            header("Location: /");
    }
}
else{
    echo "ERROR! Server file not found! Please re-install system.";
    exit;
}
?>