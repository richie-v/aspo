{include file="header.tpl"}

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	{include file="navmenu.tpl"}
	
	<div id="content">
	
		<div id="loginframe">
		
			<h2>Wachtwoord vergeten</h2>
			
			<form id="resetform" action="{$phpself}?a=forgetdone" method="POST" data-validate="parsley">
				<div class="loginfield">
					<label for="account">Gebruiker of e-mailadres:</label>
					<input id="account" name="account" class="text" type="text" value="" data-trigger="change" data-required="true" />
				</div>
				
				<div class="loginbutton ar">
					<input id="submit" class="button" type="submit" value="Gegevens opvragen" />
				</div>
			</form>

			<div class="loginlink">
				<a href="{$phpself}">&gt;&gt; Annuleren</a>
			</div>

		</div>
	
	</div>
	
</div>

{include file="footer.tpl"}