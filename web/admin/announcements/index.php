<!doctype html>
<html>
<?php
require $_SERVER['DOCUMENT_ROOT'].'/system/boot.php';

// Get Variables
$dataAction=@$_GET['action'];
$announceId=@$_GET['id'];

if($dataAction=="delete"){
    // Delete Mail
    $deleteAnnounceSql="DELETE FROM `announcements` WHERE `announcements`.`id`='$announceId'";
    if($Query->Query($Server, $deleteAnnounceSql)){
        header('Location: /admin/announcements');
    }
}

// Get App Data
require PATH_DATA."/announcements.php";

$announcementLimit=5;
$AnnouncementLimitedResult=getAnnouncementResult($Server, $Query, $announcementLimit);

// Include Page Head
require PATH_SYSTEM_WEB.'/head.admin.php';
?>
    <body>
        <!-- Loading Dialog !-->
		<?php require PATH_SYSTEM_WEB.'/loading.dialog.php'; ?>
        <!-- Navigation !-->
		<div class="navigationContainer">
            <?php require PATH_SYSTEM_WEB.'/navigation.admin.php'; ?>
        </div>
        <!-- Custom Dialogs !-->
        <div id="deleteAnnounceDialog" data-link="/admin/announcements" data-process="?action=delete&id=%s" class="dialog">
			<div class="dialogContainer">	
				<div class="dialogBody">
					<p class="dialogTitle text-theme"><?php echo LANG_DELETE_ANNOUNCE; ?></p>
					<p class="dialogText"><?php echo LANG_DELETE_ANNOUNCE_QUESTION; ?></p>
				</div>
				<div class="dialogActionButtons">
					<input type="button" dialog-close="deleteAnnounceDialog" <?php echo 'value="'.LANG_NO.'"'; ?>>
					<input type="button" dialog-action="deleteAnnounceDialog" class="btn-theme" <?php echo 'value="'.LANG_YES.'"'; ?>>
				</div>
			</div>
		</div>
		<!-- Page Content !-->
        <div class="pageContent">
        <div class="adminActionNavigation">
				<div class="actionButtons">
					<a href="/admin/announcements/new">
						<input type="button" class="btn-theme" <?php echo 'value="'.LANG_NEW_ANNOUNCE.'"'; ?>>
					</a>
				</div>
			</div>
			<table>
				<caption><?php echo str_replace('%i', $announcementLimit, LANG_LAST_COUNT_ANNOUNCE); ?></caption>
				<thead>
					<tr>
						<th scope="col"><?php echo LANG_ACTION; ?></th>
						<th scope="col" colspan="2"><?php echo LANG_TITLE; ?></th>
						<th scope="col"><?php echo LANG_DATE; ?></th>
					</tr>
				</thead>
				<tbody>
                    <?php
						while($Row=$Query->FetchAssoc($AnnouncementLimitedResult)){
					?>
					<tr>
						<td data-label="">
							<div class="tableActionMenu">
								<button dialog="deleteAnnounceDialog" <?php echo 'dialog-data="'.$Row['id'].'"'; ?> class="btn-icon btn-danger">
									<span class="material-icons">delete</span>
								</button>
								<a <?php echo 'href="/admin/announcements/edit?id='.$Row['id'].'"'; ?>>
                                    <button class="btn-icon btn-theme">
                                        <span class="material-icons">border_color</span>
                                    </button>
                                </a>
							</div>
						</td>
						<td <?php echo 'data-label="'.LANG_TITLE.'"'; ?> colspan="2">
							<a <?php echo 'href="/announcements/'.$Row['id'].'"'; ?>><?php echo $Row['announcement_name']; ?></a>
						</td>
						<td <?php echo 'data-label="'.LANG_DATE.'"'; ?>><?php echo $Row['release_date']; ?></td>
					</tr>
                    <?php
                        }
                    ?>
				</tbody>
			</table>
        </div>
    </body>
</html>