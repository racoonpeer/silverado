<?php /* Smarty version Smarty-3.1.14, created on 2017-10-08 19:23:43
         compiled from "tpl/frontend/smart/core/header-extra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:100413849659ac71270eb5c2-39151449%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14e616f9d85ee3fc011907de884ffe060c5af3b3' => 
    array (
      0 => 'tpl/frontend/smart/core/header-extra.tpl',
      1 => 1507479416,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100413849659ac71270eb5c2-39151449',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59ac7127104800_52491026',
  'variables' => 
  array (
    'arrModules' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ac7127104800_52491026')) {function content_59ac7127104800_52491026($_smarty_tpl) {?><script type="text/javascript">
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