<!doctype html>
<html>
<?php
require $_SERVER['DOCUMENT_ROOT'].'/system/boot.php';

// Get Variables
$isLoad=@$_POST['load'];

$error=@$_GET['error'];
$status=@$_GET['r'];

$name=@$_POST['name'];
$email=@$_POST['email'];
$subject=@$_POST['subject'];
$message=@$_POST['message'];

// Save Data
if($isLoad=="true"){
	// Generate Mail ID
	$MailID=$KeyGen->CreateKey(55);
	// Add Mail
	$mailSQL="INSERT INTO `mails` (`id`, `name`, `email`, `subject`, `message`, `isRead`, `date`) VALUES ('$MailID', '$name', '$email', '$subject', '$message', '0', '$defaultLiveDate')";
	if($Query->Query($Server, $mailSQL))
		header("Location: /contact/?r=success");
	else
		header("Location: /contact/?error=unknown");
}

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
			<div class="formContent">
				<p class="form-note"><?php echo LANG_FILL_IN_FORM; ?></p>
				<form method="POST" action="">
					<input type="hidden" name="load" value="true">
					<!-- Connection Test Output !-->
					<label id="formStatus">
						<?php
						if($error=="unknown"){
							echo LANG_UNKNOWN_ERROR."<br><br>".$Server->Mysqli->connect_error;
						}

						if($status=="success"){
							echo LANG_SUCCESS_SEND_MAIL."<br><br>";
						}
						?>
					</label>
					<div>
						<span class="material-icons">person_outline</span>
						<label for="name"><?php echo LANG_NAME; ?> :</label>
						<input type="text" id="name" name="name" value="" <?php echo 'placeholder="'.LANG_YOUR_NAME.'"'; ?> required="required" autofocus />
					</div>
					<div>
						<span class="material-icons">mail</span>
						<label for="email">E-Mail :</label>
						<input type="email" id="email" name="email" value="" placeholder="...@mail.com" required="required" />
					</div>
					<br>
					<div>
						<span class="material-icons">edit</span>
						<label for="subject"><?php echo LANG_SUBJECT; ?> :</label>
						<input type="text" id="subject" name="subject" value="" <?php echo 'placeholder="'.LANG_SUBJECT.'"'; ?> required="required" autofocus />
					</div>
					<div>
						<span class="material-icons">message</span>
						<label for="message"><?php echo LANG_MESSAGE; ?> :</label>
						<textarea id="message" name="message" style="height: 140px;" <?php echo 'placeholder="'.LANG_WRITE_MESSAGE.'"'; ?>></textarea>
					</div>
					<div class="form-buttons">
						<input type="reset" <?php echo 'value="'.LANG_RESET.'"'; ?> id="reset" />
						<input type="submit" <?php echo 'value="'.LANG_SUBMIT.'"'; ?> class="btn-theme" id="submit"/>
					</div>
				</form>
			</div>
        </div>
    </body>
</html>