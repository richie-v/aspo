<?php /* Smarty version Smarty-3.1.12, created on 2018-10-12 15:42:00
         compiled from "templates/admin.users.view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:196967327054d5fa01dfaf23-10539733%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8fd481a3136428794f17fda523e6caf8622bbe3' => 
    array (
      0 => 'templates/admin.users.view.tpl',
      1 => 1537541467,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '196967327054d5fa01dfaf23-10539733',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54d5fa02026045_43100184',
  'variables' => 
  array (
    'user' => 0,
    'orders' => 0,
    'i' => 0,
    'phpself' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d5fa02026045_43100184')) {function content_54d5fa02026045_43100184($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/html/aspo/portal2/includes/smarty/plugins/function.cycle.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div id="content">
		<h2>Lid beheren: <?php echo $_smarty_tpl->tpl_vars['user']->value['Username'];?>
</h2>
		
		<p>
		
		<div class="infobox">
		
			<div style="width: 45%; float:left;">

				<b>Loginnaam:</b><br />
				<?php echo $_smarty_tpl->tpl_vars['user']->value['Username'];?>
<br />
				
				<p>
			
				<b>Naam:</b><br />
				<?php if (!$_smarty_tpl->tpl_vars['user']->value['Name']&&!$_smarty_tpl->tpl_vars['user']->value['Surname']){?>
					Onbekend<br />
				<?php }else{ ?>
					<?php echo $_smarty_tpl->tpl_vars['user']->value['Name'];?>
<?php if ($_smarty_tpl->tpl_vars['user']->value['Prep']){?> <?php echo $_smarty_tpl->tpl_vars['user']->value['Prep'];?>
<?php }?> <?php echo $_smarty_tpl->tpl_vars['user']->value['Surname'];?>
<br />
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['user']->value['Gender']){?>Geslacht: <?php echo $_smarty_tpl->tpl_vars['user']->value['Gender'];?>
<br /><?php }?>

				<p>

				<b>Interessegebieden:</b><br />
				<?php if (!$_smarty_tpl->tpl_vars['user']->value['Interest1']&&!$_smarty_tpl->tpl_vars['user']->value['Interest2']&&!$_smarty_tpl->tpl_vars['user']->value['Interest3']){?>
					Niet ingevuld<br />
				<?php }else{ ?>
					<?php echo $_smarty_tpl->tpl_vars['user']->value['Interest1'];?>
<br />
					<?php echo $_smarty_tpl->tpl_vars['user']->value['Interest2'];?>
<br />
					<?php echo $_smarty_tpl->tpl_vars['user']->value['Interest3'];?>
<br />
				<?php }?>

				<p>

				<b>Dieetvoorkeuren:</b><br />
				<?php if ($_smarty_tpl->tpl_vars['user']->value['Diet']){?>
					<?php echo $_smarty_tpl->tpl_vars['user']->value['Diet'];?>

				<?php }else{ ?>
					Onbekend
				<?php }?>
				<br />
				<?php if ($_smarty_tpl->tpl_vars['user']->value['Allergies']){?>Allergie: <?php echo $_smarty_tpl->tpl_vars['user']->value['Allergies'];?>
<br /><?php }?>
	
			</div>

			<div style="width: 45%; float:right;">
				
				<b>Email:</b><br />
				<?php echo $_smarty_tpl->tpl_vars['user']->value['Email'];?>
<br />
				
				<p>

				<b>Aanstelling:</b><br />
				<?php if (!$_smarty_tpl->tpl_vars['user']->value['Position']&&!$_smarty_tpl->tpl_vars['user']->value['Department']&&!$_smarty_tpl->tpl_vars['user']->value['Affiliation']){?>
					Onbekend<br />
				<?php }else{ ?>
					<?php echo $_smarty_tpl->tpl_vars['user']->value['Position'];?>
<br />
					<?php echo $_smarty_tpl->tpl_vars['user']->value['Department'];?>
<br />
					<?php echo $_smarty_tpl->tpl_vars['user']->value['Affiliation'];?>
<br />
				<?php }?>
				
				<p>
				
				<b>Adres:</b><br />
				<?php if (!$_smarty_tpl->tpl_vars['user']->value['Street']&&!$_smarty_tpl->tpl_vars['user']->value['Number']&&!$_smarty_tpl->tpl_vars['user']->value['Postcode']&&!$_smarty_tpl->tpl_vars['user']->value['City']){?>
					Onbekend<br />
				<?php }else{ ?>
					<?php echo $_smarty_tpl->tpl_vars['user']->value['Street'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['Number'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['Numbersup'];?>
<br />
					<?php echo $_smarty_tpl->tpl_vars['user']->value['Postcode'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['City'];?>
<br />
					<?php echo $_smarty_tpl->tpl_vars['user']->value['CountryName'];?>
<br />
				<?php }?>
				
				<p>
				
				<b>Lidmaatschap:</b><br />
				<?php if ($_smarty_tpl->tpl_vars['user']->value['Membership']){?>
					Betaald voor: <?php echo $_smarty_tpl->tpl_vars['user']->value['Membership'];?>
<br />
				<?php }else{ ?>
					Nog geen lid<br />
				<?php }?>

			</div>

			<br class="cb" />
			
		</div>

		<p>
		
		<div class="col4">
			<input type="button" class="button" value="Wijzigen" onclick="userEdit();" />
		</div>
		<div class="col4 ac">
			<input type="button" class="button" value="E-mailen" onclick="userMail();" />
		</div>
		<div class="col4 ac">
			<input type="button" class="button" value="Reset" onclick="userReset();" />
		</div>
		<div class="col4R ar">
			<input type="button" class="button" value="Verwijderen" onclick="userDelete();" />
		</div>
		
		<p class="cb">&nbsp;</p>
		
		Hieronder ziet u een overzicht van alle betalingen van de gebruiker. U kunt betalingen verwijderen door op het prullenmand-icoon te klikken achter de betaling.
		
		<p>
		
		<?php if ($_smarty_tpl->tpl_vars['orders']->value){?>
			<table class="admintable">
				<tr>
					<th>Product</th>
					<th>Beschrijving</th>
					<th>Prijs</th>
					<th>Datum</th>
					<th>Status</th>
					<th class="ac">Actie</th>
				</tr>
			
				<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['orders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
?>
			
					<tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
						<td><?php echo $_smarty_tpl->tpl_vars['i']->value['Name'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['i']->value['Description'];?>
</td>
						<td>&euro; <?php echo $_smarty_tpl->tpl_vars['i']->value['Price'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['i']->value['Date'];?>
</td>
						<td><?php if ($_smarty_tpl->tpl_vars['i']->value['TransStatus']){?><?php echo $_smarty_tpl->tpl_vars['i']->value['TransStatus'];?>
<?php }else{ ?>Afgebroken<?php }?></td>
						<td class="ac"><img src="icons/delete.png" class="icon" width="16" height="16" border="0" onclick="orderDelete(<?php echo $_smarty_tpl->tpl_vars['i']->value['OrderID'];?>
);" /></td>
					</tr>
	
				<?php } ?>

			</table>

		<?php }else{ ?>

			<p><b>Geen bestellingen gevonden.</b></p>
		
		<?php }?>
		
		<p>
			
	</div>
		
</div>

<script language="javascript">

function userEdit() {
	window.location = '<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=users&a=changeinfo&uid=<?php echo $_smarty_tpl->tpl_vars['user']->value['UserID'];?>
';
}

function userMail() {
	window.location = '<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=users&a=mail&uid=<?php echo $_smarty_tpl->tpl_vars['user']->value['UserID'];?>
';
}

function userReset() {
	if(confirm('Weet u zeker dat u het wachtwoord van de gebruiker wilt resetten?')) {
		window.location = '<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=users&a=reset&uid=<?php echo $_smarty_tpl->tpl_vars['user']->value['UserID'];?>
';
	}
}

function userDelete() {
	if(confirm('Weet u zeker dat u de gebruiker wilt verwijderen?\n\nDeze actie kan niet ongedaan worden gemaakt!')) {
		window.location = '<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=users&a=deluser&uid=<?php echo $_smarty_tpl->tpl_vars['user']->value['UserID'];?>
';
	}
}

function orderDelete($oid) {
	if(confirm('Weet u zeker dat u deze betaling wilt verwijderen?\n\nDeze actie kan niet ongedaan worden gemaakt!')) {
		window.location = '<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=users&a=delorder&oid=' + $oid + '&uid=' + <?php echo $_smarty_tpl->tpl_vars['user']->value['UserID'];?>
;
	}
}

</script>
	
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>