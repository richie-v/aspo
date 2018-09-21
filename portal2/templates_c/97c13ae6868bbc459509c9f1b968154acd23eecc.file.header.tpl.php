<?php /* Smarty version Smarty-3.1.12, created on 2018-09-21 16:51:24
         compiled from "./templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:194914539654d5f5dda8ffb6-69330237%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97c13ae6868bbc459509c9f1b968154acd23eecc' => 
    array (
      0 => './templates/header.tpl',
      1 => 1537541467,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194914539654d5f5dda8ffb6-69330237',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54d5f5ddacb2a0_24712214',
  'variables' => 
  array (
    'title' => 0,
    'AuthLevel' => 0,
    'styles' => 0,
    'style' => 0,
    'scripts' => 0,
    'script' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d5f5ddacb2a0_24712214')) {function content_54d5f5ddacb2a0_24712214($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="nl-NL">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
		<title>ASPO Ledenportaal :: <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
		
		<!-- base stylesheets -->
		<link rel="stylesheet" href="styles/base.css" type="text/css" />
		<?php if ($_smarty_tpl->tpl_vars['AuthLevel']->value==0){?>
			<link rel="stylesheet" href="styles/login.css" type="text/css" />
		<?php }elseif($_smarty_tpl->tpl_vars['AuthLevel']->value==2){?>
			<link rel="stylesheet" href="styles/admin.css" type="text/css" />
		<?php }else{ ?>
			<link rel="stylesheet" href="styles/user.css" type="text/css" />
		<?php }?>

		<!-- formvalidation stylesheet -->
		<link rel="stylesheet" href="styles/parsley.css" type="text/css" />

		<!-- optional styles -->
		<?php if (isset($_smarty_tpl->tpl_vars['styles']->value)){?>
			<?php  $_smarty_tpl->tpl_vars['style'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['style']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['styles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['style']->key => $_smarty_tpl->tpl_vars['style']->value){
$_smarty_tpl->tpl_vars['style']->_loop = true;
?>
				<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
" type="text/css" />
			<?php } ?>
		<?php }?>
		
		<!-- form validation scripts -->
		<script type="text/javascript" src="includes/jquery/jquery.js"></script>
		<script type="text/javascript" src="includes/parsley/parsley.js"></script>
		<script type="text/javascript" src="includes/parsley/parsley.messages.nl.js"></script>

		<!-- optional scripts -->
		<?php if (isset($_smarty_tpl->tpl_vars['scripts']->value)){?>
			<?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['script']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['scripts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value){
$_smarty_tpl->tpl_vars['script']->_loop = true;
?>
				<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['script']->value;?>
"></script>
			<?php } ?>
		<?php }?>

		
	</head>
	<body><?php }} ?>