<!doctype html>
<html>
<?php
require $_SERVER['DOCUMENT_ROOT'].'/system/boot.php';

// Include Page Head
require PATH_SYSTEM_WEB.'/head.php';

// Get Variables
$category=@$_GET['c']; // 'c' is default in '.htaccess' file.
$keyword=@$_GET['q']; // 'q' is default in '.htaccess' file.

// Get App Data
require PATH_DATA."/search.php";

// Searching Data
$SearchResult=getSearchResult($Server, $Query, $category, $keyword);
// Search Count
if($keyword=="")
	$SearchCount=0;
else
	$SearchCount=$Query->NumRows($SearchResult);
?>
    <body>
        <!-- Loading Dialog !-->
		<?php require PATH_SYSTEM_WEB.'/loading.dialog.php'; ?>
        <!-- Navigation !-->
		<div class="navigationContainer">
            <?php require PATH_SYSTEM_WEB.'/navigation.php'; ?>
        </div>
        <div class="pageContent">
		<div class="searchContent">
				<h4><?php echo LANG_SEARCH_RESULT; ?> '<span class="text-theme"><?php echo $keyword; ?></span>', <?php echo LANG_TOTAL; ?>: <span class="text-theme"><?php echo $SearchCount; ?></span></h4>
				<hr>
				<div class="categoryNavigation">
					<a <?php echo 'href="/search/announcements/'.$keyword.'"'; ?>><input type="button" <?php echo 'value="'.LANG_ANNOUNCEMENTS.'"'; ?> class="btn-theme"></a>
					<a <?php echo 'href="/search/apps/'.$keyword.'"'; ?>><input type="button" <?php echo 'value="'.LANG_APPLICATIONS.'"'; ?> class="btn-theme"></a>
					<a <?php echo 'href="/search/users/'.$keyword.'"'; ?>><input type="button" <?php echo 'value="'.LANG_USERS.'"'; ?> class="btn-theme"></a>
				</div>
				<div class="searchResult">
					<?php
						if($SearchCount<=0 || $keyword==""){
					?>
					<!-- No Result Search !-->
					<div id="searchNoResult">
						<br><br>
						<h2><?php echo LANG_SEARCH_NO_RESULT; ?></h2>
						<br><br>
					</div>
					<?php
						}
						else {
					?>
					<h3 class="text-theme">
						<?php
							if($category=='announcements') echo LANG_ANNOUNCEMENTS;
							else if($category=='apps') echo LANG_APPS;
							else if($category=='users') echo LANG_USERS;
						?>
					</h3>
					<?php
							if($category=='announcements'){ 
					?>
					<!-- Result for Announcement !-->
					<div class="resultBody">
						<?php
							while($Row=$Query->FetchAssoc($SearchResult)){
						?>
						<a <?php echo 'href="/announcements/'.$Row['id'].'"'; ?>><?php echo $Row['announcement_name']; ?></a>
						<hr>
						<?php 
							}
						?>
					</div>
					<?php
							}
							else if($category=='apps'){ 
					?>
					<!-- Result for Applications !-->
					<div class="resultBody">
						<?php
							while($Row=$Query->FetchAssoc($SearchResult)){
						?>
						<a <?php echo 'href="/apps/'.$Row['category_id'].'/'.$Row['id'].'"'; ?>><input type="button" class="btn-theme" <?php echo 'value="'.$Row['app_name'].'"'; ?>></a>
						<hr>
						<?php 
							}
						?>
					</div>
					<?php
							}
							else if($category=='users'){ 
					?>
					<!-- Result for User !-->
					<div class="resultBody">
						<?php
							while($Row=$Query->FetchAssoc($SearchResult)){
						?>
						<a href="#"><input type="button" <?php echo 'value="'.$Row['name'].' '.$Row['surname'].' (user: '.$Row['username'].')"'; ?>></a>
						<hr>
						<?php 
							}
						?>
					</div>
					<?php
							}
						}
					?>
				</div>
			</div>
        </div>
    </body>
</html>