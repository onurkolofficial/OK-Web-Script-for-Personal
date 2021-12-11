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
				<p class="errorCodeTitle">403</p>
				<div class="errorCodeName">
					<?php echo LANG_FORBIDDEN; ?>
				</div>
				<div class="errorCodeMessage">
					<?php echo LANG_FORBIDDEN_TITLE; ?>
				</div>
			</div>
        </div>
    </body>
</html>