<?php /* Smarty version Smarty-3.1.14, created on 2017-10-11 22:17:04
         compiled from "tpl/frontend/smart/core/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8219221659ac71271ad477-70674009%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47ac7692d30846f574104e6574337127c77cca4d' => 
    array (
      0 => 'tpl/frontend/smart/core/header.tpl',
      1 => 1507749032,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8219221659ac71271ad477-70674009',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59ac7127289b52_26279831',
  'variables' => 
  array (
    'mainMenu' => 0,
    'arCategory' => 0,
    'arrModules' => 0,
    'catalogMenu' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ac7127289b52_26279831')) {function content_59ac7127289b52_26279831($_smarty_tpl) {?>
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