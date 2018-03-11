<?php /* Smarty version Smarty-3.1.14, created on 2018-02-13 21:35:36
         compiled from "tpl/frontend/smart/module/quickcheckout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21443800735a1099004455e3-74739265%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45aae7b4d30011d92a47d181dcefb71a5abdc773' => 
    array (
      0 => 'tpl/frontend/smart/module/quickcheckout.tpl',
      1 => 1518550419,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21443800735a1099004455e3-74739265',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a1099005e59e7_65983017',
  'variables' => 
  array (
    'arrPageData' => 0,
    'trackingEcommerceJS' => 0,
    'arrModules' => 0,
    'item' => 0,
    'formData' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a1099005e59e7_65983017')) {function content_5a1099005e59e7_65983017($_smarty_tpl) {?><div class="callback-form">
<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['result']=="success"){?>
    <div class="result">
        <strong>Спасибо, отличный выбор!</strong><br/>
        Номер вашей заявки <?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['orderID'];?>
!<br/>
        Ожидайте звонок
    </div>
    <?php echo $_smarty_tpl->tpl_vars['trackingEcommerceJS']->value;?>

<?php }else{ ?>
    <form action="<?php echo $_smarty_tpl->getSubTemplate ("core/href.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['arrModules']->value['callback']), 0);?>
" method="POST" id="quickCheckoutForm">
        <div class="image">
            <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['image']['middle_image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
 <?php echo $_smarty_tpl->tpl_vars['item']->value['pcode'];?>
"/>
        </div>
        <div class="title">Купить <strong><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
 <?php echo $_smarty_tpl->tpl_vars['item']->value['pcode'];?>
</strong> в 1 клик</div>
        <div class="hint">Не нужно заполнять никаких форм<br/>
            просто оставьте свой номер<br/>
            <strong>Мы сами перезвоним вам</strong>
        </div>
        <input type="text" name="firstname" value="<?php if (isset($_smarty_tpl->tpl_vars['formData']->value['firstname'])){?><?php echo $_smarty_tpl->tpl_vars['formData']->value['firstname'];?>
<?php }?>" class="input-l <?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['errors']['firstname'])){?>error<?php }?>" placeholder="Ваше имя"/>
        <input type="tel" name="phone" value="<?php if (isset($_smarty_tpl->tpl_vars['formData']->value['phone'])){?><?php echo $_smarty_tpl->tpl_vars['formData']->value['phone'];?>
<?php }?>" class="input-l <?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['errors']['phone'])){?>error<?php }?>" placeholder="+38"/>
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
                    url: "<?php echo $_smarty_tpl->getSubTemplate ("core/href.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['arrModules']->value['quickcheckout'],'params'=>("itemID=").($_smarty_tpl->tpl_vars['arrPageData']->value['itemID'])), 0);?>
",
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
<?php }?>
</div><?php }} ?>