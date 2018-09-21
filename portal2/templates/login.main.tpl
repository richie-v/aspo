{include file="header.tpl"}

<script language="javascript">
function showWarning(cookiesEnabled) {
	if (cookiesEnabled == 'false') {
		obj = document.getElementById('cookiewarning');
		obj.style.display = 'block';
	}
}

$(document).ready(function() {
	var cc = $.get('{$phpself}?m=login&a=cc');
    cc.done(showWarning);
});
</script>

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	{include file="navmenu.tpl"}
	
	<div id="content">
	
		<div id="loginframe">
		
			<h2>Inloggen</h2>
		
			<form id="loginform" action="{$phpself}" method="POST" data-validate="parsley">

				<div id="cookiewarning" class="loginerror" style="display: none;">
					Deze website maakt gebruik van cookies en uw browser lijkt deze niet te accepteren. Inloggen is hierdoor niet mogelijk!
				</div>

				{if $loginerror}
				<div class="loginerror">
					{$loginerror}
				</div>
				{/if}
				<div class="loginfield">
					<label for="user">Gebruiker:</label>
					<input id="user" name="user" class="text" type="text" value="" data-trigger="change" data-required="true" />
				</div>
				
				<div class="loginfield">
					<label for="user">Wachtwoord:</label>
					<input id="pass" name="pass" class="password" type="password" value="" data-trigger="change" data-required="true" />
				</div>
				
				<div class="loginbutton ar">
					<input id="submit" class="button" type="submit" value="Inloggen" />
				</div>
		
				<div class="loginlink">
					<a href="{$phpself}?a=forget">&gt;&gt; Wachtwoord vergeten?</a>
				</div>
        
				<div class="loginlink">
					<a href="{$phpself}?a=register">&gt;&gt; Geen lid? Registreer nu!</a>
				</div>
			</form>
		</div>

	</div>
	
</div>
			
{include file="footer.tpl"}