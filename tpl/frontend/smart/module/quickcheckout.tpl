<div class="callback-form">
<{if $arrPageData.result=="success"}>
    <div class="result">
        <strong>�������, �������� �����!</strong><br/>
        ����� ����� ������ <{$arrPageData.orderID}>!<br/>
        �������� ������
    </div>
    <{$trackingEcommerceJS}>
<{else}>
    <form action="<{include file="core/href.tpl" arCategory=$arrModules.callback}>" method="POST" id="quickCheckoutForm">
        <div class="image">
            <img src="<{$item.image.middle_image}>" alt="<{$item.title}> <{$item.pcode}>"/>
        </div>
        <div class="title">������ <strong><{$item.title}> <{$item.pcode}></strong> � 1 ����</div>
        <div class="hint">�� ����� ��������� ������� ����<br/>
            ������ �������� ���� �����<br/>
            <strong>�� ���� ���������� ���</strong>
        </div>
        <input type="text" name="firstname" value="<{if isset($formData.firstname)}><{$formData.firstname}><{/if}>" class="input-l <{if isset($arrPageData.errors.firstname)}>error<{/if}>" placeholder="���� ���"/>
        <input type="tel" name="phone" value="<{if isset($formData.phone)}><{$formData.phone}><{/if}>" class="input-l <{if isset($arrPageData.errors.phone)}>error<{/if}>" placeholder="+38"/>
        <button type="submit" class="btn btn-l btn-danger">��������� ������</button> 
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