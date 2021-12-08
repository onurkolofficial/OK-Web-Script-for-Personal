<?php
// Copyright (c) 2020 by Onur KOL

class KeyGenerator {
    public function Create(){
        $key=substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10/strlen($x)) )),1,10);
        return $key;
    }
    public function CreateKey($length=10){
        $key=substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
        return $key;
    }
    public function CreateChars($length=10){
        $key=substr(str_shuffle(str_repeat($x='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
        return $key;
    }
    public function CreateNumeric($length=10){
        $key=substr(str_shuffle(str_repeat($x='0123456789', ceil($length/strlen($x)) )),1,$length);
        return $key;
    }
}

// Define Class
global $KeyGen;
$KeyGen=new KeyGenerator();
?>