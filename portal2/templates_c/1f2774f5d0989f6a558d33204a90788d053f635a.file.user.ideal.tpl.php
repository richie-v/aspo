<?php /* Smarty version Smarty-3.1.12, created on 2017-10-18 20:54:52
         compiled from "templates/user.ideal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:206203228154d609834fa412-87065775%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f2774f5d0989f6a558d33204a90788d053f635a' => 
    array (
      0 => 'templates/user.ideal.tpl',
      1 => 1507640650,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '206203228154d609834fa412-87065775',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54d6098355ed03_85053005',
  'variables' => 
  array (
    'issuerdata' => 0,
    'package' => 0,
    'phpself' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d6098355ed03_85053005')) {function content_54d6098355ed03_85053005($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home/aspo/public_html/portal2/includes/smarty/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div id="content">
	
		<h2>iDeal betaling</h2>
		
		<p>
		<?php if (count($_smarty_tpl->tpl_vars['issuerdata']->value)){?>
			U gaat het volgende afrekenen:
			
			<p>
			
			<div class="infobox">
				<?php echo $_smarty_tpl->tpl_vars['package']->value['Description'];?>

				<div class="fr">Prijs: &euro; <?php echo $_smarty_tpl->tpl_vars['package']->value['Price'];?>
</div>
			</div>
			
			<p>

			<form action="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=ideal&a=st" method="POST">
		
				Selecteer uw bank:
				
				<input type="hidden" name="packID" value="<?php echo $_smarty_tpl->tpl_vars['package']->value['PackID'];?>
" />

				<?php echo smarty_function_html_options(array('name'=>'issuerID','options'=>$_smarty_tpl->tpl_vars['issuerdata']->value,'style'=>"width: 50%;"),$_smarty_tpl);?>


				<input type="submit" class="button fr" value="Betalen" />
			
			</form>
		<?php }else{ ?>
			
			<div id="error">Uw bankgegevens konden niet worden opgehaald! Probeer het later nogmaals.</div>
			
		<?php }?>
			
	</div>
	
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>