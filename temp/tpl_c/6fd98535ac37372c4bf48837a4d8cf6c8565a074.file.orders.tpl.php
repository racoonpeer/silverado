<?php /* Smarty version Smarty-3.1.14, created on 2018-04-18 21:14:04
         compiled from "tpl/backend/weblife/module/orders.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1103525045a0b54c79534d3-48849796%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6fd98535ac37372c4bf48837a4d8cf6c8565a074' => 
    array (
      0 => 'tpl/backend/weblife/module/orders.tpl',
      1 => 1524075225,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1103525045a0b54c79534d3-48849796',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a0b54c88cd364_20438695',
  'variables' => 
  array (
    'arrPageData' => 0,
    'item' => 0,
    'items' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a0b54c88cd364_20438695')) {function content_5a0b54c88cd364_20438695($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Volumes/K2/htdocs/silverado/www/include/smarty/plugins/modifier.date_format.php';
?>
<?php echo $_smarty_tpl->getSubTemplate ('common/module_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>@constant('ORDERS'),'creat_title'=>@constant('ADMIN_CREATING_NEW_ORDER'),'edit_title'=>@constant('ADMIN_EDIT_ORDER')), 0);?>


<div id="right_block">

<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['task']=='editItem'){?>
    <div class="noticePanel">
        Не забудь ознакомиться с <a href="https://irn5p8.axshare.com/" target="_blank">Картой бизнес-процесса</a>
    </div>
<form method="post" id="orderForm" action="<?php echo ((($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url'])).("&task=")).($_smarty_tpl->tpl_vars['arrPageData']->value['task']);?>
<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['itemID']>0){?><?php echo (('').("&itemID=")).($_smarty_tpl->tpl_vars['arrPageData']->value['itemID']);?>
<?php }?>" name="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['task'];?>
Form"  enctype="multipart/form-data">
    <div class="tabsContainer">
        <ul class="nav">
            <li><a href="javascript:void(0);" data-target="main" class="active">Информация о заказе</a></li>
        </ul>
        <div class="tab_line"></div>
        <ul class="tabs">
            <li class="active" id="tab_main">
                <table border="0" cellspacing="5" cellpadding="1" class="list" id="orderTable" style="border-bottom:1px solid #b8b8b8">  
                    <tr>
                        <td width="320" style="border-right:1px solid #b8b8b8" valign="top">
                            <strong>Информация о заказе</strong><br/><br/>
                            <table width="100%" border="1" cellspacing="1" cellpadding="1" class="list order" style="text-align: left;">
                                <tbody>
                                    <tr>
                                        <td width="40%">№ заказа</td>
                                        <td><strong><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Статус заказа</td>
                                        <td><strong id="status"><?php echo $_smarty_tpl->tpl_vars['item']->value['arStatus']['title'];?>
</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Дата создания</td>
                                        <td><strong><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['created'],"%d.%m.%Y %H:%M");?>
</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Кол-во товаров</td>
                                        <td><strong><?php echo $_smarty_tpl->tpl_vars['item']->value['qty'];?>
</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>Имя</td>
                                        <td>
                                            <input type="text" name="firstname" value="<?php echo unScreenData($_smarty_tpl->tpl_vars['item']->value['firstname']);?>
" size="28"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Фамилия</td>
                                        <td>
                                            <input type="text" name="surname" value="<?php echo unScreenData($_smarty_tpl->tpl_vars['item']->value['surname']);?>
" size="28"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>E-mail</td>
                                        <td>
                                            <input type="text" name="email" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
" size="28"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Телефон</td>
                                        <td>
                                            <input type="text" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['phone'];?>
" size="28"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Город</td>
                                        <td>
                                            <textarea name="address" rows="4" style="height: 60px;"><?php echo unScreenData($_smarty_tpl->tpl_vars['item']->value['city']);?>
</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Адрес</td>
                                        <td>
                                            <textarea name="address" rows="4" style="height: 60px;"><?php echo unScreenData($_smarty_tpl->tpl_vars['item']->value['address']);?>
</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Получатель</td>
                                        <td>
                                            <input type="text" name="ext_firstname" value="<?php echo unScreenData($_smarty_tpl->tpl_vars['item']->value['ext_firstname']);?>
" size="12"/>
                                            <input type="text" name="ext_surname" value="<?php echo unScreenData($_smarty_tpl->tpl_vars['item']->value['ext_surname']);?>
" size="13"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Доставка</td>
                                        <td>
                                            <strong id="shipping">
<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['arShipping'])){?>
                                                <?php echo $_smarty_tpl->tpl_vars['item']->value['arShipping']['title'];?>

<?php }?>
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Оплата</td>
                                        <td>
                                            <strong id="payment">
<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['arPayment'])){?>
                                                <?php echo $_smarty_tpl->tpl_vars['item']->value['arPayment']['title'];?>

<?php }?>
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Комментарий к заказу</td>
                                        <td>
                                            <textarea name="descr" rows="4" style="height: 60px;"><?php echo unScreenData($_smarty_tpl->tpl_vars['item']->value['descr']);?>
</textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br/>
                            <br/>
                            <div>
                                <a class="buttons left" data-option='confirm' data-confirm="1" onclick="Orders.updateOrder(this);" style="width:200px;">
                                    &nbsp;Отправить подтверждение&nbsp;
                                </a>
                                <span id="confirm" class="left" style="margin:10px;">
<?php if ($_smarty_tpl->tpl_vars['item']->value['confirmed']==1){?>
                                    <?php echo @constant('ORDER_CONFIRM_LETTER_SEND');?>

<?php }else{ ?>
                                    <?php echo @constant('ORDER_CONFIRM_LETTER_NOT_SEND');?>

<?php }?>
                                </span>
                            </div>
                        </td>
                        <td valign="top">
                            <strong>Товары</strong><br/><br/>
                            <?php echo $_smarty_tpl->getSubTemplate ('ajax/order_products.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arItems'=>$_smarty_tpl->tpl_vars['item']->value['children'],'price'=>$_smarty_tpl->tpl_vars['item']->value['price'],'sPrice'=>$_smarty_tpl->tpl_vars['item']->value['shipping_price']), 0);?>

                            <div class="loader hidden"><img src="/images/loader.gif"/></div>
                            <table width="100%" cellspacing="0" cellpadding="1" class="list">
                                <tr>
                                   <td style="padding:10px;">
                                       <strong>Комментарий администратора</strong><br/><br/>
                                       <textarea class="nosize_field" style="width: 440px; height: 36px" name="admin_comment"><?php echo $_smarty_tpl->tpl_vars['item']->value['admin_comment'];?>
</textarea>
                                       <a class="buttons right" data-option="admin_comment" onclick="Orders.updateOrder(this);">Сохранить комментарий</a>
                                   </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <div class="loader hidden"><img src="/images/loader.gif"/></div>
                <table width="100%" border="0" cellspacing="0" cellpadding="1" class="list order" id="editarea">
                    <tr>
                        <td>Оплата:</td>
                        <td>
                            <select name="id" class="nosize_field" style="width: 140px;" onchange="Orders.unsetDisabled(this);">       
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrPageData']->value['arPayments']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['arPayments'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['arPayments'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']==$_smarty_tpl->tpl_vars['item']->value['payment_id']){?>selected<?php }elseif(!$_smarty_tpl->tpl_vars['arrPageData']->value['arPayments'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['active']){?>disabled<?php }?>><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['arPayments'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
</option>
<?php endfor; endif; ?>
                            </select>
                        </td>
                        <td style="padding:10px;">
                            <textarea class="nosize_field" disabled style="width: 100%; height: 50px" name="comment"></textarea>
                        </td>
                        <td>
                            <a class="buttons disabled" data-payment="<?php echo $_smarty_tpl->tpl_vars['item']->value['payment_id'];?>
" data-option="payment" onclick="Orders.updateOrder(this);">Сохранить</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Доставка:</td>
                        <td>
                            <select name="id" class="nosize_field" style="width: 140px;" onchange="Orders.unsetDisabled(this)">       
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrPageData']->value['arShippings']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['arShippings'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['arShippings'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']==$_smarty_tpl->tpl_vars['item']->value['shipping_id']){?>selected<?php }elseif(!$_smarty_tpl->tpl_vars['arrPageData']->value['arShippings'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['active']){?>disabled<?php }?>><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['arShippings'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
</option>
<?php endfor; endif; ?>
                            </select>
                        </td>
                        <td style="padding:10px;">
                            <textarea class="nosize_field" style="width: 100%; height: 50px" name="comment" disabled></textarea>
                        </td>
                        <td>
                            <a class="buttons disabled" data-shipping="<?php echo $_smarty_tpl->tpl_vars['item']->value['shipping_id'];?>
" data-option="shipping" onclick="Orders.updateOrder(this);">Сохранить</a>
                        </td>
                    </tr>
                    <tr>
                        <td  width="100">Статус выполнения:</td>
                        <td width="150">
                            <select name="id" class="nosize_field" style="width: 140px;" onchange="Orders.unsetDisabled(this)">       
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrPageData']->value['arStatus']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['arStatus'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['arStatus'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']==$_smarty_tpl->tpl_vars['item']->value['status']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['arStatus'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
</option>
<?php endfor; endif; ?>
                            </select>
                        </td>
                        <td style="padding:10px;">
                            <textarea class="nosize_field" disabled style="width: 100%; height: 50px" name="comment"></textarea>
                        </td>
                        <td width="90">
                            <a class="buttons disabled" data-status="<?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
" data-option="status" onclick="Orders.updateOrder(this);">Сохранить</a>
                        </td>
                    </tr>
                    <tr>
                        <td  width="100">Статус оплаты:</td>
                        <td width="150">
                            <select name="id" class="nosize_field" style="width: 140px;" onchange="Orders.unsetDisabled(this)">       
                                <option value="0" <?php if ($_smarty_tpl->tpl_vars['item']->value['payment_status']==0){?>selected<?php }?>>Неоплачен</option>
                                <option value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value['payment_status']==1){?>selected<?php }?>>Оплачен</option>
                            </select>
                        </td>
                        <td style="padding:10px;">
                            <textarea class="nosize_field" disabled style="width: 100%; height: 50px" name="comment"></textarea>
                        </td>
                        <td width="90">
                            <a class="buttons disabled" data-status="<?php echo $_smarty_tpl->tpl_vars['item']->value['payment_status'];?>
" data-option="payment_status" onclick="Orders.updateOrder(this);">Сохранить</a>
                        </td>
                    </tr>
                </table>
                <div style="text-align: center; margin: 15px 0;">
                    <input type="submit" name="submit" class="buttons" style="display: inline-block;" value="Сохранить заказ"/>
                    <input class="buttons" name="submit_cancel" type="submit" style="display: inline-block;" value="<?php echo @constant('BUTTON_CANCEL');?>
" onclick="return userConfirm('cancel', '<?php echo @constant('CONFIRM_NOT_SAVE');?>
');"/>
                    <input class="buttons" name="submit_delete" type="submit" style="display: inline-block;" value="<?php echo @constant('BUTTON_DELETE');?>
" onclick="return userConfirm('delete', '<?php echo @constant('CONFIRM_DELETE');?>
');"/>
                </div>
                <div id="history">
                    <?php echo $_smarty_tpl->getSubTemplate ('common/object_actions_log.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arHistoryData'=>$_smarty_tpl->tpl_vars['item']->value['arHistory']), 0);?>

                </div>
            </li>
        </ul>
    </div>
</form>                
<script type="text/javascript">
    $(function(){
        Orders.init(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);
    });
    function userConfirm(task, message) {
        if (window.confirm(message)) {
            switch (task) {
                case 'copy':
                    window.location='<?php echo (($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&task=addItem&copyID=")).($_smarty_tpl->tpl_vars['item']->value['id']);?>
';
                    break;
                case 'clear':
                    document.forms[0].reset();
                    $.each(tinyMCE.editors, function() {
                        this.setContent('');
                    }); 
                    $.each($('input:text, textarea'), function() {
                        $(this).val('');
                    });
                    if($('select').length>0){
                        $.each($('select'), function(){
                            $('option', this).removeAttr("selected");
                            $('option:nth(0)', this).attr("selected", "selected");
                        });
                    }
                    // catalog clear
                    if($('#attrTable').length > 0) {
                        $('#attrTable tbody').html('');
                    }
                    if($('#list_settings_selected_related').length >0 ) {
                        $('#list_settings_selected_related').html('');
                    }
                    if($('#list_settings_all_related').length >0 ) {
                        $('#list_settings_all_related').html('');
                    }
                    if($('#list_settings_all_kits').length >0 ) {
                        $('#list_settings_all_kits').html('');
                    }
                    if($('#list_settings_selected_kits').length >0 ) {
                        $('#list_settings_selected_kits').html('');
                    }
                    // main clear
                    if($('#attrGroupsList').length>0) {
                        $.each($('#attrGroupsList').find('input:checkbox'), function() {
                            $(this).removeAttr('checked');
                            updateAttributesList(this);
                        });
                    }
                    if($('#filtersAllList').length>0) {
                        $.each($('#filtersAllList').find('input:checkbox'), function() {
                            $(this).removeAttr('checked');
                            updateFiltersList(this);
                        });
                    }
                    //attributes
                    if($('#defaultVals').length>0) {
                        $('#defaultVals').html('');
                    }
                    break;
                case 'cancel':
                    window.location='<?php echo ($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url']);?>
';
                    break;
                case 'delete':
                    window.location='<?php echo (($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&task=deleteItem&itemID=")).($_smarty_tpl->tpl_vars['item']->value['id']);?>
';
                    break;
            }
        } return false; 
    }
</script>

<?php }else{ ?>
<div class="clear"></div>       
<form method="GET" id="filtersForm" action="<?php echo ($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url']);?>
">
    <input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['module'];?>
"/>
    <table width="100%" border="0" cellspacing="1" cellpadding="0" class="list">
        <tr style="height:35px">
            <td>за период: 
                c <input type="text" class="nosize_field" id="date_from" size="10" name="filters[date][from]" value="<?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['filters']['date']['from'])&&$_smarty_tpl->tpl_vars['arrPageData']->value['filters']['date']['from']){?><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['filters']['date']['from'];?>
<?php }?>"/> <a href="javascript:void(0)" onclick="$('#date_from').val('')">x</a>
                по <input type="text" size="10" class="nosize_field" id="date_to" name="filters[date][to]" value="<?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['filters']['date']['to'])&&$_smarty_tpl->tpl_vars['arrPageData']->value['filters']['date']['to']){?><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['filters']['date']['to'];?>
<?php }?>"/> <a href="javascript:void(0)" onclick="$('#date_to').val('')">x</a>
            </td>
            <td>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['j'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['name'] = 'j';
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrPageData']->value['arStatus']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total']);
?>
                <input type="checkbox" name="filters[status][]" id="status_<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['arStatus'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['arStatus'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['id'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['filters']['status'])&&in_array($_smarty_tpl->tpl_vars['arrPageData']->value['arStatus'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['id'],$_smarty_tpl->tpl_vars['arrPageData']->value['filters']['status'])){?>checked<?php }?>/>
                <label for="status_<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['arStatus'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['arStatus'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['title'];?>
</label>&emsp;
<?php endfor; endif; ?>
            </td>
            <td width="150" align="right" rowspan="2">
                <button type="submit" class="buttons"><?php echo @constant('SITE_FOUND');?>
</button>
                <button type="reset" class="buttons" onclick="window.location.assign('<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['admin_url'];?>
');">Сбросить фильтр</button>
            </td>
        </tr>
        <tr style="height:35px">
            <td colspan="2">
                <input size="48" type="text" placeholder="введите имя и/или фамилию или номер заказа" class="field" id="categorySearch" name="filters[title]" value="<?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['filters']['title'])){?><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['filters']['title'];?>
<?php }?>" />
                <?php echo str_repeat("&emsp;",2);?>

                Тип заказа: &nbsp;
                <select name="filters[type]">
                    <option value=""> -- Не выбрано -- </option>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrPageData']->value['arTypes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['arTypes'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['filters']['type'])&&$_smarty_tpl->tpl_vars['arrPageData']->value['filters']['type']==$_smarty_tpl->tpl_vars['arrPageData']->value['arTypes'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['arTypes'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
</option>
<?php endfor; endif; ?>
                </select>
            </td>
        </tr>
    </table>
</form>

<form method="post" action="<?php echo ($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&task=reorderItems");?>
" name="reorderItems">
    <table width="100%" border="0" cellspacing="1" cellpadding="0" class="list orders-list">
        <thead>
            <tr>
                <td id="headb" align="center" width="20">№</td>
                <td id="headb" align="center" width="95"><?php echo @constant('HEAD_DATE_ADDED');?>
</td>
                <td id="headb" align="left">Клиент</td>
                <td id="headb" align="center" width="100">Телефон</td>
                <td id="headb" align="center" width="90">Тип заказа</td>
                <td id="headb" align="center" width="120">Статус</td>
                <td id="headb" align="center" width="90">Оплачен</td>
                <td id="headb" align="center" width="38"><?php echo @constant('HEAD_EDIT');?>
</td>
                <td id="headb" align="center" width="38"><?php echo @constant('HEAD_DELETE');?>
</td>
            </tr>
        </thead>
        <tbody>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['items']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
            <tr class="<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['classname'];?>
">
               <td align="center"><?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
</td>
               <td align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['created'],"%d.%m.%y %H:%M");?>
</td>
               <td><?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
</td>
               <td align="center"><?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['phone'];?>
</td>
               <td align="center"><?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['typename'];?>
</td>
               <td align="center"><?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['statusname'];?>
</td>
               <td align="center"><?php if ($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['payment_status']>0){?>Да<?php }else{ ?>Нет<?php }?></td>
               <td align="center">
                   <a href="<?php echo ((($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url'])).("&task=editItem&itemID=")).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
" title="<?php echo @constant('LABEL_EDIT');?>
">
                       <img src="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['system_images'];?>
edit.png" alt="<?php echo @constant('LABEL_EDIT');?>
"/>
                   </a>
               </td>
               <td align="center">
                   <a href="<?php echo ((($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url'])).("&task=deleteItem&itemID=")).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
" onclick="return confirm('<?php echo @constant('CONFIRM_DELETE');?>
');" title="<?php echo @constant('LABEL_DELETE');?>
">
                      <img src="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['system_images'];?>
delete.png" alt="<?php echo @constant('LABEL_DELETE');?>
" title="<?php echo @constant('LABEL_DELETE');?>
"/>
                   </a>
               </td>
           </tr>
<?php endfor; endif; ?>
        </tbody>
    </table>
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
            <td align="center" width="350"></td>
            <td align="center" width="350">
<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['total_pages']>1){?>
                <!-- ++++++++++ Start PAGER ++++++++++++++++++++++++++++++++++++++++++++++++ -->
                <?php echo $_smarty_tpl->getSubTemplate ('common/pager.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arrPager'=>$_smarty_tpl->tpl_vars['arrPageData']->value['pager'],'page'=>$_smarty_tpl->tpl_vars['arrPageData']->value['page'],'showTitle'=>0,'showFirstLast'=>0,'showPrevNext'=>0), 0);?>

                <!-- ++++++++++ End PAGER ++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<?php }?>
            </td>
            <td align="right"></td>
        </tr>
    </table>
</form>
<?php }?>
</div><?php }} ?>