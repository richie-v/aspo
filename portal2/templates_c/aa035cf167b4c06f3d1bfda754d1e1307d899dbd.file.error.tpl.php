<?php /* Smarty version Smarty-3.1.12, created on 2018-09-21 16:51:24
         compiled from "templates/error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:100127958055c0896853dbc0-92164165%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa035cf167b4c06f3d1bfda754d1e1307d899dbd' => 
    array (
      0 => 'templates/error.tpl',
      1 => 1537541467,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100127958055c0896853dbc0-92164165',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_55c089685c0722_10731677',
  'variables' => 
  array (
    'message' => 0,
    'webmastermail' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c089685c0722_10731677')) {function content_55c089685c0722_10731677($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div id="content">
	
		<h2>Foutmelding</h2>
		
		<p>

		Help! Er is iets fout gegaan...
		
		<div id="error"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div>
		
		<p><a href="mailto:<?php echo $_smarty_tpl->tpl_vars['webmastermail']->value;?>
?subject=Foutmelding%20ASPO%20portal&body=<?php echo rawurlencode($_smarty_tpl->tpl_vars['message']->value);?>
">&gt;&gt; E-mail de webmaster</a></p>
	</div>

</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>