<?php /* Smarty version Smarty-3.1.12, created on 2017-10-19 15:21:47
         compiled from "templates/user.main.changelogin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:68863938755a38186ae56d8-11081302%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ef3afe3dc8ddb66065c2ef3dda95e0f46c929ea' => 
    array (
      0 => 'templates/user.main.changelogin.tpl',
      1 => 1507640651,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '68863938755a38186ae56d8-11081302',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_55a38186b63fd1_13200317',
  'variables' => 
  array (
    'phpself' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a38186b63fd1_13200317')) {function content_55a38186b63fd1_13200317($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div id="content">
		<h2>Login wijzigen</h2>
		
		<form id="changeloginform" action="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=main&a=changelogindone" method="POST" data-validate="parsley">
		
			<p>Met het formulier hieronder kunt u uw logingegevens wijzigen. Velden met een * zijn verplicht.</p>

			
			<p>
			<label for="username">Loginnaam:</label>
			<input id="username" name="username" class="text" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['Username'];?>
" data-trigger="change" data-rangelength="[3,20]" data-required="true" />
			
			<p>
			
			<label for="email">E-mail:</label>
			<input id="email" name="email" class="text" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['Email'];?>
" data-trigger="change" data-required="true" data-type="email" />

			<p>

			<label for="newpass">Nieuw wachtwoord (min. 5 karakters):</label>
			<input id="newpass" name="newpass" class="password" type="password" value="" data-trigger="change" data-minlength="5" data-required="true" />

			<p>

			<label for="checkpass">Herhaal wachtwoord:</label>
			<input id="checkpass" name="checkpass" class="password" type="password" value="" data-trigger="change" data-required="true" data-equalto="#newpass" data-error-message="Wachtwoorden komen niet overeen." />

			<div class="ar">
				<input class="button" type="button" value="Annuleren" onclick="window.location = '<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
';">&nbsp;
				<input class="button" type="submit" value="Wijzigen">
			</div>
			
		</form>
	
	</div>

</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>