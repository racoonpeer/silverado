<?php /* Smarty version Smarty-3.1.14, created on 2017-10-21 00:34:44
         compiled from "tpl/frontend/smart/core/_option.tpl" */ ?>
<?php /*%%SmartyHeaderCode:963157159e658eb1a94e1-35147501%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '219d18b0c5520df614dc45c660e7bf2b6c17502a' => 
    array (
      0 => 'tpl/frontend/smart/core/_option.tpl',
      1 => 1508535280,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '963157159e658eb1a94e1-35147501',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59e658eb336e52_16322873',
  'variables' => 
  array (
    'option' => 0,
    'types' => 0,
    'value' => 0,
    'item' => 0,
    'valueID' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e658eb336e52_16322873')) {function content_59e658eb336e52_16322873($_smarty_tpl) {?>
<?php if (in_array($_smarty_tpl->tpl_vars['option']->value['typename'],$_smarty_tpl->tpl_vars['types']->value)&&!empty($_smarty_tpl->tpl_vars['option']->value['values'])&&count($_smarty_tpl->tpl_vars['option']->value['values'])>1){?>
<div class="option-label" data-label="<?php echo $_smarty_tpl->tpl_vars['option']->value['title'];?>
:">
<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['valueID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['option']->value['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['valueID']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
<?php if ($_smarty_tpl->tpl_vars['value']->value['selected']>0){?><?php echo $_smarty_tpl->tpl_vars['value']->value['title'];?>
<?php }?>
<?php } ?>
</div>
<div class="<?php if ($_smarty_tpl->tpl_vars['option']->value['typename']=="image"){?>im<?php }else{ ?>opt<?php }?>group clearfix">
<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['valueID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['option']->value['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['valueID']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
    <input type="radio" id="options_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['valueID']->value;?>
" name="options[<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
][<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['valueID']->value;?>
" data-label="<?php echo $_smarty_tpl->tpl_vars['value']->value['title'];?>
" data-optionid="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
" data-valueid="<?php echo $_smarty_tpl->tpl_vars['valueID']->value;?>
" onchange="return Basket.changeOptions(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
, $(this).closest('.product-flypage'), <?php echo intval($_smarty_tpl->tpl_vars['list']->value);?>
);" <?php if ($_smarty_tpl->tpl_vars['value']->value['selected']){?>checked<?php }?>/>
    <label for="options_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['valueID']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['option']->value['typename']=="image"){?> style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['value']->value['image'];?>
');"<?php }?>><?php echo $_smarty_tpl->tpl_vars['value']->value['title'];?>
</label>
<?php } ?>
</div>
<?php }?><?php }} ?>