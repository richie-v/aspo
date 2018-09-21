<?php /* Smarty version Smarty-3.1.12, created on 2015-08-06 13:01:02
         compiled from "templates/admin.users.mail.done.tpl" */ ?>
<?php /*%%SmartyHeaderCode:69109488955c33e6e28df14-64656792%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95582e6486ea605e807298d6733d1854f461f836' => 
    array (
      0 => 'templates/admin.users.mail.done.tpl',
      1 => 1423308205,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '69109488955c33e6e28df14-64656792',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'phpself' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_55c33e6e786664_36604757',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c33e6e786664_36604757')) {function content_55c33e6e786664_36604757($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div id="content">
		<h2>Leden mailen</h2>
		
		<p>
		
		De geselecteerde leden zijn gemaild!
		
		<p>
	
		<a href="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=users">&gt;&gt; Terug naar het ledenoverzicht</a>
	
	</div>
		
</div>
	
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>