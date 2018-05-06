<{* +++++++++++++++++ START HEAD ++++++++++++++++++++++ *}>
<{include file='common/module_head.tpl' title=$smarty.const.ORDERS creat_title=$smarty.const.ADMIN_CREATING_NEW_ORDER edit_title=$smarty.const.ADMIN_EDIT_ORDER}>
<{* +++++++++++++++++ END HEAD ++++++++++++++++++++++ *}>
<div id="right_block">
<{* +++++++++++++++++ SHOW EDIT ITEM FORM ++++++++++++++++++++++ *}>
<{if $arrPageData.task=='editItem'}>
    <div class="noticePanel">
        Не забудь ознакомиться с <a href="https://irn5p8.axshare.com/" target="_blank">Картой бизнес-процесса</a>
    </div>
    <form method="post" id="orderForm" action="<{$arrPageData.current_url|cat:$arrPageData.filter_url|cat:"&task="|cat:$arrPageData.task}><{if $arrPageData.itemID>0}><{''|cat:"&itemID="|cat:$arrPageData.itemID}><{/if}>" name="<{$arrPageData.task}>Form"  enctype="multipart/form-data">
        <div class="tabsContainer">
            <ul class="nav">
                <li><a href="javascript:void(0);" data-target="main" class="active">Информация о заказе</a></li>
            </ul>
            <div class="tab_line"></div>
            <ul class="tabs">
                <li class="active" id="tab_main">
                    <table border="0" cellspacing="5" cellpadding="1" class="list" id="orderTable" style="border-bottom:1px solid #b8b8b8">  
                        <tr>
                            <td width="320" style="border-right:1px solid #b8b8b8" valign="top">
                                <strong>Информация о заказе</strong><br/><br/>
                                <table width="100%" border="1" cellspacing="1" cellpadding="1" class="list order" style="text-align: left;">
                                    <tbody>
                                        <tr>
                                            <td width="40%">№ заказа</td>
                                            <td><strong><{$item.id}></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Статус заказа</td>
                                            <td><strong id="status"><{$item.arStatus.title}></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Дата создания</td>
                                            <td><strong><{$item.created|date_format:"%d.%m.%Y %H:%M"}></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Кол-во товаров</td>
                                            <td><strong><{$item.qty}></strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>Имя</td>
                                            <td>
                                                <input type="text" name="firstname" value="<{$item.firstname|unScreenData}>" size="28"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Фамилия</td>
                                            <td>
                                                <input type="text" name="surname" value="<{$item.surname|unScreenData}>" size="28"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>E-mail</td>
                                            <td>
                                                <input type="text" name="email" value="<{$item.email}>" size="28"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Телефон</td>
                                            <td>
                                                <input type="text" name="phone" value="<{$item.phone}>" size="28"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Город</td>
                                            <td>
                                                <textarea name="address" rows="4" style="height: 60px;"><{$item.city|unScreenData}></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Адрес</td>
                                            <td>
                                                <textarea name="address" rows="4" style="height: 60px;"><{$item.address|unScreenData}></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Получатель</td>
                                            <td>
                                                <input type="text" name="ext_firstname" value="<{$item.ext_firstname|unScreenData}>" size="12"/>
                                                <input type="text" name="ext_surname" value="<{$item.ext_surname|unScreenData}>" size="13"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Доставка</td>
                                            <td>
                                                <strong id="shipping">
<{if !empty($item.arShipping)}>
                                                    <{$item.arShipping.title}>
<{/if}>
                                                </strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Оплата</td>
                                            <td>
                                                <strong id="payment">
<{if !empty($item.arPayment)}>
                                                    <{$item.arPayment.title}>
<{/if}>
                                                </strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Комментарий к заказу</td>
                                            <td>
                                                <textarea name="descr" rows="4" style="height: 60px;"><{$item.descr|unScreenData}></textarea>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br/>
                                <br/>
                                <div>
                                    <a class="buttons left" data-option='confirm' data-confirm="1" onclick="Orders.updateOrder(this);" style="width:200px;">
                                        &nbsp;Отправить подтверждение&nbsp;
                                    </a>
                                    <span id="confirm" class="left" style="margin:10px;">
<{if $item.confirmed==1}>
                                        <{$smarty.const.ORDER_CONFIRM_LETTER_SEND}>
<{else}>
                                        <{$smarty.const.ORDER_CONFIRM_LETTER_NOT_SEND}>
<{/if}>
                                    </span>
                                </div>
                            </td>
                            <td valign="top">
                                <strong>Товары</strong><br/><br/>
                                <{include file='ajax/order_products.tpl' arItems=$item.children price=$item.price sPrice=$item.shipping_price}>
                                <div class="loader hidden"><img src="/images/loader.gif"/></div>
                                <table width="100%" cellspacing="0" cellpadding="1" class="list">
                                    <tr>
                                       <td style="padding:10px;">
                                           <strong>Комментарий администратора</strong><br/><br/>
                                           <textarea class="nosize_field" style="width: 440px; height: 36px" name="admin_comment"><{$item.admin_comment}></textarea>
                                           <a class="buttons right" data-option="admin_comment" onclick="Orders.updateOrder(this);">Сохранить комментарий</a>
                                       </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <div class="loader hidden"><img src="/images/loader.gif"/></div>
                    <table width="100%" border="0" cellspacing="0" cellpadding="1" class="list order" id="editarea">
                        <tr>
                            <td>Оплата:</td>
                            <td>
                                <select name="id" class="nosize_field" style="width: 140px;" onchange="Orders.unsetDisabled(this);">       
<{section name=i loop=$arrPageData.arPayments}>
                                    <option value="<{$arrPageData.arPayments[i].id}>" <{if $arrPageData.arPayments[i].id==$item.payment_id}>selected<{elseif !$arrPageData.arPayments[i].active}>disabled<{/if}>><{$arrPageData.arPayments[i].title}></option>
<{/section}>
                                </select>
                            </td>
                            <td style="padding:10px;">
                                <textarea class="nosize_field" disabled style="width: 100%; height: 50px" name="comment"></textarea>
                            </td>
                            <td>
                                <a class="buttons disabled" data-payment="<{$item.payment_id}>" data-option="payment" onclick="Orders.updateOrder(this);">Сохранить</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Доставка:</td>
                            <td>
                                <select name="id" class="nosize_field" style="width: 140px;" onchange="Orders.unsetDisabled(this)">       
<{section name=i loop=$arrPageData.arShippings}>
                                    <option value="<{$arrPageData.arShippings[i].id}>" <{if $arrPageData.arShippings[i].id==$item.shipping_id}>selected<{elseif !$arrPageData.arShippings[i].active}>disabled<{/if}>><{$arrPageData.arShippings[i].title}></option>
<{/section}>
                                </select>
                            </td>
                            <td style="padding:10px;">
                                <textarea class="nosize_field" style="width: 100%; height: 50px" name="comment" disabled></textarea>
                            </td>
                            <td>
                                <a class="buttons disabled" data-shipping="<{$item.shipping_id}>" data-option="shipping" onclick="Orders.updateOrder(this);">Сохранить</a>
                            </td>
                        </tr>
                        <tr>
                            <td  width="100">Статус выполнения:</td>
                            <td width="150">
                                <select name="id" class="nosize_field" style="width: 140px;" onchange="Orders.unsetDisabled(this)">       
<{section name=i loop=$arrPageData.arStatus}>
                                    <option value="<{$arrPageData.arStatus[i].id}>" <{if $arrPageData.arStatus[i].id==$item.status}>selected<{/if}>><{$arrPageData.arStatus[i].title}></option>
<{/section}>
                                </select>
                            </td>
                            <td style="padding:10px;">
                                <textarea class="nosize_field" disabled style="width: 100%; height: 50px" name="comment"></textarea>
                            </td>
                            <td width="90">
                                <a class="buttons disabled" data-status="<{$item.status}>" data-option="status" onclick="Orders.updateOrder(this);">Сохранить</a>
                            </td>
                        </tr>
                        <tr>
                            <td  width="100">Статус оплаты:</td>
                            <td width="150">
                                <select name="id" class="nosize_field" style="width: 140px;" onchange="Orders.unsetDisabled(this)">       
                                    <option value="0" <{if $item.payment_status==0}>selected<{/if}>>Неоплачен</option>
                                    <option value="1" <{if $item.payment_status==1}>selected<{/if}>>Оплачен</option>
                                </select>
                            </td>
                            <td style="padding:10px;">
                                <textarea class="nosize_field" disabled style="width: 100%; height: 50px" name="comment"></textarea>
                            </td>
                            <td width="90">
                                <a class="buttons disabled" data-status="<{$item.payment_status}>" data-option="payment_status" onclick="Orders.updateOrder(this);">Сохранить</a>
                            </td>
                        </tr>
                    </table>
                    <div style="text-align: center; margin: 15px 0;">
                        <input type="submit" name="submit" class="buttons" style="display: inline-block;" value="Сохранить заказ"/>
                        <input class="buttons" name="submit_cancel" type="submit" style="display: inline-block;" value="<{$smarty.const.BUTTON_CANCEL}>" onclick="return userConfirm('cancel', '<{$smarty.const.CONFIRM_NOT_SAVE}>');"/>
                        <input class="buttons" name="submit_delete" type="submit" style="display: inline-block;" value="<{$smarty.const.BUTTON_DELETE}>" onclick="return userConfirm('delete', '<{$smarty.const.CONFIRM_DELETE}>');"/>
                    </div>
                    <div id="history">
                        <{include file='common/object_actions_log.tpl' arHistoryData=$item.arHistory}>
                    </div>
                </li>
            </ul>
        </div>
    </form>                
<script type="text/javascript">
    $(function(){
        Orders.init(<{$item.id}>);
    });
    function userConfirm(task, message) {
        if (window.confirm(message)) {
            switch (task) {
                case 'copy':
                    window.location='<{$arrPageData.current_url|cat:"&task=addItem&copyID="|cat:$item.id}>';
                    break;
                case 'clear':
                    document.forms[0].reset();
                    $.each(tinyMCE.editors, function() {
                        this.setContent('');
                    }); 
                    $.each($('input:text, textarea'), function() {
                        $(this).val('');
                    });
                    if($('select').length>0){
                        $.each($('select'), function(){
                            $('option', this).removeAttr("selected");
                            $('option:nth(0)', this).attr("selected", "selected");
                        });
                    }
                    // catalog clear
                    if($('#attrTable').length > 0) {
                        $('#attrTable tbody').html('');
                    }
                    if($('#list_settings_selected_related').length >0 ) {
                        $('#list_settings_selected_related').html('');
                    }
                    if($('#list_settings_all_related').length >0 ) {
                        $('#list_settings_all_related').html('');
                    }
                    if($('#list_settings_all_kits').length >0 ) {
                        $('#list_settings_all_kits').html('');
                    }
                    if($('#list_settings_selected_kits').length >0 ) {
                        $('#list_settings_selected_kits').html('');
                    }
                    // main clear
                    if($('#attrGroupsList').length>0) {
                        $.each($('#attrGroupsList').find('input:checkbox'), function() {
                            $(this).removeAttr('checked');
                            updateAttributesList(this);
                        });
                    }
                    if($('#filtersAllList').length>0) {
                        $.each($('#filtersAllList').find('input:checkbox'), function() {
                            $(this).removeAttr('checked');
                            updateFiltersList(this);
                        });
                    }
                    //attributes
                    if($('#defaultVals').length>0) {
                        $('#defaultVals').html('');
                    }
                    break;
                case 'cancel':
                    window.location='<{$arrPageData.current_url|cat:$arrPageData.filter_url}>';
                    break;
                case 'delete':
                    window.location='<{$arrPageData.current_url|cat:"&task=deleteItem&itemID="|cat:$item.id}>';
                    break;
            }
        } return false; 
    }
</script>
<{* +++++++++++++++++++++++++ SHOW ALL ITEMS ++++++++++++++++++++++++++ *}>
<{else}>
    <div class="noticePanel">
        Не забудь ознакомиться с <a href="https://irn5p8.axshare.com/" target="_blank">Картой бизнес-процесса</a>
    </div>
    <div class="clear"></div>       
    <form method="GET" id="filtersForm" action="<{$arrPageData.current_url|cat:$arrPageData.filter_url}>">
        <input type="hidden" name="module" value="<{$arrPageData.module}>"/>
        <table width="100%" border="0" cellspacing="1" cellpadding="0" class="list">
            <tr style="height:35px">
                <td>за период: 
                    c <input type="text" class="nosize_field" id="date_from" size="10" name="filters[date][from]" value="<{if isset($arrPageData.filters.date.from) && $arrPageData.filters.date.from}><{$arrPageData.filters.date.from}><{/if}>"/> <a href="javascript:void(0)" onclick="$('#date_from').val('')">x</a>
                    по <input type="text" size="10" class="nosize_field" id="date_to" name="filters[date][to]" value="<{if isset($arrPageData.filters.date.to) && $arrPageData.filters.date.to}><{$arrPageData.filters.date.to}><{/if}>"/> <a href="javascript:void(0)" onclick="$('#date_to').val('')">x</a>
                </td>
                <td>
<{section name=j loop=$arrPageData.arStatus}>
                    <input type="checkbox" name="filters[status][]" id="status_<{$arrPageData.arStatus[j].id}>" value="<{$arrPageData.arStatus[j].id}>" <{if isset($arrPageData.filters.status) and in_array($arrPageData.arStatus[j].id, $arrPageData.filters.status)}>checked<{/if}>/>
                    <label for="status_<{$arrPageData.arStatus[j].id}>"><{$arrPageData.arStatus[j].title}></label>&emsp;
<{/section}>
                </td>
                <td width="150" align="right" rowspan="2">
                    <button type="submit" class="buttons"><{$smarty.const.SITE_FOUND}></button>
                    <button type="reset" class="buttons" onclick="window.location.assign('<{$arrPageData.admin_url}>');">Сбросить фильтр</button>
                </td>
            </tr>
            <tr style="height:35px">
                <td colspan="2">
                    <input size="48" type="text" placeholder="введите имя и/или фамилию или номер заказа" class="field" id="categorySearch" name="filters[title]" value="<{if isset($arrPageData.filters.title)}><{$arrPageData.filters.title}><{/if}>" />
                    <{str_repeat("&emsp;", 2)}>
                    Тип заказа: &nbsp;
                    <select name="filters[type]">
                        <option value=""> -- Не выбрано -- </option>
<{section name=i loop=$arrPageData.arTypes}>
                        <option value="<{$arrPageData.arTypes[i].id}>" <{if isset($arrPageData.filters.type) AND $arrPageData.filters.type==$arrPageData.arTypes[i].id}>selected<{/if}>><{$arrPageData.arTypes[i].title}></option>
<{/section}>
                    </select>
                </td>
            </tr>
        </table>
    </form>

    <form method="post" action="<{$arrPageData.current_url|cat:"&task=reorderItems"}>" name="reorderItems">
        <table width="100%" border="0" cellspacing="1" cellpadding="0" class="list orders-list">
            <thead>
                <tr>
                    <td id="headb" align="center" width="20">№</td>
                    <td id="headb" align="center" width="95"><{$smarty.const.HEAD_DATE_ADDED}></td>
                    <td id="headb" align="left">Клиент</td>
                    <td id="headb" align="center" width="100">Телефон</td>
                    <td id="headb" align="center" width="90">Тип заказа</td>
                    <td id="headb" align="center" width="120">Статус</td>
                    <td id="headb" align="center" width="90">Оплачен</td>
                    <td id="headb" align="center" width="38"><{$smarty.const.HEAD_EDIT}></td>
                    <td id="headb" align="center" width="38"><{$smarty.const.HEAD_DELETE}></td>
                </tr>
            </thead>
            <tbody>
<{section name=i loop=$items}>
                <tr class="<{$items[i].classname}>">
                   <td align="center"><{$items[i].id}></td>
                   <td align="center"><{$items[i].created|date_format:"%d.%m.%y %H:%M"}></td>
                   <td><{$items[i].title}></td>
                   <td align="center"><{$items[i].phone}></td>
                   <td align="center"><{$items[i].typename}></td>
                   <td align="center"><{$items[i].statusname}></td>
                   <td align="center"><{if $items[i].payment_status>0}>Да<{else}>Нет<{/if}></td>
                   <td align="center">
                       <a href="<{$arrPageData.current_url|cat:$arrPageData.filter_url|cat:"&task=editItem&itemID="|cat:$items[i].id}>" title="<{$smarty.const.LABEL_EDIT}>">
                           <img src="<{$arrPageData.system_images}>edit.png" alt="<{$smarty.const.LABEL_EDIT}>"/>
                       </a>
                   </td>
                   <td align="center">
                       <a href="<{$arrPageData.current_url|cat:$arrPageData.filter_url|cat:"&task=deleteItem&itemID="|cat:$items[i].id}>" onclick="return confirm('<{$smarty.const.CONFIRM_DELETE}>');" title="<{$smarty.const.LABEL_DELETE}>">
                          <img src="<{$arrPageData.system_images}>delete.png" alt="<{$smarty.const.LABEL_DELETE}>" title="<{$smarty.const.LABEL_DELETE}>"/>
                       </a>
                   </td>
               </tr>
<{/section}>
            </tbody>
        </table>
        <table width="100%" border="0" cellspacing="1" cellpadding="0">
            <tr>
                <td align="center" width="350"></td>
                <td align="center" width="350">
<{if $arrPageData.total_pages>1}>
                    <!-- ++++++++++ Start PAGER ++++++++++++++++++++++++++++++++++++++++++++++++ -->
                    <{include file='common/pager.tpl' arrPager=$arrPageData.pager page=$arrPageData.page showTitle=0 showFirstLast=0 showPrevNext=0}>
                    <!-- ++++++++++ End PAGER ++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<{/if}>
                </td>
                <td align="right"></td>
            </tr>
        </table>
    </form>
<{/if}>
</div>