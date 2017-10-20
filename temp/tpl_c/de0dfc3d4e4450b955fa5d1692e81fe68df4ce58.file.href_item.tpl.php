<?php /* Smarty version Smarty-3.1.14, created on 2017-10-17 22:23:36
         compiled from "tpl/frontend/smart/core/href_item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:106839957459e658b8e14c44-87449802%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '106839957459e658b8e14c44-87449802',
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
  'unifunc' => 'content_59e658b8e5e896_17067995',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e658b8e5e896_17067995')) {function content_59e658b8e5e896_17067995($_smarty_tpl) {?><?php if (!isset($_smarty_tpl->tpl_vars['params']->value)){?><?php $_smarty_tpl->tpl_vars['params'] = new Smarty_variable('', null, 0);?><?php }?><?php echo $_smarty_tpl->tpl_vars['UrlWL']->value->buildItemUrl($_smarty_tpl->tpl_vars['arCategory']->value,$_smarty_tpl->tpl_vars['arItem']->value,$_smarty_tpl->tpl_vars['params']->value);?>
<?php }} ?>