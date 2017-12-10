<?php /* Smarty version Smarty-3.1.14, created on 2017-12-10 15:19:25
         compiled from "tpl/frontend/smart/ajax/minibasket.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11559911515a2428edf0b022-11190933%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b8703e4373a0f9bf8c48dfbf18f9c1a0f91f41e' => 
    array (
      0 => 'tpl/frontend/smart/ajax/minibasket.tpl',
      1 => 1512911963,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11559911515a2428edf0b022-11190933',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a2428ee173429_28742623',
  'variables' => 
  array (
    'IS_AJAX' => 0,
    'Basket' => 0,
    'arItem' => 0,
    'option' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2428ee173429_28742623')) {function content_5a2428ee173429_28742623($_smarty_tpl) {?><?php if (!$_smarty_tpl->tpl_vars['IS_AJAX']->value){?>
<div class="minibasket" id="minibasket">
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['Basket']->value->isEmptyBasket()){?>
    <script type="text/javascript">window.location.reload();</script>
<?php }else{ ?>
    <div class="basket-items">
<?php  $_smarty_tpl->tpl_vars['arItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['arItem']->_loop = false;
 $_smarty_tpl->tpl_vars['arKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['Basket']->value->getItems(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['arItem']->key => $_smarty_tpl->tpl_vars['arItem']->value){
$_smarty_tpl->tpl_vars['arItem']->_loop = true;
 $_smarty_tpl->tpl_vars['arKey']->value = $_smarty_tpl->tpl_vars['arItem']->key;
?>
        <div class="item clearfix">
            <div class="pull-left image">
                <a href="<?php echo $_smarty_tpl->getSubTemplate ('core/href_item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['arItem']->value['arCategory'],'arItem'=>$_smarty_tpl->tpl_vars['arItem']->value), 0);?>
">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['arItem']->value['image']['small_image'];?>
" alt=""/>
                </a>
            </div>
            <div class="title">
                <a href="<?php echo $_smarty_tpl->getSubTemplate ('core/href_item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['arItem']->value['arCategory'],'arItem'=>$_smarty_tpl->tpl_vars['arItem']->value), 0);?>
"><?php echo $_smarty_tpl->tpl_vars['arItem']->value['title'];?>
 <?php echo $_smarty_tpl->tpl_vars['arItem']->value['pcode'];?>
</a>
            </div>
<?php if (!empty($_smarty_tpl->tpl_vars['arItem']->value['options'])){?>
            <div class="options">
<?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_smarty_tpl->tpl_vars['optionID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arItem']->value['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['option']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['option']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
 $_smarty_tpl->tpl_vars['optionID']->value = $_smarty_tpl->tpl_vars['option']->key;
 $_smarty_tpl->tpl_vars['option']->iteration++;
 $_smarty_tpl->tpl_vars['option']->last = $_smarty_tpl->tpl_vars['option']->iteration === $_smarty_tpl->tpl_vars['option']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['j']['last'] = $_smarty_tpl->tpl_vars['option']->last;
?>
<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['valueID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['option']->value['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['valueID']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
<?php if ($_smarty_tpl->tpl_vars['value']->value['selected']){?>
                <?php echo $_smarty_tpl->tpl_vars['option']->value['title'];?>
: <?php echo $_smarty_tpl->tpl_vars['value']->value['title'];?>
<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['j']['last']){?>, <?php }?>
<?php }?>
<?php } ?>
<?php } ?>
            </div>
<?php }?>
            <div class="price">
                <?php echo $_smarty_tpl->tpl_vars['arItem']->value['qty'];?>
 <small>шт.</small>
                <strong>
                    <?php echo number_format($_smarty_tpl->tpl_vars['arItem']->value['price'],0,'.',' ');?>

                </strong>
            </div>
        </div>
<?php } ?>
    </div>
    <div class="summary clearfix">
        Сумма к оплате
        <strong class="pull-right">
            <?php echo number_format($_smarty_tpl->tpl_vars['Basket']->value->getTotalPrice(),0,'.',' ');?>

        </strong>
    </div>
<?php }?>
<?php if (!$_smarty_tpl->tpl_vars['IS_AJAX']->value){?>
</div>
<?php }?><?php }} ?>