<?php /* Smarty version Smarty-3.1.12, created on 2017-10-19 09:35:00
         compiled from "templates/admin.conf.reg.user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:313203370565c4d362fd138-78292271%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5221f255e43fd49aeb03f3d31aabaf8fb9e741bc' => 
    array (
      0 => 'templates/admin.conf.reg.user.tpl',
      1 => 1507640648,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '313203370565c4d362fd138-78292271',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_565c4d36645016_78144646',
  'variables' => 
  array (
    'prid' => 0,
    'phpself' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565c4d36645016_78144646')) {function content_565c4d36645016_78144646($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<script>
	//function to request user data from the server
	function getUsers() {
		//get search parameters
		var uname = document.getElementById('uname').value;
	
		//request user data
		$("#ubrowser").load("index.php?m=conf&a=gu&prid=<?php echo $_smarty_tpl->tpl_vars['prid']->value;?>
&n=" + uname);
	}
</script>

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div id="content">
		<h2>Lid inschrijven</h2>
		
		<p>
		
		Hieronder kunt u zoeken naar leden door hun naam in te vullen. U kunt &eacute;&eacute;n lid selecteren en dit lid vervolgens inschrijven voor het congres.
		
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
?m=conf&a=view&prid=<?php echo $_smarty_tpl->tpl_vars['prid']->value;?>
'" />
		</p>
	
	</div>
	
</div>
	
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>