{include file="header.tpl"}

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	{include file="navmenu.tpl"}

	<div id="content">
		<h2>Commissies</h2>
		
		<p>
		
		U organiseert meerdere congressen. Kies hieronder welk congres u wilt bekijken.
		
		<p>

		{foreach from=$products item=p}
			
			<div>
				<a href="{$phpself}?m=comm&a=view&prid={$p.ProdID}">{$p.Name}</a>
			</div>
		{foreachelse}
			<b>Geen commissie gevonden waar u deel van uitmaakt!</b>
		{/foreach}

	</div>
		
</div>
	
{include file="footer.tpl"}