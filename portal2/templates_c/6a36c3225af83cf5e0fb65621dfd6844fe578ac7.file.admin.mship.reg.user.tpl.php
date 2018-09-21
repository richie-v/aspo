<?php /* Smarty version Smarty-3.1.12, created on 2016-10-24 14:37:40
         compiled from "templates/admin.mship.reg.user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1770011909580e0094733ba6-00887579%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a36c3225af83cf5e0fb65621dfd6844fe578ac7' => 
    array (
      0 => 'templates/admin.mship.reg.user.tpl',
      1 => 1423308205,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1770011909580e0094733ba6-00887579',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'prid' => 0,
    'phpself' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_580e0094798f88_66135207',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580e0094798f88_66135207')) {function content_580e0094798f88_66135207($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<script>
	//function to request user data from the server
	function getUsers() {
		//get search parameters
		var uname = document.getElementById('uname').value;
	
		//request user data
		$("#ubrowser").load("index.php?m=mship&a=gu&prid=<?php echo $_smarty_tpl->tpl_vars['prid']->value;?>
&n=" + uname);
	}
</script>

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div id="content">
		<h2>Lidmaatschap toekennen</h2>
		
		<p>
		
		Hieronder kunt u zoeken naar leden door hun naam in te vullen. U kunt &eacute;&eacute;n lid selecteren en dit lid vervolgens een lidmaatschap toekennen.
		
		<p>
		
		Zoek op naam:<br />
		<input type="text" class="text" id="uname" value="" style="width: 250px;" />&nbsp;
		<input type="button" class="button" value="Zoeken" onclick="getUsers()" />

		
		<p style="clear: both;">&nbsp;</p>
		
		<div id="ubrowser">
			<!-- User data is inserted through AJAX calls here -->
		</div>
			
		
		<p class="ar">
			<input type="button" class="button" value="Annuleren" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=mship&a=view&prid=<?php echo $_smarty_tpl->tpl_vars['prid']->value;?>
'" />
		</p>
	
	</div>
	
</div>
	
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>