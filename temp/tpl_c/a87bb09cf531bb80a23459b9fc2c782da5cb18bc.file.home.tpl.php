<?php /* Smarty version Smarty-3.1.14, created on 2017-10-17 22:23:36
         compiled from "tpl/frontend/smart/module/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17731618459e658b8aa4904-42420102%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a87bb09cf531bb80a23459b9fc2c782da5cb18bc' => 
    array (
      0 => 'tpl/frontend/smart/module/home.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17731618459e658b8aa4904-42420102',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'colname' => 0,
    'selections' => 0,
    'coltitle' => 0,
    'int' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59e658b8b5d818_63678823',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e658b8b5d818_63678823')) {function content_59e658b8b5d818_63678823($_smarty_tpl) {?><div class="banner-container">
    <div class="container clearfix">
        <?php echo $_smarty_tpl->getSubTemplate ("core/banners.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('position'=>1,'maxitems'=>1), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ("core/banners.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('position'=>2,'maxitems'=>2), 0);?>

    </div>
</div>
<div class="main-container">
    <div class="container clearfix">
<?php $_smarty_tpl->tpl_vars['int'] = new Smarty_variable(0, null, 0);?>
<?php  $_smarty_tpl->tpl_vars['coltitle'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['coltitle']->_loop = false;
 $_smarty_tpl->tpl_vars['colname'] = new Smarty_Variable;
 $_from = Selections::getColumns(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['coltitle']->key => $_smarty_tpl->tpl_vars['coltitle']->value){
$_smarty_tpl->tpl_vars['coltitle']->_loop = true;
 $_smarty_tpl->tpl_vars['colname']->value = $_smarty_tpl->tpl_vars['coltitle']->key;
?>
<?php if (isset($_smarty_tpl->tpl_vars['selections']->value[$_smarty_tpl->tpl_vars['colname']->value])&&!empty($_smarty_tpl->tpl_vars['selections']->value[$_smarty_tpl->tpl_vars['colname']->value])){?>
        <?php echo $_smarty_tpl->getSubTemplate ("core/product-selections.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arItems'=>$_smarty_tpl->tpl_vars['selections']->value[$_smarty_tpl->tpl_vars['colname']->value],'title'=>$_smarty_tpl->tpl_vars['coltitle']->value), 0);?>


    <?php $_smarty_tpl->tpl_vars['int'] = new Smarty_variable(($_smarty_tpl->tpl_vars['int']->value+1), null, 0);?>
<?php }?>
<?php } ?>
    </div>
</div><?php }} ?>