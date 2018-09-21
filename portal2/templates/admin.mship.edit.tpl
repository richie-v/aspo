{include file="header.tpl"}

<script type="text/javascript">
$(
	function() {
		$("#StartReg").datepicker({
			dateFormat: "dd-mm-yy",
			changeMonth: true,
			changeYear: true,
			defaultDate: "{$StartReg}"
		});
		
		$("#EndReg").datepicker({
			dateFormat: "dd-mm-yy",
			changeMonth: true,
			changeYear: true,
			defaultDate: "{$EndReg}"
		});
	}
);

//function for adding new packages
var newIndex = {$newindex};

</script>

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	{include file="navmenu.tpl"}

	<div id="content">
		<h2>Lidmaatschappen beheren</h2>
		
		<p>Met dit formulier kunt u de prijzen voor het ASPO lidmaatschap instellen.</p>

		<p>&nbsp;</p>
		
		<form action="{$phpself}?m=mship&a=editdone" method="POST">
			
			{if $ProdID}
				<input type="hidden" name="ProdID" value="{$ProdID}" />
			{/if}
		
			<div class="col3">
				<label for="Year">Jaar:</label>
				<input type="text" class="text" name="Year" id="Year" value="{$Year}" maxlength="4" />
			</div>
			
			<div class="col3">
				<label for="StartReg">Beschikbaar vanaf:</label>
				<input type="text" class="text" name="StartReg" id="StartReg" value="{$StartReg}" />
			</div>
			
			<div class="col3R">
				<label for="EndReg">Beschikbaar tot:</label>
				<input type="text" class="text" name="EndReg" id="EndReg" value="{$EndReg}" />
			</div>
			
			<p class="cb">&nbsp;</p>
			
			<b>Prijzen en opties</b>
			
			<br /><br />
			
			{if $packages}
				<table class="admintable">
					<tr>
						<th width="75%">Beschrijving:</th>
						<th width="25%">Prijs:</th>
					</tr>
				
					{foreach from=$packages item=p}
						<tr class="{cycle values='odd,even'}">
							<td>
								<input type="text" class="text" name="{$packvar}[{$p.PackID}][Description]" value="{$p.Description}" {if $p.TimesSold && $LockSold}readonly{/if} />
							</td>
							<td>
								<input type="text" class="text" name="{$packvar}[{$p.PackID}][Price]" value="{$p.Price}" maxlength="3" {if $p.TimesSold && $LockSold}readonly{/if} />
								<input type="hidden" name="{$packvar}[{$p.PackID}][AvPhD]" value="{if $p.AvPhD}1{else}0{/if}" />
								<input type="hidden" name="{$packvar}[{$p.PackID}][AvMember]" value="{if $p.AvMember}1{else}0{/if}" />
							</td>
						</tr>
					{/foreach}
			
				</table>
			
			{else}
				<b>Geen prijzen en opties gevonden!</p>
			{/if}
			
			<p>&nbsp;</p>
			
			<p class="ar">
				<input type="button" class="button" value="Annuleren" onclick="window.location='{$phpself}?m=mship'" />
				&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="submit" class="button" value="Opslaan" />
			</p>
					
		</form>

	</div>
		
</div>
	
{include file="footer.tpl"}