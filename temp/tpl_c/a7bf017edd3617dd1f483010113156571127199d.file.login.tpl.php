<?php /* Smarty version Smarty-3.1.14, created on 2017-11-14 22:36:29
         compiled from "tpl/backend/weblife/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20274476015a06b9bbb891f5-60478889%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7bf017edd3617dd1f483010113156571127199d' => 
    array (
      0 => 'tpl/backend/weblife/login.tpl',
      1 => 1510691785,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20274476015a06b9bbb891f5-60478889',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06b9bbd48e57_96987468',
  'variables' => 
  array (
    'refresh' => 0,
    'arrPageData' => 0,
    'bannedTime' => 0,
    'showCode' => 0,
    'messages' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06b9bbd48e57_96987468')) {function content_5a06b9bbd48e57_96987468($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
<?php if (!empty($_smarty_tpl->tpl_vars['refresh']->value['head'])){?>
        <?php echo $_smarty_tpl->tpl_vars['refresh']->value['head'];?>

<?php }?>
        <title><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['headTitle'];?>
</title>
        <meta http-equiv="content-type" content="text/html; charset=windows-1251"/>
        <meta http-equiv="imagetoolbar" content="no"/>
        <link rel="stylesheet" type="text/css" href="/js/libs/twitter-bootstrap/css/bootstrap.min.css"/>
        <link rel="shortcut icon" href="/images/icons/favicon.ico"/>
        <style type="text/css">
            .bd-example-modal {
                background-color: #fafafa;
            }
            .bd-example-modal .modal {
                position: relative;
                top: auto;
                right: auto;
                bottom: auto;
                left: auto;
                z-index: 1;
                display: block;
            }
        </style>
        <script type="text/javascript" src="/js/libs/twitter-bootstrap/js/bootstrap.min.js"></script>
<?php if ($_smarty_tpl->tpl_vars['bannedTime']->value>0){?>
        <script type="text/javascript">
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
            banTimerID = setInterval("updateBanTimer", 1000);
        </script>
<?php }?>
    </head>
    <body>
<?php if (!empty($_smarty_tpl->tpl_vars['refresh']->value['head'])||!empty($_smarty_tpl->tpl_vars['refresh']->value['body'])){?>
        <?php echo $_smarty_tpl->tpl_vars['refresh']->value['body'];?>

<?php }else{ ?>
        <div class="bd-example bd-example-modal">
            <div class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="loginForm" name="loginForm" action="" method="post" onsubmit="<?php if ($_smarty_tpl->tpl_vars['bannedTime']->value>0){?>return checkForm(this);<?php }?>">
                            <div class="modal-header">
                                <h5 class="modal-title">Login to administration area</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="login"><?php echo @constant('USERS_LOGIN');?>
</label>
                                        <input type="text" name="login" id="login" value="" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="pass"><?php echo @constant('USERS_PASS');?>
</label>
                                        <input name="pass" id="pass" value="" type="password" class="form-control"/>
                                    </div>
                                </div>
<?php if ($_smarty_tpl->tpl_vars['showCode']->value){?>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <img alt="code" src="/interactive/cv_img.php?zone=admin" border="0" align="top"/>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" id="fConfirmationCode" name="fConfirmationCode" value="" maxlength="<?php echo @constant('IVALIDATOR_MAX_LENTH');?>
" class="form-control"/>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputState">Captcha code</label>
                                    </div>
                                </div>
<?php }?>
                                <div class="form-row">
<?php if (!empty($_smarty_tpl->tpl_vars['messages']->value['bottom'])){?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $_smarty_tpl->tpl_vars['messages']->value['bottom'];?>

                                    </div>
<?php }?>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" name="Submit2" class="btn btn-primary" value="Login...">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php }?>
    </body>
</html><?php }} ?>