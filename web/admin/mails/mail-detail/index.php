<!doctype html>
<html>
<?php
require $_SERVER['DOCUMENT_ROOT'].'/system/boot.php';

// Get Variables
$mailID=$_GET['id']; // 'id' is default in '.htaccess' file.

// Get App Data
require PATH_DATA."/mails.php";

$mailRow=getMailRowFromID($Server, $Query, $mailID);

// Change Mail Status
$mailStatus=$mailRow['isRead'];
if($mailStatus=="0")
    $Query->Query($Server, "UPDATE mails SET `isRead`='1' WHERE `mails`.`id`='$mailID'");

// Include Page Head
require PATH_SYSTEM_WEB.'/head.admin.php';
?>
    <body>
        <!-- Loading Card !-->
		<div class="loadingCard">
			<p class="loadingTitle text-theme"><?php echo LANG_PLEASE_WAIT; ?> ...</p>
			<p class="loadingText"><?php echo LANG_LOADING_PAGE; ?> ...</p>
		</div>
        <!-- Navigation !-->
		<div class="navigationContainer">
            <?php require PATH_SYSTEM_WEB.'/navigation.admin.php'; ?>
        </div>
        <div class="pageContent">
            <br>
			<h3 class="text-theme"><?php echo $mailRow['subject']; ?></h3>
			<br>
			<p><?php echo nl2br($mailRow['message']); ?></p>
			<br><br><br>
			<small class="text-theme"><?php echo $mailRow['date']; ?></small>
			<br>
			<small class="text-theme"><?php echo $mailRow['name'].' ( '.$mailRow['email'].' )'; ?></small>
        </div>
    </body>
</html>