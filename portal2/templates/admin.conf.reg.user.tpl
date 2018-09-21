{include file="header.tpl"}

<script>
	//function to request user data from the server
	function getUsers() {
		//get search parameters
		var uname = document.getElementById('uname').value;
	
		//request user data
		$("#ubrowser").load("index.php?m=conf&a=gu&prid={$prid}&n=" + uname);
	}
</script>

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	{include file="navmenu.tpl"}

	<div id="content">
		<h2>Lid inschrijven</h2>
		
		<p>
		
		Hieronder kunt u zoeken naar leden door hun naam in te vullen. U kunt &eacute;&eacute;n lid selecteren en dit lid vervolgens inschrijven voor het congres.
		
		<p>
		
		Zoek op naam:<br />
		<input type="text" class="text" id="uname" value="" style="width: 250px;" />&nbsp;
		<input type="button" class="button" value="Zoeken" onclick="getUsers()" />

		
		<p style="clear: both;">&nbsp;</p>
		
		<div id="ubrowser">
			<!-- User data is inserted through AJAX calls here -->
		</div>
			
		
		<p class="ar">
			<input type="button" class="button" value="Annuleren" onclick="window.location='{$phpself}?m=conf&a=view&prid={$prid}'" />
		</p>
	
	</div>
	
</div>
	
{include file="footer.tpl"}