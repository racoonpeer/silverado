<?php /* Smarty version Smarty-3.1.14, created on 2017-10-08 19:23:44
         compiled from "tpl/frontend/smart/core/product-sticker.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17503844659ac712802a508-04654225%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a9e9b82163f9b7da34728cfa4ceaa99f0073f59' => 
    array (
      0 => 'tpl/frontend/smart/core/product-sticker.tpl',
      1 => 1507479416,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17503844659ac712802a508-04654225',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59ac71281302f2_13908114',
  'variables' => 
  array (
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ac71281302f2_13908114')) {function content_59ac71281302f2_13908114($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['item']->value['is_new']||$_smarty_tpl->tpl_vars['item']->value['is_top']||$_smarty_tpl->tpl_vars['item']->value['is_stock']){?>
<span class="badge <?php if ($_smarty_tpl->tpl_vars['item']->value['is_new']){?>sale<?php }elseif($_smarty_tpl->tpl_vars['item']->value['is_top']){?>hit<?php }elseif($_smarty_tpl->tpl_vars['item']->value['is_stock']){?>sale<?php }?>"></span>
<?php }?><?php }} ?>