{include file="header.tpl"}

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	{include file="navmenu.tpl"}

	<div id="content">
	
		<h2>Wachtwoord wijzigen</h2>
			
			<p>
			
			Uw wachtwoord is gereset en u heeft een tijdelijk wachtwoord toegestuurd gekregen. Wij vragen u daarom om uw wachtwoord te veranderen met het onderstaande formulier.
		
			<p>&nbsp;</p>
		
			<div style="width: 450px; margin: auto;">
				
				<form id="resetform" action="{$phpself}?m=user&a=resetdone" method="POST" data-validate="parsley">

					<div class="loginfield">
						<label for="newpass">Nieuw wachtwoord (min. 5 karakters):</label>
						<input id="newpass" name="newpass" class="password" type="password" value="" data-trigger="change" data-minlength="5" data-required="true" />
					</div>

					<p>
					
					<div class="loginfield">
						<label for="checkpass">Herhaal wachtwoord:</label>
						<input id="checkpass" name="checkpass" class="password" type="password" value="" data-trigger="change" data-required="true" data-equalto="#newpass" data-error-message="Wachtwoorden komen niet overeen." />
					</div>
					
					<p>
					
					<div class="loginbutton">
						<input id="submit" type="submit" class="button fr" value="Wijzigen" />
					</div>
		
				</form>
		
			</div>
				
	</div>

</div>
		
{include file="footer.tpl"}