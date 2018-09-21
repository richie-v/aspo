<?php /* Smarty version Smarty-3.1.12, created on 2016-10-25 13:21:28
         compiled from "templates/admin.users.reset.done.tpl" */ ?>
<?php /*%%SmartyHeaderCode:215614332580f4038f0fc55-09128976%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5caf392dbeb4000bdee32a99a6c5ea672db898cc' => 
    array (
      0 => 'templates/admin.users.reset.done.tpl',
      1 => 1423308205,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '215614332580f4038f0fc55-09128976',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'username' => 0,
    'phpself' => 0,
    'userid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_580f4039021ed0_55150259',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580f4039021ed0_55150259')) {function content_580f4039021ed0_55150259($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	
	<div id="content">
	
		<div id="loginframe">
		
		<h2>Lid beheren: <?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</h2>
		
		<p>
		
		Het wachtwoord is van de gebruiker is gereset. De gebruiker heeft een e-mail gekregen met een nieuw tijdelijk wachtwoord.

		<p>

		Met dit tijdelijke wachtwoord kan de gebruiker inloggen waarna het wachtwoord gewijzigd dient te worden.

		<p>
		
		<div class="loginlink">
			<a href="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=users&a=view&uid=<?php echo $_smarty_tpl->tpl_vars['userid']->value;?>
">&gt;&gt; Terug</a>
		</div>

	</div>
		
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>