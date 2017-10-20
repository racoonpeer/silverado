<?php /* Smarty version Smarty-3.1.14, created on 2017-10-21 00:18:29
         compiled from "tpl/backend/weblife/common/buttons.tpl" */ ?>
<?php /*%%SmartyHeaderCode:129265393559ea6825d3f945-49924560%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ffe36cde3babc3b55feb0b2b83e23847e9d1cd2f' => 
    array (
      0 => 'tpl/backend/weblife/common/buttons.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '129265393559ea6825d3f945-49924560',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
    'arrPageData' => 0,
    'task' => 0,
    'deleteIDLimit' => 0,
    'arrModules' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59ea682601c8c9_04169070',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ea682601c8c9_04169070')) {function content_59ea682601c8c9_04169070($_smarty_tpl) {?>

<div class="buttons_list">
       <input class="buttons" name="submit" type="submit" value="<?php echo @constant('BUTTON_SAVE');?>
" />
       <input class="buttons" name="submit_apply" type="submit" value="<?php echo @constant('BUTTON_APPLY');?>
"  />
       <?php if ($_smarty_tpl->tpl_vars['item']->value['id']&&$_smarty_tpl->tpl_vars['arrPageData']->value['module']!='comments'){?>
           <input class="buttons" name="submit_copy" type="submit" value="<?php echo @constant('BUTTON_COPY');?>
"  
                  onclick="return userConfirm('copy', '<?php echo @constant('CONFIRM_COPY');?>
')" />
       <?php }?>
       
<?php if ($_smarty_tpl->tpl_vars['task']->value=='addItem'){?>
       <input class="buttons" name="submit_add" type="submit" value="<?php echo @constant('BUTTON_SAVE_ADD');?>
"  />
       <input class="buttons" name="submit_clear" type="reset" value="<?php echo @constant('BUTTON_CLEAR');?>
"
              onclick="return userConfirm('clear', '<?php echo @constant('CONFIRM_EMPTY');?>
')" />
<?php }?>

       <input class="buttons" name="submit_cancel" type="submit" value="<?php echo @constant('BUTTON_CANCEL');?>
"
              onclick="return userConfirm('cancel', '<?php echo @constant('CONFIRM_NOT_SAVE');?>
')" />

<?php if ($_smarty_tpl->tpl_vars['task']->value=='editItem'&&$_smarty_tpl->tpl_vars['item']->value['id']>$_smarty_tpl->tpl_vars['deleteIDLimit']->value&&(!isset($_smarty_tpl->tpl_vars['item']->value['module'])||(array_key_exists($_smarty_tpl->tpl_vars['item']->value['module'],$_smarty_tpl->tpl_vars['arrModules']->value)&&$_smarty_tpl->tpl_vars['item']->value['id']!=$_smarty_tpl->tpl_vars['arrModules']->value[$_smarty_tpl->tpl_vars['item']->value['module']]['id']))){?>
       <input class="buttons" name="submit_delete" type="submit" value="<?php echo @constant('BUTTON_DELETE');?>
"
              onclick="return userConfirm('delete', '<?php echo @constant('CONFIRM_DELETE');?>
')" />
<?php }?>
</div>

<script type="text/javascript">
<!--
function userConfirm(task, message) {
    if(window.confirm(message)) {
        switch (task) {
	  case 'copy':
	    window.location='<?php echo (($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&task=addItem&copyID=")).($_smarty_tpl->tpl_vars['item']->value['id']);?>
';
	    break
          case 'clear':
            document.forms[0].reset();
            $.each(tinyMCE.editors, function() {
                this.setContent('');
            }); 
            
	    $.each($('input:text, textarea'), function() {
                $(this).val('');
            });
            if($('select').length>0){
                $.each($('select'), function(){
                    $('option', this).removeAttr("selected");
                    $('option:nth(0)', this).attr("selected", "selected");
                });
            }
            // catalog clear
            if($('#attrTable').length > 0) {
                $('#attrTable tbody').html('');
            }
            if($('#list_settings_selected_related').length >0 ) {
                $('#list_settings_selected_related').html('');
            }
            if($('#list_settings_all_related').length >0 ) {
                $('#list_settings_all_related').html('');
            }
            if($('#list_settings_all_kits').length >0 ) {
                $('#list_settings_all_kits').html('');
            }
            if($('#list_settings_selected_kits').length >0 ) {
                $('#list_settings_selected_kits').html('');
            }
            // main clear
            if($('#attrGroupsList').length>0) {
                $.each($('#attrGroupsList').find('input:checkbox'), function() {
                    $(this).removeAttr('checked');
                    updateAttributesList(this);
                });
            }
            if($('#filtersAllList').length>0) {
                $.each($('#filtersAllList').find('input:checkbox'), function() {
                    $(this).removeAttr('checked');
                    updateFiltersList(this);
                });
            }
            //attributes
            if($('#defaultVals').length>0) {
                $('#defaultVals').html('');
            }

	    break
	  case 'cancel':
	    window.location='<?php echo ($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url']);?>
';
	    break
	  case 'delete':
	    window.location='<?php echo (($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&task=deleteItem&itemID=")).($_smarty_tpl->tpl_vars['item']->value['id']);?>
';
	    break
	}   
    }
    return false; 
}
//-->
</script><?php }} ?>