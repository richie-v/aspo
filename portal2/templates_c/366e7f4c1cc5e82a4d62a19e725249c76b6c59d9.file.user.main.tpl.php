<?php /* Smarty version Smarty-3.1.12, created on 2018-10-30 14:24:30
         compiled from "templates/user.main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:131802291454d5f617d3a6b4-00050749%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '366e7f4c1cc5e82a4d62a19e725249c76b6c59d9' => 
    array (
      0 => 'templates/user.main.tpl',
      1 => 1540905854,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '131802291454d5f617d3a6b4-00050749',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54d5f617e3e1c5_54709800',
  'variables' => 
  array (
    'user' => 0,
    'phpself' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d5f617e3e1c5_54709800')) {function content_54d5f617e3e1c5_54709800($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div id="content">
		<h2>Welcome <?php echo $_smarty_tpl->tpl_vars['user']->value['Username'];?>
!</h2>
		
		<p>Below your personal details. Please check if this information is correct. If incorrect, change your details <a href="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=main&a=changeinfo">here</a>.</p>
		
		<p>Hieronder staan uw persoonlijke gegevens. Controleer of deze gegevens kloppen want deze zijn van belang bij het inschrijven voor congressen! Als de gegevens niet kloppen, kunt u <a href="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=main&a=changeinfo">hier</a> uw gegevens wijzigen.</p>
		
		<p>&nbsp;</p>
		
		<div class="infobox">
		
			<div style="width: 45%; float:left;">

				<b>Naam:</b><br />
				<?php if (!$_smarty_tpl->tpl_vars['user']->value['Name']&&!$_smarty_tpl->tpl_vars['user']->value['Surname']){?>
					Onbekend<br />
				<?php }else{ ?>
					<?php echo $_smarty_tpl->tpl_vars['user']->value['Name'];?>
<?php if ($_smarty_tpl->tpl_vars['user']->value['Prep']){?> <?php echo $_smarty_tpl->tpl_vars['user']->value['Prep'];?>
<?php }?> <?php echo $_smarty_tpl->tpl_vars['user']->value['Surname'];?>
<br />
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['user']->value['Gender']){?>Geslacht: <?php echo $_smarty_tpl->tpl_vars['user']->value['Gender'];?>
<br /><?php }?>

				<p>

				<b>Interessegebieden:</b><br />
				<?php if (!$_smarty_tpl->tpl_vars['user']->value['Interest1']&&!$_smarty_tpl->tpl_vars['user']->value['Interest2']&&!$_smarty_tpl->tpl_vars['user']->value['Interest3']){?>
					Niet ingevuld<br />
				<?php }else{ ?>
					<?php echo $_smarty_tpl->tpl_vars['user']->value['Interest1'];?>
<br />
					<?php echo $_smarty_tpl->tpl_vars['user']->value['Interest2'];?>
<br />
					<?php echo $_smarty_tpl->tpl_vars['user']->value['Interest3'];?>
<br />
				<?php }?>

				<p>

				<b>Dietary preferences:</b><br />
				<?php if ($_smarty_tpl->tpl_vars['user']->value['Diet']){?>
					<?php echo $_smarty_tpl->tpl_vars['user']->value['Diet'];?>

				<?php }else{ ?>
					Onbekend
				<?php }?>
				<br />
				<?php if ($_smarty_tpl->tpl_vars['user']->value['Allergies']){?>Allergie: <?php echo $_smarty_tpl->tpl_vars['user']->value['Allergies'];?>
<br /><?php }?>
	
			</div>

			<div style="width: 45%; float:right;">
				<b>Aanstelling:</b><br />
				<?php if (!$_smarty_tpl->tpl_vars['user']->value['Position']&&!$_smarty_tpl->tpl_vars['user']->value['Department']&&!$_smarty_tpl->tpl_vars['user']->value['Affiliation']){?>
					Onbekend<br />
				<?php }else{ ?>
					<?php echo $_smarty_tpl->tpl_vars['user']->value['Position'];?>
<br />
					<?php echo $_smarty_tpl->tpl_vars['user']->value['Department'];?>
<br />
					<?php echo $_smarty_tpl->tpl_vars['user']->value['Affiliation'];?>
<br />
				<?php }?>
				
				<p>
				
				<b>Adres:</b><br />
				<?php if (!$_smarty_tpl->tpl_vars['user']->value['Street']&&!$_smarty_tpl->tpl_vars['user']->value['Number']&&!$_smarty_tpl->tpl_vars['user']->value['Postcode']&&!$_smarty_tpl->tpl_vars['user']->value['City']){?>
					Onbekend<br />
				<?php }else{ ?>
					<?php echo $_smarty_tpl->tpl_vars['user']->value['Street'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['Number'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['Numbersup'];?>
<br />
					<?php echo $_smarty_tpl->tpl_vars['user']->value['Postcode'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['City'];?>
<br />
					<?php echo $_smarty_tpl->tpl_vars['user']->value['CountryName'];?>
<br />
				<?php }?>

				<!--<p>

				<b>Lidmaatschap:</b><br />
				<?php if ($_smarty_tpl->tpl_vars['user']->value['Membership']){?>
					Betaald voor: <?php echo $_smarty_tpl->tpl_vars['user']->value['Membership'];?>
<br />
				<?php }else{ ?>
					Nog geen lid<br />
				<?php }?>-->

				</div>
			
			<div class="ar cb">
				<a href="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=main&a=changeinfo">Gegevens wijzigen</a>
			</div>
		</div>
		
		<p>

		<div class="infobox">
			Om uw logingegevens zoals e-mailadres, gebruikersnaam of wachtwoord te wijzigen, kunt u de link hieronder gebruiken.
			
			<p>
			
			<div class="ar cb">
				<a href="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=main&a=changelogin">Login wijzigen</a>
			</div>
		</div>
	</div>
		
</div>
	
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>