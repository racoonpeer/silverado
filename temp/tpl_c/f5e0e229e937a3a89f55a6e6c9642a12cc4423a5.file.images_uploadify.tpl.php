<?php /* Smarty version Smarty-3.1.14, created on 2017-10-21 00:18:33
         compiled from "tpl/backend/weblife/ajax/images_uploadify.tpl" */ ?>
<?php /*%%SmartyHeaderCode:151078943159ea6829ae6f01-81785020%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5e0e229e937a3a89f55a6e6c9642a12cc4423a5' => 
    array (
      0 => 'tpl/backend/weblife/ajax/images_uploadify.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '151078943159ea6829ae6f01-81785020',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arrPageData' => 0,
    'items' => 0,
    'arItem' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59ea682a20e161_28786774',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ea682a20e161_28786774')) {function content_59ea682a20e161_28786774($_smarty_tpl) {?><div id="messages" class="<?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['errors'])){?>error<?php }elseif(!empty($_smarty_tpl->tpl_vars['arrPageData']->value['messages'])){?>info<?php }else{ ?>hidden_block<?php }?>">
<?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['errors'])){?>
    <?php echo implode($_smarty_tpl->tpl_vars['arrPageData']->value['errors'],'<br/>');?>

<?php }elseif(!empty($_smarty_tpl->tpl_vars['arrPageData']->value['messages'])){?>
    <?php echo implode($_smarty_tpl->tpl_vars['arrPageData']->value['messages'],'<br/>');?>

<?php }?>
</div>
<form method="post" action="<?php echo (($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url'])).("&task=editItems");?>
" name="editItems" id="ajaxEditForm"  enctype="multipart/form-data">
    <input type="hidden" id="x" name="coords[x]" />
    <input type="hidden" id="y" name="coords[y]" />
    <input type="hidden" id="w" name="coords[w]" />
    <input type="hidden" id="h" name="coords[h]" />
    
    <input type="hidden" id="bg_w" name="coords[bg_w]" />
    <input type="hidden" id="bg_h" name="coords[bg_h]" />
    <input type="hidden" id="crop" name="crop" value="">
    
    <input type="hidden" id="imagePath" name="coords[path]" value="<?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['image'])){?><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['image']['path'];?>
<?php }?>"/>
    <input type="hidden" id="imageName" name="coords[name]" value="<?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['image'])){?><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['image']['name'];?>
<?php }?>"/>
        
    <table width="100%" cellspacing="0" cellpadding="0" border="0" class="list">
        <tbody>
            <tr>
                <td valign="top" width="50%">
                    <table width="100%" cellspacing="1" cellpadding="0" border="0" class="list">
                        <tbody>
                            <tr>
                                <td>
                                    <input id="file" type="file" name="file" ><br/>
                                    <?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['image'])){?><strong>Выбрано:</strong> <?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['image']['name'];?>
&nbsp;&nbsp; <label><input type="checkbox" value="1" name="allLangs"/> загрузить для всех языков</label><br/><?php }?>
                                    <?php if (!empty($_smarty_tpl->tpl_vars['items']->value)&&!$_smarty_tpl->tpl_vars['arItem']->value['diffTables']){?>
                                        <strong>Загружено:</strong> 
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
                                            <?php if (!empty($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['i']['index']][$_smarty_tpl->tpl_vars['arItem']->value['column']])){?>
                                                <div style="border:1px solid #888; display: inline-block; padding:5px;">
                                                    <a href="<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['filename'];?>
" onclick="return parent.hs.expand (this, { })" class="highslide">
                                                        <img src="<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['filename'];?>
" align="center" style="max-width:60px; max-height:60px;"/>  
                                                    </a>
                                                </div>&nbsp;&nbsp;
                                                <a href="<?php echo ((($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url'])).("&task=deleteItem&itemID=")).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
" onclick="return confirm('Вы уверены что хотите удалить файл?');" title="Delete!">
                                                   Удалить
                                                </a>
                                                <?php if ($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['allLangs']){?>
                                                    | <a href="<?php echo ((($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url'])).("&task=deleteItem&langs=all&itemID=")).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
" onclick="return confirm('Вы уверены что хотите удалить файл?');" title="Delete!">
                                                        Удалить со всех языков
                                                     </a>
                                                <?php }?>
                                            <?php }?>
                                        <?php endfor; endif; ?>
                                    <?php }?>
                                </td>
                            </tr>

                            <tr><td>&nbsp;</td><tr>
                                
                            <tr class="invisible">
                                <td align="center">
                                    <div style="border:2px solid #888; width: 480px; height:480px;">
                                        <div id="preview" class="preview">
                                            <img src="<?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['image'])){?><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['image']['path'];?>
<?php }?>" />
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" id="submitButton" style="<?php if (!isset($_smarty_tpl->tpl_vars['arrPageData']->value['image'])){?>display:none<?php }?>">
                                    <input type="submit" value="<?php if (!$_smarty_tpl->tpl_vars['arItem']->value['diffTables']){?>Запомнить координаты<?php }else{ ?>Загрузить<?php }?>" class="buttons left" style="margin-left:20%; margin-right:20px;" onclick="return ImagesUpload.submitCrop();"/>
                                    <input  type="button"  value="Отменить" class="buttons left" onclick="$(ImagesUpload.old_image).show(); $(ImagesUpload.new_image).html(''); parent.$('#arCropImagesParams_<?php echo $_smarty_tpl->tpl_vars['arItem']->value['column'];?>
').val(''); window.location.href = window.location.href;"/>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
<?php if (!empty($_smarty_tpl->tpl_vars['items']->value)&&$_smarty_tpl->tpl_vars['arItem']->value['diffTables']){?>
                <td valign="top"  width="50%">                   
                    <table width="100%" border="0" cellspacing="1" cellpadding="0" class="list" id="operationTbl">
                        <tr>
                            <td id="headb" align="center" style="width:15px;"></td>
                            <td id="headb" align="center" width="22">Глав</td>
                            <td id="headb" align="center" width="38"></td>
                            <td id="headb" align="center" width="38">Превью</td>
                            <td id="headb" align="left"><?php echo @constant('HEAD_NAME');?>
</td>
                            <td id="headb" align="center" width="38"><?php echo @constant('HEAD_SORT');?>
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
                                <input type="checkbox" class="checkboxes" name="arItems[<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
]" onchange="SelectCheckBox(this)" value="1" />
                            </td>
                            <td align="center">
                                <input type="hidden" name="arItemsId[<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" />
                                <input type="radio" name="default" value="<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['isdefault']==1){?>checked<?php }?> />
                            </td>
                            <td align="center">
<?php if ($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['active']==1){?>
                                <a href="<?php echo ((($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url'])).("&task=publishItem&status=0&itemID=")).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
" title="Publication">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['system_images'];?>
check.png" alt="Publication" title="Publication" />
                                </a>
<?php }else{ ?>
                                <a href="<?php echo ((($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url'])).("&task=publishItem&status=1&itemID=")).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
" title="No Publication">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['system_images'];?>
un_check.png" alt="No Publication" title="No Publication" />
                                </a>
<?php }?>
                            </td>
                            <td align="center" valign="center">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['filename'];?>
" onclick="return parent.hs.expand (this, { })" class="highslide">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['filename'];?>
" align="center" style="max-width:40px; max-height:40px; border:none !important;"/>
                                </a>
                            </td>
                            <td>
                                <input type="text" size="45" class="field" name="arTitle[<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
" />
                            </td>
                            <td align="center">
                                <input class="field_smal" name="arOrder[<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
]" type="text" id="order" value="<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['fileorder'];?>
" style="width:27px;padding-left:0px;text-align:center;" maxlength="4" />
                            </td>
                            <td align="center">
                                <a href="<?php echo ((($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url'])).("&task=deleteItem&itemID=")).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
" onclick="return confirm('Вы уверены что хотите удалить файл?');" title="Delete!">
                                   <img src="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['system_images'];?>
delete.png" alt="Delete!" title="Delete!" />
                                </a>
                            </td>
                        </tr>
<?php endfor; endif; ?>
                </table>
                    
                <table width="100%" border="0" cellspacing="1" cellpadding="0">
                    <tr>
                        <td align="left" width="117">
                            <input type="checkbox" value="0" style="margin-left:6px;" class="checkboxes check_all" onchange="SelectCheckBox(this);"/> Отметить все &nbsp;
                        </td>
                        <td width="155">
                            <div class="dropDown" style="display:none;">
                                C отмеченными
                                <ul>
                                    <li data-val="publish" onclick="checkBoxOperations('publishItems', '1')">
                                        <img src="/images/operation/check.png"/>&nbsp;&nbsp;опубликовать
                                    </li>
                                    <li data-val="unpublish" onclick="checkBoxOperations('publishItems', '0')">
                                        <img src="/images/operation/un_check.png"/>&nbsp;&nbsp;не публиковать
                                    </li>
                                    <li data-val="delete" onclick="checkBoxOperations('deleteItems', '1')">
                                        <img src="/images/operation/delete.png"/>&nbsp;&nbsp;удалить
                                    </li>
                                </ul>
                                <input type="hidden" name="allitems" value=""/>
                            </div>
                        </td>
                        <td align="right">
                            <input name="submit_order" class="buttons" type="submit" value="<?php echo @constant('BUTTON_APPLY');?>
" />
                        </td>
                    </tr>
                </table>
                <table width="100%" border="0" cellspacing="1" cellpadding="0">
                    <tr>
                       <td align="center" width="70%">
                            <?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['total_pages']>1){?>
                                <!-- ++++++++++ Start PAGER ++++++++++++++++++++++++++++++++++++++++++++++++ -->
                                <?php echo $_smarty_tpl->getSubTemplate ('common/pager.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arrPager'=>$_smarty_tpl->tpl_vars['arrPageData']->value['pager'],'page'=>$_smarty_tpl->tpl_vars['arrPageData']->value['page'],'showTitle'=>0,'showFirstLast'=>0,'showPrevNext'=>0), 0);?>

                                <!-- ++++++++++ End PAGER ++++++++++++++++++++++++++++++++++++++++++++++++++ -->
                            <?php }?>
                        </td>
                        <td align="right">
                            Окно:&nbsp;
                            <a href="javascript:void(0)" onclick="window.location.reload();" title="<?php echo @constant('BUTTON_RELOAD');?>
">Обновить</a>&nbsp;
                            <a href="javascript:void(0)" onclick="parent.window.hs.close();" title="<?php echo @constant('BUTTON_EXIT');?>
">Закрыть</a>
                        </td>
                    </tr>
                </table>
            </td>
<?php }?>
        </tr>
    </tbody>
</table>
</form>

<script src="/js/libs/jCrop/jquery.Jcrop.js"></script> 
<script src="/js/libs/imagesloaded/imagesloaded.js"></script>
<link href="/js/libs/jCrop/jquery.Jcrop.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">   
    $(document).ready(function(){ 
        <?php if (!$_smarty_tpl->tpl_vars['arItem']->value['diffTables']){?>
            <?php if (empty($_smarty_tpl->tpl_vars['items']->value)){?>$(ImagesUpload.old_image).html('');<?php }?>
            var data = {};
            if(parent.$('#arCropImagesParams_<?php echo $_smarty_tpl->tpl_vars['arItem']->value['column'];?>
').val().length > 0) {
                data = JSON.parse(parent.$('#arCropImagesParams_<?php echo $_smarty_tpl->tpl_vars['arItem']->value['column'];?>
').val());
                $('#preview').find('img').attr('src', data.path);
                $('#imagePath').val(data.path);
                $('#imageName').val(data.name);         
                $('#submitButton').show();
            }
        <?php }else{ ?>
            var img_count = $('#operationTbl').find('tr').length-1;
            if(img_count<0) img_count = 0;
            $(ImagesUpload.imagesCount).html('загружено изображений: <b>'+img_count+'</b>');
        <?php }?>
        
        if($('#preview').find('img').attr('src').length>0) {          
            $('#preview').find('img').imagesLoaded( function() {
                if(parent.window.hs.getExpander()) parent.window.hs.getExpander().reflow();
                ImagesUpload.prepareImage();
            });
        }
                
        $("#file").change(function() {
            parent.$('#<?php echo $_smarty_tpl->tpl_vars['arItem']->value['column'];?>
_data').html('');
            <?php if (!$_smarty_tpl->tpl_vars['arItem']->value['diffTables']){?>parent.$('#arCropImagesParams_<?php echo $_smarty_tpl->tpl_vars['arItem']->value['column'];?>
').val('');<?php }?>
            $('#ajaxEditForm').submit();
        });
    });
    
    ImagesUpload = {
        preview: $('#preview'),
        image: $('#preview').find('img'),
        coeff: 1,
        crop_w: <?php if (!empty($_smarty_tpl->tpl_vars['arItem']->value['crop_width'])){?><?php echo $_smarty_tpl->tpl_vars['arItem']->value['crop_width'];?>
<?php }else{ ?>0<?php }?>,
        crop_h: <?php if (!empty($_smarty_tpl->tpl_vars['arItem']->value['crop_height'])){?><?php echo $_smarty_tpl->tpl_vars['arItem']->value['crop_height'];?>
<?php }else{ ?>0<?php }?>,
        diffImages: <?php if (!empty($_smarty_tpl->tpl_vars['arItem']->value['diffTables'])){?><?php echo $_smarty_tpl->tpl_vars['arItem']->value['diffTables'];?>
<?php }else{ ?>false<?php }?>,
        new_image: parent.$('#<?php echo $_smarty_tpl->tpl_vars['arItem']->value['column'];?>
_new')||false,
        old_image: parent.$('#<?php echo $_smarty_tpl->tpl_vars['arItem']->value['column'];?>
_old')||false,
        imagesCount: parent.$('#<?php echo $_smarty_tpl->tpl_vars['arItem']->value['column'];?>
_count')||false,
        
        bgW: $('#bg_w'),
        bgH: $('#bg_h'),
        x: $('#x'),
        y: $('#y'),
        w: $('#w'),
        h: $('#h'),
        
        checkCoords: function() {
            var _self = this;
            
            var w = parseInt($(_self.w).val());
            if (w || ($(_self.image).attr('src').length>0 && !w)) 
                return true;
            alert('Вы не выбрали изображение!');
            return false;
        },
            
        updateCoords: function(c) {
            $(ImagesUpload.bgW).val(ImagesUpload.coeff*parseInt($(ImagesUpload.preview).width()));
            $(ImagesUpload.bgH).val(ImagesUpload.coeff*parseInt($(ImagesUpload.preview).height()));

            $(ImagesUpload.x).val(ImagesUpload.coeff*c.x);
            $(ImagesUpload.y).val(ImagesUpload.coeff*c.y);
            $(ImagesUpload.w).val(ImagesUpload.coeff*c.w);
            $(ImagesUpload.h).val(ImagesUpload.coeff*c.h);
        },
        
        prepareImage: function() {
            var _self = this;

            var aspectRatio = _self.crop_w/_self.crop_h; 

            if(_self.crop_w>0 && _self.crop_h>0){
                
                // в сколько раз уменьшилось изображение
                _self.coeff= $(_self.image)[0].naturalWidth/$(_self.image).width();     
                var imgAspectRatio = $(_self.image).width()/$(_self.image).height();

                //в столько же раз уменьшаем рамку
                _self.crop_w = _self.crop_w/_self.coeff;
                _self.crop_h = _self.crop_h/_self.coeff;

                // проверяем влезает ли рамка в блок превью
                if(_self.crop_w>$(_self.preview).width() || _self.crop_h>$(_self.preview).height()) { 
                    // если рамка не влезает то уменьшаем и получаем коеф
                    var crop_ratio;
                    if(_self.crop_w>_self.crop_h) {
                        crop_ratio = _self.crop_w/$(_self.preview).width();       
                        _self.crop_w = $(_self.preview).width();
                        _self.crop_h = _self.crop_h/crop_ratio;
                    } else {
                        crop_ratio = _self.crop_h/$(_self.preview).height();
                        _self.crop_h = $(_self.preview).height();
                        _self.crop_w = _self.crop_w/crop_ratio;
                    }
                    
                    //уменьшаем изображение в столько же раз сколько и рамка уменьшилась
                    $(_self.image).width($(_self.image).width()/crop_ratio);    
                    _self.coeff = _self.coeff*crop_ratio;            
                }
                
                var r = 1; 
                // если ширина больше чем ширина кропинга, то получаем коефф на солько больше
                if($(_self.image).width() > _self.crop_w) {
                    r = $(_self.image).width()/_self.crop_w;
                   $(_self.image).width(_self.crop_w);
                } 
                // если  ширина больше чем ширина кропинга, то получаем коефф на солько больше
                else if($(_self.image).height() > _self.crop_h) {
                    r = $(_self.image).height()/_self.crop_h;
                   $(_self.image).height(_self.crop_h);
                }    
                _self.coeff = _self.coeff*r;
                
                //в столько же раз уменьшаем рамку
                _self.crop_w = _self.crop_w/r;
                _self.crop_h = _self.crop_h/r;
                
                // если пропорции изображения совпадают с пропорциями рамки, то устанавливаем target на изображение
                var setSelect = [];
                if(parent.$('#arCropImagesParams_<?php echo $_smarty_tpl->tpl_vars['arItem']->value['column'];?>
').length>0 && parent.$('#arCropImagesParams_<?php echo $_smarty_tpl->tpl_vars['arItem']->value['column'];?>
').val().length > 0) {
                    var data = JSON.parse(parent.$('#arCropImagesParams_<?php echo $_smarty_tpl->tpl_vars['arItem']->value['column'];?>
').val());
                    if(data) {
                        setSelect = [(data.x/_self.coeff), (data.y/_self.coeff), (data.x/_self.coeff)+(data.w/_self.coeff), (data.y/_self.coeff)+(data.h/_self.coeff)];
                    }
                } else {
                    if(aspectRatio == imgAspectRatio && $(_self.image).width() == $(_self.preview).width()) {
                        setSelect = [0, 0, $(_self.image).width(), $(_self.image).height()];
                    } else {      
                        var x = ($(_self.preview).width()/2) - (_self.crop_w/2);
                        var y = ($(_self.preview).height()/2) - (_self.crop_h/2);
                        setSelect = [x, y, x+_self.crop_w, y+_self.crop_h];
                    }
                }
                
                // инитим кропинг
                $(_self.preview).Jcrop({
                    bgColor: 'white',
                    bgOpacity: .3,
                    aspectRatio: aspectRatio,
                    minSize: [_self.crop_w, _self.crop_h],
                    setSelect: setSelect,
                    onSelect: _self.updateCoords
                });
            }
            // опускаем изображение, если его высота меньше высоты блока превью
            if($(_self.image).height() < $(_self.preview).height()){
               $(_self.image).css('margin-top', ($(_self.preview).height()/2)-($(_self.image).height()/2));
            } 
            $(_self.preview).closest('tr').removeClass('invisible');
        },
                
        submitCrop: function() {
            if(ImagesUpload.checkCoords()) {
                if(!ImagesUpload.diffImages) {
                    var result = {
                        x : $(ImagesUpload.x).val(),
                        y : $(ImagesUpload.y).val(),
                        w : $(ImagesUpload.w).val(),
                        h : $(ImagesUpload.h).val(),

                        path : $('#imagePath').val(),
                        name : $('#imageName').val(),

                        bg_w : $(ImagesUpload.bgW).val(),
                        bg_h : $(ImagesUpload.bgH).val(),

                    };
                    
                    $(ImagesUpload.new_image).html('&nbsp;&nbsp;<a class="highslide" onclick="return parent.hs.expand (this, { })" href="'+result.path+'"><img src="'+result.path+'" height="30" class="left"/></a>&nbsp;&nbsp;'+result.name+' &nbsp;(<b>несохранено</b>) <span style="font-size:14px; cursor:pointer;" onclick="$(this).parent().hide(); $(\'#<?php echo $_smarty_tpl->tpl_vars['arItem']->value['column'];?>
_old\').show(); $(\'#arCropImagesParams_<?php echo $_smarty_tpl->tpl_vars['arItem']->value['column'];?>
\').val(\'\');"><b>X</b></span>');
                    $(ImagesUpload.new_image).show();
                    $(ImagesUpload.old_image).hide();
                    parent.$('#arCropImagesParams_<?php echo $_smarty_tpl->tpl_vars['arItem']->value['column'];?>
').val(JSON.stringify(result));
                    parent.window.hs.close();
                } else {
                    $('#crop').val('1');
                    return true;
                }
            }
            return false;
        }
        
    }
   
    function checkBoxOperations(task, value){
         var inputs = $('#operationTbl').find("input[type=checkbox]:checked:not(#checkAll)"); 
         if(inputs.length > 0) {
             var data = '';
             $.each( inputs, function() {
                 data += '&'+[$(this).attr("name")]+'='+value;
             });
             window.location = "<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['current_url'];?>
"+"<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['filter_url'];?>
"+"&task="+task+data;
         }
     }
</script>
<?php }} ?>