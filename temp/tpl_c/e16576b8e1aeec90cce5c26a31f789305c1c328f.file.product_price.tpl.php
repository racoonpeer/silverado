<?php /* Smarty version Smarty-3.1.14, created on 2017-10-08 19:23:44
         compiled from "tpl/frontend/smart/core/product_price.tpl" */ ?>
<?php /*%%SmartyHeaderCode:195646131459ac7128424db5-10180741%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e16576b8e1aeec90cce5c26a31f789305c1c328f' => 
    array (
      0 => 'tpl/frontend/smart/core/product_price.tpl',
      1 => 1507479416,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '195646131459ac7128424db5-10180741',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59ac71284f17c7_01161510',
  'variables' => 
  array (
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ac71284f17c7_01161510')) {function content_59ac71284f17c7_01161510($_smarty_tpl) {?><div class="price<?php if ($_smarty_tpl->tpl_vars['item']->value['old_price']&&$_smarty_tpl->tpl_vars['item']->value['old_price']>$_smarty_tpl->tpl_vars['item']->value['price']){?> stock<?php }?>">
<?php if ($_smarty_tpl->tpl_vars['item']->value['old_price']&&$_smarty_tpl->tpl_vars['item']->value['old_price']>$_smarty_tpl->tpl_vars['item']->value['price']){?>
    <span class="strike">
        <strong><?php echo number_format($_smarty_tpl->tpl_vars['item']->value['old_price'],0,'.',' ');?>
</strong>
    </span>
<?php }?>
    <strong><?php echo number_format($_smarty_tpl->tpl_vars['item']->value['price'],0,'.',' ');?>
</strong>
</div><?php }} ?>