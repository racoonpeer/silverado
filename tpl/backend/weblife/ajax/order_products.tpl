<table id="orderProducts" width="100%" border="1" cellspacing="1" cellpadding="0" class="list order" style="border: 1px solid #b6b6b6 !important;">
    <thead>
        <tr>
            <td id="headb" width="40" style="background-color: #D1D1D1; border-color: #FFF;"></td>
            <td align="left" id="headb" style="background-color: #D1D1D1; border-color: #FFF;">Наименование</td>
            <td id="headb" align="center" width="150" style="background-color: #D1D1D1; border-color: #FFF;">Опции</td>
            <td id="headb" align="center" width="65" style="background-color: #D1D1D1; border-color: #FFF;">Кол-во</td>
            <td id="headb" align="center" width="80" style="background-color: #D1D1D1; border-color: #FFF;">Цена</td>
            <td id="headb" align="center" width="80" style="background-color: #D1D1D1; border-color: #FFF;">Сумма</td>
            <td id="headb" align="center" width="32" style="background-color: #D1D1D1; border-color: #FFF;"></td>
        </tr>
        <tr>
            <td>
                <img src="/images/operation/add.png" alt="Добавить товар" align="top"/>
            </td>
            <td colspan="6">
                <input type="text" id="orderProductsSearch" class="field" style="width: 98%;" placeholder="Название / Артикул"/>
            </td>
        </tr>
    </thead>
    <tbody>
<{section name=i loop=$arItems}>
        <tr id="product_<{$arItems[i].id}>" data-pid="<{$arItems[i].pid}>">
            <td align="center">
                <a href="javascript:void(0);" onclick="OP.delete(<{$arItems[i].id}>);">
                    <img src="/images/operation/delete.png" alt="Удалить" align="top"/>
                </a>
            </td>
            <td align="left">
<{if isset($arItems[i].link)}>
                <a href="<{$arItems[i].link}>" target="_blank" title="<{$arItems[i].title}>"><{$arItems[i].ptitle|unscreenData}></a>
<{else}>
                <{$arItems[i].title|unscreenData}>
<{/if}>
            </td>
            <td align="left">
<{if $arItems[i].type=="product"}>
<{foreach name=k from=$arItems[i].options key=optionID item=option}>
<{if $option.typename=="checkbox"}>
                <strong><{$option.title}></strong>
<{foreach name=z from=$option.values key=valueID item=value}><br/>
                <input type="checkbox" id="options_<{$optionID}>_<{$valueID}>" value="<{$valueID}>" data-pid="<{$arItems[i].pid}>" data-oid="<{$optionID}>" <{if $value.selected}>checked<{/if}>> <{$value.title}> <{"&nbsp;"|str_repeat:3}>
<{/foreach}>
<{else}>
                <strong><{$option.title}></strong><br/>
                <select id="options_<{$optionID}>" style="width: 100%;" data-pid="<{$arItems[i].pid}>" data-oid="<{$optionID}>">
<{if $option.required==0}>
                    <option value=""> -- не выбрано -- </option>
<{/if}>
<{foreach name=z from=$option.values key=valueID item=value}>
                    <option value="<{$valueID}>" <{if $value.selected}>selected<{/if}>><{$value.title}></option>
<{/foreach}>
                </select>
<{/if}>
<{if !$smarty.foreach.k.last}><br/><br/><{/if}>
<{/foreach}>
<{elseif $arItems[i].type=="kit"}>
<{foreach name=s from=$arItems[i].children item=children}>
<{foreach name=k from=$children.options key=optionID item=option}>
<{if $option.typename=="checkbox"}>
                <strong><{$option.title}></strong>
<{foreach name=z from=$option.values key=valueID item=value}><br/>
                <input type="checkbox" id="options_<{$optionID}>_<{$valueID}>" value="<{$valueID}>" data-pid="<{$children.id}>" data-oid="<{$optionID}>" <{if $value.selected}>checked<{/if}>> <{$value.title}> <{"&nbsp;"|str_repeat:3}>
<{/foreach}>
<{else}>
                <strong><{$option.title}></strong><br/>
                <select id="options_<{$optionID}>" style="width: 100%;" data-pid="<{$children.id}>" data-oid="<{$optionID}>">
<{if $option.required==0}>
                    <option value=""> -- не выбрано -- </option>
<{/if}>
<{foreach name=z from=$option.values key=valueID item=value}>
                    <option value="<{$valueID}>" <{if $value.selected}>selected<{/if}>><{$value.title}></option>
<{/foreach}>
                </select>
<{/if}>
<{if !$smarty.foreach.k.last}><br/><br/><{/if}>
<{/foreach}>
<{/foreach}>
<{/if}>
            </td>
            <td align="center">
                <input type="text" class="field" style="display: inline; width: 40px;" id="qty_<{$arItems[i].id}>" value="<{$arItems[i].qty}>"/>
            </td>
            <td align="center"><{$arItems[i].price}> грн.</td>
            <td align="center"><{$arItems[i].price * $arItems[i].qty}> грн.</td>
            <td align="center">
                <a href="javascript:void(0);" onclick="OP.recalc(<{$arItems[i].id}>);">
                    <img src="/images/operation/update.png" alt="Обновить" align="top"/>
                </a>
            </td>
        </tr>
<{/section}>
    </tbody>
    <tr>
        <td align="right" colspan="5">
            <strong>Сумма к оплате:</strong>
        </td>
        <td align="center">
            <strong><{($price+$sPrice)|number_format:2:'.':''}> грн.</strong>
        </td>
        <td></td>
    </tr>
</table>
<script type="text/javascript">
    $(function(){
        OP.setup();
    });
    var OP = {
        update: function() {
            var _self = this;
            $.ajax({
                url: '/interactive/ajax.php',
                type: 'GET',
                dataType: 'json',
                data: {
                    zone: 'admin',
                    action: 'orderProducts',
                    option: 'update',
                    itemID: <{$item.id}>
                }, 
                success: function(json) {
                    if(json.output) {
                        $('#orderProducts').replaceWith(json.output);
                        _self.setup();
                    }
                    if(json.history) {
                        $('#history').html(json.history);
                    }
                }
            });
        },
        setup: function() {
            var _self = this;
            var arExItems = new Array();
            $.each($('#orderProducts').children('tbody').find('tr'), function(i, tr){
                arExItems.push($(tr).data('pid'));
            });
            $("#orderProductsSearch").autocomplete({
                minLength: 3,
                source: function(request, response) {
                    $.ajax({
                        url: "/interactive/ajax.php",
                        type: 'GET',
                        dataType: "json",
                        data: {
                            zone: 'admin',
                            action: 'orderProducts',
                            option: 'search',
                            itemID: <{$item.id}>,
                            stext: request.term,
                            exItems: arExItems
                        },
                        success: function(json) {
                            if(json.items) {
                                response($.map(json.items, function(item) {
                                    return {
                                        label: item.title + ' (' + item.ctitle + ')',
                                        value: item.title,
                                        id: item.id,
                                        type: item.type
                                    }
                                }));
                            }
                        }
                    });
                },
                select: function(event, ui) {
                    _self.add(ui.item.id, ui.item.type);
                }
            }); 
        },
        add: function(PID, TYPE) {
            var _self = this;
            $.ajax({
                url: "/interactive/ajax.php",
                type: 'GET',
                dataType: "json",
                data: {
                    zone: 'admin',
                    action: 'orderProducts',
                    option: 'add',
                    itemID: <{$item.id}>,
                    pid: PID,
                    type: TYPE
                },
                complete: function(){
                    _self.update();
                }
            });
        },
        delete: function(PID) {
            var _self = this;
            $.ajax({
                url: "/interactive/ajax.php",
                type: 'GET',
                dataType: "json",
                data: {
                    zone: 'admin',
                    action: 'orderProducts',
                    option: 'delete',
                    itemID: <{$item.id}>,
                    pid: PID
                },
                complete: function(){
                    _self.update();
                }
            });
        },
        recalc: function(PID) {
            var _self = this;
            var QTY = $('#orderProducts').children('tbody').find('input#qty_'+PID).val(),
                Inputs = $('#orderProducts').children('tbody').children('tr#product_' + PID).children("td:nth-of-type(3)").find("select, input[type='checkbox']:checked"),
                Options = {};
            if (Inputs.length) {
                $.each(Inputs, function (j, input) {
                    var pid = $(input).data("pid"),
                        oid = $(input).data("oid"),
                        similar = $(Inputs).parent().find("input[data-oid='" + oid + "']:checked"),
                        arVal   = new Array();
                    if (!array_key_exists(pid, Options)) Options[pid] = {};
                    if (similar.length) {
                        $.each(similar, function (j, cb) {
                            arVal.push(cb.value)
                        });
                        Options[pid][oid] = arVal;
                    } else {
                        Options[pid][oid] = parseInt(input.value);
                    }
                });
            }
            $.ajax({
                url: "/interactive/ajax.php",
                type: 'GET',
                dataType: "json",
                data: {
                    zone: 'admin',
                    action: 'orderProducts',
                    option: 'recalc',
                    itemID: <{$item.id}>,
                    pid: PID,
                    qty: QTY,
                    options: Options
                },
                complete: function () {
                    _self.update();
                }
            });
        }
    }
</script>