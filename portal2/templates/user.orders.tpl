{include file="header.tpl"}

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	{include file="navmenu.tpl"}

	<div id="content">
		
		<h2>Betalingsoverzicht</h2>
		
		<p>Hieronder ziet u een overzicht van alle betalingen die u aan de ASPO heeft gedaan:</p>
		
		<p>&nbsp;</p>
		
	{foreach from=$orders item=i}
			<div class="infobox">
				<table class="ordertable">
					<tr>
						<th colspan="3">{$i.Name}</th>
						<th class="ar">{if $i.TransStatus == 'Success'}<a href="{$phpself}?m=orders&a=pdf&id={$i.OrderID}" class="button white" target="_blank">PDF</a>{/if}</th>
					</tr><tr>
						<td width="15%">Beschrijving:</td>
						<td width="65%">{$i.Description}</td>
						<td width="10%">Prijs:</td>
						<td width="10%" class="ar">&euro; {$i.Price}</td>
					</tr><tr>
						<td>Datum:</td>
						<td>{$i.Date}</td>
						<td>Status:</td>
						<td class="ar">{if $i.TransStatus}{$i.TransStatus}{else}Afgebroken{/if}</td>
					</tr>
				</table>
			</div>
			
			<p>&nbsp;</p>
		{foreachelse}
			<div class="infobox">
				<p><b>Geen betalingen gevonden.</b></p>
			</div>
		{/foreach}
			
	</div>

</div>
	
{include file="footer.tpl"}