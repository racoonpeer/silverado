<?php /* Smarty version Smarty-3.1.14, created on 2017-10-14 13:22:51
         compiled from "tpl\frontend\smart\module\delivery.tpl" */ ?>
<?php /*%%SmartyHeaderCode:927659e1e57b8262e9-05943128%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ec875db3a73ad44bc06f15c0f92f1d0bb44febc' => 
    array (
      0 => 'tpl\\frontend\\smart\\module\\delivery.tpl',
      1 => 1507971576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '927659e1e57b8262e9-05943128',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arCategory' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59e1e57b893274_74765691',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e1e57b893274_74765691')) {function content_59e1e57b893274_74765691($_smarty_tpl) {?><div class="banner-container container"></div>
<div class="page-container clearfix">
    <div class="container clearfix">
        <h1 class="heading-title"><?php echo $_smarty_tpl->tpl_vars['arCategory']->value['title'];?>
</h1>
        <?php echo $_smarty_tpl->tpl_vars['arCategory']->value['text'];?>

    </div>
</div><?php }} ?>