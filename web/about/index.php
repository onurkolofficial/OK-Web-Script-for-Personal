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
            <?php require PATH_SYSTEM_WEB.'/navigation.php'; ?>
        </div>
        <div class="pageContent">
			<br>
			<h4><?php echo LANG_ABOUT_TITLE; ?></h4>
			<br><br><br>
			<?php echo LANG_CONTACT_SOCIAL; ?>
			<br>
			<div class="social-menu-horizontal">
				<a href="https://instagram.com/onurkolofficial">Instagram</a>
				<a href="https://twitter.com/onurkolofficial">Twitter</a>
				<a href="https://facebook.com/onurkolofficial">Facebook</a>
				<a href="https://linkedin.com/in/onurkol/">Linkedin</a>
				<a href="https://play.google.com/store/apps/dev?id=7015280019048785517">Play Store</a>
			</div>
        </div>
    </body>
</html>