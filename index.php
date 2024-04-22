<?
	if(isset($_COOKIE["page"])) {
		if($_COOKIE["autoRedirect"] == 1) {
			$redirect = "http://dota2dashboard.com/".$_COOKIE["page"];
		} else {
			$redirect = "http://dota2dashboard.com/home";
		}
	    
	    header('Location: '.$redirect);
	}
	
	$id = $_GET["id"];
	
	if (isset($id)) {
		setcookie("playerID", $id, time() + (10 * 365 * 24 * 60 * 60), "/");
		$redirect = "http://dota2dashboard.com/home";
		header('Location: '.$redirect);
	}
?>
<!DOCTYPE>
<html>
	<head>
		<title>Dota 2 Dashboard</title>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link href="https://fonts.googleapis.com/css?family=Rubik:400,700" rel="stylesheet">
		
		<link rel="stylesheet" type="text/css" href="/assets/css/master.css">
		
		  <!-- JS -->
		  <script type="text/javascript" src="/assets/js/jquery-1.9.1.min.js"></script>
		  
		  <script type="text/javascript" src="/assets/js/jquery.hideseek.min.js"></script>
		  <script type="text/javascript" src="/assets/js/initializers.js"></script>
		  
		  
	</head>
	<body onload="init()">
	
<!--	<script type="text/javascript">
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
	</script>-->
	

<style>
	p {
		margin: 40px 0px;
	}
</style>
<div style='text-align: center; padding: 0px 40px'>
	
	
	<div style="margin: 80px 0px;">
		<h1 style="margin-top: 40px; font-size: 20px; margin-bottom: 40px;">Welcome to</h1>
		<img src="/assets/img/logo-d2d-logo.svg" style='height:60px; margin-bottom: 30px;' align="middle" ondragstart="return false">
		<img src="/assets/img/logo-d2d-wordmark.svg" style='width:90%; max-width: 453; margin-left: 30px; margin-bottom: 30px;' align="middle" ondragstart="return false">
		
		<p style="font-style: italic;">
			Enter your player ID below to customize the dashboard with links relevant to you. (Optional)
		</p>
	</div>
	
	
	
	<div style='text-align: center;'>
		<!--<form method='get'>
			<input type='tel' name='id' id='id' placeholder='Enter Player ID...' class='text-input input-large input-search' onkeypress='return isNumberKey(event)' onClick='this.select();' autocomplete=\"off\" autofocus />
			<input type='submit' name='' value='➡︎' style='' />
		</form>-->
		<form method='get' style="margin-bottom: 0px;">
			<input type='tel' name='id' id='id' placeholder='Enter Player ID...' value="<? if (!isset($id) || $id == "null") {echo "";} else {echo $id;} ?>" class='text-input input-small input-search' onkeypress='return isNumberKey(event)' onClick='this.select();' autocomplete="off" autofocus="" style="padding: 10px; margin: 0px; width: 300px;" />
			<br><input type='submit' name='' value='Save' style='left: 0px; margin-top: 5px; width: auto; font-size: 30px; font-weight: bold;' />
		</form>
	</div>
	
	<script type='text/javascript'>	
		// Install input filters.
		setInputFilter(document.getElementById("id"), function(value) {
		  return /^\d*$/.test(value); });
	</script>

	<p>
		<a class="link" href="?id=null" style="color: white; font-weight: normal; font-style: italic;">Skip</a>
	</p>
</div>


	</body>
</html>