<h2 class="measure-info-title"><{$arCategory.title}></h2>
<div class="measure-info"><{$arCategory.text}></div>
<div class="measure-calculator">
    <form action="<{include file="core/href.tpl" arCategory=$arrModules.measure}>" method="POST" id="ajaxCalcForm">
        <label class="f-label">Длина окружности пальца (мм)</label>
        <input type="text" name="round"/>
        <input type="radio" class="hidden" name="width" id="widthThin" value="thin" checked/>
        <label class="radiobox" for="widthThin">Тонкое кольцо (до 5 мм.)</label><br/>
        <input type="radio" class="hidden" name="width" id="widthThick" value="thick"/>
        <label class="radiobox" for="widthThick">Широкое кольцо (5 мм. и более)</label>
        <button class="btn btn-l btn-danger btn-block">Рассчитать</button>
    </form>
    <div class="result hidden"></div>
</div>
<script type="text/javascript">
    $(function(){
        var Form = $("#ajaxCalcForm");
        Form.ajaxForm({
            dataType: "json",
            success: function(json){
                if (json.errors) {
                    for (var key in json.errors) {
                        Form.find("input[name=\"" + key + "\"]").addClass("error");
                    }
                } else if (json.result) {
                    Form.next(".result").removeClass("hidden").text(json.result);
                }
            },
            beforeSubmit: function(){
                Form.find("input").removeClass("error");
                Form.next(".result").addClass("hidden").text("");
            }
        });
    });
</script>