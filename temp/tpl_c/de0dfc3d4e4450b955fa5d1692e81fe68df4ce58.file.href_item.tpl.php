<?php /* Smarty version Smarty-3.1.14, created on 2017-11-11 10:18:46
         compiled from "tpl/frontend/smart/core/href_item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10538453395a06b2664fcb67-65348396%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de0dfc3d4e4450b955fa5d1692e81fe68df4ce58' => 
    array (
      0 => 'tpl/frontend/smart/core/href_item.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10538453395a06b2664fcb67-65348396',
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
  'unifunc' => 'content_5a06b266547487_46845292',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06b266547487_46845292')) {function content_5a06b266547487_46845292($_smarty_tpl) {?><?php if (!isset($_smarty_tpl->tpl_vars['params']->value)){?><?php $_smarty_tpl->tpl_vars['params'] = new Smarty_variable('', null, 0);?><?php }?><?php echo $_smarty_tpl->tpl_vars['UrlWL']->value->buildItemUrl($_smarty_tpl->tpl_vars['arCategory']->value,$_smarty_tpl->tpl_vars['arItem']->value,$_smarty_tpl->tpl_vars['params']->value);?>
<?php }} ?>