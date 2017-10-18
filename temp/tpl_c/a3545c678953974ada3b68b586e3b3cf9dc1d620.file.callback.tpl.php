<?php /* Smarty version Smarty-3.1.14, created on 2017-10-18 23:06:27
         compiled from "tpl/frontend/smart/module/callback.tpl" */ ?>
<?php /*%%SmartyHeaderCode:181165530159e7b443cc32a2-40100975%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3545c678953974ada3b68b586e3b3cf9dc1d620' => 
    array (
      0 => 'tpl/frontend/smart/module/callback.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '181165530159e7b443cc32a2-40100975',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arrPageData' => 0,
    'arrModules' => 0,
    'formData' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59e7b443e31965_85735653',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e7b443e31965_85735653')) {function content_59e7b443e31965_85735653($_smarty_tpl) {?><div class="callback-form">
<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['result']=="success"){?>
    <div class="result">
        Спасибо, ваш запрос принят!<br/>
        Ожидайте звонок
    </div>
<?php }else{ ?>
    <form action="<?php echo $_smarty_tpl->getSubTemplate ("core/href.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['arrModules']->value['callback']), 0);?>
" method="POST" id="callbackForm">
        <div class="hint">Оставьте нам свой номер телефона<br/>
            и мы перезвоним вам.<br/>
            <strong>С 8:00 до 21:00 без выходных</strong></div>
        <input type="text" name="firstname" value="<?php if (isset($_smarty_tpl->tpl_vars['formData']->value['firstname'])){?><?php echo $_smarty_tpl->tpl_vars['formData']->value['firstname'];?>
<?php }?>" class="input-l <?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['errors']['firstname'])){?>error<?php }?>" placeholder="Ваше имя"/>
        <input type="tel" name="phone" value="<?php if (isset($_smarty_tpl->tpl_vars['formData']->value['phone'])){?><?php echo $_smarty_tpl->tpl_vars['formData']->value['phone'];?>
<?php }?>" class="input-l <?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['errors']['phone'])){?>error<?php }?>" placeholder="+38"/>
        <button type="submit" class="btn btn-l btn-danger">Отправить</button> 
    </form>
    <script type="text/javascript">
        $(function(){
            var form = $("#callbackForm");
            form.find("input[name=\"phone\"]").inputmask({
                mask: "+380999999999",
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
                    url: "<?php echo $_smarty_tpl->getSubTemplate ("core/href.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['arrModules']->value['callback']), 0);?>
",
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
<?php }?>
</div><?php }} ?>