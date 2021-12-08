<!doctype html>
<html>
<?php
require $_SERVER['DOCUMENT_ROOT'].'/system/boot.php';

// Get Variables
$isLoad=@$_POST['load'];

$pageID=@$_GET['pid'];

$pageIndex=@$_POST['index'];
$pageName=@$_POST['pagename'];
$pageUrl=@$_POST['url'];

// Save Data
if($isLoad=="true"){
    if($Query->Query($Server, "UPDATE pages SET `page_index`='$pageIndex', `page_name`='$pageName', `page_url`='$pageUrl' WHERE `pages`.`page_id`='$pageID'"))
        header("Location: /admin/pages");
}

// Get App Data
require PATH_DATA."/navigation.pages.php";

// Get Data from Page ID
$Row=getPageRowFromID($Server, $Query, $pageID);

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
                $navigationTitle=LANG_EDIT_PAGE;
                require PATH_SYSTEM_WEB.'/navigation.admin.php';
            ?>
        </div>
        <div class="pageContent">
            <div class="formContent">
				<p class="form-note">
					<?php echo LANG_EDIT_PAGE; ?>
				</p>
				<form method="POST" action="">
                    <input type="hidden" name="load" value="true">
					<div>
						<span class="material-icons">star</span>
						<label for="index"><?php echo LANG_PAGE_INDEX; ?> :</label>
						<input type="number" id="index" name="index" <?php echo 'value="'.$Row['page_index'].'" placeholder="'.LANG_ENTER_A_NUMBER.'"'; ?> autofocus />
					</div>
					<div>
						<span class="material-icons">border_color</span>
						<label for="pagename"><?php echo LANG_PAGE_NAME; ?> :</label>
						<input type="text" id="pagename" name="pagename" <?php echo 'value="'.$Row['page_name'].'" placeholder="'.LANG_PAGE_NAME.'"'; ?> required="required" autofocus />
					</div>
					<div>
						<span class="material-icons">link</span>
						<label for="url">Url :</label>
						<input type="text" id="url" name="url" <?php echo 'value="'.$Row['page_url'].'" placeholder="'.LANG_PAGE_URL.'"'; ?> required="required" autofocus />
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