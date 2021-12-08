<?php
require $_SERVER['DOCUMENT_ROOT']."/system/boot.php";

// Close Session
$SessionManager->CloseSession();

// Redirect Home
header("Location: /");
?>
