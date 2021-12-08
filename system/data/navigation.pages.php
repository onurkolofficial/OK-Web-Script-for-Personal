<?php
// For Database: pages
$NavigationPageResult=$Query->Query($Server, "SELECT * FROM pages ORDER BY `pages`.`page_index` ASC");
// Set Variables
$NavigationPageCount=$Query->NumRows($NavigationPageResult);

// Get Page Row From ID
function getPageRowFromID($Server, $Query, $PageID){
    $pageResult=$Query->Query($Server, "SELECT * FROM pages WHERE page_id='$PageID'");
    return $Query->FetchAssoc($pageResult);
}
?>