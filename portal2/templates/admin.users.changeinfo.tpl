{include file="header.tpl"}

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	{include file="navmenu.tpl"}

	<div id="content">
		<h2>Lid beheren: {$user.Username}</h2>
		
			<form id="changeinfoform" action="{$phpself}?m=users&a=changeinfodone" method="POST" data-validate="parsley">
		
			<input name="uid" type="hidden" value="{$user.UserID}" />
		
			<p>
			
			Met het formulier hieronder kunt u de gegevens van de gebruiker wijzigen. Velden met een * zijn verplicht.
			
			<div style="width: 45%; float:left">
				
				<label for="Name">Loginnaam: *</label>
				<input id="Username" name="Username" class="text" type="text" value="{$user.Username}" data-trigger="change" data-required="true" />
				
				<label for="Name">Naam: *</label>
				<input id="Name" name="Name" class="text" type="text" value="{$user.Name}" data-trigger="change" data-required="true" />
				
				<label for="Prep">Tussenvoegsel:</label>
				<input id="Prep" name="Prep" class="text" type="text" value="{$user.Prep}" />

				<label for="Surname">Achternaam: *</label>
				<input id="Surname" name="Surname" class="text" type="text" value="{$user.Surname}" data-trigger="change" data-required="true" />
				
				<label>Geslacht:</label>
				<div style="height: 28px;">
					<input id="GenderM" name="Gender" type="radio" value="Man" {if $user.Gender == "Man"}checked{/if} /><label for="GenderM" class="radio">Man</label>
					<input id="GenderF" name="Gender" type="radio" value="Vrouw" {if $user.Gender == "Vrouw"}checked{/if} /><label for="GenderF" class="radio">Vrouw</label>
				</div>

				<label for="Interest1">Interessegebied 1:</label>
				<input id="Interest1" name="Interest1" class="text" type="text" value="{$user.Interest1}" />
				
				<label for="Interest2">Interessegebied 2:</label>
				<input id="Interest2" name="Interest2" class="text" type="text" value="{$user.Interest2}" />
				
				<label for="Interest3">Interessegebied 3:</label>
				<input id="Interest3" name="Interest3" class="text" type="text" value="{$user.Interest3}" />		

				<label for="Diet">Dieet voorkeur:</label>
				{html_options name=Diet values=$diets output=$diets selected=$user.Diet}

				<label for="Allergies">Voedselallergie&euml;n:</label>
				<input id="Allergies" name="Allergies" class="text" type="text" value="{$user.Allergies}" />
				
			</div>
			
			<div style="width: 45%; float:right">
				
				<label for="Name">Email: *</label>
				<input id="Email" name="Email" class="text" type="text" value="{$user.Email}" data-trigger="change" data-required="true" />
				
				<label for="Position">Aanstelling: *</label>
				{html_options name=Position values=$positions output=$positions selected=$user.Position  data-trigger="change" data-required="true"}
				
				<label for="Department">Afdeling:</label>
				<input id="Department" name="Department" class="text" type="text" value="{$user.Department}" />

				<label for="Affiliation">Universiteit / instelling:</label>
				<input id="Affiliation" name="Affiliation" class="text" type="text" value="{$user.Affiliation}" />
				
				<label for="Street">Straat:</label>
				<input id="Street" name="Street" class="text" type="text" value="{$user.Street}" />
				
				<label for="Number">Huisnummer:</label>
				<input id="Number" name="Number" class="text" type="text" value="{$user.Number}" data-type="digits" />

				<label for="Numbersup">Toevoeging:</label>
				<input id="Numbersup" name="Numbersup" class="text" type="text" value="{$user.Numbersup}" />
				
				<label for="Postcode">Postcode (vb. 1234AB):</label>
				<input id="Postcode" name="Postcode" class="text" type="text" value="{$user.Postcode}" data-type="alphanum" data-maxlength="6" />

				<label for="City">Stad:</label>
				<input id="City" name="City" class="text" type="text" value="{$user.City}" />
				
				<label for="Country">Land:</label>
				{html_options name=Country options=$countries selected=$user.Country}

			</div>

			<div class="ar cb">
				<p>&nbsp;</p>
				
				<input class="button" type="button" value="Annuleren" onclick="window.location = '{$phpself}?m=users&a=view&uid={$user.UserID}';">
				&nbsp;&nbsp;&nbsp;&nbsp;
				<input class="button" type="submit" value="Wijzigen">
			</div>
			
		</form>
	
	</div>

</div>

{include file="footer.tpl"}