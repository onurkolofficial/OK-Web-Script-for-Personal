<?php
// System Library File by Onur KOL

function startConnectionTest($host, $username, $password, $ServerManager=null){
    $Server=$ServerManager;

    if($Server==null)
        if(class_exists('ServerManager'))
            $Server=new ServerManager();

    $Server->ConnectHost($host, $username, $password);
    if($Server->isConnectError()){
        return false;
    }
    else{
        return true;
    }
}
?>