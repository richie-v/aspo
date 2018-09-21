{include file="header.tpl"}

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	{include file="navmenu.tpl"}

	<div id="content">
	

		{if $error}
			<h2>Wachtwoord fout</h2>
			
			<p>{$error}</p>
			
			<a href="{$phpself}?m=user&a=passreset">&gt;&gt; Opnieuw proberen</a>
		{else}
			<h2>Wachtwoord gewijzigd</h2>

			<p>Uw wachtwoord is gewijzigd!</p>
			
			<p><a href="{$phpself}">&gt; &gt; Ga verder naar de portal</a>
		{/if}

	</div>

</div>
		
{include file="footer.tpl"}