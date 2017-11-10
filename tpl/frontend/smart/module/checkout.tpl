<div class="page-container clearfix">
    <div class="container clearfix">
        <div class="c-left">
            <form action="" method="POST" class="orderForm ajaxForm" id="orderForm">
                <div class="form-wizard" id="wizard">
                    <h3>Контактная информация</h3>
                    <fieldset>
                        <div class="f-print">
                            <p class="uc">информация</p>
                            <p>о покупателе</p>
                        </div>
                        <div class="f-body">
                            <div class="f-row">
                                <div class="f-column">
                                    <input type="text" class="input-l required <{if isset($arrPageData.errors.firstname)}>error<{/if}>" name="firstname" value="<{if isset($item.firstname)}><{$item.firstname}><{/if}>" placeholder="Имя"/>
                                </div>
                                <div class="f-column">
                                    <input type="text" class="input-l required <{if isset($arrPageData.errors.surname)}>error<{/if}>" name="surname" value="<{if isset($item.surname)}><{$item.surname}><{/if}>" placeholder="Фамилия"/>
                                </div>
                            </div>
                            <div class="f-row">
                                <div class="f-column">
                                    <input type="tel" class="input-l required <{if isset($arrPageData.errors.phone)}>error<{/if}>" name="phone" value="<{if isset($item.phone)}><{$item.phone}><{/if}>" placeholder="+38"/>
                                </div>
                                <div class="f-column">
                                    <input type="text" class="input-l required <{if isset($arrPageData.errors.email)}>error<{/if}>" name="email"  value="<{if isset($item.email)}><{$item.email}><{/if}>" placeholder="E-mail"/>
                                </div>
                            </div>
                            <div class="f-row">
                                <textarea name="descr" placeholder="Комментарий к заказу" rows="4"></textarea>
                            </div>
                            <div class="f-row hidden">
                                <a href="#" class="proceed">Указать способ доставки и оплаты</a>
                            </div>
                        </div>
                    </fieldset>
                    <h3>Доставка</h3>
                    <fieldset>
                        <div class="f-print">
                            <p class="uc">жанна иванова</p>
                            <p data-src="email">z.ivanova@gmail.com</p>
                            <p data-src="phone">+380999027012</p>
                            <p data-src="comment">Во дворе злая собака</p>
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
                                <label class="checkbox" for="recepient">Получатель не я</label>
                            </div>
                            <div class="f-row hidden nomargin">
                                <div class="f-column">
                                    <input type="text" class="input-l required <{if isset($arrPageData.errors.firstname)}>error<{/if}>" name="recepient_first" value="<{if isset($item.recepient_first)}><{$item.recepient_first}><{/if}>" placeholder="Имя"/>
                                </div>
                                <div class="f-column">
                                    <input type="text" class="input-l required <{if isset($arrPageData.errors.surname)}>error<{/if}>" name="recepient_sur" value="<{if isset($item.recepient_sur)}><{$item.recepient_sur}><{/if}>" placeholder="Фамилия"/>
                                </div>
                                <div class="f-hint hint-user">Введите имя и фамилию получателя, если заказ будете получать не вы лично<br/>
                                Внимание! При получении заказа необходимо предьявить паспорт</div>
                            </div>
                        </div>
                    </fieldset>
                    <h3>Оплата</h3>
                    <fieldset>
                        <div class="f-print">
                            <p class="uc">жанна иванова</p>
                            <p data-src="email">z.ivanova@gmail.com</p>
                            <p data-src="phone">+380999027012</p>
                            <p data-src="comment">Во дворе злая собака</p>
                        </div>
                        <div class="f-body">
                            <div class="f-row">
<{foreach name=i from=$arrPageData.arPayment item=payment}>
                                <input type="radio" name="payment_id" value="<{$payment.id}>" class="hidden" id="payment_<{$payment.id}>" <{if (!isset($item.payment) AND $smarty.section.i.first) OR (isset($item.payment) AND $item.payment==$payment.id)}>checked<{/if}>/> 
                                <label for="payment_<{$payment.id}>" class="radiobox"><{$payment.title}></label>
<{/foreach}>
                            </div>
                            <div class="f-row hidden">
                                <div class="f-hint hint-card">Вы оплачиваете после подтверждения заказа в телефонном режиме<br/>
                                предварительно согласовав с менеджером сроки доставки товара.<br/>
                                Подробнее о <a href="<{include file="core/href.tpl" arCategory=$arrModules.delivery}>" target="_blank">способах оплаты заказа</a></div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </form>
        </div>
        <div class="c-right">
            <div class="f-summary ">
                <strong>Сумма к оплате</strong>
                <span class="price">
                    <{$Basket->getTotalPrice()|number_format:0:'.':' '}>
                </span>
            </div>
            <hr/>
            <a href="#" onclick="return Basket.open();" class="edit-order">Редактировать заказ</a>
            <hr/>
            <button class="btn btn-danger btn-xl">подтвердить заказ</button>
        </div>
    </div>
</div>