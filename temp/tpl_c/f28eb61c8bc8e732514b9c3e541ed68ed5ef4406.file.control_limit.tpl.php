<?php /* Smarty version Smarty-3.1.14, created on 2017-10-16 15:48:12
         compiled from "tpl\frontend\smart\ajax\control_limit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2358759e49254c92321-16000118%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f28eb61c8bc8e732514b9c3e541ed68ed5ef4406' => 
    array (
      0 => 'tpl\\frontend\\smart\\ajax\\control_limit.tpl',
      1 => 1508158087,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2358759e49254c92321-16000118',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59e49254d3ab25_40848515',
  'variables' => 
  array (
    'arrPageData' => 0,
    'limit' => 0,
    'limitID' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e49254d3ab25_40848515')) {function content_59e49254d3ab25_40848515($_smarty_tpl) {?><?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['arSorting'])){?>
<div class="pull-right limit">
    <span>товаров на странице:</span>
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
    <label for="control_limit">
        <?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['limit'];?>

        <select id="control_limit" onchange="window.location.assign(this.value);">
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