<!doctype html>
<html>
<?php
require $_SERVER['DOCUMENT_ROOT'].'/system/boot.php';

// Include Page Head
require PATH_SYSTEM_WEB.'/head.php';

// Get Variables
$category=$_GET['cat']; // 'cat' is default in '.htaccess' file.

// Get App Data
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
			<p class="form-note"><?php echo LANG_APP_LIST_DETAIL; ?></p>
			<br>
			<table>
				<thead>
					<tr>
						<th scope="col"></th>
						<th scope="col"><?php echo LANG_APP_NAME; ?></th>
						<th scope="col"><?php echo LANG_VERSION; ?></th>
						<th scope="col"><?php echo LANG_DATE; ?></th>
					</tr>
				</thead>
				<tbody>
					<?php
						$appResults=getAppResultFromCategory($Server, $Query, $category);
						while($Row=$Query->FetchAssoc($appResults)){
					?>
					<tr>
						<td>
							<img width="55" height="55" <?php echo 'src="'.$Row['app_image_url'].'"'; ?>>
						</td>
						<td <?php echo 'data-label="'.LANG_APP_NAME.'"'; ?>>
							<a <?php echo 'href="/apps/'.$category.'/'.$Row['id'].'"'; ?>>
								<input type="button" <?php echo 'value="'.$Row['app_name'].'"'; ?>>
							</a>
						</td>
						<td <?php echo 'data-label="'.LANG_VERSION.'"'; ?>><?php echo $Row['app_version']; ?></td>
						<td <?php echo 'data-label="'.LANG_DATE.'"'; ?>><?php echo $Row['app_release_date']; ?></td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
        </div>
    </body>
</html>