<!doctype html>
<html>
<?php
require $_SERVER['DOCUMENT_ROOT'].'/system/boot.php';

// Include Page Head
require PATH_SYSTEM_WEB.'/head.php';
?>
    <body>
        <!-- Loading Card !-->
		<div class="loadingCard">
			<p class="loadingTitle text-theme"><?php echo LANG_PLEASE_WAIT; ?> ...</p>
			<p class="loadingText"><?php echo LANG_LOADING_PAGE; ?> ...</p>
		</div>
        <!-- Navigation !-->
		<div class="navigationContainer">
            <?php require PATH_SYSTEM_WEB.'/navigation.php'; ?>
        </div>
        <div class="pageContent">
            <br>
			<p class="form-note"><?php echo LANG_PRIVACY_TITLE; ?></p>
			<br>
			<table>
				<thead>
					<tr>
						<th scope="col"><?php echo LANG_APPLICATIONS; ?></th>
					</tr>
				</thead>
				<tbody>
                <tr>
					<td scope="row" <?php echo 'data-label="'.LANG_APPLICATION.'"'; ?>>
							<a href="/privacy/android/okbrowser">
                                <input type="button" class="btn-theme" value="OKBrowser - Android">
                            </a>
						</td>
					</tr>
					<tr>
						<td scope="row" <?php echo 'data-label="'.LANG_APPLICATION.'"'; ?>>
							<a href="/privacy/android/calculator">
                                <input type="button" class="btn-theme" value="Calculator - Android">
                            </a>
						</td>
					</tr>
					<tr>
						<td scope="row" <?php echo 'data-label="'.LANG_APPLICATION.'"'; ?>>
							<a href="/privacy/android/notesapp">
                                <input type="button" class="btn-theme" value="Simple Notes - Android">
                            </a>
						</td>
					</tr>
					
					<tr>
						<td scope="row" <?php echo 'data-label="'.LANG_APPLICATION.'"'; ?>>
							<a href="/privacy/android/sps-game">
                                <input type="button" class="btn-theme" value="SPS Game - Android">
                            </a>
						</td>
					</tr>
				</tbody>
			</table>
        </div>
    </body>
</html>