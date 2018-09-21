{include file="header.tpl"}

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	{include file="navmenu.tpl"}
	
	<div id="content">

		<div id="loginframe">
		
			<h2>Registreren</h2>
			
			<form id="registerform" action="{$phpself}?a=register" method="POST" data-validate="parsley">

				{if $regerror}
				<div class="loginerror">
					{$regerror}
				</div>
				{/if}
				<div class="loginfield">
					<label for="user">Gebruiker:</label>
					<input id="user" name="user" class="text" type="text" value="" data-trigger="change" data-rangelength="[3,20]" data-required="true" />
				</div>

				<div class="loginfield">
					<label for="user">E-mail adres:</label>
					<input id="email" name="email" class="text" type="text" value="" data-trigger="change" data-required="true" data-type="email" />
				</div>

				<div class="loginbutton ar">
					<input id="submit" type="submit" class="button" value="Registreren" />
				</div>
			
			</form>
			
			<div class="loginlink">
				<a href="{$phpself}">&gt;&gt; Annuleren</a>
			</div>

			
		</div>
	
	</div>

</div>

{include file="footer.tpl"}