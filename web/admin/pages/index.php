<!doctype html>
<html>
<?php
require $_SERVER['DOCUMENT_ROOT'].'/system/boot.php';

// Get Variables
$dataAction=@$_GET['action'];
$pageId=@$_GET['pid'];

if($dataAction=="delete"){
    // Delete Mail
    $deletePageSql="DELETE FROM `pages` WHERE `pages`.`page_id` = '$pageId'";
    if($Query->Query($Server, $deletePageSql)){
        header('Location: /admin/pages');
    }
}

// Include Page Head
require PATH_SYSTEM_WEB.'/head.admin.php';

// Get App Data
require PATH_DATA."/navigation.pages.php";
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
		<div id="deletePageDialog" data-link="/admin/pages" data-process="?action=delete&pid=%s" class="dialog">
			<div class="dialogBody">
				<p class="dialogTitle text-theme"><?php echo LANG_DELETE_PAGE; ?></p>
				<p class="dialogText"><?php echo LANG_DELETE_PAGE_QUESTION; ?></p>
			</div>
			<div class="dialogActionButtons">
                <input type="button" dialog-close="deletePageDialog" <?php echo 'value="'.LANG_NO.'"'; ?>>
				<input type="button" dialog-action="deletePageDialog" class="btn-theme" <?php echo 'value="'.LANG_YES.'"'; ?>>
			</div>
		</div>
		<!-- Page Content !-->
        <div class="pageContent">
        	<div class="adminAnnouncementContent">
				<div class="actionButtons">
					<a href="/admin/pages/new">
						<input type="button" class="btn-theme" <?php echo 'value="'.LANG_NEW_PAGE.'"'; ?>>
					</a>
				</div>
			</div>
			<table>
				<caption><?php echo LANG_PAGES; ?></caption>
				<thead>
					<tr>
						<th scope="col"><?php echo LANG_ACTION; ?></th>
						<th scope="col" colspan="2"><?php echo LANG_PAGE_NAME; ?></th>
						<th scope="col">Url</th>
						<th scope="col"><?php echo LANG_INDEX; ?></th>
					</tr>
				</thead>
				<tbody>
                    <?php
						while($Row=$Query->FetchAssoc($NavigationPageResult)){
					?>
					<tr>
						<td data-label="">
							<div class="tableActionMenu">
								<button dialog="deletePageDialog" <?php echo 'dialog-data="'.$Row['page_id'].'"'; ?> class="btn-icon btn-danger">
									<span class="material-icons">delete</span>
								</button>
                                <a <?php echo 'href="/admin/pages/edit?pid='.$Row['page_id'].'"'; ?>>
                                    <button class="btn-icon btn-theme">
                                        <span class="material-icons">border_color</span>
                                    </button>
                                </a>
							</div>
						</td>
						<td <?php echo 'data-label="'.LANG_PAGE_NAME.'"'; ?> colspan="2"><?php echo $Row['page_name']; ?></td>
						<td data-label="Url"><?php echo $Row['page_url']; ?></td>
						<td <?php echo 'data-label="'.LANG_INDEX.'"'; ?>><?php echo $Row['page_index']; ?></td>
					</tr>
					<?php
                        }
                    ?>
				</tbody>
			</table>
        </div>
    </body>
</html>