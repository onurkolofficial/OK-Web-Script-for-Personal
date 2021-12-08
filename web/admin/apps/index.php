<!doctype html>
<html>
<?php
require $_SERVER['DOCUMENT_ROOT'].'/system/boot.php';

// Get Variables
$dataAction=@$_GET['action'];
$appId=@$_GET['appid'];

if($dataAction=="delete"){
    // Delete Application
    $deleteAppSql="DELETE FROM `applications` WHERE `applications`.`id`='$appId'";
    if($Query->Query($Server, $deleteAppSql)){
        header('Location: /admin/apps');
    }
}

// Get App Data
require PATH_DATA."/app.counter.php";
require PATH_DATA."/app.categories.php";

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
            <?php require PATH_SYSTEM_WEB.'/navigation.admin.php'; ?>
        </div>
        <!-- Custom Dialogs !-->
		<div id="deleteApplicationDialog" data-link="/admin/apps" data-process="?action=delete&appid=%s" class="dialog">
			<div class="dialogBody">
				<p class="dialogTitle text-theme"><?php echo LANG_DELETE_APPLICATION; ?></p>
				<p class="dialogText"><?php echo LANG_DELETE_APPLICATION_QUESTION; ?></p>
			</div>
			<div class="dialogActionButtons">
                <input type="button" dialog-close="deleteApplicationDialog" <?php echo 'value="'.LANG_NO.'"'; ?>>
				<input type="button" dialog-action="deleteApplicationDialog" class="btn-theme" <?php echo 'value="'.LANG_YES.'"'; ?>>
			</div>
		</div>
		<!-- Page Content !-->
        <div class="pageContent">
            <div class="adminAnnouncementContent">
				<div class="actionButtons">
					<a href="/admin/apps/new">
                        <input type="button" class="btn-theme" <?php echo 'value="'.LANG_NEW_APPLICATION.'"'; ?>>
					</a>
				</div>
			</div>
			<table>
				<caption><?php echo LANG_APPLICATIONS; ?></caption>
				<thead>
					<tr>
						<th scope="col"><?php echo LANG_ACTION; ?></th>
						<th scope="col"><?php echo LANG_IMAGE; ?></th>
						<th scope="col"><?php echo LANG_APP_NAME; ?></th>
						<th scope="col"><?php echo LANG_CATEGORY; ?></th>
						<th scope="col"><?php echo LANG_VERSION; ?></th>
					</tr>
				</thead>
				<tbody>
                    <?php
						while($Row=$Query->FetchAssoc($ApplicationsResult)){
                            // Get App Category Name
                            $catRow=getAppCategoryRow($Server, $Query, $Row['category_id']);
					?>
					<tr>
						<td data-label="">
							<div class="tableActionMenu">
								<button dialog="deleteApplicationDialog" <?php echo 'dialog-data="'.$Row['id'].'"'; ?> class="btn-icon btn-danger">
									<span class="material-icons">delete</span>
								</button>
								<a <?php echo 'href="/admin/apps/edit?appid='.$Row['id'].'"'; ?>>
                                    <button class="btn-icon btn-theme">
                                        <span class="material-icons">border_color</span>
                                    </button>
                                </a>
							</div>
						</td>
						<td data-label="">
							<img width="55" height="55" <?php echo 'src="'.$Row['app_image_url'].'"'; ?>>
						</td>
						<td <?php echo 'data-label="'.LANG_APP_NAME.'"'; ?>><?php echo $Row['app_name']; ?></td>
						<td <?php echo 'data-label="'.LANG_CATEGORY.'"'; ?>data-label="Category"><?php echo $catRow['category_name']; ?></td>
						<td <?php echo 'data-label="'.LANG_VERSION.'"'; ?>data-label="Version"><?php echo $Row['app_version']; ?></td>
					</tr>
                    <?php
                        }
                    ?>
				</tbody>
			</table>
        </div>
    </body>
</html>