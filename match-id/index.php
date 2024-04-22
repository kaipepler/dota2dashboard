<?
	$currentPage = "match-id";
	
	$id = $_GET["id"];
	
	$error = $_GET["error"];
	
	$redir = $_GET["redir"];
	
	if (isset($id) && isset($redir)) {
		
		if ($redir == "dotabuff") {
			
			$redirect = "https://www.dotabuff.com/matches/".$id;
			header('Location: '.$redirect);
			
		} elseif ($redir == "opendota") {
		
			$redirect = "https://www.opendota.com/matches/".$id;
			header('Location: '.$redirect);
		
		} elseif ($redir == "stratz") {
		
			$redirect = "https://stratz.com/en-us/match/".$id;
			header('Location: '.$redirect);
		
		}
	}
	
	if (isset($id)) {$title = $id." - Match ID - "; include $_SERVER['DOCUMENT_ROOT'] . '/heroes/array.php';}
	else {$title = "Match ID - ";}
	
	setcookie("page", $currentPage, time() + (10 * 365 * 24 * 60 * 60), "/");
	
	include $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/header.php';
	
	if (!file_exists("cache/$id.json")) {
		
		$apiMatchData = json_decode(file_get_contents("https://api.stratz.com/api/v1/match/$id/breakdown"),true);
		
		for ($i = 0; $i < 10; $i++) {
			unset($apiMatchData["players"][$i]["abilities"]);
			unset($apiMatchData["players"][$i]["heroAverage"]);
			unset($apiMatchData["players"][$i]["matchPlayerStats"]);
		}
		unset($apiMatchData["pickBans"]);
		unset($apiMatchData["matchStats"]);
		
		$writeCache = fopen("cache/$id.json", "w") or die("Error: Unable to open file.");
		$cacheWrite = json_encode($apiMatchData);
		fwrite($writeCache, $cacheWrite);
		fclose($writeCache);
		
	} else {
		$apiMatchData = json_decode(file_get_contents("cache/$id.json"),true);
	}
	
	
	
	$duration_m = floor($apiMatchData["duration"] / 60).":";
	$duration_s = $apiMatchData["duration"] % 60;
	if (count($duration_s) == 1) {$duration_s = "0".$duration_s;}
	$duration = $duration_m.$duration_s;
	
	$regions = [
		"1" => "US West",
		"2" => "US East",
		"3" => "Luxembourg",
		"5" => "Singapore",
		"6" => "Dubai",
		"7" => "Australia",
		"8" => "Stockholm",
		"9" => "Austria",
		"10" => "Brazil",
		"11" => "South Africa",
		"12" => "China TC Shanghai",
		"13" => "China UC",
		"14" => "Chile",
		"15" => "Peru",
		"16" => "India",
		"17" => "China TC Guangdong",
		"18" => "China TC Zhejiang",
		"19" => "Japan",
		"20" => "China TC Wuhan",
		"25" => "China UC 2",
	];
	
	$region = $regions[$apiMatchData["regionId"]];
	
	$lobbies = [
		"0" => "Normal",
		"1" => "Practice",
		"2" => "Tournament",
		"3" => "Co-Op Bots",
		"4" => "Co-Op Bots",
		"5" => "Team Ranked (Legacy)",
		"6" => "Solo Ranked (Legacy)",
		"7" => "Ranked",
		"8" => "1v1 Mid",
		"9" => "Battle Cup",
	];
	
	$lobbyType = $lobbies[$apiMatchData["lobbyType"]];
	
	$ranks = [
		"00" => "Uncalibrated",
		"11" => "Herald [I]",
		"12" => "Herald [II]",
		"13" => "Herald [III]",
		"14" => "Herald [IV]",
		"15" => "Herald [V]",
		"16" => "Herald [VI]",
		"17" => "Herald [VII]",
		"21" => "Guardian [I]",
		"22" => "Guardian [II]",
		"23" => "Guardian [III]",
		"24" => "Guardian [IV]",
		"25" => "Guardian [V]",
		"26" => "Guardian [VI]",
		"27" => "Guardian [VII]",
		"31" => "Crusader [I]",
		"32" => "Crusader [II]",
		"33" => "Crusader [III]",
		"34" => "Crusader [IV]",
		"35" => "Crusader [V]",
		"36" => "Crusader [VI]",
		"37" => "Crusader [VII]",
		"41" => "Archon [I]",
		"42" => "Archon [II]",
		"43" => "Archon [III]",
		"44" => "Archon [IV]",
		"45" => "Archon [V]",
		"46" => "Archon [VI]",
		"47" => "Archon [VII]",
		"51" => "Legend [I]",
		"52" => "Legend [II]",
		"53" => "Legend [III]",
		"54" => "Legend [IV]",
		"55" => "Legend [V]",
		"56" => "Legend [VI]",
		"57" => "Legend [VII]",
		"61" => "Ancient [I]",
		"62" => "Ancient [II]",
		"63" => "Ancient [III]",
		"64" => "Ancient [IV]",
		"65" => "Ancient [V]",
		"66" => "Ancient [VI]",
		"67" => "Ancient [VII]",
		"71" => "Divine [I]",
		"72" => "Divine [II]",
		"73" => "Divine [III]",
		"74" => "Divine [IV]",
		"75" => "Divine [V]",
		"76" => "Divine [VI]",
		"77" => "Divine [VII]",
		"80" => "Immortal",
	];
	
	$datePlayed = gmdate("M d, Y", $apiMatchData["endDate"]);
	
	for ($i = 0; $i < 10; $i++) {
	
		foreach ($heroes as $key => $value) {if ($heroes[$key]["hero-id"] == $apiMatchData["players"][$i]["hero"]) {${"player".$i."Hero"} = $key;}}
	
		${"player".$i."ID"} = $apiMatchData["players"][$i]["steamId"];
	
		if (strlen($apiMatchData["players"][$i]["name"]) > 8) {
			${"player".$i."Name"} = substr($apiMatchData["players"][$i]["name"], 0, 7)."&#8230;";
		} else {
			${"player".$i."Name"} = $apiMatchData["players"][$i]["name"];
		}
		
		if (isset($apiMatchData["players"][$i]["rank"])) {
			${"player".$i."Rank"} = $ranks[$apiMatchData["players"][$i]["rank"]];
		} else {
			${"player".$i."Rank"} = "Uncalibrated";
		}
		
		${"player".$i."KDA"} = $apiMatchData["players"][$i]["numKills"]." <span style='font-weight:normal; color:#1476A5'>/</span> ".$apiMatchData["players"][$i]["numDeaths"]." <span style='font-weight:normal; color:#1476A5'>/</span> ".$apiMatchData["players"][$i]["numAssists"];
		
	}
	
?>
	
	<script type="text/javascript">
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
	</script>
	
<? if (isset($id)): ?>
	
	<div style='text-align:center'>
		<input type='text' value='<?= $id ?>' id='myInput' style='font-size:5px; opacity:0; pointer-events:none; text-align:center'>
	</div>
	
	<div class='id-block' style="padding-bottom: 0px;">
		<div>
			<div class='id-block-label'>MATCH ID</div>
			
			<?
				$stylized_id = str_split($id);
	
				foreach ($stylized_id as $key => $value) {
					echo("<div class='id-number-tile'>".$stylized_id[$key]."</div>");
				}
			?>
	
			<div class='id-block-links'>
				<div><a href='/match-id'><div class='rotate' style='position:relative; top:1px;'><img src='/assets/img/icon-back.svg'></div> DIFFERENT ID</a></div>
				<div id='copier' style='position:relative; top:-3px'><a onclick='myFunction()'><div><img style='height:16px; position:relative; top:3px' src='/assets/img/icon-clipboard.svg' align='bottom'></div> COPY ID</a></div>
			</div>
		</div>
	</div>
	
	<script>
		function myFunction() {
			var copyText = document.getElementById('myInput');
			copyText.select();
			document.execCommand('copy');
			document.getElementById('copier').innerHTML = "<a style='position:relative; top:2px;' onclick='myFunction()'><div>✓</div> COPIED!</a>"
			}
	</script>
	
	<div style="<? if (isset($id) && !isset($apiMatchData)) {echo("display:none;");} ?>">
	
	<div style="display: flex; flex-flow: row wrap; justify-content: space-around; align-items: center; margin-bottom: 30px;">
		<div style='width:400px; text-align:center; <? if($apiMatchData["didRadiantWin"]){echo "border-bottom: 4px solid #00FF00;";} ?>'>
			<h1 style="margin: 20px; color: #00FF00; font-size:40px">
				Radiant <? if($apiMatchData["didRadiantWin"] == 1){echo "Victory";} ?>
			</h1>
		</div>
		<div style="font-size: 50px;">
			<span style='color:#00FF00; font-weight:bold'><?= $apiMatchData["radiantKills"] ?></span> : <span style='color:#FF0000; font-weight:bold'><?= $apiMatchData["direKills"] ?></span>
		</div>
		<div style='width:400px; text-align:center; <? if(!$apiMatchData["didRadiantWin"]){echo "border-bottom: 4px solid #FF0000;";} ?>'>
			<h1 style="margin: 20px; color: #FF0000; font-size:40px">
				Dire <? if(!$apiMatchData["didRadiantWin"]){echo "Victory";} ?>
			</h1>
		</div>
	</div>
	
	<div style="display: flex; flex-flow: row wrap; justify-content: space-around; align-items: center; margin-bottom: 25px;">
		<div style="display: flex; flex-flow: row wrap; justify-content: space-around; align-items: flex-start;">
			
			<div style="text-align: center; margin: 0px 10px; width:95px;">
			<div class='button-collection button-shape-rrect' style="margin: 0px; width:auto;">
				<a href="/heroes/?id=<?= $player0Hero ?>">
					<div style="background-image:url('/assets/img/heroes/<?= str_replace(' ', '_', str_replace('’', '', $heroes[$player0Hero]["name"]))?>_icon.png'); background-position: <?= $heroes[$player0Hero]["bg-pos"] ?>%;">
						<span><?= $heroes[$player0Hero]["name"] ?></span>
					</div>
				</a>
			</div>
			<div style="margin-top: 10px; font-weight: bold; font-size: 17px;"><a href='/player-id/?id=<?= $player0ID ?>' class="link" style="color: white;"><?= $player0Name ?></a></div>
			<div style="margin-top: 5px; font-size: 12px;"><?= $player0Rank ?></div>
			<div style="margin-top: 8px; font-size: 15px; font-weight:bold;"><?= $player0KDA ?></div>
			</div>
			
			<div style="text-align: center; margin: 0px 10px; width:95px;">
			<div class='button-collection button-shape-rrect' style="margin: 0px; width:auto;">
				<a href="/heroes/?id=<?= $player1Hero ?>">
					<div style="background-image:url('/assets/img/heroes/<?= str_replace(' ', '_', str_replace('’', '', $heroes[$player1Hero]["name"]))?>_icon.png'); background-position: <?= $heroes[$player1Hero]["bg-pos"] ?>%;">
						<span><?= $heroes[$player1Hero]["name"] ?></span>
					</div>
				</a>
			</div>
			<div style="margin-top: 10px; font-weight: bold; font-size: 17px;"><a href='/player-id/?id=<?= $player1ID ?>' class="link" style="color: white;"><?= $player1Name ?></a></div>
			<div style="margin-top: 5px; font-size: 12px;"><?= $player1Rank ?></div>
			<div style="margin-top: 8px; font-size: 15px; font-weight:bold;"><?= $player1KDA ?></div>
			</div>
			
			<div style="text-align: center; margin: 0px 10px; width:95px;">
			<div class='button-collection button-shape-rrect' style="margin: 0px; width:auto;">
				<a href="/heroes/?id=<?= $player2Hero ?>">
					<div style="background-image:url('/assets/img/heroes/<?= str_replace(' ', '_', str_replace('’', '', $heroes[$player2Hero]["name"]))?>_icon.png'); background-position: <?= $heroes[$player2Hero]["bg-pos"] ?>%;">
						<span><?= $heroes[$player2Hero]["name"] ?></span>
					</div>
				</a>
			</div>
			<div style="margin-top: 10px; font-weight: bold; font-size: 17px;"><a href='/player-id/?id=<?= $player2ID ?>' class="link" style="color: white;"><?= $player2Name ?></a></div>
			<div style="margin-top: 5px; font-size: 12px;"><?= $player2Rank ?></div>
			<div style="margin-top: 8px; font-size: 15px; font-weight:bold;"><?= $player2KDA ?></div>
			</div>
			
			<div style="text-align: center; margin: 0px 10px; width:95px;">
			<div class='button-collection button-shape-rrect' style="margin: 0px; width:auto;">
				<a href="/heroes/?id=<?= $player3Hero ?>">
					<div style="background-image:url('/assets/img/heroes/<?= str_replace(' ', '_', str_replace('’', '', $heroes[$player3Hero]["name"]))?>_icon.png'); background-position: <?= $heroes[$player3Hero]["bg-pos"] ?>%;">
						<span><?= $heroes[$player3Hero]["name"] ?></span>
					</div>
				</a>
			</div>
			<div style="margin-top: 10px; font-weight: bold; font-size: 17px;"><a href='/player-id/?id=<?= $player3ID ?>' class="link" style="color: white;"><?= $player3Name ?></a></div>
			<div style="margin-top: 5px; font-size: 12px;"><?= $player3Rank ?></div>
			<div style="margin-top: 8px; font-size: 15px; font-weight:bold;"><?= $player3KDA ?></div>
			</div>
			
			<div style="text-align: center; margin: 0px 10px; width:95px;">
			<div class='button-collection button-shape-rrect' style="margin: 0px; width:auto;">
				<a href="/heroes/?id=<?= $player4Hero ?>">
					<div style="background-image:url('/assets/img/heroes/<?= str_replace(' ', '_', str_replace('’', '', $heroes[$player4Hero]["name"]))?>_icon.png'); background-position: <?= $heroes[$player4Hero]["bg-pos"] ?>%;">
						<span><?= $heroes[$player4Hero]["name"] ?></span>
					</div>
				</a>
			</div>
			<div style="margin-top: 10px; font-weight: bold; font-size: 17px;"><a href='/player-id/?id=<?= $player4ID ?>' class="link" style="color: white;"><?= $player4Name ?></a></div>
			<div style="margin-top: 5px; font-size: 12px;"><?= $player4Rank ?></div>
			<div style="margin-top: 8px; font-size: 15px; font-weight:bold;"><?= $player4KDA ?></div>
			</div>
			
		</div>
		
		<div style="font-weight: bold; font-size: 40px; line-height: 100px; height: 100px; color: #1476A5;">vs.</div>
		
		<div style="display: flex; flex-flow: row wrap; justify-content: space-around; align-items: flex-start;">
			
			<div style="text-align: center; margin: 0px 10px; width:95px;">
			<div class='button-collection button-shape-rrect' style="margin: 0px; width:auto;">
				<a href="/heroes/?id=<?= $player5Hero ?>">
					<div style="background-image:url('/assets/img/heroes/<?= str_replace(' ', '_', str_replace('’', '', $heroes[$player5Hero]["name"]))?>_icon.png'); background-position: <?= $heroes[$player5Hero]["bg-pos"] ?>%;">
						<span><?= $heroes[$player5Hero]["name"] ?></span>
					</div>
				</a>
			</div>
			<div style="margin-top: 10px; font-weight: bold; font-size: 17px;"><a href='/player-id/?id=<?= $player5ID ?>' class="link" style="color: white;"><?= $player5Name ?></a></div>
			<div style="margin-top: 5px; font-size: 12px;"><?= $player5Rank ?></div>
			<div style="margin-top: 8px; font-size: 15px; font-weight:bold;"><?= $player5KDA ?></div>
			</div>
			
			<div style="text-align: center; margin: 0px 10px; width:95px;">
			<div class='button-collection button-shape-rrect' style="margin: 0px; width:auto;">
				<a href="/heroes/?id=<?= $player6Hero ?>">
					<div style="background-image:url('/assets/img/heroes/<?= str_replace(' ', '_', str_replace('’', '', $heroes[$player6Hero]["name"]))?>_icon.png'); background-position: <?= $heroes[$player6Hero]["bg-pos"] ?>%;">
						<span><?= $heroes[$player6Hero]["name"] ?></span>
					</div>
				</a>
			</div>
			<div style="margin-top: 10px; font-weight: bold; font-size: 17px;"><a href='/player-id/?id=<?= $player6ID ?>' class="link" style="color: white;"><?= $player6Name ?></a></div>
			<div style="margin-top: 5px; font-size: 12px;"><?= $player6Rank ?></div>
			<div style="margin-top: 8px; font-size: 15px; font-weight:bold;"><?= $player6KDA ?></div>
			</div>
			
			<div style="text-align: center; margin: 0px 10px; width:95px;">
			<div class='button-collection button-shape-rrect' style="margin: 0px; width:auto;">
				<a href="/heroes/?id=<?= $player7Hero ?>">
					<div style="background-image:url('/assets/img/heroes/<?= str_replace(' ', '_', str_replace('’', '', $heroes[$player7Hero]["name"]))?>_icon.png'); background-position: <?= $heroes[$player7Hero]["bg-pos"] ?>%;">
						<span><?= $heroes[$player7Hero]["name"] ?></span>
					</div>
				</a>
			</div>
			<div style="margin-top: 10px; font-weight: bold; font-size: 17px;"><a href='/player-id/?id=<?= $player7ID ?>' class="link" style="color: white;"><?= $player7Name ?></a></div>
			<div style="margin-top: 5px; font-size: 12px;"><?= $player7Rank ?></div>
			<div style="margin-top: 8px; font-size: 15px; font-weight:bold;"><?= $player7KDA ?></div>
			</div>
			
			<div style="text-align: center; margin: 0px 10px; width:95px;">
			<div class='button-collection button-shape-rrect' style="margin: 0px; width:auto;">
				<a href="/heroes/?id=<?= $player8Hero ?>">
					<div style="background-image:url('/assets/img/heroes/<?= str_replace(' ', '_', str_replace('’', '', $heroes[$player8Hero]["name"]))?>_icon.png'); background-position: <?= $heroes[$player8Hero]["bg-pos"] ?>%;">
						<span><?= $heroes[$player8Hero]["name"] ?></span>
					</div>
				</a>
			</div>
			<div style="margin-top: 10px; font-weight: bold; font-size: 17px;"><a href='/player-id/?id=<?= $player8ID ?>' class="link" style="color: white;"><?= $player8Name ?></a></div>
			<div style="margin-top: 5px; font-size: 12px;"><?= $player8Rank ?></div>
			<div style="margin-top: 8px; font-size: 15px; font-weight:bold;"><?= $player8KDA ?></div>
			</div>
			
			<div style="text-align: center; margin: 0px 10px; width:95px;">
			<div class='button-collection button-shape-rrect' style="margin: 0px; width:auto;">
				<a href="/heroes/?id=<?= $player9Hero ?>">
					<div style="background-image:url('/assets/img/heroes/<?= str_replace(' ', '_', str_replace('’', '', $heroes[$player9Hero]["name"]))?>_icon.png'); background-position: <?= $heroes[$player9Hero]["bg-pos"] ?>%;">
						<span><?= $heroes[$player9Hero]["name"] ?></span>
					</div>
				</a>
			</div>
			<div style="margin-top: 10px; font-weight: bold; font-size: 17px;"><a href='/player-id/?id=<?= $player9ID ?>' class="link" style="color: white;"><?= $player9Name ?></a></div>
			<div style="margin-top: 5px; font-size: 12px;"><?= $player9Rank ?></div>
			<div style="margin-top: 8px; font-size: 15px; font-weight:bold;"><?= $player9KDA ?></div>
			</div>
			
		</div>
		
	</div>
	
	<div style="display: flex; flex-flow: row wrap; justify-content: space-around; margin: 60px 20px 20px 20px; padding: 20px; border: 2px solid rgba(255, 255, 255, .5); border-radius: 10px;">
		<div style="letter-spacing: 2px;">DURATION: <span style="color: #FAE232; font-size:25px; font-weight:bold;"><?= $duration ?></span></div>
	
		<div style="letter-spacing: 2px;">DATE: <span style="color: #FAE232; font-size:25px; font-weight:bold;"><?= $datePlayed ?></span></div>
		
		<div style="letter-spacing: 2px;">LOBBY: <span style="color: #FAE232; font-size:25px; font-weight:bold;"><?= $lobbyType ?></span></div>
	
		<div style="letter-spacing: 2px;">REGION: <span style="color: #FAE232; font-size:25px; font-weight:bold;"><?= $region ?></span></div>
	</div>
	
	</div>
		
	<div class='profile-button-frame'>
	
		<a href='https://www.dotabuff.com/matches/<?= $id ?>' class='profile-button dotabuff' <? if($newTabs == 1) {echo("target='_blank'");} ?>> 
			<div><img src='/assets/img/logo-dotabuff.png' align='center'> DOTABUFF</div>
		</a>
		
		<a href='https://www.opendota.com/matches/<?= $id ?>' class='profile-button opendota' <? if($newTabs == 1) {echo("target='_blank'");} ?>>
			<div><img src='/assets/img/logo-opendota.png' align='center'> OPENDOTA</div>
		</a>
		
		<a href='https://stratz.com/en-us/match/<?= $id ?>' class='profile-button stratz' <? if($newTabs == 1) {echo("target='_blank'");} ?>>
			<div><img src='/assets/img/logo-stratz.png' align='center'> STRATZ</div>
		</a>
		
	</div>
	
	<div class='subcat-button-frame'>
	
		<div class='subcat-button'>
			<div>
				<div class='sub-cat-button-icon'><img src='/assets/img/icon-builds.svg' style='height:75px; margin:10px' ondragstart='return false'></div>
				<div class='subcat-button-label'>BUILDS</div>
				<div class='subcat-button-options'>
					<a href='https://dotabuff.com/matches/<?= $id ?>/builds' <? if($newTabs == 1) {echo("target='_blank'");} ?>><img src='/assets/img/logo-dotabuff.png' class='button' ondragstart='return false' align='center'></a>
					
					<a href='https://opendota.com/matches/<?= $id ?>/purchases' <? if($newTabs == 1) {echo("target='_blank'");} ?>><img src='/assets/img/logo-opendota.png' class='button' ondragstart='return false' align='center'></a>
				</div>
			</div>
		</div>
			
		<div class='subcat-button'>
			<div>
				<div class='sub-cat-button-icon'><img src='/assets/img/icon-chat.svg' style='height:75px; margin:10px' ondragstart='return false'></div>
				<div class='subcat-button-label'>CHAT</div>
				<div class='subcat-button-options'>
					<a href='https://dotabuff.com/matches/<?= $id ?>/chat' <? if($newTabs == 1) {echo("target='_blank'");} ?>><img src='/assets/img/logo-dotabuff.png' class='button' ondragstart='return false' align='center'></a>
					<a href='https://opendota.com/matches/<?= $id ?>/chat' <? if($newTabs == 1) {echo("target='_blank'");} ?>><img src='/assets/img/logo-opendota.png' class='button' ondragstart='return false' align='center'></a>
				</div>
			</div>
		</div>
			
		<div class='subcat-button'>
			<div>
				<div class='sub-cat-button-icon'><img src='/assets/img/icon-story.svg' style='height:75px; margin:10px' ondragstart='return false'></div>
				<div class='subcat-button-label'>STORY</div>
				<div class='subcat-button-options'>
					<a href='https://opendota.com/matches/<?= $id ?>/story' <? if($newTabs == 1) {echo("target='_blank'");} ?>><img src='/assets/img/logo-opendota.png' class='button' ondragstart='return false' align='center'></a>
				</div>
			</div>
		</div>
	</div>
	
<? else: ?>

	<div style='text-align: center; padding-top: 100px;'>
		
		<? 
			if ($error == 1) {
				echo "<div style='color: white; padding: 10px; letter-spacing: 1px; font-weight: bold; background: red; border-radius: 5px; display: inline-block; margin: auto;'>Invalid ID</div>";
			}
		?>
		
		<form method='get' style="margin-bottom: 0px; margin-top: 10px;">
			<input type='tel' name='id' id='id' placeholder='Enter Match ID...' class='text-input input-small input-search' onkeypress='return isNumberKey(event)' onClick='this.select();' autocomplete="off" autofocus style="padding: 10px; margin: 20px; width: 600px; min-width: 300px;" />
			<br><input type='submit' name='' value='Go' style='left: 0px; width: auto; font-size: 20px; font-weight: bold;' />
		</form>
	</div>
			
	<script type='text/javascript'>	
		// Install input filters.
		setInputFilter(document.getElementById(\"id\"), function(value) {
		  return /^\d*$/.test(value); });
	</script>
	
<? endif; ?>

<? include $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/footer.php'; ?>