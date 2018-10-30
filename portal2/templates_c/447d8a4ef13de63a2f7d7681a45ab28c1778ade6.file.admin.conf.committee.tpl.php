<?php /* Smarty version Smarty-3.1.12, created on 2018-10-24 19:37:11
         compiled from "templates/admin.conf.committee.tpl" */ ?>
<?php /*%%SmartyHeaderCode:73419389054d5f7b70f6327-92218621%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '447d8a4ef13de63a2f7d7681a45ab28c1778ade6' => 
    array (
      0 => 'templates/admin.conf.committee.tpl',
      1 => 1537564065,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '73419389054d5f7b70f6327-92218621',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54d5f7b716ff21_84857646',
  'variables' => 
  array (
    'prid' => 0,
    'comm' => 0,
    'c' => 0,
    'phpself' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d5f7b716ff21_84857646')) {function content_54d5f7b716ff21_84857646($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/html/aspo/portal2/includes/smarty/plugins/function.cycle.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<script>
	//function to request user data from the server
	function getUsers() {
		//get search parameters
		var uname = document.getElementById('uname').value;
	
		//request user data
		$("#ubrowser").load("index.php?m=conf&a=scu&prid=<?php echo $_smarty_tpl->tpl_vars['prid']->value;?>
&n=" + uname);
	}
</script>

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div id="content">
		<h2>Congressen beheren</h2>
		
		<p>
		
		Hieronder staan de leden die deel uitmaken van de organisatie-commissie van dit congres. U kunt leden verwijderen uit de commissie door op het prullenmand-icoontje te klikken achter het lid.
		
		<p>&nbsp;</p>
		
		<?php if ($_smarty_tpl->tpl_vars['comm']->value){?>
			<table class="admintable">
				<tr>
					<th>Lid:</th>
					<th>Naam:</th>
					<th>&nbsp;</th>
					<th>Achternaam:</th>
					<th>E-mail:</th>
					<th class="ac">Actie:</th>
				</tr>
			
				<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comm']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
					<tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
						<td><?php echo $_smarty_tpl->tpl_vars['c']->value['Username'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['c']->value['Name'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['c']->value['Prep'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['c']->value['Surname'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['c']->value['Email'];?>
</td>
						<td class="ac"><img src="icons/delete.png" class="icon" width="16" height="16" border="0" alt="Verwijderen" onclick="window.location = '<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=conf&a=commdel&prid=<?php echo $_smarty_tpl->tpl_vars['prid']->value;?>
&uid=<?php echo $_smarty_tpl->tpl_vars['c']->value['UserID'];?>
';" /></td>
					</tr>
				<?php } ?>

			</table>
		
		<?php }else{ ?>
			<b>Er zitten nog geen leden in de commissie.</b>
		<?php }?>

		<p>&nbsp;</p>
		
		Met dit formulier kunt u leden zoeken en toevoegen aan de commissie. U zoeken naar leden door hun naam in te vullen. Daarna kunt u &eacute;&eacute;n lid selecteren en toevoegen.
		
		<p>
		
		Zoek op naam:<br />
		
		<input type="text" class="text" id="uname" value="" style="width: 250px;" />&nbsp;
		<input type="button" class="button" value="Zoeken" onclick="getUsers()" />

		<p style="clear: both;">&nbsp;</p>
		
		<div id="ubrowser">
			<!-- User data is inserted through AJAX calls here -->
		</div>
		
		<p class="ar">
			<input type="button" class="button" value="Annuleren" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=conf&a=view&prid=<?php echo $_smarty_tpl->tpl_vars['prid']->value;?>
'" />
		</p>
		
	</div>
		
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>