<?php /* Smarty version Smarty-3.1.14, created on 2017-10-16 15:28:39
         compiled from "tpl\frontend\smart\ajax\control_sort.tpl" */ ?>
<?php /*%%SmartyHeaderCode:540859e49254e4e1d8-65303073%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c3cc16c6be2c326cf28348722320b71781ca75f' => 
    array (
      0 => 'tpl\\frontend\\smart\\ajax\\control_sort.tpl',
      1 => 1508156718,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '540859e49254e4e1d8-65303073',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59e49254f3ced3_08898308',
  'variables' => 
  array (
    'arrPageData' => 0,
    'sorting' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e49254f3ced3_08898308')) {function content_59e49254f3ced3_08898308($_smarty_tpl) {?><?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['arSorting'])){?>
<div class="pull-left sort">
    <label>
        <span>сортировка:</span>
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
    </label>
</div>
<?php }?><?php }} ?>