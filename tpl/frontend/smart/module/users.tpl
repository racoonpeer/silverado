<{if $objUserInfo->logined && !empty($item.id) && $arrPageData.action=='edit'}>
<div class="m-title mt-oformlenia">
    <div class="mtc-l">�������������� �������</div>
</div>
<div class="m-body mb-oformlenia">
    <!-- �������� � ��������� ��� static ����������� ������-->
    <table class="fix-position"><tr><td>
        <script type="text/javascript">
        <!--
            function formCheck(form){
                var arErrors = new Array();
                var regExpEmail = new RegExp("^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,4})$");
                var regExpPhone = new RegExp("^([0-9 \-]{7,17})$");
                // Required: address, city, phone, surname, firstname, currpass, confpass, pass, email //, login
                if(form.address.value === "") {
                    arErrors.unshift('������� ���������� ��� ������!');
                    form.address.focus();
                }
                if(form.city.value === "") {
                    arErrors.unshift('������� ���������� ��� �����!');
                    form.city.focus();
                }
                if(form.phone.value === "" || form.phone.value.match(regExpPhone) === null) {
                    arErrors.unshift('������� ���������� ��� �������!');
                    form.phone.focus();
                }             
                if(form.surname.value === "") {
                    arErrors.unshift('������� ���������� ���� �������!');
                    form.surname.focus();
                }  
                if(form.firstname.value === "") {
                    arErrors.unshift('������� ���������� ���� ���!');
                    form.firstname.focus();
                }
<{if $objUserInfo->type!='Administrator'}>
                if(form.currpass.value === "") {
                    arErrors.unshift('����� �������� ������, ������� ���������� ��� ������� ������!');
                    form.currpass.focus();
                }
<{/if}>
                if(form.pass.value !== "" || form.confpass.value !== "") {
                    if(form.pass.value === "") {
                        arErrors.unshift('������� ���������� ��� ����� ������!');
                        form.pass.focus();
                    }
                    if(form.confpass.value === "") {
                        arErrors.unshift('����������� ���������� ��� ����� ������!');
                        form.confpass.focus();
                    }
                    if(form.pass.value !== form.confpass.value) {
                        arErrors.unshift('��� ����� ������ � ������������� ������ ������ �� ���������!');
                        form.pass.focus();
                    }
                }
                if (form.email.value.match(regExpEmail) === null){
                    if (form.email.value.search(";") !== -1 || form.email.value.search(",") !== -1 || form.email.value.search(" ") !== -1  ) 
                         arErrors.unshift("������ ������� ����� ������ ������ email. ��� �� ����� ������������ email �����!");
                    else arErrors.unshift("�������, ����������, ���������� ��� ����������� �����!");
                    form.email.focus();
                }
                if ( arErrors.length > 0){
                    $('#messages').html('<ul><li>'+arErrors.join("</li><li>")+'</li></ul>')
                                  .removeAttr("class")
                                  .addClass("error");
                } else {
                    form.submit();
                    return true;
                };
                return false;
            }   
        //-->
        </script>
        <div id="messages" class="<{if !empty($arrPageData.errors)}>error<{elseif !empty($arrPageData.messages)}>info<{else}>hidden_block<{/if}>">
        <{if !empty($arrPageData.errors)}>
            <{$arrPageData.errors|@implode:'<br/>'}>
        <{elseif !empty($arrPageData.messages)}>
            <{$arrPageData.messages|@implode:'<br/>'}>
        <{/if}>
        </div>
        <form method="post" action="" name="<{$arCategory.module}>Form" onsubmit="return formCheck(this);">
            <table class="userdataform" align="center">
                <tbody>
                    <tr>
                        <td class="lbl">Email:<font>*</font></td>
                        <td class="frm">
                            <div class="wp1-input">
                                <div class="wp2-input">
                                    <input type="hidden" value="<{$item.email}>" name="curremail" />
                                    <input type="text" value="<{$item.email}>" name="email" />
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr<{if $objUserInfo->type=='Administrator'}> style="display:none;"<{/if}>>
                        <td class="lbl">�������&nbsp;������:<font>*</font></td>
                        <td class="frm">
                            <div class="wp1-input">
                                <div class="wp2-input">
                                    <input type="password" value="" name="currpass" />
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="lbl">�����&nbsp;������:</td>
                        <td class="frm">
                            <div class="wp1-input">
                                <div class="wp2-input">
                                    <input type="password" value="" name="pass" />
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="lbl">���������&nbsp;������:</td>
                        <td class="frm">
                            <div class="wp1-input">
                                <div class="wp2-input">
                                    <input type="password" value="" name="confpass" />
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="lbl">���:<font>*</font></td>
                        <td class="frm">
                            <div class="wp1-input">
                                <div class="wp2-input">
                                    <input type="text" value="<{$item.firstname}>" name="firstname" />
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="lbl">��������: </td>
                        <td class="frm">
                            <div class="wp1-input">
                                <div class="wp2-input">
                                    <input type="text" value="<{$item.middlename}>" name="middlename" />
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="lbl">�������:<font>*</font></td>
                        <td class="frm">
                            <div class="wp1-input">
                                <div class="wp2-input">
                                    <input type="text" value="<{$item.surname}>" name="surname" />
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="lbl">�������:<font>*</font></td>
                        <td class="frm">
                            <div class="wp1-input">
                                <div class="wp2-input">
                                    <input type="text" value="<{$item.phone}>" name="phone" />
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="lbl">�����:<font>*</font></td>
                        <td class="frm">
                            <div class="wp1-input">
                                <div class="wp2-input">
                                    <input type="text" value="<{$item.city}>" name="city" />
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="lbl">�����:<font>*</font></td>
                        <td class="frm">
                            <div class="wp1-textarea">
                                <div class="wp2-textarea">
                                    <textarea name="address" cols="50" rows="7"><{$item.address}></textarea>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="lbl">��������������&nbsp;&nbsp;&nbsp;<br />����������:<font>&nbsp;</font></td>
                        <td class="frm">
                            <div class="wp1-textarea">
                                <div class="wp2-textarea">
                                    <textarea name="descr" cols="50" rows="7"><{$item.descr}></textarea>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="subscribe">
                                <input id="subscribe" name="subscribe" type="checkbox" value="1"<{if !empty($item.subscribe)}> checked<{/if}> />
                                <label for="subscribe">���������� �� ��������</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="lbl"></td>
                        <td class="frm">
                            <a href="javascript:void(0);" onclick="formCheck(document.<{$arCategory.module}>Form);" class="obtn"><span>�����������</span></a>
                            <a href="<{include file='core/href_item.tpl' arCategory=$arCategory arItem=$item}>" class="obtn"><span>��������</span></a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="info">
                            <font class="star">*</font> - ���� ������������ ��� ����������
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </td></tr></table>
</div>
<{elseif $objUserInfo->logined && !empty($item.id)}>
<div class="m-title mt-oformlenia">
    <div class="mtc-l">��� �������</div>
</div>
<div class="m-body mb-oformlenia">
    <!-- �������� � ��������� ��� static ����������� ������-->
    <table class="fix-position"><tr><td>
        <div id="messages" class="<{if !empty($arrPageData.errors)}>error<{elseif !empty($arrPageData.messages)}>info<{else}>hidden_block<{/if}>">
        <{if !empty($arrPageData.errors)}>
            <{$arrPageData.errors|@implode:'<br/>'}>
        <{elseif !empty($arrPageData.messages)}>
            <{$arrPageData.messages|@implode:'<br/>'}>
        <{/if}>
        </div>
        <table class="userdataform" align="center">
            <tbody>
                <tr>
                    <td class="lbl">Email:</td>
                    <td class="frm"><{$item.email}></td>
                </tr>
                <tr>
                    <td class="lbl">���:</td>
                    <td class="frm"><{$item.firstname}></td>
                </tr>
                <tr>
                    <td class="lbl">��������: </td>
                    <td class="frm"><{$item.middlename}></td>
                </tr>
                <tr>
                    <td class="lbl">�������:</td>
                    <td class="frm"><{$item.surname}></td>
                </tr>
                <tr>
                    <td class="lbl">�������:</td>
                    <td class="frm"><{$item.phone}></td>
                </tr>
                <tr>
                    <td class="lbl">�����:</td>
                    <td class="frm"><{$item.city}></td>
                </tr>
                <tr>
                    <td class="lbl">�����:</td>
                    <td class="frm"><{$item.address}></td>
                </tr>
                <tr>
                    <td class="lbl">��������������&nbsp;&nbsp;&nbsp;<br />����������:<font>&nbsp;</font></td>
                    <td class="frm"><{$item.descr}></td>
                </tr>
                <tr>
                    <td colspan="2"><{if $item.subscribe}>��������<{else}>����������<{/if}> �� ��������</td>
                </tr>
                <tr>
                    <td class="lbl"></td>
                    <td class="frm"><a href="<{include file='core/href_item.tpl' arCategory=$arCategory arItem=$item params='action=edit'}>" class="obtn"><span>�������������</span></a></td>
                </tr>
            </tbody>
        </table>
    </td></tr></table>
</div>
<{elseif !empty($items)}>
<div class="m-title mt-oformlenia">
    <div class="mtc-l">������������</div>
</div>
<div class="m-body mb-oformlenia">
    <!-- �������� � ��������� ��� static ����������� ������-->
    <table class="fix-position"><tr><td>
        <div id="messages" class="<{if !empty($arrPageData.errors)}>error<{elseif !empty($arrPageData.messages)}>info<{else}>hidden_block<{/if}>">
        <{if !empty($arrPageData.errors)}>
            <{$arrPageData.errors|@implode:'<br/>'}>
        <{elseif !empty($arrPageData.messages)}>
            <{$arrPageData.messages|@implode:'<br/>'}>
        <{/if}>
        </div>
                
        <div class="items">
<{section name=i loop=$items}>
            <table class="item">
                <tr>
                    <td class="i" rowspan="2">
                        <a class="title" href="<{include file='core/href_item.tpl' arCategory=$arCategory arItem=$items[i]}>">
                            <img alt="" src="<{$items[i].small_image}>" />
                        </a>
                    </td>
                    <td class="t">
                        <p><a href="<{include file='core/href_item.tpl' arCategory=$arCategory arItem=$items[i]}>"><{$items[i].title}></a></p>
                    </td>
                </tr>
                <tr>
                    <td class="t">
                        <p><a class="detail" href="<{include file='core/href_item.tpl' arCategory=$arCategory arItem=$items[i]}>">��������� ����������</a></p>
                    </td>
                </tr>
            </table>
<{/section}>
        </div>
        <!-- ������ ������������� -->
<{if $arrPageData.total_pages>1}>
        <div class="pager">
<!-- ++++++++++ Start PAGER ++++++++++++++++++++++++++++++++++++++++++++++++ -->
<{include file='core/pager.tpl' arrPager=$arrPageData.pager page=$arrPageData.page showTitle=0 showFirstLast=0 showPrevNext=1 showAll=0}>
<!-- ++++++++++ End PAGER ++++++++++++++++++++++++++++++++++++++++++++++++++ -->
            <div class="cf-clear"></div>
        </div>
<{/if}>
    </td></tr></table>
</div>

<{else}>
<div class="m-title mt-oformlenia">
    <div class="mtc-l">������ �������</div>
</div>
<div class="m-body mb-oformlenia">
    <!-- �������� � ��������� ��� static ����������� ������-->
    <table class="fix-position"><tr><td>
        <div id="messages" class="<{if !empty($arrPageData.errors)}>error<{elseif !empty($arrPageData.messages)}>info<{else}>hidden_block<{/if}>">
        <{if !empty($arrPageData.errors)}>
            <{$arrPageData.errors|@implode:'<br/>'}>
        <{elseif !empty($arrPageData.messages)}>
            <{$arrPageData.messages|@implode:'<br/>'}>
        <{/if}>
        </div>
        <p>������ � ������ �������� ������.</p>
        <p><a href="<{include file='core/href.tpl' arCategory=$arrModules.authorize}>" class="obtn" title="�����������"><span><{$arrModules.authorize.title}></span></a></p>
    </td></tr></table>
</div>
<{/if}>
