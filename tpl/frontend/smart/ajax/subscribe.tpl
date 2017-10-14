<div class="subscribe">
<{if $arrPageData.result=="success"}>
    <div class="h2">Подписка оформлена!</div>
    отписаться можно в любое время. без спама!
    <div class="result">
        <canvas width="60" height="60" id="canvasSubscribeResult"></canvas>
    </div>
    <script type="text/javascript">
        function drawSubscribeResult(angle) {
            angle = angle||0;
            var canvas = document.getElementById('canvasSubscribeResult');
            if (canvas.getContext) {
                angle += 0.1;
                var ctx = canvas.getContext('2d');
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                ctx.strokeStyle = '#699';
                ctx.beginPath();
                ctx.lineWidth = 3;
                ctx.moveTo(18, 28);
                ctx.lineTo(28, 38);
                ctx.moveTo(27, 39);
                ctx.lineTo(45, 22);
                ctx.stroke();
                ctx.beginPath();
                ctx.arc(30, 30, 28, 0, angle * Math.PI, false);
                ctx.lineWidth = 2;
                ctx.stroke();
                if (angle < 2) {
                    setTimeout(function(){
                        drawSubscribeResult(angle);
                    }, 20);
                }
            }
        }
        drawSubscribeResult();
    </script>
<{else}>
    <div class="h2">Подпишись и узнаешь первым</div>
    о новинках, акциях и подарках
    <form action="<{include file="core/href.tpl" arCategory=$arrModules.subscribe}>" method="POST" id="subscribeForm">
        <input type="email" name="email" placeholder="E-mail"/>
        <button type="submit">подписаться</button>
    </form>
    <script>
        $(function(){
            var form = $("#subscribeForm");
            // bind to the form's submit event 
            form.on("submit", function(e) { 
                e.preventDefault();
                $.ajax({
                    url: "<{include file="core/href.tpl" arCategory=$arrModules.subscribe}>",
                    type: "POST",
                    dataType: "json",
                    data: form.serialize(),
                    success: function(json){
                        if (json.output && json.result=="success") form.closest(".subscribe").html(json.output);
                        else if (json.result=="error") form.addClass("form-error");
                    }
                });
                return false; 
            });
        });
    </script>
<{/if}>
</div>