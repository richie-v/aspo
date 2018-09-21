<?php /* Smarty version Smarty-3.1.12, created on 2017-10-20 09:16:28
         compiled from "templates/user.ideal.mail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:148674029254e3062e642330-85729560%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73728285cca0461e764d5531251c27c3d76bc5de' => 
    array (
      0 => 'templates/user.ideal.mail.tpl',
      1 => 1507640650,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '148674029254e3062e642330-85729560',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54e3062e692f42_75243404',
  'variables' => 
  array (
    'user' => 0,
    'd' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e3062e692f42_75243404')) {function content_54e3062e692f42_75243404($_smarty_tpl) {?>Beste <?php echo $_smarty_tpl->tpl_vars['user']->value;?>


Deze e-mail is een bevestiging dat u het volgende heeft aangeschaft via het ASPO leden-portal:


<?php echo $_smarty_tpl->tpl_vars['d']->value['Name'];?>

--------------------------------------------------------------------------------------------------------
<?php echo $_smarty_tpl->tpl_vars['d']->value['Description'];?>
                                              <?php echo $_smarty_tpl->tpl_vars['d']->value['Price'];?>
 euro


Datum:         <?php echo $_smarty_tpl->tpl_vars['d']->value['StatusTime'];?>

Bestelling:    <?php echo $_smarty_tpl->tpl_vars['d']->value['PurchaseID'];?>

Transactie:    <?php echo $_smarty_tpl->tpl_vars['d']->value['TransID'];?>



In de portal kunt u onder 'Betalingen' een volledige factuur van deze bestelling downloaden als PDF.


Met vriendelijke groet,


Het ASPO bestuur<?php }} ?>