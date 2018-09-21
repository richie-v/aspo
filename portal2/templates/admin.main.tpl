{include file="header.tpl"}

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	{include file="navmenu.tpl"}

	<div id="content">
		<h2>Welkom {$user}!</h2>
		
		<p>U bent ingelogd als beheerder. U kunt in dit systeem de volgende zaken beheren:</p>
		
		<ul>
			<li>Congressen en congresprijzen
			<li>Prijzen van het lidmaatschap
			<li>Leden
		</ul>
		
		<p>&nbsp;</p>
		
		<div class="infobox">
			Als u de logingegevens zoals e-mailadres, gebruikersnaam of wachtwoord wilt wijzigen, kunt u de link hieronder gebruiken.
			
			<p>
			
			<div class="ar cb">
				<a href="{$phpself}?a=changelogin">Login wijzigen</a>
			</div>
		</div>
	</div>
		
</div>
	
{include file="footer.tpl"}