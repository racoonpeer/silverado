<?php /* Smarty version Smarty-3.1.14, created on 2017-10-11 23:08:15
         compiled from "tpl/backend/weblife/ajax/attributes_values.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25809838959de7a2f8d9628-25110627%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24e467b566af0383d1ad83985616339ad432a63a' => 
    array (
      0 => 'tpl/backend/weblife/ajax/attributes_values.tpl',
      1 => 1507479411,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25809838959de7a2f8d9628-25110627',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arrPageData' => 0,
    'item' => 0,
    'arKey' => 0,
    'arValue' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59de7a2fb00b97_70621042',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59de7a2fb00b97_70621042')) {function content_59de7a2fb00b97_70621042($_smarty_tpl) {?><form method="post" action="<?php echo ((($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url'])).("&task=")).($_smarty_tpl->tpl_vars['arrPageData']->value['task']);?>
<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['itemID']>0){?><?php echo (('').("&itemID=")).($_smarty_tpl->tpl_vars['arrPageData']->value['itemID']);?>
<?php }?>" name="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['task'];?>
Form" enctype="multipart/form-data">
    <table class="list" width="100%">
        <tr>
            <td>
                <strong>Настройка допустимых значений</strong><br/><br/>
                <div id="tip"></div>
                <div class="left">
                    <input id="attrValue" style="margin-top:5px; height:24px; padding-left:5px;" type="text" value="" placeholder="введите значение" class="nosize_field" size="94"/>&nbsp;&nbsp;&nbsp;
                </div>
                <div class="left">
                    <input type="button" class="buttons" value="Добавить" onclick="addAttrValue();"/>
                </div>
                <div class="clear"></div> 
                <br/><strong>Допустимые значения атрибута:</strong> <a href="javascript:void(0)" onclick="removeAttrVal(this, 'all');">Очистить список</a>
                <div class="sortable-wrapper" style="width: 100%;">
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
" style="width: 200px;" <?php if (!$_smarty_tpl->tpl_vars['arValue']->value['edit']){?>readonly title="недоступно для редактирования, так как используется в товаре"<?php }?>/>
                            <input class="left field" type="text" name="arValues[<?php echo $_smarty_tpl->tpl_vars['arKey']->value;?>
][seo_path]" value="<?php echo $_smarty_tpl->tpl_vars['arValue']->value['seo_path'];?>
" style="width: 200px;" <?php if (!$_smarty_tpl->tpl_vars['arValue']->value['edit']){?>readonly title="недоступно для редактирования, так как используется в товаре"<?php }?>/>
                            <input type="button" value="Генерировать" style="float: left; margin: 3px 5px 0 0; min-width: 100px;" class="buttons" onclick="if(this.form['arValues[<?php echo $_smarty_tpl->tpl_vars['arKey']->value;?>
][title]'].value.length==0){alert('Вы не ввели значение атрибута!'); this.form['arValues[<?php echo $_smarty_tpl->tpl_vars['arKey']->value;?>
][title]'].focus(); return false; } else { generateSeoPath(this.form['arValues[<?php echo $_smarty_tpl->tpl_vars['arKey']->value;?>
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
            </td>
        </tr>
        <tr>
            <td align="center">
                <input class="buttons" name="submit" type="submit" value="Сохранить">
            </td>
        </tr>
    </table>
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
                           '<input name="arValues['+maxID+'][title]" class="left field" type="text" value="'+$('#attrValue').val()+'" style="width: 200px;"/>'+
                           '<input name="arValues['+maxID+'][seo_path]" class="left field" type="text" value="" style="width: 200px;"/>'+
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
</script><?php }} ?>