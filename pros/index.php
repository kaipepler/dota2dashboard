<?
	$currentPage = "pros";
	
	$id = $_GET["id"];
	
	include $_SERVER['DOCUMENT_ROOT'] . '/pros/array.php';
	
	if (isset($id)) {$title = $pros[$id]['alias']." - Pros - ";}
	else {$title = "Pros - ";}
	
	setcookie("page", $currentPage, time() + (10 * 365 * 24 * 60 * 60), "/");
	
	include $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/header.php';
	
?>
	
<? if (isset($id)): ?>
	<div style='padding-top:22px; padding-bottom:20px; display:flex; flex-flow:row wrap; justify-content:center; align-items:center;'>
	
		<div style="text-align: center;">
			<div class='id-name-tile'><?= $pros[$id]['alias'] ?></div>
			
			<div class='id-block-links' style='margin-top:10px;'>
				<div style='margin-right: 20px;'><a href='/pros'><div class='rotate' style='position:relative; top:1px;'><img src='/assets/img/icon-back.svg'></div> BACK</a></div>
				<div><img src='/assets/img/countries/<?= $pros[$id]["country"]?>_hd.png' style="height: 12px; position: relative; bottom: -1px;" ondragstart='return false'> <?= $pros[$id]['name'] ?></div>
			</div>
		</div>
	</div>
	
	
	
	<div class='profile-button-frame'>
		
		<a href='http://www.dota2protracker.com/player/<?= $pros[$id]['links']['dota2protracker'] ?>' class='profile-button dota2protracker' <? if($newTabs == 1) {echo("target='_blank'");} ?>>
			<div><img src='/assets/img/logo-dota2protracker.png' ondragstart='return false' align='center'> RECENT PUBS</div>
		</a>
		
	</div>
	
	<div class='subcat-button-frame' style="<? if(!isset($pros[$id]['links']['alt-accts'])){echo "display:none;";} ?>">
	
		<div class='subcat-button' style="margin-top:-30px; border-top: none; border-top-left-radius: 0px; border-top-right-radius: 0px;">
			<div>
				<div class='subcat-button-label'>PUBS ON ALT ACCOUNTS</div>
				<div>
					<?
						if($newTabs == 1) {
							
							foreach ($pros[$id]['links']['alt-accts'] as $key) {
								echo("<a href='http://www.dota2protracker.com/player/".$key."' style='color:white; text-decoration:none;' target='_blank'><img src='/assets/img/logo-dota2protracker.png' class='button' ondragstart='return false' align='center'></a>");
							}
							
						} else {
						
							foreach ($pros[$id]['links']['alt-accts'] as $key) {
								echo("<a href='http://www.dota2protracker.com/player/".$key."' style='color:white; text-decoration:none;'><img src='/assets/img/logo-dota2protracker.png' class='button' ondragstart='return false' align='center'></a>");
							}
						
						}
					?>
				</div>
			</div>
		</div>
		
	</div>
	
	<div class='profile-button-frame'>
		
		<a href='https://liquipedia.net/dota2/<?= $pros[$id]['links']['liquipedia'] ?>' class='profile-button liquipedia' style="<? if($pros[$id]['links']['liquipedia'] === 0){echo "display:none;";} ?>" <? if($newTabs == 1) {echo("target='_blank'");} ?>>
			<div><img src='/assets/img/logo-liquipedia.png' ondragstart='return false' align='center'> LIQUIPEDIA</div>
		</a>
		
		<a href='https://www.youtube.com/user/Dota2ProChannels/search?query=<?= $pros[$id]['links']['dota2pro'] ?>' class='profile-button dota2pro' style="<? if($pros[$id]['links']['dota2pro'] === 0){echo "display:none;";} ?>" <? if($newTabs == 1) {echo("target='_blank'");} ?>>
			<div><img src='/assets/img/logo-dota2pro.png' style='border: 2px solid #F00' ondragstart='return false' align='center'> VODs</div>
		</a>
		
	</div>
	
	<div class='profile-button-frame'>
	
		<a href='https://www.dotabuff.com/players/<?= $pros[$id]['links']['player-id'] ?>' class='profile-button dotabuff' <? if($newTabs == 1) {echo("target='_blank'");} ?>>
			<div><img src='/assets/img/logo-dotabuff.png' ondragstart='return false' align='center'> DOTABUFF</div>
		</a>
		
		<a href='https://www.opendota.com/players/<?= $pros[$id]['links']['player-id'] ?>' class='profile-button opendota' <? if($newTabs == 1) {echo("target='_blank'");} ?>>
			<div><img src='/assets/img/logo-opendota.png' ondragstart='return false' align='center'> OPENDOTA</div>
		</a>
		
		<a href='https://stratz.com/en-us/player/<?= $pros[$id]['links']['player-id'] ?>' class='profile-button stratz' <? if($newTabs == 1) {echo("target='_blank'");} ?>>
			<div><img src='/assets/img/logo-stratz.png' ondragstart='return false' align='center'> STRATZ</div>
		</a>
		
	</div>

<? else: ?>
		
	<div style="text-align: center; padding: 20px;">
		<input type="text" id="search-headers" name="search-headers" placeholder="Search Pro Players..." class="text-input input-small" data-list=".button-collection-wide"  onClick='this.select();' autocomplete="off" style='letter-spacing: 2px;' autofocus />
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/Ar_hd.png' align='middle' class="flag" ondragstart='return false'> 
				ARGENTINA
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "Ar") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
			
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left' style="margin-top: 50px;">
			<span class='origin'>
				<img src='/assets/img/countries/Au_hd.png' align='middle' class="flag" ondragstart='return false'> 
				AUSTRALIA
			</span>
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "Au") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/By_hd.png' align='middle' class="flag" ondragstart='return false'> 
				BELARUS
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "By") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/Br_hd.png' align='middle' class="flag" ondragstart='return false'> 
				BRAZIL
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "Br") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/Bg_hd.png' align='middle' class="flag" ondragstart='return false'> 
				BULGARIA
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "Bg") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/Ca_hd.png' align='middle' class="flag" ondragstart='return false'> 
				CANADA
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "Ca") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/Cn_hd.png' align='middle' class="flag" ondragstart='return false'> 
				CHINA
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "Cn") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/Dk_hd.png' align='middle' class="flag" ondragstart='return false'> 
				DENMARK
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "Dk") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/Ee_hd.png' align='middle' class="flag" ondragstart='return false'> 
				ESTONIA
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "Ee") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/Fi_hd.png' align='middle' class="flag" ondragstart='return false'> 
				FINLAND
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "Fi") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/Fr_hd.png' align='middle' class="flag" ondragstart='return false'> 
				FRANCE
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "Fr") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/De_hd.png' align='middle' class="flag" ondragstart='return false'> 
				GERMANY
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "De") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/Gr_hd.png' align='middle' class="flag" ondragstart='return false'> 
				GREECE
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "Gr") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/Id_hd.png' align='middle' class="flag" ondragstart='return false'> 
				INDONESIA
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "Id") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/Il_hd.png' align='middle' class="flag" ondragstart='return false'> 
				ISRAEL
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "Il") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/Jo_hd.png' align='middle' class="flag" ondragstart='return false'> 
				JORDAN
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "Jo") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/Kg_hd.png' align='middle' class="flag" ondragstart='return false'> 
				KYRGYZSTAN
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "Kg") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/Lb_hd.png' align='middle' class="flag" ondragstart='return false'> 
				LEBANON
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "Lb") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/Mo_hd.png' align='middle' class="flag" ondragstart='return false'> 
				MACAO
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "Mo") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/My_hd.png' align='middle' class="flag" ondragstart='return false'> 
				MALAYSIA
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "My") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/Nl_hd.png' align='middle' class="flag" ondragstart='return false'> 
				NETHERLANDS
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "Nl") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/Mk_hd.png' align='middle' class="flag" ondragstart='return false'> 
				N. MACEDONIA
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "Mk") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/Pk_hd.png' align='middle' class="flag" ondragstart='return false'> 
				PAKISTAN
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "Pk") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/Pe_hd.png' align='middle' class="flag" ondragstart='return false'> 
				PERU
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "Pe") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/Mk_hd.png' align='middle' class="flag" ondragstart='return false'> 
				N. MACEDONIA
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "Mk") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/Ph_hd.png' align='middle' class="flag" ondragstart='return false'> 
				PHILIPPINES
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "Ph") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/Pl_hd.png' align='middle' class="flag" ondragstart='return false'> 
				POLAND
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "Pl") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/Ro_hd.png' align='middle' class="flag" ondragstart='return false'> 
				ROMANIA
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "Ro") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/Ru_hd.png' align='middle' class="flag" ondragstart='return false'> 
				RUSSIA
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "Ru") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/Sg_hd.png' align='middle' class="flag" ondragstart='return false'> 
				SINGAPORE
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "Sg") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/Kr_hd.png' align='middle' class="flag" ondragstart='return false'> 
				S. KOREA
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "Kr") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/Se_hd.png' align='middle' class="flag" ondragstart='return false'> 
				SWEDEN
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "Se") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/Th_hd.png' align='middle' class="flag" ondragstart='return false'> 
				THAILAND
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "Th") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/Ua_hd.png' align='middle' class="flag" ondragstart='return false'> 
				UKRAINE
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "Ua") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/Ae_hd.png' align='middle' class="flag" ondragstart='return false'> 
				UAE
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "Ae") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
		
		<div class='button-collection-wide button-shape-rrect label-left'>
			<span class='origin'>
				<img src='/assets/img/countries/Us_hd.png' align='middle' class="flag" ondragstart='return false'> 
				USA
			</span>
		
		<?
		foreach ($pros as $key => $value) {
			if ($pros[$key]["country"] == "Us") {
				echo("
					<a href='?id=".$key."' class='pro-name ".(isset($pros[$key]['ti']) ? "ti-winner" : "")."'>
						<div>
							".(isset($pros[$key]['ti']) ? "<img src='/assets/img/aegis.svg' align='middle' class='aegis' />" : "")."
							".$pros[$key]["alias"]."
						</div>
						<div style='display:none;'>".$pros[$key]["name"].", ".$pros[$key]["alt-names"].", ".(isset($pros[$key]['ti']) ? "TI Winners" : "")."</div>
					</a>
				");
			}
		}
		
		?>
		
		</div>
	</div>

<style>
	.pro-listing {
		text-align: center;
		min-height: 100px;
		display: flex;
		flex-flow: row wrap;
	}
	
	.blockpadding {
		height: 100px;
	}
	
	.button-collection-wide {
		text-align: left;
	}
	
	.pro-name {
		font-size: 30px;
		font-weight: bold;
		color: white;
		width: auto;
		text-shadow: 0px 0px 0px rgba(0, 0, 0, 0.5);
		text-decoration: none;
		letter-spacing: 1px;
	}
	
	@media screen and (max-width: 515px) {
		.pro-name {
			font-size: 20px;
		}
	}
	
	.pro-name div {
		border: none;
		width: auto;
		height: auto;
		padding: 10px 40px;
	}
	
	.pro-name div:hover {
		border: none;
		box-shadow: none;
	}
	
	.ti-winner {
		/*color: #FAE232;*/
		position: relative;
	}
	
	.flag {
		height: 12px;
		margin-right: 3px;
		position: relative;
		bottom: 5px;
	}
	
	.aegis {
		height: 25px;
		position: relative;
		bottom: 12px;
	}
	
	.button-collection-wide a:hover div {
		transform: scale(1.2) !important;
	}
	
	.pro-listing a:hover {
		text-shadow: 0px 0px 50px rgba(0, 0, 0, 0.5);
	}
	
	.pro-listing div span {
		font-weight: normal;
	}
</style>

<? endif; ?>

<? include $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/footer.php'; ?>