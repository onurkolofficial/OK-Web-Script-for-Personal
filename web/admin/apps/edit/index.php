<!doctype html>
<html>
<?php
require $_SERVER['DOCUMENT_ROOT'].'/system/boot.php';

// Get Variables
$isLoad=@$_POST['load'];

$appID=@$_GET['appid'];

$appName=@$_POST['appname'];
$appCategory=@$_POST['appcategory'];
$appVer=@$_POST['appver'];
$appImage=@$_POST['applogo'];
$appDownload=@$_POST['download'];
$appSource=@$_POST['source'];

// Save Data
if($isLoad=="true"){
    if($Query->Query($Server, "UPDATE applications SET `app_name`='$appName', `category_id`='$appCategory', `app_version`='$appVer', `app_image_url`='$appImage', `app_download_url`='$appDownload', `app_source_url`='$appSource' WHERE `applications`.`id`='$appID'"))
        header("Location: /admin/apps");
}

// Get App Data
require PATH_DATA."/app.counter.php";
require PATH_DATA."/app.categories.php";

// Get Data from Application ID
$Row=getAppRow($Server, $Query, $appID);

// Include Page Head
require PATH_SYSTEM_WEB.'/head.admin.php';
?>
    <body>
        <!-- Loading Dialog !-->
		<?php require PATH_SYSTEM_WEB.'/loading.dialog.php'; ?>
        <!-- Navigation !-->
		<div class="navigationContainer">
            <?php
                $navigationTitle=LANG_EDIT_APPLICATION;
                require PATH_SYSTEM_WEB.'/navigation.admin.php';
            ?>
        </div>
        <div class="pageContent">
        <div class="formContent">
				<p class="form-note">
					<?php echo LANG_EDIT_APPLICATION_TITLE; ?>
					<br>
                    <?php echo LANG_NEW_APPLICATION_NOTE; ?>
				</p>
				<form method="POST" action="">
                    <input type="hidden" name="load" value="true">
					<div>
						<span class="material-icons">border_color</span>
						<label for="appname"><?php echo LANG_APP_NAME; ?> :</label>
						<input type="text" id="appname" name="appname" <?php echo 'value="'.$Row['app_name'].'" placeholder="'.LANG_APP_NAME.'"'; ?> required="required" autofocus />
					</div>
					<div>
						<span class="material-icons">border_color</span>
						<label for="appver"><?php echo LANG_APP_VERSION; ?> :</label>
						<input type="text" id="appver" name="appver" <?php echo 'value="'.$Row['app_version'].'" placeholder="'.LANG_APP_VERSION.'"'; ?> required="required" autofocus />
					</div>
					<div>
						<span class="material-icons">list</span>
						<label for="appcategory"><?php echo LANG_CATEGORY; ?> :</label>
						<div class="select">
							<select id="appcategory" name="appcategory">
                                <?php
                                    while($catRow=$Query->FetchAssoc($AppCategoryResult)){
                                ?>
								<option <?php echo ($catRow['id']==$Row['category_id'] ? "selected " : "").'value="'.$catRow['id'].'"'; ?>><?php echo $catRow['category_name']; ?></option>
                                <?php
                                    }
                                ?>
							</select>
						</div>
					</div>
					<div>
						<span class="material-icons">link</span>
						<label for="applogo"><?php echo LANG_IMAGE; ?> :</label>
						<input type="text" id="applogo" name="applogo" <?php echo 'value="'.$Row['app_image_url'].'" placeholder="'.LANG_APP_IMAGE_NOTE.'"'; ?> required="required" autofocus />
					</div>
					<div>
						<span class="material-icons">link</span>
						<label for="download"><?php echo LANG_DOWNLOAD; ?> :</label>
						<input type="text" id="download" name="download" <?php echo 'value="'.$Row['app_download_url'].'" placeholder="'.LANG_DOWNLOAD_URL.'"'; ?> autofocus />
					</div>
					<div>
						<span class="material-icons">link</span>
						<label for="source"><?php echo LANG_SOURCE; ?> :</label>
						<input type="text" id="source" name="source" <?php echo 'value="'.$Row['app_source_url'].'" placeholder="'.LANG_SOURCE_URL.'"'; ?> autofocus />
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