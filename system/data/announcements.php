<?php
// For Database: users > isAdmin:count
$AnnouncementsResult=$Query->Query($Server, "SELECT * FROM announcements ORDER BY STR_TO_DATE(release_date,'%d/%m/%Y %H:%i:%s') DESC");
// Set Variables
$AnnouncementsCount=$Query->NumRows($AnnouncementsResult);

// Get Announce Result From Id, and Limit
function getAnnouncementResult($Server, $Query, $Limit=null){
    if($Limit!=null)
        return $Query->Query($Server, "SELECT * FROM announcements ORDER BY STR_TO_DATE(release_date,'%d/%m/%Y %H:%i:%s') DESC LIMIT 0,$Limit");
    else
        return $Query->Query($Server, "SELECT * FROM announcements ORDER BY STR_TO_DATE(release_date,'%d/%m/%Y %H:%i:%s') DESC");
} 
// Get Announce Row From Id
function getAnnouncementRow($Server, $Query, $AnnounceId){
    $announceResult=$Query->Query($Server, "SELECT * FROM announcements WHERE id='$AnnounceId'");
    return $Query->FetchAssoc($announceResult);
}
?>