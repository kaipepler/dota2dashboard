<?
	$currentPage = "home";
	
	$id = $_COOKIE["playerID"];
	
	$fx = $_GET["fx"];
	
	if (!isset($id) || $id == "null") {
		$redirect = "/home/";
		header('Location: '.$redirect);
	}
	
	$title = "Customize Home - ";
	
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
	
	$redirect = "/home/customize/?fx=0#config";
	
	$leftConfig = $_GET["leftConfig"];
	$centerConfig = $_GET["centerConfig"];
	$rightConfig = $_GET["rightConfig"];
	
	if(isset($leftConfig)) {
	
		$customLinks["left-config"] = $leftConfig;
		setcookie("homeConfig", json_encode($customLinks), time() + (10 * 365 * 24 * 60 * 60), "/");
		$_COOKIE["homeConfig"] = json_encode($customLinks);
		header('Location: '.$redirect);
		
	} elseif(isset($centerConfig)) {
	
		$customLinks["center-config"] = $centerConfig;
		setcookie("homeConfig", json_encode($customLinks), time() + (10 * 365 * 24 * 60 * 60), "/");
		$_COOKIE["homeConfig"] = json_encode($customLinks);
		header('Location: '.$redirect);
		
	} elseif(isset($rightConfig)) {
	
		$customLinks["right-config"] = $rightConfig;
		setcookie("homeConfig", json_encode($customLinks), time() + (10 * 365 * 24 * 60 * 60), "/");
		$_COOKIE["homeConfig"] = json_encode($customLinks);
		header('Location: '.$redirect);
	}
	
	foreach ($customLinks["Left"] as $key => $value) {
		$getBus = "left".$key;
		${"left".$key} = $_GET[$getBus];
		
		if(isset(${"left".$key})) {
		
			if (${"left".$key} == "clear") {unset($customLinks["Left"][$key]);}
			else {$customLinks["Left"][$key] = ${"left".$key};}
			
			setcookie("homeConfig", json_encode($customLinks), time() + (10 * 365 * 24 * 60 * 60), "/");
			$_COOKIE["homeConfig"] = json_encode($customLinks);
			header('Location: '.$redirect);
		}
	}
	
	foreach ($customLinks["Center"] as $key => $value) {
		$getBus = "center".$key;
		${"center".$key} = $_GET[$getBus];
		
		if(isset(${"center".$key})) {
		
			if (${"center".$key} == "clear") {unset($customLinks["Center"][$key]);}
			else {$customLinks["Center"][$key] = ${"center".$key};}
			
			setcookie("homeConfig", json_encode($customLinks), time() + (10 * 365 * 24 * 60 * 60), "/");
			$_COOKIE["homeConfig"] = json_encode($customLinks);
			header('Location: '.$redirect);
		}
	}
	
	foreach ($customLinks["Right"] as $key => $value) {
		$getBus = "right".$key;
		${"right".$key} = $_GET[$getBus];
		
		if(isset(${"right".$key})) {
		
			if (${"right".$key} == "clear") {unset($customLinks["Right"][$key]);}
			else {$customLinks["Right"][$key] = ${"right".$key};}
			
			setcookie("homeConfig", json_encode($customLinks), time() + (10 * 365 * 24 * 60 * 60), "/");
			$_COOKIE["homeConfig"] = json_encode($customLinks);
			header('Location: '.$redirect);
		}
	}
	
	$leftNEW = $_GET["leftNEW"];
	$centerNEW = $_GET["centerNEW"];
	$rightNEW = $_GET["rightNEW"];
	
	if(isset($leftNEW)) {
	
		$customLinks["Left"][] = $leftNEW;
		setcookie("homeConfig", json_encode($customLinks), time() + (10 * 365 * 24 * 60 * 60), "/");
		$_COOKIE["homeConfig"] = json_encode($customLinks);
		header('Location: '.$redirect);
		
	} elseif(isset($centerNEW)) {
	
		$customLinks["Center"][] = $centerNEW;
		setcookie("homeConfig", json_encode($customLinks), time() + (10 * 365 * 24 * 60 * 60), "/");
		$_COOKIE["homeConfig"] = json_encode($customLinks);
		header('Location: '.$redirect);
		
	} elseif(isset($rightNEW)) {
	
		$customLinks["Right"][] = $rightNEW;
		setcookie("homeConfig", json_encode($customLinks), time() + (10 * 365 * 24 * 60 * 60), "/");
		$_COOKIE["homeConfig"] = json_encode($customLinks);
		header('Location: '.$redirect);
	}
	
	$resetLayout = $_GET["reset"];
	
	if(isset($resetLayout)) {
	
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
		header('Location: '.$redirect);
		
	}
	
	include $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/header.php';
?>

<style>
	.config-subhead {
		<? if($fx !== "0"){echo("animation: slideDown .3s linear;");} ?>
	}
</style>
	
	<div class="config-menu" style='margin-bottom: 0px;' id="config">
			
			<div class='id-label-small'>CHANGE ID: <a class="link" href="/settings">SETTINGS</a></div>
				
			<div><a href='/home/' style="text-decoration: none;"><div class='customize-button'>BACK TO HOME</div></a></div>
				
	</div>
	
	<div class='config-subhead'>
			
			<div>
				<?
					if($customLinks["left-config"] == "on") {
						echo("<div style='margin-top:10px;'><a class='link' style='font-size:30px; border-bottom:none;' href='?leftConfig=off'>On</a></div>");
					} elseif($customLinks["left-config"] == "off") {
						echo("<div style='margin-top:10px;'><a class='link' style='font-size:30px; color:gray; border-bottom:none;' href='?leftConfig=on'>Off</a></div>");
					}
				?>
			</div>
			
			<div>
				<?
					if($customLinks["center-config"] == "rows") {
						echo("<div style='margin-top:10px;'><a class='link' style='font-size:30px; border-bottom:none;' href='?centerConfig=blocks'>Rows</a></div>");
					} elseif($customLinks["center-config"] == "blocks") {
						echo("<div style='margin-top:10px;'><a class='link' style='font-size:30px; border-bottom:none;' href='?centerConfig=rows'>Blocks</a></div>");
					}
				?>
			</div>
				
			<div>
				<?
					if($customLinks["right-config"] == "on") {
						echo("<div style='margin-top:10px;'><a class='link' style='font-size:30px; border-bottom:none;' href='?rightConfig=off'>On</a></div>");
					} elseif($customLinks["right-config"] == "off") {
						echo("<div style='margin-top:10px;'><a class='link' style='font-size:30px; color:gray; border-bottom:none;' href='?rightConfig=on'>Off</a></div>");
					}
				?>
			</div>
				
	</div>
		
<? if (!isset($id) || $id == "null") {echo("<div style='filter: grayscale(1) blur(3px); pointer-events:none; opacity:0.5'>");} ?>
	
	<div class='component-grid'>
	
		<div class="component-grid-side-column column-l" style='<? if($customLinks["left-config"] == "off"){echo "display:none;";} ?>'>
		
			<div class='profile-button-frame'>
				
				<? 
					foreach ($customLinks["Left"] as $key => $value) {
						if (function_exists($value)) {$value("config", "left".$key, $value);}
						else {brokenWidget("left".$key);}
						}
					
					profileSetWidget("leftNEW", "none");
				?>
				
			</div>
			
		</div>
	
		<div class='component-grid-center-column'>
			
			<? 
				if ($customLinks["center-config"] == "blocks") {
				
					echo("<div class='profile-button-frame'>");
					
					foreach ($customLinks["Center"] as $key => $value) { 
						if (function_exists($value)) {$value("config", "center".$key, $value);}
						else {brokenWidget("center".$key);}
						}
					
					profileSetWidget("centerNEW", "none");
					
					echo("</div>");
					
				} elseif ($customLinks["center-config"] == "rows") {
					
					foreach ($customLinks["Center"] as $key => $value) {
						
						echo("<div class='profile-button-frame'>");
						if (function_exists($value)) {$value("config", "center".$key, $value);}
						else {brokenWidget("center".$key);}
						echo("</div>");
					}
					
					echo("<div class='profile-button-frame'>");
					profileSetWidget("centerNEW", "none");
					echo("</div>");
					
				}
				
			?>
			
		</div>
	
		
		<div class="component-grid-side-column column-r" style='<? if($customLinks["right-config"] == "off"){echo "display:none;";} ?>'>
		
			<div class='profile-button-frame'>
				
				<? 
					foreach ($customLinks["Right"] as $key => $value) {
						if (function_exists($value)) {$value("config", "right".$key, $value);}
						else {brokenWidget("right".$key);}
					}
				
					profileSetWidget("rightNEW", "none");
				?>
				
			</div>
			
		</div>
		
	</div>
	
	<div style="margin: 20px; text-align: center; border-top: 2px solid white; padding: 20px;">
		<a class="link" style="font-size:20px; border-bottom:none;" href="?reset=1" onclick="return confirm('Resetting the layout will delete any components you’ve customized, and restore the default set.\n\nAre you sure you want to continue?');"><span style="color: red;">✕</span> Reset Layout to Default</a>
	</div>
			
<?
	if (!isset($id) || $id == "null") {echo("</div>");}
	
	include $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/footer.php';
?>