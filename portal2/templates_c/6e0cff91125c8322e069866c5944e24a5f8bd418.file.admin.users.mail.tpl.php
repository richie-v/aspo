<?php /* Smarty version Smarty-3.1.12, created on 2018-09-21 14:03:56
         compiled from "templates/admin.users.mail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:47329034055c0897f417c52-19817037%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e0cff91125c8322e069866c5944e24a5f8bd418' => 
    array (
      0 => 'templates/admin.users.mail.tpl',
      1 => 1507640649,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47329034055c0897f417c52-19817037',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_55c0897f4593f7_62008150',
  'variables' => 
  array (
    'nids' => 0,
    'phpself' => 0,
    'ids' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c0897f4593f7_62008150')) {function content_55c0897f4593f7_62008150($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div id="content">
		<h2>Leden mailen</h2>
		
		<p>
		
		Met dit formulier kunt u <u>alle geselecteerde leden (<?php echo $_smarty_tpl->tpl_vars['nids']->value;?>
)</u> een e-mail sturen.
		
		<p>
		
		<form action="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=users&a=maildone" method="POST" enctype="multipart/form-data" data-validate="parsley">
		
			<input type="hidden" name="ids" value="<?php echo $_smarty_tpl->tpl_vars['ids']->value;?>
" />
		
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
?m=users'" />
				&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="submit" class="button" value="Verzenden" onclick="return confirm('Weet u zeker dat u deze e-mail wilt versturen?')" />
			</p>
		</form>
	
	</div>
		
</div>
	
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>