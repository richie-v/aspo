{include file="header.tpl"}

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	{include file="navmenu.tpl"}

	<div id="content">
		
		<h2>Congres</h2>
		
		<p>Het ASPO houdt jaarlijks een congres in december. Op deze pagina kunt u zich inschrijven voor dit congres.</p>
		
		{if $position != 'Student'}
			<div class="notification">Let op: De kosten van het congres zijn altijd inclusief het ASPO lidmaatschap voor het daarop volgend jaar.</div>
		{/if}
		
		<p>&nbsp;</p>
		
		{if $products}
			
			{foreach from=$products item=pr name=prodloop}
				<div class="infobox">
					
					<table class="congrestable">
						<tr>
							<th>{$pr.Name}</th>
							<th class="ar">Datum: {$pr.StartDate|date_format:"%e %B %Y"}</th>
						</tr>
						<tr>
							<td>Locatie: {$pr.Location}</td>
							<td class="ar">Inschrijven t/m: {$pr.EndReg|date_format:"%e %B %Y"}</td>
						</tr>

						{if $pr.Remarks}
							<tr>
								<td colspan="2"><br />{$pr.Remarks}</td>
							</tr>
						{/if}
					
					</table>
						
					<br />

					<form action="{$phpself}?m=ideal" method="POST" data-validate="parsley" data-show-errors="false">
					
					{if count($pr.packages) == 1}
						<div class="package">
							<input type="hidden" name="packID" value="{$pr.packages[0].PackID}" />
							{$pr.packages[0].Description}
							<div class="fr">Prijs: &euro; {$pr.packages[0].Price}</div>
							<br style="clear: both" />
						</div>
					{else}
						{foreach from=$pr.packages item=p name=packloop}
							<div class="package">
								<input type="radio" id="packID{$smarty.foreach.packloop.index}" name="packID" value="{$p.PackID}" data-required="true" />
								<label for="packID{$smarty.foreach.packloop.index}" style="display: inline;">{$p.Description}</label>
								<div class="fr">Prijs: &euro; {$p.Price}</div>
							</div>
						{/foreach}
					{/if}
					
						<div class="ar">
							<input type="submit" class="button white" value="Inschrijven" />
						</div>
					</form>
				</div>
				
				<p>&nbsp;</p>
			{/foreach}
			
		{else}
			<div class="infobox">
				<p><b>Er zijn momenteel geen congressen of u heeft zich al ingeschreven.</b></p>
			</div>
			
		{/if}
	</div>

</div>
	
{include file="footer.tpl"}