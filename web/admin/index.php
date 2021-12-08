<!doctype html>
<html>
<?php
require $_SERVER['DOCUMENT_ROOT'].'/system/boot.php';

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
        <div class="pageContent">
            <div class="adminHomeContent">
				<p class="admin-title text-theme"><?php echo LANG_ADMIN_TITLE; ?></p>
				<p class="admin-title-small"><?php echo LANG_ADMIN_WELCOME; ?></p>
			</div>
			<br><br>
			<?php echo LANG_ADMIN_NOTE; ?>
        </div>
    </body>
</html>