<?php /* Smarty version Smarty-3.1.14, created on 2017-10-07 22:41:50
         compiled from "tpl/backend/weblife/module/users.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10201361959d92dfe535527-18374204%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b8c79f122b91545592b4f9963bca43a5eb9cc53b' => 
    array (
      0 => 'tpl/backend/weblife/module/users.tpl',
      1 => 1466018023,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10201361959d92dfe535527-18374204',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arrPageData' => 0,
    'item' => 0,
    'objUserInfo' => 0,
    'arrUserTypes' => 0,
    'iItem' => 0,
    'arrNewItems' => 0,
    'items' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59d92dff59a5a7_92500682',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59d92dff59a5a7_92500682')) {function content_59d92dff59a5a7_92500682($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ('common/module_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>@constant('USERS_TITLE'),'creat_title'=>@constant('ADMIN_CREATING_NEW_USER'),'edit_title'=>@constant('ADMIN_EDIT_USER')), 0);?>



<div id="right_block">

<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['task']=='addItem'||$_smarty_tpl->tpl_vars['arrPageData']->value['task']=='editItem'){?>
<form method="post" action="<?php echo (($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&task=")).($_smarty_tpl->tpl_vars['arrPageData']->value['task']);?>
<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['itemID']>0){?><?php echo (('').("&itemID=")).($_smarty_tpl->tpl_vars['arrPageData']->value['itemID']);?>
<?php }?>" name="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['task'];?>
Form" onsubmit="return formCheck(this);" enctype="multipart/form-data">
   <div class="tabsContainer">
        <ul class="nav">
            <li><a href="javascript:void(0);" data-target="main" class="active">Основные</a></li>
            <li><a href="javascript:void(0);" data-target="history">История</a></li>
        </ul>
        <div class="tab_line"></div>
        <ul class="tabs">
            <li class="active" id="tab_main">
                <table width="100%" border="0" cellspacing="1" cellpadding="0" class="" align="center">
                    <tr>
                        <td  width="250" align="center" valign="top">
                            <b><?php echo @constant('HEAD_IMAGE');?>
: </b>
                            <div style="margin:10px 5px;border:1px solid #999999;background-color:#E5E5E5;width:<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['image'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['arImageData']['w'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['def_img_param']['w'];?>
<?php }?>px;height:<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['image'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['arImageData']['h'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['def_img_param']['h'];?>
<?php }?>px;">
                                <?php if (!empty($_smarty_tpl->tpl_vars['item']->value['image'])){?><img src="<?php echo ($_smarty_tpl->tpl_vars['arrPageData']->value['files_url']).($_smarty_tpl->tpl_vars['item']->value['image']);?>
" border="0" alt="" /><?php }?>
                            </div>
                        </td>
                        <td  valign="top">
                            <strong>Данные пользователя: </strong><br/><br/>

                            <div class="inline">Доступ: <span class="required">*</span> </div>
                            <select name="type" class="field requirefield" style="width:132px; height:19px;"<?php if ($_smarty_tpl->tpl_vars['item']->value['id']==1||$_smarty_tpl->tpl_vars['objUserInfo']->value->type!='Administrator'){?> disabled="disabled"<?php }?>>
                                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrUserTypes']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['arrUserTypes']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['name'];?>
"<?php if ($_smarty_tpl->tpl_vars['item']->value['type']==$_smarty_tpl->tpl_vars['arrUserTypes']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['name']||($_smarty_tpl->tpl_vars['arrPageData']->value['task']=='addItem'&&$_smarty_tpl->tpl_vars['arrUserTypes']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['name']=='Registered')){?>  selected<?php }?>> &nbsp; <?php echo $_smarty_tpl->tpl_vars['arrUserTypes']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
 </option>
                                <?php endfor; endif; ?>
                            </select><br/><br/>

                            <div class="inline"><?php echo @constant('USERS_ENABLED');?>
: <span class="required">*</span> </div>
                            <select name="active" class="field requirefield" style="width:132px; height:19px;"<?php if ($_smarty_tpl->tpl_vars['item']->value['id']==1||$_smarty_tpl->tpl_vars['objUserInfo']->value->type!='Administrator'){?> disabled="disabled"<?php }?>>
                                <option value="1"> <?php echo @constant('OPTION_YES');?>
 </option>
                                <option value="0"<?php if ($_smarty_tpl->tpl_vars['item']->value['active']==0){?> selected<?php }?>> <?php echo @constant('OPTION_NO');?>
 </option>
                            </select><br/><br/>

                            <div class="inline"><?php echo @constant('USERS_LOGIN');?>
: <span class="required">*</span> </div>
                            <input class="field requirefield" size="90" name="login" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['login'];?>
"<?php if ($_smarty_tpl->tpl_vars['item']->value['id']==1||$_smarty_tpl->tpl_vars['objUserInfo']->value->type!='Administrator'){?> readonly<?php }?> />
                            <input name="old_login" size="70" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['login'];?>
" /><br/><br/>


            <?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['task']=='addItem'){?>
                             <div class="inline"><b><?php echo @constant('USERS_PASS');?>
: </b><span class="required">*</span> </div>
                             <input class="field requirefield" size="90" name="pass"  type="password" value="" /><br/><br/>
                             <div class="inline"><b><?php echo @constant('USERS_CONFPASS');?>
: </b><span class="required">*</span> </div>
                             <input class="field requirefield" size="90" name="confpass" type="password" value="" /><br/><br/>
            <?php }elseif($_smarty_tpl->tpl_vars['arrPageData']->value['task']=='editItem'){?>
                             <?php if ($_smarty_tpl->tpl_vars['objUserInfo']->value->type=='Administrator'){?> 
                                <div class="inline">Старый пароль: <?php if ($_smarty_tpl->tpl_vars['objUserInfo']->value->type!='Administrator'){?><span class="required">*</span><?php }?></div>
                                <input class="field<?php if ($_smarty_tpl->tpl_vars['objUserInfo']->value->type!='Administrator'){?> requirefield<?php }?>" name="old_pass"  size="90" type="password" value="" /><br/><br/>
                             <?php }?>

                             <div class="inline"><?php echo @constant('USERS_NEW_PASS');?>
:</div>
                             <input class="field" name="pass" size="90" type="password" value="" /><br/><br/>
                             <div class="inline"><?php echo @constant('USERS_CONFPASS');?>
:</div>
                             <input class="field" name="confpass" size="90" type="password" value="" /><br/><br/>
            <?php }?>
                             <div class="inline left"><?php echo @constant('USERS_AUTO_PASS');?>
</div>
                             <input class="field left" name="autogenpass" id="autogenpass" size="28"  type="text" value="" style="margin-top:5px; margin-left: 3px; margin-right:10px;" readonly size="13"/>
                             <input id='passGenerate' name='passGenerate' class='buttons left' type='button' style="margin-right:8px; width:150px;" value='<?php echo @constant('HEAD_GENERATE');?>
' onclick="generatePassword(this.form);" style="cursor:pointer; margin-top:0;" />
                             <input id='passApply' name='passApply' class='buttons left' type='button' style="margin-top:5px;" value='<?php echo @constant('BUTTON_APPLY');?>
' onclick="applyPassword(this.form);" style="cursor:pointer; margin-top:0;" /><br/><br/>
                             <div class="clear"></div>
                             <small style="margin-left:110px;"><?php echo @constant('USERS_COPY_PASS_BEFORE_SAVE');?>
</small><br/><br/>

                             <div class="inline"><?php echo @constant('USERS_SNAME');?>
: <span class="required">*</span></div>
                             <input class="field requirefield" name="surname" size="90" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['surname'];?>
" /><br/><br/>

                             <div class="inline"><?php echo @constant('USERS_FNAME');?>
: <span class="required">*</span> </div>
                             <input class="field requirefield" name="firstname" size="90" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['firstname'];?>
" /><br/><br/>

                             <div class="inline"><?php echo @constant('USERS_MNAME');?>
: </div>
                             <input class="field" name="middlename" type="text" size="90" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['middlename'];?>
" /><br/><br/>

                             <div class="inline"><?php echo @constant('USERS_PHONE');?>
: </div>
                             <input class="field" name="phone" type="text" size="90" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['phone'];?>
" /><br/><br/>

                             <div class="inline"><?php echo @constant('USERS_MAIL');?>
: <span class="required">*</span> </div>
                             <input class="field requirefield" name="email" size="90" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
" />
                             <input name="old_email" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
" /><br/><br/>

                             <div class="inline"><?php echo @constant('LABEL_ADDRESS');?>
: </div>
                             <input class="field" name="address" type="text" size="90" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['address'];?>
" /><br/><br/>

                             <strong><?php echo @constant('USERS_DESCR');?>
: </strong><br/><br/>
                             <textarea name="descr" id="descr" style="width:580px; height:60px;" class="field"><?php echo $_smarty_tpl->tpl_vars['item']->value['descr'];?>
</textarea><br/><br/>

                             <div class="inline"><?php echo @constant('HEAD_FILES_MANAGER');?>
: </div>
                             <?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['task']=='editItem'){?>
                                <a href="/admin.php?module=users_files_uploadify&ajax=1&pmodule=<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['module'];?>
&pid=<?php if ($_smarty_tpl->tpl_vars['item']->value['id']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }else{ ?>0<?php }?>&files_params=<?php echo urlencode(base64_encode(serialize($_smarty_tpl->tpl_vars['arrPageData']->value['files_params'])));?>
" onclick="return hs.htmlExpand(this, { headingText:'<?php echo @constant('HEAD_FILES_MANAGER');?>
', objectType:'iframe', preserveContent: false, width:900 } );"><?php echo @constant('HEAD_OPEN_MANAGER');?>
</a>
                             <?php }else{ ?>
                                <?php echo @constant('HEAD_FILES_MANAGER_ACCESS');?>
                        
                             <?php }?><br/><br/>

                             <div class="inline"><?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['task']=='addItem'){?><?php echo @constant('BUTTON_ADD');?>
<?php }else{ ?>Редактировать<?php }?> изображение:</div>
                             <input name="image" type="file"<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['image'])){?> onchange="if(this.value.length){ $('#image_delete').attr({checked:true, readonly:true}); this.form.image_w.value=''; this.form.image_h.value='';}"<?php }?> /><br/><br/>

                             <div class="inline"><?php echo @constant('HEAD_IMAGE_PARAMS');?>
:</div>
                             <label for="image_w"><?php echo @constant('HEAD_WIDTH');?>
: <input class="field_smal" name="image_w" id="image_w" type="text" value="<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['image'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['arImageData']['w'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['def_img_param']['w'];?>
<?php }?>" size="2" /></label>
                             &nbsp;&nbsp;
                             <label for="image_h"><?php echo @constant('HEAD_HEIGHT');?>
: <input class="field_smal" name="image_h" id="image_h" type="text" value="<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['image'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['arImageData']['h'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['def_img_param']['h'];?>
<?php }?>" size="2" /></label>
                             &nbsp;&nbsp;
                             <label for="image_delete"><?php echo @constant('HEAD_DELETE');?>
: <input id="image_delete" name="image_delete" type="checkbox" value="1"<?php if (empty($_smarty_tpl->tpl_vars['item']->value['image'])){?> disabled<?php }?> onclick="if($(this).attr('readonly')){return false;}" /></label>          
                        </td>
                        <td rowspan="0" class="buttons_row" valign="top" width="144">
            <!-- ++++++++++ Start Buttons ++++++++++++++++++++++++++++++++++++++++++++++ -->
            <?php echo $_smarty_tpl->getSubTemplate ('common/buttons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('itemID'=>$_smarty_tpl->tpl_vars['item']->value['id'],'task'=>$_smarty_tpl->tpl_vars['arrPageData']->value['task'],'deleteIDLimit'=>1), 0);?>

            <!-- ++++++++++ End Buttons ++++++++++++++++++++++++++++++++++++++++++++++++ -->
                        </td>
                    </tr>
                </table>
        </li>
        <li id="tab_history">
            <?php echo $_smarty_tpl->getSubTemplate ("common/object_actions_log.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arHistoryData'=>$_smarty_tpl->tpl_vars['item']->value['arHistory']), 0);?>

        </li>

    </ul>
</div>
</form>
<script type="text/javascript">
<!--
    function formCheck(form){
        var regExpEmail = new RegExp("^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,4})$");
        var regExpPhone = new RegExp("^([0-9 \-]{7,17})$");
        var errors      = 0;

        $.each($(form).find('.requirefield'), function(i, input) {
            if ( input.value.length===0 // type=='text', type=='select-one', type=='textarea'
             || (input.name==='email' && input.value.match(regExpEmail) === null) // type=='text', name=='email'
             || (input.name==='phone' && input.value.match(regExpPhone) === null) // type=='text', name=='phone'
                ){
                    if(!errors) $(this).focus();
                    $(this).addClass('required');
                    errors++;
            } else $(this).removeClass('required');
        });

        if(!errors){
            return true;
        } else alert("<?php echo @constant('USERS_EMPTY_FIELDS');?>
");
        return false;
    }
    function applyPassword(form){
        if(confirm('<?php echo @constant('USERS_CONFIRM_CHANGE_PASS');?>
')){
            if(form.autogenpass.value.length===0){
                alert('<?php echo @constant('USERS_COPY_PASS_FIRST');?>
');
            } else {
                form.pass.value = form.confpass.value = form.autogenpass.value;
<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['task']=='editItem'){?>
                form.submit_apply.click();
<?php }?>
                return true;
            }
        } return false;
    }
    function generatePassword(form){
        $.getJSON(
            "/interactive/ajax.php",
            {zone: "admin", action: "generatePassword", length:12},
            function(data){
                if(data.code) {
                    form.autogenpass.value = data.code;
                } else alert("<?php echo @constant('USERS_GENERATE_PASS_ERROR');?>
");
            }
        );
    }
//-->
</script>


<?php }elseif($_smarty_tpl->tpl_vars['arrPageData']->value['task']=='viewItem'){?> 
       <div class="tabsContainer">
        <ul class="nav">
            <li><a href="javascript:void(0);" data-target="main" class="active">Основные</a></li>
            <li><a href="javascript:void(0);" data-target="history">История</a></li>
        </ul>
        <div class="tab_line"></div>
        <ul class="tabs">
            <li class="active" id="tab_main">
 <table border="1" cellspacing="1" cellpadding="1" class="list ">       
        <tr>
            <td  width="250" align="center" valign="top">
                <b><?php echo @constant('HEAD_IMAGE');?>
: </b>
                <div style="margin:10px 5px; border:1px solid #999999;background-color:#E5E5E5;width:<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['image'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['arImageData']['w'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['def_img_param']['w'];?>
<?php }?>px;height:<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['image'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['arImageData']['h'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['def_img_param']['h'];?>
<?php }?>px;">
                    <?php if (!empty($_smarty_tpl->tpl_vars['item']->value['image'])){?><img src="<?php echo ($_smarty_tpl->tpl_vars['arrPageData']->value['files_url']).($_smarty_tpl->tpl_vars['item']->value['image']);?>
" border="0" alt="" /><?php }?>
                </div>
            </td>
            <td  valign="top">
                <strong>Данные пользователя: </strong><br/><br/>
                <div class="inline"><strong><?php echo @constant('USERS_ACCESS');?>
:</strong></div> <?php echo $_smarty_tpl->tpl_vars['item']->value['typename'];?>
<br/>
                <div class="inline"><strong><?php echo @constant('USERS_ENABLED');?>
:</strong></div> 
                <?php if ($_smarty_tpl->tpl_vars['item']->value['active']){?>
                    <span style="color:green;"><?php echo @constant('OPTION_YES');?>
</span>
                <?php }else{ ?>
                    <span style="color:red;"><?php echo @constant('OPTION_NO');?>
</span>
                <?php }?><br><br/>
                <div class="inline"><strong><?php echo @constant('USERS_LOGIN');?>
:</strong></div> <?php echo $_smarty_tpl->tpl_vars['item']->value['login'];?>
<br/>
                <div class="inline"><strong><?php echo @constant('USERS_PASS');?>
:</strong></div> 
                <?php if (!empty($_smarty_tpl->tpl_vars['item']->value['pass'])){?>
                <?php echo @constant('USERS_PASS_SET');?>

                <?php }else{ ?><?php echo @constant('USERS_PASS_NOT_SET');?>
<?php }?><br/>

                <div class="inline"><strong><?php echo @constant('USERS_SNAME');?>
:</strong></div> <?php echo $_smarty_tpl->tpl_vars['item']->value['surname'];?>
<br/>
                <div class="inline"><strong><?php echo @constant('USERS_NAME');?>
:</strong> </div> <?php echo $_smarty_tpl->tpl_vars['item']->value['firstname'];?>
<br/>
                <div class="inline"><strong><?php echo @constant('USERS_MNAME');?>
:</strong></div> <?php echo $_smarty_tpl->tpl_vars['item']->value['middlename'];?>
<br/>
                <div class="inline"><strong><?php echo @constant('USERS_PHONE');?>
: </strong></div> <?php echo $_smarty_tpl->tpl_vars['item']->value['phone'];?>
<br/>
                <div class="inline"><strong><?php echo @constant('USERS_MAIL');?>
:</strong></div> <?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
 &nbsp;(<i><?php echo @constant('USERS_CONFIRM_MAIL');?>
: <strong><?php if ($_smarty_tpl->tpl_vars['item']->value['type']!='Anonimous'){?><span style="color:green;"><?php echo @constant('OPTION_YES');?>
</span><?php }else{ ?><span style="color:red;"><?php echo @constant('OPTION_NO');?>
</span><?php }?></strong></i>)<br/>
                <div class="inline"><strong><?php echo @constant('LABEL_ADDRESS');?>
: </strong></div> <?php echo $_smarty_tpl->tpl_vars['item']->value['address'];?>
<br/>
                <div class="inline"><strong><?php echo @constant('USERS_DESCR');?>
: </strong></div> <?php echo $_smarty_tpl->tpl_vars['item']->value['descr'];?>
<br/>
                <div class="inline"><strong><?php echo @constant('HEAD_FILE');?>
: </strong></div>
                <?php  $_smarty_tpl->tpl_vars['iItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['iItem']->_loop = false;
 $_smarty_tpl->tpl_vars['iKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value['arrFiles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['iItem']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['iItem']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['iItem']->key => $_smarty_tpl->tpl_vars['iItem']->value){
$_smarty_tpl->tpl_vars['iItem']->_loop = true;
 $_smarty_tpl->tpl_vars['iKey']->value = $_smarty_tpl->tpl_vars['iItem']->key;
 $_smarty_tpl->tpl_vars['iItem']->iteration++;
 $_smarty_tpl->tpl_vars['iItem']->last = $_smarty_tpl->tpl_vars['iItem']->iteration === $_smarty_tpl->tpl_vars['iItem']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['last'] = $_smarty_tpl->tpl_vars['iItem']->last;
?>
                    &nbsp;
                    <a href="<?php echo ($_smarty_tpl->tpl_vars['arrPageData']->value['files_url']).($_smarty_tpl->tpl_vars['iItem']->value['filename']);?>
" onclick="return parent.hs.expand (this, { });" class="highslide">
                        <?php echo $_smarty_tpl->tpl_vars['iItem']->value['filename'];?>

                    </a>
                    <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['i']['last']){?>, <br/><?php }?>
                <?php }
if (!$_smarty_tpl->tpl_vars['iItem']->_loop) {
?>
                    &nbsp;<?php echo @constant('USERS_EMPTY_FILES');?>

                <?php } ?>

            </td>
            <td rowspan="0" class="buttons_row" valign="top" width="144">
                <div class="buttons_list">
                <?php if ($_smarty_tpl->tpl_vars['item']->value['isnew']){?>
                <input class="buttons" name="button_activate" type="button" onclick="if(window.confirm('<?php echo @constant('CONFIRM_USER_ACTIVATION');?>
')){window.location='<?php echo (($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&task=activateItem&status=1&itemID=")).($_smarty_tpl->tpl_vars['item']->value['id']);?>
';} return false;" value="<?php echo @constant('ACTIVATE');?>
" />
                <?php }elseif(!$_smarty_tpl->tpl_vars['item']->value['isnew']){?>
                <input class="buttons" name="button_edit" type="button" onclick="window.location='<?php echo (($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&task=editItem&itemID=")).($_smarty_tpl->tpl_vars['item']->value['id']);?>
';" value="<?php echo @constant('BUTTON_EDIT');?>
" />
                <?php }?>
                <input class="buttons" name="button_cancel" type="button" onclick="if(window.confirm('<?php echo @constant('CONFIRM_CLOSE_VIEW');?>
')){window.location='<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['current_url'];?>
';} return false;" value="<?php echo @constant('CLOSE_VIEW');?>
" />
                <?php if ($_smarty_tpl->tpl_vars['item']->value['id']>1){?>
                <input class="buttons" name="button_delete" type="button" onclick="if(window.confirm('<?php echo @constant('CONFIRM_DELETE');?>
')) {window.location='<?php echo (($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&task=deleteItem&itemID=")).($_smarty_tpl->tpl_vars['item']->value['id']);?>
';} return false;" value="<?php echo @constant('HEAD_DELETE');?>
" />
                <?php }?>
                </div>
            </td>
        </tr>
 </table>
                </li>
                        <li id="tab_history">
            <?php echo $_smarty_tpl->getSubTemplate ("common/object_actions_log.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arHistoryData'=>$_smarty_tpl->tpl_vars['item']->value['arHistory']), 0);?>

        </li>
                </ul>
                </div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['task']=='default'){?>
<?php echo $_smarty_tpl->getSubTemplate ('common/new_page_btn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>@constant('ADMIN_ADD_NEW_USER')), 0);?>

<div class="clear"></div>
<?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['arrNewItems']->value)){?>
<table width="100%" border="0" cellspacing="1" cellpadding="0" class="list user">
    <tr><th  colspan="7" style="color:red;"> &diams; <?php echo @constant('USER_TO_ACTIVATE_LIST');?>
:</th></tr>
    <tr>
        <td id="headb" align="center" width="12"><?php echo @constant('USERS_ID');?>
</td>
        <td id="headb" align="left"  width="100"><?php echo @constant('USERS_LOGIN');?>
</td>
        <td id="headb" align="left"><?php echo @constant('USERS_FULL_NAME');?>
</td>
        <td id="headb" width="200"><?php echo @constant('HEAD_CONTACTS');?>
</td>
        <td id="headb" width="30"><?php echo @constant('USERS_ENABLED');?>
</td>
        <td id="headb" align="center" width="32"><?php echo @constant('USER_SHOW_DATA');?>
</td>
    </tr>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrNewItems']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
    <tr>
        <td align="center"><?php echo $_smarty_tpl->tpl_vars['arrNewItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
</td>
        <td ><?php echo $_smarty_tpl->tpl_vars['arrNewItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['login'];?>
</td>
        <td ><?php echo $_smarty_tpl->tpl_vars['arrNewItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['surname'];?>
 <?php echo $_smarty_tpl->tpl_vars['arrNewItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['arrNewItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['middlename'];?>
</td>
        <td ><?php if (!empty($_smarty_tpl->tpl_vars['arrNewItems']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['i']['index']]['email'])){?><?php echo $_smarty_tpl->tpl_vars['arrNewItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['email'];?>
 &nbsp; <?php }?><?php if (!empty($_smarty_tpl->tpl_vars['arrNewItems']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['i']['index']]['phone'])){?><?php echo $_smarty_tpl->tpl_vars['arrNewItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['phone'];?>
 &nbsp; <?php }?><?php echo $_smarty_tpl->tpl_vars['arrNewItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['city'];?>
</td>
        <td align="center"><strong><?php if ($_smarty_tpl->tpl_vars['arrNewItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['type']=='Registered'){?><span style="color:green;"><?php echo @constant('OPTION_YES');?>
</span><?php }else{ ?><span style="color:red;"><?php echo @constant('OPTION_NO');?>
</span><?php }?></strong></td>
        <td align='center'>
            <a href="<?php echo (($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&task=viewItem&itemID=")).($_smarty_tpl->tpl_vars['arrNewItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
" title="<?php echo @constant('USERS_ACTIVATION_VIEW');?>
">
                <img width="20" src="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['system_images'];?>
find.png" alt="<?php echo @constant('USERS_ACTIVATION_VIEW');?>
" />
            </a>
        </td>
    </tr>
<?php endfor; endif; ?>
    <tr>
        <td colspan="7" id="line"><?php echo @constant('SITE_COUNT_RECORDS');?>
<?php echo count($_smarty_tpl->tpl_vars['arrNewItems']->value);?>
</td>
    </tr>
</table>
<div>&nbsp;</div>
<table width="100%" border="0" cellspacing="1" cellpadding="0" class="list">
    <tr><th  style="color:black;"> &diams; <?php echo @constant('USERS_LIST');?>
:</th></tr>
</table>                
<?php }?>

<table width="100%" border="0" cellspacing="1" cellpadding="0" class="list user">
    <tr>
        <td id="headb" align="center" width="38"></td>
        <td id="headb" align="left"  width="100"><?php echo @constant('USERS_LOGIN');?>
</td>
        <td id="headb" align="left"><?php echo @constant('USERS_FULL_NAME');?>
</td>
        <td id="headb" align="center" width="45"><?php echo @constant('USERS_MAIL');?>
</td>
        <td id="headb" align="center" width="45"><?php echo @constant('USERS_PHONE');?>
</td>
        <td id="headb" align="center" width="45"><?php echo @constant('USERS_ACCESS');?>
</td>
        <td id="headb" align="center" width="38"><?php echo @constant('HEAD_EDIT');?>
</td>
        <td id="headb" align="center" width="38"><?php echo @constant('HEAD_DELETE');?>
</td>
    </tr>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['items']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
    <tr>
        <td align='center'>
<?php if ($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']==1){?><?php echo @constant('HEAD_DENIED');?>

<?php }elseif($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['active']==1){?>
            <a href="<?php echo (($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&task=publishItem&status=0&itemID=")).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
" title="Enable">
                <img src="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['system_images'];?>
check.png" alt="<?php echo @constant('USERS_ACTIVE');?>
" />
            </a>
<?php }else{ ?>
            <a href="<?php echo (($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&task=publishItem&status=1&itemID=")).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
" title="No Enable">
                <img src="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['system_images'];?>
un_check.png" alt="<?php echo @constant('USERS_NOACTIVE');?>
" />
            </a>
<?php }?>
        </td>
        <td ><?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['login'];?>
</td>
        <td align="left">
            <a href="<?php echo (($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&task=viewItem&itemID=")).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
" title="Просмотр">
                <?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['surname'];?>
 <?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['middlename'];?>

            </a>
        </td>
        <td ><?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['email'];?>
</td>
        <td ><?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['phone'];?>
</td>
        <td ><?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['typename'];?>
</td>

        <td align='center'>
<?php if ($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']==1&&$_smarty_tpl->tpl_vars['objUserInfo']->value->type!='Administrator'){?>
            <?php echo @constant('HEAD_DENIED');?>

<?php }else{ ?>
            <a href="<?php echo (($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&task=editItem&itemID=")).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
" title="<?php echo @constant('LABEL_EDIT');?>
">
                <img src="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['system_images'];?>
edit.png" alt="<?php echo @constant('LABEL_EDIT');?>
" />
            </a>
<?php }?>
        </td>
        <td align='center'>
<?php if ($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']==1||$_smarty_tpl->tpl_vars['objUserInfo']->value->type!='Administrator'){?>
            <?php echo @constant('HEAD_DENIED');?>

<?php }else{ ?>
        <a href="<?php echo (($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&task=deleteItem&itemID=")).($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
" onclick="return confirm('<?php echo @constant('CONFIRM_DELETE');?>
');" title="<?php echo @constant('LABEL_DELETE');?>
">
            <img src="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['system_images'];?>
delete.png" alt="<?php echo @constant('LABEL_DELETE');?>
" />
        </a>
<?php }?>
        </td>
    </tr>
<?php endfor; endif; ?>
</table>
<table width="100%" border="0" cellspacing="1" cellpadding="0">
    <tr>
        <td align="center" width="345"></td>
        <td align="center" width="350">
            <?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['total_pages']>1){?>
                <!-- ++++++++++ Start PAGER ++++++++++++++++++++++++++++++++++++++++++++++++ -->
                <?php echo $_smarty_tpl->getSubTemplate ('common/pager.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arrPager'=>$_smarty_tpl->tpl_vars['arrPageData']->value['pager'],'page'=>$_smarty_tpl->tpl_vars['arrPageData']->value['page'],'showTitle'=>0,'showFirstLast'=>0,'showPrevNext'=>0), 0);?>

                <!-- ++++++++++ End PAGER ++++++++++++++++++++++++++++++++++++++++++++++++++ -->
            <?php }?>
        </td>
        <td align="right">
            
        </td>
    </tr>
</table>
</div><?php }} ?>