<?
	$tooltips = $_COOKIE["tooltips"];
	if (!isset($tooltips)) {setcookie("tooltips", "1", time() + (10 * 365 * 24 * 60 * 60), "/");}
	
	$newTabs = $_COOKIE["newTabs"];
	if (!isset($newTabs)) {setcookie("newTabs", "1", time() + (10 * 365 * 24 * 60 * 60), "/");}
	
	$autoRedirect = $_COOKIE["autoRedirect"];
	if (!isset($autoRedirect)) {setcookie("autoRedirect", "1", time() + (10 * 365 * 24 * 60 * 60), "/");}
	
	include $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/functions.php';
?>


<!DOCTYPE>
<html>
	<head>
		<title><?= $title ?>Dota 2 Dashboard</title>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel='mask-icon' href='/assets/img/logo-d2d-logo.svg' color='#1476A5'>
		
		<link href="https://fonts.googleapis.com/css?family=Rubik:400,700" rel="stylesheet">
		
		<link rel="stylesheet" type="text/css" href="/assets/css/master.css">
		
		<?
			if ($tooltips == 0) {
				echo("<style>.button-collection div span {display:none;}</style>");
			}
		?>
		
		  <!-- JS -->
		  <script type="text/javascript" src="/assets/js/jquery-1.9.1.min.js"></script>
		  
		  <script type="text/javascript" src="/assets/js/jquery.hideseek.min.js"></script>
		  <script type="text/javascript" src="/assets/js/initializers.js"></script>
		  
		  <script>
		  $(document).ready(function(){
		      $("#menu-button").click(function(){
		          $("#mobile-links-frame").slideToggle();
		      });
			  
		  	  $(window).resize(function(){
		  	    var width = $(this).width(); // The window width
		  		if (width > 775) {
		  	      $('#mobile-links-frame').hide(); // Or to completely remove it form the DOM use `remove()`
		  	    }
		  	  });
		  });
		  </script>
		  <!-- JS ends -->
		  
		  <!-- Matomo -->
		  <script type="text/javascript">
		    var _paq = window._paq || [];
		    /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
		    _paq.push(['trackPageView']);
		    _paq.push(['enableLinkTracking']);
		    (function() {
		      var u="//dota2dashboard.com/analytics/";
		      _paq.push(['setTrackerUrl', u+'matomo.php']);
		      _paq.push(['setSiteId', '1']);
		      var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
		      g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
		    })();
		  </script>
		  <!-- End Matomo Code -->
		  
		  
		  
	</head>
	<body onload="init()">
	<div class="main-page">
		<header>
			<div class="header-top">
				<!--<a href="#" id="menu"><img src="/assets/img/icon-menu.svg" ondragstart="return false"></a>-->
				<button class="c-hamburger c-hamburger--htx" id="menu-button">
					<span></span>
				</button>
				
				<script>
					(function() {
					
					  "use strict";
					
					  var toggles = document.querySelectorAll(".c-hamburger");
					
					  for (var i = toggles.length - 1; i >= 0; i--) {
					    var toggle = toggles[i];
					    toggleHandler(toggle);
					  };
					
					  function toggleHandler(toggle) {
					    toggle.addEventListener( "click", function(e) {
					      e.preventDefault();
					      (this.classList.contains("is-active") === true) ? this.classList.remove("is-active") : this.classList.add("is-active");
					    });
					  }
					
					})();
				</script>
			
				<a href="/home" id="dashboard-logo" style="text-decoration: none;">
					<img src="/assets/img/logo-d2d-logo.svg" id="symbol" align="middle" ondragstart="return false">
					<img src="/assets/img/logo-d2d-wordmark.svg" id="wordmark" align="middle" ondragstart="return false">
				</a>
			
				<a href="<? if ($currentPage == "settings") {echo "javascript:history.back()";} else {echo "/settings";} ?>" id="settings"><img src="/assets/img/icon-settings.svg" ondragstart="return false"></a>
			</div>
			<div id="desktop-links-frame">
			<div class="header-bottom">
				<a href="/home" <? if ($currentPage == "home") {echo("id='active'");} ?>>Home</a>
				<a href="/match-id" <? if ($currentPage == "match-id") {echo("id='active'");} ?>>Match ID</a>
				<a href="/player-id" <? if ($currentPage == "player-id") {echo("id='active'");} ?>>Player ID</a>
				<a href="/heroes" <? if ($currentPage == "heroes") {echo("id='active'");} ?>>Heroes</a>
				<a href="/abilities" <? if ($currentPage == "abilities") {echo("id='active'");} ?>>Abilities</a>
				<a href="/items" <? if ($currentPage == "items") {echo("id='active'");} ?>>Items</a>
				<a href="/cosmetics" <? if ($currentPage == "cosmetics") {echo("id='active'");} ?>>Cosmetics</a>
				<a href="/pros" <? if ($currentPage == "pros") {echo("id='active'");} ?>>Pros</a>
			</div>
			</div>
			
			<div id="mobile-links-frame" style="display: none;">
			<div class="header-bottom">
				<a href="/home" <? if ($currentPage == "home") {echo("id='active'");} ?>>Home</a>
				<a href="/match-id" <? if ($currentPage == "match-id") {echo("id='active'");} ?>>Match ID</a>
				<a href="/player-id" <? if ($currentPage == "player-id") {echo("id='active'");} ?>>Player ID</a>
				<a href="/heroes" <? if ($currentPage == "heroes") {echo("id='active'");} ?>>Heroes</a>
				<a href="/abilities" <? if ($currentPage == "abilities") {echo("id='active'");} ?>>Abilities</a>
				<a href="/items" <? if ($currentPage == "items") {echo("id='active'");} ?>>Items</a>
				<a href="/cosmetics" <? if ($currentPage == "cosmetics") {echo("id='active'");} ?>>Cosmetics</a>
				<a href="/pros" <? if ($currentPage == "pros") {echo("id='active'");} ?>>Pros</a>
			</div>
			</div>
		</header>