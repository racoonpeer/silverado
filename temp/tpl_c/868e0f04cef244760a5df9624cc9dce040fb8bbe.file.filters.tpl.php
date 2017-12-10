<?php /* Smarty version Smarty-3.1.14, created on 2017-12-02 20:46:44
         compiled from "tpl/backend/weblife/module/filters.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10674375765a22f514de07e2-04862016%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '868e0f04cef244760a5df9624cc9dce040fb8bbe' => 
    array (
      0 => 'tpl/backend/weblife/module/filters.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10674375765a22f514de07e2-04862016',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arrPageData' => 0,
    'item' => 0,
    'items' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a22f51568b592_18765337',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a22f51568b592_18765337')) {function content_5a22f51568b592_18765337($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ('common/module_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>@constant('FILTERS'),'creat_title'=>@constant('ADMIN_CREATING_NEW_FILTER'),'edit_title'=>@constant('ADMIN_EDIT_FILTER')), 0);?>


<script type="text/javascript">
    function formCheck(form){
        if(form.title.value.length == 0){
           alert('<?php echo @constant('ALERT_EMPTY_PAGE_TITLE');?>
'); 
           return false;
        }
        return true;
    }
</script>

<div id="right_block">

<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['task']=='addItem'||$_smarty_tpl->tpl_vars['arrPageData']->value['task']=='editItem'){?>
<form method="post" action="<?php echo ((($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url'])).("&task=")).($_smarty_tpl->tpl_vars['arrPageData']->value['task']);?>
<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['itemID']>0){?><?php echo (('').("&itemID=")).($_smarty_tpl->tpl_vars['arrPageData']->value['itemID']);?>
<?php }?>" name="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['task'];?>
Form" onsubmit="return formCheck(this);" enctype="multipart/form-data">
    <input type="hidden" name="createdDate" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['createdDate'];?>
" />
    <input type="hidden" name="createdTime" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['createdTime'];?>
" />
    <input type="hidden" name="order"   value="<?php echo $_smarty_tpl->tpl_vars['item']->value['order'];?>
"/>

    <div class="tabsContainer">
        <ul class="nav">
            <li><a href="javascript:void(0);" data-target="main" class="active">Основные</a></li>
            <li><a href="javascript:void(0);" data-target="history">История</a></li>
        </ul>
        <div class="tab_line"></div>
        <ul class="tabs">
            <li class="active" id="tab_main">
                <table border="1" cellspacing="0" cellpadding="1" class="list">       
                    <tr>
                        <td id="headb" align="left" width="175"><?php echo @constant('HEAD_TITLE');?>
 <font style="color:red">*</font></td>
                        <td >
                            <input class="field" name="title" id="title" size="100" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
" />
                        </td>
                        <td class="buttons_row" valign="top" width="144">
                            <!-- ++++++++++ Start Buttons ++++++++++++++++++++++++++++++++++++++++++++++ -->
                            <?php echo $_smarty_tpl->getSubTemplate ('common/buttons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('itemID'=>$_smarty_tpl->tpl_vars['item']->value['id'],'task'=>$_smarty_tpl->tpl_vars['arrPageData']->value['task'],'deleteIDLimit'=>0), 0);?>

                            <!-- ++++++++++ End Buttons ++++++++++++++++++++++++++++++++++++++++++++++++ -->
                        </td>
                    </tr>

                    <tr>
                        <td id="headb" align="left"><?php echo @constant('LABEL_TYPE');?>
</td>
                        <td  align="left">
                            <select name="tid" id="formSwitcher"  class="nosize_field">
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
                            </select>&nbsp;&nbsp;&nbsp;
                            <label><input type="checkbox" id="rangeTrigger" class="nosize_field" name="is_range" value="1" <?php if (empty($_smarty_tpl->tpl_vars['item']->value['arRanges'])&&($_smarty_tpl->tpl_vars['item']->value['tid']==1||$_smarty_tpl->tpl_vars['item']->value['tid']==3)){?>disabled<?php }?> <?php if (($_smarty_tpl->tpl_vars['item']->value['tid']==2||$_smarty_tpl->tpl_vars['item']->value['tid']==4)&&!empty($_smarty_tpl->tpl_vars['item']->value['arRanges'])){?>checked<?php }?>/> Диапазон</label>
                        </td>
                        <td class="buttons_row"></td>
                    </tr>

                    <tr>
                        <td id="headb" align="left">Шаблон</td>
                        <td  align="left">
                            <select name="template" id="template" class="nosize_field" <?php if ($_smarty_tpl->tpl_vars['item']->value['tid']==UrlFilters::TYPE_PRICE||($_smarty_tpl->tpl_vars['item']->value['tid']==UrlFilters::TYPE_NUMBER&&!empty($_smarty_tpl->tpl_vars['item']->value['arRanges']))){?>readonly<?php }?>>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrPageData']->value['templates']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                <option value="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['templates'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['keyname'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['template']==$_smarty_tpl->tpl_vars['arrPageData']->value['templates'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['keyname']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['templates'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
</option>
<?php endfor; endif; ?>
                            </select>
                        </td>
                        <td class="buttons_row"></td>
                    </tr>

                    <tr>
                        <td colspan="2">                
                            <table id="attrTable" border="1" cellspacing="0" cellpadding="1" class="list">
                                <tr>
                                    <td id="headb" align="left" width="175">
                                        <?php echo @constant('LABEL_ATTRIBUTE');?>
:
                                    </td>
                                    <td >
                                        <select name="aid"  class="nosize_field">
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrPageData']->value['attrGroups']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                            <optgroup label="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['attrGroups'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
">
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['j'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['name'] = 'j';
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrPageData']->value['attrGroups'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['attributes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['attrGroups'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['aid']==$_smarty_tpl->tpl_vars['arrPageData']->value['attrGroups'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['attrGroups'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['title'];?>
</option>
<?php endfor; endif; ?>                      
                                            </optgroup>
<?php endfor; endif; ?>
                                        </select>
                                    </td>
                                </tr>
                            </table>

                            <table id="rangeTable" border="1" cellspacing="0" cellpadding="1" class="list">
                                <tbody>
<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['arRanges'])){?>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['item']->value['arRanges']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                    <tr id="rangeRow_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['iteration'];?>
">
                                        <td id="headb" align="left" width="175">
                                            <?php echo @constant('LABEL_RANGE');?>
:
                                        </td>
                                        <td>
                                            <input name="arRanges[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['iteration'];?>
][id]" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['arRanges'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
"/>
                                            <input class="field" name="arRanges[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['iteration'];?>
][order]" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['arRanges'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['order'];?>
" style="width: 32px;"/>
                                        </td>
                                        <td>
                                            <input class="field" name="arRanges[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['iteration'];?>
][title]" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['arRanges'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
" style="width: 120px;"/>
                                        </td>
                                        <td>
                                            <input class="field" name="arRanges[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['iteration'];?>
][vmin]" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['arRanges'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vmin'];?>
" style="width: 32px;"/>&nbsp;
                                            <input class="field" name="arRanges[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['iteration'];?>
][vmax]" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['arRanges'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vmax'];?>
" style="width: 32px;"/>
                                        </td>
                                        <td>
                                            <?php echo @constant('LABEL_MEASUREMENT_UNITS');?>
:&nbsp;&nbsp;&nbsp;
                                            <input class="field" name="arRanges[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['iteration'];?>
][unit]" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['arRanges'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['unit'];?>
" style="width: 32px;"/>
                                        </td>
                                        <td>
                                            <a onclick="$(this).parent().parent().remove();" title="Delete!">
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['system_images'];?>
delete.png" alt="Delete!" title="Delete!" />
                                            </a>
                                        </td>
                                    </tr>
<?php endfor; endif; ?>
<?php }else{ ?>
                                    <tr id="rangeRow_1">
                                        <td id="headb" align="left" width="175">
                                            <?php echo @constant('LABEL_RANGE');?>
:
                                        </td>
                                        <td >
                                            <input name="arRanges[1][id]" type="hidden" value="0"/>
                                            <input class="field" name="arRanges[1][order]" type="text" value="1" style="width: 32px;"/>
                                        </td>
                                        <td >
                                            <input class="field" name="arRanges[1][title]" type="text" value="" style="width: 120px;"/>
                                        </td>
                                        <td >
                                            <input class="field" name="arRanges[1][vmin]" type="text" value="" style="width: 32px;"/>&nbsp;&nbsp;
                                            <input class="field" name="arRanges[1][vmax]" type="text" value="" style="width: 32px;"/>
                                        </td>
                                        <td >
                                            <?php echo @constant('LABEL_MEASUREMENT_UNITS');?>
:&nbsp;&nbsp;&nbsp;
                                            <input class="field" name="arRanges[1][unit]" type="text" value="" style="width: 32px;"/>
                                        </td>
                                        <td >
                                            <a onclick="$(this).parent().parent().remove();" title="Delete!">
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['system_images'];?>
delete.png" alt="Delete!" title="Delete!" />
                                            </a>
                                        </td>
                                    </tr>
<?php }?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6" align="center">
                                            <br/><a href="javascript:void(0);" onclick="addRangeRow();"><?php echo @constant('BUTTON_ADD');?>
</a><br/><br/>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>

                        </td>
                        <td class="buttons_row"></td>
                    </tr>
                    <tr class="last">
                        <td></td>
                        <td></td>
                        <td class="buttons_row"></td>
                    </tr>
                </table>
            </li>
            <li id="tab_history">
                <?php echo $_smarty_tpl->getSubTemplate ("common/object_actions_log.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arHistoryData'=>$_smarty_tpl->tpl_vars['item']->value['arHistory']), 0);?>

            </li>
        </ul>           
    </div>
</form>

<script type="text/javascript">
    $(function(){
        var Switcher = document.getElementById('formSwitcher'),
            TplSwitcher = document.getElementById('template'),
            Trigger = document.getElementById('rangeTrigger'),
            RangeTable = document.getElementById('rangeTable'),
            AttrTable = document.getElementById('attrTable');
<?php if (empty($_smarty_tpl->tpl_vars['item']->value['arRanges'])||($_smarty_tpl->tpl_vars['item']->value['tid']==1||$_smarty_tpl->tpl_vars['item']->value['tid']==3)){?>
        $(RangeTable).hide();
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['item']->value['aid']==0){?>        
        $(AttrTable).hide();
<?php }?>
        $(Switcher).on('change', function(){
            var Val = parseInt($(this).val()) || 0;
            switch (Val) {
                case 1: // Brand
                    Trigger.disabled = true;
                    $(RangeTable).hide();
                    $(AttrTable).hide();
                    selectTemplate("text");
                    break;
                case 2: // Price
                    Trigger.disabled = false;
                    $(AttrTable).hide();
                    if (Trigger.checked) $(RangeTable).show();
                    else $(RangeTable).hide();
                    selectTemplate("price");
                    break;
                case 3: // Text
                    Trigger.disabled = true;
                    $(RangeTable).hide();
                    $(AttrTable).show();
                    selectTemplate("text");
                    break;
                case 4:
                    Trigger.disabled = false;
                    $(AttrTable).show();
                    if (Trigger.checked) $(RangeTable).show();
                    else $(RangeTable).hide();
                    selectTemplate("text");
                    break;
                case 5:
                    Trigger.disabled = true;
                    $(RangeTable).hide();
                    $(AttrTable).hide();
                    break;
            }
        });
        
        $(Trigger).bind('click', function(){
            if (this.checked) {
                $(RangeTable).show();
            } else {
                $(RangeTable).hide();
            }
        });
    });
    
    function selectTemplate(keyname) {
        var select = $("#template"),
            options = select[0].options;
        $.map(options, function(option, i){
            if (option.value==keyname) option.selected = true;
            else option.selected = false;
        });
    }
    
    function addRangeRow() {
        var range_row = $('table#rangeTable > tbody > tr').length;
        var target = $('table#rangeTable > tbody');
        range_row++;
        var html;
        html +=     '<tr id="rangeRow_' + range_row + '">';
        html +=     '   <td id="headb" align="left" width="175">Диапазон:</td>';
        html +=     '   <td>';
        html +=     '      <input name="arRanges[' + range_row + '][id]" type="hidden" value="0"/>';
        html +=     '      <input class="field" name="arRanges[' + range_row + '][order]" type="text" value="' + range_row + '" style="width: 32px;"/>';
        html +=     '   </td>';
        html +=     '   <td>';        
        html +=     '       <input class="field" name="arRanges[' + range_row + '][title]" type="text" value="" style="width: 120px;"/>';        
        html +=     '   </td>';
        html +=     '   <td>';
        html +=     '       <input class="field" name="arRanges[' + range_row + '][vmin]" type="text" value="" style="width: 32px;"/>&nbsp;&nbsp;';
        html +=     '       <input class="field" name="arRanges[' + range_row + '][vmax]" type="text" value="" style="width: 32px;"/>';
        html +=     '   </td>';
        html +=     '   <td>';
        html +=     '       Ед.изм:&nbsp;&nbsp;&nbsp;';
        html +=     '       <input class="field" name="arRanges[' + range_row + '][unit]" type="text" value="" style="width: 32px;"/>';
        html +=     '   </td>';    
        html +=     '   <td>';        
        html +=     '       <a onclick="$(this).parent().parent().remove();" title="Delete!">';        
        html +=     '           <img src="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['system_images'];?>
delete.png" alt="Delete!" title="Delete!" />';        
        html +=     '       </a>';        
        html +=     '   </td>';    
        html +=     '</tr>';    
        $(target).append(html);
    }
</script>


<?php }else{ ?>
<?php echo $_smarty_tpl->getSubTemplate ('common/new_page_btn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>@constant('ADMIN_ADD_NEW_FILTER')), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('common/order_links.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arrOrderLinks'=>$_smarty_tpl->tpl_vars['arrPageData']->value['arrOrderLinks']), 0);?>

<div class="clear"></div>
<form method="post" action="<?php echo ($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&task=reorderItems");?>
" name="reorderItems">
    <table width="100%" border="0" cellspacing="1" cellpadding="0" class="list">
        <tr>
            <td id="headb" align="left"><?php echo @constant('HEAD_NAME');?>
</td>
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
</a></td>
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
" onclick="return confirm('<?php echo @constant('CONFIRM_DELETE');?>
');" title="<?php echo @constant('LABEL_DELETE');?>
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