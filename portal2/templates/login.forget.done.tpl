{include file="header.tpl"}

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	{include file="navmenu.tpl"}
	
	<div id="content">
	
		<div id="loginframe">
		
		<h2>Wachtwoord vergeten</h2>
		
		{if $error}
			<div class="loginerror">
				<p>Er kon geen account gevonden worden met de door u versterkte gegevens.</p>
			</div>
		{else}
			<div class="logintext">
				
				<p>Een e-mail met de logingegevens van uw account is naar uw e-mailadres verstuurd.</p>

				<p>Controleer uw e-mail en log opnieuw in.</p>
			</div>
		{/if}
		
		<div class="loginlink">
			<a href="{$phpself}?a=login">&gt;&gt; Terug</a>
		</div>

	</div>
		
</div>

{include file="footer.tpl"}