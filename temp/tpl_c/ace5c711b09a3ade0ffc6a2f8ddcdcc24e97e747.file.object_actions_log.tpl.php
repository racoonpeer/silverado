<?php /* Smarty version Smarty-3.1.14, created on 2017-11-11 11:11:55
         compiled from "tpl/backend/weblife/common/object_actions_log.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7435024525a06bedb71d137-57035947%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ace5c711b09a3ade0ffc6a2f8ddcdcc24e97e747' => 
    array (
      0 => 'tpl/backend/weblife/common/object_actions_log.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7435024525a06bedb71d137-57035947',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arHistoryData' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06bedb785f97_72204194',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06bedb785f97_72204194')) {function content_5a06bedb785f97_72204194($_smarty_tpl) {?><?php if (!empty($_smarty_tpl->tpl_vars['arHistoryData']->value['history'])){?>
    <input type="hidden" id="nextpage" value="<?php echo $_smarty_tpl->tpl_vars['arHistoryData']->value['page']+1;?>
">
    <table border="0"  id="object_history" cellspacing="1" cellpadding="0" class="list ">
        <tr>
            <td colspan="3" valign="top" >
                <table border="0" cellspacing="1" cellpadding="0" class="list history ">  
                    <tr>
                        <td id="headb" align="center" width="55">Дата</td>
                        <td id="headb" align="center" width="80">IP</td>
                        <td id="headb" align="center" width="100">пользователь</td>
                        <td id="headb" align="left" width="110">Действие</td>
                        <td id="headb" align="left">Описание</td>
                        <td id="headb" width="4"></td>
                    </tr>

                    <?php echo $_smarty_tpl->getSubTemplate ("ajax/object_actions_log_body.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arHistoryData'=>$_smarty_tpl->tpl_vars['arHistoryData']->value), 0);?>

                </table>
            </td>
        </tr>
    </table>
<?php }?>
    
<?php if (!empty($_smarty_tpl->tpl_vars['arHistoryData']->value['total_pages'])&&$_smarty_tpl->tpl_vars['arHistoryData']->value['total_pages']>1){?>
    <script type="text/javascript">
        $( window ).scroll(function() {
            if($('.tabsContainer').find('li a.active').attr('data-target') == 'history') {
                if(History.enabled) {
                    History.pushState(null, document.title, '');
                }
                var documentHeight = $(document).height();
                var scrollDifference = $(window).height() + $(window).scrollTop();
                if (documentHeight == scrollDifference){ 
                    showMore($('#nextpage').val());
                }
            }
        });

        function showMore(nextPage) {
            if(nextPage){
                $.ajax({
                    url: '/interactive/ajax.php?zone=admin&action=filterActionsLog'+'<?php echo $_smarty_tpl->tpl_vars['arHistoryData']->value['filtersUrl'];?>
'+'&type=more&filters[page]='+nextPage,
                    type: 'GET',
                    dataType: 'json',
                    success: function(json) {
                        if(json) {
                            $('#object_history  tr:last').after(json.history);
                            $('#nextpage').val(json.page);
                        }
                    }
                });
            }
        }
    </script>
<?php }?><?php }} ?>