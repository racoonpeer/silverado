<?php /* Smarty version Smarty-3.1.14, created on 2017-10-02 17:55:18
         compiled from "tpl/frontend/smart/module/stocks.tpl" */ ?>
<?php /*%%SmartyHeaderCode:97663456159d25356e17a85-84200851%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce26bff9758d2bf8ed9165573c16f69f41c7e034' => 
    array (
      0 => 'tpl/frontend/smart/module/stocks.tpl',
      1 => 1466018024,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '97663456159d25356e17a85-84200851',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
    'arrPageData' => 0,
    'items' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59d2535711d3a6_92394294',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59d2535711d3a6_92394294')) {function content_59d2535711d3a6_92394294($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/silveradocom/public_html/include/smarty/plugins/modifier.date_format.php';
?><!-- Items Start -->

<?php if (!empty($_smarty_tpl->tpl_vars['item']->value)){?>
    <div><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['created'],"%d.%m.%Y");?>
</div>
    <h2><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</h2>
    <?php echo $_smarty_tpl->tpl_vars['item']->value['fulldescr'];?>

    <div id="countdown" style="padding: 20px; font-size: 24px; font-weight: bold;"></div>
<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['related'])){?>
    <h3>Товары участвующие в акции</h3>
    <div class="related">
        <?php echo $_smarty_tpl->getSubTemplate ('ajax/products.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('items'=>$_smarty_tpl->tpl_vars['item']->value['related']), 0);?>

    </div>
<?php }?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['backurl'];?>
"><?php echo @constant('URL_BACK_TO_LIST');?>
</a>
    <script type="text/javascript">
        var timeend= new Date(<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['date_end'],"%Y");?>
, <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['date_end'],"%m");?>
-1, <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['date_end'],"%d");?>
);
        // IE и FF по разному отрабатывают getYear()
        // для задания обратного отсчета до определенной даты укажите дату в формате:
        // timeend= new Date(ГОД, МЕСЯЦ-1, ДЕНЬ);
        // Для задания даты с точностью до времени укажите дату в формате:
        // timeend= new Date(ГОД, МЕСЯЦ-1, ДЕНЬ, ЧАСЫ-1, МИНУТЫ);
        function countdown () {
            var today = new Date();
            today = Math.floor((timeend-today)/1000);
            var tsec=today%60; today=Math.floor(today/60); if(tsec<10)tsec='0'+tsec;
            var tmin=today%60; today=Math.floor(today/60); if(tmin<10)tmin='0'+tmin;
            var thour=today%24; today=Math.floor(today/24);
            var timestr= "До конца акции осталось "+today +" дней "+ thour+" часов "+tmin+" минут "+tsec+" секунд";
            document.getElementById('countdown').innerHTML=timestr;
            window.setTimeout("countdown()",1000);
        }
        countdown();
    </script>

<?php }elseif(!empty($_smarty_tpl->tpl_vars['items']->value)){?>
    <table width="100%" cellspacing="0" cellpadding="0">
        <tbody>
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
                <td>
                    <div><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['created'],"%d.%m.%Y");?>
</div>
                    <a href="<?php echo $_smarty_tpl->getSubTemplate ('core/href_item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['arCategory'],'arItem'=>$_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]), 0);?>
">
                        <h3><?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
</h3>
                    </a>
                    <?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['descr'];?>

                    <a href="<?php echo $_smarty_tpl->getSubTemplate ('core/href_item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['arCategory'],'arItem'=>$_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]), 0);?>
">
                        <?php echo @constant('BUTTON_MORE');?>

                    </a>
                </td>
            </tr>
<?php endfor; endif; ?>
        </tbody>
    </table>
<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['total_pages']>1){?>
    <!-- ++++++++++ Start PAGER ++++++++++++++++++++++++++++++++++++++++++++++++ -->
    <?php echo $_smarty_tpl->getSubTemplate ('core/pager.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arrPager'=>$_smarty_tpl->tpl_vars['arrPageData']->value['pager'],'page'=>$_smarty_tpl->tpl_vars['arrPageData']->value['page'],'showTitle'=>0,'showFirstLast'=>0,'showPrevNext'=>1,'showAll'=>1), 0);?>

    <!-- ++++++++++ End PAGER ++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<?php }?>


<?php }else{ ?>
<?php echo $_smarty_tpl->getSubTemplate ('core/static.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>
<!-- Items end-->
<?php }} ?>