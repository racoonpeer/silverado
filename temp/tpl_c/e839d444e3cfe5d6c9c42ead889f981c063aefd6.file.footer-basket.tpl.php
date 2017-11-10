<?php /* Smarty version Smarty-3.1.14, created on 2017-11-05 02:42:41
         compiled from "tpl/frontend/smart/core/footer-basket.tpl" */ ?>
<?php /*%%SmartyHeaderCode:148746631259fe5e813c7846-74195715%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e839d444e3cfe5d6c9c42ead889f981c063aefd6' => 
    array (
      0 => 'tpl/frontend/smart/core/footer-basket.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '148746631259fe5e813c7846-74195715',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'bottomMenu' => 0,
    'objSettingsInfo' => 0,
    'arrModules' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59fe5e8141e9c4_15102750',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59fe5e8141e9c4_15102750')) {function content_59fe5e8141e9c4_15102750($_smarty_tpl) {?><div class="footer-container">
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