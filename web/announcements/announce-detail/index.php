<!doctype html>
<html>
<?php
require $_SERVER['DOCUMENT_ROOT'].'/system/boot.php';

// Include Page Head
require PATH_SYSTEM_WEB.'/head.php';

// Get Variables
$announceId=$_GET['id']; // 'id' is default in '.htaccess' file.

// Get App Data
require PATH_DATA."/announcements.php";

$announceRow=getAnnouncementRow($Server, $Query, $announceId);

// Count and Update Read Count
$readCount=$announceRow['announcement_read_count'];
$readCount++;
$Query->Query($Server, "UPDATE announcements SET `announcement_read_count`='$readCount' WHERE `announcements`.`id` = '$announceId'");
?>
    <body>
        <!-- Loading Card !-->
		<div class="loadingCard">
			<p class="loadingTitle text-theme"><?php echo LANG_PLEASE_WAIT; ?> ...</p>
			<p class="loadingText"><?php echo LANG_LOADING_PAGE; ?> ...</p>
		</div>
        <!-- Navigation !-->
		<div class="navigationContainer">
            <?php require PATH_SYSTEM_WEB.'/navigation.php'; ?>
        </div>
        <div class="pageContent">
            <br>
			<h3 class="text-theme"><?php echo $announceRow['announcement_name']; ?></h3>
			<br>
			<p><?php echo nl2br($announceRow['announcement_message']); ?></p>
			<br><br><br>
			<small class="text-theme"><?php echo $announceRow['release_date']; ?></small>
			<br>
			<small class="text-theme">Onur Kol</small>
        </div>
    </body>
</html>