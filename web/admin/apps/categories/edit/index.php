<!doctype html>
<html>
<?php
require $_SERVER['DOCUMENT_ROOT'].'/system/boot.php';

// Get Variables
$isLoad=@$_POST['load'];

$catGetID=@$_GET['catid'];

$newCatId=@$_POST['catid'];
$catName=@$_POST['catname'];
$catIndex=@$_POST['index'];

// Save Data
if($isLoad=="true"){
    // Update Category
    if($Query->Query($Server, "UPDATE app_categories SET `id`='$newCatId', `category_name`='$catName', `category_index`='$catIndex' WHERE `app_categories`.`id`='$catGetID'")){
        // Update Apps
        if($Query->Query($Server, "UPDATE applications SET `category_id`='$newCatId' WHERE `applications`.`category_id`='$catGetID'")){
            header("Location: /admin/apps/categories");
        }
    }
}

// Get App Data
require PATH_DATA."/app.categories.php";

// Get Data from Category 'GET' ID
$Row=getAppCategoryRow($Server, $Query, $catGetID);

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
                $navigationTitle=LANG_EDIT_CATEGORY;
                require PATH_SYSTEM_WEB.'/navigation.admin.php';
            ?>
        </div>
        <div class="pageContent">
        <div class="formContent">
				<p class="form-note">
                    <?php echo LANG_EDIT_CATEGORY_TITLE; ?>
					<br>
					<?php echo LANG_NEW_CATEGORY_NOTE; ?>
				</p>
				<form method="POST" action="">
                    <input type="hidden" name="load" value="true">
					<div>
						<span class="material-icons">star</span>
						<label for="index"><?php echo LANG_INDEX; ?> :</label>
						<input type="number" id="index" name="index" <?php echo 'value="'.$Row['category_index'].'" placeholder="'.LANG_ENTER_A_NUMBER.'"'; ?> autofocus />
					</div>
					<div>
						<span class="material-icons">border_color</span>
						<label for="catid"><?php echo LANG_CATEGORY_ID; ?> :</label>
						<input type="text" id="catid" name="catid" <?php echo 'value="'.$Row['id'].'" placeholder="'.LANG_CATEGORY_ID.'"'; ?> required="required" autofocus />
					</div>
					<div>
						<span class="material-icons">border_color</span>
						<label for="catname"><?php echo LANG_CATEGORY_NAME; ?> :</label>
						<input type="text" id="catname" name="catname" <?php echo 'value="'.$Row['category_name'].'" placeholder="'.LANG_CATEGORY_NAME.'"'; ?> required="required" autofocus />
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