<?
	$currentPage = "settings";
	
	$id = $_COOKIE["playerID"];
	
	$newID = $_GET["id"];
	
	$newTooltips = $_GET["tooltips"];
	
	$changeNewTabs = $_GET["newTabs"];
	
	$autoRedirect = $_GET["autoRedirect"];
	
	if (isset($newID)) {
		setcookie("playerID", $newID, time() + (10 * 365 * 24 * 60 * 60), "/");
		$redirect = "http://dota2dashboard.com/settings";
		header('Location: '.$redirect);
	}
	elseif (isset($newTooltips)) {
		setcookie("tooltips", $newTooltips, time() + (10 * 365 * 24 * 60 * 60), "/");
		$redirect = "http://dota2dashboard.com/settings";
		header('Location: '.$redirect);
	}
	elseif (isset($changeNewTabs)) {
		setcookie("newTabs", $changeNewTabs, time() + (10 * 365 * 24 * 60 * 60), "/");
		$redirect = "http://dota2dashboard.com/settings";
		header('Location: '.$redirect);
	}
	elseif (isset($autoRedirect)) {
		setcookie("autoRedirect", $autoRedirect, time() + (10 * 365 * 24 * 60 * 60), "/");
		$redirect = "http://dota2dashboard.com/settings";
		header('Location: '.$redirect);
	}
	
	$title = "Settings - ";
	
	include $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/header.php';
?>

<style>
	select {
		-webkit-appearance: none; 
		-moz-appearance: none;
		appearance: none;
		appearance: none;
		background: none;
		border: none;
		font-size: 30px;
		color: #FAE232;
		font-weight: bold;
		font-family: 'Rubik', sans-serif;
	}
	
	option {
		cursor: pointer;
	}
	
	select:focus {
		outline: none;
	}
	
	select:hover {
		cursor: pointer;
	}
</style>

<!--<script type="text/javascript">
	//Numerical filter script by emkey08 on Stack Overflow (https://stackoverflow.com/a/469362)
	
	// Restricts input for the given textbox to the given inputFilter.
	function setInputFilter(textbox, inputFilter) {
	  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
	    textbox.addEventListener(event, function() {
	      if (inputFilter(this.value)) {
	        this.oldValue = this.value;
	        this.oldSelectionStart = this.selectionStart;
	        this.oldSelectionEnd = this.selectionEnd;
	      } else if (this.hasOwnProperty("oldValue")) {
	        this.value = this.oldValue;
	        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
	      }
	    });
	  });
	}
</script>-->

<div style='text-align: left; padding: 0px 40px'>
	
	<h1 style="text-align: center; margin-top: 40px">Settings</h1>
	
	<div class="settings-module">
		<div style="">
			<h2 style="margin-top: 10px;">Player ID</h2>
			<p>Enter your player ID to customize the dashboard with links relevant to you.</p>
		</div>
		
		<div class='settings-control'>
			<form method='get' style="margin-bottom: 0px; margin-top: 10px;">
				<input type='tel' name='id' id='id' placeholder='<? if (!isset($id) || $id == "null") {echo "NOT SET";} else {echo "Enter Player ID...";} ?>' value="<? if (!isset($id) || $id == "null") {echo "";} else {echo $id;} ?>" class='text-input input-small input-search' onkeypress='return isNumberKey(event)' onClick='this.select();' autocomplete="off" style="padding: 10px; margin: 0px; width: 300px;" />
				<br><input type='submit' name='' value='Save' style='left: 0px; width: auto; font-size: 20px; font-weight: bold;' />
			</form>
			<script type='text/javascript'>	
				// Install input filters.
				setInputFilter(document.getElementById("id"), function(value) {
				  return /^\d*$/.test(value); });
			</script>
		</div>
	</div>
	
	<div style="display: flex; flex-flow: row nowrap; justify-content: space-between; align-items: center; border-bottom: 1px solid white; padding: 40px 0px;">
		<div style="">
			<h2 style="margin-top: 10px;">Tooltips</h2>
			<p>Change whether tooltips appear when hovering over hero, ability, or item buttons.</p>
		</div>
		
		<div class='settings-control' style="text-align: center; width: 300px;">
				<?
					if ($tooltips == 1) {
						echo("<a class='link' style='font-size:30px; border-bottom:none;' href='?tooltips=0'>On</a>");
					} elseif ($tooltips == 0) {
						echo("<a class='link' style='font-size:30px; color:gray; border-bottom:none;' href='?tooltips=1'>Off</a>");
					}
				?>
		</div>
	</div>
	
	<style>
		.badge {
			background: #1476A5;
			border-radius: 5px;
			padding: 5px;
			font-size: 14px;
			letter-spacing: 1px;
			position: relative;
			bottom: 3px;
			
		}
	</style>
	
	<div style="display: flex; flex-flow: row nowrap; justify-content: space-between; align-items: center; border-bottom: 1px solid white; padding: 40px 0px;">
		<div style="">
			<h2 style="margin-top: 10px;">Open Links in New Tabs <span class="badge">BETA</span></h2>
			<p>Choose whether clicking links opens in a new tab, or in the main window.</p>
		</div>
		
		<div class='settings-control' style="text-align: center; width: 300px;">
				<?
					if ($newTabs == 1) {
						echo("<a class='link' style='font-size:30px; border-bottom:none;' href='?newTabs=0'>Yes</a>");
					} elseif ($newTabs == 0) {
						echo("<a class='link' style='font-size:30px; color:gray; border-bottom:none;' href='?newTabs=1'>No</a>");
					}
				?>
		</div>
	</div>
	
	<div style="display: flex; flex-flow: row nowrap; justify-content: space-between; align-items: center; border-bottom: 1px solid white; padding: 40px 0px;">
		<div style="">
			<h2 style="margin-top: 10px;">Auto-Redirect to Last Module Used</h2>
			<p>If set to “On,” visiting <a href='https://dota2dashboard.com' class='link' style='color: white;'>dota2dashboard.com</a> will automatically redirect to the last module used.</p>
			<p>If set to “Off,” the site will default to the “Home” module.</p>
		</div>
		
		<div class='settings-control' style="text-align: center; width: 300px;">
				<?
					if ($autoRedirect == 1) {
						echo("<a class='link' style='font-size:30px; border-bottom:none;' href='?autoRedirect=0'>On</a>");
					} elseif ($autoRedirect == 0) {
						echo("<a class='link' style='font-size:30px; color:gray; border-bottom:none;' href='?autoRedirect=1'>Off</a>");
					}
				?>
		</div>
	</div>
	
	<div style="display: flex; flex-flow: row nowrap; justify-content: space-between; align-items: center; border-bottom: 1px solid white; padding: 40px 0px;">
		<div style="">
			<h2 style="margin-top: 10px;">Reset Home Layout</h2>
			<p>This option will clear any customizations from the home layout, and restore the default set of components.</p>
		</div>
		
		<div class='settings-control' style="text-align: center; width: 300px;">
				<a class='link' style='font-size:30px; border-bottom:none;' href="/home/customize/?reset=1" onclick="return confirm('Resetting the layout will delete any components you’ve customized, and restore the default set.\n\nAre you sure you want to continue?');"><span style="color: red;">✕</span> Reset</a>
		</div>
	</div>
	
	<div class="settings-module">
		<div style="align-self: flex-start;">
			<h2 style="margin-top: 10px;">Analytics</h2>
			<p>Dota 2 Dashboard uses analytics to track standard information such as user engagement, usage patterns, and other such standard web data.</p>
			<p>Our analytics respect Do Not Track requests, and you can opt out at any time.</p>
		</div>
		
		<div class='settings-control'>
			<iframe
			        style="border: 0; height: 225px; width: 100%; border-radius: 10px;"
			        src="https://dota2dashboard.com/analytics/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=1476A5&fontColor=FFFFFF&fontSize=&fontFamily=Rubik, sans-serif"
			        ></iframe>
			
		</div>
	</div>
	
</div>

<? include $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/footer.php'; ?>