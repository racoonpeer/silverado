<{* +++++++++++++++++ START HEAD ++++++++++++++++++++++ *}>
<{include file='common/module_head.tpl' title=$smarty.const.ADMIN_MAIN_TITLE creat_title=$smarty.const.ADMIN_CREATING_NEW_PAGE edit_title=$smarty.const.ADMIN_EDIT_CATEGORY_PAGE}>
<{if $arrPageData.task!='addItem' && $arrPageData.task!='editItem'}>     
<{include file='common/new_page_btn.tpl' title=$smarty.const.ADMIN_ADD_NEW}>
<div class="clear"></div>
<{/if}>
<{include file='common/left_category_menu.tpl' categoryTree=$categoryTree}>
<{* +++++++++++++++++ END HEAD ++++++++++++++++++++++ *}>
<div id="right_block">
<{* +++++++++++++++++ SHOW ADD OR EDIT ITEM FORM ++++++++++++++++++++++ *}>
<{if $arrPageData.task=='addItem' OR $arrPageData.task=='editItem'}>
    <form method="post" action="<{$arrPageData.current_url|cat:"&task="|cat:$arrPageData.task}><{if $arrPageData.itemID>0}><{''|cat:"&itemID="|cat:$arrPageData.itemID}><{/if}>" name="<{$arrPageData.task}>Form" onsubmit="return formCheck(this);" enctype="multipart/form-data">
        <input type="hidden" name="created" value="<{$item.created}>" />
        <input type="hidden" name="order" value="<{$item.order}>" />
        <div class="tabsContainer">
            <ul class="nav">
                <li><a href="#main" data-target="main" class="active">��������</a></li>
<{if $item.module=='catalog'}>
                <li><a href="#attributes" data-target="attributes" >��������������</a></li>
<{/if}>
                <li><a href="#seo" data-target="seo">SEO</a></li>
                <li><a href="#settings" data-target="settings">���������</a></li>
                <li><a href="#history" data-target="history">�������</a></li>
            </ul>
            <div class="tab_line"></div>
            <ul class="tabs">
                <li class="active" id="tab_main">
                    <table border="1" cellspacing="0" cellpadding="1" class="list">       
                        <tr>
                            <td id="headb" align="left"><{$smarty.const.HEAD_TITLE}> <font style="color:red">*</font></td>
                            <td>
                                <input class="left" name="title" size="58" id="title" style="margin-top:5px; margin-right:10px;" type="text" value="<{$item.title}>" /> <input type="button" class="buttons left" value="�������� SEO ����" onclick="MoveToSeoPath();"/>
                            </td>
                            <td class="buttons_row" valign="top" width="145" align="center">
                                <!-- ++++++++++ Start Buttons ++++++++++++++++++++++++++++++++++++++++++++++ -->
                                <{include file='common/buttons.tpl' itemID=$item.id task=$arrPageData.task deleteIDLimit=0}>
                                <!-- ++++++++++ End Buttons ++++++++++++++++++++++++++++++++++++++++++++++++ -->
                            </td>
                        </tr>

                        <tr>
                            <td id="headb" align="left"><{$smarty.const.HEAD_PUBLISH_PAGE}></td>
                            <td align="left">
                                <input type="radio" name="active" value="1" <{if $item.active==1}>checked<{/if}>>
                                <{$smarty.const.OPTION_YES}>
                                <input type="radio" name="active" value="0" <{if $item.active==0}>checked<{/if}>>
                                <{$smarty.const.OPTION_NO}>
                            </td>
                            <td class="buttons_row"></td>
                        </tr>

                        <tr>
                            <td id="headb" align="left"><{$smarty.const.HEAD_TITLE_REDIRECT}></td>
                            <td>    
                                <table border="0" cellspacing="0" cellpadding="0" class="list">
                                    <tr>
                                        <td align="left"><{$smarty.const.HEAD_REDIRECT_LINK}></td>
                                        <td align="center">���</td>
                                        <td align="center"><{$smarty.const.HEAD_EXTERNAL_LINK}></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="field" name="redirectid" onchange="itemsShowHide(this.form);" style="width: 245px;" <{if !empty($item.redirecturl)}>disabled<{/if}>>
                                                <option value="">- - <{$smarty.const.HEAD_SELECT_REDIRECT_LINK}> - -</option>
<{section name=i loop=$arrRedirects}>
<{if !empty($arrRedirects[i].categories)}>
                                                <optgroup label="<{$arrRedirects[i].menutitle}>">
                                                    <{include file='common/tree_redirects.tpl' arItems=$arrRedirects[i].categories selID=$item.redirectid marginLevel=0}>
                                                </optgroup>
<{/if}>
<{/section}>
                                            </select>
                                        </td>
                                        <td align="center">
                                            <input id="redirectype" name="redirectype" onchange="itemsShowHide(this.form);" type="checkbox" value="1" class="field" onclick="manageSelections(this, this.form.redirectid, this.form.redirecturl);" <{if !empty($item.redirecturl)}> checked<{/if}> />
                                       </td>
                                       <td align="center">
                                           <input id="redirecturl" name="redirecturl" type="text" size="36" value="<{$item.redirecturl}>"  class="field" <{if empty($item.redirecturl)}> disabled<{/if}> />
                                       </td>
                                    </tr>
                                </table>
                            </td>
                            <td class="buttons_row"></td>
                        </tr>
                        <!-- ++++++++++ Start Attach Files ++++++++++++++++++++++++++++++++++++++++++++++ -->
                        <{include file='common/attach_files.tpl' item=$item attachFile=false attachImages=true}>
                        <!-- ++++++++++ End Attach Files ++++++++++++++++++++++++++++++++++++++++++++++++ -->
                        <tr>
                            <td colspan="2">  
                                <strong><{$smarty.const.HEAD_CONTENT}></strong>
                                <a href="javascript:toggleEditor('fulldescription');"><{$smarty.const.HEAD_SWITCH_TEXT_EDITOR}></a><br/><br/>
                                <textarea style="width:640px; height: 500px;" id="fulldescription" name="text" ><{$item.text}></textarea>
                            </td>
                            <td class="buttons_row"></td>
                        </tr>    
                    </table>
                </li>
<{if $item.module=='catalog'}>
                <li class="" id="tab_attributes">
                    <table border="1" cellspacing="0" cellpadding="1" class="list">
                        <tr>
                            <td id="headb" align="left">����������� ���������</td>
                            <td align="left" id="essentials">
                                <input type="radio" name="essential" value="1" <{if $item.essential==1}>checked<{/if}>>
                                <{$smarty.const.OPTION_YES}>
                                <input type="radio" name="essential" value="0" <{if $item.essential==0}>checked<{/if}>>
                                <{$smarty.const.OPTION_NO}>
                            </td>
                            <td class="buttons_row"></td>
                        </tr>
                        <tr>
                            <td id="headb" align="left">��������� ���������</td>
                            <td align="left" id="essentials">
                                <input type="radio" name="is_stock" value="1" <{if $item.is_stock==1}>checked<{/if}>>
                                <{$smarty.const.OPTION_YES}>
                                <input type="radio" name="is_stock" value="0" <{if $item.is_stock==0}>checked<{/if}>>
                                <{$smarty.const.OPTION_NO}>
                            </td>
                            <td class="buttons_row"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <strong>�������� ��������</strong>
                                <label id="savePropertyInProducts"><input type="checkbox" name="savePropertyInProducts" value="1"/> ��������� �� ���� �������� �������</label>
                                <table>
                                    <tr>
                                        <td>
                                            <select name="property_type" id="selectPropertyType" onchange="changePropertyType();" style="width: 120px;">
                                                <option value="0"> -- �� ������� -- </option>
<{if !empty($arrPageData.propertyTypes)}>
<{foreach from=$arrPageData.propertyTypes key=typeID item=property}>
                                                <option value="<{$typeID}>" data-type="<{$property.typename}>"><{$property.title}></option>
<{/foreach}>
<{/if}>
                                            </select>
                                        </td>
                                        <td id="propertyBrand" style="display: none;">
                                            <input type="text" name="property_brand" id="searchPropertyBrand" placeholder="����� ������"/>
                                            <div id="foundedPropertyBrand" class="selectedAttr" style="width: auto; display: inline-block; vertical-align: top;"></div>
                                        </td>
                                        <td id="propertySeries" style="display: none;">
                                            <input type="text" name="property_series" id="searchPropertySeries" placeholder="����� �����"/>
                                            <div id="foundedPropertySeries" class="selectedAttr" style="width: auto; display: inline-block; vertical-align: top;"></div>
                                        </td>
                                        <td id="propertyAttributeSelect" style="display: none;">
                                            <select name="property_attribute" id="selectPropertyAttribute" style="width: 120px;">
                                                <option value="0"> -- �������� ������� -- </option>
<{if !empty($arrPageData.attributes)}>
<{section name=i loop=$arrPageData.attributes}>
                                                <option value="<{$arrPageData.attributes[i].id}>"><{$arrPageData.attributes[i].title}></option>
<{/section}>
<{/if}>
                                            </select>
                                        </td>
                                        <td id="propertyAttributeSearch" style="display: none;">
                                            <input type="text" id="searchPropertyAttribute" placeholder="����� �������� ��������"/>
                                            <div id="foundedPropertyAttribute" class="selectedAttr" style="width: auto; display: inline-block; vertical-align: top;"></div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td class="buttons_row">
                                <script type="text/javascript">
                                    $(function(){
<{if !empty($item.keyProperty)}>
                                        changePropertyType("<{$item.keyProperty.typename}>");
                                        var objProperty = {
                                            typename: "<{$item.keyProperty.typename}>",
                                            typeID  : <{$item.keyProperty.type_id|intval}>,
                                            attrID  : <{$item.keyProperty.attribute_id|intval}>,
                                            valID   : <{$item.keyProperty.value_id|intval}>,
                                            value   : "<{if !empty($item.keyProperty.valueItem)}><{$item.keyProperty.valueItem.title}><{/if}>"
                                        };
                                        selectProperty(objProperty);
<{/if}>
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
                                <strong><{$smarty.const.HEAD_ATTRIBUTE_MANAGER}></strong><br/><br/>
                                <table width="100%" cellspacing="10">
                                    <tr valign="top">
                                        <td id="attrGroupsList">
                                            <strong><{$smarty.const.ATTRIBUTE_GROUPS}>:</strong>
                                            <div class="sortable-wrapper halfsize" >
                                                <ul class="sortable">
<{section name=i loop=$arrPageData.attrGroups}>
                                                    <li class="ui-state-default">
                                                        <input type="checkbox" name="attrGroups[]" value="<{$arrPageData.attrGroups[i].id}>" onchange="updateAttributesList(this);" <{if in_array($arrPageData.attrGroups[i].id, $item.attrGroups)}>checked<{/if}>/> <label title="<{$arrPageData.attrGroups[i].descr}>"><{$arrPageData.attrGroups[i].title}></label>
                                                    </li>
<{/section}>
                                                </ul>
                                            </div>
                                        </td>
                                        <td id="attributesList">
                                            <strong><{$smarty.const.LABEL_ATTRIBUTES}>:</strong>
                                            <div class="sortable-wrapper halfsize">
                                                <ul class="sortable">
<{section name=i loop=$arrPageData.attributes}>
<{if in_array($arrPageData.attributes[i].gid, $item.attrGroups)}>
                                                    <li class="ui-state-default <{if !in_array($arrPageData.attributes[i].id, $item.attributes)}>ui-state-disabled<{/if}>" data-gid="<{$arrPageData.attributes[i].gid}>">
                                                        <input type="checkbox" name="attributes[]" value="<{$arrPageData.attributes[i].id}>" onchange="toggleBoxState(this);" <{if in_array($arrPageData.attributes[i].id, $item.attributes)}>checked<{/if}>/> <label title="<{$arrPageData.attributes[i].descr}>"><{$arrPageData.attributes[i].title}> (<{$arrPageData.attributes[i].gtitle}>)</label>
                                                    </li>
<{/if}>
<{/section}>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <br/>
                            </td>
                            <td class="buttons_row" valign="top" width="145" align="center">
                                <!-- ++++++++++ Start Buttons ++++++++++++++++++++++++++++++++++++++++++++++ -->
                                <{include file='common/buttons.tpl' itemID=$item.id task=$arrPageData.task deleteIDLimit=0}>
                                <!-- ++++++++++ End Buttons ++++++++++++++++++++++++++++++++++++++++++++++++ -->
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <strong><{$smarty.const.HEAD_FILTERS_MANAGER}></strong><br/><br/>
                                <table width="100%" cellspacing="10">
                                    <tr valign="top">
                                        <td width="50%" id="filtersAllList">
                                            <strong><{$smarty.const.LABEL_FILTERS_MAIN_LIST}>:</strong>
                                            <div class="sortable-wrapper halfsize">
                                                <ul class="sortable">
    <{section name=i loop=$arrPageData.filters.all}>
                                                    <li class="ui-state-default <{if !in_array($arrPageData.filters.all[i].id, $item.filters.all)}>ui-state-disabled<{/if}>">
                                                        <input type="checkbox" name="filters[all][]" value="<{$arrPageData.filters.all[i].id}>" onchange="updateFiltersList(this);" <{if in_array($arrPageData.filters.all[i].id, $item.filters.all)}>checked<{/if}>/> <label><{$arrPageData.filters.all[i].title}></label>
                                                    </li>
    <{/section}>
                                                </ul>
                                            </div>
                                        </td>
                                        <td width="50%" id="filtersSeoList">
                                            <strong><{$smarty.const.LABEL_FILTERS_SHORT_LIST}>:</strong>
                                            <div class="sortable-wrapper halfsize">
                                                <ul class="sortable">
    <{section name=i loop=$arrPageData.filters.seo}>
                                                    <li class="ui-state-default <{if !in_array($arrPageData.filters.seo[i].id, $item.filters.seo)}>ui-state-disabled<{/if}>" data-fid="<{$arrPageData.filters.seo[i].id}>">
                                                        <input type="checkbox" name="filters[seo][]" value="<{$arrPageData.filters.seo[i].id}>" onchange="toggleBoxState(this);" <{if in_array($arrPageData.filters.seo[i].id, $item.filters.seo)}>checked<{/if}>/> <label><{$arrPageData.filters.seo[i].title}> <strong><{$arrPageData.filters.seo[i].alias}></strong></label>
    <{if $arrPageData.filters.seo[i].tid==1}>
                                                        <a href="/admin/?module=brands" target="_blank">
                                                            <img src="/images/operation/edit.png" height="10">
                                                        </a>
    <{elseif $arrPageData.filters.seo[i].tid!=1 AND !empty($arrPageData.filters.seo[i].aid)}>
                                                        <a href="/admin/?module=attributes_values&task=editItem&itemID=<{$arrPageData.filters.seo[i].aid}>&ajax=1" onclick="return hs.htmlExpand(this, {headingText:'<{$smarty.const.ATTRIBUTES}>: <{$arrPageData.filters.seo[i].title}>', objectType:'iframe', preserveContent: false, width:910});">
                                                            <img src="/images/operation/edit.png" height="10">
                                                        </a>
    <{/if}>
                                                    </li>
    <{/section}>
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
                                <strong><{$smarty.const.HEAD_META_TEMPLATES}></strong><br/><br/>
                                <table width="100%">
                                    <tr>
                                        <td colspan="2">
                                            <div class="inline">H1</div>
                                            <input type="text" name="filter_title" id="filter_title" size="102" value="<{$item.filter_title}>"/><br/><br/>
                                            <div class="inline"><{$smarty.const.HEAD_SEO_TITLE}></div>
                                            <input type="text" name="filter_seo_title" id="filter_seo_title" size="102" value="<{$item.filter_seo_title}>"/><br/><br/>
                                            <div class="inline"><{$smarty.const.HEAD_DESCRIPTION}> </div>
                                            <input type="text" name="filter_meta_descr" id="filter_meta_descr" size="102" value="<{$item.filter_meta_descr}>" /><br/><br/>
                                            <div class="inline"><{$smarty.const.HEAD_KEYWORDS}></div>
                                            <input type="text" name="filter_meta_key" id="filter_meta_key" size="102" value="<{$item.filter_meta_key}>" /><br/><br/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="inline"><{$smarty.const.HEAD_SEO_TEXT}></div><br/>
                                            <textarea name="filter_seo_text" id="seoText" style="width: 100%; height: 250px;"><{$item.filter_seo_text}></textarea>
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
<{/if}>
                <li id="tab_seo">
                    <table width="101%" border="0" cellspacing="0" cellpadding="0" class="list" > 
                        <!-- ++++++++++ Start Buttons ++++++++++++++++++++++++++++++++++++++++++++++ -->
                        <{include file='common/meta_seo_data.tpl' itemID=$itemID seoTable=$smarty.const.MAIN_TABLE}>
                        <!-- ++++++++++ End Buttons ++++++++++++++++++++++++++++++++++++++++++++++++ --> 
                    </table>
                </li>
                <li id="tab_settings">
                    <table width="101%" border="0" cellspacing="0" cellpadding="0" class="list" > 
                        <tr>
                            <td colspan="2">
                                <strong><{$smarty.const.HEAD_PAGE_SETTINGS}></strong><br/><br/>
                                <div class="inline"><{$smarty.const.HEAD_PARENT}></div>
                                <select name="pid" class="field" <{if $item.id==1}> disabled<{/if}> <{if !empty($item.id)}> onchange="hideApplyBut(this, this.form.submit_apply, <{$item.pid}>);" <{/if}>>
                                    <option value="0"> &nbsp;&nbsp;&nbsp;- - <{$smarty.const.HEAD_ROOT_LEVEL}> - -&nbsp;&nbsp;&nbsp; </option>
<{section name=i loop=$categoryTree}>
                                    <option value="<{$categoryTree[i].id}>"<{if $item.pid==$categoryTree[i].id OR (empty($item.pid) && $arrPageData.pid==$categoryTree[i].id)}> selected<{/if}><{if $categoryTree[i].id==$item.id OR $categoryTree[i].id<10 OR ($categoryTree[i].module && !in_array($categoryTree[i].module, $arrPageData.allowedSubPageModules))}> disabled<{/if}>>
                                        <{$categoryTree[i].margin}><{$categoryTree[i].title}> &nbsp; ( <{if $categoryTree[i].active==0}><{$smarty.const.HEAD_INACTIVE}>, <{/if}><{$categoryTree[i].menutitle}> ) &nbsp; 
                                    </option>    
<{if !empty($categoryTree[i].childrens)}>
                                    <!-- ++++++++++ Start Tree Childrens +++++++++++++++++++++++++++++++++++++++ -->
                                    <{include file='common/depends_tree_childrens.tpl' itemID=$item.id dependID=$item.pid arrChildrens=$categoryTree[i].childrens}>
                                    <!-- ++++++++++ End Tree Childrens +++++++++++++++++++++++++++++++++++++++++ -->
<{/if}>
<{/section}>
                                </select><br/><br/>
                                <div class="inline"><{$smarty.const.HEAD_MODULE}></div>
                                <select class="field" name="module" <{if !empty($item.submodules)}> disabled<{/if}>>
                                    <option value=""> &nbsp; <{$smarty.const.HEAD_MODULE_NOT_SELECT}> &nbsp; </option>
<{foreach name=i item=iItem from=$arModules}>
                                    <option value="<{$iItem}>"<{if $item.module==$iItem}> selected<{/if}><{if isset($arrModules.$iItem) && $item.module!=$iItem && !in_array($iItem, $item.arParentModules)}> disabled<{/if}>> &nbsp; <{$iItem}> &nbsp; <{if isset($arrModules.$iItem)}> (<{$arrModules[$iItem].title}>) &nbsp; <{/if}></option>
<{/foreach}>
                                </select><br/><br/>
                                <div class="inline left"><{$smarty.const.HEAD_PAGE_ACCESS}></div>
                                <div class="left" style="margin-left:4px;">
                                    <select class="field" name="access"<{if $item.id>0}> onchange="manageSubAccessInput(this, this.form.sub_access);"<{/if}> >
                                        <option value="1"><{$smarty.const.OPTION_YES}>&nbsp;</option>
                                        <option value="0"<{if $item.access==0}> selected<{/if}>><{$smarty.const.OPTION_NO}>&nbsp;</option>
                                    </select> 
                                    &nbsp;<label for="sub_access" title="<{$smarty.const.HEAD_APPLY_TO_ALL_CHILD}>">
                                        <{$smarty.const.HEAD_ALL_CHILD}>
                                        <input id="sub_access" name="sub_access" type="checkbox" value="1"<{if $item.access==0}> readonly  checked<{elseif !$item.id}> disabled<{/if}> onclick="if(this.readonly){return false;}" />
                                    </label>
<{if $item.access==0}>
                                    <script type="text/javascript">
                                        document.getElementById('sub_access').readonly = true;
                                    </script>
<{/if}>
                                </div>
                                <div class="clear"></div><br/>
                                <div class="inline left">�����������</div>
                                <div class="left" style="margin-left:4px;">
                                    <input type="checkbox" name="separate" id="separate" value="1" <{if $item.separate>0}>checked<{/if}>/> 
                                </div>
                                <div class="clear"></div>
                                <div class="inline"><{$smarty.const.HEAD_MENU_TYPES}></div>
                                <select class="field" name="menutype" <{if $item.menutype==8}> disabled<{/if}>>
<{section name=i loop=$arrMenuTypes}>
                                    <option value="<{$arrMenuTypes[i].menutype}>"
                                            <{if $item.menutype==$arrMenuTypes[i].menutype}> selected<{/if}>> 
                                        &nbsp; <{$arrMenuTypes[i].title}> &nbsp; 
                                    </option>
<{/section}>
                                </select><br/><br/>
                                <div class="inline"><{$smarty.const.HEAD_PAGE_TYPE}></div>
                                <select class="field" name="pagetype" <{if $item.menutype==8}> disabled<{/if}>>
<{section name=i loop=$arrPageTypes}>
                                    <option value="<{$arrPageTypes[i].pagetype}>"  <{if $item.pagetype==$arrPageTypes[i].pagetype}> selected<{/if}>> 
                                        &nbsp; <{$arrPageTypes[i].title}> &nbsp; 
                                    </option>
<{/section}>
                                </select>
                            </td>
                            <td class="buttons_row" valign="top" width="145" align="center">
                                <!-- ++++++++++ Start Buttons ++++++++++++++++++++++++++++++++++++++++++++++ -->
                                <{include file='common/buttons.tpl' itemID=$item.id task=$arrPageData.task deleteIDLimit=0}>
                                <!-- ++++++++++ End Buttons ++++++++++++++++++++++++++++++++++++++++++++++++ -->
                            </td>
                        </tr>  
                    </table>
                </li>
                <li id="tab_history">
                    <{include file="common/object_actions_log.tpl" arHistoryData=$item.arHistory}>
                </li>
            </ul>
        </div>
    </form>
<{else}>    
    <form method="post" action="<{$arrPageData.current_url|cat:"&task=reorderItems"}>" name="reorderItems">
    <{if !empty($arrPageData.arBackpage)}>
    <a href="<{$arrPageData.admin_url|cat:"&pid="|cat:$arrPageData.arBackpage.id}>">..<{$arrPageData.arBackpage.title}></a>
    <{/if}>
    <table width="100%" border="0" cellspacing="1" cellpadding="0" class="list">
        <tr>
            <td id="headb" align="center" width="38"></td>
            <td id="headb" align="left" ><{$smarty.const.HEAD_TITLE}></td> 
            <td id="headb" align="center" width="38"><{$smarty.const.HEAD_MENU_TYPES}></td>
            <td id="headb" align="center" width="38"><{$smarty.const.HEAD_SUB_PAGES}></td>
            <td id="headb" align="center" width="38"><{$smarty.const.HEAD_SORT}></td>
            <td id="headb" align="center" width="38"><{$smarty.const.HEAD_EDIT}></td>
            <td id="headb" align="center" width="38"><{$smarty.const.HEAD_DELETE}></td>
            
            <{*  
            <td id="headb" class="hidden" align="center" width="38"><{$smarty.const.HEAD_PAGE_TYPE}></td> 
            <td id="headb" class="hidden" align="center" width="38"><{$smarty.const.HEAD_PAGE_ACCESS}></td>
            <td id="headb" class="hidden" align="center" width="38"><{$smarty.const.HEAD_LAST_UPDATE}></td>
            <td id="headb" class="hidden" align="center" width="38"><{$smarty.const.HEAD_REDIRECT}></td>
            <td id="headb" class="hidden" align="center" width="38"><{$smarty.const.HEAD_MODULE}></td>
            *}>
        </tr>
<{section name=i loop=$items}>
         <tr>
            <td align="center">
<{if $items[i].active==1}>
                <a href="<{$arrPageData.current_url|cat:"&task=publishItem&status=0&itemID="|cat:$items[i].id}>" title="<{$smarty.const.HEAD_NO_PUBLISH}>">
                    <img src="<{$arrPageData.system_images}>check.png" alt="<{$smarty.const.HEAD_NO_PUBLISH}>" title="<{$smarty.const.HEAD_NO_PUBLISH}>" />
                </a>
<{else}>
                <a href="<{$arrPageData.current_url|cat:"&task=publishItem&status=1&itemID="|cat:$items[i].id}>" title="<{$smarty.const.HEAD_PUBLISH}>">
                    <img src="<{$arrPageData.system_images}>un_check.png" alt="<{$smarty.const.HEAD_PUBLISH}>" title="<{$smarty.const.HEAD_PUBLISH}>" />
                </a>
<{/if}>
            </td>
            <td><a href="<{$arrPageData.current_url|cat:"&task=editItem&itemID="|cat:$items[i].id}>"><{$items[i].title}></a></td>
            <td align="center">
<{if $items[i].menutype!=8}>
                <a href="<{$arrPageData.current_url|cat:"&itemID="|cat:$items[i].id}>&task=changeMenuType&status=<{if $items[i].mn_type>0 && $items[i].mn_type<$arrMenuTypes|@count}><{$items[i].mn_type}><{else}>0<{/if}>" title="<{$items[i].arMenuType.title}>, (<{$smarty.const.HEAD_TYPE}> <{$items[i].menutype}>)" onclick="return confirm('<{$smarty.const.CONFIRM_CHANGE_MENU_TYPE}>');">
<{/if}>
                    <img src="<{$arrPageData.system_images}><{$items[i].arMenuType.image}>" alt="<{$items[i].arMenuType.title}>, (<{$smarty.const.HEAD_TYPE}> <{$items[i].menutype}>)" title="<{$items[i].arMenuType.title}>, (<{$smarty.const.HEAD_TYPE}> <{$items[i].menutype}>)" />
<{if $items[i].menutype!=8}>
                </a>
<{/if}>
            </td>
            <td align="center"> 
            <{if  $items[i].id > 10 && !$items[i].module OR in_array($items[i].module, $arrPageData.allowedSubPageModules)}>
                <a href="<{$arrPageData.admin_url|cat:'&pid='|cat:$items[i].id|cat:$arrPageData.filter_url}>" title="<{$smarty.const.HEAD_ADD_VIEW_SUB_PAGES}>">
                    <img src="<{$arrPageData.system_images}>add_tree.png" alt="<{$smarty.const.HEAD_ADD_VIEW_SUB_PAGES}>" title="<{$smarty.const.HEAD_ADD_VIEW_SUB_PAGES}>" />
                </a>
                <{if $items[i].childrens}><small class="subchildrens"><{$items[i].childrens}></small><{/if}>
            <{else}>
                 --
            <{/if}>
            </td>
            <td align="center">
                <input type="text" name="arOrder[<{$items[i].id}>]" id="arOrder_<{$items[i].id}>" class="field_smal" value="<{$items[i].order}>" style="width:27px;padding-left:0px;text-align:center;" maxlength="4" />
            </td>
            <td align="center" >
                <a href="<{$arrPageData.current_url|cat:"&task=editItem&itemID="|cat:$items[i].id}>" title="<{$smarty.const.LABEL_EDIT}>">
                    <img src="<{$arrPageData.system_images}>edit.png" alt="<{$smarty.const.LABEL_EDIT}>" />
                </a>
            </td>
            <td align="center">
<{if $items[i].id > 10}>
                <a href="<{$arrPageData.current_url|cat:"&task=deleteItem&itemID="|cat:$items[i].id}>" onclick="return confirm('<{$smarty.const.CONFIRM_DELETE_CAT}>');" title="<{$smarty.const.LABEL_DELETE}>">
                   <img src="<{$arrPageData.system_images}>delete.png" alt="<{$smarty.const.LABEL_DELETE}>" title="<{$smarty.const.LABEL_DELETE}>" />
                </a>
<{else}>
                --
<{/if}>
            </td>
            
           <{*
           <td class="hidden" align="center">
<{if $items[i].menutype!=8}>
               <a href="<{$arrPageData.current_url|cat:"&itemID="|cat:$items[i].id}>&task=changePageType&status=<{if $items[i].pn_type>0 && $items[i].pn_type<$arrPageTypes|@count}><{$items[i].pn_type}><{else}>0<{/if}>" title="<{$items[i].arPageType.title}>" onclick="return confirm('<{$smarty.const.CONFIRM_CHANGE_PAGE_TYPE}>');">
<{/if}>
                   <img src="<{$arrPageData.system_images}><{$items[i].arPageType.image}>" alt="<{$items[i].arPageType.title}>" title="<{$items[i].arPageType.title}>" />
<{if $items[i].menutype!=8}>
               </a>
<{/if}>
            </td>
            <td class="hidden" align="center">
                <{if $items[i].access}><{$smarty.const.OPTION_YES}><{else}><{$smarty.const.OPTION_NO}><{/if}>
            </td>
            <td class="hidden" align="center"><{$items[i].modified|date_format:"%d.%m.%y"}></td>
            <td class="hidden" align="center"><{if empty($items[i].redirectid) AND empty($items[i].redirecturl)}><{$smarty.const.OPTION_NO}><{else}><{$smarty.const.OPTION_YES}><{/if}></td>
            <td class="hidden" align="center"><{$items[i].module}></td> 
            *}>
        </tr>
<{/section}>
</table>

<table width="100%" border="0" cellspacing="1" cellpadding="0">
    <tr>
        <td align="center" width="247"></td>
        <td align="center" width="350">
            <{if $arrPageData.total_pages>1}>
                <!-- ++++++++++ Start PAGER ++++++++++++++++++++++++++++++++++++++++++++++++ -->
                <{include file='common/pager.tpl' arrPager=$arrPageData.pager page=$arrPageData.page showTitle=0 showFirstLast=0 showPrevNext=0}>
                <!-- ++++++++++ End PAGER ++++++++++++++++++++++++++++++++++++++++++++++++++ -->
            <{/if}>
        </td>
        <td align="right">
            <input name="submit_order" class="buttons" type="submit" value="<{$smarty.const.BUTTON_APPLY}>" />
        </td>
    </tr>
</table>       
</form>
<{/if}>
</div>
<script type="text/javascript">
<!--
    function formCheck(form){
        if(form.title.value.length == 0){
           alert('<{$smarty.const.ALERT_EMPTY_PAGE_TITLE}>'); 
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
</script>