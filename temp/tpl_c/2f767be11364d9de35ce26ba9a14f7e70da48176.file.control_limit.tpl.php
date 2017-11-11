<?php /* Smarty version Smarty-3.1.14, created on 2017-11-11 11:14:47
         compiled from "tpl/frontend/smart/ajax/control_limit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9449783705a06bf87e78ad9-27188207%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f767be11364d9de35ce26ba9a14f7e70da48176' => 
    array (
      0 => 'tpl/frontend/smart/ajax/control_limit.tpl',
      1 => 1508789613,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9449783705a06bf87e78ad9-27188207',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arrPageData' => 0,
    'limit' => 0,
    'limitID' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06bf87f37976_74018525',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06bf87f37976_74018525')) {function content_5a06bf87f37976_74018525($_smarty_tpl) {?><?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['arSorting'])){?>
<div class="pull-right limit" id="control_limit">
    <span>товаров на странице:</span>
<?php  $_smarty_tpl->tpl_vars['limit'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['limit']->_loop = false;
 $_smarty_tpl->tpl_vars['limitID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arrPageData']->value['arLimit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['limit']->key => $_smarty_tpl->tpl_vars['limit']->value){
$_smarty_tpl->tpl_vars['limit']->_loop = true;
 $_smarty_tpl->tpl_vars['limitID']->value = $_smarty_tpl->tpl_vars['limit']->key;
?>
    <button onclick="forceUpdatePage('<?php echo $_smarty_tpl->tpl_vars['limit']->value['url'];?>
');"<?php if ($_smarty_tpl->tpl_vars['limit']->value['active']){?> disabled<?php }?>><?php echo $_smarty_tpl->tpl_vars['limitID']->value;?>
</button>
<?php } ?>
    <label for="control_limit">
        <?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['limit'];?>

        <select id="control_limit" onchange="forceUpdatePage(this.value);">
<?php  $_smarty_tpl->tpl_vars['limit'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['limit']->_loop = false;
 $_smarty_tpl->tpl_vars['limitID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arrPageData']->value['arLimit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['limit']->key => $_smarty_tpl->tpl_vars['limit']->value){
$_smarty_tpl->tpl_vars['limit']->_loop = true;
 $_smarty_tpl->tpl_vars['limitID']->value = $_smarty_tpl->tpl_vars['limit']->key;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['limit']->value['url'];?>
" <?php if ($_smarty_tpl->tpl_vars['limitID']->value==$_smarty_tpl->tpl_vars['arrPageData']->value['limit']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['limitID']->value;?>
</option>
<?php } ?>
        </select>
    </label>
</div>
<?php }?><?php }} ?>