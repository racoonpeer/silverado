<?php /* Smarty version Smarty-3.1.14, created on 2017-11-11 11:14:58
         compiled from "tpl/frontend/smart/core/filter-popup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21404967825a06bf928eab04-46076516%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '21404967825a06bf928eab04-46076516',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06bf92981ee8_21711571',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06bf92981ee8_21711571')) {function content_5a06bf92981ee8_21711571($_smarty_tpl) {?><div class="filters-popup" off-canvas="filter-popup left shift" id="filtersPopup">
    <div class="h1">Фильтр</div>
    <div class="form" id="filtersFormPopup">
        <?php echo $_smarty_tpl->getSubTemplate ("ajax/filter-popup.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
</div><?php }} ?>