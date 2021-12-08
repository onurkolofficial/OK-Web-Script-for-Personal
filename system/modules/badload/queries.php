<?php
// Copyright (c) 2020 by Onur KOL

class QueryManager {
    public function Query($Server, $Query){
        return @mysqli_query($Server->Mysqli, $Query);
    }
    public function QueryDump($Server, $Query){
        return mysqli_query($Server->Mysqli, $Query);
    }
    public function FetchAssoc($QueryResult){
        return @mysqli_fetch_assoc($QueryResult);
    }
    public function FetchAssocDump($QueryResult){
        return mysqli_fetch_assoc($QueryResult);
    }
    public function FetchRow($QueryResult){
        return @mysqli_fetch_row($QueryResult);
    }
    public function FetchRowDump($QueryResult){
        return mysqli_fetch_row($QueryResult);
    }
    public function FetchArray($QueryResult){
        return @mysqli_fetch_array($QueryResult);
    }
    public function FetchArrayDump($QueryResult){
        return mysqli_fetch_array($QueryResult);
    }
    public function NumRows($QueryResult){
        return @mysqli_num_rows($QueryResult);
    }
    public function NumRowsDump($QueryResult){
        return mysqli_num_rows($QueryResult);
    }
}

// Define Class
global $Query;
$Query=new QueryManager();
?>