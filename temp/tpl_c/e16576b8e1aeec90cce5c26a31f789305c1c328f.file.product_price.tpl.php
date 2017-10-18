<?php /* Smarty version Smarty-3.1.14, created on 2017-10-17 22:23:37
         compiled from "tpl/frontend/smart/core/product_price.tpl" */ ?>
<?php /*%%SmartyHeaderCode:163619075659e658b9091b15-36988901%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '163619075659e658b9091b15-36988901',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59e658b9111526_74233838',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e658b9111526_74233838')) {function content_59e658b9111526_74233838($_smarty_tpl) {?><div class="price<?php if ($_smarty_tpl->tpl_vars['item']->value['old_price']&&$_smarty_tpl->tpl_vars['item']->value['old_price']>$_smarty_tpl->tpl_vars['item']->value['price']){?> stock<?php }?>">
<?php if ($_smarty_tpl->tpl_vars['item']->value['old_price']&&$_smarty_tpl->tpl_vars['item']->value['old_price']>$_smarty_tpl->tpl_vars['item']->value['price']){?>
    <span class="strike">
        <strong><?php echo number_format($_smarty_tpl->tpl_vars['item']->value['old_price'],0,'.',' ');?>
</strong>
    </span>
<?php }?>
    <strong><?php echo number_format($_smarty_tpl->tpl_vars['item']->value['price'],0,'.',' ');?>
</strong>
</div><?php }} ?>