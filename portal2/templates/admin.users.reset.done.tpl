{include file="header.tpl"}

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	{include file="navmenu.tpl"}
	
	<div id="content">
	
		<div id="loginframe">
		
		<h2>Lid beheren: {$username}</h2>
		
		<p>
		
		Het wachtwoord is van de gebruiker is gereset. De gebruiker heeft een e-mail gekregen met een nieuw tijdelijk wachtwoord.

		<p>

		Met dit tijdelijke wachtwoord kan de gebruiker inloggen waarna het wachtwoord gewijzigd dient te worden.

		<p>
		
		<div class="loginlink">
			<a href="{$phpself}?m=users&a=view&uid={$userid}">&gt;&gt; Terug</a>
		</div>

	</div>
		
</div>

{include file="footer.tpl"}