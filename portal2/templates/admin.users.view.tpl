{include file="header.tpl"}

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	{include file="navmenu.tpl"}

	<div id="content">
		<h2>Lid beheren: {$user.Username}</h2>
		
		<p>
		
		<div class="infobox">
		
			<div style="width: 45%; float:left;">

				<b>Loginnaam:</b><br />
				{$user.Username}<br />
				
				<p>
			
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
				
				<b>Email:</b><br />
				{$user.Email}<br />
				
				<p>

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
				
				<p>
				
				<b>Lidmaatschap:</b><br />
				{if $user.Membership}
					Betaald voor: {$user.Membership}<br />
				{else}
					Nog geen lid<br />
				{/if}

			</div>

			<br class="cb" />
			
		</div>

		<p>
		
		<div class="col4">
			<input type="button" class="button" value="Wijzigen" onclick="userEdit();" />
		</div>
		<div class="col4 ac">
			<input type="button" class="button" value="E-mailen" onclick="userMail();" />
		</div>
		<div class="col4 ac">
			<input type="button" class="button" value="Reset" onclick="userReset();" />
		</div>
		<div class="col4R ar">
			<input type="button" class="button" value="Verwijderen" onclick="userDelete();" />
		</div>
		
		<p class="cb">&nbsp;</p>
		
		Hieronder ziet u een overzicht van alle betalingen van de gebruiker. U kunt betalingen verwijderen door op het prullenmand-icoon te klikken achter de betaling.
		
		<p>
		
		{if $orders}
			<table class="admintable">
				<tr>
					<th>Product</th>
					<th>Beschrijving</th>
					<th>Prijs</th>
					<th>Datum</th>
					<th>Status</th>
					<th class="ac">Actie</th>
				</tr>
			
				{foreach from=$orders item=i}
			
					<tr class="{cycle values='odd,even'}">
						<td>{$i.Name}</td>
						<td>{$i.Description}</td>
						<td>&euro; {$i.Price}</td>
						<td>{$i.Date}</td>
						<td>{if $i.TransStatus}{$i.TransStatus}{else}Afgebroken{/if}</td>
						<td class="ac"><img src="icons/delete.png" class="icon" width="16" height="16" border="0" onclick="orderDelete({$i.OrderID});" /></td>
					</tr>
	
				{/foreach}

			</table>

		{else}

			<p><b>Geen bestellingen gevonden.</b></p>
		
		{/if}
		
		<p>
			
	</div>
		
</div>

<script language="javascript">

function userEdit() {
	window.location = '{$phpself}?m=users&a=changeinfo&uid={$user.UserID}';
}

function userMail() {
	window.location = '{$phpself}?m=users&a=mail&uid={$user.UserID}';
}

function userReset() {
	if(confirm('Weet u zeker dat u het wachtwoord van de gebruiker wilt resetten?')) {
		window.location = '{$phpself}?m=users&a=reset&uid={$user.UserID}';
	}
}

function userDelete() {
	if(confirm('Weet u zeker dat u de gebruiker wilt verwijderen?\n\nDeze actie kan niet ongedaan worden gemaakt!')) {
		window.location = '{$phpself}?m=users&a=deluser&uid={$user.UserID}';
	}
}

function orderDelete($oid) {
	if(confirm('Weet u zeker dat u deze betaling wilt verwijderen?\n\nDeze actie kan niet ongedaan worden gemaakt!')) {
		window.location = '{$phpself}?m=users&a=delorder&oid=' + $oid + '&uid=' + {$user.UserID};
	}
}

</script>
	
{include file="footer.tpl"}