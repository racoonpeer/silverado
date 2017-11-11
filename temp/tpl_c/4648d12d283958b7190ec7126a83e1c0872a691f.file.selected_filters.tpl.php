<?php /* Smarty version Smarty-3.1.14, created on 2017-11-11 11:14:48
         compiled from "tpl/frontend/smart/ajax/selected_filters.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20812629165a06bf88063d41-26764762%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4648d12d283958b7190ec7126a83e1c0872a691f' => 
    array (
      0 => 'tpl/frontend/smart/ajax/selected_filters.tpl',
      1 => 1508699901,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20812629165a06bf88063d41-26764762',
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
  'unifunc' => 'content_5a06bf882a7979_27640889',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06bf882a7979_27640889')) {function content_5a06bf882a7979_27640889($_smarty_tpl) {?><?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['selectedFilters'])){?>
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
<a class="filter-element" href="<?php echo $_smarty_tpl->tpl_vars['arItem']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['arItem']->value['title'];?>
</a>
<?php }?>
<?php } ?>

<?php }elseif($_smarty_tpl->tpl_vars['filter']->value['type']=='price'){?>
<?php if ($_smarty_tpl->tpl_vars['filter']->value['children']['selected']['min']&&$_smarty_tpl->tpl_vars['filter']->value['children']['selected']['max']){?>
<a class="filter-element" href="<?php echo $_smarty_tpl->tpl_vars['filter']->value['children']['selected']['url'];?>
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
<a class="filter-element" href="<?php echo $_smarty_tpl->tpl_vars['arItem']->value['url'];?>
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
<a class="filter-element" href="<?php echo $_smarty_tpl->tpl_vars['arItem']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['arItem']->value['title'];?>
</a>
<?php }?>
<?php } ?>
<?php }?>
<?php }?>
<?php } ?>
<a class="filter-element clear-all" href="<?php echo $_smarty_tpl->tpl_vars['UrlWL']->value->copy()->resetPage()->resetFilters()->buildUrl();?>
"><?php echo @constant('REMOVE_ALL_FILTERS');?>
</a>
<?php }?><?php }} ?>