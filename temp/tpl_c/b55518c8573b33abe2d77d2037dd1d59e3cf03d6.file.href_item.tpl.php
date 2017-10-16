<?php /* Smarty version Smarty-3.1.14, created on 2017-10-16 14:04:23
         compiled from "tpl\frontend\smart\core\href_item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:969759e49237eaa761-73035329%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '969759e49237eaa761-73035329',
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
  'unifunc' => 'content_59e49238015dd6_36206405',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e49238015dd6_36206405')) {function content_59e49238015dd6_36206405($_smarty_tpl) {?><?php if (!isset($_smarty_tpl->tpl_vars['params']->value)){?><?php $_smarty_tpl->tpl_vars['params'] = new Smarty_variable('', null, 0);?><?php }?><?php echo $_smarty_tpl->tpl_vars['UrlWL']->value->buildItemUrl($_smarty_tpl->tpl_vars['arCategory']->value,$_smarty_tpl->tpl_vars['arItem']->value,$_smarty_tpl->tpl_vars['params']->value);?>
<?php }} ?>