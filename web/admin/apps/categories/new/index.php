<!doctype html>
<html>
<?php
require $_SERVER['DOCUMENT_ROOT'].'/system/boot.php';

// Get Variables
$isLoad=@$_POST['load'];

$catId=@$_POST['catid'];
$catName=@$_POST['catname'];
$catIndex=@$_POST['index'];

// Get App Data
require PATH_DATA."/app.categories.php";

// Save Data
if($isLoad=="true"){
    // Count Index
    if(empty($catIndex))
        $catIndex=$AppCategoryCount + 1;

    // Add Category
    $categoriesSQL="INSERT INTO `app_categories` (`id`, `category_name`, `category_index`) VALUES ('$catId', '$catName', '$catIndex')";
    if($Query->Query($Server, $categoriesSQL))
        header("Location: /admin/apps/categories");
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
                $navigationTitle=LANG_NEW_CATEGORY;
                require PATH_SYSTEM_WEB.'/navigation.admin.php';
            ?>
        </div>
        <div class="pageContent">
            <div class="formContent">
				<p class="form-note">
                    <?php echo LANG_NEW_CATEGORY_TITLE; ?>
					<br>
					<?php echo LANG_NEW_CATEGORY_NOTE; ?>
				</p>
				<form method="POST" action="">
                    <input type="hidden" name="load" value="true">
					<div>
						<span class="material-icons">star</span>
						<label for="index"><?php echo LANG_INDEX; ?> :</label>
						<input type="number" id="index" name="index" value="" <?php echo 'placeholder="'.LANG_ENTER_A_NUMBER.'"'; ?> autofocus />
					</div>
					<div>
						<span class="material-icons">border_color</span>
						<label for="catid"><?php echo LANG_CATEGORY_ID; ?> :</label>
						<input type="text" id="catid" name="catid" value="" <?php echo 'placeholder="'.LANG_CATEGORY_ID.'"'; ?> required="required" autofocus />
					</div>
					<div>
						<span class="material-icons">border_color</span>
						<label for="catname"><?php echo LANG_CATEGORY_NAME; ?> :</label>
						<input type="text" id="catname" name="catname" value="" <?php echo 'placeholder="'.LANG_CATEGORY_NAME.'"'; ?> required="required" autofocus />
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