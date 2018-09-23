<?php /* Smarty version Smarty-3.1.12, created on 2018-09-22 00:17:26
         compiled from "templates/admin.conf.view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:134327164754d5f5ec864468-58536957%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c81ed81c686f5438372edc9a4a2033c7e621f8d' => 
    array (
      0 => 'templates/admin.conf.view.tpl',
      1 => 1537564065,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134327164754d5f5ec864468-58536957',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54d5f5ec8e2566_67075621',
  'variables' => 
  array (
    'pinfo' => 0,
    'p' => 0,
    'totprice' => 0,
    'totsold' => 0,
    'phpself' => 0,
    'prid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d5f5ec8e2566_67075621')) {function content_54d5f5ec8e2566_67075621($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/html/aspo/portal2/includes/smarty/plugins/function.cycle.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div id="content">
		<h2>Congressen beheren</h2>
		
		<p>Hieronder kunt u de inschrijvingen voor het congres bekijken en beheren.</p>

		<?php if ($_smarty_tpl->tpl_vars['pinfo']->value){?>
			<table class="admintable">
				<tr>
					<th width="60%">Beschrijving:</th>
					<th width="20%" class="ar">Prijs:</th>
					<th width="20%" class="ar">Aantal:</th>
				</tr>
			
				<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pinfo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
					<tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
						<td><?php echo $_smarty_tpl->tpl_vars['p']->value['Description'];?>
</td>
						<td class="ar">&euro; <?php echo $_smarty_tpl->tpl_vars['p']->value['Price'];?>
</td>
						<td class="ar"><?php echo $_smarty_tpl->tpl_vars['p']->value['TimesSold'];?>
</td>
					</tr>
				<?php } ?>

				<tr class="tf">
					<td>Totaal:</td>
					<td class="ar">&euro; <?php echo $_smarty_tpl->tpl_vars['totprice']->value;?>
</td>
					<td class="ar"><?php echo $_smarty_tpl->tpl_vars['totsold']->value;?>
</td>
				</tr>

			</table>
		
		<?php }else{ ?>
			<b>Geen prijzen en opties gevonden!</b>
		<?php }?>

		<p>&nbsp;</p>
		
		<div class="col4">
			<input type="button" class="button" value="Download" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=conf&a=download&prid=<?php echo $_smarty_tpl->tpl_vars['prid']->value;?>
'" />
		</div>
		<div class="col4 ac">
			<input type="button" class="button" value="E-mailen" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=conf&a=mail&prid=<?php echo $_smarty_tpl->tpl_vars['prid']->value;?>
'" />
		</div>
		<div class="col4 ac">
			<input type="button" class="button" value="Inschrijven" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=conf&a=reg&prid=<?php echo $_smarty_tpl->tpl_vars['prid']->value;?>
'" />
		</div>
		<div class="col4R ar">
			<input type="button" class="button" value="Commissie" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=conf&a=comm&prid=<?php echo $_smarty_tpl->tpl_vars['prid']->value;?>
'" />
		</div>
		
		<p class="cb">&nbsp;</p>
			
	</div>
		
</div>
	
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>