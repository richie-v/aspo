<?php /* Smarty version Smarty-3.1.12, created on 2018-09-22 00:16:55
         compiled from "templates/admin.userlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:61878028154d5f5ef901359-41994496%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '718053263f3f48ee07cb0253bc59628350834a0f' => 
    array (
      0 => 'templates/admin.userlist.tpl',
      1 => 1537564065,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '61878028154d5f5ef901359-41994496',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54d5f5ef967df4_16973803',
  'variables' => 
  array (
    'users' => 0,
    'phpself' => 0,
    'module' => 0,
    'action' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d5f5ef967df4_16973803')) {function content_54d5f5ef967df4_16973803($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/html/aspo/portal2/includes/smarty/plugins/function.cycle.php';
?><table class="admintable hover">
	<thead>
		<tr>
			<th>Gebruiker</th>
			<th>Naam</th>
			<th>Tussenvoegsel</th>
			<th>Achternaam</th>
			<th>Lidmaatschap</th>
			<th>Login</th>
	</thead>
	<tbody>
	<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
		<tr class="<?php echo smarty_function_cycle(array('values'=>"odd,even"),$_smarty_tpl);?>
" onclick = "top.location = '<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
&a=<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
&uid=<?php echo $_smarty_tpl->tpl_vars['user']->value['UserID'];?>
'">
			<td><input type="hidden" name="ids[]" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['UserID'];?>
" /><?php echo $_smarty_tpl->tpl_vars['user']->value['Username'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['user']->value['Name'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['user']->value['Prep'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['user']->value['Surname'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['user']->value['Membership'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['user']->value['LastLogin'];?>
</td>
		</tr>
	<?php } ?>
	</tbody>
</table><?php }} ?>