<?
	$currentPage = "player-id";
	
	$myID = $_COOKIE["playerID"];
	if (!isset($myID) || $myID == "null") {
		$myIDlink = "";
	} else {
		$myIDlink = "<p><a class='link' href='?id=".$myID."'>My Player ID</a></p>";
	}
	
	$id = $_GET["id"];
	
	$redir = $_GET["redir"];
	
	$error = $_GET["error"];
	
	if (isset($id) && isset($redir)) {
		
		if ($redir == "dotabuff") {$redirect = "https://www.dotabuff.com/players/".$id;}
		elseif ($redir == "opendota") {$redirect = "https://www.opendota.com/players/".$id;}
		elseif ($redir == "stratz") {$redirect = "https://stratz.com/en-us/player/".$id;}
		
		header('Location: '.$redirect);
	}
	
	if (isset($id)) {
		
		include $_SERVER['DOCUMENT_ROOT'] . '/heroes/array.php';
	
		$apiPlayerData = json_decode(file_get_contents("https://api.opendota.com/api/players/$id"),true);
		
		if ($apiPlayerData["rank_tier"] == "") {
			$rankTier = "00";
		} else {
			$rankTier = $apiPlayerData["rank_tier"];
		}
		
		$apiWL = json_decode(file_get_contents("https://api.opendota.com/api/players/$id/wl"),true);
		$totalGames = $apiWL["win"] + $apiWL["lose"];
		$winRate = ($apiWL["win"] / $totalGames) * 100;
		$winRate = round($winRate, 0);
		
		$apiWordcloud = json_decode(file_get_contents("https://api.opendota.com/api/players/$id/wordcloud"),true);
		$wordcloud = $apiWordcloud["my_word_counts"];
		arsort($wordcloud);
		$wordcloud = array_keys($wordcloud);
		
		$apiRecentMatches = json_decode(file_get_contents("https://api.opendota.com/api/players/$id/recentMatches"),true);
		if ($apiRecentMatches[0]["radiant_win"] == 1) {$winSide = "radiant";}
		else {$winSide = "dire";}
		if ($apiRecentMatches[0]["player_slot"] < 128) {$playerSide = "radiant";}
		else {$playerSide = "dire";}
		
		if ($winSide == $playerSide) {
			$win_loss_1 = "<span style='font-weight: bold; font-size: 28px; color: #00ff00;'>WIN</span>";
		} else {
			$win_loss_1 = "<span style='font-weight: bold; font-size: 28px; color: #ff0000;'>LOSS</span>";
		}
		
		if ($apiRecentMatches[1]["radiant_win"] == 1) {$winSide = "radiant";}
		else {$winSide = "dire";}
		if ($apiRecentMatches[1]["player_slot"] < 128) {$playerSide = "radiant";}
		else {$playerSide = "dire";}
		
		if ($winSide == $playerSide) {
			$win_loss_2 = "<span style='font-weight: bold; font-size: 28px; color: #00ff00;'>WIN</span>";
		} else {
			$win_loss_2 = "<span style='font-weight: bold; font-size: 28px; color: #ff0000;'>LOSS</span>";
		}
		
		if ($apiRecentMatches[2]["radiant_win"] == 1) {$winSide = "radiant";}
		else {$winSide = "dire";}
		if ($apiRecentMatches[2]["player_slot"] < 128) {$playerSide = "radiant";}
		else {$playerSide = "dire";}
		
		if ($winSide == $playerSide) {
			$win_loss_3 = "<span style='font-weight: bold; font-size: 28px; color: #00ff00;'>WIN</span>";
		} else {
			$win_loss_3 = "<span style='font-weight: bold; font-size: 28px; color: #ff0000;'>LOSS</span>";
		}
		$duration_1_m = floor($apiRecentMatches[0]["duration"] / 60).":";
		$duration_1_s = $apiRecentMatches[0]["duration"] % 60;
		if (count($duration_1_s) == 1) {$duration_1_s = "0".$duration_1_s;}
		$duration_1 = $duration_1_m.$duration_1_s;
		$duration_2_m = floor($apiRecentMatches[1]["duration"] / 60).":";
		$duration_2_s = $apiRecentMatches[1]["duration"] % 60;
		if (count($duration_2_s) == 1) {$duration_2_s = "0".$duration_2_s;}
		$duration_2 = $duration_2_m.$duration_2_s;
		$duration_3_m = floor($apiRecentMatches[2]["duration"] / 60).":";
		$duration_3_s = $apiRecentMatches[2]["duration"] % 60;
		if (count($duration_3_s) == 1) {$duration_3_s = "0".$duration_3_s;}
		$duration_3 = $duration_3_m.$duration_3_s;
		
		foreach ($heroes as $key => $value) {if ($heroes[$key]["hero-id"] == $apiRecentMatches[0]["hero_id"]) {$hero1 = $key;}}
		foreach ($heroes as $key => $value) {if ($heroes[$key]["hero-id"] == $apiRecentMatches[1]["hero_id"]) {$hero2 = $key;}}
		foreach ($heroes as $key => $value) {if ($heroes[$key]["hero-id"] == $apiRecentMatches[2]["hero_id"]) {$hero3 = $key;}}
		
		$apiHeroes = json_decode(file_get_contents("https://api.opendota.com/api/players/$id/heroes"),true);
		
			$bestHeroes = [];
		
			foreach ($heroes as $key => $value) {
			
				$heroID = $heroes[$key]["hero-id"];
				
				foreach ($apiHeroes as $key2 => $value2) {if ($apiHeroes[$key2]["hero_id"] == $heroID) {$apiArrayPos = $key2;}}
			
				$rating = ($apiHeroes[$apiArrayPos]["win"] / $apiHeroes[$apiArrayPos]["games"]) * pow($apiHeroes[$apiArrayPos]["games"], 1/3);
				
				array_push($bestHeroes, ["id" => $key, "win" => $apiHeroes[$apiArrayPos]["win"], "games" => $apiHeroes[$apiArrayPos]["games"], "rating" => $rating]);
			}
			
			$ticker = 0;
			foreach ($bestHeroes as $key => $value) {
				if ($bestHeroes[$key]["rating"] >= $ticker) {
					$ticker = $bestHeroes[$key]["rating"];
					$bestHero1 = ["id" => $bestHeroes[$key]["id"], "win" => $bestHeroes[$key]["win"], "games" => $bestHeroes[$key]["games"]];
				}
			}
			$ticker = 0;
			foreach ($bestHeroes as $key => $value) {
				if ($bestHeroes[$key]["rating"] >= $ticker && $bestHeroes[$key]["id"] !== $bestHero1["id"]) {
					$ticker = $bestHeroes[$key]["rating"];
					$bestHero2 = ["id" => $bestHeroes[$key]["id"], "win" => $bestHeroes[$key]["win"], "games" => $bestHeroes[$key]["games"]];
				}
			}
			$ticker = 0;
			foreach ($bestHeroes as $key => $value) {
				if ($bestHeroes[$key]["rating"] >= $ticker && $bestHeroes[$key]["id"] !== $bestHero1["id"] && $bestHeroes[$key]["id"] !== $bestHero2["id"]) {
					$ticker = $bestHeroes[$key]["rating"];
					$bestHero3 = ["id" => $bestHeroes[$key]["id"], "win" => $bestHeroes[$key]["win"], "games" => $bestHeroes[$key]["games"]];
				}
			}
			
			$bestHeroWinrate1 = round(($bestHero1["win"] / $bestHero1["games"]) * 100, 1);
			$bestHeroWinrate2 = round(($bestHero2["win"] / $bestHero2["games"]) * 100, 1);
			$bestHeroWinrate3 = round(($bestHero3["win"] / $bestHero3["games"]) * 100, 1);
		
		
		$title = $apiPlayerData["profile"]["personaname"]." - Player ID - ";
	}
	else {$title = "Player ID - ";}
	
	if (isset($id) && !isset($apiPlayerData["profile"]["personaname"])) {
		$redirect = "/player-id/?error=1";
		header('Location: '.$redirect);
	}
	
	setcookie("page", $currentPage, time() + (10 * 365 * 24 * 60 * 60), "/");
	
	include $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/header.php';
	
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
	
	<div style='padding-top:22px; padding-bottom:20px; display:flex; flex-flow:row wrap; justify-content:center; align-items:center;'>
	
		<div style="background-image:url('<?= $apiPlayerData["profile"]["avatarfull"] ?>'); width: 120px; height: 120px; border: 2px solid #1476A5; background-size: cover; margin-right: 20px; border-radius:10px">
		</div>
	
		<div>
			<div class='id-name-tile'><?= $apiPlayerData["profile"]["personaname"] ?></div>
			
		
			<div class='id-block-links' style='margin-top:0px; justify-content: flex-start;'>
				
				<div style="margin-left: -7px;"><a href='/player-id'><div class='rotate' style='position:relative; top:1px;'><img src='/assets/img/icon-back.svg'></div> DIFFERENT ID</a></div>
				
			</div>
		</div>
		
		<div style="display: inline-block; position: relative; margin: 0px 7px; bottom: 8px; text-align: center; line-height: 60px;"><img src="/assets/img/ranks/<?= $rankTier ?>.png" style="height: 100px;" align="middle" alt="rank" ondragstart="return false" />
		</div>
	</div>
	
	<div style="display: flex; flex-flow: row wrap; justify-content: space-around; margin: 20px; padding: 20px; border: 2px solid rgba(255, 255, 255, .5); border-radius: 10px;">
		<div style="letter-spacing: 2px;"><span style="color: #FAE232; font-size:30px; font-weight:bold;">ID </span><?= $id ?></div>
	
		<div style="letter-spacing: 2px;"><span style="color: #FAE232; font-size:30px; font-weight:bold;"><?= number_format($totalGames) ?></span> total games</div>
	
		<div style="letter-spacing: 2px;"><span style="color: #FAE232; font-size:30px; font-weight:bold;"><?= $winRate ?>%</span> winrate</div>
	</div>
		
	<script>
		function myFunction() {
		  var copyText = document.getElementById('myInput');
		  copyText.select();
		  document.execCommand('copy');
		  document.getElementById('copier').innerHTML = "<a style='position:relative; top:2px;' onclick='myFunction()'><div>✓</div> COPIED!</a>"
		}
	</script>
	
	<div class='subcat-button-frame'>
		
		<div class='subcat-button'>
			<div style="width:100%">
				<h1 style="margin-bottom: 40px;">BEST HEROES</h1>
				
				<div style="width: 100%; text-align: center;">
					
					<a href='/heroes/?id=<?= $bestHero1["id"] ?>'>
					<div style="background: #313131; border: 2px solid gray; border-radius: 10px; padding: 10px; display:flex; flex-flow: row nowrap; justify-content: flex-start; align-items: center; margin:15px auto;">
						<div style="width: auto;">
							<div style="background-image:url('/assets/img/heroes/<?= str_replace(' ', '_', str_replace('’', '', $heroes[$bestHero1["id"]]["name"]))?>_icon.png'); background-position: <?= $heroes[$bestHero1["id"]]["bg-pos"] ?>%; width: 75px; height: 75px; border: 2px solid #1476A5; background-size: cover; margin-right: 20px; display: block; border-radius:10px">
							</div>
						</div>
						<div style="text-align: left; display: block; color: white; text-decoration: none;">
							<span style="font-weight: bold; font-size: 28px; color: #FAE232;"><?= $bestHeroWinrate1 ?>%</span> winrate<br>
							<span style="font-weight: bold; font-size: 18px; color: #FAE232;"><?= $bestHero1["games"] ?></span> games
						</div>
					</div>
					</a>
					
					<a href='/heroes/?id=<?= $bestHero2["id"] ?>'>
					<div style="background: #313131; border: 2px solid gray; border-radius: 10px; padding: 10px; display:flex; flex-flow: row nowrap; justify-content: flex-start; align-items: center; margin:15px auto;">
						<div style="width: auto;">
							<div style="background-image:url('/assets/img/heroes/<?= str_replace(' ', '_', str_replace('’', '', $heroes[$bestHero2["id"]]["name"]))?>_icon.png'); background-position: <?= $heroes[$bestHero2["id"]]["bg-pos"] ?>%; width: 75px; height: 75px; border: 2px solid #1476A5; background-size: cover; margin-right: 20px; display: block; border-radius:10px">
							</div>
						</div>
						<div style="text-align: left; display: block; color: white; text-decoration: none;">
							<span style="font-weight: bold; font-size: 28px; color: #FAE232;"><?= $bestHeroWinrate2 ?>%</span> winrate<br>
							<span style="font-weight: bold; font-size: 18px; color: #FAE232;"><?= $bestHero2["games"] ?></span> games
						</div>
					</div>
					</a>
					
					<a href='/heroes/?id=<?= $bestHero3["id"] ?>'>
					<div style="background: #313131; border: 2px solid gray; border-radius: 10px; padding: 10px; display:flex; flex-flow: row nowrap; justify-content: flex-start; align-items: center; margin:15px auto;">
						<div style="width: auto;">
							<div style="background-image:url('/assets/img/heroes/<?= str_replace(' ', '_', str_replace('’', '', $heroes[$bestHero3["id"]]["name"]))?>_icon.png'); background-position: <?= $heroes[$bestHero3["id"]]["bg-pos"] ?>%; width: 75px; height: 75px; border: 2px solid #1476A5; background-size: cover; margin-right: 20px; display: block; border-radius:10px">
							</div>
						</div>
						<div style="text-align: left; display: block; color: white; text-decoration: none;">
							<span style="font-weight: bold; font-size: 28px; color: #FAE232;"><?= $bestHeroWinrate3 ?>%</span> winrate<br>
							<span style="font-weight: bold; font-size: 18px; color: #FAE232;"><?= $bestHero3["games"] ?></span> games
						</div>
					</div>
					</a>
					
				</div>
				
				<div style="display: block; margin: auto; border-top: 1px solid white; margin-top: 50px; padding: 15px; padding-bottom: 0px; width:auto;">
					All Heroes: 
					<a href='https://dotabuff.com/players/<?= $id ?>/heroes' <? if($newTabs == 1) {echo("target='_blank'");} ?>><img src='/assets/img/logo-dotabuff.png' class='button' ondragstart='return false' align='center'></a>
					<a href='https://opendota.com/players/<?= $id ?>/heroes' <? if($newTabs == 1) {echo("target='_blank'");} ?>><img src='/assets/img/logo-opendota.png' class='button' ondragstart='return false' align='center'></a>
					<a href='https://stratz.com/en-us/player/<?= $id ?>/heroes' <? if($newTabs == 1) {echo("target='_blank'");} ?>><img src='/assets/img/logo-stratz.png' class='button' ondragstart='return false' align='center'></a>
				</div>
			</div>
		</div>
		
		<div class='subcat-button'>
			<div style="width:100%">
				<h1 style="margin-bottom: 40px;">RECENT MATCHES</h1>
				
					<div style="width: 100%; text-align: center;">
					
						<a href='/match-id/?id=<?= $apiRecentMatches[0]["match_id"] ?>'>
						<div style="background: #313131; border: 2px solid gray; border-radius: 10px; padding: 10px; display:flex; flex-flow: row nowrap; justify-content: flex-start; align-items: center; margin:15px auto;">
							<div style="width: auto;">
								<div style="background-image:url('/assets/img/heroes/<?= str_replace(' ', '_', str_replace('’', '', $heroes[$hero1]["name"]))?>_icon.png'); background-position: <?= $heroes[$hero1]["bg-pos"] ?>%; width: 75px; height: 75px; border: 2px solid #1476A5; background-size: cover; margin-right: 20px; display: block; border-radius:10px">
								</div>
							</div>
							<div style="text-align: left; display: block; color: white; text-decoration: none;">
								<?= $win_loss_1 ?> 
								<?= $apiRecentMatches[0]["kills"] ?><span style='color:gray;'>/</span><?= $apiRecentMatches[0]["deaths"] ?><span style='color:gray;'>/</span><?= $apiRecentMatches[0]["assists"] ?><br>
								<?= $duration_1 ?>
							</div>
						</div>
						</a>
						
						<a href='/match-id/?id=<?= $apiRecentMatches[1]["match_id"] ?>'>
						<div style="background: #313131; border: 2px solid gray; border-radius: 10px; padding: 10px; display:flex; flex-flow: row nowrap; justify-content: flex-start; align-items: center; margin:15px auto;">
							<div style="width: auto;">
								<div style="background-image:url('/assets/img/heroes/<?= str_replace(' ', '_', str_replace('’', '', $heroes[$hero2]["name"]))?>_icon.png'); background-position: <?= $heroes[$hero2]["bg-pos"] ?>%; width: 75px; height: 75px; border: 2px solid #1476A5; background-size: cover; margin-right: 20px; display: block; border-radius:10px">
								</div>
							</div>
							<div style="text-align: left; display: block; color: white; text-decoration: none;">
								<?= $win_loss_2 ?> 
								<?= $apiRecentMatches[1]["kills"] ?><span style='color:gray;'>/</span><?= $apiRecentMatches[1]["deaths"] ?><span style='color:gray;'>/</span><?= $apiRecentMatches[1]["assists"] ?><br>
								<?= $duration_2 ?>
							</div>
						</div>
						</a>
						
						<a href='/match-id/?id=<?= $apiRecentMatches[2]["match_id"] ?>'>
						<div style="background: #313131; border: 2px solid gray; border-radius: 10px; padding: 10px; display:flex; flex-flow: row nowrap; justify-content: flex-start; align-items: center; margin:15px auto;">
							<div style="width: auto;">
								<div style="background-image:url('/assets/img/heroes/<?= str_replace(' ', '_', str_replace('’', '', $heroes[$hero3]["name"]))?>_icon.png'); background-position: <?= $heroes[$hero3]["bg-pos"] ?>%; width: 75px; height: 75px; border: 2px solid #1476A5; background-size: cover; margin-right: 20px; display: block; border-radius:10px">
								</div>
							</div>
							<div style="text-align: left; display: block; color: white; text-decoration: none;">
								<?= $win_loss_3 ?> 
								<?= $apiRecentMatches[2]["kills"] ?><span style='color:gray;'>/</span><?= $apiRecentMatches[2]["deaths"] ?><span style='color:gray;'>/</span><?= $apiRecentMatches[2]["assists"] ?><br>
								<?= $duration_3 ?>
							</div>
						</div>
						</a>
						
					</div>
				
				<div style="display: block; margin: auto; border-top: 1px solid white; margin-top: 50px; padding: 15px; padding-bottom: 0px; width: auto;">
					All Matches: 
					<a href='https://dotabuff.com/players/<?= $id ?>/matches' <? if($newTabs == 1) {echo("target='_blank'");} ?>><img src='/assets/img/logo-dotabuff.png' class='button' ondragstart='return false' align='center'></a>
					<a href='https://opendota.com/players/<?= $id ?>/matches' <? if($newTabs == 1) {echo("target='_blank'");} ?>><img src='/assets/img/logo-opendota.png' class='button' ondragstart='return false' align='center'></a>
				</div>
			</div>
		</div>
		
	</div>
		
	<!--<h1 style="text-align: center;">PROFILES</h1>-->
	<div class='profile-button-frame'>
	
		<a href='https://dotabuff.com/players/<?= $id ?>' class='profile-button dotabuff' <? if($newTabs == 1) {echo("target='_blank'");} ?>>
			<div><img src='/assets/img/logo-dotabuff.png' ondragstart='return false' align='center'> DOTABUFF</div>
		</a>
		
		<a href='https://opendota.com/players/<?= $id ?>' class='profile-button opendota' <? if($newTabs == 1) {echo("target='_blank'");} ?>>
			<div><img src='/assets/img/logo-opendota.png' ondragstart='return false' align='center'> OPENDOTA</div>
		</a>
		
		<a href='https://stratz.com/en-us/player/<?= $id ?>' class='profile-button stratz' <? if($newTabs == 1) {echo("target='_blank'");} ?>>
			<div><img src='/assets/img/logo-stratz.png' ondragstart='return false' align='center'> STRATZ</div>
		</a>
		
		<a href='<?= $apiPlayerData["profile"]["profileurl"] ?>' class='profile-button steam' <? if($newTabs == 1) {echo("target='_blank'");} ?>>
			<div><img src='/assets/img/logo-steam.png' ondragstart='return false' align='center'> STEAM</div>
		</a>
		
	</div>
	
	<? if (isset($apiPlayerData["tracked_until"])) : ?>
	<div class='subcat-button-frame'>
			
		<div class='subcat-button'>
			<div style="width: 100%;">
				<h1 style="margin-bottom: 40px;">MOST COMMON ALL-CHAT</h1>
				
				<div style="display: flex; flex-flow: row wrap; justify-content: space-around; width: auto;">
				<?
				
					for ($i = 0; $i < 10; $i++) {
						echo("<div style='width:auto; display:block; background:white; color:black; font-size:20px; font-weight:bold; padding:10px; margin:10px'>$wordcloud[$i]</div>");
					}
				
				?>
				</div>
				
				<div style="display: block; margin: auto; border-top: 1px solid white; margin-top: 50px; padding: 15px; padding-bottom: 0px; width: auto;">
					Full Wordcloud: <a href='https://opendota.com/players/<?= $id ?>/wordcloud' <? if($newTabs == 1) {echo("target='_blank'");} ?>><img src='/assets/img/logo-opendota.png' class='button' ondragstart='return false' align='center'></a>
				</div>
			</div>
		</div>
		
	</div>
	<? endif; ?>

<? else: ?>
	
	<div style='text-align: center; padding-top: 100px;'>
		
		<? 
			if ($error == 1) {
				echo "<div style='color: white; padding: 10px; letter-spacing: 1px; font-weight: bold; background: red; border-radius: 5px; display: inline-block; margin: auto;'>The ID you entered is either invalid or private.</div>";
			}
		?>
		
		<form method='get' style="margin-bottom: 0px; margin-top: 10px;">
			<input type='tel' name='id' id='id' placeholder='Enter Player ID...' class='text-input input-small input-search' onkeypress='return isNumberKey(event)' onClick='this.select();' autocomplete="off" autofocus style="padding: 10px; margin: 20px; width: 600px; min-width: 300px;" />
			<br><input type='submit' name='' value='Go' style='left: 0px; width: auto; font-size: 20px; font-weight: bold;' />
		</form>
		
		<?= $myIDlink ?>
	</div>
			
	<script type='text/javascript'>	
		// Install input filters.
		setInputFilter(document.getElementById("id"), function(value) {
		  return /^\d*$/.test(value); });
	</script>
	
<? endif; ?>

<? include $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/footer.php'; ?>