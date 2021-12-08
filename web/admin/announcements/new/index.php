<!doctype html>
<html>
<?php
require $_SERVER['DOCUMENT_ROOT'].'/system/boot.php';

// Get Variables
$isLoad=@$_POST['load'];

$announceName=@$_POST['name'];
$announceShort=@$_POST['short'];
$announceMessage=@$_POST['message'];

// Get App Data
require PATH_DATA."/announcements.php";

// Save Data
if($isLoad=="true"){
    // Generate Announce ID
	$AnnounceID=$KeyGen->CreateKey(55);
    // Add Announce
    $announceSQL="INSERT INTO `announcements` (`id`, `release_date`, `announcement_name`, `announcement_message_short`, `announcement_message`, `announcement_read_count`) VALUES ('$AnnounceID', '$defaultLiveDate', '$announceName', '$announceShort', '$announceMessage', 0)";
    if($Query->Query($Server, $announceSQL))
        header("Location: /admin/announcements");
}

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
            <?php
                $navigationTitle=LANG_NEW_ANNOUNCE;
                require PATH_SYSTEM_WEB.'/navigation.admin.php';
            ?>
        </div>
        <div class="pageContent">
            <div class="formContent">
				<p class="form-note"><?php echo LANG_NEW_ANNOUNCE_TITLE; ?></p>
				<form method="POST" action="">
                    <input type="hidden" name="load" value="true">
					<div>
						<span class="material-icons">border_color</span>
						<label for="name"><?php echo LANG_ANNOUNCE_NAME; ?>:</label>
						<input type="text" id="name" name="name" value="" <?php echo 'placeholder="'.LANG_ANNOUNCE_NAME.'"'; ?> required="required" autofocus />
					</div>
					<div>
						<span class="material-icons">border_color</span>
						<label for="short"><?php echo LANG_ANNOUNCE_SHORT; ?> :</label>
						<input type="text" id="short" name="short" value="" <?php echo 'placeholder="'.LANG_ANNOUNCE_SHORT.'"'; ?> required="required" autofocus />
					</div>
					<div>
						<span class="material-icons">message</span>
						<label for="message"><?php echo LANG_ANNOUNCE_MESSAGE; ?> :</label>
						<textarea id="message" name="message" <?php echo 'placeholder="'.LANG_ANNOUNCE_MESSAGE.'"'; ?> required="required" style="height:160px;"></textarea>
					</div>
					<div class="form-buttons">
                        <input type="reset" <?php echo 'value="'.LANG_RESET.'"'; ?> id="reset" />
						<input type="submit" class="btn-theme" <?php echo 'value="'.LANG_ADD.'"'; ?> id="submit"/>
					</div>
				</form>
			</div>
        </div>
    </body>
</html>