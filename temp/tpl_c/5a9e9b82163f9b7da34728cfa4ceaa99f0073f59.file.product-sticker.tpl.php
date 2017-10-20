<?php /* Smarty version Smarty-3.1.14, created on 2017-10-17 22:23:36
         compiled from "tpl/frontend/smart/core/product-sticker.tpl" */ ?>
<?php /*%%SmartyHeaderCode:141819148959e658b8e64cc6-32725082%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a9e9b82163f9b7da34728cfa4ceaa99f0073f59' => 
    array (
      0 => 'tpl/frontend/smart/core/product-sticker.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141819148959e658b8e64cc6-32725082',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59e658b8ebbe23_59730916',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e658b8ebbe23_59730916')) {function content_59e658b8ebbe23_59730916($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['item']->value['is_new']||$_smarty_tpl->tpl_vars['item']->value['is_top']||$_smarty_tpl->tpl_vars['item']->value['is_stock']){?>
<span class="badge <?php if ($_smarty_tpl->tpl_vars['item']->value['is_new']){?>sale<?php }elseif($_smarty_tpl->tpl_vars['item']->value['is_top']){?>hit<?php }elseif($_smarty_tpl->tpl_vars['item']->value['is_stock']){?>sale<?php }?>"></span>
<?php }?><?php }} ?>