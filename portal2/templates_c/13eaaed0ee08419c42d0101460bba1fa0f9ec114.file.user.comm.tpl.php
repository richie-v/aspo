<?php /* Smarty version Smarty-3.1.12, created on 2015-11-26 11:00:01
         compiled from "templates/user.comm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14270419005656d8218bb362-37622854%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '13eaaed0ee08419c42d0101460bba1fa0f9ec114' => 
    array (
      0 => 'templates/user.comm.tpl',
      1 => 1423308206,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14270419005656d8218bb362-37622854',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'products' => 0,
    'phpself' => 0,
    'p' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5656d82259f092_57133952',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5656d82259f092_57133952')) {function content_5656d82259f092_57133952($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div id="content">
		<h2>Commissies</h2>
		
		<p>
		
		U organiseert meerdere congressen. Kies hieronder welk congres u wilt bekijken.
		
		<p>

		<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
			
			<div>
				<a href="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=comm&a=view&prid=<?php echo $_smarty_tpl->tpl_vars['p']->value['ProdID'];?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value['Name'];?>
</a>
			</div>
		<?php }
if (!$_smarty_tpl->tpl_vars['p']->_loop) {
?>
			<b>Geen commissie gevonden waar u deel van uitmaakt!</b>
		<?php } ?>

	</div>
		
</div>
	
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>