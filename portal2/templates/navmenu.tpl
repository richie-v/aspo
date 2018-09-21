{if $AuthLevel == 0 || $AuthState > 0}
	<div id="navmenu">
		&nbsp;
	</div>
{elseif $AuthLevel == 2}
	<div id="navmenu">
		<a class="navitem" href="{$phpself}?m=main">Home</a>
		<a class="navitem" href="{$phpself}?m=conf">Congressen</a>
		<a class="navitem" href="{$phpself}?m=mship">Lidmaatschappen</a>
		<a class="navitem" href="{$phpself}?m=users">Leden</a>
		<a class="navitem" href="{$phpself}?m=main&a=logout">Uitloggen</a>
	</div>
{else}
	<div id="navmenu">
		<a class="navitem" href="{$phpself}?m=main">Home</a>
		<a class="navitem" href="{$phpself}?m=orders">Betalingen</a>
		<a class="navitem" href="{$phpself}?m=conf">Congres</a>
		<a class="navitem" href="{$phpself}?m=mship">Lidmaatschap</a>
		
		{if ($AuthCommittees)}
			<a class="navitem" href="{$phpself}?m=comm">Commissies</a>
		{/if}
		
		<a class="navitem" href="{$phpself}?m=main&a=logout">Uitloggen</a>
	</div>
{/if}

