<?php
// Copyright (c) 2020 by Onur KOL

class FileManager {
    public function OpenFile($File,$Mode=null){
        if($Mode==null)
            $Mode="w";
        return $this->CurrentOpenFile=fopen($File,$Mode);
    }
    public function WriteFile($File=null,$WriteText){
        if($File==null)
            $File=$this->CurrentOpenFile;
        return fwrite($File,$WriteText);
    }
    public function CloseFile($OpenFile=null){
        if($OpenFile==null)
            $OpenFile=$this->CurrentOpenFile;
        return fclose($OpenFile);
    }
    public function DeleteFile($File=null){
        if($File==null)
            $File=$this->CurrentOpenFile;
        return unlink($File);
    }
    public function ReadFileContent($File){
        return file_get_contents($File);
    }
    public function WriteFileContents($File,$WriteText){
        return file_put_contents($File,$WriteText);
    }
    public function FileExists($File){
        return file_exists($File);
    }
}

// Define Class
global $FileManager;
$FileManager=new FileManager();
?>