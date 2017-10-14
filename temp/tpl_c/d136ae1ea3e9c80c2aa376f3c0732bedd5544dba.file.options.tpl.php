<?php /* Smarty version Smarty-3.1.14, created on 2017-10-08 19:41:45
         compiled from "tpl/backend/weblife/module/options.tpl" */ ?>
<?php /*%%SmartyHeaderCode:140497257359da55498911b1-70138499%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd136ae1ea3e9c80c2aa376f3c0732bedd5544dba' => 
    array (
      0 => 'tpl/backend/weblife/module/options.tpl',
      1 => 1507479414,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '140497257359da55498911b1-70138499',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
    'arrPageData' => 0,
    'categoryTree' => 0,
    'arKey' => 0,
    'arValue' => 0,
    'items' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59da554a01ee13_24149123',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59da554a01ee13_24149123')) {function content_59da554a01ee13_24149123($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ('common/module_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>@constant('PRODUCT_OPTIONS'),'creat_title'=>@constant('ADMIN_CREATING_NEW_OPTION'),'edit_title'=>@constant('ADMIN_EDIT_OPTION')), 0);?>



<script type="text/javascript">
<!--
    $(function() {
        $('.sortable').find('input[type="text"]').mousedown(function(e){ e.stopPropagation(); });
        $(document).keypress(function(e){
            if (e.which == 13 && $('#optValue').val().length>0){
                addOptValue();
                return false;
            }
        });
        $('#optValue').autocomplete({
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
    
    function addOptValue() {
        if( $('#optType option:selected').val()==2 && !isNumber($('#optValue').val())){
            $('#tip').text('Введите число или измените тип на "Текстовый"');
            $('#optValue').addClass('error');
            return false;
        } else {
            if($('#optValue').val().length>0) {
                $('#optValue').removeClass('error');
                var maxID = <?php if (isset($_smarty_tpl->tpl_vars['item']->value['arValuesMaxID'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['arValuesMaxID'];?>
 + <?php }?>$('ul.sortable').find('li').length;
                var html = '<li class="ui-state-default optsort">'+
                           '<input type="hidden" name="arValues['+maxID+'][id]" value=""/>'+
                           '<input name="arValues['+maxID+'][title]" class="left field" type="text" value="'+$('#optValue').val()+'" style="width: 120px;"/>'+
                           '<input name="arValues['+maxID+'][seo_value]" class="left field" type="text" value="'+$('#optValue').val()+'" style="width: 120px;"/>'+
                           '<input name="arValues['+maxID+'][seo_path]" class="left field" type="text" value="" style="width: 120px;"/>'+
                           '<input type="file" name="arValues['+maxID+'][image]" value="" style="margin-top: 4px; width: 160px;"/>'+ 
                           '<a class="right" href="javascript:void(0)" onclick="removeOptVal(this);">'+
                           '<img src="images/admin/error.png"/></a>'+
                           '<img class="right" title="Нажмите и перетащите элемент на новое место в списке" src="images/sort.png"/>'+
                           '<div class="clear"></div>'+
                           '</li>';                           
                $('ul.sortable').append(html);  
                $('#optValue').val('');
                $('#tip').text('');
                $('.sortable').find('input[type="text"]').mousedown(function(e){ e.stopPropagation(); });
            }
        }   
    }
       
    function removeOptVal(item, removeAll) {
        if(typeof removeAll == 'undefined')
            $(item).parent().remove();
        else 
            $('ul.sortable').html('');
    }
//-->
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
"   />

    <div class="tabsContainer">
        <ul class="nav">
            <li><a href="javascript:void(0);" data-target="main" class="active">Основные</a></li>
<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['task']=='editItem'){?>
            <li><a href="javascript:void(0);" data-target="values">Значения</a></li>
<?php }?>
            <li><a href="javascript:void(0);" data-target="history">История</a></li>
        </ul>
        <div class="tab_line"></div>
        <ul class="tabs">
            <li class="active" id="tab_main">
                <table border="1" cellspacing="0" cellpadding="1" class="list">      
                    <tr>
                        <td id="headb" align="left"><?php echo @constant('HEAD_PUBLISH_PAGE');?>
</td>
                        <td  align="left">
                            <input type="radio" name="active" value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value['active']==1){?>checked<?php }?>>
                            <?php echo @constant('OPTION_YES');?>

                            <input type="radio" name="active" value="0" <?php if ($_smarty_tpl->tpl_vars['item']->value['active']==0){?>checked<?php }?>>
                            <?php echo @constant('OPTION_NO');?>

                        </td>
                        <td class="buttons_row" valign="top" width="144">
                            <!-- ++++++++++ Start Buttons ++++++++++++++++++++++++++++++++++++++++++++++ -->
                            <?php echo $_smarty_tpl->getSubTemplate ('common/buttons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('itemID'=>$_smarty_tpl->tpl_vars['item']->value['id'],'task'=>$_smarty_tpl->tpl_vars['arrPageData']->value['task'],'deleteIDLimit'=>0), 0);?>

                            <!-- ++++++++++ End Buttons ++++++++++++++++++++++++++++++++++++++++++++++++ -->
                        </td>
                    </tr>

                    <tr>
                        <td id="headb" align="left"><?php echo @constant('HEAD_SHOW_IN_CART');?>
</td>
                        <td  align="left">
                            <input type="radio" name="basket" value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value['basket']==1){?>checked<?php }?>>
                            <?php echo @constant('OPTION_YES');?>

                            <input type="radio" name="basket" value="0" <?php if ($_smarty_tpl->tpl_vars['item']->value['basket']==0){?>checked<?php }?>>
                            <?php echo @constant('OPTION_NO');?>

                        </td>
                        <td class="buttons_row"></td>
                    </tr>

                    <tr>
                        <td id="headb" align="left">Отображать в списке</td>
                        <td  align="left">
                            <input type="radio" name="list" value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value['list']==1){?>checked<?php }?>>
                            <?php echo @constant('OPTION_YES');?>

                            <input type="radio" name="list" value="0" <?php if ($_smarty_tpl->tpl_vars['item']->value['list']==0){?>checked<?php }?>>
                            <?php echo @constant('OPTION_NO');?>

                        </td>
                        <td class="buttons_row"></td>
                    </tr>

                    <tr>
                        <td id="headb" align="left" width="175"><?php echo @constant('HEAD_TYPE');?>
 <font style="color:red">*</font></td>
                        <td>
                            <select name="type_id" id="type_id">
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrPageData']->value['types']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                <option value="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['types'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['types'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']==$_smarty_tpl->tpl_vars['item']->value['type_id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['types'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
</option>
<?php endfor; endif; ?>
                            </select>
                        </td>
                        <td class="buttons_row"></td>
                    </tr>

                    <tr>
                        <td id="headb" align="left" width="175"><?php echo @constant('HEAD_TITLE');?>
 <font style="color:red">*</font></td>
                        <td>
                            <input class="field" name="title" size="100" id="title" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
" />
                        </td>
                        <td class="buttons_row"></td>
                    </tr>

                    <tr>
                        <td id="headb" align="left" width="175"><?php echo @constant('HEAD_SHORT_TITLE');?>
 <font style="color:red">*</font></td>
                        <td>
                            <input class="field" name="stitle" size="100" id="stitle" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['stitle'];?>
" />
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
                </table>
            </li>
<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['task']=='editItem'){?>
            <li id="tab_values">
                <br/><strong>Настройка значений опции</strong><br><br/>
                <div id="tip"></div>
                <div class="left"><input id="optValue" style="margin-top:5px; height:24px; padding-left:5px;" type="text" value="" placeholder="введите значение" class="nosize_field" size="120"/>&nbsp;&nbsp;&nbsp;</div>
                <div class="left"><input type="button" class="buttons" value="Добавить" onclick="addOptValue();"/></div>
                <div class="clear"></div> 
                <br/><strong>Значения опции:</strong> <a href="javascript:void(0)" onclick="removeOptVal(this, 'all');">Очистить список</a>
                <div class="sortable-wrapper" style="width:100%">
                    <ul class="sortable" id="defaultVals">
<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['arValues'])){?>
<?php  $_smarty_tpl->tpl_vars['arValue'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['arValue']->_loop = false;
 $_smarty_tpl->tpl_vars['arKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value['arValues']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['arValue']->key => $_smarty_tpl->tpl_vars['arValue']->value){
$_smarty_tpl->tpl_vars['arValue']->_loop = true;
 $_smarty_tpl->tpl_vars['arKey']->value = $_smarty_tpl->tpl_vars['arValue']->key;
?>
                        <li class="ui-state-default optsort">
                            <input type="hidden" name="arValues[<?php echo $_smarty_tpl->tpl_vars['arKey']->value;?>
][id]" value="<?php echo $_smarty_tpl->tpl_vars['arKey']->value;?>
"/>
                            <input class="left field" type="text" name="arValues[<?php echo $_smarty_tpl->tpl_vars['arKey']->value;?>
][title]" value="<?php echo $_smarty_tpl->tpl_vars['arValue']->value['title'];?>
" style="width: 120px;" />
                            <input class="left field" type="text" name="arValues[<?php echo $_smarty_tpl->tpl_vars['arKey']->value;?>
][seo_value]" value="<?php echo $_smarty_tpl->tpl_vars['arValue']->value['seo_value'];?>
" style="width: 120px;"/>
                            <input class="left field" type="text" name="arValues[<?php echo $_smarty_tpl->tpl_vars['arKey']->value;?>
][seo_path]" value="<?php echo $_smarty_tpl->tpl_vars['arValue']->value['seo_path'];?>
" style="width: 120px;" <?php if (!$_smarty_tpl->tpl_vars['arValue']->value['edit']){?>readonly title="недоступно для редактирования, так как используется в товаре"<?php }?>/>
                            <input type="button" value="Генерировать" style="float: left; margin: 3px 5px 0 0; min-width: 100px;" class="buttons" onclick="if(this.form['arValues[<?php echo $_smarty_tpl->tpl_vars['arKey']->value;?>
][title]'].value.length==0){alert('Вы не ввели значение опции!'); this.form['arValues[<?php echo $_smarty_tpl->tpl_vars['arKey']->value;?>
][title]'].focus(); return false; } else { generateSeoPath(this.form['arValues[<?php echo $_smarty_tpl->tpl_vars['arKey']->value;?>
][seo_path]'], this.form['arValues[<?php echo $_smarty_tpl->tpl_vars['arKey']->value;?>
][title]'].value, this.form.title.value, '<?php echo @constant('OPTIONS_VALUES_TABLE');?>
', this.form['arValues[<?php echo $_smarty_tpl->tpl_vars['arKey']->value;?>
][id]'].value);}">
                            <input type="file" name="arValues[<?php echo $_smarty_tpl->tpl_vars['arKey']->value;?>
][image]" value="" style="margin-top:4px; width: 160px;"/>
<?php if (!empty($_smarty_tpl->tpl_vars['arValue']->value['image'])){?>
                            <img src="<?php echo ($_smarty_tpl->tpl_vars['arrPageData']->value['files_url']).($_smarty_tpl->tpl_vars['arValue']->value['image']);?>
" style="max-width:20px; max-height:20px;"/>
                            <input type="checkbox" name="arValues[<?php echo $_smarty_tpl->tpl_vars['arKey']->value;?>
][delete_image]" value="1"/> удалить 
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['arValue']->value['edit']){?>
                            <a class="right" href="javascript:void(0)" onclick="removeOptVal(this);"><img src="images/admin/error.png"/></a>&nbsp;
<?php }?>
                            <img class="right" src="images/sort.png" title="Нажмите и перетащите элемент на новое место в списке" <?php if (!$_smarty_tpl->tpl_vars['arValue']->value['edit']){?>readonly title="недоступно для редактирования, так как используется в товаре" style="margin-right:35px;"<?php }?>/>
                            <div class="clear"></div>
                        </li>
<?php } ?>
<?php }?>
                    </ul>
                </div>
            </li>
<?php }?>
            <li id="tab_history">
                <?php echo $_smarty_tpl->getSubTemplate ("common/object_actions_log.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arHistoryData'=>$_smarty_tpl->tpl_vars['item']->value['arHistory']), 0);?>

            </li>
        </ul>
    </div>
</form>


<?php }else{ ?>
<?php echo $_smarty_tpl->getSubTemplate ('common/new_page_btn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>@constant('ADMIN_ADD_NEW_OPTION')), 0);?>

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
            <td ><a href="<?php echo ((($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url'])).("&task=editItem&itemID=")).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
"><?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
</a></td>
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
" onclick="return confirm('<?php if ($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['cnt']>0){?>Данная опция связана с <?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['cnt'];?>
 товарами. Все записи будут удалены. Продолжить?<?php }else{ ?><?php echo @constant('CONFIRM_DELETE');?>
<?php }?>');" title="<?php echo @constant('LABEL_DELETE');?>
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