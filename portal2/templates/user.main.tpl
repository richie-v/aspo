{include file="header.tpl"}

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	{include file="navmenu.tpl"}

	<div id="content">
		<h2>Welkom {$user.Username}!</h2>
		
		<p>Hieronder staan uw persoonlijke gegevens. Controleer of deze gegevens kloppen want deze zijn van belang bij het inschrijven voor congressen! Als de gegevens niet kloppen, kunt u <a href="{$phpself}?m=main&a=changeinfo">hier</a> uw gegevens wijzigen.</p>
		
		<p>&nbsp;</p>
		
		<div class="infobox">
		
			<div style="width: 45%; float:left;">

				<b>Naam:</b><br />
				{if !$user.Name && !$user.Surname}
					Onbekend<br />
				{else}
					{$user.Name}{if $user.Prep} {$user.Prep}{/if} {$user.Surname}<br />
				{/if}
				{if $user.Gender}Geslacht: {$user.Gender}<br />{/if}

				<p>

				<b>Interessegebieden:</b><br />
				{if !$user.Interest1 && !$user.Interest2 && !$user.Interest3}
					Niet ingevuld<br />
				{else}
					{$user.Interest1}<br />
					{$user.Interest2}<br />
					{$user.Interest3}<br />
				{/if}

				<p>

				<b>Dieetvoorkeuren:</b><br />
				{if $user.Diet}
					{$user.Diet}
				{else}
					Onbekend
				{/if}
				<br />
				{if $user.Allergies}Allergie: {$user.Allergies}<br />{/if}
	
			</div>

			<div style="width: 45%; float:right;">
				<b>Aanstelling:</b><br />
				{if !$user.Position && !$user.Department && !$user.Affiliation}
					Onbekend<br />
				{else}
					{$user.Position}<br />
					{$user.Department}<br />
					{$user.Affiliation}<br />
				{/if}
				
				<p>
				
				<b>Adres:</b><br />
				{if !$user.Street && !$user.Number && !$user.Postcode && !$user.City}
					Onbekend<br />
				{else}
					{$user.Street} {$user.Number} {$user.Numbersup}<br />
					{$user.Postcode} {$user.City}<br />
					{$user.CountryName}<br />
				{/if}

				<!--<p>

				<b>Lidmaatschap:</b><br />
				{if $user.Membership}
					Betaald voor: {$user.Membership}<br />
				{else}
					Nog geen lid<br />
				{/if}-->

				</div>
			
			<div class="ar cb">
				<a href="{$phpself}?m=main&a=changeinfo">Gegevens wijzigen</a>
			</div>
		</div>
		
		<p>

		<div class="infobox">
			Om uw logingegevens zoals e-mailadres, gebruikersnaam of wachtwoord te wijzigen, kunt u de link hieronder gebruiken.
			
			<p>
			
			<div class="ar cb">
				<a href="{$phpself}?m=main&a=changelogin">Login wijzigen</a>
			</div>
		</div>
	</div>
		
</div>
	
{include file="footer.tpl"}