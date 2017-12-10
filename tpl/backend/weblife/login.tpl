<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
<{if !empty($refresh.head)}>
        <{$refresh.head}>
<{/if}>
        <title><{$arrPageData.headTitle}></title>
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
<{if $bannedTime>0}>
        <script type="text/javascript">
            var banTimerID = null;
            function updateBanTimer(){
                var banDate = new Date(<{$bannedTime}>*1000); // seconds*1000 in JavaScripts Milisecons Timestamp
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
<{/if}>
    </head>
    <body>
<{if !empty($refresh.head) or !empty($refresh.body)}>
        <{$refresh.body}>
<{else}>
        <div class="bd-example bd-example-modal">
            <div class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="loginForm" name="loginForm" action="" method="post" onsubmit="<{if $bannedTime>0}>return checkForm(this);<{/if}>">
                            <div class="modal-header">
                                <h5 class="modal-title">Login to administration area</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="login"><{$smarty.const.USERS_LOGIN}></label>
                                        <input type="text" name="login" id="login" value="" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="pass"><{$smarty.const.USERS_PASS}></label>
                                        <input name="pass" id="pass" value="" type="password" class="form-control"/>
                                    </div>
                                </div>
<{if $showCode}>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <img alt="code" src="/interactive/cv_img.php?zone=admin" border="0" align="top"/>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" id="fConfirmationCode" name="fConfirmationCode" value="" maxlength="<{$smarty.const.IVALIDATOR_MAX_LENTH}>" class="form-control"/>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputState">Captcha code</label>
                                    </div>
                                </div>
<{/if}>
                                <div class="form-row">
<{if !empty($messages.bottom)}>
                                    <div class="alert alert-danger" role="alert">
                                        <{$messages.bottom}>
                                    </div>
<{/if}>
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
<{/if}>
    </body>
</html>