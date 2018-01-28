<?php /* Smarty version Smarty-3.1.14, created on 2018-01-08 20:33:47
         compiled from "tpl/frontend/smart/core/mobile-menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20777463765a06b265d8e882-12210548%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd228f1585e5fbd2acf7c3899a545bd759f2d71c' => 
    array (
      0 => 'tpl/frontend/smart/core/mobile-menu.tpl',
      1 => 1515436419,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20777463765a06b265d8e882-12210548',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06b265de8088_38339177',
  'variables' => 
  array (
    'catalogMenu' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06b265de8088_38339177')) {function content_5a06b265de8088_38339177($_smarty_tpl) {?><div class="mobile-menu" off-canvas="mobile-menu left shift" id="mobileMenu">
    <div class="m-title">Каталог товаров</div>
    <div class="menu-wrap">
        <div class="catalog">
            <?php echo $_smarty_tpl->getSubTemplate ("menu/mobile.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arItems'=>$_smarty_tpl->tpl_vars['catalogMenu']->value,'marginLevel'=>0), 0);?>

        </div>
    </div>
    <a href="javascript:MobileMenu.close();" class="m-close" onclick="">&times;</a>
</div><?php }} ?>