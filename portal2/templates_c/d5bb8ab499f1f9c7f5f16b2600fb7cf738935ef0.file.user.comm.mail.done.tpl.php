<?php /* Smarty version Smarty-3.1.12, created on 2015-11-30 10:19:57
         compiled from "templates/user.comm.mail.done.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1003396026565c14bd5265f5-65749023%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5bb8ab499f1f9c7f5f16b2600fb7cf738935ef0' => 
    array (
      0 => 'templates/user.comm.mail.done.tpl',
      1 => 1423308206,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1003396026565c14bd5265f5-65749023',
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
  'unifunc' => 'content_565c14bd59d8c1_50092802',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565c14bd59d8c1_50092802')) {function content_565c14bd59d8c1_50092802($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div id="content">
		<h2>Ingeschreven leden mailen</h2>
		
		<p>
		
		De ingeschreven leden van het congres zijn gemaild!
		
		<p>
	
		<a href="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=comm&a=view&prid=<?php echo $_smarty_tpl->tpl_vars['prid']->value;?>
">&gt;&gt; Terug naar het overzicht</a>
	
	</div>
		
</div>
	
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>