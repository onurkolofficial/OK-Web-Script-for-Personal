            <div class="navigation">
				<p class="webVersionText"><?php echo VERSION_CORE; ?></p>
				<ul>
					<li>
						<a href="#">
							<span class="material-icons">home</span>
							<?php echo LANG_HOME; ?>
						</a>
						<a class="sub" href="/">
							<span class="material-icons">home</span>
							<?php echo LANG_WEB_HOME; ?>
						</a>
						<a class="sub" href="/admin">
							<span class="material-icons">business</span>
							<?php echo LANG_ADMIN_HOME; ?>
						</a>
					</li>
					<li>
						<a href="/admin/pages">
							<span class="material-icons">insert_drive_file</span>
							<?php echo LANG_PAGES; ?>
						</a>
					</li>
					<li>
						<a href="/admin/announcements">
							<span class="material-icons">assignment</span>
							<?php echo LANG_ANNOUNCEMENTS; ?>
						</a>
					</li>
					<li>
						<a href="/admin/mails">
							<span class="material-icons">mail</span>
							<?php echo LANG_MAILS; ?>
						</a>
					</li>
					<li>
						<a href="/admin/apps">
							<span class="material-icons">apps</span>
							<?php echo LANG_APPLICATIONS; ?>
						</a>
						<a class="sub" href="/admin/apps/categories">
							<span class="material-icons">list</span>
							<?php echo LANG_CATEGORIES; ?>
						</a>
					</li>
					<li>
						<a href="/logout">
							<span class="material-icons">power_settings_new</span>
							<?php echo LANG_LOGOUT; ?>
						</a>
					</li>
				</ul>
			</div>
			<?php
				if(isset($navigationTitle)){
			?>
			<div class="logoNsearch">
				<div class="logoText">
					<p class="logo text-theme"><?php echo $navigationTitle; ?></p>
				</div>
			</div>
			<?php
				}
			?>