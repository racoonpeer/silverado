<?php /* Smarty version Smarty-3.1.14, created on 2017-12-02 22:41:52
         compiled from "tpl/backend/weblife/module/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12023036675a06b9c0cf59b4-60571435%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd99904badc013225c4417a9a72fb16fcc00a3109' => 
    array (
      0 => 'tpl/backend/weblife/module/main.tpl',
      1 => 1512247291,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12023036675a06b9c0cf59b4-60571435',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06b9c20599d6_44371813',
  'variables' => 
  array (
    'arrPageData' => 0,
    'categoryTree' => 0,
    'item' => 0,
    'arrRedirects' => 0,
    'typeID' => 0,
    'property' => 0,
    'itemID' => 0,
    'arModules' => 0,
    'iItem' => 0,
    'arrModules' => 0,
    'arrMenuTypes' => 0,
    'arrPageTypes' => 0,
    'items' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06b9c20599d6_44371813')) {function content_5a06b9c20599d6_44371813($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ('common/module_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>@constant('ADMIN_MAIN_TITLE'),'creat_title'=>@constant('ADMIN_CREATING_NEW_PAGE'),'edit_title'=>@constant('ADMIN_EDIT_CATEGORY_PAGE')), 0);?>

<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['task']!='addItem'&&$_smarty_tpl->tpl_vars['arrPageData']->value['task']!='editItem'){?>     
<?php echo $_smarty_tpl->getSubTemplate ('common/new_page_btn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>@constant('ADMIN_ADD_NEW')), 0);?>

<div class="clear"></div>
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ('common/left_category_menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('categoryTree'=>$_smarty_tpl->tpl_vars['categoryTree']->value), 0);?>


<div id="right_block">

<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['task']=='addItem'||$_smarty_tpl->tpl_vars['arrPageData']->value['task']=='editItem'){?>
    <form method="post" action="<?php echo (($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&task=")).($_smarty_tpl->tpl_vars['arrPageData']->value['task']);?>
<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['itemID']>0){?><?php echo (('').("&itemID=")).($_smarty_tpl->tpl_vars['arrPageData']->value['itemID']);?>
<?php }?>" name="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['task'];?>
Form" onsubmit="return formCheck(this);" enctype="multipart/form-data">
        <input type="hidden" name="created" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['created'];?>
" />
        <input type="hidden" name="order" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['order'];?>
" />
        <div class="tabsContainer">
            <ul class="nav">
                <li><a href="javascript:void(0);" data-target="main" class="active">Основные</a></li>
<?php if ($_smarty_tpl->tpl_vars['item']->value['module']=='catalog'){?>
                <li><a href="javascript:void(0);" data-target="attributes" >Характеристики</a></li>
<?php }?>
                <li><a href="javascript:void(0);" data-target="seo">SEO</a></li>
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
                                <input class="left" name="title" size="58" id="title" style="margin-top:5px; margin-right:10px;" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
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
                                            <select class="field" name="redirectid" onchange="itemsShowHide(this.form);" style="width: 245px;" <?php if (!empty($_smarty_tpl->tpl_vars['item']->value['redirecturl'])){?>disabled<?php }?>>
                                                <option value="">- - <?php echo @constant('HEAD_SELECT_REDIRECT_LINK');?>
 - -</option>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrRedirects']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<?php if (!empty($_smarty_tpl->tpl_vars['arrRedirects']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['i']['index']]['categories'])){?>
                                                <optgroup label="<?php echo $_smarty_tpl->tpl_vars['arrRedirects']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['menutitle'];?>
">
                                                    <?php echo $_smarty_tpl->getSubTemplate ('common/tree_redirects.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arItems'=>$_smarty_tpl->tpl_vars['arrRedirects']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['categories'],'selID'=>$_smarty_tpl->tpl_vars['item']->value['redirectid'],'marginLevel'=>0), 0);?>

                                                </optgroup>
<?php }?>
<?php endfor; endif; ?>
                                            </select>
                                        </td>
                                        <td align="center">
                                            <input id="redirectype" name="redirectype" onchange="itemsShowHide(this.form);" type="checkbox" value="1" class="field" onclick="manageSelections(this, this.form.redirectid, this.form.redirecturl);" <?php if (!empty($_smarty_tpl->tpl_vars['item']->value['redirecturl'])){?> checked<?php }?> />
                                       </td>
                                       <td align="center">
                                           <input id="redirecturl" name="redirecturl" type="text" size="36" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['redirecturl'];?>
"  class="field" <?php if (empty($_smarty_tpl->tpl_vars['item']->value['redirecturl'])){?> disabled<?php }?> />
                                       </td>
                                    </tr>
                                </table>
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
                                <textarea style="width:640px; height: 500px;" id="fulldescription" name="text" ><?php echo $_smarty_tpl->tpl_vars['item']->value['text'];?>
</textarea>
                            </td>
                            <td class="buttons_row"></td>
                        </tr>    
                    </table>
                </li>
<?php if ($_smarty_tpl->tpl_vars['item']->value['module']=='catalog'){?>
                <li class="" id="tab_attributes">
                    <table border="1" cellspacing="0" cellpadding="1" class="list">
                        <tr>
                            <td id="headb" align="left">Структурная категория</td>
                            <td align="left" id="essentials">
                                <input type="radio" name="essential" value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value['essential']==1){?>checked<?php }?>>
                                <?php echo @constant('OPTION_YES');?>

                                <input type="radio" name="essential" value="0" <?php if ($_smarty_tpl->tpl_vars['item']->value['essential']==0){?>checked<?php }?>>
                                <?php echo @constant('OPTION_NO');?>

                            </td>
                            <td class="buttons_row"></td>
                        </tr>
                        <tr>
                            <td id="headb" align="left">Акционная категория</td>
                            <td align="left" id="essentials">
                                <input type="radio" name="is_stock" value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value['is_stock']==1){?>checked<?php }?>>
                                <?php echo @constant('OPTION_YES');?>

                                <input type="radio" name="is_stock" value="0" <?php if ($_smarty_tpl->tpl_vars['item']->value['is_stock']==0){?>checked<?php }?>>
                                <?php echo @constant('OPTION_NO');?>

                            </td>
                            <td class="buttons_row"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <strong>Ключевое свойство</strong>
                                <label id="savePropertyInProducts"><input type="checkbox" name="savePropertyInProducts" value="1"/> применить ко всем дочерним товарам</label>
                                <table>
                                    <tr>
                                        <td>
                                            <select name="property_type" id="selectPropertyType" onchange="changePropertyType();" style="width: 120px;">
                                                <option value="0"> -- Не выбрано -- </option>
<?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['propertyTypes'])){?>
<?php  $_smarty_tpl->tpl_vars['property'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['property']->_loop = false;
 $_smarty_tpl->tpl_vars['typeID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arrPageData']->value['propertyTypes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['property']->key => $_smarty_tpl->tpl_vars['property']->value){
$_smarty_tpl->tpl_vars['property']->_loop = true;
 $_smarty_tpl->tpl_vars['typeID']->value = $_smarty_tpl->tpl_vars['property']->key;
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['typeID']->value;?>
" data-type="<?php echo $_smarty_tpl->tpl_vars['property']->value['typename'];?>
"><?php echo $_smarty_tpl->tpl_vars['property']->value['title'];?>
</option>
<?php } ?>
<?php }?>
                                            </select>
                                        </td>
                                        <td id="propertyBrand" style="display: none;">
                                            <input type="text" name="property_brand" id="searchPropertyBrand" placeholder="Поиск бренда"/>
                                            <div id="foundedPropertyBrand" class="selectedAttr" style="width: auto; display: inline-block; vertical-align: top;"></div>
                                        </td>
                                        <td id="propertySeries" style="display: none;">
                                            <input type="text" name="property_series" id="searchPropertySeries" placeholder="Поиск серии"/>
                                            <div id="foundedPropertySeries" class="selectedAttr" style="width: auto; display: inline-block; vertical-align: top;"></div>
                                        </td>
                                        <td id="propertyAttributeSelect" style="display: none;">
                                            <select name="property_attribute" id="selectPropertyAttribute" style="width: 120px;">
                                                <option value="0"> -- Выберите атрибут -- </option>
<?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['attributes'])){?>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrPageData']->value['attributes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
</option>
<?php endfor; endif; ?>
<?php }?>
                                            </select>
                                        </td>
                                        <td id="propertyAttributeSearch" style="display: none;">
                                            <input type="text" id="searchPropertyAttribute" placeholder="Поиск значения атрибута"/>
                                            <div id="foundedPropertyAttribute" class="selectedAttr" style="width: auto; display: inline-block; vertical-align: top;"></div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td class="buttons_row">
                                <script type="text/javascript">
                                    $(function(){
<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['keyProperty'])){?>
                                        changePropertyType("<?php echo $_smarty_tpl->tpl_vars['item']->value['keyProperty']['typename'];?>
");
                                        var objProperty = {
                                            typename: "<?php echo $_smarty_tpl->tpl_vars['item']->value['keyProperty']['typename'];?>
",
                                            typeID  : <?php echo intval($_smarty_tpl->tpl_vars['item']->value['keyProperty']['type_id']);?>
,
                                            attrID  : <?php echo intval($_smarty_tpl->tpl_vars['item']->value['keyProperty']['attribute_id']);?>
,
                                            valID   : <?php echo intval($_smarty_tpl->tpl_vars['item']->value['keyProperty']['value_id']);?>
,
                                            value   : "<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['keyProperty']['valueItem'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['keyProperty']['valueItem']['title'];?>
<?php }?>"
                                        };
                                        selectProperty(objProperty);
<?php }?>
                                    });
                                    function selectProperty (property) {
                                        var selectType      = document.getElementById("selectPropertyType"),
                                            currentType     = property.typename,
                                            searchBrand     = document.getElementById("searchPropertyBrand"),
                                            searchSeries    = document.getElementById("searchPropertySeries"),
                                            selectAttribute = document.getElementById("selectPropertyAttribute"),
                                            searchAttribute = document.getElementById("searchPropertyAttribute");
                                        $.each($(selectType).find("option"), function(i, option){
                                            if (option.value==property.typeID) $(option).prop("selected", true);
                                        });
                                        if (currentType=="brand" && property.valID>0) {
                                            var html  = "<div class=\"attr\">";
                                                html += "<input type=\"hidden\" name=\"property_value\" value=\"" + property.valID + "\"/>";
                                                html += property.value + "<span onclick=\"$(this).parent().remove();\">X</span>";
                                                html += "</div>";
                                            $("#foundedPropertyBrand").html(html);
                                        }
                                        if (currentType=="series" && property.valID>0) {
                                            var html  = "<div class=\"attr\">";
                                                html += "<input type=\"hidden\" name=\"property_value\" value=\"" + property.valID + "\"/>";
                                                html += property.value + "<span onclick=\"$(this).parent().remove();\">X</span>";
                                                html += "</div>";
                                            $("#foundedPropertySeries").html(html);
                                        }
                                        if (currentType=="attribute" && property.attrID>0 && property.valID>0) {
                                            $.each($(selectAttribute).find("option"), function(i, option){
                                                if (option.value==property.attrID) $(option).prop("selected", true);
                                            });
                                            $(selectAttribute).trigger("change");
                                            var html  = "<div class=\"attr\">";
                                                html += "<input type=\"hidden\" name=\"property_value\" value=\"" + property.valID + "\"/>";
                                                html += property.value + "<span onclick=\"$(this).parent().remove();\">X</span>";
                                                html += "</div>";
                                            $("#foundedPropertyAttribute").html(html);
                                        }
                                    }
                                    function changePropertyType(typename) {
                                        typename = typename||false;
                                        var selectType      = document.getElementById("selectPropertyType"),
                                            currentType     = typename||$(selectType).find("option:selected").data("type"),
                                            searchBrand     = document.getElementById("searchPropertyBrand"),
                                            searchSeries    = document.getElementById("searchPropertySeries"),
                                            selectAttribute = document.getElementById("selectPropertyAttribute"),
                                            searchAttribute = document.getElementById("searchPropertyAttribute"),
                                            essentials      = document.getElementById("essentials");
                                            $(essentials).find('input').removeAttr('disabled');
                                            switch (currentType) {
                                                // Brand type selected
                                                case "brand":
                                                    $("#propertySeries").hide();
                                                    $("#propertyAttributeSelect").hide();
                                                    $("#propertyAttributeSearch").hide();
                                                    $("#propertyAttributeSearch").find(".attr").remove();
                                                    $(selectAttribute).find("option:selected").prop("selected", false);
                                                    $("#propertyBrand").show();
                                                    searchKeyProperty(currentType, searchBrand, $("#foundedPropertyBrand"));
                                                    $(essentials).find('input').prop('disabled', true);
                                                    $('#savePropertyInProducts').hide();
                                                    break;
                                                // Series type selected
                                                case "series":
                                                    $("#propertyBrand").hide();
                                                    $("#propertyAttributeSelect").hide();
                                                    $("#propertyAttributeSearch").hide();
                                                    $("#propertyAttributeSearch").find(".attr").remove();
                                                    $(selectAttribute).find("option:selected").prop("selected", false);
                                                    $("#propertySeries").show();
                                                    searchKeyProperty(currentType, searchSeries, $("#foundedPropertySeries"));
                                                    $(essentials).find('input').prop('disabled', true);
                                                    $('#savePropertyInProducts').hide();
                                                    break;
                                                // Attribute type selected
                                                case "attribute":
                                                    $("#propertyBrand").hide();
                                                    $("#propertySeries").hide();
                                                    $("#propertyAttributeSelect").show();
                                                    $("#propertyAttributeSearch").hide();
                                                    $('#savePropertyInProducts').show();
                                                    $(selectAttribute).on("change", function(){
                                                        changePropertyAttribute(currentType, searchAttribute, this.value);
                                                    });                                                
                                                    break;
                                                // Options, not selected
                                                default:
                                                    $("#propertyBrand").hide();
                                                    $("#propertyBrand").find(".attr").remove();
                                                    $("#propertySeries").hide();
                                                    $("#propertySeries").find(".attr").remove();
                                                    $("#propertyAttributeSelect").hide();
                                                    $("#propertyAttributeSearch").hide();
                                                    $("#propertyAttributeSearch").find(".attr").remove();
                                                    $('#savePropertyInProducts').hide();
                                                    $(selectAttribute).find("option:selected").prop("selected", false);
                                                    if(typeof currentType != "undefined")
                                                        $(essentials).find('input').prop('disabled', true);
                                                    break;
                                            }
                                    }
                                    function changePropertyAttribute (type, input, aid) {
                                        if (aid > 0) {
                                            $("#propertyAttributeSearch").show();
                                            $("#propertyAttributeSearch").find(".attr").remove();
                                            searchKeyProperty(type, input, $("#foundedPropertyAttribute"), aid);
                                        } else {
                                            $("#propertyAttributeSearch").hide();
                                        }
                                    }
                                    function searchKeyProperty (type, input, holder, aid) {
                                        aid = aid||0;
                                        $(input).autocomplete({
                                            source: function(request, response) {
                                                $.ajax({
                                                    url: "/interactive/ajax.php",
                                                    type: "GET",
                                                    dataType: "json",
                                                    data: {
                                                        zone     : "admin",
                                                        action   : "AjaxSearchKeyProperty",
                                                        type     : type,
                                                        aid      : aid,
                                                        searchStr: request.term,
                                                    },
                                                    success: function (json) {
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
                                                    html += "<input type=\"hidden\" name=\"property_value\" value=\"" + ui.item.id + "\"/>";
                                                    html += ui.item.label + "<span onclick=\"$(this).parent().remove();\">X</span>";
                                                    html += "</div>";
                                                holder.html(html);
                                                $(this).val("");
                                                return false;
                                            },
                                            minLength: 2
                                        });
                                    }
                                </script>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <strong><?php echo @constant('HEAD_ATTRIBUTE_MANAGER');?>
</strong><br/><br/>
                                <table width="100%" cellspacing="10">
                                    <tr valign="top">
                                        <td id="attrGroupsList">
                                            <strong><?php echo @constant('ATTRIBUTE_GROUPS');?>
:</strong>
                                            <div class="sortable-wrapper halfsize" >
                                                <ul class="sortable">
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
                                                    <li class="ui-state-default">
                                                        <input type="checkbox" name="attrGroups[]" value="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['attrGroups'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" onchange="updateAttributesList(this);" <?php if (in_array($_smarty_tpl->tpl_vars['arrPageData']->value['attrGroups'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'],$_smarty_tpl->tpl_vars['item']->value['attrGroups'])){?>checked<?php }?>/> <label title="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['attrGroups'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['descr'];?>
"><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['attrGroups'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
</label>
                                                    </li>
<?php endfor; endif; ?>
                                                </ul>
                                            </div>
                                        </td>
                                        <td id="attributesList">
                                            <strong><?php echo @constant('LABEL_ATTRIBUTES');?>
:</strong>
                                            <div class="sortable-wrapper halfsize">
                                                <ul class="sortable">
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrPageData']->value['attributes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<?php if (in_array($_smarty_tpl->tpl_vars['arrPageData']->value['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['gid'],$_smarty_tpl->tpl_vars['item']->value['attrGroups'])){?>
                                                    <li class="ui-state-default <?php if (!in_array($_smarty_tpl->tpl_vars['arrPageData']->value['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'],$_smarty_tpl->tpl_vars['item']->value['attributes'])){?>ui-state-disabled<?php }?>" data-gid="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['gid'];?>
">
                                                        <input type="checkbox" name="attributes[]" value="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" onchange="toggleBoxState(this);" <?php if (in_array($_smarty_tpl->tpl_vars['arrPageData']->value['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'],$_smarty_tpl->tpl_vars['item']->value['attributes'])){?>checked<?php }?>/> <label title="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['descr'];?>
"><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
 (<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['gtitle'];?>
)</label>
                                                    </li>
<?php }?>
<?php endfor; endif; ?>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <br/>
                            </td>
                            <td class="buttons_row" valign="top" width="145" align="center">
                                <!-- ++++++++++ Start Buttons ++++++++++++++++++++++++++++++++++++++++++++++ -->
                                <?php echo $_smarty_tpl->getSubTemplate ('common/buttons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('itemID'=>$_smarty_tpl->tpl_vars['item']->value['id'],'task'=>$_smarty_tpl->tpl_vars['arrPageData']->value['task'],'deleteIDLimit'=>0), 0);?>

                                <!-- ++++++++++ End Buttons ++++++++++++++++++++++++++++++++++++++++++++++++ -->
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <strong><?php echo @constant('HEAD_FILTERS_MANAGER');?>
</strong><br/><br/>
                                <table width="100%" cellspacing="10">
                                    <tr valign="top">
                                        <td width="50%" id="filtersAllList">
                                            <strong><?php echo @constant('LABEL_FILTERS_MAIN_LIST');?>
:</strong>
                                            <div class="sortable-wrapper halfsize">
                                                <ul class="sortable">
    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrPageData']->value['filters']['all']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                                    <li class="ui-state-default <?php if (!in_array($_smarty_tpl->tpl_vars['arrPageData']->value['filters']['all'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'],$_smarty_tpl->tpl_vars['item']->value['filters']['all'])){?>ui-state-disabled<?php }?>">
                                                        <input type="checkbox" name="filters[all][]" value="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['filters']['all'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" onchange="updateFiltersList(this);" <?php if (in_array($_smarty_tpl->tpl_vars['arrPageData']->value['filters']['all'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'],$_smarty_tpl->tpl_vars['item']->value['filters']['all'])){?>checked<?php }?>/> <label><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['filters']['all'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
</label>
                                                    </li>
    <?php endfor; endif; ?>
                                                </ul>
                                            </div>
                                        </td>
                                        <td width="50%" id="filtersSeoList">
                                            <strong><?php echo @constant('LABEL_FILTERS_SHORT_LIST');?>
:</strong>
                                            <div class="sortable-wrapper halfsize">
                                                <ul class="sortable">
    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrPageData']->value['filters']['seo']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                                    <li class="ui-state-default <?php if (!in_array($_smarty_tpl->tpl_vars['arrPageData']->value['filters']['seo'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'],$_smarty_tpl->tpl_vars['item']->value['filters']['seo'])){?>ui-state-disabled<?php }?>" data-fid="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['filters']['seo'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
">
                                                        <input type="checkbox" name="filters[seo][]" value="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['filters']['seo'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" onchange="toggleBoxState(this);" <?php if (in_array($_smarty_tpl->tpl_vars['arrPageData']->value['filters']['seo'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'],$_smarty_tpl->tpl_vars['item']->value['filters']['seo'])){?>checked<?php }?>/> <label><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['filters']['seo'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
 <strong><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['filters']['seo'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['alias'];?>
</strong></label>
    <?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['filters']['seo'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['tid']==1){?>
                                                        <a href="/admin/?module=brands" target="_blank">
                                                            <img src="/images/operation/edit.png" height="10">
                                                        </a>
    <?php }elseif($_smarty_tpl->tpl_vars['arrPageData']->value['filters']['seo'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['tid']!=1&&!empty($_smarty_tpl->tpl_vars['arrPageData']->value['filters']['seo'][$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['i']['index']]['aid'])){?>
                                                        <a href="/admin/?module=attributes_values&task=editItem&itemID=<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['filters']['seo'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['aid'];?>
&ajax=1" onclick="return hs.htmlExpand(this, {headingText:'<?php echo @constant('ATTRIBUTES');?>
: <?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['filters']['seo'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
', objectType:'iframe', preserveContent: false, width:910});">
                                                            <img src="/images/operation/edit.png" height="10">
                                                        </a>
    <?php }?>
                                                    </li>
    <?php endfor; endif; ?>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td class="buttons_row"></td>
                        </tr>
                    
                        <tr>
                            <td colspan="2">
                                <strong><?php echo @constant('HEAD_META_TEMPLATES');?>
</strong><br/><br/>
                                <table width="100%">
                                    <tr>
                                        <td colspan="2">
                                            <div class="inline">H1</div>
                                            <input type="text" name="filter_title" id="filter_title" size="102" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['filter_title'];?>
"/><br/><br/>
                                            <div class="inline"><?php echo @constant('HEAD_SEO_TITLE');?>
</div>
                                            <input type="text" name="filter_seo_title" id="filter_seo_title" size="102" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['filter_seo_title'];?>
"/><br/><br/>
                                            <div class="inline"><?php echo @constant('HEAD_DESCRIPTION');?>
 </div>
                                            <input type="text" name="filter_meta_descr" id="filter_meta_descr" size="102" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['filter_meta_descr'];?>
" /><br/><br/>
                                            <div class="inline"><?php echo @constant('HEAD_KEYWORDS');?>
</div>
                                            <input type="text" name="filter_meta_key" id="filter_meta_key" size="102" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['filter_meta_key'];?>
" /><br/><br/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="inline"><?php echo @constant('HEAD_SEO_TEXT');?>
</div><br/>
                                            <textarea name="filter_seo_text" id="seoText" style="width: 100%; height: 250px;"><?php echo $_smarty_tpl->tpl_vars['item']->value['filter_seo_text'];?>
</textarea>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td class="buttons_row"></td>
                        </tr>
                    </table>   
                    <script type="text/javascript">
                        // update attributes sortable list
                        function updateAttributesList(CB) {
                            var Gid = CB.value;
                            if(CB.checked) {
                                $.ajax({
                                    url: '/interactive/ajax.php',
                                    type: 'GET',
                                    dataType: 'json',
                                    data: {
                                        zone: 'admin',
                                        action: 'updateSortableList',
                                        listType: 'attributes',
                                        gid: parseInt(Gid)
                                    },
                                    success: function(json) {
                                        if(json.output) {
                                            $('#attributesList').find('ul').append(json.output);
                                        }
                                    }
                                });
                            } else {
                                $.each($('#attributesList').find('ul').children('li'), function(i, li){
                                    if($(li).data('gid') == Gid) {
                                        $(li).remove();
                                    }
                                });
                            }

                            toggleBoxState(CB);
                        }
                        // update filters sortable list
                        function updateFiltersList(CB) {
                            var Fid = CB.value;
                            if(CB.checked) {
                                // update filters in seo list
                                $.ajax({
                                    url: '/interactive/ajax.php',
                                    type: 'GET',
                                    dataType: 'json',
                                    data: {
                                        zone: 'admin',
                                        action: 'updateSortableList',
                                        listType: 'filters',
                                        filterType: 'seo',
                                        fid: parseInt(Fid)
                                    },
                                    success: function(json) {
                                        if(json.output) {
                                            $('#filtersSeoList').find('ul').append(json.output);
                                        }
                                    },
                                    complete: function() {}
                                });
                            } else {
                                $.each($('#filtersSeoList').find('ul').children('li'), function(i, li){
                                    if($(li).data('fid') == Fid) {
                                        $(li).remove();
                                    }
                                });
                            }
                            toggleBoxState(CB);
                        }
                        function toggleBoxState(CB) {
                            if(CB.checked) {
                                if($(CB).parent().hasClass('ui-state-disabled')) {
                                    $(CB).parent().removeClass('ui-state-disabled');
                                }
                            } else {
                                if(!$(CB).parent().hasClass('ui-state-disabled')) {
                                    $(CB).parent().addClass('ui-state-disabled');
                                }
                            }
                        }
                        // applying the custom sorting of sortable lists
                        function applySorting() {
                            var lists = $(document).find('.sortable');
                            $(lists).each(function(i, list){
                                var items = $(list).children('li');
                                $(items).each(function(n, item){
                                    var cb = $(item).find('input[type="checkbox"]');
                                    var basename = String($(cb).attr('name')).substr(0, String($(cb).attr('name')).indexOf('['));
                                    $(cb).attr('name', basename + '[' + n + ']')
                                });
                            });
                        }
                    </script>
                </li>
<?php }?>
                <li id="tab_seo">
                    <table width="101%" border="0" cellspacing="0" cellpadding="0" class="list" > 
                        <!-- ++++++++++ Start Buttons ++++++++++++++++++++++++++++++++++++++++++++++ -->
                        <?php echo $_smarty_tpl->getSubTemplate ('common/meta_seo_data.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('itemID'=>$_smarty_tpl->tpl_vars['itemID']->value,'seoTable'=>@constant('MAIN_TABLE')), 0);?>

                        <!-- ++++++++++ End Buttons ++++++++++++++++++++++++++++++++++++++++++++++++ --> 
                    </table>
                </li>
                <li id="tab_settings">
                    <table width="101%" border="0" cellspacing="0" cellpadding="0" class="list" > 
                        <tr>
                            <td colspan="2">
                                <strong><?php echo @constant('HEAD_PAGE_SETTINGS');?>
</strong><br/><br/>
                                <div class="inline"><?php echo @constant('HEAD_PARENT');?>
</div>
                                <select name="pid" class="field" <?php if ($_smarty_tpl->tpl_vars['item']->value['id']==1){?> disabled<?php }?> <?php if (!empty($_smarty_tpl->tpl_vars['item']->value['id'])){?> onchange="hideApplyBut(this, this.form.submit_apply, <?php echo $_smarty_tpl->tpl_vars['item']->value['pid'];?>
);" <?php }?>>
                                    <option value="0"> &nbsp;&nbsp;&nbsp;- - <?php echo @constant('HEAD_ROOT_LEVEL');?>
 - -&nbsp;&nbsp;&nbsp; </option>
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
"<?php if ($_smarty_tpl->tpl_vars['item']->value['pid']==$_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']||(empty($_smarty_tpl->tpl_vars['item']->value['pid'])&&$_smarty_tpl->tpl_vars['arrPageData']->value['pid']==$_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'])){?> selected<?php }?><?php if ($_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']==$_smarty_tpl->tpl_vars['item']->value['id']||$_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']<10||($_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['module']&&!in_array($_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['module'],$_smarty_tpl->tpl_vars['arrPageData']->value['allowedSubPageModules']))){?> disabled<?php }?>>
                                        <?php echo $_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['margin'];?>
<?php echo $_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
 &nbsp; ( <?php if ($_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['active']==0){?><?php echo @constant('HEAD_INACTIVE');?>
, <?php }?><?php echo $_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['menutitle'];?>
 ) &nbsp; 
                                    </option>    
<?php if (!empty($_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['i']['index']]['childrens'])){?>
                                    <!-- ++++++++++ Start Tree Childrens +++++++++++++++++++++++++++++++++++++++ -->
                                    <?php echo $_smarty_tpl->getSubTemplate ('common/depends_tree_childrens.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('itemID'=>$_smarty_tpl->tpl_vars['item']->value['id'],'dependID'=>$_smarty_tpl->tpl_vars['item']->value['pid'],'arrChildrens'=>$_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['childrens']), 0);?>

                                    <!-- ++++++++++ End Tree Childrens +++++++++++++++++++++++++++++++++++++++++ -->
<?php }?>
<?php endfor; endif; ?>
                                </select><br/><br/>
                                <div class="inline"><?php echo @constant('HEAD_MODULE');?>
</div>
                                <select class="field" name="module" <?php if (!empty($_smarty_tpl->tpl_vars['item']->value['submodules'])){?> disabled<?php }?>>
                                    <option value=""> &nbsp; <?php echo @constant('HEAD_MODULE_NOT_SELECT');?>
 &nbsp; </option>
<?php  $_smarty_tpl->tpl_vars['iItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['iItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arModules']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['iItem']->key => $_smarty_tpl->tpl_vars['iItem']->value){
$_smarty_tpl->tpl_vars['iItem']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['iItem']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['item']->value['module']==$_smarty_tpl->tpl_vars['iItem']->value){?> selected<?php }?><?php if (isset($_smarty_tpl->tpl_vars['arrModules']->value[$_smarty_tpl->tpl_vars['iItem']->value])&&$_smarty_tpl->tpl_vars['item']->value['module']!=$_smarty_tpl->tpl_vars['iItem']->value&&!in_array($_smarty_tpl->tpl_vars['iItem']->value,$_smarty_tpl->tpl_vars['item']->value['arParentModules'])){?> disabled<?php }?>> &nbsp; <?php echo $_smarty_tpl->tpl_vars['iItem']->value;?>
 &nbsp; <?php if (isset($_smarty_tpl->tpl_vars['arrModules']->value[$_smarty_tpl->tpl_vars['iItem']->value])){?> (<?php echo $_smarty_tpl->tpl_vars['arrModules']->value[$_smarty_tpl->tpl_vars['iItem']->value]['title'];?>
) &nbsp; <?php }?></option>
<?php } ?>
                                </select><br/><br/>
                                <div class="inline left"><?php echo @constant('HEAD_PAGE_ACCESS');?>
</div>
                                <div class="left" style="margin-left:4px;">
                                    <select class="field" name="access"<?php if ($_smarty_tpl->tpl_vars['item']->value['id']>0){?> onchange="manageSubAccessInput(this, this.form.sub_access);"<?php }?> >
                                        <option value="1"><?php echo @constant('OPTION_YES');?>
&nbsp;</option>
                                        <option value="0"<?php if ($_smarty_tpl->tpl_vars['item']->value['access']==0){?> selected<?php }?>><?php echo @constant('OPTION_NO');?>
&nbsp;</option>
                                    </select> 
                                    &nbsp;<label for="sub_access" title="<?php echo @constant('HEAD_APPLY_TO_ALL_CHILD');?>
">
                                        <?php echo @constant('HEAD_ALL_CHILD');?>

                                        <input id="sub_access" name="sub_access" type="checkbox" value="1"<?php if ($_smarty_tpl->tpl_vars['item']->value['access']==0){?> readonly  checked<?php }elseif(!$_smarty_tpl->tpl_vars['item']->value['id']){?> disabled<?php }?> onclick="if(this.readonly){return false;}" />
                                    </label>
<?php if ($_smarty_tpl->tpl_vars['item']->value['access']==0){?>
                                    <script type="text/javascript">
                                        document.getElementById('sub_access').readonly = true;
                                    </script>
<?php }?>
                                </div>
                                <div class="clear"></div><br/>
                                <div class="inline left">Разделитель</div>
                                <div class="left" style="margin-left:4px;">
                                    <input type="checkbox" name="separate" id="separate" value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value['separate']>0){?>checked<?php }?>/> 
                                </div>
                                <div class="clear"></div>
                                <div class="inline"><?php echo @constant('HEAD_MENU_TYPES');?>
</div>
                                <select class="field" name="menutype" <?php if ($_smarty_tpl->tpl_vars['item']->value['menutype']==8){?> disabled<?php }?>>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrMenuTypes']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['arrMenuTypes']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['menutype'];?>
"
                                            <?php if ($_smarty_tpl->tpl_vars['item']->value['menutype']==$_smarty_tpl->tpl_vars['arrMenuTypes']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['menutype']){?> selected<?php }?>> 
                                        &nbsp; <?php echo $_smarty_tpl->tpl_vars['arrMenuTypes']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
 &nbsp; 
                                    </option>
<?php endfor; endif; ?>
                                </select><br/><br/>
                                <div class="inline"><?php echo @constant('HEAD_PAGE_TYPE');?>
</div>
                                <select class="field" name="pagetype" <?php if ($_smarty_tpl->tpl_vars['item']->value['menutype']==8){?> disabled<?php }?>>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrPageTypes']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['arrPageTypes']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['pagetype'];?>
"  <?php if ($_smarty_tpl->tpl_vars['item']->value['pagetype']==$_smarty_tpl->tpl_vars['arrPageTypes']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['pagetype']){?> selected<?php }?>> 
                                        &nbsp; <?php echo $_smarty_tpl->tpl_vars['arrPageTypes']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
 &nbsp; 
                                    </option>
<?php endfor; endif; ?>
                                </select>
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
<?php }else{ ?>    
    <form method="post" action="<?php echo ($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&task=reorderItems");?>
" name="reorderItems">
    <?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['arBackpage'])){?>
    <a href="<?php echo (($_smarty_tpl->tpl_vars['arrPageData']->value['admin_url']).("&pid=")).($_smarty_tpl->tpl_vars['arrPageData']->value['arBackpage']['id']);?>
">..<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['arBackpage']['title'];?>
</a>
    <?php }?>
    <table width="100%" border="0" cellspacing="1" cellpadding="0" class="list">
        <tr>
            <td id="headb" align="center" width="38"></td>
            <td id="headb" align="left" ><?php echo @constant('HEAD_TITLE');?>
</td> 
            <td id="headb" align="center" width="38"><?php echo @constant('HEAD_MENU_TYPES');?>
</td>
            <td id="headb" align="center" width="38"><?php echo @constant('HEAD_SUB_PAGES');?>
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
                <a href="<?php echo (($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&task=publishItem&status=0&itemID=")).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
" title="<?php echo @constant('HEAD_NO_PUBLISH');?>
">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['system_images'];?>
check.png" alt="<?php echo @constant('HEAD_NO_PUBLISH');?>
" title="<?php echo @constant('HEAD_NO_PUBLISH');?>
" />
                </a>
<?php }else{ ?>
                <a href="<?php echo (($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&task=publishItem&status=1&itemID=")).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
" title="<?php echo @constant('HEAD_PUBLISH');?>
">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['system_images'];?>
un_check.png" alt="<?php echo @constant('HEAD_PUBLISH');?>
" title="<?php echo @constant('HEAD_PUBLISH');?>
" />
                </a>
<?php }?>
            </td>
            <td><a href="<?php echo (($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&task=editItem&itemID=")).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
"><?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
</a></td>
            <td align="center">
<?php if ($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['menutype']!=8){?>
                <a href="<?php echo (($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&itemID=")).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
&task=changeMenuType&status=<?php if ($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['mn_type']>0&&$_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['mn_type']<count($_smarty_tpl->tpl_vars['arrMenuTypes']->value)){?><?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['mn_type'];?>
<?php }else{ ?>0<?php }?>" title="<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['arMenuType']['title'];?>
, (<?php echo @constant('HEAD_TYPE');?>
 <?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['menutype'];?>
)" onclick="return confirm('<?php echo @constant('CONFIRM_CHANGE_MENU_TYPE');?>
');">
<?php }?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['system_images'];?>
<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['arMenuType']['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['arMenuType']['title'];?>
, (<?php echo @constant('HEAD_TYPE');?>
 <?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['menutype'];?>
)" title="<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['arMenuType']['title'];?>
, (<?php echo @constant('HEAD_TYPE');?>
 <?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['menutype'];?>
)" />
<?php if ($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['menutype']!=8){?>
                </a>
<?php }?>
            </td>
            <td align="center"> 
            <?php if ($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']>10&&!$_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['module']||in_array($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['module'],$_smarty_tpl->tpl_vars['arrPageData']->value['allowedSubPageModules'])){?>
                <a href="<?php echo ((($_smarty_tpl->tpl_vars['arrPageData']->value['admin_url']).('&pid=')).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'])).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url']);?>
" title="<?php echo @constant('HEAD_ADD_VIEW_SUB_PAGES');?>
">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['system_images'];?>
add_tree.png" alt="<?php echo @constant('HEAD_ADD_VIEW_SUB_PAGES');?>
" title="<?php echo @constant('HEAD_ADD_VIEW_SUB_PAGES');?>
" />
                </a>
                <?php if ($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['childrens']){?><small class="subchildrens"><?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['childrens'];?>
</small><?php }?>
            <?php }else{ ?>
                 --
            <?php }?>
            </td>
            <td align="center">
                <input type="text" name="arOrder[<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
]" id="arOrder_<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" class="field_smal" value="<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['order'];?>
" style="width:27px;padding-left:0px;text-align:center;" maxlength="4" />
            </td>
            <td align="center" >
                <a href="<?php echo (($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&task=editItem&itemID=")).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
" title="<?php echo @constant('LABEL_EDIT');?>
">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['system_images'];?>
edit.png" alt="<?php echo @constant('LABEL_EDIT');?>
" />
                </a>
            </td>
            <td align="center">
<?php if ($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']>10){?>
                <a href="<?php echo (($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&task=deleteItem&itemID=")).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
" onclick="return confirm('<?php echo @constant('CONFIRM_DELETE_CAT');?>
');" title="<?php echo @constant('LABEL_DELETE');?>
">
                   <img src="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['system_images'];?>
delete.png" alt="<?php echo @constant('LABEL_DELETE');?>
" title="<?php echo @constant('LABEL_DELETE');?>
" />
                </a>
<?php }else{ ?>
                --
<?php }?>
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
<script type="text/javascript">
<!--
    function formCheck(form){
        if(form.title.value.length == 0){
           alert('<?php echo @constant('ALERT_EMPTY_PAGE_TITLE');?>
'); 
           return false;
        }
        return true;
    }
    function manageSubAccessInput(main, slave) {
        if(main.value==0){
             slave.readonly = true;
             slave.checked = true;
        } else {
             slave.readonly = false;
             slave.checked = false;
        }
    }
    function itemsShowHide(f) {
        var display = '';
        if(f.redirectid.value.length > 0 || f.redirecturl.value.length > 0 || f.redirectype.checked)
            display = 'none';
        var bts = new Array('menuContent', 'menuImage', 'menuConfig', 'menuMeta', 'menuSEO');
        if(bts.length > 0){
            for(var i=0; i < bts.length; i++){
               $('#'+bts[i]).closest('tr').css('display', display);
            }
        }
    }
//-->
</script><?php }} ?>