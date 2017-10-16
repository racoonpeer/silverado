<?php /* Smarty version Smarty-3.1.14, created on 2017-10-16 17:43:24
         compiled from "tpl\frontend\smart\ajax\control_filter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2009859e4b11525e3e2-63711812%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '16a920cf40608e2adc0094d1af347f266efe98cd' => 
    array (
      0 => 'tpl\\frontend\\smart\\ajax\\control_filter.tpl',
      1 => 1508164856,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2009859e4b11525e3e2-63711812',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59e4b1152885a2_34319796',
  'variables' => 
  array (
    'arrPageData' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e4b1152885a2_34319796')) {function content_59e4b1152885a2_34319796($_smarty_tpl) {?><div class="control-filter">
    <button class="trigger" onclick="return true;">
        <span class="cnt">6</span>
<?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['selectedFilters'])){?>
        <span class="cnt"><?php echo count($_smarty_tpl->tpl_vars['arrPageData']->value['selectedFilters']);?>
</span>
<?php }?>
    </button>
</div><?php }} ?>