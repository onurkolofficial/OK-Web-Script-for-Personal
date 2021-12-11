            <?php require PATH_DATA."/navigation.pages.php"; ?>
            <div class="navigation">
				<p class="webVersionText"><?php echo VERSION_CORE."-".VERSION_CODE; ?></p>
                <ul>
                    <?php
                        while($Row=$Query->FetchAssoc($NavigationPageResult)){
                            $name=trim($Row['page_name'], "$");
                    ?>
					<li>
						<a <?php echo 'href="'.$Row['page_url'].'"'; ?>>
                            <?php
                            // Get Page Icons
                            // NOTE! Names is defined in Database: 
                            // !! 'pages > page_name > $ NAME $' and 
                            // !! '/system/language/*/system.php'
                            if($name=="LANG_HOME")
                                echo '<span class="material-icons">home</span>';
                            else if($name=="LANG_APPS")
                                echo '<span class="material-icons">apps</span>';
                            else if($name=="LANG_ANNOUNCEMENTS")
                                echo '<span class="material-icons">assignment</span>';
                            else if($name=="LANG_CONTACT")
                                echo '<span class="material-icons">mail_outline</span>';
                            else if($name=="LANG_ABOUT")
                                echo '<span class="material-icons">info</span>';
                            else if($name=="LANG_PRIVACY")
                                echo '<span class="material-icons">security</span>';
                            else
                                echo '<span class="material-icons">insert_drive_file</span>';
                            ?>
							<?php
                            // Get Page Names
                            if(defined($name))
                                echo constant($name);
                            else
                                echo $name;
                            ?>
						</a>
					</li>
                    <?php 
                        }
                        if($UserSession==false){
                    ?>
                    <li>
						<a href="/login">
							<span class="material-icons">contacts</span>
							<?php echo LANG_LOGIN; ?>
						</a>
					</li>
                    <?php
                        }
                        else{
                            // Check Admin
                            $Row=getAdminRow($Server, $Query, $UserSession);
                            if($Row!=null && $Row['isAdmin']=="1"){
                    ?>
                    <li>
						<a href="/admin">
							<span class="material-icons">contacts</span>
							<?php echo LANG_CONTROL_PANEL; ?>
						</a>
					</li>
                    <?php
                            }
                    ?>
                    <li>
						<a href="/logout">
							<span class="material-icons">power_settings_new</span>
							<?php echo LANG_LOGOUT; ?>
						</a>
					</li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
            <div class="logoNsearch">
				<div class="logoText">
					<p class="logo text-theme">
                        <?php
                        if(isset($navigationTitle))
                            echo $navigationTitle;
                        else
                            echo 'Onur Kol';
                        ?>
                    </p>
					<p><?php echo LANG_NAVIGATION_LOGO_TITLE; ?></p>
				</div>
				<div class="logoSearch">
					<input id="webSearch" type="search" <?php echo 'placeholder="'.LANG_SEARCH.' ..."'; ?>>
				</div>
			</div>