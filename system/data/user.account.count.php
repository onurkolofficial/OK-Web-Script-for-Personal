<?php
// For Database: users
$queryResult=$Query->Query($Server, "SELECT * FROM users");
// Set Variable
$UserCount=$Query->NumRows($queryResult);

// Get User Result from Username and Password
function getUserResult($Server, $Query, $Username, $Password){
    $userResult=$Query->Query($Server, "SELECT * FROM users WHERE username LIKE '$Username' AND `password` LIKE '$Password'");
    return $userResult;
}
?>