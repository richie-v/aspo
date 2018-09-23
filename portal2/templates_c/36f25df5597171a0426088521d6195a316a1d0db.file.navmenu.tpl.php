<?php /* Smarty version Smarty-3.1.12, created on 2018-09-21 23:40:36
         compiled from "./templates/navmenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:80653429054d5f5ddace018-41300879%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36f25df5597171a0426088521d6195a316a1d0db' => 
    array (
      0 => './templates/navmenu.tpl',
      1 => 1537564065,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '80653429054d5f5ddace018-41300879',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54d5f5ddb0fea0_87986676',
  'variables' => 
  array (
    'AuthLevel' => 0,
    'AuthState' => 0,
    'phpself' => 0,
    'AuthCommittees' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d5f5ddb0fea0_87986676')) {function content_54d5f5ddb0fea0_87986676($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['AuthLevel']->value==0||$_smarty_tpl->tpl_vars['AuthState']->value>0){?>
	<div id="navmenu">
		&nbsp;
	</div>
<?php }elseif($_smarty_tpl->tpl_vars['AuthLevel']->value==2){?>
	<div id="navmenu">
		<a class="navitem" href="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=main">Home</a>
		<a class="navitem" href="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=conf">Congressen</a>
		<a class="navitem" href="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=mship">Lidmaatschappen</a>
		<a class="navitem" href="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=users">Leden</a>
		<a class="navitem" href="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=main&a=logout">Uitloggen</a>
	</div>
<?php }else{ ?>
	<div id="navmenu">
		<a class="navitem" href="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=main">Home</a>
		<a class="navitem" href="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=orders">Betalingen</a>
		<a class="navitem" href="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=conf">Congres</a>
		<a class="navitem" href="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=mship">Lidmaatschap</a>
		
		<?php if (($_smarty_tpl->tpl_vars['AuthCommittees']->value)){?>
			<a class="navitem" href="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=comm">Commissies</a>
		<?php }?>
		
		<a class="navitem" href="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=main&a=logout">Uitloggen</a>
	</div>
<?php }?>

<?php }} ?>