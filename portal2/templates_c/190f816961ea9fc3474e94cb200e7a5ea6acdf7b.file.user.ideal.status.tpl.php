<?php /* Smarty version Smarty-3.1.12, created on 2017-10-20 09:16:20
         compiled from "templates/user.ideal.status.tpl" */ ?>
<?php /*%%SmartyHeaderCode:65725477954d60996793d16-57488976%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '190f816961ea9fc3474e94cb200e7a5ea6acdf7b' => 
    array (
      0 => 'templates/user.ideal.status.tpl',
      1 => 1507640650,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65725477954d60996793d16-57488976',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54d609967f35b8_87236632',
  'variables' => 
  array (
    'transstatus' => 0,
    'phpself' => 0,
    'orderid' => 0,
    'webmastermail' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d609967f35b8_87236632')) {function content_54d609967f35b8_87236632($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div id="content">
	
		<h2>iDeal betaling</h2>
		
		<p>
		
		<?php if ($_smarty_tpl->tpl_vars['transstatus']->value=='Success'){?>
		
			Uw betaling is voltooid! U kunt een overzicht van al uw betalingen vinden via het menu of via de knop hieronder. U kunt ook een bevestiging van uw bestelling aanvragen per e-mail.
			
			<p>&nbsp</p>
			
			<p>
				<input type="button" class="button" value="Naar betalingen" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=orders'" />
				&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="button" class="button" value="Stuur bevestiging" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=ideal&a=confirm&id=<?php echo $_smarty_tpl->tpl_vars['orderid']->value;?>
'" />
			</p>
		
		<?php }elseif($_smarty_tpl->tpl_vars['transstatus']->value=='Open'){?>

			Uw betaling is nog in behandeling bij de bank. Om middernacht zal de status van uw betaling opnieuw worden gecontroleerd.
			
			<p>
			
			U kunt morgen in het betalingsoverzicht controleren of uw betaling gelukt is. Zo niet, neem dan contact op met de webmaster: <a href="mailto:<?php echo $_smarty_tpl->tpl_vars['webmastermail']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['webmastermail']->value;?>
</a>.
		
		<?php }else{ ?>
			
			Uw betaling is niet gelukt! Het kan zijn dat uw betaling te lang duurde of dat er een fout is opgetreden bij de bank.
			
			<p>
			
			Probeer nogmaals te betalen of neem contact op met de webmaster: <a href="mailto:<?php echo $_smarty_tpl->tpl_vars['webmastermail']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['webmastermail']->value;?>
</a>.
			
		<?php }?>
		
	</div>
	
<div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>