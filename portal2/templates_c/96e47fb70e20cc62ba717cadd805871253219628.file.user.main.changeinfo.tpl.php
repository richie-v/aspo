<?php /* Smarty version Smarty-3.1.12, created on 2018-10-12 15:54:26
         compiled from "templates/user.main.changeinfo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:183541006054d886252e0f00-47191023%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '96e47fb70e20cc62ba717cadd805871253219628' => 
    array (
      0 => 'templates/user.main.changeinfo.tpl',
      1 => 1537541467,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183541006054d886252e0f00-47191023',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54d886253c90f1_84821062',
  'variables' => 
  array (
    'phpself' => 0,
    'user' => 0,
    'diets' => 0,
    'positions' => 0,
    'countries' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d886253c90f1_84821062')) {function content_54d886253c90f1_84821062($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/aspo/portal2/includes/smarty/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div id="content">
		<h2>Gegevens wijzigen</h2>
		
			<form id="changeinfoform" action="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=main&a=changeinfodone" method="POST" data-validate="parsley">
		
			<input name="State" type="hidden" value="<?php if ($_smarty_tpl->tpl_vars['user']->value['State']==2){?>1<?php }else{ ?>0<?php }?>" />
		
			<p>Met het formulier hieronder kunt u uw gegevens wijzigen. Velden met een * zijn verplicht.</p>
			
			<div style="width: 45%; float:left">
				
				<label for="Name">Naam: *</label>
				<input id="Name" name="Name" class="text" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['Name'];?>
" data-trigger="change" data-required="true" />
				
				<label for="Prep">Tussenvoegsel:</label>
				<input id="Prep" name="Prep" class="text" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['Prep'];?>
" />

				<label for="Surname">Achternaam: *</label>
				<input id="Surname" name="Surname" class="text" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['Surname'];?>
" data-trigger="change" data-required="true" />
				
				<label>Geslacht:</label>
				<div style="height: 28px;">
					<input id="GenderM" name="Gender" type="radio" value="Man" <?php if ($_smarty_tpl->tpl_vars['user']->value['Gender']=="Man"){?>checked<?php }?> /><label for="GenderM" class="radio">Man</label>
					<input id="GenderF" name="Gender" type="radio" value="Vrouw" <?php if ($_smarty_tpl->tpl_vars['user']->value['Gender']=="Vrouw"){?>checked<?php }?> /><label for="GenderF" class="radio">Vrouw</label>
				</div>

				<label for="Interest1">Interessegebied 1:</label>
				<input id="Interest1" name="Interest1" class="text" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['Interest1'];?>
" />
				
				<label for="Interest2">Interessegebied 2:</label>
				<input id="Interest2" name="Interest2" class="text" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['Interest2'];?>
" />
				
				<label for="Interest3">Interessegebied 3:</label>
				<input id="Interest3" name="Interest3" class="text" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['Interest3'];?>
" />		

				<label for="Diet">Dieet voorkeur:</label>
				<?php echo smarty_function_html_options(array('name'=>'Diet','values'=>$_smarty_tpl->tpl_vars['diets']->value,'output'=>$_smarty_tpl->tpl_vars['diets']->value,'selected'=>$_smarty_tpl->tpl_vars['user']->value['Diet']),$_smarty_tpl);?>


				<label for="Allergies">Voedselallergie&euml;n:</label>
				<input id="Allergies" name="Allergies" class="text" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['Allergies'];?>
" />
				
			</div>
			
			<div style="width: 45%; float:right">
				
				<label for="Position">Aanstelling: *</label>
				<?php echo smarty_function_html_options(array('name'=>'Position','values'=>$_smarty_tpl->tpl_vars['positions']->value,'output'=>$_smarty_tpl->tpl_vars['positions']->value,'selected'=>$_smarty_tpl->tpl_vars['user']->value['Position'],'data-trigger'=>"change",'data-required'=>"true"),$_smarty_tpl);?>

				
				<label for="Department">Afdeling:</label>
				<input id="Department" name="Department" class="text" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['Department'];?>
" />

				<label for="Affiliation">Universiteit / instelling:</label>
				<input id="Affiliation" name="Affiliation" class="text" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['Affiliation'];?>
" />
				
				<label for="Street">Straat:</label>
				<input id="Street" name="Street" class="text" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['Street'];?>
" />
				
				<label for="Number">Huisnummer:</label>
				<input id="Number" name="Number" class="text" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['Number'];?>
" data-type="digits" />

				<label for="Numbersup">Toevoeging:</label>
				<input id="Numbersup" name="Numbersup" class="text" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['Numbersup'];?>
" />
				
				<label for="Postcode">Postcode (vb. 1234AB):</label>
				<input id="Postcode" name="Postcode" class="text" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['Postcode'];?>
" data-type="alphanum" data-maxlength="6" />

				<label for="City">Stad:</label>
				<input id="City" name="City" class="text" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['City'];?>
" />
				
				<label for="Country">Land:</label>
				<?php echo smarty_function_html_options(array('name'=>'Country','options'=>$_smarty_tpl->tpl_vars['countries']->value,'selected'=>$_smarty_tpl->tpl_vars['user']->value['Country']),$_smarty_tpl);?>


			</div>

			<div class="ar cb">
				<p>&nbsp;</p>
				
				<?php if (!$_smarty_tpl->tpl_vars['user']->value['State']){?>
					<input class="button" type="button" value="Annuleren" onclick="window.location = '<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
';">
					&nbsp;&nbsp;&nbsp;&nbsp;
				<?php }?>
				<input class="button" type="submit" value="Wijzigen">
			</div>
			
		</form>
	
	</div>

</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>