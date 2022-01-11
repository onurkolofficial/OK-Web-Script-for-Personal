<?php
// For Database: app_categories
$ApplicationsResult=$Query->Query($Server, "SELECT * FROM applications ORDER BY STR_TO_DATE(app_release_date,'%d/%m/%Y %H:%i:%s') DESC");
// Set Variables
$AllApplicationCount=$Query->NumRows($ApplicationsResult);

// Get Count From Category
function getAppCountFromCategory($Server, $Query, $CategoryId){
    $caResult=$Query->Query($Server, "SELECT * FROM applications WHERE category_id='$CategoryId' ORDER BY STR_TO_DATE(app_release_date,'%d/%m/%Y %H:%i:%s') DESC");
    return $Query->NumRows($caResult);
}
// Get Result From Category
function getAppResultFromCategory($Server, $Query, $CategoryId){
    $caResult=$Query->Query($Server, "SELECT * FROM applications WHERE category_id='$CategoryId' ORDER BY STR_TO_DATE(app_release_date,'%d/%m/%Y %H:%i:%s') DESC");
    return $caResult;
}
// Get App Row From App Id
function getAppRow($Server, $Query, $AppId){
    $appResult=$Query->Query($Server, "SELECT * FROM applications WHERE id='$AppId'");
    return $Query->FetchAssoc($appResult);
}
?>