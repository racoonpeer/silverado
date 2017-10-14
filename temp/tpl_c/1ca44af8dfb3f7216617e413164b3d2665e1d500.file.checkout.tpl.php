<?php /* Smarty version Smarty-3.1.14, created on 2017-10-08 12:05:18
         compiled from "tpl/frontend/smart/module/checkout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:38950246559bad47c5cacc9-27007428%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1ca44af8dfb3f7216617e413164b3d2665e1d500' => 
    array (
      0 => 'tpl/frontend/smart/module/checkout.tpl',
      1 => 1506977747,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '38950246559bad47c5cacc9-27007428',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59bad47cca0432_21368459',
  'variables' => 
  array (
    'arrPageData' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59bad47cca0432_21368459')) {function content_59bad47cca0432_21368459($_smarty_tpl) {?><div class="page-container container clearfix">
    <div class="c-left">
        <form class="orderForm ajaxForm" action="" id="orderForm" method="POST" onsubmit="return formCheck(this);">
            <div class="form-wizard" id="wizard">
                <h3>Контактная информация</h3>
                <fieldset>
                    <div class="f-row">
                        <div class="f-column">
                            <label>Имя</label>
                            <input type="text" class="required <?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['errors']['firstname'])){?>error<?php }?>" name="firstname" value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['firstname'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['firstname'];?>
<?php }?>"/>
                        </div>
                        <div class="f-column">
                            <label>Фамилия</label>
                            <input type="text" class="required <?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['errors']['surname'])){?>error<?php }?>" name="surname" value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['surname'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['surname'];?>
<?php }?>"/>
                        </div>
                    </div>
                    <div class="f-row">
                        <div class="f-column">
                            <label>Телефон</label>
                            <input type="tel" class="required <?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['errors']['phone'])){?>error<?php }?>" name="phone" value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['phone'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['phone'];?>
<?php }?>"/>
                        </div>
                        <div class="f-column">
                            <label>E-mail</label>
                            <input type="text" class="required <?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['errors']['email'])){?>error<?php }?>" name="email"  value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['email'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
<?php }?>"/>
                        </div>
                    </div>
                </fieldset>
                <h3>Доставка</h3>
                <fieldset>
                    <div class="f-row">
                        <div class="f-column">
                            <label>Способ доставки</label>
                            <select name="shipping">
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrPageData']->value['arShipping']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                <option value="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['arShipping'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['item']->value['shipping'])&&$_smarty_tpl->tpl_vars['arrPageData']->value['arShipping'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']==$_smarty_tpl->tpl_vars['item']->value['shipping']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['arShipping'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
</option>
<?php endfor; endif; ?>
                            </select>
                        </div>
                        <div class="f-column">
                            <a href="#" class="outside">Информация о доставке</a>
                        </div>
                    </div>
                    <div class="f-row">
                        <label>Телефон</label>
                        <input type="tel" class="required <?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['errors']['phone'])){?>error<?php }?>" name="phone" value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['phone'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['phone'];?>
<?php }?>"/>
                    </div>
                    <div class="f-row">
                        <div class="f-column">
                            <label>Телефон</label>
                            <input type="tel" class="required <?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['errors']['phone'])){?>error<?php }?>" name="phone" value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['phone'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['phone'];?>
<?php }?>"/>
                        </div>
                        <div class="f-column">
                            <label>E-mail</label>
                            <input type="text" class="required <?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['errors']['email'])){?>error<?php }?>" name="email"  value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['email'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
<?php }?>"/>
                        </div>
                    </div>
                </fieldset>
                        
                        
                <span class="hint"><?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['errors']['surname'])){?><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['errors']['surname'];?>
<?php }?></span>
                
                <br/>
                <span class="hint"><?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['errors']['phone'])){?><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['errors']['phone'];?>
<?php }?></span>
                <input type="text" class="required <?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['errors']['phone'])){?>error<?php }?>" 
                       name="phone" value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['phone'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['phone'];?>
<?php }?>" 
                       placeholder="+380 __ ___ __ __" id="phone"/>
                <br/>
                <span class="hint"><?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['errors']['city'])){?><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['errors']['city'];?>
<?php }?></span>
                <input type="text" class="required <?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['errors']['city'])){?>error<?php }?>" 
                       name="city" value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['city'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['city'];?>
<?php }?>" 
                       placeholder="Город"/>
                <br/>
                <span class="hint"><?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['errors']['address'])){?><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['errors']['address'];?>
<?php }?></span>
                <input type="text" class="required <?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['errors']['address'])){?>error<?php }?>" 
                       name="address" value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['address'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['address'];?>
<?php }?>" 
                       placeholder="Адрес доставки"/>
                <br/>
                <span class="hint"><?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['errors']['email'])){?><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['errors']['email'];?>
<?php }?></span>
                
                <br/>
                
                <br/>
                <select name="payment">
    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrPageData']->value['arPayment']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                    <option value="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['arPayment'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['item']->value['payment'])&&$_smarty_tpl->tpl_vars['arrPageData']->value['arPayment'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']==$_smarty_tpl->tpl_vars['item']->value['payment']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['arPayment'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
</option>
    <?php endfor; endif; ?>
                </select>
                <br/>
                <textarea name="descr" placeholder="Комментарий"></textarea>
                <br/>
                <button type="submit" class="btn btn-big btn-red">ОТПРАВИТЬ ЗАКАЗ</button>
            </div>
        </form>
    </div>
</div><?php }} ?>