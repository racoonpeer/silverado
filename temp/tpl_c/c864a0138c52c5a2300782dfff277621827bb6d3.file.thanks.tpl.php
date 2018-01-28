<?php /* Smarty version Smarty-3.1.14, created on 2018-01-28 18:42:20
         compiled from "tpl/frontend/smart/module/thanks.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21001103625a0b42aaa00fb2-87616539%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c864a0138c52c5a2300782dfff277621827bb6d3' => 
    array (
      0 => 'tpl/frontend/smart/module/thanks.tpl',
      1 => 1517157684,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21001103625a0b42aaa00fb2-87616539',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a0b42aaac0b74_98648536',
  'variables' => 
  array (
    'arrPageData' => 0,
    'item' => 0,
    'purchases' => 0,
    'arItem' => 0,
    'option' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a0b42aaac0b74_98648536')) {function content_5a0b42aaac0b74_98648536($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Volumes/K2/htdocs/silverado/www/include/smarty/plugins/modifier.date_format.php';
?><div class="page-container clearfix">
    <div class="container clearfix">
        <h1 class="heading-title"><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['headingTitle'];?>
</h1>
        <div class="messages">
            <?php echo implode($_smarty_tpl->tpl_vars['arrPageData']->value['messages'],"<br/>");?>

        </div>
        <div class="order" id="order" data-order-info="Заказ №<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
 | <?php echo $_SERVER['HTTP_HOST'];?>
" data-date-info="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['created'],"%d.%m.%Y %H:%M");?>
">
            <div class="h2 non-print">
                Ваш заказ
                <a href="#" class="print"></a>
            </div>
            <div class="basket-items">
<?php  $_smarty_tpl->tpl_vars['arItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['arItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['purchases']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['arItem']->key => $_smarty_tpl->tpl_vars['arItem']->value){
$_smarty_tpl->tpl_vars['arItem']->_loop = true;
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
                        <strong><?php echo number_format($_smarty_tpl->tpl_vars['arItem']->value['price'],0,'.',' ');?>
</strong>
                    </div>
                </div>
<?php } ?>
            </div>
            <div class="summary">
                Сумма к оплате
                <strong class="pull-right">
                    <?php echo number_format($_smarty_tpl->tpl_vars['item']->value['price'],0,'.',' ');?>

                </strong>
            </div>
            <div class="hr"></div>
            <div class="user-info">
                <div class="h3">Информация о заказе</div>
                <p>
<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['firstname'])){?>
                    Имя: <?php echo unScreenData($_smarty_tpl->tpl_vars['item']->value['firstname']);?>
<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['surname'])){?> <?php echo unScreenData($_smarty_tpl->tpl_vars['item']->value['surname']);?>
<?php }?><br/>
<?php }?>
                    Тел: <?php echo $_smarty_tpl->tpl_vars['item']->value['phone'];?>

<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['email'])){?>
                    <br/>
                    E-mail: <?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>

<?php }?>
                </p>
                <p>
<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['shipping'])){?>
                    Доставка: <?php echo $_smarty_tpl->tpl_vars['item']->value['shipping']['title'];?>

<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['city'])){?>
                    <br/>
                    Город: <?php echo unScreenData($_smarty_tpl->tpl_vars['item']->value['city']);?>

<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['address'])){?>
                    <br/>
                    Адрес: <?php echo unScreenData($_smarty_tpl->tpl_vars['item']->value['address']);?>

<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['ext_firstname'])&&!empty($_smarty_tpl->tpl_vars['item']->value['ext_firstname'])){?>
                    <br/>
                    Получатель: <?php echo unScreenData($_smarty_tpl->tpl_vars['item']->value['ext_firstname']);?>
<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['ext_surname'])){?> <?php echo unScreenData($_smarty_tpl->tpl_vars['item']->value['ext_surname']);?>
<?php }?>
<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['descr'])){?>
                    <br/>
                    Комментарий к заказу: <?php echo unScreenData($_smarty_tpl->tpl_vars['item']->value['descr']);?>

<?php }?>
                </p>
                <p>
<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['payment'])){?>
                    Способ оплаты: <?php echo $_smarty_tpl->tpl_vars['item']->value['payment']['title'];?>
<br/>
<?php }?>
                    Сумма к оплате: <?php echo number_format($_smarty_tpl->tpl_vars['item']->value['price'],0,'.',' ');?>
 грн.
                </p>
            </div>
        </div>
    </div>
</div><?php }} ?>