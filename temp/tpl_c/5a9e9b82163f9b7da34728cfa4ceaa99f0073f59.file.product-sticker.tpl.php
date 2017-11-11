<?php /* Smarty version Smarty-3.1.14, created on 2017-11-11 10:18:46
         compiled from "tpl/frontend/smart/core/product-sticker.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21111910625a06b26654d349-08566686%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '21111910625a06b26654d349-08566686',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06b2665a76b7_12531580',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06b2665a76b7_12531580')) {function content_5a06b2665a76b7_12531580($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['item']->value['is_new']||$_smarty_tpl->tpl_vars['item']->value['is_top']||$_smarty_tpl->tpl_vars['item']->value['is_stock']){?>
<span class="badge <?php if ($_smarty_tpl->tpl_vars['item']->value['is_new']){?>sale<?php }elseif($_smarty_tpl->tpl_vars['item']->value['is_top']){?>hit<?php }elseif($_smarty_tpl->tpl_vars['item']->value['is_stock']){?>sale<?php }?>"></span>
<?php }?><?php }} ?>