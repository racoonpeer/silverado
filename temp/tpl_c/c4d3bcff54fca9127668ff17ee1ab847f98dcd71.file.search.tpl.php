<?php /* Smarty version Smarty-3.1.14, created on 2017-10-14 19:06:27
         compiled from "tpl\frontend\smart\module\search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2494159e23603da33f4-82161771%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4d3bcff54fca9127668ff17ee1ab847f98dcd71' => 
    array (
      0 => 'tpl\\frontend\\smart\\module\\search.tpl',
      1 => 1507971576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2494159e23603da33f4-82161771',
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
  'unifunc' => 'content_59e2360519c848_74836554',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e2360519c848_74836554')) {function content_59e2360519c848_74836554($_smarty_tpl) {?><div class="page-container container clearfix">
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