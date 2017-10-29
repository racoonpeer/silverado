<?php /* Smarty version Smarty-3.1.14, created on 2017-10-23 23:27:27
         compiled from "tpl/frontend/smart/core/filter-popup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:64450244259ee4027590403-57983202%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a4d8a4e72cbc41b18d65566d265762e7295a96cd' => 
    array (
      0 => 'tpl/frontend/smart/core/filter-popup.tpl',
      1 => 1508790346,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '64450244259ee4027590403-57983202',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59ee402759f5f4_87753030',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ee402759f5f4_87753030')) {function content_59ee402759f5f4_87753030($_smarty_tpl) {?><div class="filters-popup" off-canvas="filter-popup left shift" id="filtersPopup">
    <div class="h1">Фильтр</div>
    <div class="form" id="filtersFormPopup">
        <?php echo $_smarty_tpl->getSubTemplate ("ajax/filter-popup.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
</div><?php }} ?>