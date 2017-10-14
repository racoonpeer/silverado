<?php /* Smarty version Smarty-3.1.14, created on 2017-10-07 22:42:08
         compiled from "tpl/backend/weblife/module/settings.tpl" */ ?>
<?php /*%%SmartyHeaderCode:203416186559d92e10d44773-44295426%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45b586911f501942ea20794e127348a198899447' => 
    array (
      0 => 'tpl/backend/weblife/module/settings.tpl',
      1 => 1504450042,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203416186559d92e10d44773-44295426',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arrPageData' => 0,
    'item' => 0,
    'arActionsLog' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59d92e111b82d0_86722902',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59d92e111b82d0_86722902')) {function content_59d92e111b82d0_86722902($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/module_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>@constant('TITLE_SETTINGS'),'creat_title'=>@constant('ADMIN_CREATING_NEW_PRODUCT'),'edit_title'=>@constant('ADMIN_EDIT_PRODUCT')), 0);?>


<div id="right_block">
<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['current_url'];?>
" name="settingsForm">
    <div class="tabsContainer">
        <ul class="nav">
            <li><a href="javascript:void(0);" data-target="main" <?php if (empty($_smarty_tpl->tpl_vars['arrPageData']->value['activeTab'])){?>class="active"<?php }?>>Основные</a></li>
            <li><a href="javascript:void(0);" data-target="history">История</a></li>
            <li><a href="javascript:void(0);" data-target="actionsLog" 
                   <?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['activeTab'])&&$_smarty_tpl->tpl_vars['arrPageData']->value['activeTab']=='actionsLog'){?>class="active"<?php }?>>
                    Глобальная История
                </a>
            </li>       
        </ul>
        <div class="tab_line"></div>
        <ul class="tabs">
            <li <?php if (empty($_smarty_tpl->tpl_vars['arrPageData']->value['activeTab'])){?>class="active"<?php }?> id="tab_main">
                <table border="0" cellspacing="0" cellpadding="1" class="list">  
                    <tr>
                        <td colspan="2">
                            <strong><?php echo @constant('SETTINGS_OWNER');?>
</strong><br/><br/>
                            <div class="inline"><?php echo @constant('SETTINGS_FIRST_NAME');?>
 <font color="red">*</font>:</div>
                            <input name="arValidate[ownerFirstName]" type="hidden" value="<?php echo @constant('SETTINGS_FIRST_NAME');?>
"/>
                            <input name="arSettings[ownerFirstName]" type="text" size="117" value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['ownerFirstName'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['ownerFirstName'];?>
<?php }?>" class="field" />
                            <br/><br/>

                            <div class="inline"><?php echo @constant('SETTINGS_LAST_NAME');?>
 <font color="red">*</font>: </div>
                            <input name="arValidate[ownerLastName]" type="hidden" value="<?php echo @constant('SETTINGS_LAST_NAME');?>
"/>
                            <input name="arSettings[ownerLastName]" type="text" size="117" value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['ownerLastName'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['ownerLastName'];?>
<?php }?>" class="field" />
                            <br/><br/>

                            <div class="inline"><?php echo @constant('SETTINGS_EMAIL');?>
 <font color="red">*</font>:</div>
                            <input name="arValidate[ownerEmail]" type="hidden" value="<?php echo @constant('SETTINGS_EMAIL');?>
|email"/>
                            <input name="arSettings[ownerEmail]" type="text" size="117" value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['ownerEmail'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['ownerEmail'];?>
<?php }?>" class="field" />
                            <br/><br/>

                            <div class="inline"><?php echo @constant('SETTINGS_PHONE');?>
:</div>
                            <input name="arValidate[ownerPhone]" type="hidden" value="<?php echo @constant('SETTINGS_PHONE');?>
|phone|empty"/>
                            <input name="arSettings[ownerPhone]" type="text" size="117" value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['ownerPhone'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['ownerPhone'];?>
<?php }?>" class="field" />
                            <br/><br/>

                            <div class="inline"><?php echo @constant('SETTINGS_COPYRIGHT');?>
:</div>
                            <input name="arSettings[copyright]" size="117" type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['copyright'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['copyright'];?>
<?php }?>" class="field"/>

                            <br/><br/>
                            <strong><?php echo @constant('SETTINGS_WEBSITE');?>
</strong><br/><br/>

                            <div class="inline"><?php echo @constant('SETTINGS_WEBSITE_NAME');?>
 <font color="red">*</font>: </div>
                            <input name="arValidate[websiteName]" type="hidden" value="<?php echo @constant('SETTINGS_WEBSITE_NAME');?>
"/>        
                            <input name="arSettings[websiteName]" type="text" size="117" value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['websiteName'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['websiteName'];?>
<?php }?>" class="field" />
                            <br/><br/>

                            <div class="inline"><?php echo @constant('SETTINGS_WEBSITE_SLOGAN');?>
:</div>
                            <input name="arSettings[websiteSlogan]" type="text" size="117" value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['websiteSlogan'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['websiteSlogan'];?>
<?php }?>" class="field" />
                            <br/><br/>        

                            <div class="inline"><?php echo @constant('SETTINGS_WEBSITE_URL');?>
 <font color="red">*</font>: </div>
                            <input name="arValidate[websiteUrl]" type="hidden" value="<?php echo @constant('SETTINGS_WEBSITE_URL');?>
"/>           
                            <input name="arSettings[websiteUrl]" type="text" size="117" value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['websiteUrl'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['websiteUrl'];?>
<?php }?>" class="field" />
                            <br/><br/>
                            
                            <div class="inline left"><?php echo @constant('SETTINGS_WEBSITE_LOGO');?>
:</div>
                            <input name="arSettings[logo]" type="text" size="100" value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['logo'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['logo'];?>
<?php }?>" class="field left" />
                            <?php if (isset($_smarty_tpl->tpl_vars['item']->value['logo'])){?><img align="left" style="padding:0; margin: 10px 13px 10px 10px;" src="<?php echo $_smarty_tpl->tpl_vars['item']->value['logo'];?>
" width="16" alt=""/><?php }?>   

                            <div class="inline left">Скидка на Товар дня:</div>
                            <input name="arSettings[dailyDiscountPercent]" type="text" size="4" value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['dailyDiscountPercent'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['dailyDiscountPercent'];?>
<?php }?>" class="field left"/>
                            <div class="clear"></div>
                            <br/><br/>

                            <strong><?php echo @constant('SETTINGS_EMAIL');?>
</strong><br/><br/>

                            <?php echo @constant('SETTINGS_NOTIFY_EMAIL');?>
 <font color="red">*</font>:<br/><br/>
                            <input name="arValidate[notifyEmail]" type="hidden" value="<?php echo @constant('SETTINGS_NOTIFY_EMAIL');?>
"/>
                            <input name="arSettings[notifyEmail]" type="text" size="137" value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['notifyEmail'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['notifyEmail'];?>
<?php }?>" class="field" /><br/> <br/>               

                            <?php echo @constant('SETTINGS_SITE_EMAIL');?>
 <font color="red">*</font>:<br/><br/>
                            <input name="arValidate[siteEmail]" type="hidden" value="<?php echo @constant('SETTINGS_SITE_EMAIL');?>
"/>
                            <input name="arSettings[siteEmail]" type="text" size="137" value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['siteEmail'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['siteEmail'];?>
<?php }?>" class="field" /><br/>

                            <br>
                            <strong><?php echo @constant('SETTINGS_ADDRESS');?>
:</strong>
                            <a href="javascript:toggleEditor('settingsAddress');">
                                <?php echo @constant('HEAD_SWITCH_TEXT_EDITOR');?>

                            </a><br/><br/>
                            <textarea style="width:840px; height: 100px;" id="settingsAddress" name='arSettings[ownerAddress]' cols='105' rows='5' class="field"><?php if (isset($_smarty_tpl->tpl_vars['item']->value['ownerAddress'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['ownerAddress'];?>
<?php }?></textarea>
                        </td>

                        <td class="buttons_row" valign="top" width="144">
                            <div class="buttons_list">
                                <input name='submit' class='buttons' type='submit' value='<?php echo @constant('BUTTON_SAVE');?>
'  />
                            </div>
                        </td>
                    </tr>
                </table>
            </li>
            <li id="tab_history">
                <?php echo $_smarty_tpl->getSubTemplate ("common/object_actions_log.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arHistoryData'=>$_smarty_tpl->tpl_vars['item']->value['arHistory']), 0);?>

            </li>
             <li id="tab_actionsLog" <?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['activeTab'])&&$_smarty_tpl->tpl_vars['arrPageData']->value['activeTab']=='actionsLog'){?>class="active"<?php }?>>
                <div class="load"></div>
                <table border="0" cellspacing="0" cellpadding="1" class="list">  
                    <tr>
                        <td valign="top" width="175">
                            <div id="filters" class="filters">
                                <?php echo $_smarty_tpl->getSubTemplate ("ajax/actions_log_filters.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arFilters'=>$_smarty_tpl->tpl_vars['arActionsLog']->value['arFilters'],'selectedFilters'=>$_smarty_tpl->tpl_vars['arActionsLog']->value['selectedFilters']), 0);?>

                            </div>
                        </td>
                        <td valign="top">
                            <div id="history">
                                <?php echo $_smarty_tpl->getSubTemplate ("ajax/actions_log.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arHistoryData'=>$_smarty_tpl->tpl_vars['arActionsLog']->value['arHistory']), 0);?>

                            </div>
                        </td>
                    </tr>
                </table>
             </li>
         </ul>
     </div>
</form>
</div>
                            
<script type=text/javascript>
    function clearDate() {
        $('#date_to').val('');
        $('#date_from').val('');
        updateHistory();
    }
    
    function ConvertDateText(dateText, date_sep){
        if(dateText.length > 0){
            if(date_sep===undefined) date_sep = '-';
            var arr = [];

            var arDateTime = dateText.split(' ');
           // if(arDateTime.length==2) {
                if(arDateTime[0].indexOf('.')!==-1){
                    arr = arDateTime[0].split('.');
                    if(date_sep==='-') arr.reverse();
                } else if(arDateTime[0].indexOf('-')!==-1){
                    arr = arDateTime[0].split('-');
                    if(date_sep==='.') arr.reverse();
                } else if(arDateTime[0].indexOf('/')!==-1){
                    arr = arDateTime[0].split('/');
                    if((date_sep==='.' && arDateTime[0].match(/^\d{4}\/\d{2}\/\d{2}$/) !== null) || (date_sep==='-' && arDateTime[0].match(/^\d{2}\/\d{2}\/\d{4}$/) !== null))
                        arr.reverse();
                }
                
             /*   if(arDateTime[1].indexOf(':')!==-1){
                    var arTime = arDateTime[1].split(':');
                    for(var i=0; i<arTime.length; i++)
                        if(arTime[i] == '00') arr.push('0');
                        else arr.push(arTime[i]);
                }*/
            //}
        }
        return arr;
    }

    function ConvertToJSDate(dateText){
        var date = '';
        if(dateText.length > 0){
           var d = ConvertDateText(dateText);
           date = +new Date(d[0], d[1]-1, d[2])/1000;
        }
        return date;
    }
        
    function toogleDateTime(cb) {
         var datetime = $('#datetime');
         if(cb.checked && $(cb).hasClass('show')) {
             $(datetime).removeClass('hidden_block');
         } else {
             $(datetime).addClass('hidden_block');
         }
         updateHistory(cb);
    };

    function updateHistory(item, refresh, page) { 
        $('.load').addClass('active');
        $('.load').css('width', $('.load').next('table').width());
        $('.load').css('height', $('.load').next('table').height());
        var arData = {};
        arData['filters[tab]'] = 'actionsLog';
        if(typeof item != 'undefined' && item!=false) arData['key'] = $(item).attr('data-type');
        if(typeof page != 'undefined') arData['filters[page]'] = page;
        if(typeof refresh == 'undefined' || refresh==false){
            $.each($('#filters').find('input, select'), function(i, input){
                if(input.checked || input.selectedIndex || 
                   (input.type =='text' && $('.datetime.show').prop('checked'))){
                    var iName = $(input).attr('name');
                    var iVal;
                    if(input.type=='text') { 
                        if($(input).val().length>0) iVal = ConvertToJSDate($(input).val());
                    }  else    iVal = $(input).val();
                    arData[iName] = iVal;
                }
            });
        } else {
            arData['filters[time]'] = '1';
        }
        
        $.ajax({
            url: '/interactive/ajax.php?zone=admin&action=filterActionsLog',
            type: 'GET',
            dataType: 'json',
            data: arData,
            success: function(json) {
                if(json) {
                    $('#history').html(json.history);
                    $('#filters').html(json.filters);
                }
                if(History.enabled) {
                    History.pushState(null, document.title, '/admin.php?module=<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['module'];?>
'+json.url);
                }
            }
        });
        setTimeout(function () {$('.load').removeClass('active')}, 200);
    };   
</script>                       
<?php }} ?>