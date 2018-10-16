{include file="header.tpl"}

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	{include file="navmenu.tpl"}

	<div id="content">
		<h2>Congressen beheren</h2>
		
		<p>Hieronder kunt u de inschrijvingen voor het congres bekijken en beheren.</p>

		{if $pinfo}
			<table class="admintable">
				<tr>
					<th width="40%">Beschrijving:</th>
					<th width="20%" class="ar">Prijs:</th>
					<th width="20%" class="ar">Aantal:</th>
					<th width="10%" class="ar">Vis:</th>
					<th width="10%" class="ar">Vlees:</th>
					<th width="10%" class="ar">Vegetarisch:</th>
					<th width="10%" class="ar">Veganistisch:</th>
				</tr>
			
				{foreach from=$pinfo item=p}
					<tr class="{cycle values='odd,even'}">
						<td>{$p.Description}</td>
						<td class="ar">&euro; {$p.Price}</td>
						<td class="ar">{$p.TimesSold}</td>
						<td class="ar">{$p.Vis}</td>
						<td class="ar">{$p.Vlees}</td>
						<td class="ar">{$p.Vegetarisch}</td>
						<td class="ar">{$p.Veganistisch}</td>
					</tr>
				{/foreach}

				<tr class="tf">
					<td>Totaal:</td>
					<td class="ar">&euro; {$totprice}</td>
					<td class="ar">{$totsold}</td>
					<td class="ar">{$totVis}</td>
					<td class="ar">{$totVlees}</td>
					<td class="ar">{$totVegetarisch}</td>
					<td class="ar">{$totVeganistisch}</td>
				</tr>

			</table>
		
		{else}
			<b>Geen prijzen en opties gevonden!</b>
		{/if}

		<p>&nbsp;</p>
		
		<div class="col4">
			<input type="button" class="button" value="Download" onclick="window.location='{$phpself}?m=conf&a=download&prid={$prid}'" />
		</div>
		<div class="col4 ac">
			<input type="button" class="button" value="E-mailen" onclick="window.location='{$phpself}?m=conf&a=mail&prid={$prid}'" />
		</div>
		<div class="col4 ac">
			<input type="button" class="button" value="Inschrijven" onclick="window.location='{$phpself}?m=conf&a=reg&prid={$prid}'" />
		</div>
		<div class="col4R ar">
			<input type="button" class="button" value="Commissie" onclick="window.location='{$phpself}?m=conf&a=comm&prid={$prid}'" />
		</div>
		
		<p class="cb">&nbsp;</p>
			
	</div>
		
</div>
	
{include file="footer.tpl"}
