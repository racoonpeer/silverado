<?php /* Smarty version Smarty-3.1.14, created on 2017-10-08 19:23:44
         compiled from "tpl/frontend/smart/core/href_item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:136557227659ac7127eb3233-29201820%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de0dfc3d4e4450b955fa5d1692e81fe68df4ce58' => 
    array (
      0 => 'tpl/frontend/smart/core/href_item.tpl',
      1 => 1507479416,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136557227659ac7127eb3233-29201820',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59ac7128022f01_64376687',
  'variables' => 
  array (
    'params' => 0,
    'arCategory' => 0,
    'arItem' => 0,
    'UrlWL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ac7128022f01_64376687')) {function content_59ac7128022f01_64376687($_smarty_tpl) {?><?php if (!isset($_smarty_tpl->tpl_vars['params']->value)){?><?php $_smarty_tpl->tpl_vars['params'] = new Smarty_variable('', null, 0);?><?php }?><?php echo $_smarty_tpl->tpl_vars['UrlWL']->value->buildItemUrl($_smarty_tpl->tpl_vars['arCategory']->value,$_smarty_tpl->tpl_vars['arItem']->value,$_smarty_tpl->tpl_vars['params']->value);?>
<?php }} ?>