<!doctype html>
<html>
<?php
require $_SERVER['DOCUMENT_ROOT'].'/system/boot.php';

// Get Variables
$isLoad=@$_POST['load'];

$announceID=@$_GET['id'];

$announceName=@$_POST['name'];
$announceShort=@$_POST['short'];
$announceMessage=@$_POST['message'];

// Save Data
if($isLoad=="true"){
    if($Query->Query($Server, "UPDATE announcements SET `announcement_name`='$announceName', `announcement_message_short`='$announceShort', `announcement_message`='$announceMessage' WHERE `announcements`.`id`='$announceID'"))
        header("Location: /admin/announcements");
}

// Get App Data
require PATH_DATA."/announcements.php";

// Get Data from Announce ID
$Row=getAnnouncementRow($Server, $Query, $announceID);

// Include Page Head
require PATH_SYSTEM_WEB.'/head.php';
?>
    <body>
        <!-- Loading Dialog !-->
		<?php require PATH_SYSTEM_WEB.'/loading.dialog.php'; ?>
        <!-- Navigation !-->
		<div class="navigationContainer">
        <?php
                $navigationTitle=LANG_EDIT_ANNOUNCE;
                require PATH_SYSTEM_WEB.'/navigation.admin.php';
            ?>
        </div>
        <div class="pageContent">
        <div class="formContent">
				<p class="form-note"><?php echo LANG_EDIT_ANNOUNCE_TITLE; ?></p>
				<form method="POST" action="">
                    <input type="hidden" name="load" value="true">
					<div>
						<span class="material-icons">border_color</span>
						<label for="name"><?php echo LANG_ANNOUNCE_NAME; ?>:</label>
						<input type="text" id="name" name="name" <?php echo 'value="'.$Row['announcement_name'].'" placeholder="'.LANG_ANNOUNCE_NAME.'"'; ?> required="required" autofocus />
					</div>
					<div>
						<span class="material-icons">border_color</span>
						<label for="short"><?php echo LANG_ANNOUNCE_SHORT; ?> :</label>
						<input type="text" id="short" name="short" <?php echo 'value="'.$Row['announcement_message_short'].'" placeholder="'.LANG_ANNOUNCE_SHORT.'"'; ?> required="required" autofocus />
					</div>
					<div>
						<span class="material-icons">message</span>
						<label for="message"><?php echo LANG_ANNOUNCE_MESSAGE; ?> :</label>
						<textarea id="message" name="message" <?php echo 'placeholder="'.LANG_ANNOUNCE_MESSAGE.'"'; ?> required="required" style="height:160px;"><?php echo $Row['announcement_message']; ?></textarea>
					</div>
					<div class="form-buttons">
                        <input type="reset" <?php echo 'value="'.LANG_RESET.'"'; ?> id="reset" />
						<input type="submit" class="btn-theme" <?php echo 'value="'.LANG_APPLY.'"'; ?> id="submit"/>
					</div>
				</form>
			</div>
        </div>
    </body>
</html>