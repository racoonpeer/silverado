<?php /* Smarty version Smarty-3.1.14, created on 2017-10-17 22:23:37
         compiled from "tpl/frontend/smart/ajax/subscribe.tpl" */ ?>
<?php /*%%SmartyHeaderCode:106531916159e658b916c495-20111372%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0277188c0b0fcd7fabc5d748d295ecd7c82390e3' => 
    array (
      0 => 'tpl/frontend/smart/ajax/subscribe.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '106531916159e658b916c495-20111372',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arrPageData' => 0,
    'arrModules' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59e658b91b3b23_94362837',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e658b91b3b23_94362837')) {function content_59e658b91b3b23_94362837($_smarty_tpl) {?><div class="subscribe">
<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['result']=="success"){?>
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
<?php }else{ ?>
    <div class="h2">Подпишись и узнаешь первым</div>
    о новинках, акциях и подарках
    <form action="<?php echo $_smarty_tpl->getSubTemplate ("core/href.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['arrModules']->value['subscribe']), 0);?>
" method="POST" id="subscribeForm">
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
                    url: "<?php echo $_smarty_tpl->getSubTemplate ("core/href.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['arrModules']->value['subscribe']), 0);?>
",
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
<?php }?>
</div><?php }} ?>