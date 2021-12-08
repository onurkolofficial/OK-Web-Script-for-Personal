<!doctype html>
<html>
<?php
require $_SERVER['DOCUMENT_ROOT'].'/system/boot.php';

// Get Variables
$isLoad=@$_POST['load'];

$appName=@$_POST['appname'];
$appCategory=@$_POST['appcategory'];
$appVer=@$_POST['appver'];
$appImage=@$_POST['applogo'];
$appDownload=@$_POST['download'];
$appSource=@$_POST['source'];

// Get App Data
require PATH_DATA."/app.counter.php";
require PATH_DATA."/app.categories.php";

// Save Data
if($isLoad=="true"){
    // Generate App ID
	$appID=$KeyGen->CreateKey(55);
    // Add Announce
    $newAppSQL="INSERT INTO `applications` (`id`, `category_id`, `app_name`, `app_version`, `app_author`, `app_image_url`, `app_download_url`, `app_source_url`, `app_release_date`) VALUES ('$appID', '$appCategory', '$appName', '$appVer', 'Onur Kol', '$appImage', '$appDownload', '$appSource', '$defaultLiveDate')";
    if($Query->Query($Server, $newAppSQL))
        header("Location: /admin/apps");
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
                $navigationTitle=LANG_NEW_APPLICATION;
                require PATH_SYSTEM_WEB.'/navigation.admin.php';
            ?>
        </div>
        <div class="pageContent">
            <div class="formContent">
				<p class="form-note">
					<?php echo LANG_NEW_APPLICATION_TITLE; ?>
					<br>
                    <?php echo LANG_NEW_APPLICATION_NOTE; ?>
				</p>
				<form method="POST" action="">
                    <input type="hidden" name="load" value="true">
					<div>
						<span class="material-icons">border_color</span>
						<label for="appname"><?php echo LANG_APP_NAME; ?> :</label>
						<input type="text" id="appname" name="appname" value="" <?php echo 'placeholder="'.LANG_APP_NAME.'"'; ?> required="required" autofocus />
					</div>
					<div>
						<span class="material-icons">border_color</span>
						<label for="appver"><?php echo LANG_APP_VERSION; ?> :</label>
						<input type="text" id="appver" name="appver" value="" <?php echo 'placeholder="'.LANG_APP_VERSION.'"'; ?> required="required" autofocus />
					</div>
					<div>
						<span class="material-icons">list</span>
						<label for="appcategory"><?php echo LANG_CATEGORY; ?> :</label>
						<div class="select">
							<select id="appcategory" name="appcategory">
                                <?php
                                    while($catRow=$Query->FetchAssoc($AppCategoryResult)){
                                ?>
								<option <?php echo 'value="'.$catRow['id'].'"'; ?>><?php echo $catRow['category_name']; ?></option>
                                <?php
                                    }
                                ?>
							</select>
						</div>
					</div>
					<div>
						<span class="material-icons">link</span>
						<label for="applogo"><?php echo LANG_IMAGE; ?> :</label>
						<input type="text" id="applogo" name="applogo" value="" <?php echo 'placeholder="'.LANG_APP_IMAGE_NOTE.'"'; ?> required="required" autofocus />
					</div>
					<div>
						<span class="material-icons">link</span>
						<label for="download"><?php echo LANG_DOWNLOAD; ?> :</label>
						<input type="text" id="download" name="download" value="" <?php echo 'placeholder="'.LANG_DOWNLOAD_URL.'"'; ?> autofocus />
					</div>
					<div>
						<span class="material-icons">link</span>
						<label for="source"><?php echo LANG_SOURCE; ?> :</label>
						<input type="text" id="source" name="source" value="" <?php echo 'placeholder="'.LANG_SOURCE_URL.'"'; ?> autofocus />
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