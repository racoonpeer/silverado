<?php /* Smarty version Smarty-3.1.14, created on 2017-10-14 13:22:29
         compiled from "tpl\frontend\smart\core\product-sticker.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1212359e1e5653772a8-21459092%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a95ae8dad88dfa04d43a9027124ff7700dc2cb74' => 
    array (
      0 => 'tpl\\frontend\\smart\\core\\product-sticker.tpl',
      1 => 1507971576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1212359e1e5653772a8-21459092',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59e1e565438479_90180801',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e1e565438479_90180801')) {function content_59e1e565438479_90180801($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['item']->value['is_new']||$_smarty_tpl->tpl_vars['item']->value['is_top']||$_smarty_tpl->tpl_vars['item']->value['is_stock']){?>
<span class="badge <?php if ($_smarty_tpl->tpl_vars['item']->value['is_new']){?>sale<?php }elseif($_smarty_tpl->tpl_vars['item']->value['is_top']){?>hit<?php }elseif($_smarty_tpl->tpl_vars['item']->value['is_stock']){?>sale<?php }?>"></span>
<?php }?><?php }} ?>