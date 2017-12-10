<?php /* Smarty version Smarty-3.1.14, created on 2017-12-03 13:58:06
         compiled from "tpl/frontend/smart/core/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6066972515a06b265ed78b1-08383906%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47ac7692d30846f574104e6574337127c77cca4d' => 
    array (
      0 => 'tpl/frontend/smart/core/header.tpl',
      1 => 1512302280,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6066972515a06b265ed78b1-08383906',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06b266018404_99530547',
  'variables' => 
  array (
    'mainMenu' => 0,
    'arCategory' => 0,
    'arrModules' => 0,
    'catalogMenu' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06b266018404_99530547')) {function content_5a06b266018404_99530547($_smarty_tpl) {?>
<div class="header-container">
    <div class="section-top">
        <div class="container clearfix">
            <?php echo $_smarty_tpl->getSubTemplate ("menu/top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arItems'=>$_smarty_tpl->tpl_vars['mainMenu']->value), 0);?>

            <div class="schedule">
                <time>с 8:00 до 20:00.</time> Без выходных
            </div>
        </div>
    </div>
    <div class="section-middle container clearfix">
<?php if ($_smarty_tpl->tpl_vars['arCategory']->value['module']!="checkout"){?>
        <button class="btn-nav">
            <span class="constituent-1"></span>
            <span class="constituent-2"></span>
            <span class="constituent-3"></span>
        </button>
<?php }?>
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
<?php if ($_smarty_tpl->tpl_vars['arCategory']->value['module']=="checkout"){?>
        <a href="javascript:window.history.back();" class="return">вернуться к покупкам</a>
<?php }else{ ?>
        <?php echo $_smarty_tpl->getSubTemplate ('ajax/minicart.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ('core/search-form.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>
    </div>
    <div class="section-bottom">
        <div class="container clearfix">
            <?php echo $_smarty_tpl->getSubTemplate ("menu/catalog.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arItems'=>$_smarty_tpl->tpl_vars['catalogMenu']->value,'marginLevel'=>0), 0);?>

        </div>
    </div>
</div><?php }} ?>