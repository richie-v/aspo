<?php /* Smarty version Smarty-3.1.12, created on 2018-10-12 15:40:08
         compiled from "templates/admin.mship.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7128638954d5f60fcabc91-96678331%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb8f302666991a84c60fe44f9d6df67b103710d4' => 
    array (
      0 => 'templates/admin.mship.tpl',
      1 => 1537541467,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7128638954d5f60fcabc91-96678331',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54d5f60fd2a2d8_73392430',
  'variables' => 
  array (
    'phpself' => 0,
    'msdata' => 0,
    'ms' => 0,
    'LockSold' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d5f60fd2a2d8_73392430')) {function content_54d5f60fd2a2d8_73392430($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/html/aspo/portal2/includes/smarty/plugins/function.cycle.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div id="content">
		<h2>Lidmaatschappen beheren</h2>
		
		<p>Op deze pagina kunt u de lidmaatschapsprijzen beheren. Onderaan de pagina ziet u een overzicht van de reeds ingevoerde jaren. Door op de knop hieronder te klikken kunt u een nieuw lidmaatschap toevoegen.</p>
		
		<p>&nbsp;</p>

		<input type="button" class="button" value="Nieuw invoeren" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=mship&a=new'">
		
		<p>&nbsp;</p>
		
		<?php if ($_smarty_tpl->tpl_vars['msdata']->value){?>
			Overzicht voorgaande jaren:
		
			<p>
			
			<table class="admintable">
				<tr>
					<th width="55%" class="al">Beschrijving:</th>
					<th width="15%" class="ar">Verkocht:</th>
					<th width="15%" class="ar">Acties:</th>
				</tr>
				<?php  $_smarty_tpl->tpl_vars['ms'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ms']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['msdata']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ms']->key => $_smarty_tpl->tpl_vars['ms']->value){
$_smarty_tpl->tpl_vars['ms']->_loop = true;
?>
					<tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
						<td><?php echo $_smarty_tpl->tpl_vars['ms']->value['Name'];?>
</td>
						<td class="ar"><?php echo $_smarty_tpl->tpl_vars['ms']->value['TimesSold'];?>
</td>
						<td class="ar">
							<img src="icons/view.png" class="icon" width="16" height="16" border="0" onclick="doAction('view', <?php echo $_smarty_tpl->tpl_vars['ms']->value['ProdID'];?>
, 0);" alt="Bekijken" />
							<img src="icons/edit.png" class="icon" width="16" height="16" border="0" onclick="doAction('edit', <?php echo $_smarty_tpl->tpl_vars['ms']->value['ProdID'];?>
, 0);" alt="Bewerken" />
							<?php if (($_smarty_tpl->tpl_vars['ms']->value['TimesSold']&&$_smarty_tpl->tpl_vars['LockSold']->value)){?>
								<img src="icons/lock.png" class="icon" width="16" height="16" border="0" onclick="alert('Dit lidmaatschap kan niet worden verwijderd, omdat leden het al hebben aangeschaft!');" alt="Verwijderen" />
							<?php }else{ ?>
								<img src="icons/delete.png" class="icon" width="16" height="16" border="0"  onclick="doAction('delete', <?php echo $_smarty_tpl->tpl_vars['ms']->value['ProdID'];?>
, 'Weet u zeker dat u dit lidmaatschap en alle daaraan gekoppelde gegevens wilt verwijderen?\n\nDeze actie kan niet ongedaan gemaakt worden!');" alt="Verwijderen" />
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
?m=mship&a=' + $action + '&prid=' + $prid;
	}
	else {
		window.location = '<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=mship&a=' + $action + '&prid=' + $prid;
	}
}

</script>	

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>