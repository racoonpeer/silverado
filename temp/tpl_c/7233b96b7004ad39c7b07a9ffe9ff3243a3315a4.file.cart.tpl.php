<?php /* Smarty version Smarty-3.1.14, created on 2017-11-11 11:39:07
         compiled from "tpl/frontend/smart/cart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13819070365a06c53babe8a1-07189996%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7233b96b7004ad39c7b07a9ffe9ff3243a3315a4' => 
    array (
      0 => 'tpl/frontend/smart/cart.tpl',
      1 => 1509843551,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13819070365a06c53babe8a1-07189996',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'arCategory' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06c53bbe8dc3_82328672',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06c53bbe8dc3_82328672')) {function content_5a06c53bbe8dc3_82328672($_smarty_tpl) {?><!DOCTYPE html>
<html lang="<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
">
    <?php echo $_smarty_tpl->getSubTemplate ("core/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <body>
        <div id="sbIndex" canvas="container">
            <?php echo $_smarty_tpl->getSubTemplate ('core/header-basket.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <?php echo $_smarty_tpl->getSubTemplate ((('module/').($_smarty_tpl->tpl_vars['arCategory']->value['module'])).('.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
        <?php echo $_smarty_tpl->getSubTemplate ('core/basket.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ('core/basket-modal.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ('core/modal.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ('core/footer-extra.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </body>
</html><?php }} ?>