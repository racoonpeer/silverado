<?php /* Smarty version Smarty-3.1.14, created on 2017-10-08 19:21:05
         compiled from "tpl/backend/weblife/common/attach_files.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32754649159ac6fd7cc7188-58103207%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a378360d695cb8d8f7f3f08393eaa5d7cc952523' => 
    array (
      0 => 'tpl/backend/weblife/common/attach_files.tpl',
      1 => 1507479412,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32754649159ac6fd7cc7188-58103207',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59ac6fd860e161_83061054',
  'variables' => 
  array (
    'attachFile' => 0,
    'item' => 0,
    'arrPageData' => 0,
    'attachVideo' => 0,
    'attachImages' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ac6fd860e161_83061054')) {function content_59ac6fd860e161_83061054($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['attachFile']->value)&&$_smarty_tpl->tpl_vars['attachFile']->value){?>
<tr>
    <td id="headb" align="left"><?php echo @constant('HEAD_ATTACH_FILE');?>
</td>
    <td> 
        <table border="0" cellspacing="0" cellpadding="0" class="list">
            <tr onclick="toggleBox($(this).find('a.expand_link'), 'toogleFileBox');">
                <td align="center" valign="middle">
                    <a class="expand_link up" title="<?php echo @constant('HEAD_SHOW_HIDE');?>
"  href="javascript:void(0);"></a>
                </td>
            </tr>
        </table>

        <table style="margin-bottom:5px;" width="100%" border="0" cellspacing="0" cellpadding="0" class="list" id="toogleFileBox">
            <tr>
                <td width="85%">
                    <input name="filename" type="file"<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['filename'])){?> onchange="if(this.value.length){ $('#filename_delete').attr({checked:'true', readonly:'true'});};"<?php }?> />
                    <?php if (!empty($_smarty_tpl->tpl_vars['item']->value['filename'])){?><?php echo @constant('HEAD_FILE');?>
: <a href="<?php echo ($_smarty_tpl->tpl_vars['arrPageData']->value['files_url']).($_smarty_tpl->tpl_vars['item']->value['filename']);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['item']->value['filename'];?>
</a><?php }?>
                </td>
                <td align="center">
                    <input id="filename_delete" name="filename_delete" type="checkbox" value="1"<?php if (empty($_smarty_tpl->tpl_vars['item']->value['filename'])){?> disabled<?php }?> onclick="if($(this).attr('readonly')){return false;}" /> <?php echo @constant('HEAD_DELETE');?>

                </td>
                <td align="center">&nbsp;</td>
            </tr>
        </table>
    </td>
    <td class="buttons_row"></td>
</tr>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['attachVideo']->value)&&$_smarty_tpl->tpl_vars['attachVideo']->value){?>
<tr>
    <td id="headb" align="left"><?php echo @constant('HEAD_ATTACH_FILE');?>
</td>
    <td> 
        <table width="100%" border="0" cellspacing="1" cellpadding="0" class="list" id="toogleFileBox">
            <tr>
                <td id="head"><?php echo @constant('HEAD_ATTACH_FILE');?>
</td>
                <td id="head" align="center"><?php echo @constant('HEAD_DELETE');?>
</td>
            </tr>
            <tr>
                <td width="95%">
                    <input name="filename" type="file"<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['filename'])){?> onchange="if(this.value.length){ $('#filename_delete').attr({checked:'true', readonly:'true'});};"<?php }?> />
                    <?php if (!empty($_smarty_tpl->tpl_vars['item']->value['filename'])){?><?php echo @constant('HEAD_FILE');?>
: 
                    <a href="/flash/JWPlayer/player.swf" onclick="return hs.htmlExpand(this,
                    {
                        useBox:'true',
<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['fileinfo']['highslide'])){?>
                        width: <?php echo $_smarty_tpl->tpl_vars['item']->value['fileinfo']['highslide']['width'];?>
,
                        height: <?php echo $_smarty_tpl->tpl_vars['item']->value['fileinfo']['highslide']['height'];?>
,
                        objectWidth: <?php echo $_smarty_tpl->tpl_vars['item']->value['fileinfo']['highslide']['resolution_x'];?>
,
                        objectHeight: <?php echo $_smarty_tpl->tpl_vars['item']->value['fileinfo']['highslide']['resolution_y'];?>
,
<?php }else{ ?>
                        objectWidth: 640,
                        objectHeight: 480,    
<?php }?>
                        objectType: 'swf',
                        swfOptions: {
                            version: '9.0.0',
                            expressInstallSwfurl: '/flash/expressInstall.swf',
                            flashvars: { file: '&file=<?php echo ($_smarty_tpl->tpl_vars['arrPageData']->value['files_url']).($_smarty_tpl->tpl_vars['item']->value['filename']);?>
&backcolor=000000&frontcolor=ffffff&lightcolor=555555&screencolor=000000&screencolor=000000', stretching:'fill',  autostart:<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['image'])){?>'false', image:'<?php echo ($_smarty_tpl->tpl_vars['arrPageData']->value['files_url']).($_smarty_tpl->tpl_vars['item']->value['image']);?>
'<?php }else{ ?>'true'<?php }?> },
                            params: { allowscriptaccess: 'always', allowfullscreen: 'true', quality: 'high' },
                            attributes: { id:'player<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
', name:'player<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
' }
                        },
                        dimmingOpacity: 0.75,
                        dimmingDuration: 75,
                        padToMinWidth: 'false',
                        preserveContent: 'false',
                        allowSizeReduction: 'false',
                        maincontentText: '<?php echo @constant('LABEL_UPGRADE_FLASH');?>
'
                    } );"  class="highslide" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['filename'];?>
</a><?php }?>
            </td>
                <td  align="center">
                    <input id="filename_delete" name="filename_delete" type="checkbox" value="1"<?php if (empty($_smarty_tpl->tpl_vars['item']->value['filename'])){?> disabled<?php }?> onclick="if($(this).attr('readonly')){return false;}" />
                </td>
                <td  align="center">&nbsp;</td>
            </tr>
        </table>
    </td>
    <td class="buttons_row"></td>
</tr> 
<?php }?>

<?php if (($_smarty_tpl->tpl_vars['arrPageData']->value['task']=='editItem'||$_smarty_tpl->tpl_vars['arrPageData']->value['task']=='addItem')&&isset($_smarty_tpl->tpl_vars['attachImages']->value)&&$_smarty_tpl->tpl_vars['attachImages']->value&&!empty($_smarty_tpl->tpl_vars['item']->value['arImagesSettings'])){?>
    <tr id="imageBlock">
        <td id="headb" align="left"><?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['module']=='catalog'){?>Фото товара<?php }else{ ?>Изображение<?php }?></td>
        <td>
            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['s'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['s']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['s']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['item']->value['arImagesSettings']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['s']['name'] = 's';
$_smarty_tpl->tpl_vars['smarty']->value['section']['s']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['s']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['s']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['s']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['s']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['s']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['s']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['s']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['s']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['s']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['s']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['s']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['s']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['s']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['s']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['s']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['s']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['s']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['s']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['s']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['s']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['s']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['s']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['s']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['s']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['s']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['s']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['s']['total']);
?>
                <?php if (($_smarty_tpl->tpl_vars['arrPageData']->value['task']=='addItem'&&!$_smarty_tpl->tpl_vars['item']->value['arImagesSettings'][$_smarty_tpl->getVariable('smarty')->value['section']['s']['index']]['ftable']||$_smarty_tpl->tpl_vars['item']->value['arImagesSettings'][$_smarty_tpl->getVariable('smarty')->value['section']['s']['index']]['ftable']==$_smarty_tpl->tpl_vars['item']->value['arImagesSettings'][$_smarty_tpl->getVariable('smarty')->value['section']['s']['index']]['ptable'])||$_smarty_tpl->tpl_vars['arrPageData']->value['task']=='editItem'){?>
                <a class="buttons left" 
                   href="/admin.php?module=images_uploadify&ajax=1&pmodule=<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['module'];?>
&pid=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
&type=<?php echo $_smarty_tpl->tpl_vars['item']->value['arImagesSettings'][$_smarty_tpl->getVariable('smarty')->value['section']['s']['index']]['column'];?>
" 
                   onclick="return hs.htmlExpand(this, { headingText:'Управление файлами', objectType:'iframe', preserveContent: false, width:<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['arImagesSettings'][$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['s']['index']]['ftable'])){?>1024<?php }else{ ?>550<?php }?> } );">
                    <?php echo $_smarty_tpl->tpl_vars['item']->value['arImagesSettings'][$_smarty_tpl->getVariable('smarty')->value['section']['s']['index']]['title'];?>

                </a>
                <?php if (empty($_smarty_tpl->tpl_vars['item']->value['arImagesSettings'][$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['s']['index']]['ftable'])){?>
                    <input type="hidden" id="arCropImagesParams_<?php echo $_smarty_tpl->tpl_vars['item']->value['arImagesSettings'][$_smarty_tpl->getVariable('smarty')->value['section']['s']['index']]['column'];?>
" name="imagesParams[<?php echo $_smarty_tpl->tpl_vars['item']->value['arImagesSettings'][$_smarty_tpl->getVariable('smarty')->value['section']['s']['index']]['column'];?>
]" value=""/>
                    <div class="left" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['arImagesSettings'][$_smarty_tpl->getVariable('smarty')->value['section']['s']['index']]['column'];?>
_new" style="margin-left:10px; margin-top:4px; line-height:30px"></div>
                    <div class="left" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['arImagesSettings'][$_smarty_tpl->getVariable('smarty')->value['section']['s']['index']]['column'];?>
_old" style="margin-left:10px; margin-top:4px; line-height:30px">
                        <?php if (!empty($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['item']->value['arImagesSettings'][$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['s']['index']]['column']])){?>
                            &nbsp;&nbsp;
                            <a class="highslide" onclick="return parent.hs.expand (this, { })" href="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['files_url'];?>
<?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['item']->value['arImagesSettings'][$_smarty_tpl->getVariable('smarty')->value['section']['s']['index']]['column']];?>
">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['files_url'];?>
<?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['item']->value['arImagesSettings'][$_smarty_tpl->getVariable('smarty')->value['section']['s']['index']]['column']];?>
" height="30" class="left"/>
                            </a>
                            &nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['item']->value['arImagesSettings'][$_smarty_tpl->getVariable('smarty')->value['section']['s']['index']]['column']];?>

                        <?php }?>
                    </div>
                <?php }else{ ?>
                    <div class="left" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['arImagesSettings'][$_smarty_tpl->getVariable('smarty')->value['section']['s']['index']]['column'];?>
_count" style="margin-left:10px; margin-top:4px; line-height:30px">загружено изображений: <b><?php echo $_smarty_tpl->tpl_vars['item']->value['imagesCount'];?>
</b> </div>
                <?php }?>
                <div class="clear"></div>
                <?php }?>
            <?php endfor; endif; ?>
        </td>
        <td class="buttons_row"></td>
    </tr>
<?php }?><?php }} ?>