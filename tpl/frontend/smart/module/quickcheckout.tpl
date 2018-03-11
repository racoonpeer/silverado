<div class="callback-form">
<{if $arrPageData.result=="success"}>
    <div class="result">
        <strong>Спасибо, отличный выбор!</strong><br/>
        Номер вашей заявки <{$arrPageData.orderID}>!<br/>
        Ожидайте звонок
    </div>
    <{$trackingEcommerceJS}>
<{else}>
    <form action="<{include file="core/href.tpl" arCategory=$arrModules.callback}>" method="POST" id="quickCheckoutForm">
        <div class="image">
            <img src="<{$item.image.middle_image}>" alt="<{$item.title}> <{$item.pcode}>"/>
        </div>
        <div class="title">Купить <strong><{$item.title}> <{$item.pcode}></strong> в 1 клик</div>
        <div class="hint">Не нужно заполнять никаких форм<br/>
            просто оставьте свой номер<br/>
            <strong>Мы сами перезвоним вам</strong>
        </div>
        <input type="text" name="firstname" value="<{if isset($formData.firstname)}><{$formData.firstname}><{/if}>" class="input-l <{if isset($arrPageData.errors.firstname)}>error<{/if}>" placeholder="Ваше имя"/>
        <input type="tel" name="phone" value="<{if isset($formData.phone)}><{$formData.phone}><{/if}>" class="input-l <{if isset($arrPageData.errors.phone)}>error<{/if}>" placeholder="+38"/>
        <button type="submit" class="btn btn-l btn-danger">Отправить заявку</button> 
    </form>
    <script type="text/javascript">
        $(function(){
            var form = $("#quickCheckoutForm");
            form.find("input[name=\"phone\"]").inputmask({
                mask: "+38 999 999 99 99",
                greedy: false,
                definitions: {
                    '*': {
                        validator: "[0-9]",
                        cardinality: 1,
                        casing: "lower"
                    }
                }
            });
            // bind to the form's submit event 
            form.on("submit", function(e){ 
                e.preventDefault();
                $.ajax({
                    url: "<{include file="core/href.tpl" arCategory=$arrModules.quickcheckout params="itemID="|cat:$arrPageData.itemID}>",
                    type: "POST",
                    dataType: "json",
                    data: form.serialize(),
                    success: function(json){
                        if (json.output) $(".callback-form").replaceWith(json.output);
                    }
                }); return false; 
            });
        });
    </script>
<{/if}>
</div>