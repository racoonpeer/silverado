<?php /* Smarty version Smarty-3.1.14, created on 2017-11-11 11:15:35
         compiled from "tpl/frontend/smart/core/product-kit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17534542535a06bfb7de4425-46766237%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5d4669018ac9e1b3df23bd7b5ed3cafd6ef5273' => 
    array (
      0 => 'tpl/frontend/smart/core/product-kit.tpl',
      1 => 1509301716,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17534542535a06bfb7de4425-46766237',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
    'kitItem' => 0,
    'element' => 0,
    'Basket' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06bfb80fc5a0_20784323',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06bfb80fc5a0_20784323')) {function content_5a06bfb80fc5a0_20784323($_smarty_tpl) {?><div class="product-set">
    <div class="h2">В комплекте дешевле</div>
    <div class="product-set-blocks">
<?php  $_smarty_tpl->tpl_vars['kitItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['kitItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['kits']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['kitItem']->key => $_smarty_tpl->tpl_vars['kitItem']->value){
$_smarty_tpl->tpl_vars['kitItem']->_loop = true;
?>
        <div class="product-set-block">
            <div class="product-set-items">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
<?php  $_smarty_tpl->tpl_vars['element'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['element']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['kitItem']->value['elements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['element']->key => $_smarty_tpl->tpl_vars['element']->value){
$_smarty_tpl->tpl_vars['element']->_loop = true;
?>
                        <div class="swiper-slide product-set-item clearfix">
                            <div class="product-set-item-image">
<?php if ($_smarty_tpl->tpl_vars['element']->value['id']!=$_smarty_tpl->tpl_vars['item']->value['id']){?>
                                <a href="<?php echo $_smarty_tpl->getSubTemplate ("core/href_item.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['element']->value['arCategory'],'arItem'=>$_smarty_tpl->tpl_vars['element']->value,'params'=>''), 0);?>
">
<?php }?>
                                <img src="<?php echo $_smarty_tpl->tpl_vars['element']->value['image']['middle_image'];?>
" alt=""/>
<?php if ($_smarty_tpl->tpl_vars['element']->value['id']!=$_smarty_tpl->tpl_vars['item']->value['id']){?>
                                </a>
<?php }?>
                            </div>
                            <div class="product-set-item-info">
                                <div class="product-set-item-title">
<?php if ($_smarty_tpl->tpl_vars['element']->value['id']!=$_smarty_tpl->tpl_vars['item']->value['id']){?>
                                    <a href="<?php echo $_smarty_tpl->getSubTemplate ("core/href_item.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['element']->value['arCategory'],'arItem'=>$_smarty_tpl->tpl_vars['element']->value,'params'=>''), 0);?>
">
<?php }?>
                                    <?php echo $_smarty_tpl->tpl_vars['element']->value['name'];?>

<?php if ($_smarty_tpl->tpl_vars['element']->value['id']!=$_smarty_tpl->tpl_vars['item']->value['id']){?>
                                    </a>
<?php }?>
                                </div>
                                <div class="product-set-item-price">
                                    <strong><?php echo number_format($_smarty_tpl->tpl_vars['element']->value['price'],0,'.',' ');?>
</strong>
                                </div>
                            </div>
                        </div>
<?php } ?>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-scrollbar"></div>
                </div>
            </div>
            <div class="product-set-summary">
                <div class="price">
<?php if (!empty($_smarty_tpl->tpl_vars['kitItem']->value['old_price'])){?>
                    <span class="strike">
                        <strong><?php echo number_format($_smarty_tpl->tpl_vars['kitItem']->value['old_price'],0,'.',' ');?>
</strong>
                    </span>
<?php }?>
                    <strong><?php echo number_format($_smarty_tpl->tpl_vars['kitItem']->value['price'],0,'.',' ');?>
</strong>
                </div>
                <button class="btn btn-l btn-danger add-to-cart<?php if ($_smarty_tpl->tpl_vars['Basket']->value->isSetKey($_smarty_tpl->tpl_vars['kitItem']->value['idKey'])){?> in-cart<?php }?>" 
                    data-key="<?php echo $_smarty_tpl->tpl_vars['kitItem']->value['idKey'];?>
" 
                    data-url="<?php echo $_smarty_tpl->getSubTemplate ('core/href_item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['kitItem']->value['arCategory'],'arItem'=>$_smarty_tpl->tpl_vars['kitItem']->value), 0);?>
" 
                    onclick="<?php if ($_smarty_tpl->tpl_vars['Basket']->value->isSetKey($_smarty_tpl->tpl_vars['kitItem']->value['idKey'])){?>Basket.open();<?php }else{ ?>Basket.openDialog($(this).data('url'));<?php }?>"
                    data-text="Купить комплект" data-alt="<?php echo @constant('IN_CART');?>
">
                </button>
                <div class="eco">Вы экономите <?php echo number_format($_smarty_tpl->tpl_vars['kitItem']->value['discount_price'],0,'.',' ');?>
 грн.</div>
            </div>
        </div>
<?php } ?>
    </div>
</div><?php }} ?>