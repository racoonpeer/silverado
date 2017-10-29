<?php /* Smarty version Smarty-3.1.14, created on 2017-10-23 23:44:34
         compiled from "tpl/frontend/smart/ajax/filter-popup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:190151646059ee40275aa2f5-41146157%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dadb733e5893fb78d9fa8639ac3e488541d3fedb' => 
    array (
      0 => 'tpl/frontend/smart/ajax/filter-popup.tpl',
      1 => 1508791463,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '190151646059ee40275aa2f5-41146157',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59ee40275d0399_04062766',
  'variables' => 
  array (
    'UrlWL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ee40275d0399_04062766')) {function content_59ee40275d0399_04062766($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("ajax/filter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('mobile'=>true), 0);?>

<div class="buttons clearfix">
    <button class="pull-left btn btn-m btn-link" onclick="forceUpdatePage('<?php echo $_smarty_tpl->tpl_vars['UrlWL']->value->copy()->resetPage()->resetFilters()->buildUrl();?>
');">Сбросить</button>
    <button class="pull-right btn btn-m btn-danger" onclick="MobileFilters.apply();">Применить</button>
</div><?php }} ?>