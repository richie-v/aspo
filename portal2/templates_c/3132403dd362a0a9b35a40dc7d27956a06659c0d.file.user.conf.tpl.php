<?php /* Smarty version Smarty-3.1.12, created on 2017-10-11 17:36:43
         compiled from "templates/user.conf.tpl" */ ?>
<?php /*%%SmartyHeaderCode:214359981354d5f656e2b888-62668770%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3132403dd362a0a9b35a40dc7d27956a06659c0d' => 
    array (
      0 => 'templates/user.conf.tpl',
      1 => 1507640650,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '214359981354d5f656e2b888-62668770',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54d5f656eede98_20776554',
  'variables' => 
  array (
    'position' => 0,
    'products' => 0,
    'pr' => 0,
    'phpself' => 0,
    'p' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d5f656eede98_20776554')) {function content_54d5f656eede98_20776554($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/aspo/public_html/portal2/includes/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="main">

	<div id="header">
		<h1>ASPO Ledenportal</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div id="content">
		
		<h2>Congres</h2>
		
		<p>Het ASPO houdt jaarlijks een congres in december. Op deze pagina kunt u zich inschrijven voor dit congres.</p>
		
		<?php if ($_smarty_tpl->tpl_vars['position']->value!='Student'){?>
			<div class="notification">Let op: De kosten van het congres zijn altijd inclusief het ASPO lidmaatschap voor het daarop volgend jaar.</div>
		<?php }?>
		
		<p>&nbsp;</p>
		
		<?php if ($_smarty_tpl->tpl_vars['products']->value){?>
			
			<?php  $_smarty_tpl->tpl_vars['pr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pr']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pr']->key => $_smarty_tpl->tpl_vars['pr']->value){
$_smarty_tpl->tpl_vars['pr']->_loop = true;
?>
				<div class="infobox">
					
					<table class="congrestable">
						<tr>
							<th><?php echo $_smarty_tpl->tpl_vars['pr']->value['Name'];?>
</th>
							<th class="ar">Datum: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['pr']->value['StartDate'],"%e %B %Y");?>
</th>
						</tr>
						<tr>
							<td>Locatie: <?php echo $_smarty_tpl->tpl_vars['pr']->value['Location'];?>
</td>
							<td class="ar">Inschrijven t/m: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['pr']->value['EndReg'],"%e %B %Y");?>
</td>
						</tr>

						<?php if ($_smarty_tpl->tpl_vars['pr']->value['Remarks']){?>
							<tr>
								<td colspan="2"><br /><?php echo $_smarty_tpl->tpl_vars['pr']->value['Remarks'];?>
</td>
							</tr>
						<?php }?>
					
					</table>
						
					<br />

					<form action="<?php echo $_smarty_tpl->tpl_vars['phpself']->value;?>
?m=ideal" method="POST" data-validate="parsley" data-show-errors="false">
					
					<?php if (count($_smarty_tpl->tpl_vars['pr']->value['packages'])==1){?>
						<div class="package">
							<input type="hidden" name="packID" value="<?php echo $_smarty_tpl->tpl_vars['pr']->value['packages'][0]['PackID'];?>
" />
							<?php echo $_smarty_tpl->tpl_vars['pr']->value['packages'][0]['Description'];?>

							<div class="fr">Prijs: &euro; <?php echo $_smarty_tpl->tpl_vars['pr']->value['packages'][0]['Price'];?>
</div>
							<br style="clear: both" />
						</div>
					<?php }else{ ?>
						<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pr']->value['packages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['packloop']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['packloop']['index']++;
?>
							<div class="package">
								<input type="radio" id="packID<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['packloop']['index'];?>
" name="packID" value="<?php echo $_smarty_tpl->tpl_vars['p']->value['PackID'];?>
" data-required="true" />
								<label for="packID<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['packloop']['index'];?>
" style="display: inline;"><?php echo $_smarty_tpl->tpl_vars['p']->value['Description'];?>
</label>
								<div class="fr">Prijs: &euro; <?php echo $_smarty_tpl->tpl_vars['p']->value['Price'];?>
</div>
							</div>
						<?php } ?>
					<?php }?>
					
						<div class="ar">
							<input type="submit" class="button white" value="Inschrijven" />
						</div>
					</form>
				</div>
				
				<p>&nbsp;</p>
			<?php } ?>
			
		<?php }else{ ?>
			<div class="infobox">
				<p><b>Er zijn momenteel geen congressen of u heeft zich al ingeschreven.</b></p>
			</div>
			
		<?php }?>
	</div>

</div>
	
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>