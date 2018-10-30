<?php /* Smarty version Smarty-3.1.12, created on 2018-10-26 11:59:49
         compiled from "templates/login.forget.mail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:103431694654f493286f6c61-32071100%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '92476b0305acb0c380427ec82c9fa11c7887e918' => 
    array (
      0 => 'templates/login.forget.mail.tpl',
      1 => 1537564065,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '103431694654f493286f6c61-32071100',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54f49328757763_46171287',
  'variables' => 
  array (
    'user' => 0,
    'pass' => 0,
    'adres' => 0,
    'passenc' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54f49328757763_46171287')) {function content_54f49328757763_46171287($_smarty_tpl) {?>Beste <?php echo $_smarty_tpl->tpl_vars['user']->value;?>


U kunt met de volgende gegevens inloggen bij het ASPO ledenportaal:

Gebruiker:     <?php echo $_smarty_tpl->tpl_vars['user']->value;?>

Wachtwoord:    <?php echo $_smarty_tpl->tpl_vars['pass']->value;?>


U kunt ook de onderstaande URL gebruiken:
http://<?php echo $_smarty_tpl->tpl_vars['adres']->value;?>
?u=<?php echo urlencode($_smarty_tpl->tpl_vars['user']->value);?>
&p=<?php echo urlencode($_smarty_tpl->tpl_vars['passenc']->value);?>


Nadat u ingelogd bent, zal u gevraagd worden dit tijdelijke wachtwoord te wijzigen.

Met vriendelijke groet,


Het ASPO bestuur<?php }} ?>