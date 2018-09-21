<?php /* Smarty version Smarty-3.1.12, created on 2017-10-17 11:53:05
         compiled from "templates/user.main.passreset.done.tpl" */ ?>
<?php /*%%SmartyHeaderCode:114480433854d8870ad03730-41261779%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0938ebe05390de107fc53c545f9a440b416d2a93' => 
    array (
      0 => 'templates/user.main.passreset.done.tpl',
      1 => 1507640651,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114480433854d8870ad03730-41261779',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54d8870ad52a06_25222996',
  'variables' => 
  array (
    'error' => 0,
    'phpself' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d8870ad52a06_25222996')) {function content_54d8870ad52a06_25222996($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div id="content">
	

		<?php if ($_smarty_tpl->tpl_vars['error']->value){?>
			<h2>Wachtwoord fout</h2>
			
			<p><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
			
			<a href="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=user&a=passreset">&gt;&gt; Opnieuw proberen</a>
		<?php }else{ ?>
			<h2>Wachtwoord gewijzigd</h2>

			<p>Uw wachtwoord is gewijzigd!</p>
			
			<p><a href="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
">&gt; &gt; Ga verder naar de portal</a>
		<?php }?>

	</div>

</div>
		
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>