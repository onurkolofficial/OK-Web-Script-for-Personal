<?php
// For Database: app_categories
$AppCategoryResult=$Query->Query($Server, "SELECT * FROM app_categories ORDER BY `app_categories`.`category_index` ASC");
// Set Variables
$AppCategoryCount=$Query->NumRows($AppCategoryResult);

// Get Category Row From Category Id
function getAppCategoryRow($Server, $Query, $CategoryId){
    $appResult=$Query->Query($Server, "SELECT * FROM app_categories WHERE id='$CategoryId'");
    return $Query->FetchAssoc($appResult);
}
?>