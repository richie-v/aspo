{include file="header.tpl"}

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	{include file="navmenu.tpl"}

	<div id="content">
	
		<h2>iDeal betaling</h2>
		
		<p>
		{if count($issuerdata)}
			U gaat het volgende afrekenen:
			
			<p>
			
			<div class="infobox">
				{$package.Description}
				<div class="fr">Prijs: &euro; {$package.Price}</div>
			</div>
			
			<p>
			<form action="{$phpself}?m=ideal&a=st" method="POST">
				Selecteer uw bank:
			
				<input type="hidden" name="diet" value="{$diet}" />	
				<input type="hidden" name="packID" value="{$package.PackID}" />

				{html_options name=issuerID options=$issuerdata style="width: 50%;"}

				<input type="submit" class="button fr" value="Betalen" />
			
			</form>
		{else}
			
			<div id="error">Uw bankgegevens konden niet worden opgehaald! Probeer het later nogmaals.</div>
			
		{/if}
			
	</div>
	
</div>

{include file="footer.tpl"}
