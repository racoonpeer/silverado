<?php /* Smarty version Smarty-3.1.14, created on 2017-10-16 14:04:21
         compiled from "tpl\frontend\smart\core\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1911359e49235eb0c27-30096378%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3645330cf3798a5ed8c1f25307d99df2cb4f826' => 
    array (
      0 => 'tpl\\frontend\\smart\\core\\header.tpl',
      1 => 1508005431,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1911359e49235eb0c27-30096378',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mainMenu' => 0,
    'arCategory' => 0,
    'arrModules' => 0,
    'catalogMenu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59e492360e5e36_08489554',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e492360e5e36_08489554')) {function content_59e492360e5e36_08489554($_smarty_tpl) {?>
<div class="header-container">
    <div class="section-top">
        <div class="container clearfix">
            <?php echo $_smarty_tpl->getSubTemplate ("menu/top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arItems'=>$_smarty_tpl->tpl_vars['mainMenu']->value), 0);?>

            <div class="schedule">
                <time>с 8:00 до 20:00.</time> Ѕез выходных
            </div>
        </div>
    </div>
    <div class="section-middle container clearfix">
        <button class="btn-nav">
            <span class="constituent-1"></span>
            <span class="constituent-2"></span>
            <span class="constituent-3"></span>
        </button>
        <div class="logo">
<?php if ($_smarty_tpl->tpl_vars['arCategory']->value['module']!="home"){?>
            <a href="/"></a>
<?php }?>
        </div>
        <div class="phones">
            <div class="stack">
                <div class="wrap">
                    <a href="tel:+380990549540">099 0549540</a>
                    <a href="tel:+380960549540">096 0549540</a>
                    <a href="tel:+380930549540">093 0549540</a>
                </div>
            </div>
<?php if (isset($_smarty_tpl->tpl_vars['arrModules']->value['callback'])){?>
            <div class="hint">заказать <a href="#" onclick="return Modal.open('<?php echo $_smarty_tpl->getSubTemplate ("core/href.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['arrModules']->value['callback']), 0);?>
');">обратный звонок</a></div>
<?php }?>
        </div>
        <?php echo $_smarty_tpl->getSubTemplate ('ajax/minicart.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ('core/search-form.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
    <div class="section-bottom">
        <div class="container clearfix">
            <?php echo $_smarty_tpl->getSubTemplate ("menu/catalog.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arItems'=>$_smarty_tpl->tpl_vars['catalogMenu']->value,'marginLevel'=>0), 0);?>

        </div>
    </div>
</div><?php }} ?>