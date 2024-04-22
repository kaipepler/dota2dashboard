<?
	$currentPage = "cosmetics";
	
	$title = "Cosmetics - ";
	
	$q = $_GET["q"];
	
	$platform = $_GET["platform"];
	
	if (isset($q) && isset($platform)) {
		
		if ($platform == "steam") {
			
			$redirect = "https://steamcommunity.com/market/search?appid=570&q=".str_replace(" ", "+", $q);
			header('Location: '.$redirect);
			
		} elseif ($platform == "dotabuff") {
		
			$redirect = "https://www.dotabuff.com/cosmetics/search?utf8=✓&item_search=".str_replace(" ", "+", $q);
			header('Location: '.$redirect);
		
		}
	}
	
	setcookie("page", $currentPage, time() + (10 * 365 * 24 * 60 * 60), "/");
	
	include $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/header.php';
?>

<div style='text-align: center; padding-top: 100px;'>
	

      <form method='get'>
      	<input type='text' name='q' id='q' placeholder='Search Cosmetics...' class='text-input input-large input-search' autocomplete="off" style="text-transform: none; color: white;" autofocus />
      	<input type='submit' name='' value='➡︎' style='' />
	  	
	  	<div style="text-align: center;">
	  		<div style="display:inline-block;">
	  			<input type="radio" name="platform" id="steam" value="steam" checked="checked" /><label for="steam"><img src='/assets/img/logo-steam.png' ondragstart='return false' align='center'></label>
	  		</div>
	  		<div style="display:inline-block;">
	  			<input type="radio" name="platform" id="dotabuff" value="dotabuff" /><label for="dotabuff"><img src='/assets/img/logo-dotabuff.png' ondragstart='return false' align='center'></label>
	  		</div>
	  	</div>
      </form>
	
	
</div>

<? include $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/footer.php'; ?>