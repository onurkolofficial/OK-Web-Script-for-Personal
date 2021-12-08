<?php
// Copyright (c) 2020 by Onur KOL

class ServerManager {
    // Connection Info
    public $ConnectServer;
    public $ConnectDatabaseName=null;
    public $ConnectUser;
    public $ConnectPassword;
    public $Mysqli;

    public function SetConnectInfo($Server,$User,$Password,$Database=null){
        $this->ConnectServer=$Server;
        $this->ConnectUser=$User;
        $this->ConnectPassword=$Password;
        if($Database!=null)
            $this->ConnectDatabaseName=$Database;
    }
    public function DestroyConnectInfo(){
        $this->ConnectServer=null;
        $this->ConnectUser=null;
        $this->ConnectPassword=null;
        $this->ConnectDatabaseName=null;
    }

    private function __CONNECT_CLASS($Report=false, $HostOnly=false){
        if($Report==true){
            if($HostOnly==true)
                return new mysqli($this->ConnectServer, $this->ConnectUser, $this->ConnectPassword);
            else
                return new mysqli($this->ConnectServer, $this->ConnectUser, $this->ConnectPassword, $this->ConnectDatabaseName);
        }
        else{
            if($HostOnly==true)
                return @new mysqli($this->ConnectServer, $this->ConnectUser, $this->ConnectPassword);
            else
                return @new mysqli($this->ConnectServer, $this->ConnectUser, $this->ConnectPassword, $this->ConnectDatabaseName);
        }
    }

    public function Connect(){
        $this->Mysqli=$this->__CONNECT_CLASS(false, false);
        return $this->Mysqli;
    }
    
    public function ConnectDump(){
        $this->Mysqli=$this->__CONNECT_CLASS(true, false);
        return $this->Mysqli;
    }

    public function ConnectHost($Server=null, $User=null, $Password=null){
        if($Server!=null || $User!=null || $Password!=null)
            $this->SetConnectInfo($Server, $User, $Password);
        $this->Mysqli=$this->__CONNECT_CLASS(false, true);
        return $this->Mysqli;
    }
    public function ConnectHostDump($Server,$User,$Password){
        if($Server!=null || $User!=null || $Password!=null)
            $this->SetConnectInfo($Server, $User, $Password);
        $this->Mysqli=$this->__CONNECT_CLASS(true, true);
        return $this->Mysqli;
    }

    public function ConnectDatabase($Server=null, $User=null, $Password=null, $Database=null){
        if($Server!=null || $User!=null || $Password!=null || $Database!=null)
            $this->SetConnectInfo($Server, $User, $Password, $Database);
        return $this->__CONNECT_CLASS(false, false);
    }
    public function ConnectDatabaseDump($Server=null, $User=null, $Password=null, $Database=null){
        if($Server!=null || $User!=null || $Password!=null || $Database!=null)
            $this->SetConnectInfo($Server, $User, $Password, $Database);
        return $this->__CONNECT_CLASS(true, false);
    }

    public function Disconnect(): void {
        @$this->Mysqli->close();
        @$this->DestroyConnectInfo();
    }

    public function DisconnectDump(): void {
        $this->Mysqli->close();
        $this->DestroyConnectInfo();
    }

    public function isConnectError(){
        return $this->Mysqli->connect_error;
    }
}

// Define Class
// Note! Required change '$Server' variable in 'badload/queries' if change '$Server' variable.
global $Server;
$Server=new ServerManager();
?>