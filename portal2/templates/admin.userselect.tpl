<table class="admintable hover">
	<thead>
		<tr>
			<th>Gebruiker</th>
			<th>Naam</th>
			<th>Tussenvoegsel</th>
			<th>Achternaam</th>
	</thead>
	<tbody>
	{foreach from=$users item=user}
		<tr class="{cycle values="odd,even"}" onclick = "top.location = '{$phpself}?m={$module}&a={$action}&uid={$user.UserID}&pos={$user.Position}&prid={$prid}'">
			<td>{$user.Username}</td>
			<td>{$user.Name}</td>
			<td>{$user.Prep}</td>
			<td>{$user.Surname}</td>
		</tr>
	{/foreach}
	</tbody>
</table>