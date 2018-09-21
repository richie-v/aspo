<?php /* Smarty version Smarty-3.1.12, created on 2017-10-19 09:35:12
         compiled from "templates/admin.conf.reg.done.tpl" */ ?>
<?php /*%%SmartyHeaderCode:213326619759e871d0de32f8-18032106%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43556ba630af5a0926ebb056436f5afc2b57f75d' => 
    array (
      0 => 'templates/admin.conf.reg.done.tpl',
      1 => 1507640648,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213326619759e871d0de32f8-18032106',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'phpself' => 0,
    'prid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_59e871d0e77641_10258411',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e871d0e77641_10258411')) {function content_59e871d0e77641_10258411($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div id="content">
		<h2>Lid inschrijven</h2>
		
		<p>
		
		Het lid is nu ingeschreven voor het congres.
		
		<p>
		
		<a href="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=conf&a=view&prid=<?php echo $_smarty_tpl->tpl_vars['prid']->value;?>
">&gt;&gt; Terug naar het overzicht</a>
	
	</div>
		
</div>
	
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>