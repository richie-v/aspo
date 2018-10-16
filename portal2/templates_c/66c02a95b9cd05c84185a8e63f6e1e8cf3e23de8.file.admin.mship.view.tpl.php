<?php /* Smarty version Smarty-3.1.12, created on 2018-10-12 15:41:55
         compiled from "templates/admin.mship.view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11676099654d5f7eb837786-04031212%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66c02a95b9cd05c84185a8e63f6e1e8cf3e23de8' => 
    array (
      0 => 'templates/admin.mship.view.tpl',
      1 => 1537541467,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11676099654d5f7eb837786-04031212',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54d5f7eb8a9396_56496857',
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
<?php if ($_valid && !is_callable('content_54d5f7eb8a9396_56496857')) {function content_54d5f7eb8a9396_56496857($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/html/aspo/portal2/includes/smarty/plugins/function.cycle.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div id="content">
		<h2>Lidmaatschap beheren</h2>
		
		<p>Hieronder kunt u het lidmaatschap bekijken en beheren.</p>

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
		
		<p class="ar">
			<input type="button" class="button" value="Toekennen" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=mship&a=reg&prid=<?php echo $_smarty_tpl->tpl_vars['prid']->value;?>
'" />
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="button" class="button" value="Download" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=mship&a=download&prid=<?php echo $_smarty_tpl->tpl_vars['prid']->value;?>
'" />
		</p>
		
		<p class="cb">&nbsp;</p>
			
	</div>
		
</div>
	
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>