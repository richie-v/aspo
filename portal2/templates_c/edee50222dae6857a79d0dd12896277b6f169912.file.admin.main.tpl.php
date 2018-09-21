<?php /* Smarty version Smarty-3.1.12, created on 2017-10-10 13:09:35
         compiled from "templates/admin.main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:202102569854d5f5e7422263-43740527%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'edee50222dae6857a79d0dd12896277b6f169912' => 
    array (
      0 => 'templates/admin.main.tpl',
      1 => 1507640648,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '202102569854d5f5e7422263-43740527',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54d5f5e74606e0_22224073',
  'variables' => 
  array (
    'user' => 0,
    'phpself' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d5f5e74606e0_22224073')) {function content_54d5f5e74606e0_22224073($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div id="content">
		<h2>Welkom <?php echo $_smarty_tpl->tpl_vars['user']->value;?>
!</h2>
		
		<p>U bent ingelogd als beheerder. U kunt in dit systeem de volgende zaken beheren:</p>
		
		<ul>
			<li>Congressen en congresprijzen
			<li>Prijzen van het lidmaatschap
			<li>Leden
		</ul>
		
		<p>&nbsp;</p>
		
		<div class="infobox">
			Als u de logingegevens zoals e-mailadres, gebruikersnaam of wachtwoord wilt wijzigen, kunt u de link hieronder gebruiken.
			
			<p>
			
			<div class="ar cb">
				<a href="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?a=changelogin">Login wijzigen</a>
			</div>
		</div>
	</div>
		
</div>
	
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>