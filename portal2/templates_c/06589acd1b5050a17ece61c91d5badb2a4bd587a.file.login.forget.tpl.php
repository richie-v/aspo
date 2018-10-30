<?php /* Smarty version Smarty-3.1.12, created on 2018-10-26 10:49:21
         compiled from "templates/login.forget.tpl" */ ?>
<?php /*%%SmartyHeaderCode:99512135254e3d9902fdaf8-78803003%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06589acd1b5050a17ece61c91d5badb2a4bd587a' => 
    array (
      0 => 'templates/login.forget.tpl',
      1 => 1537564065,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99512135254e3d9902fdaf8-78803003',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54e3d99036cbb7_60750504',
  'variables' => 
  array (
    'phpself' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e3d99036cbb7_60750504')) {function content_54e3d99036cbb7_60750504($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	
	<div id="content">
	
		<div id="loginframe">
		
			<h2>Wachtwoord vergeten</h2>
			
			<form id="resetform" action="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?a=forgetdone" method="POST" data-validate="parsley">
				<div class="loginfield">
					<label for="account">Gebruiker of e-mailadres:</label>
					<input id="account" name="account" class="text" type="text" value="" data-trigger="change" data-required="true" />
				</div>
				
				<div class="loginbutton ar">
					<input id="submit" class="button" type="submit" value="Gegevens opvragen" />
				</div>
			</form>

			<div class="loginlink">
				<a href="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
">&gt;&gt; Annuleren</a>
			</div>

		</div>
	
	</div>
	
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>