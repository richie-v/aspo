<?php /* Smarty version Smarty-3.1.12, created on 2018-09-22 00:16:55
         compiled from "templates/admin.users.tpl" */ ?>
<?php /*%%SmartyHeaderCode:203198904154d5f5ef52e240-90915713%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a96a8d0098d5c18e2ae95e389003d1d6ea484adf' => 
    array (
      0 => 'templates/admin.users.tpl',
      1 => 1537564065,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203198904154d5f5ef52e240-90915713',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54d5f5ef578205_17550461',
  'variables' => 
  array (
    'phpself' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d5f5ef578205_17550461')) {function content_54d5f5ef578205_17550461($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<script>
	timer = null;
	values = { uname: "", mmin: "", mmax: "" };	
	
	function poll() {
		for(var i in values) {
			var elem = document.getElementById(i);
			if(!elem) continue;
			
			if(elem.value != values[i]) {
				values[i] = elem.value;
				getUsers();
			}
		}
	}
	
	//submit form
	function doSubmit(action) {
		//set action
		form = document.getElementById('userform');
		form.action = '<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=users&a=' + action;
		
		//submit the form
		form.submit();
	}
	
	//function to request user data from the server
	function getUsers() {
		//set loading text
		obj = document.getElementById('ubrowser');
		obj.innerHTML = '<p><b>Bezig met zoeken... Even geduld a.u.b.</b></p>';
		
		//get search parameters
		uname = document.getElementById('uname').value;
		
		//get membership minimum
		mmin = document.getElementById('mmin').value;
		
		//get membership maximum
		mmax = document.getElementById('mmax').value;
		
		//get sort criterium
		obj = document.getElementById('sort');
		sort = obj.options[obj.selectedIndex].value;

		//get sort order
		obj = document.getElementById('order');
		order = obj.options[obj.selectedIndex].value;

		//request user data
		$("#ubrowser").load("<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=users&a=gu&uname=" + uname + "&mmin=" + mmin + "&mmax=" + mmax + "&sort=" + sort + "&order=" + order);
	}
	
	//call it when document is loaded
	$(document).ready(function() {
		//get list of users
		getUsers();
		
		//check for input changes
		timer = setInterval(poll, 1000);
	});
</script>

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div id="content">
		<h2>Leden beheren</h2>
		
		<p>
	
		Hieronder ziet u een overzicht van alle ASPO leden. Met het formulier kunt u zoekcriteria instellen, waarna de lijst zal worden bijgewerkt. Als u op een lid klikt, kunt u de gegevens van dat lid bekijken en eventueel aanpassen.

		<p>

		Onderaan de lijst ziet u drie knoppen. Met deze knoppen kunt u de gegevens van de leden downloaden, de leden e-mailen of de leden verwijderen.
	
		<p>
	
		<form id="userform" action="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=users" method="POST">
			
			<div style="width: 30%; float: left; margin-right: 5%;">
				Zoek op naam:<br />
				<input type="text" class="text" id="uname" name="uname" value="" onchange="getUsers();" />
			</div>

			<div style="width: 30%; float: left;">
				Laatste lidmaatschap vanaf:<br />
				<input type="text" class="text" id="mmin" name="mmin" value="" onchange="getUsers();" />
			</div>

			<div style="width: 30%; float: right;">
				Laatste lidmaatschap tot:<br />
				<input type="text" class="text" id="mmax" name="mmax" value="" onchange="getUsers();" />
			</div>

			<p style="clear: both;">&nbsp;</p>

			<div style="width: 30%; float: left; margin-right: 5%;">
				Sorteren op:
			</div>

			<div style="width: 30%; float: left;">
				<select name="sort" id="sort" onchange="getUsers()">
					<option value="Username">Gebruiker</option>
					<option value="Name">Naam</option>
					<option value="Surname" selected>Achternaam</option>
					<option value="Membership">Lidmaatschap</option>
					<option value="LastLogin">Login</option>
				</select>
			</div>

			<div style="width: 30%; float: right;">
				<select name="order" id="order" onchange="getUsers()">
					<option value="ASC">Oplopend</option>
					<option value="DESC">Aflopend</option>
				</select>
			</div>

			<p style="clear: both;">&nbsp;</p>
			
			<div id="ubrowser">
				<!-- User data is inserted through AJAX calls here -->
			</div>
				
			<p>&nbsp;</p>	
			
			<p class="ar">
				<input type="button" class="button" value="Downloaden" onclick="doSubmit('download')" />
				&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="button" class="button" value="E-mailen" onclick="doSubmit('mail')" />
			</p>
			
		</form>
			
	</div>
		
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>