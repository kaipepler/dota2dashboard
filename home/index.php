<?
	$currentPage = "home";
	
	$id = $_COOKIE["playerID"];
	
	$title = "Home - ";
	
	setcookie("page", $currentPage, time() + (10 * 365 * 24 * 60 * 60), "/");
	
	$homeConfig = $_COOKIE["homeConfig"];
	
	if(!isset($_COOKIE["homeConfig"])) {
		$newCustomLinks = [
		
			"left-config" => "on",
			"center-config" => "rows",
			"right-config" => "on",
		
			"Left" => [
				
				"linkDota2Blog",
				"linkTrackDota",
				"linkLiquipedia",
				
			],
			
			"Center" => [
				
				"profileDotabuff",
				"profileOpenDota",
				"profileStratz",
				
				
			],
			
			"Right" => [
				
				"widgetHeroesCounters",
				"widgetAbilitiesDota2Wiki",
				"widgetItemsDota2Wiki",
			],
		
		];
	    setcookie("homeConfig", json_encode($newCustomLinks), time() + (10 * 365 * 24 * 60 * 60), "/");
	    $_COOKIE["homeConfig"] = json_encode($newCustomLinks);
	}
	
	$customLinks = json_decode($_COOKIE["homeConfig"], true);
	
	include $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/header.php';
?>
	
<? if (!isset($id) || $id == "null"):?>
	
	<h2 style='text-align: center; margin: 30px; margin-top: 50px;'>
		Access a customizable dashboard by entering your Player ID in <a class='link' href='/settings'>Settings</a>.
	</h2>

<? else: ?>

	<div class='config-menu'>
			
			<div class='id-label-small'>MY ID: <span><?= $id ?></span></div>
				
			<div><a href='/home/customize' style="text-decoration: none;"><div class='customize-button'>CUSTOMIZE</div></a></div>
				
	</div>
<? endif; ?>
		
<? if (!isset($id) || $id == "null") {echo("<div style='filter: grayscale(1) blur(3px); pointer-events:none; opacity:0.5'>");} ?>
	
	<div class='component-grid'>
	
		<div class="component-grid-side-column column-l" style='<? if($customLinks["left-config"] == "off"){echo "display:none;";} ?>'>
		
			<div class='profile-button-frame'>
				
				<? 
					foreach ($customLinks["Left"] as $key => $value) {
						if (function_exists($value)) {$value("", "", "");}
						else {brokenWidget("left".$key);}
					};
				?>
				
			</div>
			
		</div>
	
		<div class='component-grid-center-column'>
			
			<? 
				if ($customLinks["center-config"] == "blocks") {
				
					echo("<div class='profile-button-frame'>");
					
					foreach ($customLinks["Center"] as $key => $value) { 
						if (function_exists($value)) {$value("", "", "");}
						else {brokenWidget("center".$key);}
						}
					
					echo("</div>");
					
				} elseif ($customLinks["center-config"] == "rows") {
					
					foreach ($customLinks["Center"] as $key => $value) {
						
						echo("<div class='profile-button-frame'>");
						if (function_exists($value)) {$value("", "", "");}
						else {brokenWidget("center".$key);}
						echo("</div>");
					}
					
				}
				
			?>
			
		</div>
	
		
		<div class="component-grid-side-column column-r" style='<? if($customLinks["right-config"] == "off"){echo "display:none;";} ?>'>
		
			<div class='profile-button-frame'>
				
				<? foreach ($customLinks["Right"] as $key => $value) { 
						if (function_exists($value)) {$value("", "", "");}
						else {brokenWidget("right".$key);}
					}
				?>
				
			</div>
			
		</div>
		
	</div>
			
<?
	if (!isset($id) || $id == "null") {echo("</div>");}
	
	include $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/footer.php';
?>