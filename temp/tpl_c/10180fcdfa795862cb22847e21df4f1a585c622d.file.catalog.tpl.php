<?php /* Smarty version Smarty-3.1.14, created on 2018-01-28 18:12:54
         compiled from "tpl/backend/weblife/module/catalog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13373972795a06befa1eee29-63954994%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10180fcdfa795862cb22847e21df4f1a585c622d' => 
    array (
      0 => 'tpl/backend/weblife/module/catalog.tpl',
      1 => 1517155420,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13373972795a06befa1eee29-63954994',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06befb5b6797_44045564',
  'variables' => 
  array (
    'categoryTree' => 0,
    'arrPageData' => 0,
    'item' => 0,
    'arCidCntItems' => 0,
    'PHPHelper' => 0,
    'field' => 0,
    'title' => 0,
    'attValues' => 0,
    'optID' => 0,
    'option' => 0,
    'oid' => 0,
    'valID' => 0,
    'val' => 0,
    'value' => 0,
    'HTMLHelper' => 0,
    'arItem' => 0,
    'itemID' => 0,
    'items' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06befb5b6797_44045564')) {function content_5a06befb5b6797_44045564($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ('common/module_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>@constant('CATALOGS'),'creat_title'=>@constant('ADMIN_CREATING_NEW_PRODUCT'),'edit_title'=>@constant('ADMIN_EDIT_PRODUCT')), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ('common/left_menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('dependID'=>0,'categoryTree'=>$_smarty_tpl->tpl_vars['categoryTree']->value,'islist'=>true), 0);?>


   
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
<?php if (empty($_smarty_tpl->tpl_vars['categoryTree']->value)&&($_smarty_tpl->tpl_vars['arrPageData']->value['cid']||$_smarty_tpl->tpl_vars['item']->value['cid'])){?>
    <input type="hidden" name="cid" value="<?php if ($_smarty_tpl->tpl_vars['item']->value['cid']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['cid'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['cid'];?>
<?php }?>" />
<?php }?>
    <div class="tabsContainer">
        <ul class="nav">
            <li><a href="#main" data-target="main" class="active">Основные</a></li>
            <li><a href="#attributes" data-target="attributes">Характеристики</a></li>
            <li><a href="#options" data-target="options">Опции</a></li>
            <li><a href="#relations" data-target="relations">Связь с товарами</a></li>
            <li><a href="#seo" data-target="seo">SEO</a></li>
            <li><a href="#history" data-target="history">История</a></li>
        </ul>
        <div class="tab_line"></div>
        <ul class="tabs">
            <li class="active" id="tab_main">
                <table border="1" cellspacing="0" cellpadding="1" class="list">
                    <tr>
                        <td id="headb" align="left" width="120"><?php echo @constant('HEAD_TITLE');?>
 <font style="color:red">*</font></td>
                        <td>
                            <input class="left" name="title" size="55" id="title" style="margin-top:5px; margin-right:10px;" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
" /> <input type="button" class="buttons left" value="Изменить SEO путь" onclick="MoveToSeoPath();"/>
                        </td>
                        <td class="buttons_row" valign="top" width="145" align="center">
                            <!-- ++++++++++ Start Buttons ++++++++++++++++++++++++++++++++++++++++++++++ -->
                            <?php echo $_smarty_tpl->getSubTemplate ('common/buttons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('itemID'=>$_smarty_tpl->tpl_vars['item']->value['id'],'task'=>$_smarty_tpl->tpl_vars['arrPageData']->value['task'],'deleteIDLimit'=>0), 0);?>

                            <!-- ++++++++++ End Buttons ++++++++++++++++++++++++++++++++++++++++++++++++ -->
                        </td>
                    </tr>
                    <tr valign="top">
                        <td id="headb" align="left"><br/>Краткое описание</td>
                        <td align="left">
                            <textarea style="width:480px; height: 48px;" name="descr"><?php echo $_smarty_tpl->tpl_vars['item']->value['descr'];?>
</textarea>
                        </td>
                        <td class="buttons_row"></td>
                    </tr>
                    <tr>
                        <td id="headb" align="left"><?php echo @constant('HEAD_PUBLISH_PAGE');?>
</td>
                        <td align="left">
                            <input type="radio" name="active" value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value['active']==1){?>checked<?php }?>>
                            <?php echo @constant('OPTION_YES');?>

                            &emsp;&emsp;
                            <input type="radio" name="active" value="0" <?php if ($_smarty_tpl->tpl_vars['item']->value['active']==0){?>checked<?php }?>>
                            <?php echo @constant('OPTION_NO');?>

                        </td>
                        <td class="buttons_row"></td>
                    </tr>
<?php if (!empty($_smarty_tpl->tpl_vars['categoryTree']->value)){?>
                    <tr>
                        <td id="headb" align="left"><?php echo @constant('HEAD_CATEGORY');?>
</td>
                        <td align="left">
                            <select  name="cid"<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['cid'])||!empty($_smarty_tpl->tpl_vars['arrPageData']->value['cid'])){?> onchange="hideApplyBut(this, this.form.submit_apply, <?php if (!empty($_smarty_tpl->tpl_vars['item']->value['cid'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['cid'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['cid'];?>
<?php }?>);"<?php }?>>
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
"<?php if ($_smarty_tpl->tpl_vars['item']->value['cid']==$_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']||(empty($_smarty_tpl->tpl_vars['item']->value['cid'])&&$_smarty_tpl->tpl_vars['arrPageData']->value['cid']==$_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'])){?>  selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['margin'];?>
<?php echo $_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
 &nbsp; [<?php echo @constant('HEAD_ITEMS');?>
: <?php if (isset($_smarty_tpl->tpl_vars['arCidCntItems']->value[$_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['i']['index']]['id']])){?><?php echo $_smarty_tpl->tpl_vars['arCidCntItems']->value[$_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']];?>
<?php }else{ ?>0<?php }?>] &nbsp; <?php if ($_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['active']==0){?>( <?php echo @constant('HEAD_INACTIVE');?>
 ) &nbsp; <?php }?></option>
<?php if (!empty($_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['i']['index']]['childrens'])){?>
                                <!-- ++++++++++ Start Tree Childrens +++++++++++++++++++++++++++++++++++++++ -->
                                <?php echo $_smarty_tpl->getSubTemplate ('common/tree_childrens.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('dependID'=>$_smarty_tpl->tpl_vars['item']->value['cid'],'arrChildrens'=>$_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['childrens']), 0);?>

                                <!-- ++++++++++ End Tree Childrens +++++++++++++++++++++++++++++++++++++++++ -->
<?php }?>
<?php endfor; endif; ?>
                            </select>
                        </td>
                        <td class="buttons_row"></td>
                    </tr>
<?php }?>
                    <tr>
                        <td id="headb" align="left"><?php echo @constant('HEAD_PRODUCT_CODE');?>
</td>
                        <td align="left">
                            <input  name="pcode" id="pcode" size="20" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['pcode'];?>
" />
                        </td>
                        <td class="buttons_row"></td>
                    </tr>
                    <tr>
                        <td id="headb" align="left">Цены</td>
                        <td align="left">
                            <table cellpadding="4" cellspacing="4">
                                <tr>
                                    <td>Базовая</td>
                                    <td>
                                        <input name="price" id="price" size="20" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Акционная</td>
                                    <td>
                                        <input name="cprice" id="cprice" size="20" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['cprice'];?>
" <?php if (!empty($_smarty_tpl->tpl_vars['item']->value['discount'])){?>disabled<?php }?>/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Закупка</td>
                                    <td>
                                        <input name="buy_price" id="buy_price" size="20" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['buy_price'];?>
"/>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td class="buttons_row"></td>
                    </tr>
                    <tr>
                        <td id="headb" align="left">Стикеры</td>
                        <td align="left">
<?php  $_smarty_tpl->tpl_vars['title'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['title']->_loop = false;
 $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['PHPHelper']->value->SELECTIONS; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['title']->key => $_smarty_tpl->tpl_vars['title']->value){
$_smarty_tpl->tpl_vars['title']->_loop = true;
 $_smarty_tpl->tpl_vars['field']->value = $_smarty_tpl->tpl_vars['title']->key;
?>
                            <input name="<?php echo $_smarty_tpl->tpl_vars['field']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['field']->value;?>
" size="20" type="checkbox" value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['field']->value]){?>checked<?php }?>/>
                            <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
<br/>
<?php } ?>
                        </td>
                        <td class="buttons_row"></td>
                    </tr>
                    <tr>
                        <td id="headb" align="left">Популярность</td>
                        <td align="left">
                            <input name="popularity" id="popularity" size="20" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['popularity'];?>
"/>
                        </td>
                        <td class="buttons_row"></td>
                    </tr>
                    <!-- ++++++++++ Start Attach Files ++++++++++++++++++++++++++++++++++++++++++++++ -->
                    <?php echo $_smarty_tpl->getSubTemplate ('common/attach_files.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('item'=>$_smarty_tpl->tpl_vars['item']->value,'attachFile'=>false,'attachImages'=>true), 0);?>

                    <!-- ++++++++++ End Attach Files ++++++++++++++++++++++++++++++++++++++++++++++++ -->
                    <tr>
                        <td colspan="2">  
                            <strong><?php echo @constant('HEAD_CONTENT');?>
</strong>
                            <a href="javascript:toggleEditor('fulldescription');"><?php echo @constant('HEAD_SWITCH_TEXT_EDITOR');?>
</a><br/><br/>
                            <textarea style="width:640px; height: 500px;" id="fulldescription" name="fulldescr" ><?php echo $_smarty_tpl->tpl_vars['item']->value['fulldescr'];?>
</textarea>
                        </td>
                        <td class="buttons_row"></td>
                    </tr>
                </table>
            </li>
            
            <li id="tab_attributes">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
                <tr>
                    <td colspan="2"> 
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="list" id="attrTable">
                            <thead>
                                <tr>
                                    <td style="padding-bottom:10px;">
                                        <select id="attrList" onchange="addAttributeRow(this.value);" style="width: 300px;">
                                            <option> -- <?php echo @constant('CATALOG_ATTRIBUTES_SELECT_GROUP');?>
 -- </option>
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
<?php if (!in_array($_smarty_tpl->tpl_vars['arrPageData']->value['attrGroups'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'],$_smarty_tpl->tpl_vars['item']->value['attrGroups'])){?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['attrGroups'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['attrGroups'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
 <?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['attrGroups'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['descr']){?>(<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['attrGroups'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['descr'];?>
)<?php }?></option>
<?php }?>
<?php endfor; endif; ?>
                                        </select>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
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
<?php if (in_array($_smarty_tpl->tpl_vars['arrPageData']->value['attrGroups'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'],$_smarty_tpl->tpl_vars['item']->value['attrGroups'])){?>
                                <tr id="attrGroup_<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['attrGroups'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" data-title="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['attrGroups'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
 <?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['attrGroups'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['descr']){?>(<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['attrGroups'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['descr'];?>
)<?php }?>" data-gid="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['attrGroups'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
">
                                    <td>
                                        <strong><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['attrGroups'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
 <?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['attrGroups'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['descr']){?>(<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['attrGroups'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['descr'];?>
)<?php }?></strong>
                                        <a href="javascript:void(0);" data-gid="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['attrGroups'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" class="del" onclick="removeAttributeRow(this);"><?php echo @constant('LABEL_DELETE');?>
</a>
                                        <div style="clear: both; margin-bottom: 10px;"></div>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
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
<?php $_smarty_tpl->tpl_vars['attValues'] = new Smarty_variable($_smarty_tpl->tpl_vars['arrPageData']->value['attrGroups'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']], null, 0);?>
                                            <tr>
                                                <td valign="top" style="min-width:135px;" <?php if ($_smarty_tpl->tpl_vars['attValues']->value['descr']){?>title="<?php echo $_smarty_tpl->tpl_vars['attValues']->value['descr'];?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['attValues']->value['title'];?>
</td>
                                                <td style="padding-bottom:10px;">
                                                    <div class="attributes" data-aid="<?php echo $_smarty_tpl->tpl_vars['attValues']->value['id'];?>
">
                                                        <input type="text" placeholder="введите значение для поиска" class="searchAttrValue" size="80"/>
                                                        <div class="selectedAttr">
<?php if (!empty($_smarty_tpl->tpl_vars['attValues']->value['values'])){?>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['l'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['l']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['name'] = 'l';
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['attValues']->value['values']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['l']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['l']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['l']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['l']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['l']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['l']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['total']);
?>
<?php if (isset($_smarty_tpl->tpl_vars['item']->value['attributes'][$_smarty_tpl->tpl_vars['attValues']->value['values'][$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['l']['index']]['aid']])&&in_array($_smarty_tpl->tpl_vars['attValues']->value['values'][$_smarty_tpl->getVariable('smarty')->value['section']['l']['index']]['id'],$_smarty_tpl->tpl_vars['item']->value['attributes'][$_smarty_tpl->tpl_vars['attValues']->value['values'][$_smarty_tpl->getVariable('smarty')->value['section']['l']['index']]['aid']])){?>
                                                            <div class="attr">
                                                                <input type="hidden" name="attributes[<?php echo $_smarty_tpl->tpl_vars['attValues']->value['id'];?>
][]" value="<?php echo $_smarty_tpl->tpl_vars['attValues']->value['values'][$_smarty_tpl->getVariable('smarty')->value['section']['l']['index']]['id'];?>
"/>
                                                                <?php echo $_smarty_tpl->tpl_vars['attValues']->value['values'][$_smarty_tpl->getVariable('smarty')->value['section']['l']['index']]['title'];?>

                                                                <span onclick="$(this).parent().remove();">X</span>
                                                            </div>
<?php }?>
<?php endfor; endif; ?>
<?php }?>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
<?php endfor; endif; ?>
                                        </table>
                                    </td>
                                </tr>
<?php }?>
<?php endfor; endif; ?>
                            </tbody>
                        </table>
                    </td>
                    <td class="buttons_row" valign="top" width="145" align="center">
                        <!-- ++++++++++ Start Buttons ++++++++++++++++++++++++++++++++++++++++++++++ -->
                        <?php echo $_smarty_tpl->getSubTemplate ('common/buttons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('itemID'=>$_smarty_tpl->tpl_vars['item']->value['id'],'task'=>$_smarty_tpl->tpl_vars['arrPageData']->value['task'],'deleteIDLimit'=>0), 0);?>

                        <!-- ++++++++++ End Buttons ++++++++++++++++++++++++++++++++++++++++++++++++ -->
                    </td>
                </tr>
                </table>
                <script type="text/javascript">
                    $(function() {
                        $.each($('.attributes'), function(i, row) {
                            initAttr($(row));           
                        });
                    });

                    function initAttr(row) {
                        var input  = row.find('.searchAttrValue'),
                            holder = row.find('.selectedAttr'),
                            selected = holder.children('.attr'),
                            attrID = row.data('aid');
                        $(input).autocomplete({
                            source: function(request, response) {
                                var exists = new Array();
                                $.each(holder.children('.attr'), function(i, attr) {
                                    exists.push($(attr).children('input').val());
                                });
                                $.ajax({
                                    url: '/interactive/ajax.php',
                                    type: 'GET',
                                    dataType: 'json',
                                    data: {
                                        zone: 'admin',
                                        action: 'getAttributeValue',
                                        aid: attrID,
                                        vidx: exists.join(','),
                                        searchStr: request.term
                                    }, 
                                    success: function(json) {
                                        response($.map(json.items, function(item) {
                                            return {
                                                id: item.id,
                                                label: item.title,
                                                value: item.title
                                            }
                                        }));
                                    }
                                });
                            },
                            select: function(event, ui) {
                                var html  = "<div class=\"attr\">";
                                    html += "<input type=\"hidden\" name=\"attributes[" + attrID + "][]\" value=\"" + ui.item.id + "\"/>";
                                    html += ui.item.label + " <span onclick=\"$(this).parent().remove();\">X</span>";
                                    html += "</div>";
                                holder.append(html);
                                $(this).val("");
                                return false;
                            },
                            minLength: 2
                        });   
                    }

                    function removeAttrValue(attr){
                        $(attr).parent().remove();
                    }
                    
                    // adding attribute group to product form
                    function addAttributeRow(gid) {
                        gid = parseInt(gid) || 0;
                        var table = document.getElementById('attrTable');
                        // групы атрибутов, которые уже добавлены к товару
                        var ArGroups = [];
                        if($(table).children('tbody').has('tr')) {
                            $.each($(table).children('tbody').children('tr'), function(i, tr){
                                ArGroups.push($(tr).data('gid'));
                            });
                        }
                        if(gid > 0) {
                            $.ajax({
                                url: '/interactive/ajax.php',
                                type: 'GET',
                                dataType: 'json',
                                data: {
                                    zone: 'admin',
                                    action: 'addAttributeRow',
                                    groupID: gid,
                                    itemID: parseInt(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
),
                                    arGroups: ArGroups
                                }, 
                                success: function(json) {
                                    // form layout DOM insertion
                                    if(json.tpl) {
                                        $(table).children('tbody').append(json.tpl);
                                    }
                                    // updating select box
                                    if(json.select) {
                                        updateSelectBox(json.select);
                                    }
                                    $.each($('.attributes'), function() {
                                        initAttr($(this));           
                                    });
                                }
                            });
                        }
                    }
                    function removeAttributeRow(a) {
                        var gid    = parseInt($(a).data('gid'))||0,
                            table  = document.getElementById('attrTable'),
                            target = $(table).children('tbody').children('tr#attrGroup_' + gid),
                            select = $(table).find('#attrList'),
                            arData = new Object();
                        $.each(select.children('option'), function(i, opt) {
                            var val   = parseInt($(opt).val())||0,
                                title = $(opt).text();
                            if (val > 0) {
                                arData[val] = title;
                            }
                        });
                        arData[gid] = $(target).data('title');
                        $(target).remove();
                        updateSelectBox(arData);
                    }
                    // updating select box
                    function updateSelectBox(arData) {
                        arData = arData || {};
                        var table = document.getElementById('attrTable');
                        var select = $(table).find('#attrList');
                        var html = '<option> -- Выберите группу атрибутов -- </option>';
                        if(!empty(arData)) {
                            for (var id in arData) {
                                html += '<option value="' + id + '">' + arData[id] + '</option>';
                            }
                        }
                        $(select).html(html);
                    }
                </script>
            </li>
            
            <li id="tab_options">
                <br/>
                <br/>&nbsp;&nbsp;&nbsp;
                <select id="optionsList" onchange="ProductOptions.addGroup(this.value);" style="width: 400px;">
                    <option value=""> -- Выберите опцию из списка -- </option>
<?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_smarty_tpl->tpl_vars['optID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arrPageData']->value['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
 $_smarty_tpl->tpl_vars['optID']->value = $_smarty_tpl->tpl_vars['option']->key;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['optID']->value;?>
" <?php if (array_key_exists($_smarty_tpl->tpl_vars['optID']->value,$_smarty_tpl->tpl_vars['item']->value['options'])){?>disabled<?php }?>><?php echo $_smarty_tpl->tpl_vars['option']->value['title'];?>
</option>
<?php } ?>
                </select>
                <div id="optionsHolder">
<?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_smarty_tpl->tpl_vars['optID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
 $_smarty_tpl->tpl_vars['optID']->value = $_smarty_tpl->tpl_vars['option']->key;
?>
                    <table width="100%" class="list order" cellspacing="1" id="optgroup_<?php echo $_smarty_tpl->tpl_vars['optID']->value;?>
">
                        <thead>
                            <tr>
                                <td id="headb" colspan="3" align="left">
                                    <input type="hidden" name="options[<?php echo $_smarty_tpl->tpl_vars['optID']->value;?>
][id]" value="<?php echo $_smarty_tpl->tpl_vars['optID']->value;?>
"/>
                                    <a href="javascript:;" onclick="ProductOptions.deleteGroup(<?php echo $_smarty_tpl->tpl_vars['optID']->value;?>
);">
                                        <img src="/images/operation/delete.png" alt="удалить" title="удалить">
                                    </a> 
                                    <strong><?php echo $_smarty_tpl->tpl_vars['option']->value['title'];?>
</strong>
                                </td>
                                <td id="headb" colspan="2" align="right">
                                    <input type="checkbox" name="options[<?php echo $_smarty_tpl->tpl_vars['optID']->value;?>
][required]" value="1" <?php if ($_smarty_tpl->tpl_vars['option']->value['required']){?>checked<?php }?>/> обязательно
                                </td>
                            </tr>
                            <tr>
                                <td id="headb">значение</td>
                                <td id="headb" align="center" width="120">оператор цены</td>
                                <td id="headb" align="center" width="100">цена</td>
                                <td id="headb" align="center" width="90">главное</td>
                                <td id="headb" align="center" width="90">удалить</td>
                            </tr>
                        </thead>
                        <tbody>
<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['valID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['option']->value['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['j']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['valID']->value = $_smarty_tpl->tpl_vars['value']->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['j']['iteration']++;
?>
                            <tr id="option_<?php echo $_smarty_tpl->tpl_vars['optID']->value;?>
_<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['j']['iteration'];?>
">
                                <td align="left">
                                    <select name="options[<?php echo $_smarty_tpl->tpl_vars['optID']->value;?>
][values][<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['j']['iteration'];?>
][id]" onchange="ProductOptions.changeOptionValue(<?php echo $_smarty_tpl->tpl_vars['optID']->value;?>
, <?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['j']['iteration'];?>
, this.value);" style="width: 100%;">
<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['oid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arrPageData']->value['options'][$_smarty_tpl->tpl_vars['optID']->value]['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['oid']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['oid']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['oid']->value==$_smarty_tpl->tpl_vars['valID']->value){?>selected<?php }elseif($_smarty_tpl->tpl_vars['oid']->value!=$_smarty_tpl->tpl_vars['valID']->value&&array_key_exists($_smarty_tpl->tpl_vars['oid']->value,$_smarty_tpl->tpl_vars['option']->value['values'])){?>disabled<?php }?>><?php echo $_smarty_tpl->tpl_vars['val']->value['title'];?>
</option>
<?php } ?>
                                    </select>
                                </td>
                                <td align="center">
                                    <select name="options[<?php echo $_smarty_tpl->tpl_vars['optID']->value;?>
][values][<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['j']['iteration'];?>
][operator]">
                                        <option value="+" <?php if ($_smarty_tpl->tpl_vars['value']->value['operator']=="+"){?>selected<?php }?>> + </option>
                                        <option value="-" <?php if ($_smarty_tpl->tpl_vars['value']->value['operator']=="-"){?>selected<?php }?>> - </option>
                                    </select>
                                </td>
                                <td align="center">
                                    <input type="text" name="options[<?php echo $_smarty_tpl->tpl_vars['optID']->value;?>
][values][<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['j']['iteration'];?>
][price]" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['price'];?>
" size="8"/>
                                </td>
                                <td align="center">
                                    <input type="radio" name="options[<?php echo $_smarty_tpl->tpl_vars['optID']->value;?>
][values][<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['j']['iteration'];?>
][primary]" value="1" <?php if ($_smarty_tpl->tpl_vars['value']->value['primary']==1){?>checked<?php }?> onchange="ProductOptions.setPrimaryValue(<?php echo $_smarty_tpl->tpl_vars['optID']->value;?>
, <?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['j']['iteration'];?>
);"/>
                                </td>
                                <td align="center">
                                    <a href="javascript:;" onclick="ProductOptions.deleteValueRow(<?php echo $_smarty_tpl->tpl_vars['optID']->value;?>
, <?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['j']['iteration'];?>
);">
                                        <img src="/images/operation/delete.png" alt="удалить" title="удалить">
                                    </a>
                                </td>
                            </tr>
<?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5" align="right">
                                    <button type="button" onclick="ProductOptions.addValueRow(<?php echo $_smarty_tpl->tpl_vars['optID']->value;?>
);" class="buttons">Добавить значение</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
<?php } ?>
                </div>
                <script type="text/javascript">
                    var ProductOptions = {
                        div: document.getElementById("optionsHolder"),
                        list: document.getElementById("optionsList"),
                        arOptions: <?php echo json_encode($_smarty_tpl->tpl_vars['HTMLHelper']->value->dataConv($_smarty_tpl->tpl_vars['arrPageData']->value['options']));?>
,
                        html: "",
                        addGroup : function (optionID) {
                            var _self = this;
                            var exIDX = new Array(),
                                arOptions = {};
                            $.each($(_self.div).find("table"), function(i, table) {
                                var id = $(table).attr("id");
                                var int = id.substring(strpos(id, "_"));
                                exIDX.push(parseInt(int));
                            });
                            $.each($(_self.list).find("option"), function(i, option) {
                                option.selected = false;
                                var val = $(option).val();
                                if (val == optionID) {
                                    $(option).attr("disabled", "disabled");
                                    option.disabled = true;
                                }
                            });
<?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_smarty_tpl->tpl_vars['optID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arrPageData']->value['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
 $_smarty_tpl->tpl_vars['optID']->value = $_smarty_tpl->tpl_vars['option']->key;
?>
                            arOptions[<?php echo $_smarty_tpl->tpl_vars['optID']->value;?>
] = {
                                id    : <?php echo $_smarty_tpl->tpl_vars['optID']->value;?>
,
                                title : "<?php echo $_smarty_tpl->tpl_vars['option']->value['title'];?>
"
                            }
<?php } ?>
                            for (var id in arOptions) {
                                if (id == optionID) {
                                    _self.html += "<table width=\"100%\" class=\"list order\" cellspacing=\"1\" id=\"optgroup_" + optionID + "\">";
                                    _self.html += "<thead>";
                                    _self.html += "<tr>";
                                    _self.html += "<td id=\"headb\" colspan=\"3\" align=\"left\">";
                                    _self.html += "<input type=\"hidden\" name=\"options[" + optionID + "][id]\" value=\"" + optionID + "\">";
                                    _self.html += "<a href=\"javascript:;\" onclick=\"ProductOptions.deleteGroup(" + optionID + ");\">";
                                    _self.html += "<img src=\"/images/operation/delete.png\" alt=\"удалить\" title=\"удалить\"/>";
                                    _self.html += "</a>";
                                    _self.html += "<strong> " + arOptions[id].title + "</strong>";
                                    _self.html += "</td>";
                                    _self.html += "<td id=\"headb\" colspan=\"2\" align=\"right\">";
                                    _self.html += "<input type=\"checkbox\" name=\"options[" + optionID + "][required]\" value=\"1\"/> обязательно";
                                    _self.html += "</td>";
                                    _self.html += "</tr>";
                                    _self.html += "<tr>";
                                    _self.html += "<tr>";
                                    _self.html += "<td id=\"headb\">значение</td>";
                                    _self.html += "<td id=\"headb\" align=\"center\" width=\"120\">оператор цены</td>";
                                    _self.html += "<td id=\"headb\" align=\"center\" width=\"100\">цена</td>";
                                    _self.html += "<td id=\"headb\" align=\"center\" width=\"90\">главное</td>";
                                    _self.html += "<td id=\"headb\" align=\"center\" width=\"90\">удалить</td>";
                                    _self.html += "</tr>";
                                    _self.html += "</thead>";
                                    _self.html += "<tbody>";
                                    _self.html += "</tbody>";
                                    _self.html += "<tfoot>";
                                    _self.html += "<tr>";
                                    _self.html += "<td colspan=\"5\" align=\"right\">";
                                    _self.html += "<button type=\"button\" onclick=\"ProductOptions.addValueRow(" + optionID + ");\" class=\"buttons\">Добавить значение</button>";
                                    _self.html += "</td>";
                                    _self.html += "</tr>";
                                    _self.html += "</tfoot>";
                                }
                            }
                            $(_self.div).append(_self.html);
                            _self.html = "";
                        },
                        deleteGroup: function (optionID) {
                            var _self = this;
                            $(document.getElementById("optgroup_" + optionID)).remove();
                            $.each($(_self.list).find("option"), function (i, option) {
                                var val = $(option).val();
                                if (val == optionID) {
                                    $(option).removeAttr("disabled");
                                    option.disabled = false;
                                }
                            });
                        },
                        addValueRow: function (optionID) {
                            var _self = this,
                                arOptions = _self.arOptions, // option array
                                arOption = new Object(),  // option array
                                arValues = new Object(),  // values array
                                arValue  = new Object(),  // value array
                                arExValues = new Array(), // array of existing option values
                                table = document.getElementById("optgroup_" + optionID), // parent table
                                index = 0; // count of added option values
                            $.each($(table).children("tbody").find("tr").children("td:first-of-type").children("select"), function (i, select) {
                                arExValues.push($(select).val());
                                index++;
                            });
                            if (!empty(arOptions)) {
                                for (var id in arOptions) {
                                    if (id == optionID) {
                                        arOption = arOptions[id];
                                    }
                                }
                                if (!empty(arOption)) {
                                    arValues = arOption.values;
                                    for (var id in arOption.values) {
                                        if (!in_array(id, arExValues)) {
                                            arValue = arOption.values[id];
                                            break;
                                        }
                                    }
                                    var cnt = $(table).children("tbody").children("tr").size();
                                    if (!empty(arValue) && count(arValue) > 0) {
                                        index++;
                                        _self.html += "<tr id=\"option_" + optionID + "_" + index + "\">";
                                        _self.html += "<td align=\"left\">";
                                        _self.html += "<select name=\"options[" + optionID + "][values][" + index + "][id]\" onchange=\"ProductOptions.changeOptionValue(" + optionID + "," + index + ", this.value);\" style=\"width: 100%;\">";
                                        for (var id in arValues) {
                                            _self.html += "<option value=\"" + id + "\" " + (in_array(id, arExValues) ? "disabled" : "") + ">" + arValues[id].title + "</option>";
                                        }
                                        _self.html += "</select>";
                                        _self.html += "</td>";
                                        _self.html += "<td align=\"center\">";
                                        _self.html += "<select name=\"options[" + optionID + "][values][" + index + "][operator]\">";
                                        _self.html += "<option value=\"+\"> + </option>";
                                        _self.html += "<option value=\"-\"> - </option>";
                                        _self.html += "</select>";
                                        _self.html += "</td>";
                                        _self.html += "<td align=\"center\">";
                                        _self.html += "<input type=\"text\" name=\"options[" + optionID + "][values][" + index + "][price]\" value=\"0\" size=\"8\">";
                                        _self.html += "</td>";
                                        _self.html += "<td align=\"center\">";
                                        _self.html += "<input type=\"radio\" name=\"options[" + optionID + "][values][" + index + "][primary]\" value=\"1\"" + ((cnt==0) ? " checked" : "") + " onchange=\"ProductOptions.setPrimaryValue(" + optionID + "," + index + ");\"/>";
                                        _self.html += "</td>";
                                        _self.html += "<td align=\"center\">";
                                        _self.html += "<a href=\"javascript:;\" onclick=\"ProductOptions.deleteValueRow(" + optionID + ", " + index + ");\">";
                                        _self.html += "<img src=\"/images/operation/delete.png\" alt=\"удалить\" title=\"удалить\"/>";
                                        _self.html += "</a>";
                                        _self.html += "</td>";
                                        _self.html += "</tr>";
                                        // append html
                                        $(table).children("tbody").append(_self.html);
                                        _self.html = "";
                                        // Find last added option value
                                        var lastVal = $(table).children("tbody").children("tr:last-of-type").children("td:first-of-type").children("select").val();
                                        $.each($(table).children("tbody").find("tr").children("td:first-of-type").children("select"), function (i, select) {
                                            if ($(select).val() != lastVal) {
                                                $.each($(select).find("option"), function (j, opt) {
                                                    if ($(opt).val() == lastVal) {
                                                        $(opt).attr("disabled", "disabled");
                                                        opt.disabled = true;
                                                    }
                                                });
                                            }
                                        });
                                    }
                                }
                            }
                        },
                        deleteValueRow: function (optionID, index) {
                            var _self   = this,
                                table   = document.getElementById("optgroup_" + optionID),
                                row     = document.getElementById("option_" + optionID + "_" + index),
                                select  = $(row).children("td:first-of-type").children("select"),
                                lastVal = $(select).val();
                            $(row).remove();
                            $.each($(table).children("tbody").children("tr").children("td:first-of-type").children("select").children("option"), function (i, opt) {
                                if ($(opt).val()==lastVal && opt.disabled) {
                                    $(opt).removeAttr("disabled");
                                    opt.disabled = false;
                                }
                            });
                            var checked = $(table).children("tbody").find("input[type=\"radio\"]:checked"),
                                cnt = 0;
                            if ($(checked).size()==0) {
                                $.each($(table).children("tbody").find("input[type=\"radio\"]"), function (i, input) {
                                    if (cnt > 0) return;
                                    $(input).attr("checked", "checked");
                                    input.checked = true;
                                    cnt++;
                                });
                            }
                        },
                        changeOptionValue: function (optionID, index, val) {
                            var _self = this,
                                table = document.getElementById("optgroup_" + optionID),
                                row   = document.getElementById("option_" + optionID + "_" + index),
                                select  = $(row).children("td:first-of-type").children("select"),
                                arVal = new Array();
                            arVal.push(val);
                            $.each($(table).children("tbody").children("tr").children("td:first-of-type").children("select"), function (i, sel) {
                                if (val == $(sel).val()) return;
                                arVal.push($(sel).val());
                            });
                            $.each($(table).children("tbody").children("tr").children("td:first-of-type").children("select"), function (i, sel) {
                                var sVal = $(sel).val();
                                if (val == sVal) return; // skip current select
                                $.each($(sel).find("option"), function (i, opt) {
                                    var iVal = $(opt).val(),
                                        disabled = opt.disabled;
                                    if (iVal == sVal) return; // skip selected options
                                    if (in_array(iVal, arVal)) {
                                        $(opt).attr("disabled", "disabled");
                                        opt.disabled = true;
                                    } else {
                                        $(opt).removeAttr("disabled");
                                        opt.disabled = false;
                                    }
                                });
                            });
                        },
                        setPrimaryValue: function (optionID, index) {
                            var _self = this,
                                table = document.getElementById("optgroup_" + optionID),
                                row   = document.getElementById("option_" + optionID + "_" + index);
                            $.each($(table).find("input[type=\"radio\"]:checked"), function (i, input) {
                                $(input).removeAttr("checked");
                                input.checked = false;
                            });
                            $.each($(row).find("input[type=\"radio\"]"), function (i, input) {
                                $(input).attr("checked", "checked");
                                input.checked = true;
                            });
                        }
                    };
                </script>
            </li>
            <li id="tab_relations">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="list" id="relatedTable">
                    <tr>
                        <td colspan="4">     
                            <strong>К этому товару подходят</strong><br/><br/>
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
                            <input type="button" onClick="jsSelectUtils.addSelectedOptions(this.form.all_related, 'list_settings_selected_related', 0);jsSelectUtils.addExtraOptionsParams(this.form.selected_related, {ondblclick: 'openTab(\'/admin/?module=catalog&task=editItem&itemID=\' + this.value);', style: 'color: blue; text-decoration: underline;'});" disabled="" title="Выбрать отмеченные колонки" value="&nbsp; &gt; &nbsp;" name="related_add" class="buttons green" style="min-width: 30px;"/>
                            <br/>
                            <input type="button" onClick="jsSelectUtils.addSelectedOptions(this.form.selected_related, 'list_settings_all_related');jsSelectUtils.addExtraOptionsParams(this.form.all_related, {ondblclick: 'openTab(\'/admin/?module=catalog&task=editItem&itemID=\' + this.value);', style: 'color: blue; text-decoration: underline;'});" disabled="" title="Выбрать отмеченные колонки" value="&nbsp; &lt; &nbsp;" name="related_del" class="buttons green" style="min-width: 30px;"/>
                        </td>
                        <td >
                            <input type="hidden" name="related" id="related" value=""/>
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
" ondblclick="openTab('/admin/?module=catalog&task=editItem&itemID=' + this.value);" style="color: blue; text-decoration: underline;"><?php echo (($_smarty_tpl->tpl_vars['item']->value['related'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title']).(" ")).($_smarty_tpl->tpl_vars['item']->value['related'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['pcode']);?>
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
                        <td colspan="4" style="padding: 0 5px;font-style:italic;">Двойной клик для перехода на товар</td>
                        <td class="buttons_row"></td>
                    </tr>
                </table>
            
<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['task']=="addItem"||($_smarty_tpl->tpl_vars['arrPageData']->value['task']=="editItem"&&!$_smarty_tpl->tpl_vars['item']->value['has_kit'])){?>
                <br/>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="list" id="kitsTable">
                    <tr>
                        <td colspan="4">
                            <strong><?php echo @constant('PRODUCT_KITS');?>
</strong><br/><br/>
                            <select id="kitCats" onchange="updateKitOptions(this.value);">
                                <option> --- Выберите категорию из списка --- </option>
<?php  $_smarty_tpl->tpl_vars['arItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['arItem']->_loop = false;
 $_smarty_tpl->tpl_vars['arKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arrPageData']->value['arKitCats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
                        <td class="buttons_row" width="145"></td>
                    </tr>
                    <tr valign="top">
                        <td align="center">
                            <select onChange="this.form.kit_add.disabled=(this.selectedIndex == -1); jsSelectUtils.addExtraOptionsParams(this.form.selected_kits, {ondblclick: 'openTab(\'/admin/?module=catalog&task=editItem&itemID=\' + this.value);', style: 'color: blue; text-decoration: underline;'});" size="10" id="list_settings_all_kits" name="all_kits" class="jsSelectUtils_select"></select>
                        </td>
                        <td valign="middle">
                            <input type="button" onClick="jsSelectUtils.addSelectedOptions(this.form.all_kits, 'list_settings_selected_kits', 10, true, false);jsSelectUtils.addExtraOptionsParams(this.form.selected_kits, {ondblclick: 'openTab(\'/admin/?module=catalog&task=editItem&itemID=\' + this.value);', style: 'color: blue; text-decoration: underline;'});" disabled="" title="Выбрать отмеченные колонки" value="&nbsp; &gt; &nbsp;" name="kit_add" class="buttons green" style="min-width: 30px;"/>
                            <br/>
                            <input type="button" onClick="jsSelectUtils.addSelectedOptions(this.form.selected_kits, 'list_settings_all_kits', 0, false, false);jsSelectUtils.addExtraOptionsParams(this.form.all_kits, {ondblclick: 'openTab(\'/admin/?module=catalog&task=editItem&itemID=\' + this.value);', style: 'color: blue; text-decoration: underline;'});" disabled="" title="Выбрать отмеченные колонки" value="&nbsp; &lt; &nbsp;" name="kit_del" class="buttons green" style="min-width: 30px;"/>
                        </td>
                        <td align="center">
                            <input type="hidden" name="arKits" value="" />
                            <select onChange="var frm=this.form; frm.kit_up.disabled=frm.kit_down.disabled=frm.kit_del.disabled=(this.selectedIndex == -1);jsSelectUtils.addExtraOptionsParams(this.form.all_kits, {ondblclick: 'openTab(\'/admin/?module=catalog&task=editItem&itemID=\' + this.value);', style: 'color: blue; text-decoration: underline;'});" multiple="" size="10" id="list_settings_selected_kits" name="selected_kits" class="jsSelectUtils_select">
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['item']->value['arKits']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['arKits'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" ondblclick="openTab('/admin/?module=catalog&task=editItem&itemID=' + this.value);" style="color: blue; text-decoration: underline;"><?php echo (($_smarty_tpl->tpl_vars['item']->value['arKits'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title']).(" ")).($_smarty_tpl->tpl_vars['item']->value['arKits'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['pcode']);?>
</option>
<?php endfor; endif; ?>
                            </select>
                        </td>
                        <td valign="middle">
                            <input type="button" onClick="jsSelectUtils.moveOptionsUp(this.form.selected_kits);jsSelectUtils.addExtraOptionsParams(this.form.selected_kits, {ondblclick: 'openTab(\'/admin/?module=catalog&task=editItem&itemID=\' + this.value);', style: 'color: blue; text-decoration: underline;'});" disabled="" title="Порядок показа колонок (выше)" value="Выше" class="buttons green" name="kit_up" style="min-width: 30px;"/>
                            <br/>
                            <input type="button" onClick="jsSelectUtils.moveOptionsDown(this.form.selected_kits);jsSelectUtils.addExtraOptionsParams(this.form.selected_kits, {ondblclick: 'openTab(\'/admin/?module=catalog&task=editItem&itemID=\' + this.value);', style: 'color: blue; text-decoration: underline;'});" disabled="" title="Порядок показа колонок: ниже" value="Ниже" class="buttons green" name="kit_down" style="min-width: 30px;"/>
                        </td>
                        <td class="buttons_row" width="145"></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="padding: 0 5px;font-style:italic;">Двойной клик по элементу для перехода на товар</td>
                        <td class="buttons_row"></td>
                    </tr>
                </table>
<?php }?>
            </li>
            <li id="tab_seo">
                <table width="101%" border="0" cellspacing="0" cellpadding="0" class="list" >  
                    <!-- ++++++++++ Start Buttons ++++++++++++++++++++++++++++++++++++++++++++++ -->
                    <?php echo $_smarty_tpl->getSubTemplate ('common/meta_seo_data.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('itemID'=>$_smarty_tpl->tpl_vars['itemID']->value,'seoTable'=>@constant('CATALOG_TABLE')), 0);?>

                    <!-- ++++++++++ End Buttons ++++++++++++++++++++++++++++++++++++++++++++++++ -->  
                </table>
            </li>
            <li id="tab_history">
                <?php echo $_smarty_tpl->getSubTemplate ("common/object_actions_log.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arHistoryData'=>$_smarty_tpl->tpl_vars['item']->value['arHistory']), 0);?>

            </li>
        </ul>
    </div>
</form>

<script type="text/javascript">
    function formCheck(form) {
        if(form.title.value.length == 0){
           alert('<?php echo @constant('ALERT_EMPTY_PAGE_TITLE');?>
'); 
           return false;
        }
                
        $.each($('.attributes'), function() {
            var attrParent = $(this).find('.selectedAttr');
            var attrValues = $(this).find('.arAttrValues');
            
            var vidx = [];
            $.each($(attrParent).find('.attr'), function() {
                vidx.push($(this).attr('data-value'));
            });
            $(attrValues).val(vidx);
        });
        
        // product kits input filling
        var arIdx = new Array();
        for (var i = 0; i < form.selected_kits.length; i++) {
            arIdx.push(form.selected_kits[i].value);
        }
        form.arKits.value = arIdx.join(',');
        
        // related products input filling
        var arIdx = new Array();
        for (var i = 0; i < form.selected_related.length; i++) {
            arIdx.push(form.selected_related[i].value);
        }
        form.related.value = arIdx.join(',');
        // similar products input filling
        // var arIdx = new Array();
        // for (var i = 0; i < form.selected_similar.length; i++) {
        //     arIdx.push(form.selected_similar[i].value);
        // }
        // form.similar.value = arIdx.join(',');
        // additions products input filling
        // var arIdx = new Array();
        // for (var i = 0; i < form.selected_additions.length; i++) {
        //     arIdx.push(form.selected_additions[i].value);
        // }
        // form.additions.value = arIdx.join(',');
        
        return true;
    }
    
    function togglePriceOptions(cb) {
        var checked = cb.checked || false;
        var cprice = document.getElementById('cprice');
        var discount = document.getElementById('discount');

        if(checked) {
            $(cprice).attr('disabled', true);
            $(discount).removeAttr('disabled'); 
        } else {
            $(discount).attr('disabled', true);
            $(cprice).removeAttr('disabled'); 
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

    function updateKitOptions(CID){
        CID = parseInt(CID)||false;
        var exItems = getExItems('list_settings_selected_kits', '<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
');
        if(CID){
            $.ajax({
                url: '/interactive/ajax.php',
                type: 'GET',
                dataType: 'json',
                data: {
                    zone: 'admin',
                    action: 'getKitItems',
                    exclude: exItems,
                    cid: CID
                }, 
                success: function(json){
                    if(json.items){
                        var html = '';
                        for (var i in json.items){
                            html += '<option value="' + i + '" ondblclick="openTab(\'/admin/?module=catalog&task=editItem&itemID=\' + this.value);" style="color: blue; text-decoration: underline;">' + json.items[i].name + '</option>';
                        }
                        $('#list_settings_all_kits').html(html);
                    }
                }
            });
        } else {
            $('#list_settings_all_kits').html('');
        }
    }

    function updateRelatedOptions(CID){
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
                            html += '<option value="' + json.items[i].id + '" ondblclick="openTab(\'/admin/?module=catalog&task=editItem&itemID=\' + this.value);" style="color: blue; text-decoration: underline;">' + json.items[i].name + '</option>';
                        }
                        $('#list_settings_all_related').html(html);
                    }
                }
            });
        }
    }

</script>
<?php }else{ ?>
    <div class="clear"></div>
    <?php echo $_smarty_tpl->getSubTemplate ('common/new_page_btn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>@constant('ADMIN_ADD_NEW_PRODUCT'),'shortcut'=>true), 0);?>

    <div class="search_block">
        <form method="GET" id="searchForm" action="">
            <input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['module'];?>
" />
            <input type="hidden" name="cid" value="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['cid'];?>
" />
            <input size="77" type="text" placeholder="поиск по артикулу или названию товара" id="categorySearch" name="filters[title]" value="<?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['filters']['title'])){?><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['filters']['title'];?>
<?php }?>" />
            <button type="submit" class="buttons right" style="margin-top:0; margin-right:3px;"><?php echo @constant('SITE_FOUND');?>
</button>
        </form>
    </div>
    <div class="clear"></div>
    <script type="text/javascript">
        $(function(){
            $('#categorySearch').autocomplete({
                source: function(request, response){
                    $.ajax({
                        url: '/interactive/ajax.php',
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            zone: 'admin',
                            action: 'liveSearch',
                            module: '<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['module'];?>
',
                            cid: <?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['cid'];?>
,
                            sort: '<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['sort'];?>
',
                            searchStr: request.term
                        },
                        success: function(json){
                            response($.map(json.items, function(item) {
                                return {
                                    label: item.title + " " + item.pcode,
                                    value: item.title + " " + item.pcode,
                                    category: item.ctitle
                                }
                            }));
                        }
                    });
                },
                select: function(event, ui){},
                minLength: 2
            });
        });
    </script>

    <form method="post" action="<?php echo ($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&task=reorderItems");?>
" name="reorderItems">
        <table width="100%" border="0" cellspacing="1" cellpadding="0" class="list" id="operationTbl">
            <tr>
                <td id="headb" align="center" width="12"></td>
                <td id="headb" align="center" width="38"></td>
                <td id="headb" align="left">
                    <a class="sort-order <?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['sort']=="title_asc"){?>desc<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['current_url'];?>
&sort=title_<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['sort']=="title_asc"){?>desc<?php }else{ ?>asc<?php }?>">
                        <?php echo @constant('HEAD_NAME');?>

                    </a>
                </td>
<?php if (!$_smarty_tpl->tpl_vars['arrPageData']->value['cid']){?>
                <td id="headb" align="center" width="120">
                    <a class="sort-order <?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['sort']=="category_asc"){?>desc<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['current_url'];?>
&sort=category_<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['sort']=="category_asc"){?>desc<?php }else{ ?>asc<?php }?>">
                        <?php echo @constant('HEAD_CATEGORY');?>

                    </a>
                </td>
<?php }?>
                <td id="headb" class="hidden" align="center" width="95"><?php echo @constant('HEAD_DATE_ADDED');?>
</td>
                <td id="headb" align="center" width="62">
                    <a class="sort-order <?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['sort']=="price_asc"){?>desc<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['current_url'];?>
&sort=price_<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['sort']=="price_asc"){?>desc<?php }else{ ?>asc<?php }?>">
                        <?php echo @constant('HEAD_PRICE');?>

                    </a>
                </td>
                <td id="headb" align="center" width="45">
                    <a class="sort-order <?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['sort']=="order_asc"){?>desc<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['current_url'];?>
&sort=order_<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['sort']=="order_asc"){?>desc<?php }else{ ?>asc<?php }?>">
                        <?php echo @constant('HEAD_SORT');?>

                    </a>
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
                <td align="center"><input type="checkbox" class="checkboxes" name="<?php if ($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['isshortcut']){?>arShortcuts[<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['shortcutID'];?>
]<?php }else{ ?>arItems[<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
]<?php }?>" onchange="SelectCheckBox(this);" value="1" /></td>
                <td align="center">
<?php if ($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['shortcutActive']){?>
                    <a href="<?php if ($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['isshortcut']){?>/admin/?module=shortcuts&task=publishItem&status=0&itemID=<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['shortcutID'];?>
<?php }else{ ?><?php echo ((($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url'])).("&task=publishItem&status=0&itemID=")).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
<?php }?>" title="<?php echo @constant('HEAD_NO_PUBLISH');?>
">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['system_images'];?>
check.png" alt="<?php echo @constant('HEAD_NO_PUBLISH');?>
" title="<?php echo @constant('HEAD_NO_PUBLISH');?>
" />
                    </a>
<?php }else{ ?>
                    <a href="<?php if ($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['isshortcut']){?>/admin/?module=shortcuts&task=publishItem&status=1&itemID=<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['shortcutID'];?>
<?php }else{ ?><?php echo ((($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url'])).("&task=publishItem&status=1&itemID=")).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
<?php }?>" title="<?php echo @constant('HEAD_PUBLISH');?>
">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['system_images'];?>
un_check.png" alt="<?php echo @constant('HEAD_PUBLISH');?>
" title="<?php echo @constant('HEAD_PUBLISH');?>
" />
                    </a>
<?php }?>
                </td>
                <td>
<?php if ($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['isshortcut']){?>
                    <a style="position:relative; z-index:10" href="/admin/?module=shortcuts&task=editItem&itemID=<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['shortcutID'];?>
">
                        <?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
 
                    </a>
                    <a target="_blank" style="position:relative" href="<?php echo ((($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url'])).("&task=editItem&itemID=")).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
">
                        <img style="position: absolute; right: -15px; top: -30px;" src="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['system_images'];?>
shortcut.png" />
                    </a>
<?php }else{ ?>
                    <a href="<?php echo ((($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url'])).("&task=editItem&itemID=")).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
"><?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
<?php if ($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['pcode']){?>, (<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['pcode'];?>
)<?php }?></a>
<?php }?>
                </td>
<?php if (!$_smarty_tpl->tpl_vars['arrPageData']->value['cid']){?>
                <td align="center"><?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['cat_title'];?>
</td>
<?php }?>
                <td align="center"> 
<?php if ($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['isshortcut']){?>
                    <?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['price'];?>

<?php }else{ ?>
                    <input type="text" size="7" value="<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['price'];?>
" name="arPrices[<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
]"/>
<?php }?>
                </td>
                <td align="center"><input type="text" name="<?php if ($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['isshortcut']){?>arShortcutsOrder[<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['shortcutID'];?>
]<?php }else{ ?>arOrder[<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
]<?php }?>" id="arOrder_<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" class="order" value="<?php if ($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['isshortcut']){?><?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['shortcutOrder'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['order'];?>
<?php }?>" maxlength="4" /></td>
                <td align="center" >
                    <a href="<?php if ($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['isshortcut']){?>/admin/?module=shortcuts&task=editItem&itemID=<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['shortcutID'];?>
<?php }else{ ?><?php echo ((($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url'])).("&task=editItem&itemID=")).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
<?php }?>" title="<?php echo @constant('LABEL_EDIT');?>
">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['system_images'];?>
edit.png" alt="<?php echo @constant('LABEL_EDIT');?>
" />
                    </a>
                </td>
                <td align="center">
                    <a href="<?php if ($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['isshortcut']){?>/admin/?module=shortcuts&task=deleteItem&itemID=<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['shortcutID'];?>
<?php }else{ ?><?php echo ((($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url'])).("&task=deleteItem&itemID=")).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
<?php }?>" onclick="return confirm('<?php echo @constant('CONFIRM_DELETE');?>
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
                <td width="107" align="left" style="padding:6px">
                    <input type="checkbox" value="0" class="checkboxes check_all" onchange="SelectCheckBox(this);"/> Отметить все &nbsp;
                </td>
                <td width="155">
                    <div class="dropDown" style="display:none;">
                        C отмеченными
                        <ul>
                            <li data-val="publish" onclick="$(this).parent().parent().find('input').val($(this).data('val')); $(this).closest('form').submit();">
                                <img src="/images/operation/check.png"/>&nbsp;&nbsp;опубликовать
                            </li>
                            <li data-val="unpublish" onclick="$(this).parent().parent().find('input').val($(this).data('val')); $(this).closest('form').submit();">
                                <img src="/images/operation/un_check.png"/>&nbsp;&nbsp;не публиковать
                            </li>
                            <li data-val="delete" onclick="$(this).parent().parent().find('input').val($(this).data('val')); $(this).closest('form').submit();">
                                <img src="/images/operation/delete.png"/>&nbsp;&nbsp;удалить
                            </li>
                        </ul>
                        <input type="hidden" name="allitems" value=""/>
                    </div>
                </td>
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
            <tr>
                <td align="left" colspan="3">&nbsp;Экспорт всех товаров: &nbsp;
                    <a href="<?php echo ($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&task=exportToCsv");?>
">CSV</a>, 
                    <a href="<?php echo ($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&task=exportToYml");?>
">YML</a>
                </td>
            </tr>
        </table>
    </form>
<?php }?>
</div>
<?php }} ?>