{include file="header.tpl"}

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	{include file="navmenu.tpl"}

	<div id="content">
	
		<h2>iDeal betaling</h2>
		
		<p>
		
		{if $transstatus == 'Success'}
		
			Uw betaling is voltooid! U kunt een overzicht van al uw betalingen vinden via het menu of via de knop hieronder. U kunt ook een bevestiging van uw bestelling aanvragen per e-mail.
			
			<p>&nbsp</p>
			
			<p>
				<input type="button" class="button" value="Naar betalingen" onclick="window.location='{$phpself}?m=orders'" />
				&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="button" class="button" value="Stuur bevestiging" onclick="window.location='{$phpself}?m=ideal&a=confirm&id={$orderid}'" />
			</p>
		
		{elseif $transstatus == 'Open'}

			Uw betaling is nog in behandeling bij de bank. Om middernacht zal de status van uw betaling opnieuw worden gecontroleerd.
			
			<p>
			
			U kunt morgen in het betalingsoverzicht controleren of uw betaling gelukt is. Zo niet, neem dan contact op met de webmaster: <a href="mailto:{$webmastermail}">{$webmastermail}</a>.
		
		{else}
			
			Uw betaling is niet gelukt! Het kan zijn dat uw betaling te lang duurde of dat er een fout is opgetreden bij de bank.
			
			<p>
			
			Probeer nogmaals te betalen of neem contact op met de webmaster: <a href="mailto:{$webmastermail}">{$webmastermail}</a>.
			
		{/if}
		
	</div>
	
<div>

{include file="footer.tpl"}