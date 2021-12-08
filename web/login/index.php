<!doctype html>
<html>
<?php
require $_SERVER['DOCUMENT_ROOT'].'/system/boot.php';

// Include Page Head
require PATH_SYSTEM_WEB.'/head.php';

// Get Variables
$username=@$_POST['username'];
$password=@$_POST['password'];

$error=@$_GET['error'];

// Get App Data
require PATH_DATA."/user.account.count.php";

if(isset($username) || isset($password)){
	// Convert Password
	$passMD5=md5($password);
	// Check Users
	$userResult=getUserResult($Server, $Query, $username, $passMD5);
	// Get User Count
	$userCount=$Query->NumRows($userResult);
	if($userCount>0){
		// Set Session
		$SessionManager->SetSession(KEY_SESSION_USER_NAME, $username);
		// Redirect
		header("Location: /");
	}
	else{
		// Redirect Error
		header("Location: /login/?error=password");
	}
}
?>
    <body>
        <!-- Loading Card !-->
		<div class="loadingCard">
			<p class="loadingTitle text-theme"><?php echo LANG_PLEASE_WAIT; ?> ...</p>
			<p class="loadingText"><?php echo LANG_LOADING_PAGE; ?> ...</p>
		</div>
        <!-- Navigation !-->
		<div class="navigationContainer">
            <?php
				$navigationTitle=LANG_LOGIN;
				require PATH_SYSTEM_WEB.'/navigation.php';
			?>
        </div>
        <div class="pageContent">
			<div class="formContent">
				<p class="form-note"><?php echo LANG_FILL_IN_FORM; ?></p>
				<form method="POST" action="">
					<!-- Connection Test Output !-->
					<label id="formStatus">
						<?php
						if($error=="password"){
							echo LANG_PASSWORD_ERROR."<br><br>";
						}
						?>
					</label>
					<div>
						<span class="material-icons">account_circle</span>
						<label for="name"><?php echo LANG_USER_NAME; ?> :</label>
						<input type="text" id="username" name="username" <?php echo 'placeholder="'.LANG_USER_NAME.'" value="'.$username.'"'; ?> required="required" autofocus />
					</div>
					<div>
						<span class="material-icons">lock</span>
						<label for="name"><?php echo LANG_PASSWORD; ?> :</label>
						<input type="password" id="password" name="password" <?php echo 'placeholder="'.LANG_PASSWORD.'"'; ?> required="required" autofocus />
					</div>
					<div class="form-buttons">
						<input type="reset" <?php echo 'value="'.LANG_RESET.'"'; ?> id="reset" />
						<input type="submit" <?php echo 'value="'.LANG_LOGIN.'"'; ?> class="btn-theme" id="submit"/>
					</div>
				</form>
			</div>
        </div>
    </body>
</html>