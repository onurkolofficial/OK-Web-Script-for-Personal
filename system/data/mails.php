<?php
// For Database: app_categories
$MailsResult=$Query->Query($Server, "SELECT * FROM mails ORDER BY `mails`.`date` DESC");
// Set Variables
$MailsCount=$Query->NumRows($MailsResult);

// Get Mail Result From ID
function getMailResultFromID($Server, $Query, $MailID){
    $mailResult=$Query->Query($Server, "SELECT * FROM mails WHERE id='$MailID'");
    return $mailResult;
}
// Get Mail Row From ID
function getMailRowFromID($Server, $Query, $MailID){
    $mailResult=$Query->Query($Server, "SELECT * FROM mails WHERE id='$MailID'");
    return $Query->FetchAssoc($mailResult);
}
?>