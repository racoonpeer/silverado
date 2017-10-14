<?php /* Smarty version Smarty-3.1.14, created on 2017-10-08 19:23:43
         compiled from "tpl/frontend/smart/ajax/control_limit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:37849761059ac727e69e3c2-80531674%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f767be11364d9de35ce26ba9a14f7e70da48176' => 
    array (
      0 => 'tpl/frontend/smart/ajax/control_limit.tpl',
      1 => 1507479415,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '37849761059ac727e69e3c2-80531674',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59ac727e7080b0_00075673',
  'variables' => 
  array (
    'arrPageData' => 0,
    'limit' => 0,
    'limitID' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ac727e7080b0_00075673')) {function content_59ac727e7080b0_00075673($_smarty_tpl) {?><?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['arSorting'])){?>
<div class="pull-right limit">
    товаров на странице:
<?php  $_smarty_tpl->tpl_vars['limit'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['limit']->_loop = false;
 $_smarty_tpl->tpl_vars['limitID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arrPageData']->value['arLimit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['limit']->key => $_smarty_tpl->tpl_vars['limit']->value){
$_smarty_tpl->tpl_vars['limit']->_loop = true;
 $_smarty_tpl->tpl_vars['limitID']->value = $_smarty_tpl->tpl_vars['limit']->key;
?>
    <button onclick="window.location.assign('<?php echo $_smarty_tpl->tpl_vars['limit']->value['url'];?>
');"<?php if ($_smarty_tpl->tpl_vars['limit']->value['active']){?> disabled<?php }?>><?php echo $_smarty_tpl->tpl_vars['limitID']->value;?>
</button>
<?php } ?>
</div>
<?php }?><?php }} ?>