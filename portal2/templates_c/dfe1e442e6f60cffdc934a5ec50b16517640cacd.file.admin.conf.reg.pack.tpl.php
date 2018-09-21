<?php /* Smarty version Smarty-3.1.12, created on 2017-10-19 09:35:10
         compiled from "templates/admin.conf.reg.pack.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1270756163565c51f31108c8-12361384%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dfe1e442e6f60cffdc934a5ec50b16517640cacd' => 
    array (
      0 => 'templates/admin.conf.reg.pack.tpl',
      1 => 1507640648,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1270756163565c51f31108c8-12361384',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_565c51f33579d9_87868674',
  'variables' => 
  array (
    'user' => 0,
    'packages' => 0,
    'phpself' => 0,
    'prid' => 0,
    'uid' => 0,
    'p' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565c51f33579d9_87868674')) {function content_565c51f33579d9_87868674($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/home/aspo/public_html/portal2/includes/smarty/plugins/function.cycle.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div id="content">
		<h2>Lid inschrijven</h2>
		
		<p>
		
		<p>
		U wilt het onderstaande lid inschrijven voor het congres:
		
		<p>
		
		<b>Lid: <?php echo $_smarty_tpl->tpl_vars['user']->value['Username'];?>
</b><br />
		<b>Naam: <?php echo $_smarty_tpl->tpl_vars['user']->value['Name'];?>
 <?php if (isset($_smarty_tpl->tpl_vars['user']->value['Prep'])){?><?php echo $_smarty_tpl->tpl_vars['user']->value['Prep'];?>
 <?php }?><?php echo $_smarty_tpl->tpl_vars['user']->value['Surname'];?>
</b></br>
		
		<p>
		
		Hieronder ziet u verschillende prijsopties voor dit congres. Kies een prijsoptie en schrijf het lid in voor het congres.
		
		<p style="clear: both;">&nbsp;</p>
		
		<div id="ubrowser">
		<?php if ($_smarty_tpl->tpl_vars['packages']->value){?>
			<table class="admintable hover">
				<tr>
					<th width="70%">Beschrijving</th>
					<th width="30%">Prijs</th>
				</tr>
			<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['packages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
				<tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
" onclick="top.location  = '<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=conf&a=reg&prid=<?php echo $_smarty_tpl->tpl_vars['prid']->value;?>
&uid=<?php echo $_smarty_tpl->tpl_vars['uid']->value;?>
&pid=<?php echo $_smarty_tpl->tpl_vars['p']->value['PackID'];?>
&ms=<?php echo $_smarty_tpl->tpl_vars['p']->value['IncMember'];?>
'">
					<td><?php echo $_smarty_tpl->tpl_vars['p']->value['Description'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['p']->value['Price'];?>
 euro</td>
				</tr>
			<?php } ?>
			</table>
		<?php }else{ ?>
			<b>Geen prijsopties gevonden.</b>
		<?php }?>
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