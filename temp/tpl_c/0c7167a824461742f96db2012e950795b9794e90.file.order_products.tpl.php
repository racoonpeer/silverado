<?php /* Smarty version Smarty-3.1.14, created on 2017-11-14 22:42:55
         compiled from "tpl/backend/weblife/ajax/order_products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16411390425a0b554f7ab6d2-21490503%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c7167a824461742f96db2012e950795b9794e90' => 
    array (
      0 => 'tpl/backend/weblife/ajax/order_products.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16411390425a0b554f7ab6d2-21490503',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arItems' => 0,
    'option' => 0,
    'optionID' => 0,
    'valueID' => 0,
    'value' => 0,
    'children' => 0,
    'sPrice' => 0,
    'price' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a0b55503ab212_25649965',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a0b55503ab212_25649965')) {function content_5a0b55503ab212_25649965($_smarty_tpl) {?><table id="orderProducts" width="100%" border="1" cellspacing="1" cellpadding="0" class="list order" style="border: 1px solid #b6b6b6 !important;">
    <thead>
        <tr>
            <td id="headb" width="40" style="background-color: #D1D1D1; border-color: #FFF;"></td>
            <td align="left" id="headb" style="background-color: #D1D1D1; border-color: #FFF;">Наименование</td>
            <td id="headb" align="center" width="150" style="background-color: #D1D1D1; border-color: #FFF;">Опции</td>
            <td id="headb" align="center" width="65" style="background-color: #D1D1D1; border-color: #FFF;">Кол-во</td>
            <td id="headb" align="center" width="80" style="background-color: #D1D1D1; border-color: #FFF;">Цена</td>
            <td id="headb" align="center" width="80" style="background-color: #D1D1D1; border-color: #FFF;">Сумма</td>
            <td id="headb" align="center" width="32" style="background-color: #D1D1D1; border-color: #FFF;"></td>
        </tr>
        <tr>
            <td>
                <img src="/images/operation/add.png" alt="Добавить товар" align="top"/>
            </td>
            <td colspan="6">
                <input type="text" id="orderProductsSearch" class="field" style="width: 98%;" placeholder="Название / Артикул"/>
            </td>
        </tr>
    </thead>
    <tbody>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arItems']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
        <tr id="product_<?php echo $_smarty_tpl->tpl_vars['arItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" data-pid="<?php echo $_smarty_tpl->tpl_vars['arItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['pid'];?>
">
            <td align="center">
                <a href="javascript:void(0);" onclick="OP.delete(<?php echo $_smarty_tpl->tpl_vars['arItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
);">
                    <img src="/images/operation/delete.png" alt="Удалить" align="top"/>
                </a>
            </td>
            <td align="left">
<?php if (isset($_smarty_tpl->tpl_vars['arItems']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['i']['index']]['link'])){?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['arItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['link'];?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['arItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
"><?php echo unscreenData($_smarty_tpl->tpl_vars['arItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['ptitle']);?>
</a>
<?php }else{ ?>
                <?php echo unscreenData($_smarty_tpl->tpl_vars['arItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title']);?>

<?php }?>
            </td>
            <td align="left">
<?php if ($_smarty_tpl->tpl_vars['arItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['type']=="product"){?>
<?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_smarty_tpl->tpl_vars['optionID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['option']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['option']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
 $_smarty_tpl->tpl_vars['optionID']->value = $_smarty_tpl->tpl_vars['option']->key;
 $_smarty_tpl->tpl_vars['option']->iteration++;
 $_smarty_tpl->tpl_vars['option']->last = $_smarty_tpl->tpl_vars['option']->iteration === $_smarty_tpl->tpl_vars['option']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['k']['last'] = $_smarty_tpl->tpl_vars['option']->last;
?>
<?php if ($_smarty_tpl->tpl_vars['option']->value['typename']=="checkbox"){?>
                <strong><?php echo $_smarty_tpl->tpl_vars['option']->value['title'];?>
</strong>
<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['valueID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['option']->value['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['valueID']->value = $_smarty_tpl->tpl_vars['value']->key;
?><br/>
                <input type="checkbox" id="options_<?php echo $_smarty_tpl->tpl_vars['optionID']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['valueID']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['valueID']->value;?>
" data-pid="<?php echo $_smarty_tpl->tpl_vars['arItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['pid'];?>
" data-oid="<?php echo $_smarty_tpl->tpl_vars['optionID']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['value']->value['selected']){?>checked<?php }?>> <?php echo $_smarty_tpl->tpl_vars['value']->value['title'];?>
 <?php echo str_repeat("&nbsp;",3);?>

<?php } ?>
<?php }else{ ?>
                <strong><?php echo $_smarty_tpl->tpl_vars['option']->value['title'];?>
</strong><br/>
                <select id="options_<?php echo $_smarty_tpl->tpl_vars['optionID']->value;?>
" style="width: 100%;" data-pid="<?php echo $_smarty_tpl->tpl_vars['arItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['pid'];?>
" data-oid="<?php echo $_smarty_tpl->tpl_vars['optionID']->value;?>
">
<?php if ($_smarty_tpl->tpl_vars['option']->value['required']==0){?>
                    <option value=""> -- не выбрано -- </option>
<?php }?>
<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['valueID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['option']->value['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['valueID']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['valueID']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['value']->value['selected']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['value']->value['title'];?>
</option>
<?php } ?>
                </select>
<?php }?>
<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['k']['last']){?><br/><br/><?php }?>
<?php } ?>
<?php }elseif($_smarty_tpl->tpl_vars['arItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['type']=="kit"){?>
<?php  $_smarty_tpl->tpl_vars['children'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['children']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['children']->key => $_smarty_tpl->tpl_vars['children']->value){
$_smarty_tpl->tpl_vars['children']->_loop = true;
?>
<?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_smarty_tpl->tpl_vars['optionID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['children']->value['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['option']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['option']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
 $_smarty_tpl->tpl_vars['optionID']->value = $_smarty_tpl->tpl_vars['option']->key;
 $_smarty_tpl->tpl_vars['option']->iteration++;
 $_smarty_tpl->tpl_vars['option']->last = $_smarty_tpl->tpl_vars['option']->iteration === $_smarty_tpl->tpl_vars['option']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['k']['last'] = $_smarty_tpl->tpl_vars['option']->last;
?>
<?php if ($_smarty_tpl->tpl_vars['option']->value['typename']=="checkbox"){?>
                <strong><?php echo $_smarty_tpl->tpl_vars['option']->value['title'];?>
</strong>
<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['valueID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['option']->value['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['valueID']->value = $_smarty_tpl->tpl_vars['value']->key;
?><br/>
                <input type="checkbox" id="options_<?php echo $_smarty_tpl->tpl_vars['optionID']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['valueID']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['valueID']->value;?>
" data-pid="<?php echo $_smarty_tpl->tpl_vars['children']->value['id'];?>
" data-oid="<?php echo $_smarty_tpl->tpl_vars['optionID']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['value']->value['selected']){?>checked<?php }?>> <?php echo $_smarty_tpl->tpl_vars['value']->value['title'];?>
 <?php echo str_repeat("&nbsp;",3);?>

<?php } ?>
<?php }else{ ?>
                <strong><?php echo $_smarty_tpl->tpl_vars['option']->value['title'];?>
</strong><br/>
                <select id="options_<?php echo $_smarty_tpl->tpl_vars['optionID']->value;?>
" style="width: 100%;" data-pid="<?php echo $_smarty_tpl->tpl_vars['children']->value['id'];?>
" data-oid="<?php echo $_smarty_tpl->tpl_vars['optionID']->value;?>
">
<?php if ($_smarty_tpl->tpl_vars['option']->value['required']==0){?>
                    <option value=""> -- не выбрано -- </option>
<?php }?>
<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['valueID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['option']->value['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['valueID']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['valueID']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['value']->value['selected']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['value']->value['title'];?>
</option>
<?php } ?>
                </select>
<?php }?>
<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['k']['last']){?><br/><br/><?php }?>
<?php } ?>
<?php } ?>
<?php }?>
            </td>
            <td align="center">
                <input type="text" class="field" style="display: inline; width: 40px;" id="qty_<?php echo $_smarty_tpl->tpl_vars['arItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['arItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['qty'];?>
"/>
            </td>
            <td align="center"><?php echo $_smarty_tpl->tpl_vars['arItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['price'];?>
 грн.</td>
            <td align="center"><?php echo $_smarty_tpl->tpl_vars['arItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['price']*$_smarty_tpl->tpl_vars['arItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['qty'];?>
 грн.</td>
            <td align="center">
                <a href="javascript:void(0);" onclick="OP.recalc(<?php echo $_smarty_tpl->tpl_vars['arItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
);">
                    <img src="/images/operation/update.png" alt="Обновить" align="top"/>
                </a>
            </td>
        </tr>
<?php endfor; endif; ?>
    </tbody>
    <tr>
        <td align="right" colspan="5">
            <strong>Стоимость доставки:</strong>
        </td>
        <td align="center">
            <strong><?php echo $_smarty_tpl->tpl_vars['sPrice']->value;?>
 грн.</strong>
        </td>
        <td></td>
    </tr>
    <tr>
        <td align="right" colspan="5">
            <strong>Сумма к оплате:</strong>
        </td>
        <td align="center">
            <strong><?php echo number_format(($_smarty_tpl->tpl_vars['price']->value+$_smarty_tpl->tpl_vars['sPrice']->value),2,'.','');?>
 грн.</strong>
        </td>
        <td></td>
    </tr>
</table><?php }} ?>