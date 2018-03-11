<div class="callback-form">
<{if $arrPageData.result=="success"}>
    <div class="result">
        Спасибо, ваш запрос принят!<br/>
        Ожидайте звонок
    </div>
<{else}>
    <form action="<{include file="core/href.tpl" arCategory=$arrModules.callback}>" method="POST" id="callbackForm">
        <div class="hint">Оставьте нам свой номер телефона<br/>
            и мы перезвоним вам.<br/>
            <strong>С 8:00 до 21:00 без выходных</strong></div>
        <input type="text" name="firstname" value="<{if isset($formData.firstname)}><{$formData.firstname}><{/if}>" class="input-l <{if isset($arrPageData.errors.firstname)}>error<{/if}>" placeholder="Ваше имя"/>
        <input type="tel" name="phone" value="<{if isset($formData.phone)}><{$formData.phone}><{/if}>" class="input-l <{if isset($arrPageData.errors.phone)}>error<{/if}>" placeholder="+38"/>
        <button type="submit" class="btn btn-l btn-danger">Отправить</button> 
    </form>
    <script type="text/javascript">
        $(function(){
            var form = $("#callbackForm");
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
            form.on("submit", function(e) { 
                e.preventDefault();
                $.ajax({
                    url: "<{include file="core/href.tpl" arCategory=$arrModules.callback}>",
                    type: "POST",
                    dataType: "json",
                    data: form.serialize(),
                    success: function(json){
                        if (json.output) $(".callback-form").replaceWith(json.output);
                    }
                });
                return false; 
            });
        });
    </script>
<{/if}>
</div>