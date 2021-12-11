<!doctype html>
<html>
<?php
require $_SERVER['DOCUMENT_ROOT'].'/system/boot.php';

// Include Page Head
require PATH_SYSTEM_WEB.'/head.php';
?>
    <body>
        <!-- Loading Dialog !-->
		<?php require PATH_SYSTEM_WEB.'/loading.dialog.php'; ?>
        <!-- Navigation !-->
		<div class="navigationContainer">
            <?php require PATH_SYSTEM_WEB.'/navigation.nosearch.php'; ?>
        </div>
        <div class="pageContent">
            <!-- Error Codes !-->
			<div class="errorCodeContent">
				<p class="errorCodeTitle">404</p>
				<div class="errorCodeName">
					<?php echo LANG_NOT_FOUND; ?>
				</div>
				<div class="errorCodeMessage">
					<?php echo LANG_NOT_FONUD_TITLE; ?>
					<br>
					<?php echo LANG_PLEASE_TRY_AGAIN; ?>
				</div>
			</div>
        </div>
    </body>
</html>