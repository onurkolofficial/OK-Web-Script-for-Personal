<!doctype html>
<html>
<?php
require $_SERVER['DOCUMENT_ROOT'].'/system/boot.php';

// Get Variables
$dataAction=@$_GET['action'];
$mailId=@$_GET['id'];

if($dataAction=="delete"){
    // Delete Mail
    $deleteMailSql="DELETE FROM `mails` WHERE `mails`.`id` = '$mailId'";
    if($Query->Query($Server, $deleteMailSql)){
        header('Location: /admin/mails');
    }
}

// Include Page Head
require PATH_SYSTEM_WEB.'/head.admin.php';

// Get App Data
require PATH_DATA."/mails.php";
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
		<div id="deleteMailDialog" data-link="/admin/mails" data-process="?action=delete&id=%s" class="dialog">
			<div class="dialogBody">
				<p class="dialogTitle text-theme"></p>
				<p class="dialogText"><?php echo LANG_DELETE_MAIL_QUESTION; ?></p>
			</div>
			<div class="dialogActionButtons">
				<input type="button" dialog-close="deleteMailDialog" <?php echo 'value="'.LANG_NO.'"'; ?>>
				<input type="button" dialog-action="deleteMailDialog" class="btn-theme" <?php echo 'value="'.LANG_YES.'"'; ?>>
			</div>
		</div>
		<!-- Page Content !-->
        <div class="pageContent">
            <table>
				<caption><?php echo LANG_MAILS; ?></caption>
				<thead>
					<tr>
						<th scope="col"><?php echo LANG_ACTION; ?></th>
						<th scope="col" colspan="2"><?php echo LANG_TITLE; ?></th>
						<th scope="col"><?php echo LANG_DATE; ?></th>
						<th scope="col"><?php echo LANG_STATUS; ?></th>
					</tr>
				</thead>
				<tbody>
                    <?php
						while($Row=$Query->FetchAssoc($MailsResult)){
					?>
					<tr>
						<td data-label="">
							<div class="tableActionMenu">
								<button dialog="deleteMailDialog" <?php echo 'dialog-data="'.$Row['id'].'"'; ?> class="btn-icon btn-danger">
									<span class="material-icons">delete</span>
								</button>
							</div>
						</td>
						<td <?php echo 'data-label="'.LANG_TITLE.'"'; ?> colspan="2">
							<a <?php echo 'href=/admin/mails/'.$Row['id'].''; ?>><?php echo $Row['subject']; ?></a>
						</td>
						<td <?php echo 'data-label="'.LANG_DATE.'"'; ?>><?php echo $Row['date']; ?></td>
						<td <?php echo 'data-label="'.LANG_STATUS.'"'; ?>><?php echo ($Row['isRead']==0 ? LANG_NEW : ''); ?></td>
					</tr>
					<?php
                        }
                    ?>
				</tbody>
			</table>
        </div>
    </body>
</html>