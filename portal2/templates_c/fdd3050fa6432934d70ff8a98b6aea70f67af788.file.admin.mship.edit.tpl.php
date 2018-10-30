<?php /* Smarty version Smarty-3.1.12, created on 2018-10-29 13:22:53
         compiled from "templates/admin.mship.edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20380190375642fe57cda085-08467018%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fdd3050fa6432934d70ff8a98b6aea70f67af788' => 
    array (
      0 => 'templates/admin.mship.edit.tpl',
      1 => 1537564065,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20380190375642fe57cda085-08467018',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5642fe57e2ca07_02262873',
  'variables' => 
  array (
    'StartReg' => 0,
    'EndReg' => 0,
    'newindex' => 0,
    'phpself' => 0,
    'ProdID' => 0,
    'Year' => 0,
    'packages' => 0,
    'packvar' => 0,
    'p' => 0,
    'LockSold' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5642fe57e2ca07_02262873')) {function content_5642fe57e2ca07_02262873($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/html/aspo/portal2/includes/smarty/plugins/function.cycle.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<script type="text/javascript">
$(
	function() {
		$("#StartReg").datepicker({
			dateFormat: "dd-mm-yy",
			changeMonth: true,
			changeYear: true,
			defaultDate: "<?php echo $_smarty_tpl->tpl_vars['StartReg']->value;?>
"
		});
		
		$("#EndReg").datepicker({
			dateFormat: "dd-mm-yy",
			changeMonth: true,
			changeYear: true,
			defaultDate: "<?php echo $_smarty_tpl->tpl_vars['EndReg']->value;?>
"
		});
	}
);

//function for adding new packages
var newIndex = <?php echo $_smarty_tpl->tpl_vars['newindex']->value;?>
;

</script>

<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div id="content">
		<h2>Lidmaatschappen beheren</h2>
		
		<p>Met dit formulier kunt u de prijzen voor het ASPO lidmaatschap instellen.</p>

		<p>&nbsp;</p>
		
		<form action="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=mship&a=editdone" method="POST">
			
			<?php if ($_smarty_tpl->tpl_vars['ProdID']->value){?>
				<input type="hidden" name="ProdID" value="<?php echo $_smarty_tpl->tpl_vars['ProdID']->value;?>
" />
			<?php }?>
		
			<div class="col3">
				<label for="Year">Jaar:</label>
				<input type="text" class="text" name="Year" id="Year" value="<?php echo $_smarty_tpl->tpl_vars['Year']->value;?>
" maxlength="4" />
			</div>
			
			<div class="col3">
				<label for="StartReg">Beschikbaar vanaf:</label>
				<input type="text" class="text" name="StartReg" id="StartReg" value="<?php echo $_smarty_tpl->tpl_vars['StartReg']->value;?>
" />
			</div>
			
			<div class="col3R">
				<label for="EndReg">Beschikbaar tot:</label>
				<input type="text" class="text" name="EndReg" id="EndReg" value="<?php echo $_smarty_tpl->tpl_vars['EndReg']->value;?>
" />
			</div>
			
			<p class="cb">&nbsp;</p>
			
			<b>Prijzen en opties</b>
			
			<br /><br />
			
			<?php if ($_smarty_tpl->tpl_vars['packages']->value){?>
				<table class="admintable">
					<tr>
						<th width="75%">Beschrijving:</th>
						<th width="25%">Prijs:</th>
					</tr>
				
					<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['packages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
						<tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
							<td>
								<input type="text" class="text" name="<?php echo $_smarty_tpl->tpl_vars['packvar']->value;?>
[<?php echo $_smarty_tpl->tpl_vars['p']->value['PackID'];?>
][Description]" value="<?php echo $_smarty_tpl->tpl_vars['p']->value['Description'];?>
" <?php if ($_smarty_tpl->tpl_vars['p']->value['TimesSold']&&$_smarty_tpl->tpl_vars['LockSold']->value){?>readonly<?php }?> />
							</td>
							<td>
								<input type="text" class="text" name="<?php echo $_smarty_tpl->tpl_vars['packvar']->value;?>
[<?php echo $_smarty_tpl->tpl_vars['p']->value['PackID'];?>
][Price]" value="<?php echo $_smarty_tpl->tpl_vars['p']->value['Price'];?>
" maxlength="3" <?php if ($_smarty_tpl->tpl_vars['p']->value['TimesSold']&&$_smarty_tpl->tpl_vars['LockSold']->value){?>readonly<?php }?> />
								<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['packvar']->value;?>
[<?php echo $_smarty_tpl->tpl_vars['p']->value['PackID'];?>
][AvPhD]" value="<?php if ($_smarty_tpl->tpl_vars['p']->value['AvPhD']){?>1<?php }else{ ?>0<?php }?>" />
								<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['packvar']->value;?>
[<?php echo $_smarty_tpl->tpl_vars['p']->value['PackID'];?>
][AvMember]" value="<?php if ($_smarty_tpl->tpl_vars['p']->value['AvMember']){?>1<?php }else{ ?>0<?php }?>" />
							</td>
						</tr>
					<?php } ?>
			
				</table>
			
			<?php }else{ ?>
				<b>Geen prijzen en opties gevonden!</p>
			<?php }?>
			
			<p>&nbsp;</p>
			
			<p class="ar">
				<input type="button" class="button" value="Annuleren" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=mship'" />
				&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="submit" class="button" value="Opslaan" />
			</p>
					
		</form>

	</div>
		
</div>
	
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>