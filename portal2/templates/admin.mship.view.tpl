{include file="header.tpl"}

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	{include file="navmenu.tpl"}

	<div id="content">
		<h2>Lidmaatschap beheren</h2>
		
		<p>Hieronder kunt u het lidmaatschap bekijken en beheren.</p>

		{if $pinfo}
			<table class="admintable">
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
					<td class="ar">&euro; {$totprice}</td>
					<td class="ar">{$totsold}</td>
				</tr>

			</table>
		
		{else}
			<b>Geen prijzen en opties gevonden!</b>
		{/if}

		<p>&nbsp;</p>
		
		<p class="ar">
			<input type="button" class="button" value="Toekennen" onclick="window.location='{$phpself}?m=mship&a=reg&prid={$prid}'" />
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="button" class="button" value="Download" onclick="window.location='{$phpself}?m=mship&a=download&prid={$prid}'" />
		</p>
		
		<p class="cb">&nbsp;</p>
			
	</div>
		
</div>
	
{include file="footer.tpl"}