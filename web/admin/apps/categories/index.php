<!doctype html>
<html>
<?php
require $_SERVER['DOCUMENT_ROOT'].'/system/boot.php';

// Get Variables
$dataAction=@$_GET['action'];
$categoryId=@$_GET['catid'];

if($dataAction=="delete"){
    // Delete Category
    $deleteCatSql="DELETE FROM `app_categories` WHERE `app_categories`.`id`='$categoryId'";
    if($Query->Query($Server, $deleteCatSql)){
        // Category Applications
        $deleteAppSql="DELETE FROM `applications` WHERE `applications`.`category_id`='$categoryId'";
        if($Query->Query($Server, $deleteAppSql)){
            header('Location: /admin/apps/categories');
        }
    }
}

// Get App Data
require PATH_DATA."/app.categories.php";

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
		<div id="deleteCategoryDialog" data-link="/admin/apps/categories" data-process="?action=delete&catid=%s" class="dialog">
			<div class="dialogContainer">
				<div class="dialogBody">
					<p class="dialogTitle text-theme"><?php echo LANG_DELETE_CATEGORY; ?></p>
					<p class="dialogText"><?php echo LANG_DELETE_CATEGORY_QUESTION; ?></p>
				</div>
				<div class="dialogActionButtons">
					<input type="button" dialog-close="deleteCategoryDialog" <?php echo 'value="'.LANG_NO.'"'; ?>>
					<input type="button" dialog-action="deleteCategoryDialog" class="btn-theme" <?php echo 'value="'.LANG_YES.'"'; ?>>
				</div>
			</div>
		</div>
		<!-- Page Content !-->
        <div class="pageContent">
            <div class="adminActionNavigation">
				<div class="actionButtons">
					<a href="/admin/apps/categories/new">
						<input type="button" class="btn-theme" <?php echo 'value="'.LANG_NEW_CATEGORY.'"'; ?>>
					</a>
				</div>
			</div>
			<table>
				<caption><?php echo LANG_CATEGORIES; ?></caption>
				<thead>
					<tr>
						<th scope="col"><?php echo LANG_ACTION; ?></th>
						<th scope="col" colspan="2"><?php echo LANG_CATEGORY_NAME; ?></th>
						<th scope="col"><?php echo LANG_CATEGORY_ID; ?></th>
                        <th scope="col"><?php echo LANG_INDEX; ?></th>
					</tr>
				</thead>
				<tbody>
                    <?php
						while($Row=$Query->FetchAssoc($AppCategoryResult)){
					?>
					<tr>
						<td data-label="">
							<div class="tableActionMenu">
								<button dialog="deleteCategoryDialog" <?php echo 'dialog-data="'.$Row['id'].'"'; ?> class="btn-icon btn-danger">
									<span class="material-icons">delete</span>
								</button>
                                <a <?php echo 'href="/admin/apps/categories/edit?catid='.$Row['id'].'"'; ?>>
                                    <button class="btn-icon btn-theme">
                                        <span class="material-icons">border_color</span>
                                    </button>
                                </a>
							</div>
						</td>
						<td <?php echo 'data-label="'.LANG_CATEGORY_NAME.'"'; ?> colspan="2"><?php echo $Row['category_name']; ?></td>
						<td <?php echo 'data-label="'.LANG_CATEGORY_ID.'"'; ?>><?php echo $Row['id']; ?></td>
                        <td <?php echo 'data-label="'.LANG_INDEX.'"'; ?>><?php echo $Row['category_index']; ?></td>
					</tr>
					<?php
                        }
                    ?>
				</tbody>
			</table>
        </div>
    </body>
</html>