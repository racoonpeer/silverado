<?php /* Smarty version Smarty-3.1.14, created on 2017-10-14 13:22:44
         compiled from "tpl\frontend\smart\ajax\control_limit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1456859e1e57459ac49-63319923%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f28eb61c8bc8e732514b9c3e541ed68ed5ef4406' => 
    array (
      0 => 'tpl\\frontend\\smart\\ajax\\control_limit.tpl',
      1 => 1507971576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1456859e1e57459ac49-63319923',
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
  'unifunc' => 'content_59e1e5746dba01_68271328',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e1e5746dba01_68271328')) {function content_59e1e5746dba01_68271328($_smarty_tpl) {?><?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['arSorting'])){?>
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