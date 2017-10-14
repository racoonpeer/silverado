<?php /* Smarty version Smarty-3.1.14, created on 2017-10-07 22:44:17
         compiled from "tpl/backend/weblife/module/banners.tpl" */ ?>
<?php /*%%SmartyHeaderCode:207148394159d92e91c472c0-76789319%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc547a91631d3ec6cdd47a86ea524e6570f1d6c7' => 
    array (
      0 => 'tpl/backend/weblife/module/banners.tpl',
      1 => 1466018023,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '207148394159d92e91c472c0-76789319',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arrPageData' => 0,
    'item' => 0,
    'categoryTree' => 0,
    'iKey' => 0,
    'iItem' => 0,
    'Banners' => 0,
    'items' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59d92e92a48089_52834293',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59d92e92a48089_52834293')) {function content_59d92e92a48089_52834293($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ('common/module_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>@constant('BANNERS'),'creat_title'=>@constant('ADMIN_CREATING_NEW_BANNER'),'edit_title'=>@constant('ADMIN_EDIT_BANNER')), 0);?>



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
            <li><a href="javascript:void(0);" data-target="settings">Настройки</a></li>
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
                        <td id="headb" align="left"><?php echo @constant('HEAD_TITLE_REDIRECT');?>
</td>
                        <td>    
                            <table border="0" cellspacing="0" cellpadding="0" class="list">
                                <tr>
                                    <td align="left"><?php echo @constant('HEAD_REDIRECT_LINK');?>
</td>
                                    <td align="center">или</td>
                                    <td align="center"><?php echo @constant('HEAD_EXTERNAL_LINK');?>
</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="redirectid" class="field" <?php if (!empty($_smarty_tpl->tpl_vars['item']->value['redirecturl'])){?> disabled<?php }?>>
                                            <option value="">- - <?php echo @constant('HEAD_SELECT_REDIRECT_LINK');?>
 - -</option>
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
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
"
                                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['redirectid']==$_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']){?>  selected<?php }?>
                                                    <?php if ($_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']==$_smarty_tpl->tpl_vars['item']->value['id']){?> disabled<?php }?>>
                                                <?php echo $_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['margin'];?>

                                                <?php echo $_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
 &nbsp; 
                                                ( <?php if ($_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['active']==0){?><?php echo @constant('HEAD_INACTIVE');?>
, <?php }?>
                                                  <?php echo mb_strtolower($_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['menutitle'], 'UTF-8');?>
 ) &nbsp; 
                                            </option>
<?php if (!empty($_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['i']['index']]['childrens'])){?>
<!-- ++++++++++ Start Tree Childrens +++++++++++++++++++++++++++++++++++++++ -->
<?php echo $_smarty_tpl->getSubTemplate ('common/depends_tree_childrens.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('itemID'=>$_smarty_tpl->tpl_vars['item']->value['id'],'dependID'=>$_smarty_tpl->tpl_vars['item']->value['redirectid'],'arrChildrens'=>$_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['childrens']), 0);?>

<!-- ++++++++++ End Tree Childrens +++++++++++++++++++++++++++++++++++++++++ -->
<?php }?>
<?php endfor; endif; ?>
                                        </select>
                                    </td>
                                    <td align="center">
                                        <input id="redirectype" name="redirectype" 
                                               type="checkbox" value="1" class="field"
                                               onclick="manageSelections(this, this.form.redirectid, this.form.redirecturl);"
                                               <?php if (!empty($_smarty_tpl->tpl_vars['item']->value['redirecturl'])){?> checked<?php }?> />
                                   </td>
                                   <td align="center">
                                        <input id="redirecturl" name="redirecturl" type="text" size="70"
                                               value="<?php echo $_smarty_tpl->tpl_vars['item']->value['redirecturl'];?>
"  class="field"
                                               <?php if (empty($_smarty_tpl->tpl_vars['item']->value['redirecturl'])){?> disabled<?php }?> />
                                   </td>
                                </tr>
                            </table>
                        </td>
                        <td class="buttons_row"></td>
                    </tr>
                    <tr>
                        <td id="headb" align="left"><?php echo @constant('HEAD_POSITION');?>
</td>
                        <td>
                            <table width="100%" border="0" cellspacing="1" cellpadding="0" class="list">
                                <tr>
                                    <td id="head" align="left"><?php echo @constant('HEAD_POSITION');?>
 <font style="color:red">*</font></td>
                                    <td id="head" align="left"><?php echo @constant('HEAD_MODULE');?>
 <font style="color:red">*</font></td>
                                    <td id="head" align="left"><?php echo @constant('HEAD_TARGET');?>
</td>
                                </tr>
                                <tr>
                                    <td align="left">
                                        <select name="position" class="field">
<?php  $_smarty_tpl->tpl_vars['iItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['iItem']->_loop = false;
 $_smarty_tpl->tpl_vars['iKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arrPageData']->value['arPositions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['iItem']->key => $_smarty_tpl->tpl_vars['iItem']->value){
$_smarty_tpl->tpl_vars['iItem']->_loop = true;
 $_smarty_tpl->tpl_vars['iKey']->value = $_smarty_tpl->tpl_vars['iItem']->key;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['iKey']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['item']->value['position']==$_smarty_tpl->tpl_vars['iKey']->value||(empty($_smarty_tpl->tpl_vars['item']->value['position'])&&$_smarty_tpl->tpl_vars['arrPageData']->value['posid']==$_smarty_tpl->tpl_vars['iKey']->value)){?>  selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['iItem']->value;?>
</option>
<?php } ?>
                                        </select>
                                    </td>
                                    <td align="left">
                                        <select name="module" class="field" onchange="moduleManager(this.value);">
<?php  $_smarty_tpl->tpl_vars['iItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['iItem']->_loop = false;
 $_smarty_tpl->tpl_vars['iKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arrPageData']->value['arModules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['iItem']->key => $_smarty_tpl->tpl_vars['iItem']->value){
$_smarty_tpl->tpl_vars['iItem']->_loop = true;
 $_smarty_tpl->tpl_vars['iKey']->value = $_smarty_tpl->tpl_vars['iItem']->key;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['iKey']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['item']->value['module']==$_smarty_tpl->tpl_vars['iKey']->value||(empty($_smarty_tpl->tpl_vars['item']->value['module'])&&$_smarty_tpl->tpl_vars['arrPageData']->value['modname']==$_smarty_tpl->tpl_vars['iKey']->value)){?>  selected<?php }?>> &nbsp; <?php echo $_smarty_tpl->tpl_vars['iItem']->value;?>
 &nbsp; </option>
<?php } ?>
                                        </select>
                                    </td>
                                    <td align="left">
                                        <select name="target" class="field">
<?php  $_smarty_tpl->tpl_vars['iItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['iItem']->_loop = false;
 $_smarty_tpl->tpl_vars['iKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arrPageData']->value['arTargets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['iItem']->key => $_smarty_tpl->tpl_vars['iItem']->value){
$_smarty_tpl->tpl_vars['iItem']->_loop = true;
 $_smarty_tpl->tpl_vars['iKey']->value = $_smarty_tpl->tpl_vars['iItem']->key;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['iKey']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['item']->value['target']==$_smarty_tpl->tpl_vars['iKey']->value){?>  selected<?php }?>> &nbsp; <?php echo $_smarty_tpl->tpl_vars['iItem']->value;?>
 &nbsp; </option>
<?php } ?>
                                        </select>
                                    </td>
                            </table>
                        </td>
                        <td class="buttons_row"></td>
                    </tr>
<!-- ++++++++++ Start Attach Files ++++++++++++++++++++++++++++++++++++++++++++++ -->
<?php echo $_smarty_tpl->getSubTemplate ('common/attach_files.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('item'=>$_smarty_tpl->tpl_vars['item']->value,'attachFile'=>false,'attachImages'=>true), 0);?>

<!-- ++++++++++ End Attach Files ++++++++++++++++++++++++++++++++++++++++++++++++ -->
                    <tr id="textBlock">
                        <td colspan="2" align="left">  
                            <strong><?php echo @constant('HEAD_CONTENT');?>
</strong>
                            <textarea style="width:840px; height: 80px;" name="customcode" ><?php echo $_smarty_tpl->tpl_vars['item']->value['customcode'];?>
</textarea>
                        </td>
                        <td class="buttons_row"></td>
                    </tr> 
                </table>
            </li>
            <li id="tab_settings">
                <table border="1" cellspacing="0" cellpadding="1" class="list">   
                    <tr>
                        <td valign="top" align="left" width="420"> 
                            <strong><?php echo @constant('HEAD_SIGNIFICANCE');?>
</strong><br/><br/>
                            <div class="inline" style="width: 200px;"><?php echo @constant('HEAD_WEIGHT');?>
 (<?php echo mb_strtolower(@constant('HEAD_PRIORITY'), 'UTF-8');?>
)</div>
                            <input id="weight" name="weight" type="text" value="<?php if ($_smarty_tpl->tpl_vars['item']->value['weight']>0){?><?php echo $_smarty_tpl->tpl_vars['item']->value['weight'];?>
<?php }?>" class="field" size="5" />
                            &nbsp;| <?php echo @constant('LABEL_EXAMPLE');?>
: 700<br/><br/>
                            
                            <strong><?php echo @constant('HEAD_HITS');?>
</strong><br/><br/>
                            <div class="inline" style="width: 200px;"><?php echo @constant('HEAD_COUNT_HITS');?>
</div>
                            <select name="countviews" class="field" onchange="changeParams(this, 'views');">
                                <option value="1"> <?php echo @constant('OPTION_YES');?>
 </option>
                                <option value="0"<?php if ($_smarty_tpl->tpl_vars['item']->value['countviews']==0){?> selected<?php }?>> 
                                    <?php echo @constant('OPTION_NO');?>
 
                                </option>
                            </select><br/><br/>

                            <div class="inline" style="width: 200px;"><?php echo @constant('HEAD_MAX_HITS');?>
</div>
                            <input id="views" name="views" type="hidden" value="<?php if ($_smarty_tpl->tpl_vars['item']->value['views']>0){?><?php echo $_smarty_tpl->tpl_vars['item']->value['views'];?>
<?php }else{ ?>0<?php }?>" />
                            <input id="maxviews" name="maxviews" type="text" value="<?php if ($_smarty_tpl->tpl_vars['item']->value['maxviews']>0){?><?php echo $_smarty_tpl->tpl_vars['item']->value['maxviews'];?>
<?php }?>" class="field" size="5"<?php if (empty($_smarty_tpl->tpl_vars['item']->value['countviews'])){?> readonly<?php }?> />
                            &nbsp;| <b><?php echo $_smarty_tpl->tpl_vars['item']->value['views'];?>
</b> <label><?php echo @constant('LABEL_RESET');?>
: <input id="reset_maxviews" name="reset[views]" type="checkbox" value="1"<?php if (empty($_smarty_tpl->tpl_vars['item']->value['views'])){?> disabled<?php }?> /></label>
                            <br/><br/>

                            <strong><?php echo @constant('HEAD_CLICKS');?>
</strong><br/><br/>
                            <div class="inline" style="width: 200px;"><?php echo @constant('HEAD_COUNT_CLICKS');?>
</div>
                            <select name="countclicks" class="field" onchange="changeParams(this, 'clicks');">
                                <option value="1"> <?php echo @constant('OPTION_YES');?>
 </option>
                                <option value="0"<?php if ($_smarty_tpl->tpl_vars['item']->value['countclicks']==0){?> selected<?php }?>> <?php echo @constant('OPTION_NO');?>
 </option>
                            </select><br/><br/>
                            
                            <div class="inline" style="width: 200px;"><?php echo @constant('HEAD_MAX_CLICKS');?>
</div>
                            <input id="clicks" name="clicks" type="hidden" value="<?php if ($_smarty_tpl->tpl_vars['item']->value['clicks']>0){?><?php echo $_smarty_tpl->tpl_vars['item']->value['clicks'];?>
<?php }else{ ?>0<?php }?>" />
                            <input name="maxclicks" type="text" id="maxclicks" value="<?php if ($_smarty_tpl->tpl_vars['item']->value['maxclicks']>0){?><?php echo $_smarty_tpl->tpl_vars['item']->value['maxclicks'];?>
<?php }?>" class="field" size="5"<?php if (empty($_smarty_tpl->tpl_vars['item']->value['countclicks'])){?> readonly<?php }?> />
                            &nbsp;| <b><?php echo $_smarty_tpl->tpl_vars['item']->value['clicks'];?>
</b> <label><?php echo @constant('LABEL_RESET');?>
: <input id="reset_maxclicks" name="reset[clicks]" type="checkbox" value="1"<?php if (empty($_smarty_tpl->tpl_vars['item']->value['views'])){?> disabled<?php }?> /></label>
                        </td>
                        
                        <td align="left">
                            <strong><?php echo @constant('HEAD_AVAILABLE_ON_PAGES');?>
</strong><br/><br/>
                            <label class="lbl" style="text-align:left;"><input type="radio" onclick="changeDisabledSelections(true);" value="all" name="page_selector" id="page_selector_all" checked /> <?php echo @constant('LABEL_ALL');?>
 </label>&nbsp; 
                            <label class="lbl" style="text-align:left;"><input type="radio" onclick="enableSelections();" value="selected" name="page_selector" id="page_selector_selected"> <?php echo @constant('HEAD_SELECT_FROM_LIST');?>
 </label>&nbsp; 
                            <select id="selections" class="inputbox" name="cids[]" multiple="multiple" style="border-top:1px solid #DCDEDF; width:100%; height:227px !important; overflow:hidden;">
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
                                <option value="<?php echo $_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
"
                                        <?php if (in_array($_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'],$_smarty_tpl->tpl_vars['item']->value['cids'])){?>  selected<?php }?>>
                                    <?php echo $_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['margin'];?>
<?php echo $_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
 &nbsp; 
                                    ( <?php if ($_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['active']==0){?><?php echo @constant('HEAD_INACTIVE');?>
,
                                    <?php }?><?php echo mb_strtolower($_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['menutitle'], 'UTF-8');?>
 ) &nbsp; 
                               </option>
<?php if (!empty($_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['i']['index']]['childrens'])){?>
<!-- ++++++++++ Start Tree Childrens +++++++++++++++++++++++++++++++++++++++ -->
<?php echo $_smarty_tpl->getSubTemplate ('common/tree_childrens_depends.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('dependIDS'=>$_smarty_tpl->tpl_vars['item']->value['cids'],'arrChildrens'=>$_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['childrens']), 0);?>

<!-- ++++++++++ End Tree Childrens +++++++++++++++++++++++++++++++++++++++++ -->
<?php }?>
<?php endfor; endif; ?>
                            </select>
                            </fieldset>
                                
                            <div class="noticePanel">
                                <span class="required">*</span> - Поля, обязательные для заполнения.
                                <div style="text-align:left;padding-top:10px;word-wrap: break-word; ">
                                    <b>Ссылки для флеш:</b><br/>
                                    &nbsp; а) <u>Без фиксации клика:</u> [ <?php echo $_smarty_tpl->tpl_vars['Banners']->value->makeItemLink($_smarty_tpl->tpl_vars['item']->value);?>
 ]<br/>
                                    &nbsp; б) <u>С фиксацией клика:</u> &nbsp;[ <?php echo $_smarty_tpl->tpl_vars['Banners']->value->makeAccountClickURL(0,$_smarty_tpl->tpl_vars['item']->value['id'],$_smarty_tpl->tpl_vars['Banners']->value->makeItemLink($_smarty_tpl->tpl_vars['item']->value));?>
 ]
                                </div>
                            </div>   
                        </td>
                        <td class="buttons_row" valign="top" width="145" align="center">
                            <!-- ++++++++++ Start Buttons ++++++++++++++++++++++++++++++++++++++++++++++ -->
                            <?php echo $_smarty_tpl->getSubTemplate ('common/buttons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('itemID'=>$_smarty_tpl->tpl_vars['item']->value['id'],'task'=>$_smarty_tpl->tpl_vars['arrPageData']->value['task'],'deleteIDLimit'=>0), 0);?>

                            <!-- ++++++++++ End Buttons ++++++++++++++++++++++++++++++++++++++++++++++++ -->
                        </td>
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
<!--
$(document).ready(function() {
<?php if (empty($_smarty_tpl->tpl_vars['item']->value['cids'])){?>
    changeDisabledSelections(true);
<?php }else{ ?>
    //Установить кнопку переключатель на выбраные
    var e = document.getElementById('page_selector_selected');
    e.checked = true;
<?php }?>
    moduleManager('<?php echo $_smarty_tpl->tpl_vars['item']->value['module'];?>
');
});

    function formCheck(form){
        if(form.title.value.length==0) {
            alert('<?php echo @constant('BANNER_TITLE_EMPTY');?>
');
            form.title.focus();
            return false;
        } else if(form.position.value==0) {
            form.position.focus();
            alert('<?php echo @constant('BANNER_POSITION_EMPTY');?>
');
            return false;
        } else if(form.module.value.length==0) {
            form.module.focus();
            alert('<?php echo @constant('BANNER_MODULE_EMPTY');?>
');
            return false;
        }
        return true;
    }
    function changeDisabledSelections(bSelect) {
        var e = document.getElementById('selections');
        var i = 0;
        var n = e.options.length;
        e.disabled = true;
        for (i = 0; i < n; i++) {
            e.options[i].disabled = true;
            e.options[i].selected = bSelect;
        }
    }
    function enableSelections() {
        var e = document.getElementById('selections');
        var i = 0;
        var n = e.options.length;
        e.disabled = false;
        for (i = 0; i < n; i++) {
            e.options[i].disabled = false;
        }
    }
    function changeParams(select, id){
        if(select.value==1){
            $('#'+'max'+id).removeAttr('readonly').focus();
            if($('#'+id).val()>0) $('#'+'reset_max'+id).removeAttr('disabled').attr('checked', 'checked');
        } else {
            $('#'+'max'+id).val('');
            $('#'+'max'+id).attr('readonly', 'readonly');
            $('#'+'reset_max'+id).removeAttr('checked');
        }
    }
    function moduleManager(module){
        switch(module){
            case 'image':
                itemsShowHide(new Array('imageBlock'));
                break;
            case 'text':
                itemsShowHide(new Array('textBlock'));
                break;
            case 'image_text':
                itemsShowHide(new Array('imageBlock', 'textBlock'));
                break;
            default:
                itemsShowHide(new Array('imageBlock'));
                break;
        }
    }
    function itemsShowHide(arrDisplay) {
        var bts = new Array('imageBlock', 'textBlock');
        if(bts.length > 0){
            for(var i=0; i<bts.length; i++){
                var display = 'none';
                if(arrDisplay instanceof Array && arrDisplay.length > 0){
                    for(var j=0; j<arrDisplay.length && display=='none'; j++){
                        if(bts[i]==arrDisplay[j]) display = '';
                    }
                }
                if(document.getElementById(bts[i]))
                    document.getElementById(bts[i]).style.display = display;
            }
        }
    }
//-->
</script>


<?php }else{ ?>
<br/>    
<?php echo $_smarty_tpl->getSubTemplate ('common/new_page_btn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>@constant('ADMIN_ADD_NEW_BANNER')), 0);?>

<div class="filter_box">
    <form action="" method="get" name="filterForm">
        <?php echo @constant('LABEL_FILTER');?>
: &nbsp;
        <input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['module'];?>
" />
        <select name="posid" onchange="this.form.submit()">
    <?php  $_smarty_tpl->tpl_vars['iItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['iItem']->_loop = false;
 $_smarty_tpl->tpl_vars['iKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arrPageData']->value['arPositions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['iItem']->key => $_smarty_tpl->tpl_vars['iItem']->value){
$_smarty_tpl->tpl_vars['iItem']->_loop = true;
 $_smarty_tpl->tpl_vars['iKey']->value = $_smarty_tpl->tpl_vars['iItem']->key;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['iKey']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['posid']==$_smarty_tpl->tpl_vars['iKey']->value){?>  selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['iItem']->value;?>
</option>
    <?php } ?>
        </select>
        &nbsp;&nbsp;&nbsp;
        <select name="modname" onchange="this.form.submit()">
    <?php  $_smarty_tpl->tpl_vars['iItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['iItem']->_loop = false;
 $_smarty_tpl->tpl_vars['iKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arrPageData']->value['arModules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['iItem']->key => $_smarty_tpl->tpl_vars['iItem']->value){
$_smarty_tpl->tpl_vars['iItem']->_loop = true;
 $_smarty_tpl->tpl_vars['iKey']->value = $_smarty_tpl->tpl_vars['iItem']->key;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['iKey']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['modname']==$_smarty_tpl->tpl_vars['iKey']->value){?>  selected<?php }?>> &nbsp; <?php echo $_smarty_tpl->tpl_vars['iItem']->value;?>
 &nbsp; </option>
    <?php } ?>
        </select>
    </form>
</div><br/>
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
            <td id="headb" align="left" width="50"><?php echo @constant('HEAD_CATEGORY');?>
</td>
            <td id="headb" align="center" width="85"><?php echo @constant('HEAD_POSITION');?>
</td>
            <td id="headb" align="center" width="40"><?php echo @constant('HEAD_MODULE');?>
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
            <td align="center"><?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['cids'];?>
</td>
            <td align="center"><?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['ptitle'];?>
</td>
            <td align="center"><?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['mtitle'];?>
</td>
            <td align="center">
                <input type="hidden" name="arItems[<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
]" value="1" />
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
            <td align="center" width="247"></td>
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
</div>
<?php }} ?>