<?php /* Smarty version Smarty-3.1.14, created on 2017-11-11 14:59:31
         compiled from "tpl/frontend/smart/module/delivery.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6348351165a06f43377a762-41527596%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '6348351165a06f43377a762-41527596',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arCategory' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06f4337eff10_64372879',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06f4337eff10_64372879')) {function content_5a06f4337eff10_64372879($_smarty_tpl) {?><div class="banner-container container"></div>
<div class="page-container clearfix">
    <div class="container clearfix">
        <h1 class="heading-title"><?php echo $_smarty_tpl->tpl_vars['arCategory']->value['title'];?>
</h1>
        <?php echo $_smarty_tpl->tpl_vars['arCategory']->value['text'];?>

    </div>
</div><?php }} ?>