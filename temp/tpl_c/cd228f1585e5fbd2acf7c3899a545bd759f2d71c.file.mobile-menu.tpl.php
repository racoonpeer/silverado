<?php /* Smarty version Smarty-3.1.14, created on 2017-10-17 22:23:36
         compiled from "tpl/frontend/smart/core/mobile-menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20118796259e658b878e963-73590175%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd228f1585e5fbd2acf7c3899a545bd759f2d71c' => 
    array (
      0 => 'tpl/frontend/smart/core/mobile-menu.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20118796259e658b878e963-73590175',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arCategory' => 0,
    'catalogMenu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59e658b87da794_23116821',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e658b87da794_23116821')) {function content_59e658b87da794_23116821($_smarty_tpl) {?><div class="mobile-menu" off-canvas="mobile-menu left shift" id="mobileMenu">
    <a class="m-logo <?php if ($_smarty_tpl->tpl_vars['arCategory']->value['module']=="home"){?>noclick<?php }?>" href="<?php if ($_smarty_tpl->tpl_vars['arCategory']->value['module']=="home"){?>#<?php }else{ ?>/<?php }?>"></a>
    <div class="menu-wrap">
        <?php echo $_smarty_tpl->getSubTemplate ("menu/catalog.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arItems'=>$_smarty_tpl->tpl_vars['catalogMenu']->value,'marginLevel'=>0), 0);?>

    </div>
</div><?php }} ?>