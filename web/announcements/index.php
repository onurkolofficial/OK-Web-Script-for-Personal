<!doctype html>
<html>
<?php
require $_SERVER['DOCUMENT_ROOT'].'/system/boot.php';

// Include Page Head
require PATH_SYSTEM_WEB.'/head.php';

// Get App Data
require PATH_DATA."/announcements.php";
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
		<table>
				<caption><?php echo LANG_ANNOUNCEMENTS; ?></caption>
				<thead>
					<tr>
						<th scope="col" colspan="2"><?php echo LANG_TITLE; ?></th>
						<th scope="col"><?php echo LANG_DATE; ?></th>
						<th scope="col"><?php echo LANG_READ_COUNT; ?></th>
					</tr>
				</thead>
				<tbody>
					<?php
						while($Row=$Query->FetchAssoc($AnnouncementsResult)){
					?>
					<tr>
						<td <?php echo 'data-label="'.LANG_TITLE.'"'; ?> colspan="2">
							<a <?php echo 'href="/announcements/'.$Row['id'].'"'; ?>><?php echo $Row['announcement_name']; ?></a>
						</td>
						<td <?php echo 'data-label="'.LANG_DATE.'"'; ?>><?php echo $Row['release_date']; ?></td>
						<td <?php echo 'data-label="'.LANG_READ_COUNT.'"'; ?>><?php echo $Row['announcement_read_count']; ?></td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
        </div>
    </body>
</html>