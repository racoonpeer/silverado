<?php /* Smarty version Smarty-3.1.14, created on 2018-01-28 15:37:49
         compiled from "tpl/frontend/smart/core/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19011907195a06b26678de56-88227097%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7cd1dd10c7e35dd23699504cd6df7eda3c87d91d' => 
    array (
      0 => 'tpl/frontend/smart/core/footer.tpl',
      1 => 1517146655,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19011907195a06b26678de56-88227097',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06b2667eee49_94353510',
  'variables' => 
  array (
    'bottomMenu' => 0,
    'objSettingsInfo' => 0,
    'arrModules' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06b2667eee49_94353510')) {function content_5a06b2667eee49_94353510($_smarty_tpl) {?><div class="footer-container">
    <div class="container clearfix">
        <?php echo $_smarty_tpl->getSubTemplate ("ajax/subscribe.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="hr"></div>
        <div class="nav-bottom">
            <div class="pull-left nav">
                <?php echo $_smarty_tpl->getSubTemplate ('menu/bottom.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arItems'=>$_smarty_tpl->tpl_vars['bottomMenu']->value,'break'=>6), 0);?>

            </div>
            <div class="pull-right schedule">
                <strong>�������� ��� ��������!</strong><br/>
                <em>� 8:00 �� 20:00</em>
                <div class="phones">
                    <a href="tel:+380973057697">097 30 57 697</a><br>
                    <a href="tel:+380956227572">095 62 27 572</a><br>
                    <a href="tel:+380638216588">063 82 16 588</a>
                </div>
                <p>�� ����� ������ <a href="mailto:<?php echo $_smarty_tpl->tpl_vars['objSettingsInfo']->value->siteEmail;?>
">�������� ���</a><br/>
                ��� �������� <a href="#" onclick="return Modal.open('<?php echo $_smarty_tpl->getSubTemplate ("core/href.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['arrModules']->value['callback']), 0);?>
');">�������� ������</a></p>
            </div>
        </div>
    </div>
</div>
<div class="bottom-container">
    
    <?php echo $_smarty_tpl->getSubTemplate ('core/copyrights.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div><?php }} ?>