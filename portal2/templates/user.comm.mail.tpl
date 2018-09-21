{include file="header.tpl"}

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	{include file="navmenu.tpl"}

	<div id="content">
		<h2>Ingeschreven leden mailen</h2>
		
		<p>
		
		Met dit formulier kunt u <u>alle ingeschreven leden</u> een e-mail sturen.
		
		<p>
		
		<form action="{$phpself}?m=comm&a=maildone&prid={$prid}" method="POST" enctype="multipart/form-data" data-validate="parsley">
		
			<label for="fromname">Naam afzender:</label>
			<input type="text" class="text" name="fromname" id="fromname" value="{$fromname}" data-trigger="change" data-required="true" />
			
			<p>
			
			<label for="from">E-mail afzender:</label>
			<input type="text" class="text" name="from" id="from" value="{$from}" data-trigger="change" data-required="true" />
			
			<p>
		
			<label for="subject">Onderwerp:</label>
			<input type="text" class="text" name="subject" id="subject" value="" data-trigger="change" data-required="true" />
			
			<p>
			
			<label for="body">Bericht:</label>
			<textarea name="body" rows="10" data-trigger="change" data-required="true"></textarea>
		
			<p>
			
			<label for="attachment">Attachment:</label>
			<input type="file" class="file" name="attachment" id="attachment" value="" />
		
			<p class="ar">
			
			<input type="submit" class="button" value="Verzenden" onclick="return confirm('Weet u zeker dat u deze e-mail wilt versturen aan alle ingeschreven leden?')" />
		</form>
	
	</div>
		
</div>
	
{include file="footer.tpl"}