<?php /* Smarty version Smarty-3.1.14, created on 2017-11-11 11:14:47
         compiled from "tpl/frontend/smart/module/search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19388798015a06bf87d4b256-22753276%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66c654f06ba16f24d56b66c8e0842a374e9226a7' => 
    array (
      0 => 'tpl/frontend/smart/module/search.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19388798015a06bf87d4b256-22753276',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arrPageData' => 0,
    'arCategory' => 0,
    'items' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06bf87e02125_44511023',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06bf87e02125_44511023')) {function content_5a06bf87e02125_44511023($_smarty_tpl) {?><div class="page-container container clearfix">
    <?php echo $_smarty_tpl->getSubTemplate ('core/breadcrumb.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arrBreadCrumb'=>$_smarty_tpl->tpl_vars['arrPageData']->value['arrBreadCrumb']), 0);?>

    <h1 class="heading-title"><?php echo $_smarty_tpl->tpl_vars['arCategory']->value['title'];?>
</h1>
    <div class="controlbar clearfix">
        <?php echo $_smarty_tpl->getSubTemplate ("ajax/control_limit.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ("ajax/control_sort.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="selected-filters" id="selectedFilters">
            <?php echo $_smarty_tpl->getSubTemplate ('ajax/selected_filters.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </div>
    <div class="pull-left column-left" id="filtersForm">
        <?php echo $_smarty_tpl->getSubTemplate ('ajax/filter.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
    <div class="pull-right product-grid clearfix" id="products">
        <?php echo $_smarty_tpl->getSubTemplate ('ajax/products.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('items'=>$_smarty_tpl->tpl_vars['items']->value), 0);?>

    </div>
</div><?php }} ?>