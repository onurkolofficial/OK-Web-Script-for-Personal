<!doctype html>
<html>
<?php
// Boot For Config
$BOOT_FOR_SECURE=true;
// Include System
require $_SERVER['DOCUMENT_ROOT'].'/system/boot.php';

// Include Libraries
require PATH_LIB.'/connection.test.php';
require PATH_LIB.'/include.database.php';

// Get Variables
$isLoad=@$_GET['load'];

$error=@$_GET['error'];

$connTest=@$_GET['test'];
$connStatus=null;

$host=@$_GET['server'];
$username=@$_GET['name'];
$password=@$_GET['password'];
$database=@$_GET['database'];

// Connection Test
if($connTest=="true"){
    $connStatus=startConnectionTest($host, $username, $password, $Server);
}

// Save Data
if($isLoad=="true"){
    // Load Data
    includeDatabase($host, $username, $password, $database, $IniManager, $Server, $Query, $SQLManager);
}

// Include Page Head
require PATH_SYSTEM_WEB.'/head.php';
?>
    <!-- Page Custom Script !-->
    <script src="/scripts/pages/install.js"></script>
	<body>
        <div class="setupContent">
		    <div class="setupHomeContent">
				<p class="setup-title text-theme"><?php echo LANG_INSTALL_TITLE; ?></p>
				<p class="setup-title-small"><?php echo LANG_INSTALL_CAPTION; ?></p>
			</div>
			<div class="formContent">
				<p class="form-note"><?php echo LANG_INSTALL_FORM_NOTE ?></p>
				<form id="serverForm">
					<div>
						<span class="material-icons">cloud</span>
						<label for="server"><?php echo LANG_DATABASE_SERVER; ?> :</label>
						<input type="text" <?php echo 'value="'.$host.'"'; ?> id="server" name="server" required="required" autofocus />
					</div>
					<div>
						<span class="material-icons">person_outline</span>
						<label for="name"><?php echo LANG_USER_NAME; ?> :</label>
						<input type="text" <?php echo 'value="'.$username.'"'; ?> id="name" name="name" required="required" autofocus />
					</div>
					<div>
						<span class="material-icons">lock</span>
						<label for="password"><?php echo LANG_PASSWORD; ?> :</label>
						<input type="text" <?php echo 'value="'.$password.'"'; ?> id="password" name="password" autofocus />
					</div>
					<div>
						<span class="material-icons">create</span>
						<label for="database"><?php echo LANG_DATABASE_NAME; ?> :</label>
						<input type="text" <?php echo 'value="'.$database.'"'; ?> id="database" name="database" required="required" autofocus />
					</div>
					<!-- Connection Test Output !-->
					<label id="connectionStatus">
                        <?php
                        if($connTest=="true" && $connStatus==true){
                            echo LANG_SUCCESS_TEST_CONNECTION;
                        }
                        else if($connTest=="true" && $connStatus==false){
                            echo LANG_FAILED_TEST_CONNECTION;
                        }

                        if($error=="connect"){
                            echo LANG_ERROR_CONNECTION;
                        }
                        else if($error=="empty"){
                            echo LANG_ERROR_EMPTY_FIELDS;
                        }
						else if($error=="database"){
                            echo LANG_ERROR_DATABASE_CREATE;
                        }
                        ?>
                    </label>
					<!-- Buttons !-->
					<div class="form-buttons">
						<input id="connectionTest" type="button" <?php echo 'value="'.LANG_CONNECTION_TEST.'"'; ?>/>
						<input type="reset" <?php echo 'value="'.LANG_RESET.'"'; ?> id="reset"/>
						<input type="submit" <?php echo 'value="'.LANG_NEXT.'"'; ?> class="btn-theme" id="submit"/>
					</div>
				</form>
			</div>
		</div>
    </body>
</html>