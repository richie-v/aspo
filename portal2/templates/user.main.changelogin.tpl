{include file="header.tpl"}

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	{include file="navmenu.tpl"}

	<div id="content">
		<h2>Login wijzigen</h2>
		
		<form id="changeloginform" action="{$phpself}?m=main&a=changelogindone" method="POST" data-validate="parsley">
		
			<p>Met het formulier hieronder kunt u uw logingegevens wijzigen. Velden met een * zijn verplicht.</p>

			
			<p>
			<label for="username">Loginnaam:</label>
			<input id="username" name="username" class="text" type="text" value="{$user.Username}" data-trigger="change" data-rangelength="[3,20]" data-required="true" />
			
			<p>
			
			<label for="email">E-mail:</label>
			<input id="email" name="email" class="text" type="text" value="{$user.Email}" data-trigger="change" data-required="true" data-type="email" />

			<p>

			<label for="newpass">Nieuw wachtwoord (min. 5 karakters):</label>
			<input id="newpass" name="newpass" class="password" type="password" value="" data-trigger="change" data-minlength="5" data-required="true" />

			<p>

			<label for="checkpass">Herhaal wachtwoord:</label>
			<input id="checkpass" name="checkpass" class="password" type="password" value="" data-trigger="change" data-required="true" data-equalto="#newpass" data-error-message="Wachtwoorden komen niet overeen." />

			<div class="ar">
				<input class="button" type="button" value="Annuleren" onclick="window.location = '{$phpself}';">&nbsp;
				<input class="button" type="submit" value="Wijzigen">
			</div>
			
		</form>
	
	</div>

</div>

{include file="footer.tpl"}