<?php /* Smarty version Smarty-3.1.12, created on 2017-10-18 20:48:00
         compiled from "templates/admin.conf.tpl" */ ?>
<?php /*%%SmartyHeaderCode:47711777854d5f5e9825287-28240636%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '187f8d58007e62e46e622b015b7198e551b0f9cc' => 
    array (
      0 => 'templates/admin.conf.tpl',
      1 => 1507640648,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47711777854d5f5e9825287-28240636',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54d5f5e98a2523_96927000',
  'variables' => 
  array (
    'phpself' => 0,
    'cdata' => 0,
    'c' => 0,
    'LockSold' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d5f5e98a2523_96927000')) {function content_54d5f5e98a2523_96927000($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/home/aspo/public_html/portal2/includes/smarty/plugins/function.cycle.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div id="content">
		<h2>Congressen beheren</h2>
		
		<p>Op deze pagina kunt u congressen beheren. Onderaan de pagina ziet u een overzicht van de congressen. U kunt deze bewerken of de lijst met ingeschreven deelnemers opvragen. Met de knop hieronder kunt u een nieuw congres invoeren.</p>
		
		<p>&nbsp;</p>

		<input type="button" class="button" value="Nieuw invoeren" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=conf&a=new'">
		
		<p>&nbsp;</p>
		
		<?php if (isset($_smarty_tpl->tpl_vars['cdata']->value)){?>
			Overzicht congressen:
		
			<p>
			
			<table class="admintable">
				<tr>
					<th width="55%" class="al">Titel:</th>
					<th width="15%" class="ar">Verkocht:</th>
					<th width="15%" class="ar">Acties:</th>
				</tr>
				<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cdata']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
					<tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
						<td><?php echo $_smarty_tpl->tpl_vars['c']->value['Name'];?>
</td>
						<td class="ar"><?php echo $_smarty_tpl->tpl_vars['c']->value['TimesSold'];?>
</td>
						<td class="ar">
							<img src="icons/view.png" class="icon" width="16" height="16" border="0" onclick="doAction('view', <?php echo $_smarty_tpl->tpl_vars['c']->value['ProdID'];?>
, 0);" alt="Bekijken" />
							<img src="icons/edit.png" class="icon" width="16" height="16" border="0" onclick="doAction('edit', <?php echo $_smarty_tpl->tpl_vars['c']->value['ProdID'];?>
, 0);" alt="Bewerken" />
							<?php if (($_smarty_tpl->tpl_vars['c']->value['TimesSold']&&$_smarty_tpl->tpl_vars['LockSold']->value)){?>
								<img src="icons/lock.png" class="icon" width="16" height="16" border="0" onclick="alert('Dit congres kan niet worden verwijderd, omdat leden zich al hebben ingeschreven!');" alt="Verwijderen" />
							<?php }else{ ?>
								<img src="icons/delete.png" class="icon" width="16" height="16" border="0"  onclick="doAction('delete', <?php echo $_smarty_tpl->tpl_vars['c']->value['ProdID'];?>
, 'Weet u zeker dat u dit congres en alle daaraan gekoppelde gegevens wilt verwijderen?\n\nDeze actie kan niet ongedaan gemaakt worden!');" alt="Verwijderen" />
							<?php }?>
						</td>
					</tr>
				<?php } ?>
			</table>

		<?php }?>
		
	</div>
		
</div>

<script language="javascript">

function doAction($action, $prid, $confirm) {
	if($confirm) {
		if(confirm($confirm))
			window.location = '<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=conf&a=' + $action + '&prid=' + $prid;
	}
	else {
		window.location = '<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=conf&a=' + $action + '&prid=' + $prid;
	}
}

</script>
	
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>