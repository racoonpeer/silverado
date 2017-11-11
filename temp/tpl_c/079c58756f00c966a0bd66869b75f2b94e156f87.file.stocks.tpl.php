<?php /* Smarty version Smarty-3.1.14, created on 2017-11-11 11:10:36
         compiled from "tpl/backend/weblife/module/stocks.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8788513515a06be8c945332-90105716%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '079c58756f00c966a0bd66869b75f2b94e156f87' => 
    array (
      0 => 'tpl/backend/weblife/module/stocks.tpl',
      1 => 1510389313,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8788513515a06be8c945332-90105716',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arrPageData' => 0,
    'item' => 0,
    'categoryTree' => 0,
    'arItem' => 0,
    'items' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06be8d19c732_15572002',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06be8d19c732_15572002')) {function content_5a06be8d19c732_15572002($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Volumes/K2/htdocs/silverado/www/include/smarty/plugins/modifier.date_format.php';
?>
<?php echo $_smarty_tpl->getSubTemplate ('common/module_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>@constant('STOCKS'),'creat_title'=>@constant('ADMIN_CREATING_NEW_STOCKS'),'edit_title'=>@constant('ADMIN_EDIT_STOCKS')), 0);?>


<script type="text/javascript">

    function formCheck(form) {
        if(form.title.value.length == 0){
           alert('<?php echo @constant('ALERT_EMPTY_PAGE_TITLE');?>
'); 
           return false;
        }
        // related products input filling
        var arIdx = new Array();
        for (var i = 0; i < form.selected_related.length; i++) {
            arIdx.push(form.selected_related[i].value);
        }
        form.related.value = arIdx.join(',');
        
        return true;
    }
    
    $(function(){
        var InputDateStart = document.getElementById("date_start"),
            InputDateEnd = document.getElementById("date_end");
        $(InputDateStart).datepicker({
            dateFormat: "dd.mm.yy"
        });
        $(InputDateEnd).datepicker({
            dateFormat: "dd.mm.yy"
        });
    });
    
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
        <input type="hidden" name="order" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['order'];?>
"/>
        <div class="tabsContainer">
            <ul class="nav">
                <li><a href="javascript:void(0);" data-target="main" class="active">Основные</a></li>
                <li><a href="javascript:void(0);" data-target="relations">Связи</a></li>
                <li><a href="javascript:void(0);" data-target="seo">SEO</a></li>
                <li><a href="javascript:void(0);" data-target="history">История</a></li>
            </ul>
            <div class="tab_line"></div>
            <ul class="tabs">
                <li class="active" id="tab_main">
                    <table border="1" cellspacing="0" cellpadding="1" class="list">       
                        <tr>
                            <td id="headb" align="left"><?php echo @constant('HEAD_TITLE');?>
 <font style="color:red">*</font></td>
                            <td>
                                <input class="left" name="title" size="70" id="title" style="margin-top:5px; margin-right:10px;" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
" /> <input type="button" class="buttons left" value="Изменить SEO путь" onclick="MoveToSeoPath();"/>
                            </td>
                            <td class="buttons_row" valign="top" width="145" align="center">
                                <!-- ++++++++++ Start Buttons ++++++++++++++++++++++++++++++++++++++++++++++ -->
                                <?php echo $_smarty_tpl->getSubTemplate ('common/buttons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('itemID'=>$_smarty_tpl->tpl_vars['item']->value['id'],'task'=>$_smarty_tpl->tpl_vars['arrPageData']->value['task'],'deleteIDLimit'=>0), 0);?>

                                <!-- ++++++++++ End Buttons ++++++++++++++++++++++++++++++++++++++++++++++++ -->
                            </td>
                        </tr>
                        <tr>
                            <td id="headb" align="left"><?php echo @constant('HEAD_PUBLISH_PAGE');?>
</td>
                            <td align="left">
                                <input type="radio" name="active" value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value['active']==1){?>checked<?php }?>>
                                <?php echo @constant('OPTION_YES');?>

                                <input type="radio" name="active" value="0" <?php if ($_smarty_tpl->tpl_vars['item']->value['active']==0){?>checked<?php }?>>
                                <?php echo @constant('OPTION_NO');?>

                            </td>
                            <td class="buttons_row"></td>
                        </tr>
                        <tr>
                            <td id="headb" align="left">Период действия</td>
                            <td align="left">
                                с 
                                <input type="text" name="date_start" id="date_start" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['date_start'],"%d.%m.%Y");?>
"/> по 
                                <input type="text" name="date_end" id="date_end" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['date_end'],"%d.%m.%Y");?>
"/>
                            </td>
                            <td class="buttons_row"></td>
                        </tr>
                        <!-- ++++++++++ Start Attach Files ++++++++++++++++++++++++++++++++++++++++++++++ -->
                        <?php echo $_smarty_tpl->getSubTemplate ('common/attach_files.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('item'=>$_smarty_tpl->tpl_vars['item']->value,'attachFile'=>false,'attachImages'=>true), 0);?>

                        <!-- ++++++++++ End Attach Files ++++++++++++++++++++++++++++++++++++++++++++++++ -->
                        <tr>
                            <td colspan="2">  
                                <strong><?php echo @constant('HEAD_SHORT_CONTENT');?>
</strong>
                                <a href="javascript:toggleEditor('description');"><?php echo @constant('HEAD_SWITCH_TEXT_EDITOR');?>
</a><br/><br/>
                                <textarea style="width:<?php if (!empty($_smarty_tpl->tpl_vars['categoryTree']->value)){?>640<?php }else{ ?>840<?php }?>px; height: 100px;" id="description" name="descr" ><?php echo $_smarty_tpl->tpl_vars['item']->value['descr'];?>
</textarea>
                            </td>
                            <td class="buttons_row"></td>
                        </tr>   

                        <tr>
                            <td colspan="2">  
                                <strong><?php echo @constant('HEAD_CONTENT');?>
</strong>
                                <a href="javascript:toggleEditor('fulldescription');"><?php echo @constant('HEAD_SWITCH_TEXT_EDITOR');?>
</a><br/><br/>
                                <textarea style="width:<?php if (!empty($_smarty_tpl->tpl_vars['categoryTree']->value)){?>640<?php }else{ ?>840<?php }?>px; height: 500px;" id="fulldescription" name="fulldescr" ><?php echo $_smarty_tpl->tpl_vars['item']->value['fulldescr'];?>
</textarea>
                            </td>
                            <td class="buttons_row"></td>
                        </tr>   
                    </table>
                </li>    
                <li id="tab_relations">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="list" id="relatedTable">
                        <tr>
                            <td colspan="4">     
                                <strong>Похожие товары</strong><br/><br/>
                                <select id="relatedCats" onchange="updateRelatedOptions(this.value);" >
                                    <option> --- Выберите категорию из списка --- </option>
<?php  $_smarty_tpl->tpl_vars['arItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['arItem']->_loop = false;
 $_smarty_tpl->tpl_vars['arKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arrPageData']->value['arRelatedCats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['arItem']->key => $_smarty_tpl->tpl_vars['arItem']->value){
$_smarty_tpl->tpl_vars['arItem']->_loop = true;
 $_smarty_tpl->tpl_vars['arKey']->value = $_smarty_tpl->tpl_vars['arItem']->key;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['arItem']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['arItem']->value['title'];?>
</option>
<?php } ?>
                                </select>
                            </td>
                            <td class="buttons_row" valign="top" width="145" align="center">
                                <!-- ++++++++++ Start Buttons ++++++++++++++++++++++++++++++++++++++++++++++ -->
                                <?php echo $_smarty_tpl->getSubTemplate ('common/buttons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('itemID'=>$_smarty_tpl->tpl_vars['item']->value['id'],'task'=>$_smarty_tpl->tpl_vars['arrPageData']->value['task'],'deleteIDLimit'=>0), 0);?>

                                <!-- ++++++++++ End Buttons ++++++++++++++++++++++++++++++++++++++++++++++++ -->
                            </td>
                        </tr>
                        <tr valign="top">
                            <td >
                                <select onChange="this.form.related_add.disabled=(this.selectedIndex == -1);jsSelectUtils.addExtraOptionsParams(this.form.selected_related, {ondblclick: 'openTab(\'/admin/?module=catalog&task=editItem&itemID=\' + this.value);', style: 'color: blue; text-decoration: underline;'});" multiple="" size="10" id="list_settings_all_related" name="all_related" class="jsSelectUtils_select"></select>
                            </td>
                            <td  valign="middle">
                                <input type="button" onClick="jsSelectUtils.addSelectedOptions(this.form.all_related, 'list_settings_selected_related', 3);jsSelectUtils.addExtraOptionsParams(this.form.selected_related, {ondblclick: 'openTab(\'/admin/?module=catalog&task=editItem&itemID=\' + this.value);', style: 'color: blue; text-decoration: underline;'});" disabled="" title="Выбрать отмеченные колонки" value="&nbsp; &gt; &nbsp;" name="related_add" class="buttons green" style="min-width: 30px;"/>
                                <br/>
                                <input type="button" onClick="jsSelectUtils.addSelectedOptions(this.form.selected_related, 'list_settings_all_related');jsSelectUtils.addExtraOptionsParams(this.form.all_related, {ondblclick: 'openTab(\'/admin/?module=catalog&task=editItem&itemID=\' + this.value);', style: 'color: blue; text-decoration: underline;'});" disabled="" title="Выбрать отмеченные колонки" value="&nbsp; &lt; &nbsp;" name="related_del" class="buttons green" style="min-width: 30px;"/>
                            </td>
                            <td >
                                <input type="hidden" name="related" value="" />
                                <select onChange="var frm=this.form; frm.related_up.disabled=frm.related_down.disabled=frm.related_del.disabled=(this.selectedIndex == -1);jsSelectUtils.addExtraOptionsParams(this.form.all_related, {ondblclick: 'openTab(\'/admin/?module=catalog&task=editItem&itemID=\' + this.value);', style: 'color: blue; text-decoration: underline;'});" multiple="" size="10" id="list_settings_selected_related" name="selected_related" class="jsSelectUtils_select">
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['item']->value['related']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['related'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" ondblclick="openTab('/admin/?module=catalog&task=editItem&itemID=' + this.value);" style="color: blue; text-decoration: underline;"><?php echo $_smarty_tpl->tpl_vars['item']->value['related'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
</option>
<?php endfor; endif; ?>
                                </select>
                            </td>
                            <td  valign="middle">
                                <input type="button" onClick="jsSelectUtils.moveOptionsUp(this.form.selected_related);jsSelectUtils.addExtraOptionsParams(this.form.selected_related, {ondblclick: 'openTab(\'/admin/?module=catalog&task=editItem&itemID=\' + this.value);', style: 'color: blue; text-decoration: underline;'});" disabled="" title="Порядок показа колонок (выше)" value="Выше" class="buttons" name="related_up" style="min-width: 30px;"/>
                                <br/>
                                <input type="button" onClick="jsSelectUtils.moveOptionsDown(this.form.selected_related);jsSelectUtils.addExtraOptionsParams(this.form.selected_related, {ondblclick: 'openTab(\'/admin/?module=catalog&task=editItem&itemID=\' + this.value);', style: 'color: blue; text-decoration: underline;'});" disabled="" title="Порядок показа колонок: ниже" value="Ниже" class="buttons" name="related_down" style="min-width: 30px;"/>
                            </td>
                            <td class="buttons_row"></td>
                        </tr>
                        <tr>
                            <td colspan="4" style="padding: 0 5px;font-style:italic;">Двойной клик по элементу для перехода на товар</td>
                            <td class="buttons_row"></td>
                        </tr>
                    </table>
                    <script type="text/javascript">
                        function updateRelatedOptions(CID) {
                            CID = parseInt(CID)||false;
                            var exItems = getExItems('list_settings_selected_related', '<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
');
                            if(CID){
                                $.ajax({
                                    url: '/interactive/ajax.php',
                                    type: 'GET',
                                    dataType: 'json',
                                    data: {
                                        zone: 'admin',
                                        action: 'getRelatedItems',
                                        module: '<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['module'];?>
',
                                        exclude: exItems,
                                        cid: CID
                                    }, 
                                    success: function(json){
                                        if(json.items){
                                            var html = '';
                                            for (var i in json.items){
                                                html += '<option value="' + json.items[i].id + '" ondblclick="openTab(\'/admin/?module=catalog&task=editItem&itemID=\' + this.value);" style="color: blue; text-decoration: underline;">' + json.items[i].title + '</option>';
                                            }
                                            $('#list_settings_all_related').html(html);
                                        }
                                    }
                                });
                            }
                        }
                        function getExItems(objID, itemID){
                            var exItems = new Array();
                            $.each($('#'+objID).children('option'), function(i, el) {
                                exItems.push($(el).val());
                            });
                            if(itemID > 0){
                                exItems.push(itemID);
                            }
                            return exItems;
                        }
                    </script>
                </li>
                <li id="tab_seo">
                    <table width="101%" border="0" cellspacing="0" cellpadding="0" class="list" > 
                        <!-- ++++++++++ Start Buttons ++++++++++++++++++++++++++++++++++++++++++++++ -->
                        <?php echo $_smarty_tpl->getSubTemplate ('common/meta_seo_data.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                        <!-- ++++++++++ End Buttons ++++++++++++++++++++++++++++++++++++++++++++++++ --> 
                    </table>
                </li>
                <li id="tab_history">
                    <?php echo $_smarty_tpl->getSubTemplate ("common/object_actions_log.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arHistoryData'=>$_smarty_tpl->tpl_vars['item']->value['arHistory']), 0);?>

                </li>
            </ul>
        </div>
    </form>

<?php }else{ ?>
    <?php echo $_smarty_tpl->getSubTemplate ('common/new_page_btn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>@constant('ADMIN_ADD_NEW_STOCK')), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ('common/order_links.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arrOrderLinks'=>$_smarty_tpl->tpl_vars['arrPageData']->value['arrOrderLinks']), 0);?>

    <div class="clear"></div>
    <form method="post" action="<?php echo ($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&task=reorderItems");?>
" name="reorderItems">
        <table width="100%" border="0" cellspacing="1" cellpadding="0" class="list">
            <tr>
                <td id="headb" align="center" width="38"></td>
                <td id="headb" align="center" width="30"></td>
                <td id="headb" align="left"><?php echo @constant('HEAD_NAME');?>
</td>
                <td id="headb" align="center" width="64">дата начала</td>
                <td id="headb" align="center" width="64">дата окончания</td>
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
             <tr class="<?php if ($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['outdated']){?>new_comment<?php }?>">
                <td align="center">
<?php if ($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['active']==1){?>
                    <a href="<?php echo ((($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url'])).("&task=publishItem&status=0&itemID=")).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
" title="<?php echo @constant('HEAD_NO_PUBLISH');?>
">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['system_images'];?>
check.png" alt="<?php echo @constant('HEAD_NO_PUBLISH');?>
" title="<?php echo @constant('HEAD_NO_PUBLISH');?>
" />
                    </a>
<?php }else{ ?>
                    <a href="<?php echo ((($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url'])).("&task=publishItem&status=1&itemID=")).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
" title="<?php echo @constant('HEAD_PUBLISH');?>
">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['system_images'];?>
un_check.png" alt="<?php echo @constant('HEAD_PUBLISH');?>
" title="<?php echo @constant('HEAD_PUBLISH');?>
" />
                    </a>
<?php }?>
                </td>
                <td align="center" valign="center" style="height:30px; width: 30px;"><a href="<?php echo ((($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url'])).("&task=editItem&itemID=")).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
"><img style="max-width:30px; max-height:30px;" src="<?php if ($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['image']){?><?php echo ($_smarty_tpl->tpl_vars['arrPageData']->value['files_url']).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['image']);?>
<?php }else{ ?><?php echo ($_smarty_tpl->tpl_vars['arrPageData']->value['files_url']).('noimage.jpg');?>
<?php }?>" /></a></td>
                <td>
                    <a href="<?php echo ((($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url'])).("&task=editItem&itemID=")).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
"><?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
</a>
                </td>
                <td align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['date_start'],"%d.%m.%Y");?>
</td>
                <td align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['date_end'],"%d.%m.%Y");?>
</td>
                <td align="center">
                    <input type="text" name="arOrder[<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
]" id="arOrder_<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" class="field_smal" value="<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['order'];?>
" style="width:27px;padding-left:0px;text-align:center;" maxlength="4" />
                </td>
                <td align="center" >
                    <a href="<?php echo ((($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url'])).("&task=editItem&itemID=")).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
" title="<?php echo @constant('LABEL_EDIT');?>
">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['system_images'];?>
edit.png" alt="<?php echo @constant('LABEL_EDIT');?>
" />
                    </a>
                </td>
                <td align="center">
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