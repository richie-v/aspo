{include file="header.tpl"}

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	{include file="navmenu.tpl"}

	<div id="content">
	
		<h2>iDeal betaling</h2>
		
		<p>
		
		Een e-mail ter bevestiging van uw aankoop is verstuurd naar: {$email}. 
			
		<p>
			
		Een overzicht van al uw betalingen kunt u vinden via het menu of via de knop hieronder. Hier kunt u ook een factuur als PDF downloaden.
			
		<p>&nbsp</p>
			
		<p>
			<input type="button" class="button" value="Naar betalingen" onclick="window.location='{$phpself}?m=orders'" />
		</p>
		
	</div>
	
<div>

{include file="footer.tpl"}