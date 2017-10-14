<?php /* Smarty version Smarty-3.1.14, created on 2017-10-08 19:23:43
         compiled from "tpl/frontend/smart/ajax/control_sort.tpl" */ ?>
<?php /*%%SmartyHeaderCode:180457762959ac727e70e752-88126227%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69da89e3188dc902fefa4affa2688d336057cbc6' => 
    array (
      0 => 'tpl/frontend/smart/ajax/control_sort.tpl',
      1 => 1507479415,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '180457762959ac727e70e752-88126227',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59ac727e795239_75581237',
  'variables' => 
  array (
    'arrPageData' => 0,
    'sorting' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ac727e795239_75581237')) {function content_59ac727e795239_75581237($_smarty_tpl) {?><?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['arSorting'])){?>
<div class="pull-left sort">
    сортировка:
    <select onchange="window.location.assign(this.value);">
<?php  $_smarty_tpl->tpl_vars['sorting'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sorting']->_loop = false;
 $_smarty_tpl->tpl_vars['sortID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arrPageData']->value['arSorting']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sorting']->key => $_smarty_tpl->tpl_vars['sorting']->value){
$_smarty_tpl->tpl_vars['sorting']->_loop = true;
 $_smarty_tpl->tpl_vars['sortID']->value = $_smarty_tpl->tpl_vars['sorting']->key;
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['sorting']->value['url'];?>
"<?php if ($_smarty_tpl->tpl_vars['sorting']->value['active']){?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['sorting']->value['title'];?>
</option>
<?php } ?>
    </select>
</div>
<?php }?><?php }} ?>