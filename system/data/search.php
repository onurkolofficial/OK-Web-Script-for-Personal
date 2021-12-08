<?php
// Get Search Result 
function getSearchResult($Server, $Query, $CategoryId, $Keyword){
    if($CategoryId=='announcements')
	    $SearchResult=$Query->Query($Server, "SELECT * FROM announcements WHERE `announcement_name` LIKE '%$Keyword%'");
    else if($CategoryId=='apps')
	    $SearchResult=$Query->Query($Server, "SELECT * FROM applications WHERE `app_name` LIKE '%$Keyword%'");
    else if($CategoryId=='users')
	    $SearchResult=$Query->Query($Server, "SELECT * FROM users WHERE `name` LIKE '%$Keyword%'");

    return $SearchResult;
}
?>