<?php
// For Database: users > isAdmin:count
$queryResult=$Query->Query($Server, "SELECT * FROM users WHERE isAdmin='1'");
// Set Variable
$AdminCount=$Query->NumRows($queryResult);


// Get Admin Result
function getAdminResult($Server, $Query, $Username){
    $adminResult=$Query->Query($Server, "SELECT * FROM users WHERE username LIKE '$Username' AND isAdmin='1'");
    return $adminResult;
}
// Get Admin Row
function getAdminRow($Server, $Query, $Username){
    $adminResult=$Query->Query($Server, "SELECT * FROM users WHERE username LIKE '$Username' AND isAdmin='1'");
    return $Query->FetchAssoc($adminResult);
}
// Get Admin Count
function getAdminCount($Server, $Query, $Username){
    $adminResult=$Query->Query($Server, "SELECT * FROM users WHERE username LIKE '$Username' AND isAdmin='1'");
    return $Query->NumRows($adminResult);
}
?>