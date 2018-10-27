{include file="header.tpl"}

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	{include file="navmenu.tpl"}

	<div id="content">
	
		<h2>Membership</h2>
		
		<p>

	{if $position == 'Student'}

		Studenten kunnen helaas geen lid worden van de ASPO. Studenten kunnen zich wel inschrijven voor het jaarlijkse ASPO-congres, zie hiervoor de Congres-pagina.  Het congres wordt ieder jaar in december gehouden.

	{else}

		{if !$membership}
			Here you can apply for ASPO membership. Membership runs from January 1 to December 31. By becoming a member you support the ASPO, receive the newsletter, and have access to symposia organized by the ASPO. 
		
		{else if $membership < $curryear}

			Momenteel bent u geen lid van de ASPO. Op deze pagina kunt u weer lid worden van de ASPO. Het lidmaatschap is geldig van <b>1 januari tot 31 december</b>. Door lid te worden steunt u de ASPO, ontvangt u de nieuwsbrief en krijgt u toegang tot symposia die door de ASPO georganiseerd worden.

		{else if $membership >= $curryear}

			Momenteel bent u al lid van de ASPO. U kunt deze pagina gebruiken om uw lidmaatschap te verlengen zodra het nieuwe lidmaatschap beschikbaar is. Het lidmaatschap is geldig van <b>1 januari tot 31 december</b>. Door lid te worden steunt u de ASPO, ontvangt u de nieuwsbrief en krijgt u toegang tot symposia die door de ASPO georganiseerd worden.

		{/if}

		<p>
		<div class="notification"><b>IMPORTANT NOTE:</b> You can also become a member by attending the annual ASPO conference. The ASPO conference fee includes a free ASPO membership.  </div>
		
	{/if}
		
	<p>&nbsp;</p>
	
	{if $order}

		<form action="{$phpself}?m=ideal" method="post">
			<div class="infobox">
				<div class="fl">
					<input type="hidden" name="packID" value="{$order.PackID}" />
					<b>{$order.Description}</b><br />
					Prijs: &euro; {$order.Price}<br />
				</div>
				<div class="fr">	
					<input type="submit" class="button white" value="Lid worden" />
				</div>
				<br style="clear: both;" />
			</div>
		</form>
	{/if}
	
	</div>
	
<div>

{include file="footer.tpl"}
