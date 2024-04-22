<?
	$currentPage = "items";
	
	include $_SERVER['DOCUMENT_ROOT'] . '/items/array.php';
	
	$id = $_GET["id"];
	
	if (isset($id)) {$title = $items[$id]['name']." - Items - ";}
	else {$title = "Items - ";}
	
	setcookie("page", $currentPage, time() + (10 * 365 * 24 * 60 * 60), "/");
	
	include $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/header.php';
	
?>

<? if (isset($id)): ?>

	<?
		if ($id == "boots-of-travel-1") {$dotabuffid = "boots-of-travel";} else {$dotabuffid = $id;}
		
			$idwonumbers = str_replace(" 1" , "", $items[$id]['name']);
			$idwonumbers = str_replace(" 2" , "", $idwonumbers);
			$idwonumbers = str_replace(" 3" , "", $idwonumbers);
			$idwonumbers = str_replace(" 4" , "", $idwonumbers);
			$idwonumbers = str_replace(" 5" , "", $idwonumbers);
	?>
	
	<div style='padding-top:22px; padding-bottom:20px; display:flex; flex-flow:row wrap; justify-content:center; align-items:center;'>
	
		<div style="background-image:url('/assets/img/items/<?= str_replace(' ', '_', str_replace('’', '', $items[$id]["name"]))?>_icon.png'); background-position: <?=$items[$id]["bg-pos"]?>%; width: 120px; height: 120px; border: 2px solid #1476A5; background-size: cover; margin-right: 20px; border-radius:100%">
		</div>
	
		<div>
			<div class='id-name-tile'><?= $items[$id]['name'] ?></div>
		
			<div class='id-block-links' style='margin-top:0px; margin-left:2px;'>
				<div><a href='/items'><div class='rotate' style='position:relative; top:1px;'><img src='/assets/img/icon-back.svg'></div> DIFFERENT ITEM</a></div>
			</div>
		</div>
	</div>
			
	<div class='profile-button-frame'>
		
		<a href='https://liquipedia.net/dota2/<?= str_replace(' ', '_', str_replace('’', '%27', $idwonumbers))?>' class='profile-button liquipedia' <? if($newTabs == 1) {echo("target='_blank'");} ?>>
			<div><img src='/assets/img/logo-liquipedia.png' ondragstart='return false' align='center'> LIQUIPEDIA</div>
		</a>
		
		<a href='https://dota2.gamepedia.com/<?= str_replace(' ', '_', str_replace('’', '%27', $items[$id]['name']))?>' class='profile-button dota2wiki' <? if($newTabs == 1) {echo("target='_blank'");} ?>>
			<div><img src='/assets/img/logo-dota2wiki.png' ondragstart='return false' align='center'> DOTA 2 WIKI</div>
		</a>
		
	</div>
	
	<div class='subcat-button-frame'>
	
		<div class='subcat-button'>
			<div>
				<div class='sub-cat-button-icon'><img src='/assets/img/icon-patch-notes.svg' style='height:75px; margin:10px' ondragstart='return false'></div>
				<div class='subcat-button-label'>VERSION HISTORY</div>
				<div>
					<a href='https://liquipedia.net/dota2/<?= str_replace(' ', '_', str_replace('’', '%27', $idwonumbers))?>#Version_History' <? if($newTabs == 1) {echo("target='_blank'");} ?>><img src='/assets/img/logo-liquipedia.png' class='button' ondragstart='return false' align='center'></a>
					
					<a href='https://dota2.gamepedia.com/<?= str_replace(' ', '_', str_replace('’', '%27', $idwonumbers))?>/Changelogs' <? if($newTabs == 1) {echo("target='_blank'");} ?>><img src='/assets/img/logo-dota2wiki.png' class='button' ondragstart='return false' align='center'></a>
				</div>
			</div>
		</div>
	</div>
			
	<div class='profile-button-frame'>
	
		<a href='https://www.dotabuff.com/items/<?= $dotabuffid ?>' class='profile-button dotabuff' <? if($newTabs == 1) {echo("target='_blank'");} ?>>
			<div><img src='/assets/img/logo-dotabuff.png' ondragstart='return false' align='center'> DOTABUFF</div>
		</a>
		
	</div>

<? else: ?>

	<div style="text-align: center; padding-top: 20px;">
		<input type="text" id="search-headers" name="search-headers" placeholder="Search Items..." class="text-input input-small" data-list=".button-collection"  onClick='this.select();' autocomplete="off" autofocus />
	</div>
		
	<div class='button-collection button-shape-circle label-left'><span class='origin'>CONSUMABLES</span>
		
		<?
			
		foreach ($items as $key => $value) {
			if ($items[$key]["category"] == "CONSUMABLES") {
				echo("
					<a href=\"?id=".$key."\">
						<div style=\"background-image:url('/assets/img/items/".str_replace(' ', '_', str_replace('’', '', $items[$key]["name"]))."_icon.png'); background-position: ".$items[$key]["bg-pos"]."%;\">
							<span>".$items[$key]["name"]."</span>
							<span style='display:none;'>".$items[$key]["alt-names"].", ".$items[$key]["category"]."</span>
						</div>
					</a>
				");
			}
		}
		
		?>
			
	</div>
		
	<div class='button-collection button-shape-circle label-left'><span class='origin'>ATTRIBUTES</span>
		
		<?
		
		foreach ($items as $key => $value) {
			if ($items[$key]["category"] == "ATTRIBUTES") {
				echo("
					<a href=\"?id=".$key."\">
						<div style=\"background-image:url('/assets/img/items/".str_replace(' ', '_', str_replace('’', '', $items[$key]["name"]))."_icon.png'); background-position: ".$items[$key]["bg-pos"]."%;\">
							<span>".$items[$key]["name"]."</span>
							<span style='display:none;'>".$items[$key]["alt-names"].", ".$items[$key]["category"]."</span>
						</div>
					</a>
				");
			}
		}
		
		?>
		
	</div>
		
	<div class='button-collection button-shape-circle label-left'><span class='origin'>ARMAMENTS</span>
		
		<?
		
		foreach ($items as $key => $value) {
			if ($items[$key]["category"] == "ARMAMENTS") {
				echo("
					<a href=\"?id=".$key."\">
						<div style=\"background-image:url('/assets/img/items/".str_replace(' ', '_', str_replace('’', '', $items[$key]["name"]))."_icon.png'); background-position: ".$items[$key]["bg-pos"]."%;\">
							<span>".$items[$key]["name"]."</span>
							<span style='display:none;'>".$items[$key]["alt-names"].", ".$items[$key]["category"]."</span>
						</div>
					</a>
				");
			}
		}
		
		?>
		
	</div>
		
	<div class='button-collection button-shape-circle label-left'><span class='origin'>ARCANE</span>
		
		<?
		
		foreach ($items as $key => $value) {
			if ($items[$key]["category"] == "ARCANE") {
				echo("
					<a href=\"?id=".$key."\">
						<div style=\"background-image:url('/assets/img/items/".str_replace(' ', '_', str_replace('’', '', $items[$key]["name"]))."_icon.png'); background-position: ".$items[$key]["bg-pos"]."%;\">
							<span>".$items[$key]["name"]."</span>
							<span style='display:none;'>".$items[$key]["alt-names"].", ".$items[$key]["category"]."</span>
						</div>
					</a>
				");
			}
		}
		
		?>
		
	</div>
		
	<div class='button-collection button-shape-circle label-left'><span class='origin'>SECRET</span>
		
		<?
		
		foreach ($items as $key => $value) {
			if ($items[$key]["category"] == "SECRET") {
				echo("
					<a href=\"?id=".$key."\">
						<div style=\"background-image:url('/assets/img/items/".str_replace(' ', '_', str_replace('’', '', $items[$key]["name"]))."_icon.png'); background-position: ".$items[$key]["bg-pos"]."%;\">
							<span>".$items[$key]["name"]."</span>
							<span style='display:none;'>".$items[$key]["alt-names"].", ".$items[$key]["category"]."</span>
						</div>
					</a>
				");
			}
		}
		
		?>
		
	</div>
		
	<div class='button-collection button-shape-circle label-left'><span class='origin'>COMMON</span>
		
		<?
		
		foreach ($items as $key => $value) {
			if ($items[$key]["category"] == "COMMON") {
				echo("
					<a href=\"?id=".$key."\">
						<div style=\"background-image:url('/assets/img/items/".str_replace(' ', '_', str_replace('’', '', $items[$key]["name"]))."_icon.png'); background-position: ".$items[$key]["bg-pos"]."%;\">
							<span>".$items[$key]["name"]."</span>
							<span style='display:none;'>".$items[$key]["alt-names"].", ".$items[$key]["category"]."</span>
						</div>
					</a>
				");
			}
		}
		
		?>
		
	</div>
		
	<div class='button-collection button-shape-circle label-left'><span class='origin'>SUPPORT</span>
		
		<?
		
		foreach ($items as $key => $value) {
			if ($items[$key]["category"] == "SUPPORT") {
				echo("
					<a href=\"?id=".$key."\">
						<div style=\"background-image:url('/assets/img/items/".str_replace(' ', '_', str_replace('’', '', $items[$key]["name"]))."_icon.png'); background-position: ".$items[$key]["bg-pos"]."%;\">
							<span>".$items[$key]["name"]."</span>
							<span style='display:none;'>".$items[$key]["alt-names"].", ".$items[$key]["category"]."</span>
						</div>
					</a>
				");
			}
		}
		
		?>
		
	</div>
		
	<div class='button-collection button-shape-circle label-left'><span class='origin'>CASTER</span>
		
		<?
		
		foreach ($items as $key => $value) {
			if ($items[$key]["category"] == "CASTER") {
				echo("
					<a href=\"?id=".$key."\">
						<div style=\"background-image:url('/assets/img/items/".str_replace(' ', '_', str_replace('’', '', $items[$key]["name"]))."_icon.png'); background-position: ".$items[$key]["bg-pos"]."%;\">
							<span>".$items[$key]["name"]."</span>
							<span style='display:none;'>".$items[$key]["alt-names"].", ".$items[$key]["category"]."</span>
						</div>
					</a>
				");
			}
		}
		
		?>
		
	</div>
		
	<div class='button-collection button-shape-circle label-left'><span class='origin'>ARMOR</span>
		
		<?
		
		foreach ($items as $key => $value) {
			if ($items[$key]["category"] == "ARMOR") {
				echo("
					<a href=\"?id=".$key."\">
						<div style=\"background-image:url('/assets/img/items/".str_replace(' ', '_', str_replace('’', '', $items[$key]["name"]))."_icon.png'); background-position: ".$items[$key]["bg-pos"]."%;\">
							<span>".$items[$key]["name"]."</span>
							<span style='display:none;'>".$items[$key]["alt-names"].", ".$items[$key]["category"]."</span>
						</div>
					</a>
				");
			}
		}
		
		?>
		
	</div>
		
	<div class='button-collection button-shape-circle label-left'><span class='origin'>WEAPONS</span>
		
		<?
		
		foreach ($items as $key => $value) {
			if ($items[$key]["category"] == "WEAPONS") {
				echo("
					<a href=\"?id=".$key."\">
						<div style=\"background-image:url('/assets/img/items/".str_replace(' ', '_', str_replace('’', '', $items[$key]["name"]))."_icon.png'); background-position: ".$items[$key]["bg-pos"]."%;\">
							<span>".$items[$key]["name"]."</span>
							<span style='display:none;'>".$items[$key]["alt-names"].", ".$items[$key]["category"]."</span>
						</div>
					</a>
				");
			}
		}
		
		?>
		
	</div>
		
	<div class='button-collection button-shape-circle label-left'><span class='origin'>ARTIFACTS</span>
		
		<?
		
		foreach ($items as $key => $value) {
			if ($items[$key]["category"] == "ARTIFACTS") {
				echo("
					<a href=\"?id=".$key."\">
						<div style=\"background-image:url('/assets/img/items/".str_replace(' ', '_', str_replace('’', '', $items[$key]["name"]))."_icon.png'); background-position: ".$items[$key]["bg-pos"]."%;\">
							<span>".$items[$key]["name"]."</span>
							<span style='display:none;'>".$items[$key]["alt-names"].", ".$items[$key]["category"]."</span>
						</div>
					</a>
				");
			}
		}
		
		?>
		
	</div>
		
	<div class='button-collection button-shape-circle label-left'><span class='origin'>DROPPED</span>
		
		<?
		
		foreach ($items as $key => $value) {
			if ($items[$key]["category"] == "DROPPED") {
				echo("
					<a href=\"?id=".$key."\">
						<div style=\"background-image:url('/assets/img/items/".str_replace(' ', '_', str_replace('’', '', $items[$key]["name"]))."_icon.png'); background-position: ".$items[$key]["bg-pos"]."%;\">
							<span>".$items[$key]["name"]."</span>
							<span style='display:none;'>".$items[$key]["alt-names"].", ".$items[$key]["category"]."</span>
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