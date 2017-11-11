<?php /* Smarty version Smarty-3.1.14, created on 2017-11-11 10:18:46
         compiled from "tpl/frontend/smart/ajax/minicart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13689373305a06b266074c72-57774021%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c6d486c298b9846d0045ba1fa3fff6360ed98b8' => 
    array (
      0 => 'tpl/frontend/smart/ajax/minicart.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13689373305a06b266074c72-57774021',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Basket' => 0,
    'HTMLHelper' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06b266133386_58811124',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06b266133386_58811124')) {function content_5a06b266133386_58811124($_smarty_tpl) {?><div class="minicart" id="minicart">
    <button class="trigger<?php if ($_smarty_tpl->tpl_vars['Basket']->value->getTotalAmount()>0){?> active<?php }?>" onclick="Basket.open();" data-count="<?php echo $_smarty_tpl->tpl_vars['Basket']->value->getTotalAmount();?>
" <?php if ($_smarty_tpl->tpl_vars['Basket']->value->getTotalAmount()==0){?>disabled<?php }?>></button>
    <span>
<?php if ($_smarty_tpl->tpl_vars['Basket']->value->getTotalAmount()==0){?>
        в корзине<br/>
        пока нет товаров
<?php }else{ ?>
        в корзине <?php echo $_smarty_tpl->tpl_vars['Basket']->value->getTotalAmount();?>
 <?php echo $_smarty_tpl->tpl_vars['HTMLHelper']->value->getNumEnding($_smarty_tpl->tpl_vars['Basket']->value->getTotalAmount(),array("товар","товара","товаров"));?>
 <br/>
        на сумму <?php echo number_format($_smarty_tpl->tpl_vars['Basket']->value->getTotalPrice(),0,'.',' ');?>
 грн.
<?php }?>
    </span>
</div><?php }} ?>