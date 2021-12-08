<?php
// Copyright (c) 2020 by Onur KOL

class SQLManager {
    public function Import($mysqli, $sqlfile){
        // Import SQL Database File
        $query = '';
        $sqlScript = file($sqlfile);
        foreach($sqlScript as $line){
            $startWith = substr(trim($line), 0 ,2);
            $endWith = substr(trim($line), -1 ,1);
            if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
                continue;
            }
            $query=$query.$line;
            if ($endWith==';') {
                $mysqli->query($query) or die('<script>window.location.reload();</script>');
                $query= '';		
            }
        }
    }
}

// Define Class
global $SQLManager;
$SQLManager=new SQLManager();
?>