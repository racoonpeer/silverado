<?php /* Smarty version Smarty-3.1.14, created on 2017-10-07 22:42:09
         compiled from "tpl/backend/weblife/ajax/actions_log.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13877266959d92e1162bfa0-87185898%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4da0690b7f496357f133822187514f44bc625ed0' => 
    array (
      0 => 'tpl/backend/weblife/ajax/actions_log.tpl',
      1 => 1466018023,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13877266959d92e1162bfa0-87185898',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arHistoryData' => 0,
    'Titles' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59d92e1182de02_89344375',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59d92e1182de02_89344375')) {function content_59d92e1182de02_89344375($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/silveradocom/public_html/include/smarty/plugins/modifier.date_format.php';
?><?php if (!empty($_smarty_tpl->tpl_vars['arHistoryData']->value['history'])){?>
    <table border="0" cellspacing="1" cellpadding="0" class="list history ">  
        <tr>
            <td id="headb" align="center" width="55">Дата</td>
            <td id="headb" align="center" >IP</td>
            <td id="headb" align="center" width="80">пользователь</td>
            <td id="headb" align="left">Действие</td>
            <td id="headb" align="left" width="223">Описание</td>
            <td id="headb" align="center" >Модуль</td>
            <td id="headb" align="center" width="100">Объект</td>
            <td id="headb" align="center">Язык</td>
            <td id="headb" align="center" width="4"></td>
        </tr>

        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
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
                    <?php }else{ ?>
                        Система
                    <?php }?>
                </td>
                <td align="left">
                    <?php $_smarty_tpl->tpl_vars['Titles'] = new Smarty_variable(ActionsLog::getActionsTitle(), null, 0);?>
                    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['arHistoryData']->value['history'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['action'];?>
<?php $_tmp1=ob_get_clean();?><?php if (isset($_smarty_tpl->tpl_vars['Titles']->value[$_tmp1])){?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['arHistoryData']->value['history'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['action'];?>
<?php $_tmp2=ob_get_clean();?><?php echo $_smarty_tpl->tpl_vars['Titles']->value[$_tmp2];?>
<?php }?>
                </td>  
                <td align="left"><?php echo $_smarty_tpl->tpl_vars['arHistoryData']->value['history'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['comment'];?>
</td>
                <td align="center">
                    <?php if (!empty($_smarty_tpl->tpl_vars['arHistoryData']->value['history'][$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['i']['index']]['module'])){?><?php echo $_smarty_tpl->tpl_vars['arHistoryData']->value['history'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['module'];?>
<?php }else{ ?>--<?php }?>
                </td>
                <td align="center">
                    <?php if (!empty($_smarty_tpl->tpl_vars['arHistoryData']->value['history'][$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['i']['index']]['object'])){?>
                        <?php if (!empty($_smarty_tpl->tpl_vars['arHistoryData']->value['history'][$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['i']['index']]['oid'])){?>
                            <a target="_blank" href="/admin.php?module=<?php echo $_smarty_tpl->tpl_vars['arHistoryData']->value['history'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['module'];?>
&task=editItem&itemID=<?php echo $_smarty_tpl->tpl_vars['arHistoryData']->value['history'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['oid'];?>
">
                                <?php echo $_smarty_tpl->tpl_vars['arHistoryData']->value['history'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['object'];?>

                            </a> 
                            [<?php echo $_smarty_tpl->tpl_vars['arHistoryData']->value['history'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['oid'];?>
]
                        <?php }else{ ?>
                            <?php echo $_smarty_tpl->tpl_vars['arHistoryData']->value['history'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['object'];?>

                        <?php }?>
                    <?php }else{ ?>--<?php }?>
                </td>
                <td align="center"><?php echo $_smarty_tpl->tpl_vars['arHistoryData']->value['history'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['lang'];?>
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
    </table>
    <hr style="border-bottom: 1px solid #B6B6B6;"/>
    <br/><center>
        <?php if ($_smarty_tpl->tpl_vars['arHistoryData']->value['total_pages']>1){?>
            <!-- ++++++++++ Start PAGER ++++++++++++++++++++++++++++++++++++++++++++++++ -->
            <?php echo $_smarty_tpl->getSubTemplate ('common/actions_log_pager.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arrPager'=>$_smarty_tpl->tpl_vars['arHistoryData']->value['pager'],'page'=>$_smarty_tpl->tpl_vars['arHistoryData']->value['page'],'showTitle'=>0,'showFirstLast'=>0,'showPrevNext'=>0), 0);?>

            <!-- ++++++++++ End PAGER ++++++++++++++++++++++++++++++++++++++++++++++++++ -->
        <?php }?>
    </center>
<?php }else{ ?>
    <center><strong>Записей не найдено!</strong></center>
<?php }?><?php }} ?>