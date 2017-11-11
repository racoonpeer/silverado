<?php /* Smarty version Smarty-3.1.14, created on 2017-11-11 10:18:45
         compiled from "tpl/frontend/smart/core/href.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4044708195a06b265d459a8-44869578%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68863dedf4148aee313d39d010efab53745aba03' => 
    array (
      0 => 'tpl/frontend/smart/core/href.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4044708195a06b265d459a8-44869578',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'params' => 0,
    'arCategory' => 0,
    'UrlWL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06b265d86d37_62332162',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06b265d86d37_62332162')) {function content_5a06b265d86d37_62332162($_smarty_tpl) {?><?php if (!isset($_smarty_tpl->tpl_vars['params']->value)){?><?php $_smarty_tpl->tpl_vars['params'] = new Smarty_variable('', null, 0);?><?php }?><?php echo $_smarty_tpl->tpl_vars['UrlWL']->value->buildCategoryUrl($_smarty_tpl->tpl_vars['arCategory']->value,$_smarty_tpl->tpl_vars['params']->value);?>
<?php }} ?>