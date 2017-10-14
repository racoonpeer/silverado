<div class="page-container container clearfix">
    <div class="c-left">
        <form class="orderForm ajaxForm" action="" id="orderForm" method="POST" onsubmit="return formCheck(this);">
            <div class="form-wizard" id="wizard">
                <h3>Контактная информация</h3>
                <fieldset>
                    <div class="f-row">
                        <div class="f-column">
                            <label>Имя</label>
                            <input type="text" class="required <{if isset($arrPageData.errors.firstname)}>error<{/if}>" name="firstname" value="<{if isset($item.firstname)}><{$item.firstname}><{/if}>"/>
                        </div>
                        <div class="f-column">
                            <label>Фамилия</label>
                            <input type="text" class="required <{if isset($arrPageData.errors.surname)}>error<{/if}>" name="surname" value="<{if isset($item.surname)}><{$item.surname}><{/if}>"/>
                        </div>
                    </div>
                    <div class="f-row">
                        <div class="f-column">
                            <label>Телефон</label>
                            <input type="tel" class="required <{if isset($arrPageData.errors.phone)}>error<{/if}>" name="phone" value="<{if isset($item.phone)}><{$item.phone}><{/if}>"/>
                        </div>
                        <div class="f-column">
                            <label>E-mail</label>
                            <input type="text" class="required <{if isset($arrPageData.errors.email)}>error<{/if}>" name="email"  value="<{if isset($item.email)}><{$item.email}><{/if}>"/>
                        </div>
                    </div>
                </fieldset>
                <h3>Доставка</h3>
                <fieldset>
                    <div class="f-row">
                        <div class="f-column">
                            <label>Способ доставки</label>
                            <select name="shipping">
<{section name=i loop=$arrPageData.arShipping}>
                                <option value="<{$arrPageData.arShipping[i].id}>" <{if isset($item.shipping) AND $arrPageData.arShipping[i].id==$item.shipping}>selected<{/if}>><{$arrPageData.arShipping[i].title}></option>
<{/section}>
                            </select>
                        </div>
                        <div class="f-column">
                            <a href="#" class="outside">Информация о доставке</a>
                        </div>
                    </div>
                    <div class="f-row">
                        <label>Телефон</label>
                        <input type="tel" class="required <{if isset($arrPageData.errors.phone)}>error<{/if}>" name="phone" value="<{if isset($item.phone)}><{$item.phone}><{/if}>"/>
                    </div>
                    <div class="f-row">
                        <div class="f-column">
                            <label>Телефон</label>
                            <input type="tel" class="required <{if isset($arrPageData.errors.phone)}>error<{/if}>" name="phone" value="<{if isset($item.phone)}><{$item.phone}><{/if}>"/>
                        </div>
                        <div class="f-column">
                            <label>E-mail</label>
                            <input type="text" class="required <{if isset($arrPageData.errors.email)}>error<{/if}>" name="email"  value="<{if isset($item.email)}><{$item.email}><{/if}>"/>
                        </div>
                    </div>
                </fieldset>
                        
                        
                <span class="hint"><{if isset($arrPageData.errors.surname)}><{$arrPageData.errors.surname}><{/if}></span>
                
                <br/>
                <span class="hint"><{if isset($arrPageData.errors.phone)}><{$arrPageData.errors.phone}><{/if}></span>
                <input type="text" class="required <{if isset($arrPageData.errors.phone)}>error<{/if}>" 
                       name="phone" value="<{if isset($item.phone)}><{$item.phone}><{/if}>" 
                       placeholder="+380 __ ___ __ __" id="phone"/>
                <br/>
                <span class="hint"><{if isset($arrPageData.errors.city)}><{$arrPageData.errors.city}><{/if}></span>
                <input type="text" class="required <{if isset($arrPageData.errors.city)}>error<{/if}>" 
                       name="city" value="<{if isset($item.city)}><{$item.city}><{/if}>" 
                       placeholder="Город"/>
                <br/>
                <span class="hint"><{if isset($arrPageData.errors.address)}><{$arrPageData.errors.address}><{/if}></span>
                <input type="text" class="required <{if isset($arrPageData.errors.address)}>error<{/if}>" 
                       name="address" value="<{if isset($item.address)}><{$item.address}><{/if}>" 
                       placeholder="Адрес доставки"/>
                <br/>
                <span class="hint"><{if isset($arrPageData.errors.email)}><{$arrPageData.errors.email}><{/if}></span>
                
                <br/>
                
                <br/>
                <select name="payment">
    <{section name=i loop=$arrPageData.arPayment}>
                    <option value="<{$arrPageData.arPayment[i].id}>" <{if isset($item.payment) AND $arrPageData.arPayment[i].id==$item.payment}>selected<{/if}>><{$arrPageData.arPayment[i].title}></option>
    <{/section}>
                </select>
                <br/>
                <textarea name="descr" placeholder="Комментарий"></textarea>
                <br/>
                <button type="submit" class="btn btn-big btn-red">ОТПРАВИТЬ ЗАКАЗ</button>
            </div>
        </form>
    </div>
</div>