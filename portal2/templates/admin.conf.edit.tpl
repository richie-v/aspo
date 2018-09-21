{include file="header.tpl"}

<script type="text/javascript">
$(
	function() {
		$("#StartDate").datepicker({
			dateFormat: "dd-mm-yy",
			changeMonth: true,
			changeYear: true,
			defaultDate: "{$StartDate}"
		});
		
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
		<h2>Congressen beheren</h2>
		
		<p>Met dit formulier kunt u de opties en prijzen voor het ASPO congres instellen.</p>

		<p>&nbsp;</p>
		
		<form action="{$phpself}?m=conf&a=editdone" method="POST">
			
			{if $ProdID}
				<input type="hidden" name="ProdID" value="{$ProdID}" />
			{/if}
		
			<div class="col3">
				<label for="Name">Naam:</label>
				<input type="text" class="text" name="Name" id="Name" value="{$Name}" />
				
				<p>
				
				<label for="Location">Locatie:</label>
				<input type="text" class="text" name="Location" id="Location" value="{$Location}" />
				
				<p>
			
				<label for="StartDate">Datum:</label>
				<input type="text" class="text" name="StartDate" id="StartDate" value="{$StartDate}" />			
			</div>
			
					
			<div class="col3">
				<label for="StartReg">Inschrijven vanaf:</label>
				<input type="text" class="text" name="StartReg" id="StartReg" value="{$StartReg}" />
				
				<p>
				
				<label for="EndReg">Inschrijven tot:</label>
				<input type="text" class="text" name="EndReg" id="EndReg" value="{$EndReg}" />
			</div>
			
			<div class="col3R">
				<label for="Remarks">Opmerkingen:</label>
				<textarea name="Remarks" rows="5" maxlength="500" style="height: 161px">{$Remarks}</textarea>		
			</div>
			
			<p class="cb">&nbsp;</p>
			
			<b>Prijzen en opties</b>
			
			<br /><br />
			
			{if $packages}
				<table class="admintable">
					<tr>
						<th width="65%">Beschrijving:</th>
						<th width="10%">Prijs:</th>
						<th width="10%">Inc. lidm.:</th>
						<th width="5%">Std:</th>
						<th width="5%">AiO:</th>
						<th width="5%">Lid:</th>
					</tr>
				
					{foreach from=$packages item=p}
						<tr class="{cycle values='odd,even'}">
							<td><input type="text" class="text" name="{$packvar}[{$p.PackID}][Description]" value="{$p.Description}" {if $p.TimesSold && $LockSold}readonly{/if} /></td>
							<td><input type="text" class="text ar" name="{$packvar}[{$p.PackID}][Price]" value="{$p.Price}" maxlength="3" {if $p.TimesSold && $LockSold}readonly{/if} /></td>
							<td><input type="text" class="text ar" name="{$packvar}[{$p.PackID}][IncMember]" value="{$p.IncMember}" maxlength="4" {if $p.TimesSold && $LockSold}readonly{/if} /></td>
							<td><input type="checkbox" name="{$packvar}[{$p.PackID}][AvStudent]" {if $p.AvStudent}checked{/if} /></td>
							<td><input type="checkbox" name="{$packvar}[{$p.PackID}][AvPhD]" {if $p.AvPhD}checked{/if} /></td>
							<td><input type="checkbox" name="{$packvar}[{$p.PackID}][AvMember]" {if $p.AvMember}checked{/if} /></td>
						</tr>
					
					{/foreach}
			
				</table>
			{else}
				<b>Geen prijzen en opties gevonden!</p>
			{/if}
			
			<p>&nbsp;</p>
			
			<p class="ar">
				<input type="button" class="button" value="Annuleren" onclick="window.location='{$phpself}?m=conf'" />
				&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="submit" class="button" value="Opslaan" />
			</p>
					
		</form>

	</div>
		
</div>
	
{include file="footer.tpl"}