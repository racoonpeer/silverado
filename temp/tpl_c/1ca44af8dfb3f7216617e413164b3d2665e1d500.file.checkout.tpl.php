<?php /* Smarty version Smarty-3.1.14, created on 2017-12-10 15:52:58
         compiled from "tpl/frontend/smart/module/checkout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5316462635a06c53bc91ec1-45223186%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1ca44af8dfb3f7216617e413164b3d2665e1d500' => 
    array (
      0 => 'tpl/frontend/smart/module/checkout.tpl',
      1 => 1512913969,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5316462635a06c53bc91ec1-45223186',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06c53c039a36_56543181',
  'variables' => 
  array (
    'arrPageData' => 0,
    'item' => 0,
    'shipping' => 0,
    'payment' => 0,
    'arrModules' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06c53c039a36_56543181')) {function content_5a06c53c039a36_56543181($_smarty_tpl) {?><div class="page-container clearfix">
    <div class="container clearfix">
        <div class="c-left">
            <form action="" method="POST" class="orderForm" id="orderForm">
                <div class="form-wizard" id="wizard">
                    <h3>Контактная информация</h3>
                    <fieldset>
                        <div class="f-print">
                            <p class="uc">информация</p>
                            <p>о покупателе</p>
                        </div>
                        <div class="f-body">
                            <div class="f-row">
                                <div class="f-column">
                                    <input type="text" class="input-m required <?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['errors']['firstname'])){?>error<?php }?>" name="firstname" value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['firstname'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['firstname'];?>
<?php }?>" placeholder="Имя"/>
                                </div>
                                <div class="f-column">
                                    <input type="text" class="input-m required <?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['errors']['surname'])){?>error<?php }?>" name="surname" value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['surname'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['surname'];?>
<?php }?>" placeholder="Фамилия"/>
                                </div>
                            </div>
                            <div class="f-row">
                                <div class="f-column">
                                    <input type="tel" class="input-m required <?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['errors']['phone'])){?>error<?php }?>" name="phone" value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['phone'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['phone'];?>
<?php }?>" placeholder="+38"/>
                                </div>
                                <div class="f-column">
                                    <input type="email" class="input-m required <?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['errors']['email'])){?>error<?php }?>" name="email" value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['email'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
<?php }?>" placeholder="E-mail"/>
                                </div>
                            </div>
                            <div class="f-row">
                                <textarea name="descr" placeholder="Комментарий к заказу" rows="4"></textarea>
                            </div>
                        </div>
                    </fieldset>
                    <h3>Доставка</h3>
                    <fieldset>
                        <div class="f-print">
                            <p class="uc"><span data-source="firstname"></span> <span data-source="surname"></span></p>
                            <p data-source="email"></p>
                            <p data-source="phone"></p>
                            <p data-source="descr"></p>
                        </div>
                        <div class="f-body">
                            <div class="f-row">
<?php  $_smarty_tpl->tpl_vars['shipping'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['shipping']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrPageData']->value['arShipping']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['shipping']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['shipping']->key => $_smarty_tpl->tpl_vars['shipping']->value){
$_smarty_tpl->tpl_vars['shipping']->_loop = true;
 $_smarty_tpl->tpl_vars['shipping']->index++;
 $_smarty_tpl->tpl_vars['shipping']->first = $_smarty_tpl->tpl_vars['shipping']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['first'] = $_smarty_tpl->tpl_vars['shipping']->first;
?>
                                <input type="radio" name="shipping_id" value="<?php echo $_smarty_tpl->tpl_vars['shipping']->value['id'];?>
" id="shipping_<?php echo $_smarty_tpl->tpl_vars['shipping']->value['id'];?>
" class="hidden" checked/>
                                <label class="radiobox checked" for="shipping_<?php echo $_smarty_tpl->tpl_vars['shipping']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['shipping']->value['title'];?>
</label>
<?php } ?>
                            </div>
                            <div class="f-row">
                                <div class="f-column">
                                    <select class="input-m required js-data-ajax <?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['errors']['city'])){?>error<?php }?>" name="city" id="city">
<?php if (isset($_smarty_tpl->tpl_vars['item']->value['city'])){?>
                                        <option><?php echo $_smarty_tpl->tpl_vars['item']->value['city'];?>
</option>
<?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="f-row">
                                <select class="input-m required js-data <?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['errors']['address'])){?>error<?php }?>" name="address" id="address">
<?php if (isset($_smarty_tpl->tpl_vars['item']->value['address'])){?>
                                    <option><?php echo $_smarty_tpl->tpl_vars['item']->value['address'];?>
</option>
<?php }?>
                                </select>
                            </div>
                            <hr/>
                            <div class="f-row">
                                <input type="checkbox" name="recepient" id="recepient" class="hidden" value="1"/>
                                <label class="checkbox" for="recepient">Получатель не я</label>
                            </div>
                            <div class="f-row hidden nomargin">
                                <div class="f-column">
                                    <input type="text" class="input-m required <?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['errors']['ext_firstname'])){?>error<?php }?>" name="ext_firstname" id="ext_firstname" value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['ext_firstname'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['ext_firstname'];?>
<?php }?>" placeholder="Имя"/>
                                </div>
                                <div class="f-column">
                                    <input type="text" class="input-m required <?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['errors']['ext_surname'])){?>error<?php }?>" name="ext_surname" id="ext_surname" value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['ext_surname'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['ext_surname'];?>
<?php }?>" placeholder="Фамилия"/>
                                </div>
                                <div class="f-hint hint-user">Укажите имя и фамилию получателя, если заказ будете получать не вы лично<br/>
                                Внимание! При получении заказа необходимо предьявить паспорт</div>
                            </div>
                        </div>
                    </fieldset>
                    <h3>Оплата</h3>
                    <fieldset>
                        <div class="f-print">
                            <p class="uc"><span data-source="firstname"></span> <span data-source="surname"></span></p>
                            <p data-source="email"></p>
                            <p data-source="phone"></p>
                            <p data-source="city"></p>
                            <p data-source="address"></p>
                            <p data-source="descr"></p>
                        </div>
                        <div class="f-body">
                            <div class="f-row">
<?php  $_smarty_tpl->tpl_vars['payment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['payment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrPageData']->value['arPayment']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['payment']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['payment']->key => $_smarty_tpl->tpl_vars['payment']->value){
$_smarty_tpl->tpl_vars['payment']->_loop = true;
 $_smarty_tpl->tpl_vars['payment']->index++;
 $_smarty_tpl->tpl_vars['payment']->first = $_smarty_tpl->tpl_vars['payment']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['first'] = $_smarty_tpl->tpl_vars['payment']->first;
?>
                                <input type="radio" name="payment_id" value="<?php echo $_smarty_tpl->tpl_vars['payment']->value['id'];?>
" class="hidden" id="payment_<?php echo $_smarty_tpl->tpl_vars['payment']->value['id'];?>
" <?php if ((!isset($_smarty_tpl->tpl_vars['item']->value['payment'])&&$_smarty_tpl->getVariable('smarty')->value['foreach']['i']['first'])||(isset($_smarty_tpl->tpl_vars['item']->value['payment'])&&$_smarty_tpl->tpl_vars['item']->value['payment']==$_smarty_tpl->tpl_vars['payment']->value['id'])){?>checked<?php }?>/> 
                                <label for="payment_<?php echo $_smarty_tpl->tpl_vars['payment']->value['id'];?>
" class="radiobox"><?php echo $_smarty_tpl->tpl_vars['payment']->value['title'];?>
</label>
<?php } ?>
                            </div>
                            <hr/>
                            <div class="f-row">
                                <div class="f-hint hint-box <?php if (isset($_smarty_tpl->tpl_vars['item']->value['payment'])&&$_smarty_tpl->tpl_vars['item']->value['payment']!=Checkout::CASH_PAYMENT_ID){?>hidden<?php }?>" data-toggle-id="payment_<?php echo Checkout::CASH_PAYMENT_ID;?>
">Вы оплачиваете заказ при получении 
                                осмотрев и проверив товар на соответствие вашему заказу, отсутствие брака и повреждений.<br/>
                                Подробнее о <a href="<?php echo $_smarty_tpl->getSubTemplate ("core/href.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['arrModules']->value['refund']), 0);?>
" target="_blank">возврате и обмене товара</a></div>
                                <div class="f-hint hint-card <?php if (!isset($_smarty_tpl->tpl_vars['item']->value['payment'])||(isset($_smarty_tpl->tpl_vars['item']->value['payment'])&&$_smarty_tpl->tpl_vars['item']->value['payment']!=Checkout::LP_PAYMENT_ID)){?>hidden<?php }?>" data-toggle-id="payment_<?php echo Checkout::LP_PAYMENT_ID;?>
">Вы оплачиваете после подтверждения заказа в телефонном режиме<br/>
                                предварительно согласовав с менеджером сроки доставки товара.<br/>
                                Подробнее о <a href="<?php echo $_smarty_tpl->getSubTemplate ("core/href.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['arrModules']->value['delivery']), 0);?>
" target="_blank">способах оплаты заказа</a></div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </form>
        </div>
        <div class="c-right">
            <div class="pre-order">
                <h3>Ваш заказ
                    <a href="#" onclick="return Basket.open();" class="edit-order"></a>
                </h3>
                <?php echo $_smarty_tpl->getSubTemplate ("ajax/minibasket.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            </div>
        </div>
    </div>
</div><?php }} ?>