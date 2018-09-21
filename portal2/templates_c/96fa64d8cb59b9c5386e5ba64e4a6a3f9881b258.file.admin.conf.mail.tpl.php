<?php /* Smarty version Smarty-3.1.12, created on 2015-08-04 11:44:03
         compiled from "templates/admin.conf.mail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:62271434255c08963600cf0-70504726%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '96fa64d8cb59b9c5386e5ba64e4a6a3f9881b258' => 
    array (
      0 => 'templates/admin.conf.mail.tpl',
      1 => 1423308205,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '62271434255c08963600cf0-70504726',
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
  'unifunc' => 'content_55c08963669459_94490412',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c08963669459_94490412')) {function content_55c08963669459_94490412($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div id="content">
		<h2>Ingeschreven leden mailen</h2>
		
		<p>
		
		Met dit formulier kunt u <u>alle ingeschreven leden</u> een e-mail sturen.
		
		<p>
		
		<form action="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=conf&a=maildone&prid=<?php echo $_smarty_tpl->tpl_vars['prid']->value;?>
" method="POST" enctype="multipart/form-data" data-validate="parsley">
		
			<label for="fromname">Naam afzender:</label>
			<input type="text" class="text" name="fromname" id="fromname" value="ASPO" data-trigger="change" data-required="true" />
			
			<p>
			
			<label for="from">E-mail afzender:</label>
			<input type="text" class="text" name="from" id="from" value="info@sociale-psychologie.nl" data-trigger="change" data-required="true" />
			
			<p>
		
			<label for="subject">Onderwerp:</label>
			<input type="text" class="text" name="subject" id="subject" value="" data-trigger="change" data-required="true" />
			
			<p>
			
			<label for="body">Bericht:</label>
			<textarea name="body" rows="10" data-trigger="change" data-required="true"></textarea>
		
			<p>
			
			<label for="attachment">Attachment:</label>
			<input type="file" class="file" name="attachment" id="attachment" value="" />
		
			<p class="ar">
				<input type="button" class="button" value="Annuleren" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=conf&a=view&id=<?php echo $_smarty_tpl->tpl_vars['prid']->value;?>
'" />
				&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="submit" class="button" value="Verzenden" onclick="return confirm('Weet u zeker dat u deze e-mail wilt versturen aan alle ingeschreven leden?')" />
			</p>
		</form>
	
	</div>
		
</div>
	
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>