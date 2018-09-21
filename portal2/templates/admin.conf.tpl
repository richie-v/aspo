{include file="header.tpl"}

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	{include file="navmenu.tpl"}

	<div id="content">
		<h2>Congressen beheren</h2>
		
		<p>Op deze pagina kunt u congressen beheren. Onderaan de pagina ziet u een overzicht van de congressen. U kunt deze bewerken of de lijst met ingeschreven deelnemers opvragen. Met de knop hieronder kunt u een nieuw congres invoeren.</p>
		
		<p>&nbsp;</p>

		<input type="button" class="button" value="Nieuw invoeren" onclick="window.location='{$phpself}?m=conf&a=new'">
		
		<p>&nbsp;</p>
		
		{if isset($cdata)}
			Overzicht congressen:
		
			<p>
			
			<table class="admintable">
				<tr>
					<th width="55%" class="al">Titel:</th>
					<th width="15%" class="ar">Verkocht:</th>
					<th width="15%" class="ar">Acties:</th>
				</tr>
				{foreach from=$cdata item=c}
					<tr class="{cycle values='odd,even'}">
						<td>{$c.Name}</td>
						<td class="ar">{$c.TimesSold}</td>
						<td class="ar">
							<img src="icons/view.png" class="icon" width="16" height="16" border="0" onclick="doAction('view', {$c.ProdID}, 0);" alt="Bekijken" />
							<img src="icons/edit.png" class="icon" width="16" height="16" border="0" onclick="doAction('edit', {$c.ProdID}, 0);" alt="Bewerken" />
							{if ($c.TimesSold && $LockSold)}
								<img src="icons/lock.png" class="icon" width="16" height="16" border="0" onclick="alert('Dit congres kan niet worden verwijderd, omdat leden zich al hebben ingeschreven!');" alt="Verwijderen" />
							{else}
								<img src="icons/delete.png" class="icon" width="16" height="16" border="0"  onclick="doAction('delete', {$c.ProdID}, 'Weet u zeker dat u dit congres en alle daaraan gekoppelde gegevens wilt verwijderen?\n\nDeze actie kan niet ongedaan gemaakt worden!');" alt="Verwijderen" />
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
			window.location = '{$phpself}?m=conf&a=' + $action + '&prid=' + $prid;
	}
	else {
		window.location = '{$phpself}?m=conf&a=' + $action + '&prid=' + $prid;
	}
}

</script>
	
{include file="footer.tpl"}