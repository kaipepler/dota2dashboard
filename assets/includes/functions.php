<?
	function brokenWidget($anchor) {
		echo "
	<div style='background: #1476A5; border:2px solid white; padding:40px 20px; margin:20px; border-radius:10px; flex-grow:1;'>
		<div style='min-width:200px;'>
			Broken Component <br>( <a class='link' href='/home/customize/?".$anchor."=clear'>Remove</a> )
		</div>
	</div>
		";
	}
	
	function profileChangeWidget($anchor, $current) {
	$fx = $_GET["fx"];
	
		echo "
	<select onChange='window.document.location.href=this.options[this.selectedIndex].value;' style='".($fx == "0" ? "" : "animation: fadeIn .3s linear 1 forwards")."'>
			<option value='?".$anchor."=clear' ".($current == "none" ? "selected" : "").">".($current == "none" ? "Add New Component&hellip;" : "Remove Component")."</option>
		<optgroup label='Profiles'>
			<option value='?".$anchor."=profileDotabuff' ".($current == "profileDotabuff" ? "selected" : "").">My Profile — Dotabuff</option>
			<option value='?".$anchor."=profileOpenDota' ".($current == "profileOpenDota" ? "selected" : "").">My Profile — OpenDota</option>
			<option value='?".$anchor."=profileStratz' ".($current == "profileStratz" ? "selected" : "").">My Profile — Stratz</option>
			<option value='?".$anchor."=matchesDotabuff' ".($current == "matchesDotabuff" ? "selected" : "").">My Matches — Dotabuff</option>
			<option value='?".$anchor."=matchesOpenDota' ".($current == "matchesOpenDota" ? "selected" : "").">My Matches — OpenDota</option>
			<option value='?".$anchor."=heroesDotabuff' ".($current == "heroesDotabuff" ? "selected" : "").">My Heroes — Dotabuff</option>
			<option value='?".$anchor."=heroesOpenDota' ".($current == "heroesOpenDota" ? "selected" : "").">My Heroes — OpenDota</option>
			<option value='?".$anchor."=heroesStratz' ".($current == "heroesStratz" ? "selected" : "").">My Heroes — Stratz</option>
		</optgroup>
		<optgroup label='Links'>
			<option value='?".$anchor."=linkDotabuff' ".($current == "linkDotabuff" ? "selected" : "").">Dotabuff</option>
			<option value='?".$anchor."=linkOpenDota' ".($current == "linkOpenDota" ? "selected" : "").">OpenDota</option>
			<option value='?".$anchor."=linkStratz' ".($current == "linkStratz" ? "selected" : "").">Stratz</option>
			<option value='?".$anchor."=linkDota2Wiki' ".($current == "linkDota2Wiki" ? "selected" : "").">Dota 2 Wiki</option>
			<option value='?".$anchor."=linkLiquipedia' ".($current == "linkLiquipedia" ? "selected" : "").">Liquipedia</option>
			<option value='?".$anchor."=linkUpcomingMatches' ".($current == "linkUpcomingMatches" ? "selected" : "").">Pro Matches — Liquipedia</option>
			<option value='?".$anchor."=linkTournaments' ".($current == "linkTournaments" ? "selected" : "").">Tournaments — Liquipedia</option>
			<option value='?".$anchor."=linkDota2Pro' ".($current == "linkDota2Pro" ? "selected" : "").">Dota 2 Pro</option>
			<option value='?".$anchor."=linkDota2Blog' ".($current == "linkDota2Blog" ? "selected" : "").">Dota 2 Blog</option>
			<option value='?".$anchor."=linkDota2Updates' ".($current == "linkDota2Updates" ? "selected" : "").">Dota 2 Updates</option>
			<option value='?".$anchor."=linkDota2Leaderboards' ".($current == "linkDota2Leaderboards" ? "selected" : "").">Dota 2 Leaderboards</option>
			<option value='?".$anchor."=linkDota2ProTracker' ".($current == "linkDota2ProTracker" ? "selected" : "").">Dota 2 Pro Tracker</option>
			<option value='?".$anchor."=linkRDota2' ".($current == "linkRDota2" ? "selected" : "").">r/DotA2</option>
			<option value='?".$anchor."=linkRTrueDota2' ".($current == "linkRTrueDota2" ? "selected" : "").">r/TrueDotA2</option>
			<option value='?".$anchor."=linkRLearnDota2' ".($current == "linkRLearnDota2" ? "selected" : "").">r/LearnDotA2</option>
			
			<option value='?".$anchor."=linkDotabuffDPC' ".($current == "linkDotabuffDPC" ? "selected" : "").">DPC</option>
			<option value='?".$anchor."=linkDotabuffEsports' ".($current == "linkDotabuffEsports" ? "selected" : "").">Esports</option>
			<option value='?".$anchor."=linkTwitch' ".($current == "linkTwitch" ? "selected" : "").">Live Streams</option>
			<option value='?".$anchor."=linkOpenDotaTeams' ".($current == "linkOpenDotaTeams" ? "selected" : "").">Teams</option>
			<option value='?".$anchor."=linkStratzLeagues' ".($current == "linkStratzLeagues" ? "selected" : "").">Leagues</option>
			<option value='?".$anchor."=linkHowDoIPlay' ".($current == "linkHowDoIPlay" ? "selected" : "").">How Do I Play?</option>
			<option value='?".$anchor."=linkSteamCommunityMarket' ".($current == "linkSteamCommunityMarket" ? "selected" : "").">Steam Community Market</option>
			<option value='?".$anchor."=linkTrackDota' ".($current == "linkTrackDota" ? "selected" : "").">TrackDota</option>
		</optgroup>
		<optgroup label='Widgets'>
			<option value='?".$anchor."=widgetMatchIDD2D' ".($current == "widgetMatchIDD2D" ? "selected" : "").">Match ID — Dota 2 Dashboard</option>
			<option value='?".$anchor."=widgetMatchIDDotabuff' ".($current == "widgetMatchIDDotabuff" ? "selected" : "").">Match ID — Dotabuff</option>
			<option value='?".$anchor."=widgetMatchIDOpenDota' ".($current == "widgetMatchIDOpenDota" ? "selected" : "").">Match ID — OpenDota</option>
			<option value='?".$anchor."=widgetMatchIDStratz' ".($current == "widgetMatchIDStratz" ? "selected" : "").">Match ID — Stratz</option>
			<option value='?".$anchor."=widgetPlayerIDD2D' ".($current == "widgetPlayerIDD2D" ? "selected" : "").">Player ID — Dota 2 Dashboard</option>
			<option value='?".$anchor."=widgetPlayerIDDotabuff' ".($current == "widgetPlayerIDDotabuff" ? "selected" : "").">Player ID — Dotabuff</option>
			<option value='?".$anchor."=widgetPlayerIDOpenDota' ".($current == "widgetPlayerIDOpenDota" ? "selected" : "").">Player ID — OpenDota</option>
			<option value='?".$anchor."=widgetPlayerIDStratz' ".($current == "widgetPlayerIDStratz" ? "selected" : "").">Player ID — Stratz</option>
			<option value='?".$anchor."=widgetHeroesProfileD2D' ".($current == "widgetHeroesProfileD2D" ? "selected" : "").">Heroes — Dota 2 Dashboard</option>
			<option value='?".$anchor."=widgetHeroesProfileDotabuff' ".($current == "widgetHeroesProfileDotabuff" ? "selected" : "").">Heroes — Dotabuff</option>
			<option value='?".$anchor."=widgetHeroesProfileOpenDota' ".($current == "widgetHeroesProfileOpenDota" ? "selected" : "").">Heroes — OpenDota</option>
			<option value='?".$anchor."=widgetHeroesProfileStratz' ".($current == "widgetHeroesProfileStratz" ? "selected" : "").">Heroes — Stratz</option>
			<option value='?".$anchor."=widgetHeroesProfileLiquipedia' ".($current == "widgetHeroesProfileLiquipedia" ? "selected" : "").">Heroes — Liquipedia</option>
			<option value='?".$anchor."=widgetHeroesProfileDota2Wiki' ".($current == "widgetHeroesProfileDota2Wiki" ? "selected" : "").">Heroes — Dota 2 Wiki</option>
			<option value='?".$anchor."=widgetHeroesAbilityBuilds' ".($current == "widgetHeroesAbilityBuilds" ? "selected" : "").">Heroes — Ability Builds</option>
			<option value='?".$anchor."=widgetHeroesCounters' ".($current == "widgetHeroesCounters" ? "selected" : "").">Heroes — Counters</option>
			<option value='?".$anchor."=widgetHeroesGuides' ".($current == "widgetHeroesGuides" ? "selected" : "").">Heroes — Guides</option>
			<option value='?".$anchor."=widgetHeroesProPubs' ".($current == "widgetHeroesProPubs" ? "selected" : "").">Heroes — Pro Pubs</option>
			<option value='?".$anchor."=widgetHeroesProVODs' ".($current == "widgetHeroesProVODs" ? "selected" : "").">Heroes — Pro VODs</option>
			<option value='?".$anchor."=widgetHeroesTipsAndTricks' ".($current == "widgetHeroesTipsAndTricks" ? "selected" : "").">Heroes — Tips & Tricks</option>
			<option value='?".$anchor."=widgetAbilitiesD2D' ".($current == "widgetAbilitiesD2D" ? "selected" : "").">Abilities — Dota 2 Dashboard</option>
			<option value='?".$anchor."=widgetAbilitiesLiquipedia' ".($current == "widgetAbilitiesLiquipedia" ? "selected" : "").">Abilities — Liquipedia</option>
			<option value='?".$anchor."=widgetAbilitiesDota2Wiki' ".($current == "widgetAbilitiesDota2Wiki" ? "selected" : "").">Abilities — Dota 2 Wiki</option>
			<option value='?".$anchor."=widgetItemsD2D' ".($current == "widgetItemsD2D" ? "selected" : "").">Items — Dota 2 Dashboard</option>
			<option value='?".$anchor."=widgetItemsLiquipedia' ".($current == "widgetItemsLiquipedia" ? "selected" : "").">Items — Liquipedia</option>
			<option value='?".$anchor."=widgetItemsDota2Wiki' ".($current == "widgetItemsDota2Wiki" ? "selected" : "").">Items — Dota 2 Wiki</option>
			<option value='?".$anchor."=widgetItemsDotabuff' ".($current == "widgetItemsDotabuff" ? "selected" : "").">Items — Dotabuff</option>
			<option value='?".$anchor."=widgetCosmeticsSCM' ".($current == "widgetCosmeticsSCM" ? "selected" : "").">Cosmetics — Community Market</option>
			<option value='?".$anchor."=widgetCosmeticsDotabuff' ".($current == "widgetCosmeticsDotabuff" ? "selected" : "").">Cosmetics — Dotabuff</option>
		</optgroup>
	</select>
		";
	}
	
	function profileSetWidget($anchor, $current) {
	$fx = $_GET["fx"];
		echo "
	<div style='background: #1476A5; border:2px solid white; padding:40px 20px; margin:20px; border-radius:10px; flex-grow:1; ".($fx == "0" ? "" : "animation: fadeIn .3s linear 1 forwards")."'>
		<div style='min-width:200px;'>";
		
		profileChangeWidget($anchor, $current);
		
		echo "
		</div>
	</div>
		";
	}
	
	function profileDotabuff($config, $anchor, $current) {
	$fx = $_GET["fx"];
		echo "
			<a href='".($config == "config" ? "#" : "https://www.dotabuff.com/players/".$_COOKIE["playerID"]."")."' class='profile-button dotabuff ".($config == "config" ? "profile-button-disabled" : "")."' ".($config == "config" ? "onclick='return false'" : "")." ".($_COOKIE['newTabs'] == 1 ? "target='_blank'" : "").">
				<div style='max-width:400px;'><img src='/assets/img/logo-dotabuff.png' ondragstart='return false' align='center'> MY DOTABUFF</div>
				<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
			";
		if ($config == "config") {profileChangeWidget($anchor, $current);}
		echo "
				</div>
			</a>
		";
	}
	
	function profileOpenDota($config, $anchor, $current) {
	$fx = $_GET["fx"];
		echo "
			<a href='".($config == "config" ? "#" : "https://www.opendota.com/players/".$_COOKIE["playerID"]."")."' class='profile-button opendota ".($config == "config" ? "profile-button-disabled" : "")."' ".($config == "config" ? "onclick='return false'" : "")." ".($_COOKIE['newTabs'] == 1 ? "target='_blank'" : "").">
				<div style='max-width:400px;'><img src='/assets/img/logo-opendota.png' ondragstart='return false' align='center'> MY OPENDOTA</div>
				<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
			";
		if ($config == "config") {profileChangeWidget($anchor, $current);}
		echo "
				</div>
			</a>
		";
	}
	
	function profileStratz($config, $anchor, $current) {
	$fx = $_GET["fx"];
		echo "
			<a href='".($config == "config" ? "#" : "https://stratz.com/en-us/player/".$_COOKIE["playerID"]."")."' class='profile-button stratz ".($config == "config" ? "profile-button-disabled" : "")."' ".($config == "config" ? "onclick='return false'" : "")." ".($_COOKIE['newTabs'] == 1 ? "target='_blank'" : "").">
				<div style='max-width:400px;'><img src='/assets/img/logo-stratz.png' ondragstart='return false' align='center'> MY STRATZ</div>
				<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
			";
		if ($config == "config") {profileChangeWidget($anchor, $current);}
		echo "
				</div>
			</a>
		";
	}
	
	function matchesDotabuff($config, $anchor, $current) {
	$fx = $_GET["fx"];
		echo "
			<a href='".($config == "config" ? "#" : "https://www.dotabuff.com/players/".$_COOKIE["playerID"]."")."/matches' class='profile-button dotabuff ".($config == "config" ? "profile-button-disabled" : "")."' ".($config == "config" ? "onclick='return false'" : "")." ".($_COOKIE['newTabs'] == 1 ? "target='_blank'" : "").">
				<div style='max-width:400px;'><img src='/assets/img/logo-dotabuff.png' ondragstart='return false' align='center'> MY MATCHES</div>
				<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
			";
		if ($config == "config") {profileChangeWidget($anchor, $current);}
		echo "
				</div>
			</a>
		";
	}
	
	function matchesOpenDota($config, $anchor, $current) {
	$fx = $_GET["fx"];
		echo "
			<a href='".($config == "config" ? "#" : "https://www.opendota.com/players/".$_COOKIE["playerID"]."")."/matches' class='profile-button opendota ".($config == "config" ? "profile-button-disabled" : "")."' ".($config == "config" ? "onclick='return false'" : "")." ".($_COOKIE['newTabs'] == 1 ? "target='_blank'" : "").">
				<div style='max-width:400px;'><img src='/assets/img/logo-opendota.png' ondragstart='return false' align='center'> MY MATCHES</div>
				<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
			";
		if ($config == "config") {profileChangeWidget($anchor, $current);}
		echo "
				</div>
			</a>
		";
	}
	
	function heroesDotabuff($config, $anchor, $current) {
	$fx = $_GET["fx"];
		echo "
			<a href='".($config == "config" ? "#" : "https://www.dotabuff.com/players/".$_COOKIE["playerID"]."")."/heroes' class='profile-button dotabuff ".($config == "config" ? "profile-button-disabled" : "")."' ".($config == "config" ? "onclick='return false'" : "")." ".($_COOKIE['newTabs'] == 1 ? "target='_blank'" : "").">
				<div style='max-width:400px;'><img src='/assets/img/logo-dotabuff.png' ondragstart='return false' align='center'> MY HEROES</div>
				<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
			";
		if ($config == "config") {profileChangeWidget($anchor, $current);}
		echo "
				</div>
			</a>
		";
	}
	
	function heroesOpenDota($config, $anchor, $current) {
	$fx = $_GET["fx"];
		echo "
			<a href='".($config == "config" ? "#" : "https://www.opendota.com/players/".$_COOKIE["playerID"]."")."/heroes' class='profile-button opendota ".($config == "config" ? "profile-button-disabled" : "")."' ".($config == "config" ? "onclick='return false'" : "")." ".($_COOKIE['newTabs'] == 1 ? "target='_blank'" : "").">
				<div style='max-width:400px;'><img src='/assets/img/logo-opendota.png' ondragstart='return false' align='center'> MY HEROES</div>
				<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
			";
		if ($config == "config") {profileChangeWidget($anchor, $current);}
		echo "
				</div>
			</a>
		";
	}
	
	function heroesStratz($config, $anchor, $current) {
	$fx = $_GET["fx"];
		echo "
			<a href='".($config == "config" ? "#" : "https://stratz.com/en-us/player/".$_COOKIE["playerID"]."")."/heroes' class='profile-button stratz ".($config == "config" ? "profile-button-disabled" : "")."' ".($config == "config" ? "onclick='return false'" : "")." ".($_COOKIE['newTabs'] == 1 ? "target='_blank'" : "").">
				<div style='max-width:400px;'><img src='/assets/img/logo-stratz.png' ondragstart='return false' align='center'> MY HEROES</div>
				<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
			";
		if ($config == "config") {profileChangeWidget($anchor, $current);}
		echo "
				</div>
			</a>
		";
	}
	
	function linkRDota2($config, $anchor, $current) {
	$fx = $_GET["fx"];
		echo "
			<a href='".($config == "config" ? "#" : "https://www.reddit.com/r/DotA2/")."' class='profile-button btn-link ".($config == "config" ? "profile-button-disabled" : "")."' ".($config == "config" ? "onclick='return false'" : "")." ".($_COOKIE['newTabs'] == 1 ? "target='_blank'" : "").">
				<div style='max-width:400px;'><img src='/assets/img/logo-reddit.png' ondragstart='return false' align='center'> r/DotA2</div>
				<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
			";
		if ($config == "config") {profileChangeWidget($anchor, $current);}
		echo "
				</div>
			</a>
		";
	}
	
	function linkRTrueDota2($config, $anchor, $current) {
	$fx = $_GET["fx"];
		echo "
			<a href='".($config == "config" ? "#" : "https://www.reddit.com/r/TrueDotA2/")."' class='profile-button btn-link ".($config == "config" ? "profile-button-disabled" : "")."' ".($config == "config" ? "onclick='return false'" : "")." ".($_COOKIE['newTabs'] == 1 ? "target='_blank'" : "").">
				<div style='max-width:400px;'><img src='/assets/img/logo-reddit.png' ondragstart='return false' align='center'> r/TrueDotA2</div>
				<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
			";
		if ($config == "config") {profileChangeWidget($anchor, $current);}
		echo "
				</div>
			</a>
		";
	}
	
	function linkRLearnDota2($config, $anchor, $current) {
	$fx = $_GET["fx"];
		echo "
			<a href='".($config == "config" ? "#" : "https://www.reddit.com/r/LearnDotA2/")."' class='profile-button btn-link ".($config == "config" ? "profile-button-disabled" : "")."' ".($config == "config" ? "onclick='return false'" : "")." ".($_COOKIE['newTabs'] == 1 ? "target='_blank'" : "").">
				<div style='max-width:400px;'><img src='/assets/img/logo-reddit.png' ondragstart='return false' align='center'> r/LearnDotA2</div>
				<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
			";
		if ($config == "config") {profileChangeWidget($anchor, $current);}
		echo "
				</div>
			</a>
		";
	}
	
	function linkDotabuffDPC($config, $anchor, $current) {
	$fx = $_GET["fx"];
		echo "
			<a href='".($config == "config" ? "#" : "https://www.dotabuff.com/procircuit")."' class='profile-button btn-link ".($config == "config" ? "profile-button-disabled" : "")."' ".($config == "config" ? "onclick='return false'" : "")." ".($_COOKIE['newTabs'] == 1 ? "target='_blank'" : "").">
				<div style='max-width:400px;'><img src='/assets/img/logo-dotabuff.png' ondragstart='return false' align='center'> DPC</div>
				<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
			";
		if ($config == "config") {profileChangeWidget($anchor, $current);}
		echo "
				</div>
			</a>
		";
	}
	
	function linkDotabuffEsports($config, $anchor, $current) {
	$fx = $_GET["fx"];
		echo "
			<a href='".($config == "config" ? "#" : "https://www.dotabuff.com/esports")."' class='profile-button btn-link ".($config == "config" ? "profile-button-disabled" : "")."' ".($config == "config" ? "onclick='return false'" : "")." ".($_COOKIE['newTabs'] == 1 ? "target='_blank'" : "").">
				<div style='max-width:400px;'><img src='/assets/img/logo-dotabuff.png' ondragstart='return false' align='center'> Esports</div>
				<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
			";
		if ($config == "config") {profileChangeWidget($anchor, $current);}
		echo "
				</div>
			</a>
		";
	}
	
	function linkTwitch($config, $anchor, $current) {
	$fx = $_GET["fx"];
		echo "
			<a href='".($config == "config" ? "#" : "hhttps://www.twitch.tv/directory/game/Dota%202")."' class='profile-button btn-link ".($config == "config" ? "profile-button-disabled" : "")."' ".($config == "config" ? "onclick='return false'" : "")." ".($_COOKIE['newTabs'] == 1 ? "target='_blank'" : "").">
				<div style='max-width:400px;'><img src='/assets/img/logo-twitch.png' ondragstart='return false' align='center'> Live Streams</div>
				<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
			";
		if ($config == "config") {profileChangeWidget($anchor, $current);}
		echo "
				</div>
			</a>
		";
	}
	
	function linkOpenDotaTeams($config, $anchor, $current) {
	$fx = $_GET["fx"];
		echo "
			<a href='".($config == "config" ? "#" : "https://www.opendota.com/teams")."' class='profile-button btn-link ".($config == "config" ? "profile-button-disabled" : "")."' ".($config == "config" ? "onclick='return false'" : "")." ".($_COOKIE['newTabs'] == 1 ? "target='_blank'" : "").">
				<div style='max-width:400px;'><img src='/assets/img/logo-opendota.png' ondragstart='return false' align='center'> Teams</div>
				<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
			";
		if ($config == "config") {profileChangeWidget($anchor, $current);}
		echo "
				</div>
			</a>
		";
	}
	
	function linkStratzLeagues($config, $anchor, $current) {
	$fx = $_GET["fx"];
		echo "
			<a href='".($config == "config" ? "#" : "https://stratz.com/en-us/leagues")."' class='profile-button btn-link ".($config == "config" ? "profile-button-disabled" : "")."' ".($config == "config" ? "onclick='return false'" : "")." ".($_COOKIE['newTabs'] == 1 ? "target='_blank'" : "").">
				<div style='max-width:400px;'><img src='/assets/img/logo-stratz.png' ondragstart='return false' align='center'> Leagues</div>
				<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
			";
		if ($config == "config") {profileChangeWidget($anchor, $current);}
		echo "
				</div>
			</a>
		";
	}
	
	function linkDotabuff($config, $anchor, $current) {
	$fx = $_GET["fx"];
		echo "
			<a href='".($config == "config" ? "#" : "https://dotabuff.com")."' class='profile-button btn-link ".($config == "config" ? "profile-button-disabled" : "")."' ".($config == "config" ? "onclick='return false'" : "")." ".($_COOKIE['newTabs'] == 1 ? "target='_blank'" : "").">
				<div style='max-width:400px;'><img src='/assets/img/logo-dotabuff.png' ondragstart='return false' align='center'> Dotabuff</div>
				<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
			";
		if ($config == "config") {profileChangeWidget($anchor, $current);}
		echo "
				</div>
			</a>
		";
	}
	
	function linkOpenDota($config, $anchor, $current) {
	$fx = $_GET["fx"];
		echo "
			<a href='".($config == "config" ? "#" : "https://opendota.com")."' class='profile-button btn-link ".($config == "config" ? "profile-button-disabled" : "")."' ".($config == "config" ? "onclick='return false'" : "")." ".($_COOKIE['newTabs'] == 1 ? "target='_blank'" : "").">
				<div style='max-width:400px;'><img src='/assets/img/logo-opendota.png' ondragstart='return false' align='center'> OpenDota</div>
				<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
			";
		if ($config == "config") {profileChangeWidget($anchor, $current);}
		echo "
				</div>
			</a>
		";
	}
	
	function linkStratz($config, $anchor, $current) {
	$fx = $_GET["fx"];
		echo "
			<a href='".($config == "config" ? "#" : "https://stratz.com/en-us/")."' class='profile-button btn-link ".($config == "config" ? "profile-button-disabled" : "")."' ".($config == "config" ? "onclick='return false'" : "")." ".($_COOKIE['newTabs'] == 1 ? "target='_blank'" : "").">
				<div style='max-width:400px;'><img src='/assets/img/logo-stratz.png' ondragstart='return false' align='center'> Stratz</div>
				<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
			";
		if ($config == "config") {profileChangeWidget($anchor, $current);}
		echo "
				</div>
			</a>
		";
	}
	
	function linkDota2Wiki($config, $anchor, $current) {
	$fx = $_GET["fx"];
		echo "
			<a href='".($config == "config" ? "#" : "https://dota2.gamepedia.com/Dota_2_Wiki")."' class='profile-button btn-link ".($config == "config" ? "profile-button-disabled" : "")."' ".($config == "config" ? "onclick='return false'" : "")." ".($_COOKIE['newTabs'] == 1 ? "target='_blank'" : "").">
				<div style='max-width:400px;'><img src='/assets/img/logo-dota2wiki.png' ondragstart='return false' align='center'> Dota 2 Wiki</div>
				<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
			";
		if ($config == "config") {profileChangeWidget($anchor, $current);}
		echo "
				</div>
			</a>
		";
	}
	
	function linkDota2Blog($config, $anchor, $current) {
	$fx = $_GET["fx"];
		echo "
			<a href='".($config == "config" ? "#" : "http://blog.dota2.com")."' class='profile-button btn-link ".($config == "config" ? "profile-button-disabled" : "")."' ".($config == "config" ? "onclick='return false'" : "")." ".($_COOKIE['newTabs'] == 1 ? "target='_blank'" : "").">
				<div style='max-width:400px;'><img src='/assets/img/logo-dota2.png' ondragstart='return false' align='center'> Dota 2 Blog</div>
				<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
			";
		if ($config == "config") {profileChangeWidget($anchor, $current);}
		echo "
				</div>
			</a>
		";
	}
	
	function linkDota2Updates($config, $anchor, $current) {
	$fx = $_GET["fx"];
		echo "
			<a href='".($config == "config" ? "#" : "http://dota2.com/news/updates/")."' class='profile-button btn-link ".($config == "config" ? "profile-button-disabled" : "")."' ".($config == "config" ? "onclick='return false'" : "")." ".($_COOKIE['newTabs'] == 1 ? "target='_blank'" : "").">
				<div style='max-width:400px;'><img src='/assets/img/logo-dota2.png' ondragstart='return false' align='center'> Dota 2 Updates</div>
				<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
			";
		if ($config == "config") {profileChangeWidget($anchor, $current);}
		echo "
				</div>
			</a>
		";
	}
	
	function linkDota2Leaderboards($config, $anchor, $current) {
	$fx = $_GET["fx"];
		echo "
			<a href='".($config == "config" ? "#" : "http://dota2.com/leaderboards/")."' class='profile-button btn-link ".($config == "config" ? "profile-button-disabled" : "")."' ".($config == "config" ? "onclick='return false'" : "")." ".($_COOKIE['newTabs'] == 1 ? "target='_blank'" : "").">
				<div style='max-width:400px;'><img src='/assets/img/logo-dota2.png' ondragstart='return false' align='center'> Leaderboards</div>
				<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
			";
		if ($config == "config") {profileChangeWidget($anchor, $current);}
		echo "
				</div>
			</a>
		";
	}
	
	function linkLiquipedia($config, $anchor, $current) {
	$fx = $_GET["fx"];
		echo "
			<a href='".($config == "config" ? "#" : "https://liquipedia.net/dota2/Main_Page")."' class='profile-button btn-link ".($config == "config" ? "profile-button-disabled" : "")."' ".($config == "config" ? "onclick='return false'" : "")." ".($_COOKIE['newTabs'] == 1 ? "target='_blank'" : "").">
				<div style='max-width:400px;'><img src='/assets/img/logo-liquipedia.png' ondragstart='return false' align='center'> Liquipedia</div>
				<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
			";
		if ($config == "config") {profileChangeWidget($anchor, $current);}
		echo "
				</div>
			</a>
		";
	}
	
	function linkUpcomingMatches($config, $anchor, $current) {
	$fx = $_GET["fx"];
		echo "
			<a href='".($config == "config" ? "#" : "https://liquipedia.net/dota2/Liquipedia:Upcoming_and_ongoing_matches")."' class='profile-button btn-link ".($config == "config" ? "profile-button-disabled" : "")."' ".($config == "config" ? "onclick='return false'" : "")." ".($_COOKIE['newTabs'] == 1 ? "target='_blank'" : "").">
				<div style='max-width:400px;'><img src='/assets/img/logo-liquipedia.png' ondragstart='return false' align='center'> Pro Matches</div>
				<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
			";
		if ($config == "config") {profileChangeWidget($anchor, $current);}
		echo "
				</div>
			</a>
		";
	}
	
	function linkTournaments($config, $anchor, $current) {
	$fx = $_GET["fx"];
		echo "
			<a href='".($config == "config" ? "#" : "https://liquipedia.net/dota2/Portal:Tournaments")."' class='profile-button btn-link ".($config == "config" ? "profile-button-disabled" : "")."' ".($config == "config" ? "onclick='return false'" : "")." ".($_COOKIE['newTabs'] == 1 ? "target='_blank'" : "").">
				<div style='max-width:400px;'><img src='/assets/img/logo-liquipedia.png' ondragstart='return false' align='center'> Tournaments</div>
				<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
			";
		if ($config == "config") {profileChangeWidget($anchor, $current);}
		echo "
				</div>
			</a>
		";
	}
	
	function linkDota2Pro($config, $anchor, $current) {
	$fx = $_GET["fx"];
		echo "
			<a href='".($config == "config" ? "#" : "https://www.youtube.com/user/Dota2ProChannels/videos")."' class='profile-button btn-link ".($config == "config" ? "profile-button-disabled" : "")."' ".($config == "config" ? "onclick='return false'" : "")." ".($_COOKIE['newTabs'] == 1 ? "target='_blank'" : "").">
				<div style='max-width:400px;'><img src='/assets/img/logo-dota2pro.png' ondragstart='return false' align='center'> Dota 2 Pro</div>
				<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
			";
		if ($config == "config") {profileChangeWidget($anchor, $current);}
		echo "
				</div>
			</a>
		";
	}
	
	function linkHowDoIPlay($config, $anchor, $current) {
	$fx = $_GET["fx"];
		echo "
			<a href='".($config == "config" ? "#" : "https://howdoiplay.com")."' class='profile-button btn-link ".($config == "config" ? "profile-button-disabled" : "")."' ".($config == "config" ? "onclick='return false'" : "")." ".($_COOKIE['newTabs'] == 1 ? "target='_blank'" : "").">
				<div style='max-width:400px;'><img src='/assets/img/logo-howdoiplay.png' ondragstart='return false' align='center'> How Do I Play?</div>
				<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
			";
		if ($config == "config") {profileChangeWidget($anchor, $current);}
		echo "
				</div>
			</a>
		";
	}
	
	function linkDota2ProTracker($config, $anchor, $current) {
	$fx = $_GET["fx"];
		echo "
			<a href='".($config == "config" ? "#" : "http://www.dota2protracker.com")."' class='profile-button btn-link ".($config == "config" ? "profile-button-disabled" : "")."' ".($config == "config" ? "onclick='return false'" : "")." ".($_COOKIE['newTabs'] == 1 ? "target='_blank'" : "").">
				<div style='max-width:400px; font-size:13px;'><img src='/assets/img/logo-dota2protracker.png' ondragstart='return false' align='center'> Dota 2 Pro Tracker</div>
				<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
			";
		if ($config == "config") {profileChangeWidget($anchor, $current);}
		echo "
				</div>
			</a>
		";
	}
	
	function linkTrackDota($config, $anchor, $current) {
	$fx = $_GET["fx"];
		echo "
			<a href='".($config == "config" ? "#" : "https://www.trackdota.com")."' class='profile-button btn-link ".($config == "config" ? "profile-button-disabled" : "")."' ".($config == "config" ? "onclick='return false'" : "")." ".($_COOKIE['newTabs'] == 1 ? "target='_blank'" : "").">
				<div style='max-width:400px;'><img src='/assets/img/logo-trackdota.png' ondragstart='return false' align='center'> TrackDota</div>
				<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
			";
		if ($config == "config") {profileChangeWidget($anchor, $current);}
		echo "
				</div>
			</a>
		";
	}
	
	function linkSteamCommunityMarket($config, $anchor, $current) {
	$fx = $_GET["fx"];
		echo "
			<a href='".($config == "config" ? "#" : "https://steamcommunity.com/market/search?appid=570")."' class='profile-button btn-link ".($config == "config" ? "profile-button-disabled" : "")."' ".($config == "config" ? "onclick='return false'" : "")." ".($_COOKIE['newTabs'] == 1 ? "target='_blank'" : "").">
				<div style='max-width:400px; font-size:13px;'><img src='/assets/img/logo-steam.png' ondragstart='return false' align='center'> Community Market</div>
				<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
			";
		if ($config == "config") {profileChangeWidget($anchor, $current);}
		echo "
				</div>
			</a>
		";
	}
	
	function widgetHeroesProfileD2D($config, $anchor, $current) {
		
		$fx = $_GET["fx"];
		include $_SERVER['DOCUMENT_ROOT'] . '/heroes/array.php';
	
		echo "
			<div class='widgetFrame' style='background: #1476A5'>
				<div style='min-width:200px;'>
					<div style='padding-bottom:13px; font-weight:bold; letter-spacing:1px;'>Hero Profiles</div>
					<select onChange='".($_COOKIE['newTabs'] == "1" ? "window.document.location.href=this.options[this.selectedIndex].value;" : "window.document.location.href=this.options[this.selectedIndex].value;")."' ".($config == "config" ? "disabled" : "").">
					<option value=''>Hero Profiles&hellip;</option>
			";
					foreach ($heroes as $key => $value) {
					echo("<option value='/heroes/?id=".$key."'>".$heroes[$key]["name"]."</option>");
					}
		echo "
					</select>
				</div>
				
				<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
					";
				if ($config == "config") {profileChangeWidget($anchor, $current);}
		echo "
				</div>
			</div>
		";
	}
	
	function widgetHeroesProfileDotabuff($config, $anchor, $current) {
	
		$fx = $_GET["fx"];
			include $_SERVER['DOCUMENT_ROOT'] . '/heroes/array.php';
		
			echo "
				<div class='widgetFrame' style='background: #EE3B1B;'>
					<div style='min-width:200px;'>
						<div style='padding-bottom:13px; font-weight:bold; letter-spacing:1px;'>Hero Profiles</div>
						<select onChange='window.document.location.href=this.options[this.selectedIndex].value;' ".($config == "config" ? "disabled" : "").">
						<option value=''>Select a Hero&hellip;</option>
				";
						foreach ($heroes as $key => $value) {
						echo("<option value='https://www.dotabuff.com/heroes/".$key."'>".$heroes[$key]["name"]."</option>");
						}
			echo "
						</select>
					</div>
					
					<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
						";
					if ($config == "config") {profileChangeWidget($anchor, $current);}
			echo "
					</div>
				</div>
			";
	}
	
	function widgetHeroesProfileOpenDota($config, $anchor, $current) {
	
		$fx = $_GET["fx"];
			include $_SERVER['DOCUMENT_ROOT'] . '/heroes/array.php';
		
			echo "
				<div class='widgetFrame' style='background: #02C69D;'>
					<div style='min-width:200px;'>
						<div style='padding-bottom:13px; font-weight:bold; letter-spacing:1px;'>Hero Profiles</div>
						<select onChange='window.document.location.href=this.options[this.selectedIndex].value;' ".($config == "config" ? "disabled" : "").">
						<option value=''>Select a Hero&hellip;</option>
				";
						foreach ($heroes as $key => $value) {
						echo("<option value='https://www.opendota.com/heroes/".$heroes[$key]['hero-id']."'>".$heroes[$key]["name"]."</option>");
						}
			echo "
						</select>
					</div>
					
					<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
						";
					if ($config == "config") {profileChangeWidget($anchor, $current);}
			echo "
					</div>
				</div>
			";
	}
	
	function widgetHeroesProfileStratz($config, $anchor, $current) {
	
		$fx = $_GET["fx"];
			include $_SERVER['DOCUMENT_ROOT'] . '/heroes/array.php';
		
			echo "
				<div class='widgetFrame' style='background: #74DAEC;'>
					<div style='min-width:200px;'>
						<div style='padding-bottom:13px; font-weight:bold; letter-spacing:1px;'>Hero Profiles</div>
						<select onChange='window.document.location.href=this.options[this.selectedIndex].value;' ".($config == "config" ? "disabled" : "").">
						<option value=''>Select a Hero&hellip;</option>
				";
						foreach ($heroes as $key => $value) {
						echo("<option value='https://stratz.com/en-us/heroes/".$heroes[$key]['hero-id']."'>".$heroes[$key]["name"]."</option>");
						}
			echo "
						</select>
					</div>
					
					<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
						";
					if ($config == "config") {profileChangeWidget($anchor, $current);}
			echo "
					</div>
				</div>
			";
	}
	
	function widgetHeroesProfileLiquipedia($config, $anchor, $current) {
	
		$fx = $_GET["fx"];
			include $_SERVER['DOCUMENT_ROOT'] . '/heroes/array.php';
		
			echo "
				<div class='widgetFrame' style='background: #92352D;'>
					<div style='min-width:200px;'>
						<div style='padding-bottom:13px; font-weight:bold; letter-spacing:1px;'>Hero Profiles</div>
						<select onChange='window.document.location.href=this.options[this.selectedIndex].value;' ".($config == "config" ? "disabled" : "").">
						<option value=''>Select a Hero&hellip;</option>
				";
						foreach ($heroes as $key => $value) {
						echo("<option value='https://liquipedia.net/dota2/".str_replace(' ', '_', str_replace('’', '%27', $heroes[$key]['name']))."'>".$heroes[$key]["name"]."</option>");
						}
			echo "
						</select>
					</div>
					
					<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
						";
					if ($config == "config") {profileChangeWidget($anchor, $current);}
			echo "
					</div>
				</div>
			";
	}
	
	function widgetHeroesProfileDota2Wiki($config, $anchor, $current) {
	
		$fx = $_GET["fx"];
			include $_SERVER['DOCUMENT_ROOT'] . '/heroes/array.php';
		
			echo "
				<div class='widgetFrame' style='background: #1A1A1A;'>
					<div style='min-width:200px;'>
						<div style='padding-bottom:13px; font-weight:bold; letter-spacing:1px;'>Hero Profiles</div>
						<select onChange='window.document.location.href=this.options[this.selectedIndex].value;' ".($config == "config" ? "disabled" : "").">
						<option value=''>Select a Hero&hellip;</option>
				";
						foreach ($heroes as $key => $value) {
						echo("<option value='https://dota2.gamepedia.com/".str_replace(' ', '_', str_replace('’', '%27', $heroes[$key]['name']))."'>".$heroes[$key]["name"]."</option>");
						}
			echo "
						</select>
					</div>
					
					<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
						";
					if ($config == "config") {profileChangeWidget($anchor, $current);}
			echo "
					</div>
				</div>
			";
	}
	
	function widgetHeroesAbilityBuilds($config, $anchor, $current) {
	
		$fx = $_GET["fx"];
			include $_SERVER['DOCUMENT_ROOT'] . '/heroes/array.php';
		
			echo "
				<div class='widgetFrame' style='background: #EE3B1B;'>
					<div style='min-width:200px;'>
						<div style='padding-bottom:13px; font-weight:bold; letter-spacing:1px;'>Ability Builds</div>
						<select onChange='window.document.location.href=this.options[this.selectedIndex].value;' ".($config == "config" ? "disabled" : "").">
						<option value=''>Select a Hero&hellip;</option>
				";
						foreach ($heroes as $key => $value) {
						echo("<option value='https://www.dotabuff.com/heroes/".$key."/builds'>".$heroes[$key]["name"]."</option>");
						}
			echo "
						</select>
					</div>
					
					<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
						";
					if ($config == "config") {profileChangeWidget($anchor, $current);}
			echo "
					</div>
				</div>
			";
	}
	
	function widgetHeroesCounters($config, $anchor, $current) {
	
		$fx = $_GET["fx"];
			include $_SERVER['DOCUMENT_ROOT'] . '/heroes/array.php';
		
			echo "
				<div class='widgetFrame' style='background: #EE3B1B;'>
					<div style='min-width:200px;'>
						<div style='padding-bottom:13px; font-weight:bold; letter-spacing:1px;'>Hero Counters</div>
						<select onChange='window.document.location.href=this.options[this.selectedIndex].value;' ".($config == "config" ? "disabled" : "").">
						<option value=''>Select a Hero&hellip;</option>
				";
						foreach ($heroes as $key => $value) {
						echo("<option value='https://www.dotabuff.com/heroes/".$key."/counters'>".$heroes[$key]["name"]."</option>");
						}
			echo "
						</select>
					</div>
					
					<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
						";
					if ($config == "config") {profileChangeWidget($anchor, $current);}
			echo "
					</div>
				</div>
			";
	}
	
	function widgetHeroesGuides($config, $anchor, $current) {
	
		$fx = $_GET["fx"];
			include $_SERVER['DOCUMENT_ROOT'] . '/heroes/array.php';
		
			echo "
				<div class='widgetFrame' style='background: #EE3B1B;'>
					<div style='min-width:200px;'>
						<div style='padding-bottom:13px; font-weight:bold; letter-spacing:1px;'>Hero Guides</div>
						<select onChange='window.document.location.href=this.options[this.selectedIndex].value;' ".($config == "config" ? "disabled" : "").">
						<option value=''>Select a Hero&hellip;</option>
				";
						foreach ($heroes as $key => $value) {
						echo("<option value='https://www.dotabuff.com/heroes/".$key."/guides'>".$heroes[$key]["name"]."</option>");
						}
			echo "
						</select>
					</div>
					
					<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
						";
					if ($config == "config") {profileChangeWidget($anchor, $current);}
			echo "
					</div>
				</div>
			";
	}
	
	function widgetHeroesProPubs($config, $anchor, $current) {
	
		$fx = $_GET["fx"];
			include $_SERVER['DOCUMENT_ROOT'] . '/heroes/array.php';
		
			echo "
				<div class='widgetFrame' style='background: #CB0000;'>
					<div style='min-width:200px;'>
						<div style='padding-bottom:13px; font-weight:bold; letter-spacing:1px;'>Pro Pubs</div>
						<select onChange='window.document.location.href=this.options[this.selectedIndex].value;' ".($config == "config" ? "disabled" : "").">
						<option value=''>Select a Hero&hellip;</option>
				";
						foreach ($heroes as $key => $value) {
						echo("<option value='http://www.dota2protracker.com/hero/".str_replace(' ', '%20', str_replace('’', '%27', $heroes[$key]['name']))."'>".$heroes[$key]["name"]."</option>");
						}
			echo "
						</select>
					</div>
					
					<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
						";
					if ($config == "config") {profileChangeWidget($anchor, $current);}
			echo "
					</div>
				</div>
			";
	}
	
	function widgetHeroesProVODs($config, $anchor, $current) {
	
		$fx = $_GET["fx"];
			include $_SERVER['DOCUMENT_ROOT'] . '/heroes/array.php';
		
			echo "
				<div class='widgetFrame' style='background: #FF0000;'>
					<div style='min-width:200px;'>
						<div style='padding-bottom:13px; font-weight:bold; letter-spacing:1px;'>Pro VODs</div>
						<select onChange='window.document.location.href=this.options[this.selectedIndex].value;' ".($config == "config" ? "disabled" : "").">
						<option value=''>Select a Hero&hellip;</option>
				";
						foreach ($heroes as $key => $value) {
						echo("<option value='https://www.youtube.com/user/Dota2ProChannels/search?query=".str_replace(' ', '+', str_replace('’', '%27', $heroes[$key]['name']))."'>".$heroes[$key]["name"]."</option>");
						}
			echo "
						</select>
					</div>
					
					<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
						";
					if ($config == "config") {profileChangeWidget($anchor, $current);}
			echo "
					</div>
				</div>
			";
	}
	
	function widgetHeroesTipsAndTricks($config, $anchor, $current) {
	
		$fx = $_GET["fx"];
			include $_SERVER['DOCUMENT_ROOT'] . '/heroes/array.php';
		
			echo "
				<div class='widgetFrame' style='background: #E84135;'>
					<div style='min-width:200px;'>
						<div style='padding-bottom:13px; font-weight:bold; letter-spacing:1px;'>Tips & Tricks</div>
						<select onChange='window.document.location.href=this.options[this.selectedIndex].value;' ".($config == "config" ? "disabled" : "").">
						<option value=''>Select a Hero&hellip;</option>
				";
						foreach ($heroes as $key => $value) {
						echo("<option value='https://howdoiplay.com/?".str_replace(' ', '+', str_replace('’', '%27', $heroes[$key]['name']))."'>".$heroes[$key]["name"]."</option>");
						}
			echo "
						</select>
					</div>
					
					<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
						";
					if ($config == "config") {profileChangeWidget($anchor, $current);}
			echo "
					</div>
				</div>
			";
	}
	
	function widgetAbilitiesD2D($config, $anchor, $current) {
	
		$fx = $_GET["fx"];
			include $_SERVER['DOCUMENT_ROOT'] . '/heroes/array.php';
		
			echo "
				<div class='widgetFrame' style='background: #1476A5;'>
					<div style='min-width:200px;'>
						<div style='padding-bottom:13px; font-weight:bold; letter-spacing:1px;'>Abilities</div>
						<select onChange='window.document.location.href=this.options[this.selectedIndex].value;' ".($config == "config" ? "disabled" : "").">
						<option value=''>Select an Ability&hellip;</option>
				";
						foreach ($heroes as $key => $value) {
							echo("<optgroup label='".$heroes[$key]['name']."'>");
							
							foreach ($heroes[$key]["abilities"] as $key2 => $value2) {
								echo("<option value='/abilities/?id=".$key2."'>".$heroes[$key]['abilities'][$key2]['name']."</option>");
							}
							
							echo("</optgroup>");
						}
			echo "
						</select>
					</div>
					
					<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
						";
					if ($config == "config") {profileChangeWidget($anchor, $current);}
			echo "
					</div>
				</div>
			";
	}
	
	function widgetAbilitiesLiquipedia($config, $anchor, $current) {
	
		$fx = $_GET["fx"];
			include $_SERVER['DOCUMENT_ROOT'] . '/heroes/array.php';
		
			echo "
				<div class='widgetFrame' style='background: #92352D;'>
					<div style='min-width:200px;'>
						<div style='padding-bottom:13px; font-weight:bold; letter-spacing:1px;'>Abilities</div>
						<select onChange='window.document.location.href=this.options[this.selectedIndex].value;' ".($config == "config" ? "disabled" : "").">
						<option value=''>Select an Ability&hellip;</option>
				";
						foreach ($heroes as $key => $value) {
							echo("<optgroup label='".$heroes[$key]['name']."'>");
							
							foreach ($heroes[$key]["abilities"] as $key2 => $value2) {
								echo("<option value='https://liquipedia.net/dota2/".str_replace(' ', '_', str_replace('’', '%27', $heroes[$key]["name"]))."#".str_replace(' ', '_', str_replace('’', '.27', $heroes[$key]["abilities"][$key2]['name']))."'>".$heroes[$key]['abilities'][$key2]['name']."</option>");
							}
							
							echo("</optgroup>");
						}
			echo "
						</select>
					</div>
					
					<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
						";
					if ($config == "config") {profileChangeWidget($anchor, $current);}
			echo "
					</div>
				</div>
			";
	}
	
	function widgetAbilitiesDota2Wiki($config, $anchor, $current) {
	
		$fx = $_GET["fx"];
			include $_SERVER['DOCUMENT_ROOT'] . '/heroes/array.php';
		
			echo "
				<div class='widgetFrame' style='background: #1A1A1A;'>
					<div style='min-width:200px;'>
						<div style='padding-bottom:13px; font-weight:bold; letter-spacing:1px;'>Abilities</div>
						<select onChange='window.document.location.href=this.options[this.selectedIndex].value;' ".($config == "config" ? "disabled" : "").">
						<option value=''>Select an Ability&hellip;</option>
				";
						foreach ($heroes as $key => $value) {
							echo("<optgroup label='".$heroes[$key]['name']."'>");
							
							foreach ($heroes[$key]["abilities"] as $key2 => $value2) {
								echo("<option value='https://dota2.gamepedia.com/".str_replace(' ', '_', str_replace('’', '%27', $heroes[$key]["name"]))."#".str_replace(' ', '_', str_replace('’', '.27', $heroes[$key]["abilities"][$key2]['name']))."'>".$heroes[$key]['abilities'][$key2]['name']."</option>");
							}
							
							echo("</optgroup>");
						}
			echo "
						</select>
					</div>
					
					<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
						";
					if ($config == "config") {profileChangeWidget($anchor, $current);}
			echo "
					</div>
				</div>
			";
	}
	
	function widgetItemsD2D($config, $anchor, $current) {
	
		$fx = $_GET["fx"];
			include $_SERVER['DOCUMENT_ROOT'] . '/items/array.php';
		
			echo "
				<div class='widgetFrame' style='background: #1476A5;'>
					<div style='min-width:200px;'>
						<div style='padding-bottom:13px; font-weight:bold; letter-spacing:1px;'>Items</div>
						<select onChange='window.document.location.href=this.options[this.selectedIndex].value;' ".($config == "config" ? "disabled" : "").">
						<option value=''>Select an Item&hellip;</option>
				";
						foreach ($items as $key => $value) {
						
							echo("<option value='/items/?id=".$key."'>".$items[$key]['name']."</option>");
						}
			echo "
						</select>
					</div>
					
					<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
						";
					if ($config == "config") {profileChangeWidget($anchor, $current);}
			echo "
					</div>
				</div>
			";
	}
	
	function widgetItemsLiquipedia($config, $anchor, $current) {
	
		$fx = $_GET["fx"];
			include $_SERVER['DOCUMENT_ROOT'] . '/items/array.php';
		
			echo "
				<div class='widgetFrame' style='background: #92352D;'>
					<div style='min-width:200px;'>
						<div style='padding-bottom:13px; font-weight:bold; letter-spacing:1px;'>Items</div>
						<select onChange='window.document.location.href=this.options[this.selectedIndex].value;' ".($config == "config" ? "disabled" : "").">
						<option value=''>Select an Item&hellip;</option>
				";
						foreach ($items as $key => $value) {
							$idwonumbers = str_replace(" 1" , "", $items[$key]['name']);
							$idwonumbers = str_replace(" 2" , "", $idwonumbers);
							$idwonumbers = str_replace(" 3" , "", $idwonumbers);
							$idwonumbers = str_replace(" 4" , "", $idwonumbers);
							$idwonumbers = str_replace(" 5" , "", $idwonumbers);
						
							echo("<option value='https://liquipedia.net/dota2/".str_replace(' ', '_', str_replace('’', '%27', $idwonumbers))."'>".$items[$key]['name']."</option>");
						}
			echo "
						</select>
					</div>
					
					<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
						";
					if ($config == "config") {profileChangeWidget($anchor, $current);}
			echo "
					</div>
				</div>
			";
	}
	
	function widgetItemsDota2Wiki($config, $anchor, $current) {
	
		$fx = $_GET["fx"];
			include $_SERVER['DOCUMENT_ROOT'] . '/items/array.php';
		
			echo "
				<div class='widgetFrame' style='background: #1A1A1A;'>
					<div style='min-width:200px;'>
						<div style='padding-bottom:13px; font-weight:bold; letter-spacing:1px;'>Items</div>
						<select onChange='window.document.location.href=this.options[this.selectedIndex].value;' ".($config == "config" ? "disabled" : "").">
						<option value=''>Select an Item&hellip;</option>
				";
						foreach ($items as $key => $value) {
							echo("<option value='https://dota2.gamepedia.com/".str_replace(' ', '_', str_replace('’', '%27', $items[$key]['name']))."'>".$items[$key]['name']."</option>");
						}
			echo "
						</select>
					</div>
					
					<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
						";
					if ($config == "config") {profileChangeWidget($anchor, $current);}
			echo "
					</div>
				</div>
			";
	}
	
	function widgetItemsDotabuff($config, $anchor, $current) {
	
		$fx = $_GET["fx"];
			include $_SERVER['DOCUMENT_ROOT'] . '/items/array.php';
		
			echo "
				<div class='widgetFrame' style='background: #EE3B1B;'>
					<div style='min-width:200px;'>
						<div style='padding-bottom:13px; font-weight:bold; letter-spacing:1px;'>Items</div>
						<select onChange='window.document.location.href=this.options[this.selectedIndex].value;' ".($config == "config" ? "disabled" : "").">
						<option value=''>Select an Item&hellip;</option>
				";
						foreach ($items as $key => $value) {
						
							if ($key == "boots-of-travel-1") {$dotabuffid = "boots-of-travel";} else {$dotabuffid = $key;}
							
							echo("<option value='https://www.dotabuff.com/items/".$dotabuffid."'>".$items[$key]['name']."</option>");
						}
			echo "
						</select>
					</div>
					
					<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
						";
					if ($config == "config") {profileChangeWidget($anchor, $current);}
			echo "
					</div>
				</div>
			";
	}
	
	function widgetCosmeticsSCM($config, $anchor, $current) {
	
		$fx = $_GET["fx"];
			include $_SERVER['DOCUMENT_ROOT'] . '/items/array.php';
		
			echo "
				<div class='widgetFrame' style='background: #164374; padding-bottom:0px;'>
					<div style='min-width:200px;'>
						
						<form method='get' action='/cosmetics/' style='margin-bottom: 0px;'>
							<input type='tel' name='q' id='q' placeholder='Search Cosmetics' class='text-input input-small input-search' onkeypress='return isNumberKey(event)' style='padding: 10px; margin: 0px; width: 100%; font-size:14px; text-transform:none; color:white; letter-spacing:1px;' />
							<input type='radio' name='platform' id='steam' value='steam' checked='checked' />
							<br><input type='submit' name='' value='Search' style='left: 0px; width: auto; font-size: 14px; font-weight: bold;' />
						</form>
					</div>
					
					<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
						";
					if ($config == "config") {profileChangeWidget($anchor, $current);}
			echo "
					</div>
				</div>
			";
	}
	
	function widgetCosmeticsDotabuff($config, $anchor, $current) {
	
		$fx = $_GET["fx"];
			include $_SERVER['DOCUMENT_ROOT'] . '/items/array.php';
		
			echo "
				<div class='widgetFrame' style='background: #EE3B1B; padding-bottom:0px;'>
					<div style='min-width:200px;'>
						
						<form method='get' action='/cosmetics/' style='margin-bottom: 0px;'>
							<input type='tel' name='q' id='q' placeholder='Search Cosmetics' class='text-input input-small input-search' onkeypress='return isNumberKey(event)' style='padding: 10px; margin: 0px; width: 100%; font-size:14px; text-transform:none; color:white; letter-spacing:1px;' />
							<input type='radio' name='platform' id='dotabuff' value='dotabuff' checked='checked' />
							<br><input type='submit' name='' value='Search' style='left: 0px; width: auto; font-size: 14px; font-weight: bold;' />
						</form>
					</div>
					
					<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
						";
					if ($config == "config") {profileChangeWidget($anchor, $current);}
			echo "
					</div>
				</div>
			";
	}
	
	function widgetMatchIDD2D($config, $anchor, $current) {
	
		$fx = $_GET["fx"];
			include $_SERVER['DOCUMENT_ROOT'] . '/items/array.php';
		
			echo "
				<div class='widgetFrame' style='background: #1476A5; padding-bottom:0px;'>
					<div style='min-width:200px;'>
						
						<form method='get' action='/match-id/' style='margin-bottom: 0px;'>
							<input type='tel' name='id' id='id' placeholder='Enter Match ID' class='text-input input-small input-search' onkeypress='return isNumberKey(event)' style='padding: 10px; margin: 0px; width: 100%; font-size:14px; text-transform:none;' onClick='this.select();' autocomplete=\"off\" />
							<br><input type='submit' name='' value='Search' style='left: 0px; width: auto; font-size: 14px; font-weight: bold;' />
						</form>
					</div>
					
					<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
						";
					if ($config == "config") {profileChangeWidget($anchor, $current);}
			echo "
					</div>
				</div>
			";
	}
	
	function widgetMatchIDDotabuff($config, $anchor, $current) {
	
		$fx = $_GET["fx"];
			include $_SERVER['DOCUMENT_ROOT'] . '/items/array.php';
		
			echo "
				<div class='widgetFrame' style='background: #EE3B1B; padding-bottom:0px;'>
					<div style='min-width:200px;'>
						
						<form method='get' action='/match-id/' style='margin-bottom: 0px;'>
							<input type='tel' name='id' id='id' placeholder='Enter Match ID' class='text-input input-small input-search' onkeypress='return isNumberKey(event)' style='padding: 10px; margin: 0px; width: 100%; font-size:14px; text-transform:none;' onClick='this.select();' autocomplete=\"off\" />
							<input type='radio' name='redir' id='dotabuff' value='dotabuff' checked='checked' />
							<br><input type='submit' name='' value='Search' style='left: 0px; width: auto; font-size: 14px; font-weight: bold;' />
						</form>
					</div>
					
					<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
						";
					if ($config == "config") {profileChangeWidget($anchor, $current);}
			echo "
					</div>
				</div>
			";
	}
	
	function widgetMatchIDOpenDota($config, $anchor, $current) {
	
		$fx = $_GET["fx"];
			include $_SERVER['DOCUMENT_ROOT'] . '/items/array.php';
		
			echo "
				<div class='widgetFrame' style='background: #02C69D; padding-bottom:0px;'>
					<div style='min-width:200px;'>
						
						<form method='get' action='/match-id/' style='margin-bottom: 0px;'>
							<input type='tel' name='id' id='id' placeholder='Enter Match ID' class='text-input input-small input-search' onkeypress='return isNumberKey(event)' style='padding: 10px; margin: 0px; width: 100%; font-size:14px; text-transform:none;' onClick='this.select();' autocomplete=\"off\" />
							<input type='radio' name='redir' id='opendota' value='opendota' checked='checked' />
							<br><input type='submit' name='' value='Search' style='left: 0px; width: auto; font-size: 14px; font-weight: bold;' />
						</form>
					</div>
					
					<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
						";
					if ($config == "config") {profileChangeWidget($anchor, $current);}
			echo "
					</div>
				</div>
			";
	}
	
	function widgetMatchIDStratz($config, $anchor, $current) {
	
		$fx = $_GET["fx"];
			include $_SERVER['DOCUMENT_ROOT'] . '/items/array.php';
		
			echo "
				<div class='widgetFrame' style='background: #74DAEC; padding-bottom:0px;'>
					<div style='min-width:200px;'>
						
						<form method='get' action='/match-id/' style='margin-bottom: 0px;'>
							<input type='tel' name='id' id='id' placeholder='Enter Match ID' class='text-input input-small input-search' onkeypress='return isNumberKey(event)' style='padding: 10px; margin: 0px; width: 100%; font-size:14px; text-transform:none;' onClick='this.select();' autocomplete=\"off\" />
							<input type='radio' name='redir' id='stratz' value='stratz' checked='checked' />
							<br><input type='submit' name='' value='Search' style='left: 0px; width: auto; font-size: 14px; font-weight: bold;' />
						</form>
					</div>
					
					<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
						";
					if ($config == "config") {profileChangeWidget($anchor, $current);}
			echo "
					</div>
				</div>
			";
	}
	
	function widgetPlayerIDD2D($config, $anchor, $current) {
	
		$fx = $_GET["fx"];
			include $_SERVER['DOCUMENT_ROOT'] . '/items/array.php';
		
			echo "
				<div class='widgetFrame' style='background: #1476A5; padding-bottom:0px;'>
					<div style='min-width:200px;'>
						
						<form method='get' action='/player-id/' style='margin-bottom: 0px;'>
							<input type='tel' name='id' id='id' placeholder='Enter Player ID' class='text-input input-small input-search' onkeypress='return isNumberKey(event)' style='padding: 10px; margin: 0px; width: 100%; font-size:14px; text-transform:none;' onClick='this.select();' autocomplete=\"off\" />
							<br><input type='submit' name='' value='Search' style='left: 0px; width: auto; font-size: 14px; font-weight: bold;' />
						</form>
					</div>
					
					<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
						";
					if ($config == "config") {profileChangeWidget($anchor, $current);}
			echo "
					</div>
				</div>
			";
	}
	
	function widgetPlayerIDDotabuff($config, $anchor, $current) {
	
		$fx = $_GET["fx"];
			include $_SERVER['DOCUMENT_ROOT'] . '/items/array.php';
		
			echo "
				<div class='widgetFrame' style='background: #EE3B1B; padding-bottom:0px;'>
					<div style='min-width:200px;'>
						
						<form method='get' action='/player-id/' style='margin-bottom: 0px;'>
							<input type='tel' name='id' id='id' placeholder='Enter Player ID' class='text-input input-small input-search' onkeypress='return isNumberKey(event)' style='padding: 10px; margin: 0px; width: 100%; font-size:14px; text-transform:none;' onClick='this.select();' autocomplete=\"off\" />
							<input type='radio' name='redir' id='dotabuff' value='dotabuff' checked='checked' />
							<br><input type='submit' name='' value='Search' style='left: 0px; width: auto; font-size: 14px; font-weight: bold;' />
						</form>
					</div>
					
					<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
						";
					if ($config == "config") {profileChangeWidget($anchor, $current);}
			echo "
					</div>
				</div>
			";
	}
	
	function widgetPlayerIDOpenDota($config, $anchor, $current) {
	
		$fx = $_GET["fx"];
			include $_SERVER['DOCUMENT_ROOT'] . '/items/array.php';
		
			echo "
				<div class='widgetFrame' style='background: #02C69D; padding-bottom:0px;'>
					<div style='min-width:200px;'>
						
						<form method='get' action='/player-id/' style='margin-bottom: 0px;'>
							<input type='tel' name='id' id='id' placeholder='Enter Player ID' class='text-input input-small input-search' onkeypress='return isNumberKey(event)' style='padding: 10px; margin: 0px; width: 100%; font-size:14px; text-transform:none;' onClick='this.select();' autocomplete=\"off\" />
							<input type='radio' name='redir' id='opendota' value='opendota' checked='checked' />
							<br><input type='submit' name='' value='Search' style='left: 0px; width: auto; font-size: 14px; font-weight: bold;' />
						</form>
					</div>
					
					<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
						";
					if ($config == "config") {profileChangeWidget($anchor, $current);}
			echo "
					</div>
				</div>
			";
	}
	
	function widgetPlayerIDStratz($config, $anchor, $current) {
	
		$fx = $_GET["fx"];
			include $_SERVER['DOCUMENT_ROOT'] . '/items/array.php';
		
			echo "
				<div class='widgetFrame' style='background: #74DAEC; padding-bottom:0px;'>
					<div style='min-width:200px;'>
						
						<form method='get' action='/player-id/' style='margin-bottom: 0px;'>
							<input type='tel' name='id' id='id' placeholder='Enter Player ID' class='text-input input-small input-search' onkeypress='return isNumberKey(event)' style='padding: 10px; margin: 0px; width: 100%; font-size:14px; text-transform:none;' onClick='this.select();' autocomplete=\"off\" />
							<input type='radio' name='redir' id='stratz' value='stratz' checked='checked' />
							<br><input type='submit' name='' value='Search' style='left: 0px; width: auto; font-size: 14px; font-weight: bold;' />
						</form>
					</div>
					
					<div class='button-overlay' style='".($config !== "config" ? "display:none;" : "")." width:100%; ".($fx == "0" ? "" : "animation: blurIn .3s linear 1 forwards")."'>
						";
					if ($config == "config") {profileChangeWidget($anchor, $current);}
			echo "
					</div>
				</div>
			";
	}
?>