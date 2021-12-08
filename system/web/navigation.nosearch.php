            <?php require PATH_DATA."/navigation.pages.php"; ?>
            <div class="navigation">
				<p class="webVersionText"><?php echo VERSION_CORE; ?></p>
                <ul>
                    <?php
                    while($Row=$Query->FetchAssoc($NavigationPageResult)){
                        $name=trim($Row['page_name'], "$");

                        // !!NEXT LOGIN/LOGOUT ITEM
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
                            else if($name=="LANG_LOGIN")
                                echo '<span class="material-icons">assignment</span>';
                            else if($name=="LANG_LOGOUT")
                                echo '<span class="material-icons">power_settings_new</span>';
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
                    ?>
                </ul>
            </div>