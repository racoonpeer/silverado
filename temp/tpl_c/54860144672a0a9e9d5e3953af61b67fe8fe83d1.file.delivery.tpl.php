<?php /* Smarty version Smarty-3.1.14, created on 2017-10-20 22:31:42
         compiled from "tpl/frontend/smart/module/delivery.tpl" */ ?>
<?php /*%%SmartyHeaderCode:70381547959ea4f1eb89758-91046265%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '54860144672a0a9e9d5e3953af61b67fe8fe83d1' => 
    array (
      0 => 'tpl/frontend/smart/module/delivery.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70381547959ea4f1eb89758-91046265',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arCategory' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59ea4f1ec4a431_36350316',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ea4f1ec4a431_36350316')) {function content_59ea4f1ec4a431_36350316($_smarty_tpl) {?><div class="banner-container container"></div>
<div class="page-container clearfix">
    <div class="container clearfix">
        <h1 class="heading-title"><?php echo $_smarty_tpl->tpl_vars['arCategory']->value['title'];?>
</h1>
        <?php echo $_smarty_tpl->tpl_vars['arCategory']->value['text'];?>

    </div>
</div><?php }} ?>