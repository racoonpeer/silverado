<?php /* Smarty version Smarty-3.1.14, created on 2017-10-16 14:04:24
         compiled from "tpl\frontend\smart\core\product_price.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1125259e49238a12145-18160142%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd558b45faca2d73a8a0f3d330393487dc105f40c' => 
    array (
      0 => 'tpl\\frontend\\smart\\core\\product_price.tpl',
      1 => 1507971576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1125259e49238a12145-18160142',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59e49238b695c8_81146970',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e49238b695c8_81146970')) {function content_59e49238b695c8_81146970($_smarty_tpl) {?><div class="price<?php if ($_smarty_tpl->tpl_vars['item']->value['old_price']&&$_smarty_tpl->tpl_vars['item']->value['old_price']>$_smarty_tpl->tpl_vars['item']->value['price']){?> stock<?php }?>">
<?php if ($_smarty_tpl->tpl_vars['item']->value['old_price']&&$_smarty_tpl->tpl_vars['item']->value['old_price']>$_smarty_tpl->tpl_vars['item']->value['price']){?>
    <span class="strike">
        <strong><?php echo number_format($_smarty_tpl->tpl_vars['item']->value['old_price'],0,'.',' ');?>
</strong>
    </span>
<?php }?>
    <strong><?php echo number_format($_smarty_tpl->tpl_vars['item']->value['price'],0,'.',' ');?>
</strong>
</div><?php }} ?>