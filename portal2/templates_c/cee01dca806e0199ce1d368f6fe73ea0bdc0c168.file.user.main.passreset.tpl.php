<?php /* Smarty version Smarty-3.1.12, created on 2017-10-17 11:52:56
         compiled from "templates/user.main.passreset.tpl" */ ?>
<?php /*%%SmartyHeaderCode:190048024554d886ff29b917-88941607%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cee01dca806e0199ce1d368f6fe73ea0bdc0c168' => 
    array (
      0 => 'templates/user.main.passreset.tpl',
      1 => 1507640651,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '190048024554d886ff29b917-88941607',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54d886ff2d6815_21172512',
  'variables' => 
  array (
    'phpself' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d886ff2d6815_21172512')) {function content_54d886ff2d6815_21172512($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div id="content">
	
		<h2>Wachtwoord wijzigen</h2>
			
			<p>
			
			Uw wachtwoord is gereset en u heeft een tijdelijk wachtwoord toegestuurd gekregen. Wij vragen u daarom om uw wachtwoord te veranderen met het onderstaande formulier.
		
			<p>&nbsp;</p>
		
			<div style="width: 450px; margin: auto;">
				
				<form id="resetform" action="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=user&a=resetdone" method="POST" data-validate="parsley">

					<div class="loginfield">
						<label for="newpass">Nieuw wachtwoord (min. 5 karakters):</label>
						<input id="newpass" name="newpass" class="password" type="password" value="" data-trigger="change" data-minlength="5" data-required="true" />
					</div>

					<p>
					
					<div class="loginfield">
						<label for="checkpass">Herhaal wachtwoord:</label>
						<input id="checkpass" name="checkpass" class="password" type="password" value="" data-trigger="change" data-required="true" data-equalto="#newpass" data-error-message="Wachtwoorden komen niet overeen." />
					</div>
					
					<p>
					
					<div class="loginbutton">
						<input id="submit" type="submit" class="button fr" value="Wijzigen" />
					</div>
		
				</form>
		
			</div>
				
	</div>

</div>
		
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>