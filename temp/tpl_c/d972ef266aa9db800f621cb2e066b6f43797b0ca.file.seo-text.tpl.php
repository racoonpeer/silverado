<?php /* Smarty version Smarty-3.1.14, created on 2018-04-25 22:08:47
         compiled from "tpl/frontend/smart/core/seo-text.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5740733105ae0d23f6a6ab2-88828199%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd972ef266aa9db800f621cb2e066b6f43797b0ca' => 
    array (
      0 => 'tpl/frontend/smart/core/seo-text.tpl',
      1 => 1524679631,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5740733105ae0d23f6a6ab2-88828199',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arCategory' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5ae0d23f71f229_16497766',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ae0d23f71f229_16497766')) {function content_5ae0d23f71f229_16497766($_smarty_tpl) {?><?php if (($_smarty_tpl->tpl_vars['arCategory']->value['module']=="home"||($_smarty_tpl->tpl_vars['arCategory']->value['module']=="catalog"&&empty($_smarty_tpl->tpl_vars['item']->value)))&&!empty($_smarty_tpl->tpl_vars['arCategory']->value['seo_text'])){?>
<div class="seo-text"><?php echo $_smarty_tpl->tpl_vars['arCategory']->value['seo_text'];?>
</div>
<?php }?><?php }} ?>