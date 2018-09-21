<?php /* Smarty version Smarty-3.1.12, created on 2017-10-17 11:53:18
         compiled from "templates/user.mship.tpl" */ ?>
<?php /*%%SmartyHeaderCode:104292961154d5f658636673-50632078%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2aeb6b89933c533af8cb32f13490129ae4bc80db' => 
    array (
      0 => 'templates/user.mship.tpl',
      1 => 1507640651,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104292961154d5f658636673-50632078',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54d5f6586a41a0_90596047',
  'variables' => 
  array (
    'position' => 0,
    'membership' => 0,
    'curryear' => 0,
    'order' => 0,
    'phpself' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d5f6586a41a0_90596047')) {function content_54d5f6586a41a0_90596047($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div id="content">
	
		<h2>Lidmaatschap</h2>
		
		<p>

	<?php if ($_smarty_tpl->tpl_vars['position']->value=='Student'){?>

		Studenten kunnen helaas geen lid worden van de ASPO. Studenten kunnen zich wel inschrijven voor het jaarlijkse ASPO-congres, zie hiervoor de Congres-pagina.  Het congres wordt ieder jaar in december gehouden.

	<?php }else{ ?>

		<?php if (!$_smarty_tpl->tpl_vars['membership']->value){?>
		
			Op deze pagina kunt u lid worden van de ASPO. Het lidmaatschap is geldig van <b>1 januari tot 31 december</b>. Door lid te worden steunt u de ASPO, ontvangt u de nieuwsbrief en krijgt u toegang tot symposia die door de ASPO georganiseerd worden.
		
		<?php }elseif($_smarty_tpl->tpl_vars['membership']->value<$_smarty_tpl->tpl_vars['curryear']->value){?>

			Momenteel bent u geen lid van de ASPO. Op deze pagina kunt u weer lid worden van de ASPO. Het lidmaatschap is geldig van <b>1 januari tot 31 december</b>. Door lid te worden steunt u de ASPO, ontvangt u de nieuwsbrief en krijgt u toegang tot symposia die door de ASPO georganiseerd worden.

		<?php }elseif($_smarty_tpl->tpl_vars['membership']->value>=$_smarty_tpl->tpl_vars['curryear']->value){?>

			Momenteel bent u al lid van de ASPO. U kunt deze pagina gebruiken om uw lidmaatschap te verlengen zodra het nieuwe lidmaatschap beschikbaar is. Het lidmaatschap is geldig van <b>1 januari tot 31 december</b>. Door lid te worden steunt u de ASPO, ontvangt u de nieuwsbrief en krijgt u toegang tot symposia die door de ASPO georganiseerd worden.

		<?php }?>

		<p>
		<div class="notification">Let op: U kunt ook lid worden door u op te geven voor het jaarlijkse ASPO-congres. U krijgt het ASPO-lidmaatschap gratis bij de inschrijving voor het congres. Het congres wordt in december gehouden.</div>
		
	<?php }?>
		
	<p>&nbsp;</p>
	
	<?php if ($_smarty_tpl->tpl_vars['order']->value){?>

		<form action="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=ideal" method="post">
			<div class="infobox">
				<div class="fl">
					<input type="hidden" name="packID" value="<?php echo $_smarty_tpl->tpl_vars['order']->value['PackID'];?>
" />
					<b><?php echo $_smarty_tpl->tpl_vars['order']->value['Description'];?>
</b><br />
					Prijs: &euro; <?php echo $_smarty_tpl->tpl_vars['order']->value['Price'];?>
<br />
				</div>
				<div class="fr">	
					<input type="submit" class="button white" value="Lid worden" />
				</div>
				<br style="clear: both;" />
			</div>
		</form>
	<?php }?>
	
	</div>
	
<div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>