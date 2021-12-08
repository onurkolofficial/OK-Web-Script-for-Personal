<!doctype html>
<html>
<?php
require $_SERVER['DOCUMENT_ROOT'].'/system/boot.php';

// Include Page Head
require PATH_SYSTEM_WEB.'/head.php';

// Get App Data
require PATH_DATA."/announcements.php";
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
			<div class="homeContent">
				<p class="welcome-title text-theme"><?php echo LANG_WELCOME; ?></p>
				<p class="welcome-title-small"><?php echo LANG_WELCOME_CAPTION; ?></p>
			</div>
            <!-- Announcements Space (Temporary)!-->
            <br><br><br><br><br><br><br>
			<!-- Announcements !-->
            <?php
                // Get Latest Announcement.
                $LatestAnnouncementRow=$Query->FetchAssoc($AnnouncementsResult);
            ?>
			<div class="latestAnnouncement">
				<p class="announceTitle"><?php echo $LatestAnnouncementRow['announcement_name']; ?></p>
				<div class="announceContent">
                    <?php echo nl2br($LatestAnnouncementRow['announcement_message_short']); ?>
				</div>
				<div class="announceAuthor">Onur Kol</div>
				<div class="announceDate"><?php echo $LatestAnnouncementRow['release_date']; ?></div>
			</div>
		</div>
    </body>
</html>