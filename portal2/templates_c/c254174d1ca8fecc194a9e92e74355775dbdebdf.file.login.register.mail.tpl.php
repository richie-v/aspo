<?php /* Smarty version Smarty-3.1.12, created on 2017-10-15 08:35:15
         compiled from "templates/login.register.mail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:189146449354d8860ee13e06-63637771%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c254174d1ca8fecc194a9e92e74355775dbdebdf' => 
    array (
      0 => 'templates/login.register.mail.tpl',
      1 => 1507640650,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189146449354d8860ee13e06-63637771',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54d8860ee5cb68_48349679',
  'variables' => 
  array (
    'user' => 0,
    'pass' => 0,
    'adres' => 0,
    'passenc' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d8860ee5cb68_48349679')) {function content_54d8860ee5cb68_48349679($_smarty_tpl) {?>Welkom <?php echo $_smarty_tpl->tpl_vars['user']->value;?>


Om uw registratie bij het ASPO ledenportaal af te ronden, kunt u inloggen met de volgende gegevens:

Gebruiker:     <?php echo $_smarty_tpl->tpl_vars['user']->value;?>

Wachtwoord:    <?php echo $_smarty_tpl->tpl_vars['pass']->value;?>


U kunt ook de onderstaande URL gebruiken:
http://<?php echo $_smarty_tpl->tpl_vars['adres']->value;?>
?u=<?php echo urlencode($_smarty_tpl->tpl_vars['user']->value);?>
&p=<?php echo urlencode($_smarty_tpl->tpl_vars['passenc']->value);?>


Nadat u ingelogd bent, zal u gevraagd worden dit tijdelijke wachtwoord te wijzigen.

Met vriendelijke groet,


Het ASPO bestuur<?php }} ?>