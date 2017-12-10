<?php /* Smarty version Smarty-3.1.14, created on 2017-11-14 21:30:47
         compiled from "tpl/backend/weblife/ajax/actions_log_filters.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20572379355a0b44673ad255-73236446%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '005ef458b68118df98a2fc393fb64510a8d277ba' => 
    array (
      0 => 'tpl/backend/weblife/ajax/actions_log_filters.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20572379355a0b44673ad255-73236446',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arFilters' => 0,
    'selectedFilters' => 0,
    'Titles' => 0,
    'Langs' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a0b44678a28f7_29307306',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a0b44678a28f7_29307306')) {function content_5a0b44678a28f7_29307306($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Volumes/K2/htdocs/silverado/www/include/smarty/plugins/modifier.date_format.php';
?><h3>Фильтрация &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" onclick="updateHistory(false, 'refresh');">сбросить</a></h3>

<hr/>
<?php if (!empty($_smarty_tpl->tpl_vars['arFilters']->value)){?>
    <ul>  
    <li><strong>Дата</strong><br/>
        <ul>
            <li>
                <label><input type="radio" name="filters[time]" <?php if ((isset($_smarty_tpl->tpl_vars['selectedFilters']->value['time'])&&$_smarty_tpl->tpl_vars['selectedFilters']->value['time']==1)||!isset($_smarty_tpl->tpl_vars['selectedFilters']->value['time'])){?>checked<?php }?>  onchange="toogleDateTime(this);" value="1" class="datetime"/> за сегодня</label>
            </li>
            <li>
                <label><input type="radio" name="filters[time]"  <?php if ((isset($_smarty_tpl->tpl_vars['selectedFilters']->value['time'])&&$_smarty_tpl->tpl_vars['selectedFilters']->value['time']==2)){?>checked<?php }?> onchange="toogleDateTime(this);" value="2" class="datetime show" /> выбрать</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" style="font-size:11px;" onclick="clearDate();">очистить</a>
                <div id="datetime" class=" <?php if (!isset($_smarty_tpl->tpl_vars['selectedFilters']->value['time'])||(isset($_smarty_tpl->tpl_vars['selectedFilters']->value['time'])&&$_smarty_tpl->tpl_vars['selectedFilters']->value['time']==1)){?>hidden_block<?php }?>">
                    <br/>с &nbsp;&nbsp; <input type="text" 
                           id="date_from" 
                           size="22" 
                           value="<?php if (isset($_smarty_tpl->tpl_vars['selectedFilters']->value['from'])){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['selectedFilters']->value['from'],"%Y-%m-%d");?>
<?php }?>" 
                           name="filters[from]" /><br/><br/>
                    по&nbsp; <input type="text" 
                              id="date_to" 
                              size="22" 
                              value="<?php if (isset($_smarty_tpl->tpl_vars['selectedFilters']->value['to'])){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['selectedFilters']->value['to'],"%Y-%m-%d");?>
<?php }?>" 
                              name="filters[to]" />
                </div>
            </li>
        </ul>
    </li>    
    <?php if (!empty($_smarty_tpl->tpl_vars['arFilters']->value['modules'])){?>
        <li><strong>Модули</strong>
        <ul>
            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arFilters']->value['modules']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                <li>
                    <label>
                        <input type="checkbox" onchange="updateHistory(this);" data-type="modules" name="filters[modules][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['iteration'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['arFilters']->value['modules'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
"
                               <?php if (isset($_smarty_tpl->tpl_vars['selectedFilters']->value['modules'])&&in_array($_smarty_tpl->tpl_vars['arFilters']->value['modules'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']],$_smarty_tpl->tpl_vars['selectedFilters']->value['modules'])){?>checked<?php }?> >  
                        <?php $_smarty_tpl->tpl_vars['Titles'] = new Smarty_variable(ActionsLog::getModulesTitle(), null, 0);?>
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['arFilters']->value['modules'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
<?php $_tmp1=ob_get_clean();?><?php if (isset($_smarty_tpl->tpl_vars['Titles']->value[$_tmp1])){?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['arFilters']->value['modules'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
<?php $_tmp2=ob_get_clean();?><?php echo $_smarty_tpl->tpl_vars['Titles']->value[$_tmp2];?>
<?php }?> (<?php echo $_smarty_tpl->tpl_vars['arFilters']->value['modules'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
)
                    </label>
                </li>
            <?php endfor; endif; ?>
        </ul>
        </li>
    <?php }?>
    <?php if (!empty($_smarty_tpl->tpl_vars['arFilters']->value['actions'])){?>
        <?php if (isset($_smarty_tpl->tpl_vars['arFilters']->value['actions']['main'])){?>
        <li><strong>Действия</strong>
        <ul>
            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arFilters']->value['actions']['main']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                <li>
                    <label>
                        <input type="checkbox"  onchange="updateHistory(this);" data-type="actions" name="filters[actions][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['iteration'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['arFilters']->value['actions']['main'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
"
                               <?php if (isset($_smarty_tpl->tpl_vars['selectedFilters']->value['actions'])&&in_array($_smarty_tpl->tpl_vars['arFilters']->value['actions']['main'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']],$_smarty_tpl->tpl_vars['selectedFilters']->value['actions'])){?>checked<?php }?>>  
                        <?php $_smarty_tpl->tpl_vars['Titles'] = new Smarty_variable(ActionsLog::getActionsTitle(), null, 0);?>
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['arFilters']->value['actions']['main'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
<?php $_tmp3=ob_get_clean();?><?php if (isset($_smarty_tpl->tpl_vars['Titles']->value[$_tmp3])){?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['arFilters']->value['actions']['main'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
<?php $_tmp4=ob_get_clean();?><?php echo $_smarty_tpl->tpl_vars['Titles']->value[$_tmp4];?>
<?php }?>
                    </label>
                </li>
            <?php endfor; endif; ?>
        </ul>
        </li>
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['arFilters']->value['actions']['order'])){?>
        <li><strong>Редактирование заказов</strong>
        <ul>
            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arFilters']->value['actions']['order']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                <li>
                    <label>
                        <input type="checkbox"  onchange="updateHistory(this);" data-type="actions" name="filters[actions][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['iteration'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['arFilters']->value['actions']['order'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
"
                               <?php if (isset($_smarty_tpl->tpl_vars['selectedFilters']->value['actions'])&&in_array($_smarty_tpl->tpl_vars['arFilters']->value['actions']['order'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']],$_smarty_tpl->tpl_vars['selectedFilters']->value['actions'])){?>checked<?php }?>>  
                        <?php $_smarty_tpl->tpl_vars['Titles'] = new Smarty_variable(ActionsLog::getActionsTitle(), null, 0);?>
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['arFilters']->value['actions']['order'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
<?php $_tmp5=ob_get_clean();?><?php if (isset($_smarty_tpl->tpl_vars['Titles']->value[$_tmp5])){?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['arFilters']->value['actions']['order'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
<?php $_tmp6=ob_get_clean();?><?php echo $_smarty_tpl->tpl_vars['Titles']->value[$_tmp6];?>
<?php }?>
                    </label>
                </li>
            <?php endfor; endif; ?>
        </ul>
        </li>
        <?php }?>
    <?php }?>
    <?php if (!empty($_smarty_tpl->tpl_vars['arFilters']->value['langs'])){?>
        <?php $_smarty_tpl->tpl_vars['Langs'] = new Smarty_variable(SystemComponent::getAcceptLangs(), null, 0);?>
        <li><strong>Языки</strong>
            <ul>
                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arFilters']->value['langs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                    <?php if (array_key_exists($_smarty_tpl->tpl_vars['arFilters']->value['langs'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']],$_smarty_tpl->tpl_vars['Langs']->value)){?>
                        <li>
                            <label><input type="checkbox" onchange="updateHistory(this);" data-type="langs" name="filters[langs][<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['iteration'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['arFilters']->value['langs'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
"
                                <?php if (isset($_smarty_tpl->tpl_vars['selectedFilters']->value['langs'])&&in_array($_smarty_tpl->tpl_vars['arFilters']->value['langs'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']],$_smarty_tpl->tpl_vars['selectedFilters']->value['langs'])){?>checked<?php }?>>      
                                <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['arFilters']->value['langs'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
<?php $_tmp7=ob_get_clean();?><?php echo $_smarty_tpl->tpl_vars['Langs']->value[$_tmp7]['name'];?>

                            </label>
                        </li>
                    <?php }?>
                <?php endfor; endif; ?>
            </ul>
        </li>
    <?php }?>
    <?php if (!empty($_smarty_tpl->tpl_vars['arFilters']->value['users'])){?>
        <li><strong>Пользователи</strong>
            <ul><li>
                <select name="filters[user]" style="width:160px;" onchange="updateHistory();" >
                     <option value="0" >не выбран</option>
                     <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arFilters']->value['users']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                         <option value="<?php echo $_smarty_tpl->tpl_vars['arFilters']->value['users'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['selectedFilters']->value['user'])&&$_smarty_tpl->tpl_vars['selectedFilters']->value['user']==$_smarty_tpl->tpl_vars['arFilters']->value['users'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']){?>selected<?php }?>>
                             <?php if ($_smarty_tpl->tpl_vars['arFilters']->value['users'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']==-1){?>Система<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['arFilters']->value['users'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['name'];?>
<?php }?>
                         </option>
                     <?php endfor; endif; ?>
                 </select>
            </li></ul>
        </li>
    <?php }?>
    </ul>
<?php }?>
        
    
<script type="text/javascript">
    $(document).ready(function() {
        var dateFrom = $('#date_from');
        var dateTo = $('#date_to');

        $(dateFrom).datepicker({ 
            dateFormat: "yy-mm-dd", 
            onClose: function() {
                updateHistory();
            }
        });

        $(dateTo).datepicker({ 
            dateFormat: "yy-mm-dd", 
            onClose: function() {
                updateHistory();
            }
        });

        $(dateFrom).on('change', function(){ 
            $(dateTo).datepicker('option', 'minDate', $(dateFrom).val()); 
        });
    });
</script><?php }} ?>