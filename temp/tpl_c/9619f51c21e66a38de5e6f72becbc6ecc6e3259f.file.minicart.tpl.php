<?php /* Smarty version Smarty-3.1.14, created on 2017-10-14 13:22:27
         compiled from "tpl\frontend\smart\ajax\minicart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1814759e1e5637a36b3-29117975%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9619f51c21e66a38de5e6f72becbc6ecc6e3259f' => 
    array (
      0 => 'tpl\\frontend\\smart\\ajax\\minicart.tpl',
      1 => 1507971576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1814759e1e5637a36b3-29117975',
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
  'unifunc' => 'content_59e1e5639d4b26_00947873',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e1e5639d4b26_00947873')) {function content_59e1e5639d4b26_00947873($_smarty_tpl) {?><div class="minicart" id="minicart">
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