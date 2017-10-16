<?php /* Smarty version Smarty-3.1.14, created on 2017-10-14 13:22:44
         compiled from "tpl\frontend\smart\ajax\control_sort.tpl" */ ?>
<?php /*%%SmartyHeaderCode:691359e1e57484ca46-88197946%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c3cc16c6be2c326cf28348722320b71781ca75f' => 
    array (
      0 => 'tpl\\frontend\\smart\\ajax\\control_sort.tpl',
      1 => 1507971576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '691359e1e57484ca46-88197946',
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
  'unifunc' => 'content_59e1e5749882a8_59221766',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e1e5749882a8_59221766')) {function content_59e1e5749882a8_59221766($_smarty_tpl) {?><?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['arSorting'])){?>
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