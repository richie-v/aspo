<?php /* Smarty version Smarty-3.1.12, created on 2017-10-10 13:08:29
         compiled from "templates/login.main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23968422354d5f5dda36756-98106919%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '225c63f0e37beaf9055702742f90cf50523f66be' => 
    array (
      0 => 'templates/login.main.tpl',
      1 => 1507640650,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23968422354d5f5dda36756-98106919',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54d5f5dda8c766_62659545',
  'variables' => 
  array (
    'phpself' => 0,
    'loginerror' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d5f5dda8c766_62659545')) {function content_54d5f5dda8c766_62659545($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<script language="javascript">
function showWarning(cookiesEnabled) {
	if (cookiesEnabled == 'false') {
		obj = document.getElementById('cookiewarning');
		obj.style.display = 'block';
	}
}

$(document).ready(function() {
	var cc = $.get('<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=login&a=cc');
    cc.done(showWarning);
});
</script>

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	
	<div id="content">
	
		<div id="loginframe">
		
			<h2>Inloggen</h2>
		
			<form id="loginform" action="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
" method="POST" data-validate="parsley">

				<div id="cookiewarning" class="loginerror" style="display: none;">
					Deze website maakt gebruik van cookies en uw browser lijkt deze niet te accepteren. Inloggen is hierdoor niet mogelijk!
				</div>

				<?php if ($_smarty_tpl->tpl_vars['loginerror']->value){?>
				<div class="loginerror">
					<?php echo $_smarty_tpl->tpl_vars['loginerror']->value;?>

				</div>
				<?php }?>
				<div class="loginfield">
					<label for="user">Gebruiker:</label>
					<input id="user" name="user" class="text" type="text" value="" data-trigger="change" data-required="true" />
				</div>
				
				<div class="loginfield">
					<label for="user">Wachtwoord:</label>
					<input id="pass" name="pass" class="password" type="password" value="" data-trigger="change" data-required="true" />
				</div>
				
				<div class="loginbutton ar">
					<input id="submit" class="button" type="submit" value="Inloggen" />
				</div>
		
				<div class="loginlink">
					<a href="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?a=forget">&gt;&gt; Wachtwoord vergeten?</a>
				</div>
        
				<div class="loginlink">
					<a href="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?a=register">&gt;&gt; Geen lid? Registreer nu!</a>
				</div>
			</form>
		</div>

	</div>
	
</div>
			
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>