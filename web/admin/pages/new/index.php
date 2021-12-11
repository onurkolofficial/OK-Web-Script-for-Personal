<!doctype html>
<html>
<?php
require $_SERVER['DOCUMENT_ROOT'].'/system/boot.php';

// Get Variables
$isLoad=@$_POST['load'];

$pageIndex=@$_POST['index'];
$pageName=@$_POST['pagename'];
$pageUrl=@$_POST['url'];

// Get App Data
require PATH_DATA."/navigation.pages.php";

// Save Data
if($isLoad=="true"){
    if(empty($pageIndex))
        $pageIndex=$NavigationPageCount + 1;

    // Add Page
	$pageSQL="INSERT INTO `pages` (`page_id`, `page_index`, `page_name`, `page_url`) VALUES (NULL, '$pageIndex', '$pageName', '$pageUrl')";
    if($Query->Query($Server, $pageSQL))
		header("Location: /admin/pages");
}

// Include Page Head
require PATH_SYSTEM_WEB.'/head.admin.php';
?>
    <body>
        <!-- Loading Dialog !-->
		<?php require PATH_SYSTEM_WEB.'/loading.dialog.php'; ?>
        <!-- Navigation !-->
		<div class="navigationContainer">
            <?php
                $navigationTitle=LANG_NEW_PAGE;
                require PATH_SYSTEM_WEB.'/navigation.admin.php';
            ?>
        </div>
        <div class="pageContent">
            <div class="formContent">
				<p class="form-note">
					<?php echo LANG_NEW_PAGE_TITLE; ?>
					<br>
					<?php echo LANG_NEW_PAGE_NOTE; ?>
				</p>
				<form method="POST" action="">
                    <input type="hidden" name="load" value="true">
					<div>
						<span class="material-icons">star</span>
						<label for="index"><?php echo LANG_PAGE_INDEX; ?> :</label>
						<input type="number" id="index" name="index" value="" <?php echo 'placeholder="'.LANG_ENTER_A_NUMBER.'"'; ?> autofocus />
					</div>
					<div>
						<span class="material-icons">border_color</span>
						<label for="pagename"><?php echo LANG_PAGE_NAME; ?> :</label>
						<input type="text" id="pagename" name="pagename" value="" <?php echo 'placeholder="'.LANG_PAGE_NAME.'"'; ?> required="required" autofocus />
					</div>
					<div>
						<span class="material-icons">link</span>
						<label for="url">Url :</label>
						<input type="text" id="url" name="url" value="" <?php echo 'placeholder="'.LANG_PAGE_URL.'"'; ?> required="required" autofocus />
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