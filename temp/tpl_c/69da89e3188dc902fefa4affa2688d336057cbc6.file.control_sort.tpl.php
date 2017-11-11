<?php /* Smarty version Smarty-3.1.14, created on 2017-11-11 11:14:47
         compiled from "tpl/frontend/smart/ajax/control_sort.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4168959575a06bf87f3f519-25039038%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69da89e3188dc902fefa4affa2688d336057cbc6' => 
    array (
      0 => 'tpl/frontend/smart/ajax/control_sort.tpl',
      1 => 1508789624,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4168959575a06bf87f3f519-25039038',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arrPageData' => 0,
    'sorting' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06bf8805d8c3_57050454',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06bf8805d8c3_57050454')) {function content_5a06bf8805d8c3_57050454($_smarty_tpl) {?><?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['arSorting'])){?>
<div class="pull-left sort" id="control_sort">
    <label>
        <span>сортировка:</span>
        <select onchange="forceUpdatePage(this.value);">
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
    </label>
</div>
<?php }?><?php }} ?>