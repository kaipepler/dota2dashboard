<?
	$currentPage = "heroes";
	
	$id = $_GET["id"];
	
	include $_SERVER['DOCUMENT_ROOT'] . '/heroes/array.php';
	
	if (isset($id)) {$title = $heroes[$id]['name']." - Heroes - ";}
	else {$title = "Heroes - ";}
	
	setcookie("page", $currentPage, time() + (10 * 365 * 24 * 60 * 60), "/");
	
	include $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/header.php';
	
?>
<? if (isset($id)): ?>

<?
	$apiMatchups = json_decode(file_get_contents("https://api.stratz.com/api/v1/Hero/".$heroes[$id]['hero-id']."/matchUp"),true);
	
	foreach ($heroes as $key => $value) {if ($heroes[$key]["hero-id"] == $apiMatchups["advantage"][0]["vs"][0]["heroId2"]) {$bestVS1 = $key;}}
	foreach ($heroes as $key => $value) {if ($heroes[$key]["hero-id"] == $apiMatchups["advantage"][0]["vs"][1]["heroId2"]) {$bestVS2 = $key;}}
	foreach ($heroes as $key => $value) {if ($heroes[$key]["hero-id"] == $apiMatchups["advantage"][0]["vs"][2]["heroId2"]) {$bestVS3 = $key;}}
	foreach ($heroes as $key => $value) {if ($heroes[$key]["hero-id"] == $apiMatchups["advantage"][0]["vs"][3]["heroId2"]) {$bestVS4 = $key;}}
	foreach ($heroes as $key => $value) {if ($heroes[$key]["hero-id"] == $apiMatchups["advantage"][0]["vs"][4]["heroId2"]) {$bestVS5 = $key;}}
	
	foreach ($heroes as $key => $value) {if ($heroes[$key]["hero-id"] == $apiMatchups["disadvantage"][0]["vs"][0]["heroId2"]) {$worstVS1 = $key;}}
	foreach ($heroes as $key => $value) {if ($heroes[$key]["hero-id"] == $apiMatchups["disadvantage"][0]["vs"][1]["heroId2"]) {$worstVS2 = $key;}}
	foreach ($heroes as $key => $value) {if ($heroes[$key]["hero-id"] == $apiMatchups["disadvantage"][0]["vs"][2]["heroId2"]) {$worstVS3 = $key;}}
	foreach ($heroes as $key => $value) {if ($heroes[$key]["hero-id"] == $apiMatchups["disadvantage"][0]["vs"][3]["heroId2"]) {$worstVS4 = $key;}}
	foreach ($heroes as $key => $value) {if ($heroes[$key]["hero-id"] == $apiMatchups["disadvantage"][0]["vs"][4]["heroId2"]) {$worstVS5 = $key;}}
?>
		
	<div style='padding-top:22px; padding-bottom:20px; display:flex; flex-flow:row wrap; justify-content:center; align-items:center;'>
	
		<div style="background-image:url('/assets/img/heroes/<?= str_replace(' ', '_', str_replace('’', '', $heroes[$id]["name"]))?>_icon.png'); background-position: <?= $heroes[$id]["bg-pos"] ?>%; width: 120px; height: 120px; border: 2px solid #1476A5; background-size: cover; margin-right: 20px; border-radius:10px">
		</div>
	
		<div>
			<div class='id-name-tile'><?= $heroes[$id]['name'] ?></div>
		
			<div class='id-block-links' style='margin-top:0px; margin-left:2px;'>
				<div><a href='/heroes'><div class='rotate' style='position:relative; top:1px;'><img src='/assets/img/icon-back.svg'></div> DIFFERENT HERO</a></div>
			</div>
		</div>
	</div>
	
	<div class='button-collection button-shape-square ability-dropdown' style='margin:20px'>
	<details>
	<summary onselectstart='return false'>ABILITIES</summary>
		<?
			foreach ($heroes[$id]["abilities"] as $key => $value) {
				echo("<a href=\"/abilities/?id=".$key."\"><div style=\"background-image:url('/assets/img/abilities/".str_replace(' ', '_', str_replace('’', '', $heroes[$id]["abilities"][$key]["name"]))."_icon.png');\"><span>".$heroes[$id]["abilities"][$key]["name"]."</span></div></a>");
			}
		
		?>
	</details>
	</div>
	
	<div class='subcat-button-frame' style="display: none;">
	
		<div class='subcat-button' style="margin-top:-30px; border-top: none; border-top-left-radius: 0px; border-top-right-radius: 0px;">
			<div style="width: auto;">
				Abilities Info:
					<a href='https://dotabuff.com/heroes/<?= $id ?>/abilities' <? if($newTabs == 1) {echo("target='_blank'");} ?>><img src='/assets/img/logo-dotabuff.png' class='button' ondragstart='return false' align='center'></a>
					
					<a href='https://liquipedia.net/dota2/<?= str_replace(' ', '_', str_replace('’', '%27', $heroes[$id]['name']))?>#Abilities' <? if($newTabs == 1) {echo("target='_blank'");} ?>><img src='/assets/img/logo-liquipedia.png' class='button' ondragstart='return false' align='center'></a>
					
					<a href='https://dota2.gamepedia.com/<?= str_replace(' ', '_', str_replace('’', '%27', $heroes[$id]['name']))?>#Abilities' <? if($newTabs == 1) {echo("target='_blank'");} ?>><img src='/assets/img/logo-dota2wiki.png' class='button' ondragstart='return false' align='center'></a>
			</div>
		</div>
		
	</div>
	
	<div class='subcat-button-frame'>
		
		<div class='subcat-button'>
			<div style="width:100%; display: flex; flex-flow: row wrap; justify-content: space-around;">
				
				
				<div style="text-align: center; width: auto;">
				<h1 style="margin-bottom: 20px;">BEST VS.</h1>
					
					<div class='button-collection button-shape-rrect' style="margin: 0px; width:auto;">
					
						<a href="?id=<?= $bestVS1 ?>">
							<div style="background-image:url('/assets/img/heroes/<?= str_replace(' ', '_', str_replace('’', '', $heroes[$bestVS1]["name"]))?>_icon.png'); background-position: <?= $heroes[$bestVS1]["bg-pos"] ?>%;">
								<span><?= $heroes[$bestVS1]["name"] ?></span>
							</div>
						</a>
						
						<a href="?id=<?= $bestVS2 ?>">
							<div style="background-image:url('/assets/img/heroes/<?= str_replace(' ', '_', str_replace('’', '', $heroes[$bestVS2]["name"]))?>_icon.png'); background-position: <?= $heroes[$bestVS2]["bg-pos"] ?>%;">
								<span><?= $heroes[$bestVS2]["name"] ?></span>
							</div>
						</a>
						
						<a href="?id=<?= $bestVS3 ?>">
							<div style="background-image:url('/assets/img/heroes/<?= str_replace(' ', '_', str_replace('’', '', $heroes[$bestVS3]["name"]))?>_icon.png'); background-position: <?= $heroes[$bestVS3]["bg-pos"] ?>%;">
								<span><?= $heroes[$bestVS3]["name"] ?></span>
							</div>
						</a>
						
						<a href="?id=<?= $bestVS4 ?>">
							<div style="background-image:url('/assets/img/heroes/<?= str_replace(' ', '_', str_replace('’', '', $heroes[$bestVS4]["name"]))?>_icon.png'); background-position: <?= $heroes[$bestVS4]["bg-pos"] ?>%;">
								<span><?= $heroes[$bestVS4]["name"] ?></span>
							</div>
						</a>
						
						<a href="?id=<?= $bestVS5 ?>">
							<div style="background-image:url('/assets/img/heroes/<?= str_replace(' ', '_', str_replace('’', '', $heroes[$bestVS5]["name"]))?>_icon.png'); background-position: <?= $heroes[$bestVS5]["bg-pos"] ?>%;">
								<span><?= $heroes[$bestVS5]["name"] ?></span>
							</div>
						</a>
						
					</div>
					
				</div>
				
				<div style="text-align: center; width: auto;">
				<h1 style="margin-bottom: 20px;">WORST VS.</h1>
					
					<div class='button-collection button-shape-rrect' style="margin: 0px; width:auto;">
					
						<a href="?id=<?= $worstVS1 ?>">
							<div style="background-image:url('/assets/img/heroes/<?= str_replace(' ', '_', str_replace('’', '', $heroes[$worstVS1]["name"]))?>_icon.png'); background-position: <?= $heroes[$worstVS1]["bg-pos"] ?>%;">
								<span><?= $heroes[$worstVS1]["name"] ?></span>
							</div>
						</a>
						
						<a href="?id=<?= $worstVS2 ?>">
							<div style="background-image:url('/assets/img/heroes/<?= str_replace(' ', '_', str_replace('’', '', $heroes[$worstVS2]["name"]))?>_icon.png'); background-position: <?= $heroes[$worstVS2]["bg-pos"] ?>%;">
								<span><?= $heroes[$worstVS2]["name"] ?></span>
							</div>
						</a>
						
						<a href="?id=<?= $worstVS3 ?>">
							<div style="background-image:url('/assets/img/heroes/<?= str_replace(' ', '_', str_replace('’', '', $heroes[$worstVS3]["name"]))?>_icon.png'); background-position: <?= $heroes[$worstVS3]["bg-pos"] ?>%;">
								<span><?= $heroes[$worstVS3]["name"] ?></span>
							</div>
						</a>
						
						<a href="?id=<?= $worstVS4 ?>">
							<div style="background-image:url('/assets/img/heroes/<?= str_replace(' ', '_', str_replace('’', '', $heroes[$worstVS4]["name"]))?>_icon.png'); background-position: <?= $heroes[$worstVS4]["bg-pos"] ?>%;">
								<span><?= $heroes[$worstVS4]["name"] ?></span>
							</div>
						</a>
						
						<a href="?id=<?= $worstVS5 ?>">
							<div style="background-image:url('/assets/img/heroes/<?= str_replace(' ', '_', str_replace('’', '', $heroes[$worstVS5]["name"]))?>_icon.png'); background-position: <?= $heroes[$worstVS5]["bg-pos"] ?>%;">
								<span><?= $heroes[$worstVS5]["name"] ?></span>
							</div>
						</a>
						
					</div>
					
				</div>
				
			</div>
				<div style="display: block; margin: auto; border-top: 1px solid white; margin-top: 35px; padding: 15px; padding-bottom: 0px; width:auto;">
					All Counters: 
					<a href='https://dotabuff.com/heroes/<?= $id ?>/counters' <? if($newTabs == 1) {echo("target='_blank'");} ?>><img src='/assets/img/logo-dotabuff.png' class='button' ondragstart='return false' align='center'></a>
					<a href='https://dota2.gamepedia.com/<?= str_replace(' ', '_', str_replace('’', '%27', $heroes[$id]['name']))?>/Counters' <? if($newTabs == 1) {echo("target='_blank'");} ?>><img src='/assets/img/logo-dota2wiki.png' class='button' ondragstart='return false' align='center'></a>
				</div>
			
		</div>
		
	</div>
	
	<div class='profile-button-frame'>
	
		<a href='https://www.dotabuff.com/heroes/<?= $id ?>' <? if($newTabs == 1) {echo("target='_blank'");} ?> class='profile-button dotabuff'>
			<div><img src='/assets/img/logo-dotabuff.png' ondragstart='return false' align='center'> DOTABUFF</div>
		</a>
		
		<a href='https://www.opendota.com/heroes/<?= $heroes[$id]['hero-id'] ?>' <? if($newTabs == 1) {echo("target='_blank'");} ?> class='profile-button opendota'>
			<div><img src='/assets/img/logo-opendota.png' ondragstart='return false' align='center'> OPENDOTA</div>
		</a>
		
		<a href='https://stratz.com/en-us/heroes/<?= $heroes[$id]['hero-id'] ?>' <? if($newTabs == 1) {echo("target='_blank'");} ?> class='profile-button stratz'>
			<div><img src='/assets/img/logo-stratz.png' ondragstart='return false' align='center'> STRATZ</div>
		</a>
		
	</div>
	
	<div class='profile-button-frame'>
		
		<a href='https://liquipedia.net/dota2/<?= str_replace(' ', '_', str_replace('’', '%27', $heroes[$id]['name'])) ?>' class='profile-button liquipedia' <? if($newTabs == 1) {echo("target='_blank'");} ?>>
			<div><img src='/assets/img/logo-liquipedia.png' ondragstart='return false' align='center'> LIQUIPEDIA</div>
		</a>
		
		<a href='https://dota2.gamepedia.com/<?= str_replace(' ', '_', str_replace('’', '%27', $heroes[$id]['name']))?>' class='profile-button dota2wiki' <? if($newTabs == 1) {echo("target='_blank'");} ?>>
			<div><img src='/assets/img/logo-dota2wiki.png' ondragstart='return false' align='center'> DOTA 2 WIKI</div>
		</a>
		
	</div>
	
	<div class='subcat-button-frame'>
		
		<div class='subcat-button'>
			<div>
				<div class='sub-cat-button-icon'><img src='/assets/img/icon-patch-notes.svg' style='height:75px; margin:10px' ondragstart='return false'></div>
				<div class='subcat-button-label'>PATCH NOTES</div>
				<div>
					<a href='https://liquipedia.net/dota2/<?= str_replace(' ', '_', str_replace('’', '%27', $heroes[$id]['name']))?>#Version_History' <? if($newTabs == 1) {echo("target='_blank'");} ?>><img src='/assets/img/logo-liquipedia.png' class='button' ondragstart='return false' align='center'></a>
					
					<a href='https://dota2.gamepedia.com/<?= str_replace(' ', '_', str_replace('’', '%27', $heroes[$id]['name']))?>/Changelogs#Version_history' <? if($newTabs == 1) {echo("target='_blank'");} ?>><img src='/assets/img/logo-dota2wiki.png' class='button' ondragstart='return false' align='center'></a>
				</div>
			</div>
		</div>
		
		<a href='https://dotabuff.com/heroes/<?= $id ?>/guides' <? if($newTabs == 1) {echo("target='_blank'");} ?> style="align-self: stretch;">
		<div class='subcat-button hoverclick' style="height: 215px;">
			<div style="margin-top: 40px;">
				<div class='sub-cat-button-icon'><img src='/assets/img/icon-guides.svg' style='height:75px; margin:10px' ondragstart='return false'></div>
				<div class='subcat-button-label'>GUIDES</div>
			</div>
		</div>
		</a>
	
	</div>
	
	<div class='profile-button-frame'>
		
		<a href='http://www.dota2protracker.com/hero/<?= str_replace(' ', '%20', str_replace('’', '%27', $heroes[$id]['name']))?>' class='profile-button dota2protracker' <? if($newTabs == 1) {echo("target='_blank'");} ?>>
			<div><img src='/assets/img/logo-dota2protracker.png' ondragstart='return false' align='center'> PRO PUBS</div>
		</a>
		
		<a href='https://www.youtube.com/user/Dota2ProChannels/search?query=<?= str_replace(' ', '+', str_replace('’', '%27', $heroes[$id]['name']))?>' class='profile-button dota2pro' <? if($newTabs == 1) {echo("target='_blank'");} ?>>
			<div><img src='/assets/img/logo-dota2pro.png' style='border: 2px solid #F00' ondragstart='return false' align='center'> PRO VODs</div>
		</a>
		
		<a href='https://howdoiplay.com/?<?= str_replace(' ', '+', str_replace('’', '%27', $heroes[$id]['name']))?>' class='profile-button howdoiplay' style='flex-grow:0' <? if($newTabs == 1) {echo("target='_blank'");} ?>>
			<div><img src='/assets/img/logo-howdoiplay.png' ondragstart='return false' align='center'> TIPS & TRICKS</div>
		</a>
		
	</div>
		
<? else:?>

			<div style="text-align: center; padding-top: 20px;">
				<input type="text" id="search-headers" name="search-headers" placeholder="Search Heroes..." class="text-input input-small" data-list=".button-collection"  onClick='this.select();' autocomplete="off" autofocus />
			</div>
			<script type='text/javascript'>
				var input = document.getElementById('search-headers');
				input.focus();
				input.select();
			</script>
		
		<div class='button-collection button-shape-rrect label-left'><span class='origin'>STRENGTH</span>
		
		<?
		foreach ($heroes as $key => $value) {
			if ($heroes[$key]["primaryAttribute"] == "STRENGTH") {
				echo("
					<a href=\"?id=".$key."\">
						<div style=\"background-image:url('/assets/img/heroes/".str_replace(' ', '_', str_replace('’', '', $heroes[$key]["name"]))."_icon.png'); background-position: ".$heroes[$key]["bg-pos"]."%;\">
							<span>".$heroes[$key]["name"]."</span>
							<span style='display:none;'>".$heroes[$key]["alt-names"].", ".$heroes[$key]["primaryAttribute"]."</span>
						</div>
					</a>
				");
			}
		}
		
		?>
			
		</div>
		
		<div class='button-collection button-shape-rrect label-left'><span class='origin'>AGILITY</span>
		
		<?
		foreach ($heroes as $key => $value) {
			if ($heroes[$key]["primaryAttribute"] == "AGILITY") {
				echo("
					<a href=\"?id=".$key."\">
						<div style=\"background-image:url('/assets/img/heroes/".str_replace(' ', '_', str_replace('’', '', $heroes[$key]["name"]))."_icon.png'); background-position: ".$heroes[$key]["bg-pos"]."%;\">
							<span>".$heroes[$key]["name"]."</span>
							<span style='display:none;'>".$heroes[$key]["alt-names"].", ".$heroes[$key]["primaryAttribute"]."</span>
						</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection button-shape-rrect label-left'><span class='origin'>INTELLIGENCE</span>
			
		<?
		
		foreach ($heroes as $key => $value) {
			if ($heroes[$key]["primaryAttribute"] == "INTELLIGENCE") {
				echo("
					<a href=\"?id=".$key."\">
						<div style=\"background-image:url('/assets/img/heroes/".str_replace(' ', '_', str_replace('’', '', $heroes[$key]["name"]))."_icon.png'); background-position: ".$heroes[$key]["bg-pos"]."%;\">
							<span>".$heroes[$key]["name"]."</span>
							<span style='display:none;'>".$heroes[$key]["alt-names"].", ".$heroes[$key]["primaryAttribute"]."</span>
						</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
<? endif; ?>

<?
	
	include $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/footer.php';
	
?>