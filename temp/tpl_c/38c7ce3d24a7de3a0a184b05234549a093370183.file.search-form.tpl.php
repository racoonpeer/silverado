<?php /* Smarty version Smarty-3.1.14, created on 2017-11-11 10:18:46
         compiled from "tpl/frontend/smart/core/search-form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17948347775a06b2661551c9-23430656%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38c7ce3d24a7de3a0a184b05234549a093370183' => 
    array (
      0 => 'tpl/frontend/smart/core/search-form.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17948347775a06b2661551c9-23430656',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arrModules' => 0,
    'arrPageData' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06b2661906e7_08561420',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06b2661906e7_08561420')) {function content_5a06b2661906e7_08561420($_smarty_tpl) {?>
<button class="search-toggle"></button>
<div class="searchbar">
    <form action="<?php echo $_smarty_tpl->getSubTemplate ('core/href.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['arrModules']->value['search']), 0);?>
" method="GET" id="searchForm" name="qSearchForm">
        <input type="search" name="stext" id="qSearchText" value="<?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['stext'])){?><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['stext'];?>
<?php }?>"/>
        <button type="submit"></button>
    </form>
</div><?php }} ?>