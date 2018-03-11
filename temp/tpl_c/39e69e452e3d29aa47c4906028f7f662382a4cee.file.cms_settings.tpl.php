<?php /* Smarty version Smarty-3.1.14, created on 2018-02-13 21:07:15
         compiled from "tpl/backend/weblife/module/cms_settings.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20744555635a0b4464d0b468-99917358%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '39e69e452e3d29aa47c4906028f7f662382a4cee' => 
    array (
      0 => 'tpl/backend/weblife/module/cms_settings.tpl',
      1 => 1517155751,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20744555635a0b4464d0b468-99917358',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a0b44654d6d35_50917211',
  'variables' => 
  array (
    'arrPageData' => 0,
    'item' => 0,
    'arItem' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a0b44654d6d35_50917211')) {function content_5a0b44654d6d35_50917211($_smarty_tpl) {?><div id="sectionTitle">Сверх секретные настройки</div>
<div id="messages" class="<?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['errors'])){?>error<?php }elseif(!empty($_smarty_tpl->tpl_vars['arrPageData']->value['messages'])){?>info<?php }else{ ?>hidden_block<?php }?>">
<?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['errors'])){?>
    <?php echo implode($_smarty_tpl->tpl_vars['arrPageData']->value['errors'],'<br/>');?>

<?php }elseif(!empty($_smarty_tpl->tpl_vars['arrPageData']->value['messages'])){?>
    <?php echo implode($_smarty_tpl->tpl_vars['arrPageData']->value['messages'],'<br/>');?>

<?php }?>
</div>

<script type="text/javascript">
<!--
    function formCheck(form){
        if($('.error', form).length) {
            return false;
        }
        return true;
    }
//-->
</script>

<div id="right_block">
<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['current_url'];?>
" name="settingsForm" onSubmit="return formCheck(this);">    
    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['tab'];?>
" name="tab" id="currentTab"/>
    <div class="tabsContainer">
        <ul class="nav">
            <li><a href="#main" data-target="main" <?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['tab']=='main'){?>class="active"<?php }?>>Настройки базы</a></li>
            <li><a href="#images" data-target="images" <?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['tab']=='images'){?>class="active"<?php }?>>Настройки изображений</a></li>
            <li><a href="#modules" data-target="modules" <?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['tab']=='modules'){?>class="active"<?php }?>>Управление модулями</a></li>
            <li><a href="#users" data-target="users" <?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['tab']=='users'){?>class="active"<?php }?>>Управление доступами</a></li>
        </ul>
        <div class="tab_line"></div>
        <ul class="tabs">
            <li <?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['tab']=='main'){?>class="active"<?php }?> id="tab_main">
                <table border="1" cellspacing="0" cellpadding="1" class="list">       
                     <tr>
                         <td id="headb" align="left" width="175">Операции с базой</td>
                         <td  class="padding">
                             <a href="/admin/?module=mysqldumper"><?php echo @constant('TOPLINK_MYSQLDUMPER');?>
</a> |
                             <a href="javascript:void(0)" onclick="if(window.confirm('<?php echo @constant('LABEL_QUESTION_TO_DO');?>
?')) {window.location='<?php echo ($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&task=repairDBTables");?>
'}; return false;" />
                             <?php echo @constant('LABEL_REPAIR_DB_TABLES');?>

                             </a> |
                             <a href="javascript:void(0)" onclick="if(window.confirm('<?php echo @constant('LABEL_QUESTION_TO_DO');?>
?')) {window.location='<?php echo ($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&task=optimizeDBTables");?>
'}; return false;" />
                             <?php echo @constant('LABEL_OPTIMIZE_DB_TABLES');?>

                             </a>
                         </td>
                         <td class="buttons_row" valign="top" width="144">
                             <div class="buttons_list">
                                 <input name='submit' class='buttons' type='submit' value='<?php echo @constant('BUTTON_SAVE');?>
' onclick="return formCheck(this.form);" />
                             </div>
                         </td>
                     </tr>

                     <tr>
                         <td id="headb" align="left" width="175">Операции с шаблонами</td>
                         <td  class="padding">
                             <?php if (!@constant('TPL_BACKEND_FORSE_COMPILE')||!@constant('TPL_FRONTEND_FORSE_COMPILE')){?>
                                 <a href="javascript:void(0)" onclick="if(window.confirm('<?php echo @constant('LABEL_QUESTION_TO_DO');?>
?')) {window.location='<?php echo ($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&task=clearTemplates");?>
'}; return false;">
                                     <?php echo @constant('LABEL_CLEAR_TEMPLATES');?>

                                 </a> 
                             <?php }?>

                             <?php if (@constant('TPL_BACKEND_CACHING')||@constant('TPL_FRONTEND_CACHING')){?>
                                  | <a href="javascript:void(0)" onclick="if(window.confirm('<?php echo @constant('LABEL_QUESTION_TO_DO');?>
?')) {window.location='<?php echo ($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&task=clearCache");?>
'}; return false;" />
                                 <?php echo @constant('LABEL_CLEAR_CASHING');?>

                                 </a> 
                             <?php }?>
                         </td>
                         <td class="buttons_row" valign="top" width="144"></td>
                     </tr>

                     <tr>
                         <td id="headb" align="left" valign="top" width="175">SQL запрос</td>
                         <td  class="padding">
                             <textarea class="field" style="margin:5px 0; height:200px; resize:vertical;" rows="10" name="sql_query"><?php if (isset($_smarty_tpl->tpl_vars['item']->value['sql_query'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['sql_query'];?>
<?php }?></textarea>
                         </td>
                         <td class="buttons_row" valign="top" width="144"></td>
                     </tr>                     
                 </table>
            </li>

            <li <?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['tab']=='images'){?>class="active"<?php }?> id="tab_images">
                <table border="1" cellspacing="0" cellpadding="1" class="list">       
                     <tr>
                         <td colspan="2">
                            <?php if (!empty($_smarty_tpl->tpl_vars['item']->value['arImgModules'])){?>
                                <div class="modules">
                                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['item']->value['arImgModules']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                        <div id="module_<?php echo $_smarty_tpl->tpl_vars['item']->value['arImgModules'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['module'];?>
" class="module">
                                            <h3 class="left">Модуль "<?php echo $_smarty_tpl->tpl_vars['item']->value['arImgModules'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
"</h3> 
                                            <input type="button" class="buttons right" data-module='<?php echo $_smarty_tpl->tpl_vars['item']->value['arImgModules'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['module'];?>
' value="Добавить изображение" onclick="addImage(this);"/><br/>
                                            <div class="clear"></div>
                                            <hr style="border-bottom: 1px solid #B6B6B6;"><br/>
                                            
                                            <div class="images">
                                                <?php if (!empty($_smarty_tpl->tpl_vars['item']->value['arImgModules'][$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['i']['index']]['arImages'])){?>
                                                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['j'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['name'] = 'j';
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['item']->value['arImgModules'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['arImages']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                                        <?php echo $_smarty_tpl->getSubTemplate ("common/module_images_settings.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('index'=>$_smarty_tpl->getVariable('smarty')->value['section']['j']['index'],'aliases'=>$_smarty_tpl->tpl_vars['item']->value['arImgAliases'],'module'=>$_smarty_tpl->tpl_vars['item']->value['arImgModules'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['module'],'arImages'=>$_smarty_tpl->tpl_vars['item']->value['arImgModules'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['arImages'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]), 0);?>

                                                    <?php endfor; endif; ?>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <?php endfor; endif; ?>
                                </div>    
                            <?php }?>
                        </td>
                        <td class="buttons_row" valign="top" width="144">
                             <div class="buttons_list">
                                 <input name='submit' class='buttons' type='submit' value='<?php echo @constant('BUTTON_SAVE');?>
' 
                                        onclick="return formCheck(this.form);" />
                             </div>
                         </td>
                    </tr>
                </table>
            </li>
            <li id="tab_modules" <?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['tab']=='modules'){?>class="active"<?php }?>>
                <table border="1" cellspacing="0" cellpadding="1" class="list">
                    <tr>
                        <td>
                             <table border="1" cellspacing="0" cellpadding="1" class="list user"> 
                                 <tr>
                                     <td align="left" id="headb">модуль</td>
                                     <td align="left" id="headb">название</td>
                                     <td align="left" id="headb">краткое название</td>
                                     <td align="center" id="headb" width="40">сеогруппа</td>
                                     <td align="center" id="headb" width="30">изображение</td>
                                     <td align="center" id="headb" width="30">доступ</td>
                                     <td align="center" id="headb" width="30">история</td>
                                     <td align="center" id="headb" width="30">меню</td>
                                     <td align="center" id="headb" width="30">сорт</td>
                                </tr>
                                <?php if (!empty($_smarty_tpl->tpl_vars['item']->value['arModulesParams'])){?>
                                    <?php  $_smarty_tpl->tpl_vars['arItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['arItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['arModulesParams']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['arItem']->key => $_smarty_tpl->tpl_vars['arItem']->value){
$_smarty_tpl->tpl_vars['arItem']->_loop = true;
?>
                                <tr> 
                                    <td align="left"><?php echo $_smarty_tpl->tpl_vars['arItem']->value['module'];?>
</td>
                                    <td align="left"><input size="30" type="text" name="arModules[<?php echo $_smarty_tpl->tpl_vars['arItem']->value['module'];?>
][title]" value="<?php echo $_smarty_tpl->tpl_vars['arItem']->value['title'];?>
"/></td>
                                    <td align="left"><input size="30" type="text" name="arModules[<?php echo $_smarty_tpl->tpl_vars['arItem']->value['module'];?>
][short_title]" value="<?php echo $_smarty_tpl->tpl_vars['arItem']->value['short_title'];?>
"/></td>
                                    <td align="center">
                                        <input type="checkbox" name="arModules[<?php echo $_smarty_tpl->tpl_vars['arItem']->value['module'];?>
][seogroup]" <?php if ($_smarty_tpl->tpl_vars['arItem']->value['seogroup']){?>checked<?php }?> value="1" class="left ml-10" onclick="toogleHiddenBlock(this, this.checked);"/>
                                        <div class="left ml-10 relative<?php if (!$_smarty_tpl->tpl_vars['arItem']->value['seogroup']){?> hidden_block<?php }?>">
                                            <a href="javascript:void(0)" onclick="toogleHiddenBlock(this, $(this).next('div').hasClass('hidden_block'), $(this).parent().find('input'));"><img src="/images/operation/edit.png" width="14" height="14"/></a>
                                            <div class="hidden_block module_params">
                                                <input type="text" name="arModules[<?php echo $_smarty_tpl->tpl_vars['arItem']->value['module'];?>
][seotable]" value="<?php echo $_smarty_tpl->tpl_vars['arItem']->value['seotable'];?>
" style="width:97%" onchange="checkField(this);"/>
                                                <a class="close" href="javascript:void(0)" onclick="if(checkField($(this).prev('input'))) $(this).parent().addClass('hidden_block');"><img src="/images/operation/delete.png"/></a>
                                            </div>
                                        </div>
                                    </td>
                                    <td align="center"><input type="checkbox" name="arModules[<?php echo $_smarty_tpl->tpl_vars['arItem']->value['module'];?>
][images]" <?php if ($_smarty_tpl->tpl_vars['arItem']->value['images']){?>checked<?php }?> value="1"/></td>
                                    <td align="center"><input type="checkbox" name="arModules[<?php echo $_smarty_tpl->tpl_vars['arItem']->value['module'];?>
][access]" <?php if ($_smarty_tpl->tpl_vars['arItem']->value['access']){?>checked<?php }?> value="1"/></td>
                                    <td align="center"><input type="checkbox" name="arModules[<?php echo $_smarty_tpl->tpl_vars['arItem']->value['module'];?>
][history]" <?php if ($_smarty_tpl->tpl_vars['arItem']->value['history']){?>checked<?php }?> value="1"/></td>
                                    <td align="center"><input type="checkbox" name="arModules[<?php echo $_smarty_tpl->tpl_vars['arItem']->value['module'];?>
][menu]" <?php if ($_smarty_tpl->tpl_vars['arItem']->value['menu']){?>checked<?php }?> value="1"/></td>
                                    <td align="center"><input type="text" name="arModules[<?php echo $_smarty_tpl->tpl_vars['arItem']->value['module'];?>
][order]" class="order" size="1" value="<?php echo $_smarty_tpl->tpl_vars['arItem']->value['order'];?>
"/></td>
                                </tr>
                                    <?php } ?>
                                <?php }?>
                            </table>
                        </td>
                        <td class="buttons_row" valign="top" width="144">
                            <div class="buttons_list">
                                <input name='submit_params' class='buttons' type='submit' value='<?php echo @constant('BUTTON_SAVE');?>
' 
                                       onclick="return formCheck(this.form);" />
                            </div>
                        </td>
                    </tr>
                </table>
            </li>
            <li id="tab_users" <?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['tab']=='users'){?>class="active"<?php }?>>
                
                <?php if (!empty($_smarty_tpl->tpl_vars['item']->value['arrUserTypes'])){?>
                    <div class="modules">
                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['item']->value['arrUserTypes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                        <div  id="group_<?php echo $_smarty_tpl->tpl_vars['item']->value['arrUserTypes'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" class="module">
                            <h3>Группа "<?php echo $_smarty_tpl->tpl_vars['item']->value['arrUserTypes'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['name_ru'];?>
"</h3>
                            <hr style="border-bottom: 1px solid #B6B6B6;"><br/>
                            <strong>Настройки доступов для</strong> &nbsp;
                            <select class="user" data-action='update' data-gid="<?php echo $_smarty_tpl->tpl_vars['item']->value['arrUserTypes'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" onchange="getAccessSettings(this);">
                                <option value="0" >всей группы</option>
                                <?php if (!empty($_smarty_tpl->tpl_vars['item']->value['arrUserTypes'][$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['i']['index']]['users'])){?>
                                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['j'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['name'] = 'j';
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['item']->value['arrUserTypes'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['users']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['arrUserTypes'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['users'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['arrUserTypes'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['users'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['item']->value['arrUserTypes'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['users'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['surname'];?>
</option>
                                    <?php endfor; endif; ?>
                                <?php }?>
                            </select>
                            &nbsp; <label><input type="checkbox" class="checkboxes check_all" onchange="SelectCheckBox(this, '#group_<?php echo $_smarty_tpl->tpl_vars['item']->value['arrUserTypes'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
');" /> отметить все</label><br/><br/>
                            <div class="messages"></div>
                            <div class="load"><img src="/images/loader.gif"/></div>
                            <div class="settings">
                                <?php echo $_smarty_tpl->getSubTemplate ("ajax/access_settings.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arModules'=>$_smarty_tpl->tpl_vars['item']->value['arModules'],'gid'=>$_smarty_tpl->tpl_vars['item']->value['arrUserTypes'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'],'availableModules'=>$_smarty_tpl->tpl_vars['item']->value['arrUserTypes'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['modules']), 0);?>

                            </div>
                        </div>
                    <?php endfor; endif; ?>
                    </div>
                <?php }?>
                
            </li>
        </ul>
    </div>
</form>
</div>
<script type="text/javascript">   
    //####################### settings functions ###############################
    function toogleHiddenBlock(el, condition, input) {
        el = $(el).next('div');
        if(condition) {
            $(el).removeClass('hidden_block');
        } else {
            if($(input).length) {
                if(checkField($(input))) {
                    $(el).addClass('hidden_block');
                }
            } else $(el).addClass('hidden_block');
        }
    }
    
    function checkField(el) {
        if(!$(el).val().length) {
            $(el).addClass('error'); 
            return false;
        } else {
            $(el).removeClass('error');
            return true;
        }
    }
    
    function getAccessSettings(item) {
        var gid = $(item).attr('data-gid');
        var action = $(item).attr('data-action');
        var uid = $('#group_'+gid).find('.user').val();
        
        var messages = $('#group_'+gid).find('.messages');
        var settings = $('#group_'+gid).find('.settings');        
        var loader = $('#group_'+gid).find('.load');
        $(loader).width($('#group_'+gid).find('.settings').width());
        $(loader).height($('#group_'+gid).find('.settings').height());
        $(loader).addClass('active');
        
        var modules = [];
        $.each($(settings).find('input:checked'), function(){
            modules.push($(this).val());
        });
        
        $.ajax({
            url: '/interactive/ajax.php?zone=admin&action=getAccessSettings',
            type: 'GET',
            dataType: 'json',
            data: {
                'gid': gid,
                'option' : action,
                'uid': uid,
                'modules' : modules.join(',')
            },
            success: function(json) {
                if(json) {
                    if(json.messages || json.errors){
                        if (json.messages){
                            $(messages).html(json.messages);
                            $(messages).addClass('message');
                        } else if(json.errors){
                            $(messages).html(json.errors);
                            $(messages).addClass('error');
                        }
                        $(messages).show();
                        setTimeout(function () {$(messages).fadeOut()}, 1000);
                    }
                    if(json.settings) $(settings).html(json.settings);
                    var inputs_count = $(".checkboxes:not(.check_all)", $('#group_'+gid)).length;
                    var checked_inputs_count = $(".checkboxes:checked:not(.check_all)", $('#group_'+gid)).length;
                    if(inputs_count>0){
                       $(".checkboxes.check_all", $('#group_'+gid)).attr('checked', (inputs_count == checked_inputs_count) ? true : false);
                    }
                }
            }
        });     
        setTimeout(function () {$(loader).removeClass('active')}, 200);
    }
    
    function SelectCheckBox(cb, container){  
        if(typeof container == 'undefind')
            container = 'document';
        if($(cb).hasClass('check_all')) {
            $(".checkboxes", container).prop('checked', $(cb).prop('checked'));
            $(".checkboxes:not('.check_all'):not('.auth')", container).prop('disabled', $(cb).prop('checked') ? false : true);
        } else if($(cb).hasClass('auth')) {
            if(!$(cb).prop('checked'))
                $(".checkboxes", container).prop('checked', false);
            $(".checkboxes:not('.check_all'):not('.auth')", container).prop('disabled', $(cb).prop('checked') ? false : true);
        } else {
            var inputs_count = $(".checkboxes:not(.check_all)", container).length;
            var checked_inputs_count = $(".checkboxes:checked:not(.check_all)", container).length;
            if(inputs_count>0){
               $(".checkboxes.check_all", container).attr('checked', (inputs_count == checked_inputs_count) ? true : false);
            }
        }
    }
    
    
    //############ images functions ##########################################
    function recalcRatio(input) {
        var width = parseInt($(input).closest('table').find('.crop.width').val());
        var height = parseInt($(input).closest('table').find('.crop.height').val());
        var inputval = isNumber($(input).val()) ? parseInt($(input).val()) : 0;
        
        if(width && height && inputval){
            if($(input).hasClass('width')){
                if(inputval>width) {
                    $(input).val(width);
                    inputval = width;
                }
                $(input).closest('tr').find('.height').val(Math.round(height*inputval/width).toFixed());    
            } else if($(input).hasClass('height'))  {
                if(inputval>height) {
                    $(input).val(height);
                    inputval = height;
                }
                $(input).closest('tr').find('.width').val(Math.round(width*inputval/height).toFixed());
            }  
        }
    }
       
    function removeImage(item) {
        $(item).closest('.image').remove();
    }
    function addImage(item) {
        var module = $(item).attr('data-module');
        var index  = $(item).parent().find('.images').find('.image').length;
        
        $.ajax({
            url: '/interactive/ajax.php?zone=admin&action=getImgSettings',
            type: 'GET',
            dataType: 'json',
            data: {
                'module': module,
                'index' : index,
            },
            success: function(json) {
                if(json && json.image) {
                    $(item).parent().find('.images').append(json.image);
                }
            }
        });   
    }
    
</script><?php }} ?>