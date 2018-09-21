<table class="admintable hover">
	<thead>
		<tr>
			<th>Gebruiker</th>
			<th>Naam</th>
			<th>Tussenvoegsel</th>
			<th>Achternaam</th>
			<th>Lidmaatschap</th>
			<th>Login</th>
	</thead>
	<tbody>
	{foreach from=$users item=user}
		<tr class="{cycle values="odd,even"}" onclick = "top.location = '{$phpself}?m={$module}&a={$action}&uid={$user.UserID}'">
			<td><input type="hidden" name="ids[]" value="{$user.UserID}" />{$user.Username}</td>
			<td>{$user.Name}</td>
			<td>{$user.Prep}</td>
			<td>{$user.Surname}</td>
			<td>{$user.Membership}</td>
			<td>{$user.LastLogin}</td>
		</tr>
	{/foreach}
	</tbody>
</table>