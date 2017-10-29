<?php /* Smarty version Smarty-3.1.14, created on 2017-10-25 22:33:25
         compiled from "tpl/backend/weblife/module/attributes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:67594642959f0e7052adc95-96150913%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f34d906c2db005942c48579a4afe9e8113a6350' => 
    array (
      0 => 'tpl/backend/weblife/module/attributes.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67594642959f0e7052adc95-96150913',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'categoryTree' => 0,
    'arrPageData' => 0,
    'item' => 0,
    'arKey' => 0,
    'arValue' => 0,
    'items' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59f0e7059ecd66_49542596',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59f0e7059ecd66_49542596')) {function content_59f0e7059ecd66_49542596($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ('common/module_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>@constant('ATTRIBUTES'),'creat_title'=>@constant('ADMIN_CREATING_NEW_ATTR'),'edit_title'=>@constant('ADMIN_EDIT_ATTR')), 0);?>

<?php if (!empty($_smarty_tpl->tpl_vars['categoryTree']->value)){?>
    <div id="left_block">
        <ul class="filetree category_tree">
            <li>
                <a href="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['admin_url'];?>
">&nbsp;<img src="/images/admin/treeview/folder.png" /> &nbsp;Все группы</a>
                <ul>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['categoryTree']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                    <li class="<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['GID']==$_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']){?>active collapsable<?php }?>">
                        &nbsp; <img src="/images/admin/treeview/folder-closed.png" />  &nbsp;
                        <a href="/admin.php?module=attributes&gid=<?php echo $_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
</a>
                        <a href="/admin.php?module=attribute_groups&task=editItem&itemID=<?php echo $_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
">
                            <img src="/images/operation/edit.png" height="10"/>
                        </a>
<?php if (!empty($_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['i']['index']]['children'])){?>
                        <ul>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['j'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['name'] = 'j';
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['children']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total']);
?>
                            <li>
                                <a href="/admin.php?module=attributes&task=editItem&itemID=<?php echo $_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['children'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['children'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['title'];?>
</a>
                                <a href="/admin.php?module=attributes&task=editItem&itemID=<?php echo $_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['children'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['id'];?>
">
                                    <img src="/images/operation/edit.png" height="10"/>
                                </a>
                            </li>
<?php endfor; endif; ?>
                        </ul>
<?php }?>
                    </li>
<?php endfor; endif; ?>
                </ul>
            </li>
        </ul>
    </div>
<?php }?>

<div id="right_block">

<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['task']=='addItem'||$_smarty_tpl->tpl_vars['arrPageData']->value['task']=='editItem'){?>
<form method="post" action="<?php echo ((($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url'])).("&task=")).($_smarty_tpl->tpl_vars['arrPageData']->value['task']);?>
<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['itemID']>0){?><?php echo (('').("&itemID=")).($_smarty_tpl->tpl_vars['arrPageData']->value['itemID']);?>
<?php }?>" name="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['task'];?>
Form" onsubmit="return formCheck(this);" enctype="multipart/form-data">
    <input type="hidden" name="order"   value="<?php echo $_smarty_tpl->tpl_vars['item']->value['order'];?>
"   />
    <input type="hidden" name="arAttrValues"  id="arAttrValues" value=""   />
    
    <div class="tabsContainer">
        <ul class="nav">
            <li><a href="javascript:void(0);" data-target="main" class="active">Основные</a></li>
            <li><a href="javascript:void(0);" data-target="defaults">Значения атрибутов</a></li>
            <li><a href="javascript:void(0);" data-target="history">История</a></li>
        </ul>
        <div class="tab_line"></div>
        <ul class="tabs">
            <li class="active" id="tab_main">
                <table border="1" cellspacing="0" cellpadding="1" class="list">       
                    <tr>
                        <td id="headb" align="left" width="175"><?php echo @constant('HEAD_TITLE');?>
 <font style="color:red">*</font></td>
                        <td>
                            <input class="field" size="70" name="title" id="title" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
" />
                        </td>
                        <td class="buttons_row" valign="top" width="144">
                            <!-- ++++++++++ Start Buttons ++++++++++++++++++++++++++++++++++++++++++++++ -->
                            <?php echo $_smarty_tpl->getSubTemplate ('common/buttons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('itemID'=>$_smarty_tpl->tpl_vars['item']->value['id'],'task'=>$_smarty_tpl->tpl_vars['arrPageData']->value['task'],'deleteIDLimit'=>0), 0);?>

                            <!-- ++++++++++ End Buttons ++++++++++++++++++++++++++++++++++++++++++++++++ -->
                        </td>
                    </tr>
                    <tr>
                        <td id="headb" align="left" width="175">Краткое описание<br/>(только для админзоны)</td>
                        <td>
                            <input class="field" size="70" name="descr" id="descr" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['descr'];?>
" />
                        </td>
                        <td class="buttons_row"></td>
                    </tr>
                    <tr>
                        <td id="headb" align="left" width="175">Название колонки<br/>(для импорта)</td>
                        <td>
                            <input class="field" size="70" name="colname" id="colname" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['colname'];?>
" />
                        </td>
                        <td class="buttons_row"></td>
                    </tr>
                    <tr>
                        <td id="headb" align="left"><?php echo @constant('LABEL_GROUP');?>
 <font style="color:red">*</font></td>
                        <td  align="left">
                            <select name="gid" class="nosize_field">
                                <option value=""> -- Выберите -- </option>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrPageData']->value['arGroups']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                <option value="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['arGroups'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['gid']==$_smarty_tpl->tpl_vars['arrPageData']->value['arGroups'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']||($_smarty_tpl->tpl_vars['arrPageData']->value['task']=='addItem'&&$_smarty_tpl->tpl_vars['arrPageData']->value['arGroups'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']==$_smarty_tpl->tpl_vars['arrPageData']->value['GID'])){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['arGroups'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
</option>
<?php endfor; endif; ?>
                            </select>
                        </td>
                        <td class="buttons_row"></td>
                    </tr>

                    <tr>
                        <td id="headb" align="left"><?php echo @constant('LABEL_TYPE');?>
 <font style="color:red">*</font></td>
                        <td  align="left">
                            <select id="attrType" name="tid" class="nosize_field">
                                <option value=""> -- Выберите -- </option>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrPageData']->value['arTypes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                <option value="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['arTypes'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['tid']==$_smarty_tpl->tpl_vars['arrPageData']->value['arTypes'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['arTypes'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
</option>
<?php endfor; endif; ?>
                            </select>
                        </td>
                        <td class="buttons_row"></td>
                    </tr>
                </table>
            </li>
            <li id="tab_defaults">
                <br/><strong>Настройка допустимых значений</strong><br><br/>
                <div id="tip"></div>
                <div class="left">
                    <input id="attrValue" style="margin-top:5px; height:24px; padding-left:5px;" type="text" value="" placeholder="введите значение" class="nosize_field" size="104"/>&nbsp;&nbsp;&nbsp;
                </div>
                <div class="left">
                    <input type="button" class="buttons" value="Добавить" onclick="addAttrValue();"/>
                </div>
                <div class="clear"></div> 
                <br/>
                <strong>Допустимые значения атрибута:</strong> <a href="javascript:void(0)" onclick="removeAttrVal(this, 'all');">Очистить список</a>
                <div class="sortable-wrapper" style="width:100%">
                    <ul class="sortable" id="defaultVals">
<?php  $_smarty_tpl->tpl_vars['arValue'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['arValue']->_loop = false;
 $_smarty_tpl->tpl_vars['arKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value['arValues']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['arValue']->key => $_smarty_tpl->tpl_vars['arValue']->value){
$_smarty_tpl->tpl_vars['arValue']->_loop = true;
 $_smarty_tpl->tpl_vars['arKey']->value = $_smarty_tpl->tpl_vars['arValue']->key;
?>
                        <li class="ui-state-default attrsort">
                            <input type="hidden" name="arValues[<?php echo $_smarty_tpl->tpl_vars['arKey']->value;?>
][id]" value="<?php echo $_smarty_tpl->tpl_vars['arKey']->value;?>
"/>
                            <input class="left field" type="text" name="arValues[<?php echo $_smarty_tpl->tpl_vars['arKey']->value;?>
][title]" value="<?php echo $_smarty_tpl->tpl_vars['arValue']->value['title'];?>
" style="width: 140px;" <?php if (!$_smarty_tpl->tpl_vars['arValue']->value['edit']){?>readonly title="недоступно для редактирования, так как используется в товаре"<?php }?>/>
                            <input class="left field" type="text" name="arValues[<?php echo $_smarty_tpl->tpl_vars['arKey']->value;?>
][seo_path]" value="<?php echo $_smarty_tpl->tpl_vars['arValue']->value['seo_path'];?>
" style="width: 140px;" <?php if (!$_smarty_tpl->tpl_vars['arValue']->value['edit']){?>readonly title="недоступно для редактирования, так как используется в товаре"<?php }?>/>
                            <input type="button" value="Генерировать" style="float: left; margin: 3px 5px 0 0; min-width: 100px;" class="buttons" onclick="if(this.form['arValues[<?php echo $_smarty_tpl->tpl_vars['arKey']->value;?>
][title]'].value.length==0){alert('Вы не ввели значение атрибута!'); this.form['arValues[<?php echo $_smarty_tpl->tpl_vars['arKey']->value;?>
][title]'].focus(); return false; } else{ generateSeoPath(this.form['arValues[<?php echo $_smarty_tpl->tpl_vars['arKey']->value;?>
][seo_path]'], this.form['arValues[<?php echo $_smarty_tpl->tpl_vars['arKey']->value;?>
][title]'].value, this.form.title.value);}">
                            <input type="file" name="arValues[<?php echo $_smarty_tpl->tpl_vars['arKey']->value;?>
][image]" value="" style="margin-top:4px"/>
<?php if (!empty($_smarty_tpl->tpl_vars['arValue']->value['image'])){?>
                            <img src="<?php echo ($_smarty_tpl->tpl_vars['arrPageData']->value['files_url']).($_smarty_tpl->tpl_vars['arValue']->value['image']);?>
" style="max-width:20px; max-height:20px;"/>
                            <input type="checkbox" name="arValues[<?php echo $_smarty_tpl->tpl_vars['arKey']->value;?>
][delete_image]" value="1"/> удалить 
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['arValue']->value['edit']){?>
                            <a class="right" href="javascript:void(0)" onclick="removeAttrVal(this);"><img src="images/admin/error.png"/></a>&nbsp;
<?php }?>
                            <img class="right" src="images/sort.png" title="Нажмите и перетащите элемент на новое место в списке" <?php if (!$_smarty_tpl->tpl_vars['arValue']->value['edit']){?>readonly title="недоступно для редактирования, так как используется в товаре" style="margin-right:35px;"<?php }?>/>
                            <div class="clear"></div>
                        </li>
<?php } ?>
                    </ul>
                </div>
            </li>
            <li id="tab_history">
                <?php echo $_smarty_tpl->getSubTemplate ("common/object_actions_log.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arHistoryData'=>$_smarty_tpl->tpl_vars['item']->value['arHistory']), 0);?>

            </li>
        </ul>
    </div>
</form>
<script type="text/javascript">
    $(function() {
        $('.sortable').find('input[type="text"]').mousedown(function(e){ e.stopPropagation(); });
        $(document).keypress(function(e){
            if (e.which == 13 && $('#attrValue').val().length>0){
                addAttrValue();
                return false;
            }
        });
        $('#attrValue').autocomplete({
            source: function(request, response) {
                var arrValues = {};
                $.each($('ul.sortable').find('li').find('.field'), function() {
                    if($(this).val().indexOf(request.term)!=-1) {
                        arrValues[$(this).attr('name')] = $(this).val();
                    }
                });
                response($.map(arrValues, function(item, i) {
                    return {
                        label: item,
                        value: item,
                        name: i
                    }
                }));
            },
            select: function(event, ui) {
                $('ul.sortable').scrollTop($('ul.sortable').find('input[name="'+ui.item.name+'"]').position().top);
                $('ul.sortable').find('input[name="'+ui.item.name+'"]').focus();
                $(this).val("");
                return false;
            },
            minLength: 2
        });
    });
    function formCheck(form){
        if(form.title.value.length == 0){
           alert('<?php echo @constant('ALERT_EMPTY_PAGE_TITLE');?>
'); 
           return false;
        }
        return true;
    }
    
    function addAttrValue() {
        if( $('#attrType option:selected').val()==2 && !isNumber($('#attrValue').val())){
            $('#tip').text('Введите число или измените тип на "Текстовый"');
            $('#attrValue').addClass('error');
            return false;
        } else {
            if($('#attrValue').val().length>0) {
                $('#attrValue').removeClass('error');
                var maxID = <?php if (isset($_smarty_tpl->tpl_vars['item']->value['arValuesMaxID'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['arValuesMaxID'];?>
 + <?php }?>$('ul.sortable').find('li').length;
                var html = '<li class="ui-state-default attrsort">'+
                           '<input type="hidden" name="arValues['+maxID+'][id]" value=""/>'+
                           '<input name="arValues['+maxID+'][title]" class="left field" type="text" value="'+$('#attrValue').val()+'" style="width: 140px;"/>'+
                           '<input name="arValues['+maxID+'][seo_path]" class="left field" type="text" value="" style="width: 140px;"/>'+
                           '<input type="button" value="Генерировать" style="float: left; margin: 3px 5px 0 0; min-width: 100px;" class="buttons" onclick="if(this.form[\'arValues['+maxID+'][title]\'].value.length==0){alert(\'Вы не ввели значение атрибута!\'); this.form[\'arValues['+maxID+'][title]\'].focus(); return false; } else{ generateSeoPath(this.form[\'arValues['+maxID+'][seo_path]\'], this.form[\'arValues['+maxID+'][title]\'].value, this.form.title.value);}">'+
                           '<input type="file" name="arValues['+maxID+'][image]" value=""/>'+ 
                           '<a class="right" href="javascript:void(0)" onclick="removeAttrVal(this);">'+
                           '<img src="images/admin/error.png"/></a>'+
                           '<img class="right" title="Нажмите и перетащите элемент на новое место в списке" src="images/sort.png"/>'+
                           '<div class="clear"></div>'+
                           '</li>';                           
                $('ul.sortable').append(html);  
                $('#attrValue').val('');
                $('#tip').text('');
                $('.sortable').find('input[type="text"]').mousedown(function(e){ e.stopPropagation(); });
            }
        }   
    }
       
    function removeAttrVal(item, removeAll) {
        if(typeof removeAll == 'undefined')
            $(item).parent().remove();
        else 
            $('ul.sortable').html('');
    }
</script>

<?php }else{ ?>
<?php echo $_smarty_tpl->getSubTemplate ('common/new_page_btn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>@constant('ADMIN_ADD_NEW_ATTR')), 0);?>

<div class="clear"></div>
<form method="post" action="<?php echo ($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&task=reorderItems");?>
" name="reorderItems">
    <table width="100%" border="0" cellspacing="1" cellpadding="0" class="list">
        <tr>
            <td id="headb" align="left"><?php echo @constant('HEAD_NAME');?>
</td>
<?php if (empty($_smarty_tpl->tpl_vars['arrPageData']->value['GID'])){?>
            <td id="headb" align="center" width="200"><?php echo @constant('HEAD_GROUP');?>
</td>
<?php }?>
            <td id="headb" align="center" width="38"><?php echo @constant('HEAD_SORT');?>
</td>
            <td id="headb" align="center" width="38"><?php echo @constant('HEAD_EDIT');?>
</td>
            <td id="headb" align="center" width="38"><?php echo @constant('HEAD_DELETE');?>
</td>
        </tr>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['items']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <td ><a href="<?php echo ((($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url'])).("&task=editItem&itemID=")).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
"><?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
 <?php if (!empty($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['i']['index']]['descr'])){?>(<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['descr'];?>
)<?php }?></a></td>
<?php if (empty($_smarty_tpl->tpl_vars['arrPageData']->value['GID'])){?>
            <td  align="center" width="30"><?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['gtitle'];?>
</td>
<?php }?>
            <td  align="center">
                <input type="text" name="arOrder[<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
]" id="arOrder_<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" class="field_smal" value="<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['order'];?>
" style="width:27px;padding-left:0px;text-align:center;" maxlength="4" />
            </td>
            <td  align="center" >
                <a href="<?php echo ((($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url'])).("&task=editItem&itemID=")).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
" title="<?php echo @constant('LABEL_EDIT');?>
">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['system_images'];?>
edit.png" alt="<?php echo @constant('LABEL_EDIT');?>
" />
                </a>
            </td>
            <td  align="center">
                <a href="<?php echo ((($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url'])).("&task=deleteItem&itemID=")).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
" <?php if (!empty($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['i']['index']]['products'])||!empty($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['i']['index']]['filters'])){?>onclick="return confirm('Данный атрибут связан с <?php echo count($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['products']);?>
 товарами и <?php echo count($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['filters']);?>
 фильтрами. Все связанные записи будут удалены. Продолжить?');"<?php }?> title="<?php echo @constant('LABEL_DELETE');?>
">
                   <img src="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['system_images'];?>
delete.png" alt="<?php echo @constant('LABEL_DELETE');?>
" title="<?php echo @constant('LABEL_DELETE');?>
" />
                </a>
            </td>
        </tr>
<?php endfor; endif; ?>
    </table>
    
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
            <td align="center" width="350"></td>
            <td align="center" width="350">
                <?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['total_pages']>1){?>
                    <!-- ++++++++++ Start PAGER ++++++++++++++++++++++++++++++++++++++++++++++++ -->
                    <?php echo $_smarty_tpl->getSubTemplate ('common/pager.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arrPager'=>$_smarty_tpl->tpl_vars['arrPageData']->value['pager'],'page'=>$_smarty_tpl->tpl_vars['arrPageData']->value['page'],'showTitle'=>0,'showFirstLast'=>0,'showPrevNext'=>0), 0);?>

                    <!-- ++++++++++ End PAGER ++++++++++++++++++++++++++++++++++++++++++++++++++ -->
                <?php }?>
            </td>
            <td align="right">
                <input name="submit_order" class="buttons" type="submit" value="<?php echo @constant('BUTTON_APPLY');?>
" />
            </td>
        </tr>
    </table>
</form>
<?php }?>
</div><?php }} ?>