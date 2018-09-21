<?php /* Smarty version Smarty-3.1.12, created on 2017-10-15 08:35:16
         compiled from "templates/login.register.done.tpl" */ ?>
<?php /*%%SmartyHeaderCode:119157791354d8860f4927d7-62019980%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e3ab88b2c7e6757cf00387721f031c0138ca4ff' => 
    array (
      0 => 'templates/login.register.done.tpl',
      1 => 1507640650,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '119157791354d8860f4927d7-62019980',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54d8860f4a5c16_67528816',
  'variables' => 
  array (
    'email' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d8860f4a5c16_67528816')) {function content_54d8860f4a5c16_67528816($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	
	<div id="content">

		<div id="loginframe">

			<h2>Registreren</h2>
		
			<div class="logintext">
		
				<p>Een e-mail met uw inloggegevens is verstuurd naar: <?php echo $_smarty_tpl->tpl_vars['email']->value;?>
.</p>

				<p>De gegevens uit die e-mail stellen u in staat om uw account te activeren.

				<p>Controleer uw e-mail om verder te gaan.</p>
			
			</div>

		</div>
	
	</div>

</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>