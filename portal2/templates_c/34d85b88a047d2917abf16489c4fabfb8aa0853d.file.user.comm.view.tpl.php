<?php /* Smarty version Smarty-3.1.12, created on 2017-10-19 08:57:22
         compiled from "templates/user.comm.view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:135792526454d5f75cc98e94-87019976%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '34d85b88a047d2917abf16489c4fabfb8aa0853d' => 
    array (
      0 => 'templates/user.comm.view.tpl',
      1 => 1507640650,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '135792526454d5f75cc98e94-87019976',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54d5f75cd50578_26901152',
  'variables' => 
  array (
    'pinfo' => 0,
    'p' => 0,
    'TotPrice' => 0,
    'TotSold' => 0,
    'phpself' => 0,
    'ProdID' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d5f75cd50578_26901152')) {function content_54d5f75cd50578_26901152($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/home/aspo/public_html/portal2/includes/smarty/plugins/function.cycle.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div id="content">
		<h2>Commissies</h2>
		
		<p>Hieronder kunt u de inschrijvingen voor het congres bekijken.</p>

		<?php if ($_smarty_tpl->tpl_vars['pinfo']->value){?>
			<table class="usertable">
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
					<td class="ar">&euro; <?php echo $_smarty_tpl->tpl_vars['TotPrice']->value;?>
</td>
					<td class="ar"><?php echo $_smarty_tpl->tpl_vars['TotSold']->value;?>
</td>
				</tr>

			</table>
		
		<?php }else{ ?>
			<b>Geen prijzen en opties gevonden!</b>
		<?php }?>

		<p>&nbsp;</p>
		
		<input type="button" class="button" value="Download" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=comm&a=download&prid=<?php echo $_smarty_tpl->tpl_vars['ProdID']->value;?>
'" />
		&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" class="button" value="E-mailen" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=comm&a=mail&prid=<?php echo $_smarty_tpl->tpl_vars['ProdID']->value;?>
'" />
			
	</div>
		
</div>
	
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>