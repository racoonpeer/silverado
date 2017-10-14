<?php /* Smarty version Smarty-3.1.14, created on 2017-10-08 19:18:04
         compiled from "tpl/backend/weblife/ajax/object_actions_log_body.tpl" */ ?>
<?php /*%%SmartyHeaderCode:141601984459ac6cea93bfc6-10826676%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c500b8c85a16f00d4a7d919dcfc297efa9eafdda' => 
    array (
      0 => 'tpl/backend/weblife/ajax/object_actions_log_body.tpl',
      1 => 1507479411,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141601984459ac6cea93bfc6-10826676',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59ac6ceaa5f506_23355825',
  'variables' => 
  array (
    'arHistoryData' => 0,
    'Titles' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ac6ceaa5f506_23355825')) {function content_59ac6ceaa5f506_23355825($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/silveradocom/public_html/include/smarty/plugins/modifier.date_format.php';
?><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arHistoryData']->value['history']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
    <tr>
        <td align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['arHistoryData']->value['history'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['ts'],"%d.%m.%Y %H:%M:%S");?>
</td>
        <td align="center"><?php echo $_smarty_tpl->tpl_vars['arHistoryData']->value['history'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['ip'];?>
</td>
        <td align="center">
            <?php if ($_smarty_tpl->tpl_vars['arHistoryData']->value['history'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['uid']!=-1){?>
            <a target="_blank" href="/admin.php?module=users&task=viewItem&itemID=<?php echo $_smarty_tpl->tpl_vars['arHistoryData']->value['history'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['uid'];?>
">
                <?php echo $_smarty_tpl->tpl_vars['arHistoryData']->value['history'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['user'];?>

            </a> [<?php echo $_smarty_tpl->tpl_vars['arHistoryData']->value['history'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['uid'];?>
]
            <?php }else{ ?>Система
            <?php }?>
        </td>
        <td align="left">
            <?php $_smarty_tpl->tpl_vars['Titles'] = new Smarty_variable(ActionsLog::getActionsTitle(), null, 0);?>
            <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['arHistoryData']->value['history'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['action'];?>
<?php $_tmp1=ob_get_clean();?><?php if (isset($_smarty_tpl->tpl_vars['Titles']->value[$_tmp1])){?>
            <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['arHistoryData']->value['history'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['action'];?>
<?php $_tmp2=ob_get_clean();?><?php echo $_smarty_tpl->tpl_vars['Titles']->value[$_tmp2];?>

            <?php }?>
        </td>
        <td><?php echo $_smarty_tpl->tpl_vars['arHistoryData']->value['history'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['comment'];?>
</td>
        <td align="center">                
            <?php if ($_smarty_tpl->tpl_vars['arHistoryData']->value['history'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['message']){?>
                <a href="javascript:void(0)"  onclick="return parent.hs.htmlExpand (this, {contentId: 'my-content<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
' })" class="highslide">
                    <img width="15" style="border:none;" src="/images/operation/find.png" />
                </a>
                <div class="highslide-html-content" id="my-content<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
" style="padding:10px;">
                    <a href="#" style="text-align:right; display: block;" onclick="hs.close(this)">X</a>
                    <div class="highslide-body">
                         <?php echo $_smarty_tpl->tpl_vars['arHistoryData']->value['history'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['message'];?>

                    </div>
                </div>
            <?php }?>
        </td>
    </tr>
<?php endfor; endif; ?>
<?php }} ?>