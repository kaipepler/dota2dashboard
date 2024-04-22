<?
	$currentPage = "about";
	
	$title = "About ";
	
	include $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/header.php';
?>

<style>
	p {
		margin: 40px 0px;
		line-height: 24px;
	}
	
	ul li {
		margin: 5px 0px;
	}
</style>

<div style='text-align: left; padding: 0px 40px'>
	
	<h1 style="text-align: center; margin-top: 40px;">About Dota 2 Dashboard</h1>
	<p>
		Dota 2 Dashboard brings together online resources, making them easily accessible in as few clicks as possible. The Dashboard is split up into 7 sections, each focused on a different category a person might want to research:
	</p>
	<ol>
		<li>
			<p>
				The <a class="link" href="/home"><b>Home</b></a> page presents users with a modular, customizable dashboard, allowing everyone to set up a combination of links, profiles, and widgets most useful for them. With eight possible layout configurations, and over 60 components to choose from, there are nearly infinite combinations to create! For the Home page to work, users must enter their Player ID in the Settings page, so the dashboard can personalize the links.
			</p>
		</li>
		<li>
			<p>
				The <a class="link" href="/match-id"><b>Match ID</b></a> page presents users with an easy way to type or paste in match IDs from the Dota 2 Client, or other sites. Once a match ID is loaded, a dashboard page appears offering links to the Dotabuff, OpenDota, and Stratz pages for that match, as well as quick links to key information, such as builds, chat, story, and playback.
			</p>
		</li>
		<li>
			<p>
				The <a class="link" href="/player-id"><b>Player ID</b></a> page presents users with an easy way to type or paste in player IDs from the Dota 2 Client, or other sites. Once a player ID is loaded, a dashboard page appears offering links to the Dotabuff, OpenDota, and Stratz pages for that player, as well as quick links to key information, such as that player’s most-played heroes, recently-played matches, and their wordcloud.
			</p>
		</li>
		<li>
			<p>
				The <a class="link" href="/heroes"><b>Heroes</b></a> page presents users with a hero-pick interface, allowing users to select heroes in a way alphabetically by attribute, the way they’re used to in the client. Alternately, a user can start typing, using the search field at the top of the page, to filter the hero results to exactly what they are looking for. The search system is flexible, accepting full names, (eg. “Nature’s Prophet”), common abbreviations, (“NP”) original names, (“Furion”) as well as attributes, (“Intelligence”) and classifications. (“Carry”, “Escape”, etc.)
			<br><br>
				Once a hero is selected, a dashboard page appears offering links to the Dotabuff, Opendota, Stratz, Liquipedia, and Dota 2 Wiki pages for that hero, as well as quick links to key information, such as that hero’s common ability/talent builds, the best picks/counterpicks for that hero, guides, and patch notes. In addition, at the bottom of the page, there are links to the latest pro pub games with that hero, (courtesy of dota2protracker.com) VODs of pros playing the hero, (courtesy of the Dota 2 Pro YouTube channel) and tips & tricks. (courtesy of howdoiplay.com)
		</li>
		<li>
			<p>
				The <a class="link" href="/heroes"><b>Abilities</b></a> page presents users with a unique interface, showing every one of the 500+ abilities in the game. These abilities are sorted alphabetically by hero, and like the Heroes page, the search system allows for live filtering to help users find any ability quickly and easily. The search system accepts hero names, (eg. “Invoker”), individual ability names, (“Chaos Metor”), nicknames, (“Meatball”) as well as abbreviations. (eg. “LSA” for Lina’s Light Strike Array)
			<br><br>
				Once an ability is selected, a dashboard page appears offering links to the other abilities in that hero’s set, as well as links to the Liquipedia, Dota 2 Wiki, and Dotabuff pages for that ability.
			</p>
			<p>
				
			</p>
		</li>
		<li>
			<p>
				The <a class="link" href="/items"><b>Items</b></a> page presents users with a clean and orderly item interface, showing every one of the 150+ items in the game. These items are sorted alphabetically by shop category, and as with the other pages pages, the search system allows for live filtering to help users find any item quickly and easily. The search system accepts item names, (eg. “Ethereal Blade”), abbreviations, (“Eblade”), and nicknames. (“Shotgun”)
			<br><br>
				Once an item is selected, a dashboard page appears offering links to the Liquipedia, Dota 2 Wiki, and Dotabuff pages for that item, as well as quick links to version histories.
			</p>
		</li>
		<li>
			<p>
				The <a class="link" href="/cosmetics"><b>Cosmetics</b></a> page presents users with a quick and simple search system, allowing users to look up cosmetic items, either on the Steam Community Market (the default) or the Dotabuff cosmetics database.
			</p>
		</li>
		<li>
			<p>
				The <a class="link" href="/pros"><b>Pros</b></a> page presents users with a simple way to find stats and learn from professional players. The dashboard contains profiles for over 150 of the best players in the world, sorted alphabetically by country of origin. Like the other modules, you can use the search at the top of the page to find specific pros, searching either by in-game alias, real name, or country or origin. Additionally, TI Winners have a gold Aegis icon next to their name, and you can filter to see all TI winners by searching “TI Winners” in the box.
			<br><br>
				Once a pro is selected, a dashboard page appears offering links to recent pub games (courtesy of dota2protracker.com), their Liquipedia profile, Dotabuff, OpenDota, and Stratz profiles, as well as YouTube VODs of their games (courtesy of dota2pro). Please note not all of these features are available for all pros, so each page might be slightly different.
			</p>
		</li>
	</ol>
	<p>
		If you’re an avid Dota 2 player, this dashboard is optimized to be set as the Steam Overlay web browser homepage, as this will allow the world of Dota 2 community resources to be within your fingertips in seconds. (The site remembers the last page you visited, to make it even quicker to get key information.)
	</p>
	<p>
		If you have any questions, comments, or suggestions relating to the development of this resource, feel free to contact me <a class="link" href="https://twitter.com/FantomeArcade">@FantomeArcade</a> on Twitter, as I'm always looking to make this site better!
	</p>
	
	<h2>Disclaimer: </h2>
	<p style="margin-top: 0px;">
		Design Copyright &copy; 2019 Fantôme, all rights reserved. Scripts from third party resources remains under their original licenses.  All hero, ability, and item artwork is the property and copyright of Valve Corporation. All logos for third-party websites, including but not limited to Dotabuff, OpenDota, Stratz, Liquipedia, Dota 2 Wiki (Gamepedia), Dota2ProTracker, Dota 2 Pro, and howdoiplay.com are copyright of their respective owners.
	</p>
	
</div>

<? include $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/footer.php'; ?>