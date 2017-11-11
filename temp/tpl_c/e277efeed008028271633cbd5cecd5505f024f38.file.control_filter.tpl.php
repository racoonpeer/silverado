<?php /* Smarty version Smarty-3.1.14, created on 2017-11-11 11:14:58
         compiled from "tpl/frontend/smart/ajax/control_filter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1438341555a06bf92eb0503-60786386%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e277efeed008028271633cbd5cecd5505f024f38' => 
    array (
      0 => 'tpl/frontend/smart/ajax/control_filter.tpl',
      1 => 1508789593,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1438341555a06bf92eb0503-60786386',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'UrlWL' => 0,
    'arrPageData' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06bf92f0f117_83958169',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06bf92f0f117_83958169')) {function content_5a06bf92f0f117_83958169($_smarty_tpl) {?><div class="control-filter" id="control_filter">
    <button class="trigger" onclick="MobileFilters.toggle('<?php echo $_smarty_tpl->tpl_vars['UrlWL']->value->copy()->resetPage()->resetFilters()->buildUrl();?>
');">
<?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['selectedFilters'])){?>
        <span class="cnt"><?php echo count($_smarty_tpl->tpl_vars['arrPageData']->value['selectedFilters']);?>
</span>
<?php }?>
    </button>
</div><?php }} ?>