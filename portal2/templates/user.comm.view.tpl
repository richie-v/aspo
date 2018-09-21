{include file="header.tpl"}

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	{include file="navmenu.tpl"}

	<div id="content">
		<h2>Commissies</h2>
		
		<p>Hieronder kunt u de inschrijvingen voor het congres bekijken.</p>

		{if $pinfo}
			<table class="usertable">
				<tr>
					<th width="60%">Beschrijving:</th>
					<th width="20%" class="ar">Prijs:</th>
					<th width="20%" class="ar">Aantal:</th>
				</tr>
			
				{foreach from=$pinfo item=p}
					<tr class="{cycle values='odd,even'}">
						<td>{$p.Description}</td>
						<td class="ar">&euro; {$p.Price}</td>
						<td class="ar">{$p.TimesSold}</td>
					</tr>
				{/foreach}

				<tr class="tf">
					<td>Totaal:</td>
					<td class="ar">&euro; {$TotPrice}</td>
					<td class="ar">{$TotSold}</td>
				</tr>

			</table>
		
		{else}
			<b>Geen prijzen en opties gevonden!</b>
		{/if}

		<p>&nbsp;</p>
		
		<input type="button" class="button" value="Download" onclick="window.location='{$phpself}?m=comm&a=download&prid={$ProdID}'" />
		&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" class="button" value="E-mailen" onclick="window.location='{$phpself}?m=comm&a=mail&prid={$ProdID}'" />
			
	</div>
		
</div>
	
{include file="footer.tpl"}