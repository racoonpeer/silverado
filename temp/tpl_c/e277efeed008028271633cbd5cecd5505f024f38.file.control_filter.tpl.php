<?php /* Smarty version Smarty-3.1.14, created on 2017-10-22 22:50:49
         compiled from "tpl/frontend/smart/ajax/control_filter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:59441363159e658e13ac123-24859907%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e277efeed008028271633cbd5cecd5505f024f38' => 
    array (
      0 => 'tpl/frontend/smart/ajax/control_filter.tpl',
      1 => 1508701589,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59441363159e658e13ac123-24859907',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59e658e13d9080_20941380',
  'variables' => 
  array (
    'arrPageData' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e658e13d9080_20941380')) {function content_59e658e13d9080_20941380($_smarty_tpl) {?><div class="control-filter" id="control_filter">
    <button class="trigger" onclick="return true;">
        <span class="cnt">6</span>
<?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['selectedFilters'])){?>
        <span class="cnt"><?php echo count($_smarty_tpl->tpl_vars['arrPageData']->value['selectedFilters']);?>
</span>
<?php }?>
    </button>
</div><?php }} ?>