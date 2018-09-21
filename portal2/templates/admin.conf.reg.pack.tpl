{include file="header.tpl"}

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	{include file="navmenu.tpl"}

	<div id="content">
		<h2>Lid inschrijven</h2>
		
		<p>
		
		<p>
		U wilt het onderstaande lid inschrijven voor het congres:
		
		<p>
		
		<b>Lid: {$user.Username}</b><br />
		<b>Naam: {$user.Name} {if isset($user.Prep)}{$user.Prep} {/if}{$user.Surname}</b></br>
		
		<p>
		
		Hieronder ziet u verschillende prijsopties voor dit congres. Kies een prijsoptie en schrijf het lid in voor het congres.
		
		<p style="clear: both;">&nbsp;</p>
		
		<div id="ubrowser">
		{if $packages}
			<table class="admintable hover">
				<tr>
					<th width="70%">Beschrijving</th>
					<th width="30%">Prijs</th>
				</tr>
			{foreach from=$packages item=p}
				<tr class="{cycle values='odd,even'}" onclick="top.location  = '{$phpself}?m=conf&a=reg&prid={$prid}&uid={$uid}&pid={$p.PackID}&ms={$p.IncMember}'">
					<td>{$p.Description}</td>
					<td>{$p.Price} euro</td>
				</tr>
			{/foreach}
			</table>
		{else}
			<b>Geen prijsopties gevonden.</b>
		{/if}
		</div>
		
		<p class="ar">
			<input type="button" class="button" value="Annuleren" onclick="window.location='{$phpself}?m=conf&a=view&prid={$prid}'" />
		</p>
	
	</div>
	
</div>
	
{include file="footer.tpl"}