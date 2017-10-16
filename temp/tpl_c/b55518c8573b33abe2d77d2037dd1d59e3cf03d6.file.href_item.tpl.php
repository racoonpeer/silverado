<?php /* Smarty version Smarty-3.1.14, created on 2017-10-14 13:22:29
         compiled from "tpl\frontend\smart\core\href_item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2417059e1e5651f52e3-39575855%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b55518c8573b33abe2d77d2037dd1d59e3cf03d6' => 
    array (
      0 => 'tpl\\frontend\\smart\\core\\href_item.tpl',
      1 => 1507971576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2417059e1e5651f52e3-39575855',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'params' => 0,
    'arCategory' => 0,
    'arItem' => 0,
    'UrlWL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59e1e56529dd79_63451517',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e1e56529dd79_63451517')) {function content_59e1e56529dd79_63451517($_smarty_tpl) {?><?php if (!isset($_smarty_tpl->tpl_vars['params']->value)){?><?php $_smarty_tpl->tpl_vars['params'] = new Smarty_variable('', null, 0);?><?php }?><?php echo $_smarty_tpl->tpl_vars['UrlWL']->value->buildItemUrl($_smarty_tpl->tpl_vars['arCategory']->value,$_smarty_tpl->tpl_vars['arItem']->value,$_smarty_tpl->tpl_vars['params']->value);?>
<?php }} ?>