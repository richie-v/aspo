{include file="header.tpl"}

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	{include file="navmenu.tpl"}

	<div id="content">
		<h2>Lidmaatschappen beheren</h2>
		
		<p>Op deze pagina kunt u de lidmaatschapsprijzen beheren. Onderaan de pagina ziet u een overzicht van de reeds ingevoerde jaren. Door op de knop hieronder te klikken kunt u een nieuw lidmaatschap toevoegen.</p>
		
		<p>&nbsp;</p>

		<input type="button" class="button" value="Nieuw invoeren" onclick="window.location='{$phpself}?m=mship&a=new'">
		
		<p>&nbsp;</p>
		
		{if $msdata}
			Overzicht voorgaande jaren:
		
			<p>
			
			<table class="admintable">
				<tr>
					<th width="55%" class="al">Beschrijving:</th>
					<th width="15%" class="ar">Verkocht:</th>
					<th width="15%" class="ar">Acties:</th>
				</tr>
				{foreach from=$msdata item=ms}
					<tr class="{cycle values='odd,even'}">
						<td>{$ms.Name}</td>
						<td class="ar">{$ms.TimesSold}</td>
						<td class="ar">
							<img src="icons/view.png" class="icon" width="16" height="16" border="0" onclick="doAction('view', {$ms.ProdID}, 0);" alt="Bekijken" />
							<img src="icons/edit.png" class="icon" width="16" height="16" border="0" onclick="doAction('edit', {$ms.ProdID}, 0);" alt="Bewerken" />
							{if ($ms.TimesSold && $LockSold)}
								<img src="icons/lock.png" class="icon" width="16" height="16" border="0" onclick="alert('Dit lidmaatschap kan niet worden verwijderd, omdat leden het al hebben aangeschaft!');" alt="Verwijderen" />
							{else}
								<img src="icons/delete.png" class="icon" width="16" height="16" border="0"  onclick="doAction('delete', {$ms.ProdID}, 'Weet u zeker dat u dit lidmaatschap en alle daaraan gekoppelde gegevens wilt verwijderen?\n\nDeze actie kan niet ongedaan gemaakt worden!');" alt="Verwijderen" />
							{/if}
						</td>
					</tr>
				{/foreach}
			</table>
		
		{/if}

	</div>
		
</div>
	
<script language="javascript">

function doAction($action, $prid, $confirm) {
	if($confirm) {
		if(confirm($confirm))
			window.location = '{$phpself}?m=mship&a=' + $action + '&prid=' + $prid;
	}
	else {
		window.location = '{$phpself}?m=mship&a=' + $action + '&prid=' + $prid;
	}
}

</script>	

{include file="footer.tpl"}