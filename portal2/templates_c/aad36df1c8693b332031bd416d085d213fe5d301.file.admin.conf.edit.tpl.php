<?php /* Smarty version Smarty-3.1.12, created on 2018-10-24 13:07:15
         compiled from "templates/admin.conf.edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1413747274559cf695a544b3-76231238%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aad36df1c8693b332031bd416d085d213fe5d301' => 
    array (
      0 => 'templates/admin.conf.edit.tpl',
      1 => 1537564065,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1413747274559cf695a544b3-76231238',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_559cf695b28d69_28607362',
  'variables' => 
  array (
    'StartDate' => 0,
    'StartReg' => 0,
    'EndReg' => 0,
    'newindex' => 0,
    'phpself' => 0,
    'ProdID' => 0,
    'Name' => 0,
    'Location' => 0,
    'Remarks' => 0,
    'packages' => 0,
    'packvar' => 0,
    'p' => 0,
    'LockSold' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559cf695b28d69_28607362')) {function content_559cf695b28d69_28607362($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/html/aspo/portal2/includes/smarty/plugins/function.cycle.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<script type="text/javascript">
$(
	function() {
		$("#StartDate").datepicker({
			dateFormat: "dd-mm-yy",
			changeMonth: true,
			changeYear: true,
			defaultDate: "<?php echo $_smarty_tpl->tpl_vars['StartDate']->value;?>
"
		});
		
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
		<h2>Congressen beheren</h2>
		
		<p>Met dit formulier kunt u de opties en prijzen voor het ASPO congres instellen.</p>

		<p>&nbsp;</p>
		
		<form action="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=conf&a=editdone" method="POST">
			
			<?php if ($_smarty_tpl->tpl_vars['ProdID']->value){?>
				<input type="hidden" name="ProdID" value="<?php echo $_smarty_tpl->tpl_vars['ProdID']->value;?>
" />
			<?php }?>
		
			<div class="col3">
				<label for="Name">Naam:</label>
				<input type="text" class="text" name="Name" id="Name" value="<?php echo $_smarty_tpl->tpl_vars['Name']->value;?>
" />
				
				<p>
				
				<label for="Location">Locatie:</label>
				<input type="text" class="text" name="Location" id="Location" value="<?php echo $_smarty_tpl->tpl_vars['Location']->value;?>
" />
				
				<p>
			
				<label for="StartDate">Datum:</label>
				<input type="text" class="text" name="StartDate" id="StartDate" value="<?php echo $_smarty_tpl->tpl_vars['StartDate']->value;?>
" />			
			</div>
			
					
			<div class="col3">
				<label for="StartReg">Inschrijven vanaf:</label>
				<input type="text" class="text" name="StartReg" id="StartReg" value="<?php echo $_smarty_tpl->tpl_vars['StartReg']->value;?>
" />
				
				<p>
				
				<label for="EndReg">Inschrijven tot:</label>
				<input type="text" class="text" name="EndReg" id="EndReg" value="<?php echo $_smarty_tpl->tpl_vars['EndReg']->value;?>
" />
			</div>
			
			<div class="col3R">
				<label for="Remarks">Opmerkingen:</label>
				<textarea name="Remarks" rows="5" maxlength="500" style="height: 161px"><?php echo $_smarty_tpl->tpl_vars['Remarks']->value;?>
</textarea>		
			</div>
			
			<p class="cb">&nbsp;</p>
			
			<b>Prijzen en opties</b>
			
			<br /><br />
			
			<?php if ($_smarty_tpl->tpl_vars['packages']->value){?>
				<table class="admintable">
					<tr>
						<th width="65%">Beschrijving:</th>
						<th width="10%">Prijs:</th>
						<th width="10%">Inc. lidm.:</th>
						<th width="5%">Std:</th>
						<th width="5%">AiO:</th>
						<th width="5%">Lid:</th>
					</tr>
				
					<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['packages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
						<tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
							<td><input type="text" class="text" name="<?php echo $_smarty_tpl->tpl_vars['packvar']->value;?>
[<?php echo $_smarty_tpl->tpl_vars['p']->value['PackID'];?>
][Description]" value="<?php echo $_smarty_tpl->tpl_vars['p']->value['Description'];?>
" <?php if ($_smarty_tpl->tpl_vars['p']->value['TimesSold']&&$_smarty_tpl->tpl_vars['LockSold']->value){?>readonly<?php }?> /></td>
							<td><input type="text" class="text ar" name="<?php echo $_smarty_tpl->tpl_vars['packvar']->value;?>
[<?php echo $_smarty_tpl->tpl_vars['p']->value['PackID'];?>
][Price]" value="<?php echo $_smarty_tpl->tpl_vars['p']->value['Price'];?>
" maxlength="3" <?php if ($_smarty_tpl->tpl_vars['p']->value['TimesSold']&&$_smarty_tpl->tpl_vars['LockSold']->value){?>readonly<?php }?> /></td>
							<td><input type="text" class="text ar" name="<?php echo $_smarty_tpl->tpl_vars['packvar']->value;?>
[<?php echo $_smarty_tpl->tpl_vars['p']->value['PackID'];?>
][IncMember]" value="<?php echo $_smarty_tpl->tpl_vars['p']->value['IncMember'];?>
" maxlength="4" <?php if ($_smarty_tpl->tpl_vars['p']->value['TimesSold']&&$_smarty_tpl->tpl_vars['LockSold']->value){?>readonly<?php }?> /></td>
							<td><input type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['packvar']->value;?>
[<?php echo $_smarty_tpl->tpl_vars['p']->value['PackID'];?>
][AvStudent]" <?php if ($_smarty_tpl->tpl_vars['p']->value['AvStudent']){?>checked<?php }?> /></td>
							<td><input type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['packvar']->value;?>
[<?php echo $_smarty_tpl->tpl_vars['p']->value['PackID'];?>
][AvPhD]" <?php if ($_smarty_tpl->tpl_vars['p']->value['AvPhD']){?>checked<?php }?> /></td>
							<td><input type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['packvar']->value;?>
[<?php echo $_smarty_tpl->tpl_vars['p']->value['PackID'];?>
][AvMember]" <?php if ($_smarty_tpl->tpl_vars['p']->value['AvMember']){?>checked<?php }?> /></td>
						</tr>
					
					<?php } ?>
			
				</table>
			<?php }else{ ?>
				<b>Geen prijzen en opties gevonden!</p>
			<?php }?>
			
			<p>&nbsp;</p>
			
			<p class="ar">
				<input type="button" class="button" value="Annuleren" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=conf'" />
				&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="submit" class="button" value="Opslaan" />
			</p>
					
		</form>

	</div>
		
</div>
	
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>