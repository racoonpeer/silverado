<?php /* Smarty version Smarty-3.1.14, created on 2017-10-11 23:40:16
         compiled from "tpl/frontend/smart/module/feedback.tpl" */ ?>
<?php /*%%SmartyHeaderCode:87370125659d253557e3493-65364950%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0268a09c679f9250e463ddd29377fa62fa757f7' => 
    array (
      0 => 'tpl/frontend/smart/module/feedback.tpl',
      1 => 1507479418,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '87370125659d253557e3493-65364950',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59d25355c5a5d5_87088125',
  'variables' => 
  array (
    'item' => 0,
    'arrPageData' => 0,
    'arCategory' => 0,
    'Captcha' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59d25355c5a5d5_87088125')) {function content_59d25355c5a5d5_87088125($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['item']->value['action']=='result'&&$_smarty_tpl->tpl_vars['item']->value['result']=='success'){?>
<div class="dataform">
    <div id="messages" class="<?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['errors'])){?>error<?php }elseif(!empty($_smarty_tpl->tpl_vars['arrPageData']->value['messages'])){?>info<?php }else{ ?>hidden_block<?php }?>">
<?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['errors'])){?>
    <?php echo implode($_smarty_tpl->tpl_vars['arrPageData']->value['errors'],'<br/>');?>

<?php }elseif(!empty($_smarty_tpl->tpl_vars['arrPageData']->value['messages'])){?>
    <?php echo implode($_smarty_tpl->tpl_vars['arrPageData']->value['messages'],'<br/>');?>

<?php }?>
    </div>
</div>

<?php }else{ ?>
<?php if (!empty($_smarty_tpl->tpl_vars['arCategory']->value['text'])){?><?php echo $_smarty_tpl->tpl_vars['arCategory']->value['text'];?>
<?php }?>
<div class="dataform">
    <div id="messages" class="<?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['errors'])){?>error<?php }elseif(!empty($_smarty_tpl->tpl_vars['arrPageData']->value['messages'])){?>info<?php }else{ ?>hidden_block<?php }?>">
<?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['errors'])){?>
    <?php echo implode($_smarty_tpl->tpl_vars['arrPageData']->value['errors'],'<br/>');?>

<?php }elseif(!empty($_smarty_tpl->tpl_vars['arrPageData']->value['messages'])){?>
    <?php echo implode($_smarty_tpl->tpl_vars['arrPageData']->value['messages'],'<br/>');?>

<?php }?>
    </div>
    <script type="text/javascript">
        <!--
        function formCheck(form){
            var regExpEmail = new RegExp("^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,4})$");
            var regExpPhone = new RegExp("^([0-9 \-]{7,17})$");
            var errors      = 0;
 
            $.each($(form).find('.requirefield'), function(i, input) {
                if ( input.value.length==0 // type=='text', type=='select-one', type=='textarea'
                 || (input.name=='email' && input.value.match(regExpEmail) == null) // type=='text', name=='email'
                 || (input.name=='phone' && input.value.match(regExpPhone) == null) // type=='text', name=='phone'
                    ){
                        if(!errors) $(this).focus();
                        $(this).addClass('required');
                        errors++;
                } else $(this).removeClass('required');
            });

            if(errors==0) return true;
            else alert("<?php echo @constant('FEEDBACK_ALERT_ERROR');?>
");
            return false;
        }
        //-->
    </script>
    <form method="post" action="" name="<?php echo $_smarty_tpl->tpl_vars['arCategory']->value['module'];?>
Form" onsubmit="return formCheck(this);">
        <table id="feedback_form" cellspacing="2" cellpadding="2" width="100%" border="0">
            <tr>
                <td class="lbl"><?php echo @constant('FEEDBACK_FIRST_NAME');?>
:<span class="required">*</span> </td>
                <td class="frm"><input maxlength="100" name="firstname" value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['firstname'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['firstname'];?>
<?php }?>" class="input requirefield" /></td>
            </tr>
            <tr>
                <td class="lbl"><?php echo @constant('FEEDBACK_TEL');?>
:<span class="required">*</span> </td>
                <td class="frm"><input maxlength="100" name="phone"  value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['phone'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['phone'];?>
<?php }?>" class="input requirefield" /></td>
            </tr>
            <tr>
                <td class="lbl"><?php echo @constant('FEEDBACK_EMAIL');?>
:<span class="required">*</span> </td>
                <td class="frm"><input maxlength="100" name="email"  value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['email'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
<?php }?>" class="input requirefield" /></td>
            </tr>
            <tr>
                <td class="lbl"><?php echo @constant('FEEDBACK_STRING_TEXT');?>
:<span class="required">*</span> </td>
                <td class="frm"><textarea name="text" rows="5" cols="40" class="textarea requirefield"><?php if (isset($_smarty_tpl->tpl_vars['item']->value['text'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['text'];?>
<?php }?></textarea></td>
            </tr>
            <tr>
                <td class="lbl"><?php echo @constant('FEEDBACK_CODE');?>
:<span class="required">*</span> </td>
                <td class="frm frm-code">
                    <img border="0" align="left" src="/interactive/captcha.php?zone=site&sid=<?php echo $_smarty_tpl->tpl_vars['Captcha']->value->GetGeneratedSID();?>
" class="conf-code-image" alt="<?php echo @constant('FEEDBACK_CONFIRMATION_CODE');?>
" title="<?php echo @constant('FEEDBACK_CONFIRMATION_CODE');?>
, <?php echo @constant('FEEDBACK_CODE_CASE');?>
" />
                    <input type="hidden" name="captcha[sid]" value="<?php echo $_smarty_tpl->tpl_vars['Captcha']->value->GetSID();?>
" id="captcha_sid" />
                    <input type="text" name="captcha[code]" value="" maxlength="<?php echo $_smarty_tpl->tpl_vars['Captcha']->value->GetCodeLength();?>
" class="input conf-code requirefield" id="captcha_code" title="<?php echo @constant('FEEDBACK_CODE_CASE');?>
" />
                </td>
            </tr>            
            <tr>
                <td class="lbl">&nbsp;</td>
                <td class="frm frm-notice"><small>* - <?php echo @constant('FEEDBACK_FILLING');?>
</small></td>
            </tr>
            <tr>
                <td class="lbl">&nbsp;</td>
                <td class="frm frm-button">
                    <input type="submit" class="submit" value="<?php echo @constant('FEEDBACK_STRING_SEND');?>
" />
                </td>
            </tr>
        </table>
    </form>
</div>
<?php }?><?php }} ?>