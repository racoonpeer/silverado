<?php /* Smarty version Smarty-3.1.14, created on 2017-10-08 19:23:44
         compiled from "tpl/frontend/smart/core/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:45367738659ac7128895099-63136039%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7cd1dd10c7e35dd23699504cd6df7eda3c87d91d' => 
    array (
      0 => 'tpl/frontend/smart/core/footer.tpl',
      1 => 1507479416,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '45367738659ac7128895099-63136039',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59ac71288e6303_90344359',
  'variables' => 
  array (
    'bottomMenu' => 0,
    'objSettingsInfo' => 0,
    'arrModules' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ac71288e6303_90344359')) {function content_59ac71288e6303_90344359($_smarty_tpl) {?><div class="footer-container">
    <div class="container clearfix">
        <?php echo $_smarty_tpl->getSubTemplate ("ajax/subscribe.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="hr"></div>
        <div class="nav-bottom">
            <div class="pull-left nav">
                <?php echo $_smarty_tpl->getSubTemplate ('menu/bottom.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arItems'=>$_smarty_tpl->tpl_vars['bottomMenu']->value,'break'=>6), 0);?>

            </div>
            <div class="pull-right schedule">
                <strong>Работаем без выходных!</strong><br/>
                <em>с 8:00 до 20:00</em>
                <div class="phones">
                    <a href="tel:+380960549540">096 0549540</a><br/>
                    <a href="tel:+380930549540">093 0549540</a><br/>
                    <a href="tel:+380990549540">099 0549540</a>
                </div>
                <p>Вы также можете <a href="mailto:<?php echo $_smarty_tpl->tpl_vars['objSettingsInfo']->value->siteEmail;?>
" target="_blank">написать нам</a><br/>
                или заказать <a href="#" onclick="return Modal.open('<?php echo $_smarty_tpl->getSubTemplate ("core/href.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['arrModules']->value['callback']), 0);?>
');">обратный звонок</a></p>
            </div>
        </div>
    </div>
</div>
<div class="bottom-container">
    <?php echo $_smarty_tpl->getSubTemplate ('core/footer-links.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ('core/copyrights.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div><?php }} ?>