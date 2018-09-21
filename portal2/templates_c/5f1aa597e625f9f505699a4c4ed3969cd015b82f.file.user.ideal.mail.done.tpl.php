<?php /* Smarty version Smarty-3.1.12, created on 2017-10-20 09:16:29
         compiled from "templates/user.ideal.mail.done.tpl" */ ?>
<?php /*%%SmartyHeaderCode:196157660954e3062f09ff79-66020894%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f1aa597e625f9f505699a4c4ed3969cd015b82f' => 
    array (
      0 => 'templates/user.ideal.mail.done.tpl',
      1 => 1507640650,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '196157660954e3062f09ff79-66020894',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54e3062f0b8bf7_68426504',
  'variables' => 
  array (
    'email' => 0,
    'phpself' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e3062f0b8bf7_68426504')) {function content_54e3062f0b8bf7_68426504($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div id="content">
	
		<h2>iDeal betaling</h2>
		
		<p>
		
		Een e-mail ter bevestiging van uw aankoop is verstuurd naar: <?php echo $_smarty_tpl->tpl_vars['email']->value;?>
. 
			
		<p>
			
		Een overzicht van al uw betalingen kunt u vinden via het menu of via de knop hieronder. Hier kunt u ook een factuur als PDF downloaden.
			
		<p>&nbsp</p>
			
		<p>
			<input type="button" class="button" value="Naar betalingen" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=orders'" />
		</p>
		
	</div>
	
<div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>