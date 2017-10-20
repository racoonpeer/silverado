<?php /* Smarty version Smarty-3.1.14, created on 2017-10-21 00:18:13
         compiled from "tpl/backend/weblife/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:158780016759ea68158e3bc2-36522158%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7bf017edd3617dd1f483010113156571127199d' => 
    array (
      0 => 'tpl/backend/weblife/login.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '158780016759ea68158e3bc2-36522158',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'refresh' => 0,
    'arrPageData' => 0,
    'bannedTime' => 0,
    'messages' => 0,
    'showCode' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59ea6815aa3836_93554973',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ea6815aa3836_93554973')) {function content_59ea6815aa3836_93554973($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
<?php if (!empty($_smarty_tpl->tpl_vars['refresh']->value['head'])){?>
        <?php echo $_smarty_tpl->tpl_vars['refresh']->value['head'];?>

<?php }?>
        <title><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['headTitle'];?>
</title>
        <meta http-equiv="content-type" content="text/html; charset=windows-1251">
        <meta http-equiv="imagetoolbar" content="no">
        <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['css_dir'];?>
admin.css" />
        <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['images_dir'];?>
weblife.ico" />
<?php if ($_smarty_tpl->tpl_vars['bannedTime']->value>0){?>
        <script type="text/javascript">
            <!--
            var banTimerID = null;
            function updateBanTimer(){
                var banDate = new Date(<?php echo $_smarty_tpl->tpl_vars['bannedTime']->value;?>
*1000); // seconds*1000 in JavaScripts Milisecons Timestamp
                var nowDate = new Date();
                if( banDate >= nowDate && document.getElementById('banTimer') != null &&
                    nowDate.getFullYear() == banDate.getFullYear() &&
                    nowDate.getMonth()    == banDate.getMonth() &&
                    nowDate.getDate()     == banDate.getDate() ) {
                        var totalRemains = (banDate.getTime()-nowDate.getTime());
                        var RemainsSec=(parseInt(totalRemains/1000));
                        var RemainsFullDays=(parseInt(RemainsSec/(24*60*60)));
                        var secInLastDay=RemainsSec-RemainsFullDays*24*3600;
                        var RemainsFullHours=(parseInt(secInLastDay/3600));
                        //if (RemainsFullHours<10){RemainsFullHours="0"+RemainsFullHours};
                        var secInLastHour=secInLastDay-RemainsFullHours*3600;
                        var RemainsMinutes=(parseInt(secInLastHour/60));
                        //if (RemainsMinutes<10){RemainsMinutes="0"+RemainsMinutes};
                        var lastSec=secInLastHour-RemainsMinutes*60;
                        //if (lastSec<10){lastSec="0"+lastSec};
                        document.getElementById('banTimer').innerHTML = /*RemainsFullHours+" hours "+*/RemainsMinutes+' min '+lastSec+' sec';
                        document.loginForm.Submit2.disabled=true;
                } else if(banTimerID != null) {
                    clearInterval(banTimerID);
                    document.loginForm.Submit2.disabled=false;
                }

            }
            function checkForm(form){
                if(banTimerID != null){
                       form.submit();
                       return true;
                } else form.Submit2.disabled=true;
                return false;
            }
            banTimerID = setInterval("updateBanTimer()", 1000);
            //-->
        </script>
<?php }?>
    </head>
    <body>
<?php if (!empty($_smarty_tpl->tpl_vars['refresh']->value['head'])||!empty($_smarty_tpl->tpl_vars['refresh']->value['body'])){?>
    <?php echo $_smarty_tpl->tpl_vars['refresh']->value['body'];?>

<?php }else{ ?>
        <form id="loginForm" name="loginForm" action="" method="post" onsubmit="<?php if ($_smarty_tpl->tpl_vars['bannedTime']->value>0){?>return checkForm(this);<?php }?>">
            <table width="300" border="0" cellspacing="5" cellpadding="5" class="list" style="border:1px solid #CCCCCC; margin:auto; margin-top:200px;" align="center">
                <tr>
                    <td colspan="2">
                        <br/>
                        &nbsp;&nbsp;&nbsp;<strong><?php echo @constant('WELCOME_TO_ADMIN');?>
</strong>&nbsp;&nbsp;<a href="http://weblife.ua" style="text-decoration:none;">&reg;</a>
                        <br/>
                        &nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['messages']->value['top'];?>
<br/><br/>
                    </td>
                </tr>
                <tr>
                    <td width="70">
                        <?php echo @constant('USERS_LOGIN');?>
:
                    </td>
                    <td>
                        <input type="text" name="login" value="" size="36"/>
                    </td>
                </tr>
                <tr>
                    <td width="70">
                        <?php echo @constant('USERS_PASS');?>
:
                    </td>
                    <td>
                        <input name="pass" value="" type="password" size="36"/>
                    </td>
                </tr>
<?php if ($_smarty_tpl->tpl_vars['showCode']->value){?>
                <tr>
                    <td colspan="2" style="padding-top: 10px;" valign="middle" align="center">
                        <img alt="code" src="/interactive/cv_img.php?zone=admin" border="0" align="top"/>&nbsp;
                        Confirmation code: 
                        <input type="text" id="fConfirmationCode" name="fConfirmationCode" value="" maxlength="<?php echo @constant('IVALIDATOR_MAX_LENTH');?>
" size="10"/>
                    </td>
                </tr>
<?php }?>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <br/>
                        <input type="submit" name="Submit2" value="<?php echo @constant('BUTTON_ENTER');?>
" class="buttons"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <?php echo $_smarty_tpl->tpl_vars['messages']->value['bottom'];?>
<br/>
                    </td>
                </tr>
            </table>
        </form>
<?php }?>
    </body>
</html><?php }} ?>