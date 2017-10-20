<?php /* Smarty version Smarty-3.1.14, created on 2017-10-17 22:23:36
         compiled from "tpl/frontend/smart/core/product-selections.tpl" */ ?>
<?php /*%%SmartyHeaderCode:162011743959e658b8c638b6-15174966%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2f77699a2b07523191a243eef7de912f85f9534' => 
    array (
      0 => 'tpl/frontend/smart/core/product-selections.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '162011743959e658b8c638b6-15174966',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'arItems' => 0,
    'arItem' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59e658b8ce8a38_44562244',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e658b8ce8a38_44562244')) {function content_59e658b8ce8a38_44562244($_smarty_tpl) {?><?php if (!isset($_smarty_tpl->tpl_vars['title']->value)){?><?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable('', null, 0);?><?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['arItems']->value)){?>
<div class="selections">
    <div class="container clearfix">
<?php if (!empty($_smarty_tpl->tpl_vars['title']->value)){?>
        <div class="h2"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</div>
<?php }?>
        <div class="product-grid slick-ready">
<?php  $_smarty_tpl->tpl_vars['arItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['arItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arItems']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['arItem']->key => $_smarty_tpl->tpl_vars['arItem']->value){
$_smarty_tpl->tpl_vars['arItem']->_loop = true;
?>
            <?php echo $_smarty_tpl->getSubTemplate ("core/product.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('item'=>$_smarty_tpl->tpl_vars['arItem']->value), 0);?>

<?php } ?>
        </div>
    </div>
</div>
<?php }?><?php }} ?>