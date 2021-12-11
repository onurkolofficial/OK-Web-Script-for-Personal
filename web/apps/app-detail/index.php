<!doctype html>
<html>
<?php
require $_SERVER['DOCUMENT_ROOT'].'/system/boot.php';

// Include Page Head
require PATH_SYSTEM_WEB.'/head.php';

// Get Variables
$category=$_GET['cat']; // 'cat' is default in '.htaccess' file.
$application=$_GET['app']; // 'app' is default in '.htaccess' file.

// Get App Data
require PATH_DATA."/app.counter.php";

$appRow=getAppRow($Server, $Query, $application);
?>
    <body>
        <!-- Loading Dialog !-->
		<?php require PATH_SYSTEM_WEB.'/loading.dialog.php'; ?>
        <!-- Navigation !-->
		<div class="navigationContainer">
            <?php require PATH_SYSTEM_WEB.'/navigation.php'; ?>
        </div>
        <div class="pageContent">
			<div class="appContent">
				<div class="appNavigation">
					<!-- App Image !-->
					<img <?php echo 'src="'.$appRow['app_image_url'].'"' ?>>
					<!-- App Info !-->
					<div class="appInfo">
						<h3 class="appName"><?php echo $appRow['app_name']; ?></h3>
						<small class="appVersion"><?php echo $appRow['app_version']; ?></small>
						<p class="appAuthor"><?php echo $appRow['app_author']; ?></p>
					</div>
				</div>
				<div class="appButtons">
					<div class="appDownloads">
						<?php
							if($appRow['app_download_url']!="") {
						?>
						<a <?php echo 'href="'.$appRow['app_download_url'].'"'; ?>>
							<input type="button" value="Download 1">
						</a>
						<?php
							}
						?>
					</div>
					<div class="appSource">
						<?php
							if($appRow['app_source_url']!="") {
						?>
						<a <?php echo 'href="'.$appRow['app_source_url'].'"'; ?>>
							<input type="button" class="btn-theme" value="Source">
						</a>
						<?php
							}
						?>
					</div>
				</div>
			</div>
        </div>
    </body>
</html>