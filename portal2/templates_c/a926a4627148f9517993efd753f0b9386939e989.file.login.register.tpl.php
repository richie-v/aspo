<?php /* Smarty version Smarty-3.1.12, created on 2018-10-12 15:44:10
         compiled from "templates/login.register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:173161640354d62ca74929d2-47619977%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a926a4627148f9517993efd753f0b9386939e989' => 
    array (
      0 => 'templates/login.register.tpl',
      1 => 1537541467,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '173161640354d62ca74929d2-47619977',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54d62ca74de0d1_82501015',
  'variables' => 
  array (
    'phpself' => 0,
    'regerror' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d62ca74de0d1_82501015')) {function content_54d62ca74de0d1_82501015($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	
	<div id="content">

		<div id="loginframe">
		
			<h2>Registreren</h2>
			
			<form id="registerform" action="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?a=register" method="POST" data-validate="parsley">

				<?php if ($_smarty_tpl->tpl_vars['regerror']->value){?>
				<div class="loginerror">
					<?php echo $_smarty_tpl->tpl_vars['regerror']->value;?>

				</div>
				<?php }?>
				<div class="loginfield">
					<label for="user">Gebruiker:</label>
					<input id="user" name="user" class="text" type="text" value="" data-trigger="change" data-rangelength="[3,20]" data-required="true" />
				</div>

				<div class="loginfield">
					<label for="user">E-mail adres:</label>
					<input id="email" name="email" class="text" type="text" value="" data-trigger="change" data-required="true" data-type="email" />
				</div>

				<div class="loginbutton ar">
					<input id="submit" type="submit" class="button" value="Registreren" />
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