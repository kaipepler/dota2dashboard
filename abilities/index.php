<?
	$currentPage = "abilities";
	
	$id = $_GET["id"];
	
	include $_SERVER['DOCUMENT_ROOT'] . '/heroes/array.php';
	
	foreach ($heroes as $key => $value) {
		if (isset($heroes[$key]["abilities"][$id])) {$heroID = $key;}
	}
	
	if (isset($id)) {$title = $heroes[$heroID]['abilities'][$id]['name']." - Abilities - ";}
	else {$title = "Abilities - ";}
	
	setcookie("page", $currentPage, time() + (10 * 365 * 24 * 60 * 60), "/");
	
	include $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/header.php';
	
?>

<?if (isset($id)):?>

	<style>
		.gs {
			filter:grayscale(1);
			transition: filter 0.2s linear;
		}
		
	.gs:hover {
			filter:grayscale(0);
		}
		
		.gs-current {
			filter:grayscale(0);
			border:2px solid white !important;
		}
	</style>
	
	
	<div style='padding-top:22px; padding-bottom:20px; display:flex; flex-flow:row wrap; justify-content:center; align-items:center;'>
	
		<div style="background-image:url('/assets/img/abilities/<?= str_replace(' ', '_', str_replace('’', '', $heroes[$heroID]["abilities"][$id]	['name']))?>_icon.png'); width: 120px; height: 120px; border: 2px solid #1476A5; background-size: cover; margin-right: 20px;">
		</div>
	
		<div>
			<div class='id-name-tile'><?= $heroes[$heroID]['abilities'][$id]['name'] ?></div>
		
			<div class='id-block-links' style='margin-top:0px; margin-left:2px;'>
				<div><a href='/abilities'><div class='rotate' style='position:relative; top:1px;'><img src='/assets/img/icon-back.svg'></div> DIFFERENT ABILITY</a></div>
			</div>
		</div>
	</div>
				
	<div class='button-collection button-shape-square' style='margin: 20px; background: #1476A5; padding: 10px; border-radius: 10px; text-align:center;'>
	<details>
	<summary onselectstart='return false'><?= strtoupper($heroes[$heroID]['name']) ?>’S ABILITIES</summary>
	
	<? 
		foreach ($heroes[$heroID]["abilities"] as $key => $value) {
			echo("<a href=\"/abilities/?id=".$key."\"><div class='gs ");
			if ($key == $id) {echo("gs-current");}
			echo ("' style=\"background-image:url('/assets/img/abilities/".str_replace(' ', '_', str_replace('’', '', $heroes[$heroID]["abilities"][$key]	["name"]))."_icon.png');\"><span>".$heroes[$heroID]["abilities"][$key]["name"]."</span></div></a>");
		}
	?>
				
	<p style='margin-top:5px'><a class='link' style='font-size:12px' href='/heroes/?id=<?= $heroID ?>'><?= $heroes[$heroID]['name']?>’s Dashboard Page</a></p>
	</details>
	</div>
	
	<div class='profile-button-frame'>
		
		<a href='https://liquipedia.net/dota2/<?= str_replace(' ', '_', str_replace('’', '%27', $heroes[$heroID]["name"]))."#".str_replace(' ', '_', 	str_replace('’', '.27', $heroes[$heroID]["abilities"][$id]['name']))?>' class='profile-button liquipedia' <? if($newTabs == 1) {echo("target='_blank'");} ?>>
			<div><img src='/assets/img/logo-liquipedia.png' ondragstart='return false' align='center'> LIQUIPEDIA</div>
		</a>
		
		<a href='https://dota2.gamepedia.com/<?= str_replace(' ', '_', str_replace('’', '%27', $heroes[$heroID]["name"]))."#".str_replace(' ', '_', 	str_replace('’', '.27', $heroes[$heroID]["abilities"][$id]['name']))?>' class='profile-button dota2wiki' <? if($newTabs == 1) {echo("target='_blank'");} ?>>
			<div><img src='/assets/img/logo-dota2wiki.png' ondragstart='return false' align='center'> DOTA 2 WIKI</div>
		</a>
		
	</div>
	
	<div class='profile-button-frame'>
	
		<a href='https://www.dotabuff.com/heroes/<?= $heroID ?>/abilities' class='profile-button dotabuff' <? if($newTabs == 1) {echo("target='_blank'");} ?>>
			<div><img src='/assets/img/logo-dotabuff.png' ondragstart='return false' align='center'> DOTABUFF</div>
		</a>
		
	</div>
		
<?else:?>
	
	<div style="text-align: center; padding-top: 20px;">
		<input type="text" id="search-headers" name="search-headers" placeholder="Search Abilities..." class="text-input input-small" data-list=".button-collection"  onClick='this.select();' autocomplete="off" autofocus />
	</div><div style='margin:20px 60px; text-align:center'>
		
		<?
		foreach ($heroes as $key => $value) {
		
			echo "<div class='button-collection button-shape-square label-top' style='vertical-align:top'><span class='origin'><a href='/heroes/?id=".$key."'>".strtoupper($heroes[$key]["name"])."</a></span>";
				
			foreach ($heroes[$key]["abilities"] as $key2 => $value2) {
				echo("
				<a href=\"?id=".$key2."\">
					<div style=\"background-image:url('/assets/img/abilities/".str_replace(' ', '_', str_replace('’', '', $heroes[$key]["abilities"][$key2]["name"]))."_icon.png');\">
					<span>".$heroes[$key]["abilities"][$key2]["name"]."</span>
					<span style='display:none;'>".$heroes[$key]["name"].", ".$heroes[$key]["abilities"][$key2]["alt-names"]."</span>
					</div>
				</a>
				");
				
				if ($key2 == "ice-wall") {echo("<br>");}
			}
				
			echo "</div>";
		}
		?>
		
		</div>
		
<? endif; ?>
	
<?
	
	include $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/footer.php';
	
?>