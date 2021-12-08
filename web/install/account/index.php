<!doctype html>
<html>
<?php
// Include System
require $_SERVER['DOCUMENT_ROOT'].'/system/boot.php';

// Include Library
require PATH_LIB.'/connection.test.php';

// Get Variables
$server=@$_GET['server'];
$username=@$_GET['name'];
$password=@$_GET['password'];
$database=@$_GET['database'];

// Include Page Head
require PATH_SYSTEM_WEB.'/head.php';
// Include Data File 
// Note!<bug> 'admin.account.count.php' is included 'session.proc.php'.
// require PATH_DATA.'/admin.account.count.php';

// Check Admin Accounts
if($AdminCount>0){
	header("Location: /");
}

// Get Variables
$isLoad=@$_POST['load'];

$error=@$_GET['error'];

$name=@$_POST['name'];
$surname=@$_POST['surname'];
$username=@$_POST['username'];
$password=@$_POST['password'];
$repassword=@$_POST['repassword'];
$mail=@$_POST['email'];
$phone=@$_POST['phone'];
$country=@$_POST['country'];
$city=@$_POST['city'];

// Save Data
if($isLoad=="true"){
	// Check Password
	if($password!=$repassword){
		header("Location: ?error=password");
	}
	else{
		// Generate User Key
		$UserId=$KeyGen->CreateKey(55);
		// Convert Password
		$passMD5=md5($password);
		// Add User
		$sqlType="INSERT INTO `users` (`id`, `name`, `surname`, `email`, `username`, `password`, `phone`, `country`, `city`, `register_date`, `isAdmin`) VALUES ('$UserId', '$name', '$surname', '$mail', '$username', '$passMD5', '$phone', '$country', '$city', '$defaultLiveDate', '1')";
		// Check Query
		if($Query->Query($Server, $sqlType)){
			// Next Page.
			header("Location: /");
		}
	}
}
?>
	<body>
	<div class="setupContent">
		<div class="setupHomeContent">
				<p class="setup-title text-theme"><?php echo LANG_INSTALL_TITLE; ?></p>
				<p class="setup-title-small"><?php echo LANG_INSTALL_CAPTION; ?></p>
			</div>
			<div class="formContent">
				<p class="form-note"><?php echo LANG_INSTALL_REGISTER_NOTE; ?></p>
				<form method="POST" action="" id="accountForm">
					<input type="hidden" name="load" value="true">
					<!-- Connection Test Output !-->
					<label id="formStatus">
						<?php
						if($error=="password"){
							echo LANG_PASSWORD_ERROR;
						}
                        else if($error=="unknown"){
                            echo LANG_UNKNOWN_ERROR;
                        }
						?>
					</label>
					<div>
						<span class="material-icons">person</span>
						<label for="name"><?php echo LANG_NAME; ?> :</label>
						<input type="text" id="name" name="name" required="required" autofocus />
					</div>
					<div>
						<span class="material-icons">person</span>
						<label for="surname"><?php echo LANG_SURNAME; ?> :</label>
						<input type="text" id="surname" name="surname" required="required" autofocus />
					</div>
					<br>
					<div>
						<span class="material-icons">person_outline</span>
						<label for="username"><?php echo LANG_USER_NAME; ?> :</label>
						<input type="text" id="username" name="username" required="required" autofocus />
					</div>
					<div>
						<span class="material-icons">lock</span>
						<label for="password"><?php echo LANG_PASSWORD; ?> :</label>
						<input type="password" id="password" name="password" required="required" autofocus />
					</div>
					<div>
						<span class="material-icons">lock</span>
						<label for="repassword"><?php echo LANG_RE_PASSWORD; ?> :</label>
						<input type="password" id="repassword" name="repassword" required="required" autofocus />
					</div>
					<br>
					<div>
						<span class="material-icons">mail</span>
						<label for="email">E-Mail :</label>
						<input type="text" id="email" name="email" required="required" autofocus />
					</div>
					<br>
					<div>
						<span class="material-icons">phone</span>
						<label for="phone"><?php echo LANG_PHONE; ?> :</label>
						<input type="phone" id="phone" name="phone" autofocus />
					</div>
					<div>
						<span class="material-icons">flag</span>
						<label for="country"><?php echo LANG_COUNTRY; ?> :</label>
						<input type="text" id="country" name="country" autofocus />
					</div>
					<div>
						<span class="material-icons">place</span>
						<label for="city"><?php echo LANG_CITY; ?> :</label>
						<input type="text" id="city" name="city" autofocus />
					</div>
					<!-- Buttons !-->
					<div class="form-buttons">
						<input <?php echo 'value="'.LANG_RESET.'"'; ?>type="reset" id="reset" />
						<input <?php echo 'value="'.LANG_COMPLETE.'"'; ?> type="submit" class="btn-theme" id="submit"/>
					</div>
				</form>
			</div>
		</div>
    </body>
</html>