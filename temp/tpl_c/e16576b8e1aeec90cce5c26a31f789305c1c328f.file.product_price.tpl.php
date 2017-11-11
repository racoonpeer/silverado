<?php /* Smarty version Smarty-3.1.14, created on 2017-11-11 10:18:46
         compiled from "tpl/frontend/smart/core/product_price.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17628355535a06b2666d32f4-35213493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e16576b8e1aeec90cce5c26a31f789305c1c328f' => 
    array (
      0 => 'tpl/frontend/smart/core/product_price.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17628355535a06b2666d32f4-35213493',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06b2667549b6_03893471',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06b2667549b6_03893471')) {function content_5a06b2667549b6_03893471($_smarty_tpl) {?><div class="price<?php if ($_smarty_tpl->tpl_vars['item']->value['old_price']&&$_smarty_tpl->tpl_vars['item']->value['old_price']>$_smarty_tpl->tpl_vars['item']->value['price']){?> stock<?php }?>">
<?php if ($_smarty_tpl->tpl_vars['item']->value['old_price']&&$_smarty_tpl->tpl_vars['item']->value['old_price']>$_smarty_tpl->tpl_vars['item']->value['price']){?>
    <span class="strike">
        <strong><?php echo number_format($_smarty_tpl->tpl_vars['item']->value['old_price'],0,'.',' ');?>
</strong>
    </span>
<?php }?>
    <strong><?php echo number_format($_smarty_tpl->tpl_vars['item']->value['price'],0,'.',' ');?>
</strong>
</div><?php }} ?>