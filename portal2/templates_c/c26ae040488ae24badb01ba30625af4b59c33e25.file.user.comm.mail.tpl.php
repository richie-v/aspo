<?php /* Smarty version Smarty-3.1.12, created on 2015-11-28 21:39:39
         compiled from "templates/user.comm.mail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:658862214565a110b35dc83-28232739%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c26ae040488ae24badb01ba30625af4b59c33e25' => 
    array (
      0 => 'templates/user.comm.mail.tpl',
      1 => 1423308206,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '658862214565a110b35dc83-28232739',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'phpself' => 0,
    'prid' => 0,
    'fromname' => 0,
    'from' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_565a110b7139e6_47431944',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565a110b7139e6_47431944')) {function content_565a110b7139e6_47431944($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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
?m=comm&a=maildone&prid=<?php echo $_smarty_tpl->tpl_vars['prid']->value;?>
" method="POST" enctype="multipart/form-data" data-validate="parsley">
		
			<label for="fromname">Naam afzender:</label>
			<input type="text" class="text" name="fromname" id="fromname" value="<?php echo $_smarty_tpl->tpl_vars['fromname']->value;?>
" data-trigger="change" data-required="true" />
			
			<p>
			
			<label for="from">E-mail afzender:</label>
			<input type="text" class="text" name="from" id="from" value="<?php echo $_smarty_tpl->tpl_vars['from']->value;?>
" data-trigger="change" data-required="true" />
			
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
			
			<input type="submit" class="button" value="Verzenden" onclick="return confirm('Weet u zeker dat u deze e-mail wilt versturen aan alle ingeschreven leden?')" />
		</form>
	
	</div>
		
</div>
	
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>