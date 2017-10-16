<?php /* Smarty version Smarty-3.1.14, created on 2017-10-14 13:22:26
         compiled from "tpl\frontend\smart\core\header-extra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:749559e1e562c36c39-66256753%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '568a3687a83ebaa80a914b79be621770d2fdec8f' => 
    array (
      0 => 'tpl\\frontend\\smart\\core\\header-extra.tpl',
      1 => 1507971576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '749559e1e562c36c39-66256753',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arrModules' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59e1e562d060c7_11573349',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e1e562d060c7_11573349')) {function content_59e1e562d060c7_11573349($_smarty_tpl) {?><script type="text/javascript">
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