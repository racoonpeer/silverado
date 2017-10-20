<?php /* Smarty version Smarty-3.1.14, created on 2017-10-17 22:24:17
         compiled from "tpl/frontend/smart/ajax/selected_filters.tpl" */ ?>
<?php /*%%SmartyHeaderCode:149141165159e658e14f7020-45631518%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4648d12d283958b7190ec7126a83e1c0872a691f' => 
    array (
      0 => 'tpl/frontend/smart/ajax/selected_filters.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149141165159e658e14f7020-45631518',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arrPageData' => 0,
    'filterID' => 0,
    'filter' => 0,
    'arItem' => 0,
    'UrlWL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59e658e16e71b3_19135527',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e658e16e71b3_19135527')) {function content_59e658e16e71b3_19135527($_smarty_tpl) {?><?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['selectedFilters'])){?>
<?php  $_smarty_tpl->tpl_vars['filter'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['filter']->_loop = false;
 $_smarty_tpl->tpl_vars['filterID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arrPageData']->value['filters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['filter']->key => $_smarty_tpl->tpl_vars['filter']->value){
$_smarty_tpl->tpl_vars['filter']->_loop = true;
 $_smarty_tpl->tpl_vars['filterID']->value = $_smarty_tpl->tpl_vars['filter']->key;
?>
<?php if (array_key_exists($_smarty_tpl->tpl_vars['filterID']->value,$_smarty_tpl->tpl_vars['arrPageData']->value['selectedFilters'])&&!empty($_smarty_tpl->tpl_vars['filter']->value['children'])){?>

<?php if ($_smarty_tpl->tpl_vars['filter']->value['type']=='brand'||$_smarty_tpl->tpl_vars['filter']->value['type']=='category'){?>
<?php  $_smarty_tpl->tpl_vars['arItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['arItem']->_loop = false;
 $_smarty_tpl->tpl_vars['arKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['filter']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['arItem']->key => $_smarty_tpl->tpl_vars['arItem']->value){
$_smarty_tpl->tpl_vars['arItem']->_loop = true;
 $_smarty_tpl->tpl_vars['arKey']->value = $_smarty_tpl->tpl_vars['arItem']->key;
?>
<?php if ($_smarty_tpl->tpl_vars['arItem']->value['selected']){?>
<a href="<?php echo $_smarty_tpl->tpl_vars['arItem']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['arItem']->value['title'];?>
</a>
<?php }?>
<?php } ?>

<?php }elseif($_smarty_tpl->tpl_vars['filter']->value['type']=='price'){?>
<?php if ($_smarty_tpl->tpl_vars['filter']->value['children']['selected']['min']&&$_smarty_tpl->tpl_vars['filter']->value['children']['selected']['max']){?>
<a href="<?php echo $_smarty_tpl->tpl_vars['filter']->value['children']['selected']['url'];?>
">от <?php echo $_smarty_tpl->tpl_vars['filter']->value['children']['selected']['min'];?>
 до <?php echo $_smarty_tpl->tpl_vars['filter']->value['children']['selected']['max'];?>
 грн</a>
<?php }?>

<?php }elseif($_smarty_tpl->tpl_vars['filter']->value['type']=='range'){?>
<?php  $_smarty_tpl->tpl_vars['arItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['arItem']->_loop = false;
 $_smarty_tpl->tpl_vars['arKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['filter']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['arItem']->key => $_smarty_tpl->tpl_vars['arItem']->value){
$_smarty_tpl->tpl_vars['arItem']->_loop = true;
 $_smarty_tpl->tpl_vars['arKey']->value = $_smarty_tpl->tpl_vars['arItem']->key;
?>
<?php if ($_smarty_tpl->tpl_vars['arItem']->value['selected']){?>
<a href="<?php echo $_smarty_tpl->tpl_vars['arItem']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['arItem']->value['title'];?>
</a>
<?php }?>
<?php } ?>

<?php }else{ ?>
<?php  $_smarty_tpl->tpl_vars['arItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['arItem']->_loop = false;
 $_smarty_tpl->tpl_vars['arKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['filter']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['arItem']->key => $_smarty_tpl->tpl_vars['arItem']->value){
$_smarty_tpl->tpl_vars['arItem']->_loop = true;
 $_smarty_tpl->tpl_vars['arKey']->value = $_smarty_tpl->tpl_vars['arItem']->key;
?>
<?php if ($_smarty_tpl->tpl_vars['arItem']->value['selected']){?>
<a href="<?php echo $_smarty_tpl->tpl_vars['arItem']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['arItem']->value['title'];?>
</a>
<?php }?>
<?php } ?>
<?php }?>
<?php }?>
<?php } ?>
<a class="clear-all" href="<?php echo $_smarty_tpl->tpl_vars['UrlWL']->value->copy()->resetPage()->resetFilters()->buildUrl();?>
"><?php echo @constant('REMOVE_ALL_FILTERS');?>
</a>
<?php }?><?php }} ?>