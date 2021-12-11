<!doctype html>
<html>
<?php
require $_SERVER['DOCUMENT_ROOT'].'/system/boot.php';

// Include Page Head
require PATH_SYSTEM_WEB.'/head.php';

// Get App Data
require PATH_DATA."/app.categories.php";
require PATH_DATA."/app.counter.php";
?>
    <body>
        <!-- Loading Dialog !-->
		<?php require PATH_SYSTEM_WEB.'/loading.dialog.php'; ?>
        <!-- Navigation !-->
		<div class="navigationContainer">
            <?php require PATH_SYSTEM_WEB.'/navigation.php'; ?>
        </div>
        <div class="pageContent">
			<br>
			<p class="form-note"><?php echo LANG_SELECT_APP_CATEGORY; ?></p>
			<br>
			<table>
				<thead>
					<tr>
						<th scope="col" colspan="2"><?php echo LANG_CATEGORY; ?></th>
						<th scope="col" colspan="2"><?php echo LANG_APPS; ?></th>
					</tr>
				</thead>
				<tbody>
					<?php
						while($Row=$Query->FetchAssoc($AppCategoryResult)){
							$appCount=getAppCountFromCategory($Server, $Query, $Row['id']);
					?>
					<tr>
						<td <?php echo 'data-label="'.LANG_CATEGORY.'"'; ?> colspan="2">
							<a <?php echo 'href="/apps/'.$Row['id'].'"'; ?>>
								<input type="button" class="btn-theme" <?php echo 'value="'.$Row['category_name'].'"'; ?>>
							</a>
						</td>
						<td <?php echo 'data-label="'.LANG_APPS.'"'; ?> colspan="2"><?php echo $appCount; ?></td>
					</tr>
					<?php
						}
					?>
					
				</tbody>
			</table>
        </div>
    </body>
</html>