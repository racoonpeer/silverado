<?php /* Smarty version Smarty-3.1.14, created on 2017-10-16 14:04:25
         compiled from "tpl\frontend\smart\ajax\basket.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2323159e492398dbfe7-72305885%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3407be94903a085992e80255764fcbced27525a8' => 
    array (
      0 => 'tpl\\frontend\\smart\\ajax\\basket.tpl',
      1 => 1507971576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2323159e492398dbfe7-72305885',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Basket' => 0,
    'HTMLHelper' => 0,
    'arItem' => 0,
    'option' => 0,
    'value' => 0,
    'arKey' => 0,
    'arrModules' => 0,
    'UrlWL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59e4923a1063a3_71484766',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e4923a1063a3_71484766')) {function content_59e4923a1063a3_71484766($_smarty_tpl) {?><?php if (!$_smarty_tpl->tpl_vars['Basket']->value->isEmptyBasket()){?>
<div class="full">
    <div class="heading">
        Корзина
        <br/>
        <small>всего <?php echo $_smarty_tpl->tpl_vars['Basket']->value->getTotalAmount();?>
 <?php echo $_smarty_tpl->tpl_vars['HTMLHelper']->value->getNumEnding($_smarty_tpl->tpl_vars['Basket']->value->getTotalAmount(),array("товар","товара","товаров"));?>
 на сумму <?php echo number_format($_smarty_tpl->tpl_vars['Basket']->value->getTotalPrice(),0,'.',' ');?>
 грн.</small>
    </div>
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
                    <img src="<?php echo $_smarty_tpl->tpl_vars['arItem']->value['middle_image'];?>
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
                <strong><?php echo number_format($_smarty_tpl->tpl_vars['arItem']->value['price'],0,'.',' ');?>
</strong>
            </div>
            <div class="calc qty">
                <button class="minus" onclick="Basket.add('<?php echo $_smarty_tpl->tpl_vars['arKey']->value;?>
', <?php echo $_smarty_tpl->tpl_vars['arItem']->value['quantity']-1;?>
, 1);" <?php if ($_smarty_tpl->tpl_vars['arItem']->value['quantity']==1){?>disabled<?php }?>></button>
                <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['arItem']->value['quantity'];?>
" readonly=""/>
                <button class="plus" onclick="Basket.add('<?php echo $_smarty_tpl->tpl_vars['arKey']->value;?>
', <?php echo $_smarty_tpl->tpl_vars['arItem']->value['quantity']+1;?>
, 1);"></button>
            </div>
            <a class="del" href="#" onclick="Basket.remove('<?php echo $_smarty_tpl->tpl_vars['arKey']->value;?>
');"></a>
        </div>
<?php } ?>
    </div>
    <div class="summary clearfix">
        Итого к оплате
        <strong class="pull-right"><?php echo number_format($_smarty_tpl->tpl_vars['Basket']->value->getTotalPrice(),0,'.',' ');?>
</strong>
    </div>
    <div class="buttons clearfix">
        <a href="<?php echo $_smarty_tpl->getSubTemplate ("core/href.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['arrModules']->value['checkout']), 0);?>
" class="btn btn-xl btn-danger btn-block">Оформить заказ</a><br/>
        <a href="#" onclick="Basket.close();" class="btn btn-xl btn-link btn-block">Продолжить покупки</a>
    </div>
</div>
<?php }else{ ?>
<div class="empty">
    <div class="message">
        Корзина пуста
        <p>но это легко исправить :)</p>
    </div>
    <div class="last-watched">
        <div class="h3">Вы недавно смотрели</div>
        <div class="watched-slider swiper-container">
            <div class="swiper-wrapper">
<?php  $_smarty_tpl->tpl_vars['arItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['arItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['HTMLHelper']->value->getLastWatched($_smarty_tpl->tpl_vars['UrlWL']->value); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['arItem']->key => $_smarty_tpl->tpl_vars['arItem']->value){
$_smarty_tpl->tpl_vars['arItem']->_loop = true;
?>
                <div class="watched-item swiper-slide">
                    <div class="img">
                        <a href="<?php echo $_smarty_tpl->getSubTemplate ("core/href_item.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['arItem']->value['arCategory'],'arItem'=>$_smarty_tpl->tpl_vars['arItem']->value,'params'=>''), 0);?>
">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['arItem']->value['image']['small_image'];?>
" alt=""/>
                        </a>
                    </div>
                    <div class="title">
                        <a href="<?php echo $_smarty_tpl->getSubTemplate ('core/href_item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['arItem']->value['arCategory'],'arItem'=>$_smarty_tpl->tpl_vars['arItem']->value), 0);?>
"><?php echo $_smarty_tpl->tpl_vars['arItem']->value['name'];?>
</a>
                    </div>
                    <div class="category">
                        <a href="<?php echo $_smarty_tpl->getSubTemplate ('core/href.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['arItem']->value['arCategory']), 0);?>
"><?php echo $_smarty_tpl->tpl_vars['arItem']->value['arCategory']['title'];?>
</a>
                    </div>
                    <?php echo $_smarty_tpl->getSubTemplate ("core/product_price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('item'=>$_smarty_tpl->tpl_vars['arItem']->value), 0);?>

                </div>
<?php } ?>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-scrollbar"></div>
        </div>
    </div>
    <div class="buttons clearfix">
        <a href="#" onclick="Basket.close();" class="btn btn-xl btn-link btn-block">Продолжить покупки</a>
    </div>
</div>
<?php }?>
<button class="close" onclick="Basket.close();"></button><?php }} ?>