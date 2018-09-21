{include file="header.tpl"}

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	{include file="navmenu.tpl"}

	<div id="content">
	
		<h2>Foutmelding</h2>
		
		<p>

		Help! Er is iets fout gegaan...
		
		<div id="error">{$message}</div>
		
		<p><a href="mailto:{$webmastermail}?subject=Foutmelding%20ASPO%20portal&body={$message|escape:'url'}">&gt;&gt; E-mail de webmaster</a></p>
	</div>

</div>

{include file="footer.tpl"}