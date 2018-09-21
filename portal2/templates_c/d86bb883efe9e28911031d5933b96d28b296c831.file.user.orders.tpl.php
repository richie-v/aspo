<?php /* Smarty version Smarty-3.1.12, created on 2017-10-11 17:36:50
         compiled from "templates/user.orders.tpl" */ ?>
<?php /*%%SmartyHeaderCode:146347261054d5f655728650-00638603%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd86bb883efe9e28911031d5933b96d28b296c831' => 
    array (
      0 => 'templates/user.orders.tpl',
      1 => 1507640651,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '146347261054d5f655728650-00638603',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54d5f655799eb9_39638098',
  'variables' => 
  array (
    'orders' => 0,
    'i' => 0,
    'phpself' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d5f655799eb9_39638098')) {function content_54d5f655799eb9_39638098($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div id="content">
		
		<h2>Betalingsoverzicht</h2>
		
		<p>Hieronder ziet u een overzicht van alle betalingen die u aan de ASPO heeft gedaan:</p>
		
		<p>&nbsp;</p>
		
	<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['orders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
?>
			<div class="infobox">
				<table class="ordertable">
					<tr>
						<th colspan="3"><?php echo $_smarty_tpl->tpl_vars['i']->value['Name'];?>
</th>
						<th class="ar"><?php if ($_smarty_tpl->tpl_vars['i']->value['TransStatus']=='Success'){?><a href="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=orders&a=pdf&id=<?php echo $_smarty_tpl->tpl_vars['i']->value['OrderID'];?>
" class="button white" target="_blank">PDF</a><?php }?></th>
					</tr><tr>
						<td width="15%">Beschrijving:</td>
						<td width="65%"><?php echo $_smarty_tpl->tpl_vars['i']->value['Description'];?>
</td>
						<td width="10%">Prijs:</td>
						<td width="10%" class="ar">&euro; <?php echo $_smarty_tpl->tpl_vars['i']->value['Price'];?>
</td>
					</tr><tr>
						<td>Datum:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['i']->value['Date'];?>
</td>
						<td>Status:</td>
						<td class="ar"><?php if ($_smarty_tpl->tpl_vars['i']->value['TransStatus']){?><?php echo $_smarty_tpl->tpl_vars['i']->value['TransStatus'];?>
<?php }else{ ?>Afgebroken<?php }?></td>
					</tr>
				</table>
			</div>
			
			<p>&nbsp;</p>
		<?php }
if (!$_smarty_tpl->tpl_vars['i']->_loop) {
?>
			<div class="infobox">
				<p><b>Geen betalingen gevonden.</b></p>
			</div>
		<?php } ?>
			
	</div>

</div>
	
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>