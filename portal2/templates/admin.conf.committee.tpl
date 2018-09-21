{include file="header.tpl"}

<script>
	//function to request user data from the server
	function getUsers() {
		//get search parameters
		var uname = document.getElementById('uname').value;
	
		//request user data
		$("#ubrowser").load("index.php?m=conf&a=scu&prid={$prid}&n=" + uname);
	}
</script>

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	{include file="navmenu.tpl"}

	<div id="content">
		<h2>Congressen beheren</h2>
		
		<p>
		
		Hieronder staan de leden die deel uitmaken van de organisatie-commissie van dit congres. U kunt leden verwijderen uit de commissie door op het prullenmand-icoontje te klikken achter het lid.
		
		<p>&nbsp;</p>
		
		{if $comm}
			<table class="admintable">
				<tr>
					<th>Lid:</th>
					<th>Naam:</th>
					<th>&nbsp;</th>
					<th>Achternaam:</th>
					<th>E-mail:</th>
					<th class="ac">Actie:</th>
				</tr>
			
				{foreach from=$comm item=c}
					<tr class="{cycle values='odd,even'}">
						<td>{$c.Username}</td>
						<td>{$c.Name}</td>
						<td>{$c.Prep}</td>
						<td>{$c.Surname}</td>
						<td>{$c.Email}</td>
						<td class="ac"><img src="icons/delete.png" class="icon" width="16" height="16" border="0" alt="Verwijderen" onclick="window.location = '{$phpself}?m=conf&a=commdel&prid={$prid}&uid={$c.UserID}';" /></td>
					</tr>
				{/foreach}

			</table>
		
		{else}
			<b>Er zitten nog geen leden in de commissie.</b>
		{/if}

		<p>&nbsp;</p>
		
		Met dit formulier kunt u leden zoeken en toevoegen aan de commissie. U zoeken naar leden door hun naam in te vullen. Daarna kunt u &eacute;&eacute;n lid selecteren en toevoegen.
		
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