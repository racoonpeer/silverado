<div class="page-container clearfix">
    <div class="container clearfix">
        <div class="c-left">
            <form action="" method="POST" class="orderForm ajaxForm" id="orderForm">
                <div class="form-wizard" id="wizard">
                    <h3>���������� ����������</h3>
                    <fieldset>
                        <div class="f-print">
                            <p class="uc">����������</p>
                            <p>� ����������</p>
                        </div>
                        <div class="f-body">
                            <div class="f-row">
                                <div class="f-column">
                                    <input type="text" class="input-l required <{if isset($arrPageData.errors.firstname)}>error<{/if}>" name="firstname" value="<{if isset($item.firstname)}><{$item.firstname}><{/if}>" placeholder="���"/>
                                </div>
                                <div class="f-column">
                                    <input type="text" class="input-l required <{if isset($arrPageData.errors.surname)}>error<{/if}>" name="surname" value="<{if isset($item.surname)}><{$item.surname}><{/if}>" placeholder="�������"/>
                                </div>
                            </div>
                            <div class="f-row">
                                <div class="f-column">
                                    <input type="tel" class="input-l required <{if isset($arrPageData.errors.phone)}>error<{/if}>" name="phone" value="<{if isset($item.phone)}><{$item.phone}><{/if}>" placeholder="+38"/>
                                </div>
                                <div class="f-column">
                                    <input type="email" class="input-l required <{if isset($arrPageData.errors.email)}>error<{/if}>" name="email" value="<{if isset($item.email)}><{$item.email}><{/if}>" placeholder="E-mail"/>
                                </div>
                            </div>
                            <div class="f-row">
                                <textarea name="descr" placeholder="����������� � ������" rows="4"></textarea>
                            </div>
                            <div class="f-row clearfix">
                                <a href="#" class="proceed hidden">������� ������ ��������</a>
                            </div>
                        </div>
                    </fieldset>
                    <h3>��������</h3>
                    <fieldset>
                        <div class="f-print">
                            <p class="uc"><span data-source="firstname"></span> <span data-source="surname"></span></p>
                            <p data-source="email"></p>
                            <p data-source="phone"></p>
                            <p data-source="descr"></p>
                        </div>
                        <div class="f-body">
                            <div class="f-row">
<{foreach name=i from=$arrPageData.arShipping item=shipping}>
                                <input type="radio" name="shiping_id" value="<{$shipping.id}>" id="shipping_<{$shipping.id}>" class="hidden" checked/>
                                <label class="radiobox checked" for="shipping_<{$shipping.id}>"><{$shipping.title}></label>
<{/foreach}>
                            </div>
                            <div class="f-row">
                                <div class="f-column">
                                    <select class="input-l required js-data-ajax <{if isset($arrPageData.errors.city)}>error<{/if}>" name="city" id="city">
<{if isset($item.city)}>
                                        <option value="<{$item.city}>"><{$item.city}></option>
<{/if}>
                                    </select>
                                </div>
                            </div>
                            <div class="f-row">
                                <select class="input-l required js-data <{if isset($arrPageData.errors.address)}>error<{/if}>" name="address" id="address">
<{if isset($item.address)}>
                                    <option value="<{$item.address}>"><{$item.address}></option>
<{/if}>
                                </select>
                            </div>
                            <hr/>
                            <div class="f-row">
                                <input type="checkbox" name="recepient" id="recepient" class="hidden" value="1"/>
                                <label class="checkbox" for="recepient">���������� �� �</label>
                            </div>
                            <div class="f-row hidden nomargin">
                                <div class="f-column">
                                    <input type="text" class="input-l required <{if isset($arrPageData.errors.ext_firstname)}>error<{/if}>" name="ext_firstname" id="ext_firstname" value="<{if isset($item.ext_firstname)}><{$item.ext_firstname}><{/if}>" placeholder="���"/>
                                </div>
                                <div class="f-column">
                                    <input type="text" class="input-l required <{if isset($arrPageData.errors.ext_surname)}>error<{/if}>" name="ext_surname" id="ext_surname" value="<{if isset($item.ext_surname)}><{$item.ext_surname}><{/if}>" placeholder="�������"/>
                                </div>
                                <div class="f-hint hint-user">������� ��� � ������� ����������, ���� ����� ������ �������� �� �� �����<br/>
                                ��������! ��� ��������� ������ ���������� ���������� �������</div>
                            </div>
                            <div class="f-row stage-complete">
                                <a href="#" class="return">�����</a>
                                <a href="#" class="proceed hidden">������� ������ ������</a>
                            </div>
                        </div>
                    </fieldset>
                    <h3>������</h3>
                    <fieldset>
                        <div class="f-print">
                            <p class="uc"><span data-source="firstname"></span> <span data-source="surname"></span></p>
                            <p data-source="email"></p>
                            <p data-source="phone"></p>
                            <p data-source="descr"></p>
                        </div>
                        <div class="f-body">
                            <div class="f-row">
<{foreach name=i from=$arrPageData.arPayment item=payment}>
                                <input type="radio" name="payment_id" value="<{$payment.id}>" class="hidden" id="payment_<{$payment.id}>" <{if (!isset($item.payment) AND $smarty.foreach.i.first) OR (isset($item.payment) AND $item.payment==$payment.id)}>checked<{/if}>/> 
                                <label for="payment_<{$payment.id}>" class="radiobox"><{$payment.title}></label>
<{/foreach}>
                            </div>
                            <hr/>
                            <div class="f-row">
                                <div class="f-hint hint-box <{if isset($item.payment) AND $item.payment!=Checkout::CASH_PAYMENT_ID}>hidden<{/if}>" data-toggle-id="payment_<{Checkout::CASH_PAYMENT_ID}>">�� ����������� ����� ��� ��������� 
                                �������� � �������� ����� �� ������������ ������ ������, ���������� ����� � �����������.<br/>
                                ��������� � <a href="<{include file="core/href.tpl" arCategory=$arrModules.refund}>" target="_blank">�������� � ������ ������</a></div>
                                <div class="f-hint hint-card <{if !isset($item.payment) OR (isset($item.payment) AND $item.payment!=Checkout::LP_PAYMENT_ID)}>hidden<{/if}>" data-toggle-id="payment_<{Checkout::LP_PAYMENT_ID}>">�� ����������� ����� ������������� ������ � ���������� ������<br/>
                                �������������� ���������� � ���������� ����� �������� ������.<br/>
                                ��������� � <a href="<{include file="core/href.tpl" arCategory=$arrModules.delivery}>" target="_blank">�������� ������ ������</a></div>
                            </div>
                            <div class="f-row hidden stage-complete">
                                <a href="#" class="return">�����</a>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </form>
        </div>
        <div class="c-right">
            <div class="f-summary ">
                <strong>����� � ������</strong>
                <span class="price">
                    <{$Basket->getTotalPrice()|number_format:0:'.':' '}>
                </span>
            </div>
            <hr/>
            <a href="#" onclick="return Basket.open();" class="edit-order">������������� �����</a>
            <hr/>
            <input type="checkbox" class="hidden" name="agree" id="agree" value="1"/>
            <label class="checkbox" for="agree">�������� � ��������� <a href="<{include file="core/href.tpl" arCategory=$arrModules.refund}>" target="_blank">�������� � ������ ������</a></label>
            <button class="btn btn-danger btn-xl" disabled="">����������� �����</button>
        </div>
    </div>
</div>