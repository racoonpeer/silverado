<?php /* Smarty version Smarty-3.1.14, created on 2017-11-11 10:18:45
         compiled from "tpl/frontend/smart/core/header-extra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11296673315a06b265d01ce9-09504242%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14e616f9d85ee3fc011907de884ffe060c5af3b3' => 
    array (
      0 => 'tpl/frontend/smart/core/header-extra.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11296673315a06b265d01ce9-09504242',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arrModules' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06b265d405e5_19605547',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06b265d405e5_19605547')) {function content_5a06b265d405e5_19605547($_smarty_tpl) {?><script type="text/javascript">
    function initBasket (timeout) {
        if (typeof jQuery != "undefined" && typeof Basket != "undefined") {
            Basket.setUrl("<?php echo $_smarty_tpl->getSubTemplate ("core/href.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['arrModules']->value['basket']), 0);?>
");
        } else {
            setTimeout(function(){
                initBasket(timeout);
            }, timeout);
        }
    }
    initBasket(100);
</script>
<?php }} ?>