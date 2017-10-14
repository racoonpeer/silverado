<?php /* Smarty version Smarty-3.1.14, created on 2017-10-08 19:23:43
         compiled from "tpl/frontend/smart/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:200885510859ac7126cf4961-28410727%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35dac361065068ce3eb6f66315299a93af951f1f' => 
    array (
      0 => 'tpl/frontend/smart/index.tpl',
      1 => 1507479410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200885510859ac7126cf4961-28410727',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59ac7126dbe629_28837060',
  'variables' => 
  array (
    'lang' => 0,
    'arCategory' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ac7126dbe629_28837060')) {function content_59ac7126dbe629_28837060($_smarty_tpl) {?><!DOCTYPE html>
<html lang="<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
">
    <?php echo $_smarty_tpl->getSubTemplate ("core/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <body>
        <div id="sbIndex" canvas="container">
            <?php echo $_smarty_tpl->getSubTemplate ('core/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if (!empty($_smarty_tpl->tpl_vars['arCategory']->value['module'])){?>
            <?php echo $_smarty_tpl->getSubTemplate ((('module/').($_smarty_tpl->tpl_vars['arCategory']->value['module'])).('.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }else{ ?>
            <?php echo $_smarty_tpl->getSubTemplate ('core/static.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>
            <?php echo $_smarty_tpl->getSubTemplate ('core/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <div class="body-overlay" onclick="Basket.close();"></div>
        </div>
        <?php echo $_smarty_tpl->getSubTemplate ('core/basket.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ('core/basket-modal.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ('core/modal.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ('core/footer-extra.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </body>
</html><?php }} ?>