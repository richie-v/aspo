<?php /* Smarty version Smarty-3.1.12, created on 2017-10-18 12:04:27
         compiled from "templates/login.forget.done.tpl" */ ?>
<?php /*%%SmartyHeaderCode:48643734954f49328ad8c80-42327115%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7b313ed0dd855a35a9de2d912025ac5f997016c' => 
    array (
      0 => 'templates/login.forget.done.tpl',
      1 => 1507640649,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48643734954f49328ad8c80-42327115',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54f49328af8102_11937702',
  'variables' => 
  array (
    'error' => 0,
    'phpself' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54f49328af8102_11937702')) {function content_54f49328af8102_11937702($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	
	<div id="content">
	
		<div id="loginframe">
		
		<h2>Wachtwoord vergeten</h2>
		
		<?php if ($_smarty_tpl->tpl_vars['error']->value){?>
			<div class="loginerror">
				<p>Er kon geen account gevonden worden met de door u versterkte gegevens.</p>
			</div>
		<?php }else{ ?>
			<div class="logintext">
				
				<p>Een e-mail met de logingegevens van uw account is naar uw e-mailadres verstuurd.</p>

				<p>Controleer uw e-mail en log opnieuw in.</p>
			</div>
		<?php }?>
		
		<div class="loginlink">
			<a href="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?a=login">&gt;&gt; Terug</a>
		</div>

	</div>
		
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>