<?php /* Smarty version Smarty-3.1.12, created on 2017-10-18 21:01:48
         compiled from "templates/admin.userselect.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16336799154d5f7e1e9c780-11515016%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9f2f24edc535d5cb1fd9cee0e78915b028083568' => 
    array (
      0 => 'templates/admin.userselect.tpl',
      1 => 1507640649,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16336799154d5f7e1e9c780-11515016',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54d5f7e1efe900_96343587',
  'variables' => 
  array (
    'users' => 0,
    'phpself' => 0,
    'module' => 0,
    'action' => 0,
    'user' => 0,
    'prid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d5f7e1efe900_96343587')) {function content_54d5f7e1efe900_96343587($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/home/aspo/public_html/portal2/includes/smarty/plugins/function.cycle.php';
?><table class="admintable hover">
	<thead>
		<tr>
			<th>Gebruiker</th>
			<th>Naam</th>
			<th>Tussenvoegsel</th>
			<th>Achternaam</th>
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
&pos=<?php echo $_smarty_tpl->tpl_vars['user']->value['Position'];?>
&prid=<?php echo $_smarty_tpl->tpl_vars['prid']->value;?>
'">
			<td><?php echo $_smarty_tpl->tpl_vars['user']->value['Username'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['user']->value['Name'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['user']->value['Prep'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['user']->value['Surname'];?>
</td>
		</tr>
	<?php } ?>
	</tbody>
</table><?php }} ?>