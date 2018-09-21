<?php /* Smarty version Smarty-3.1.12, created on 2017-02-23 15:17:31
         compiled from "templates/admin.mship.reg.done.tpl" */ ?>
<?php /*%%SmartyHeaderCode:46387675858aefd0b87f214-53107558%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1eab007228a23197ee70d35eb5fb73474eb6c1c' => 
    array (
      0 => 'templates/admin.mship.reg.done.tpl',
      1 => 1423308205,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '46387675858aefd0b87f214-53107558',
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
  'unifunc' => 'content_58aefd0bcf1497_40158156',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58aefd0bcf1497_40158156')) {function content_58aefd0bcf1497_40158156($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div id="content">
		<h2>Lidmaatschap toegekend</h2>
		
		<p>
		
		Het lidmaatschap is toegekend aan het lid.
		
		<p>
		
		<a href="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=mship&a=view&prid=<?php echo $_smarty_tpl->tpl_vars['prid']->value;?>
">&gt;&gt; Terug naar het overzicht</a>
	
	</div>
		
</div>
	
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>