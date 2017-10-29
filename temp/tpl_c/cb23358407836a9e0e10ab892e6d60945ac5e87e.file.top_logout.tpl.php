<?php /* Smarty version Smarty-3.1.14, created on 2017-10-21 00:18:16
         compiled from "tpl/backend/weblife/common/top_logout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:337896359ea681819f119-10226220%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb23358407836a9e0e10ab892e6d60945ac5e87e' => 
    array (
      0 => 'tpl/backend/weblife/common/top_logout.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '337896359ea681819f119-10226220',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59ea68181da0c3_81129419',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ea68181da0c3_81129419')) {function content_59ea68181da0c3_81129419($_smarty_tpl) {?><div class="top_logout">
    <a href="/index.php" target="_blank"><?php echo @constant('TOPLINK_PREVIEW_SITE');?>
</a>
    <a href="/admin.php?action=logout&last_url=<?php echo urlencode($_SERVER['REQUEST_URI']);?>
"><?php echo @constant('TOPLINK_LOGOUT');?>
</a>
</div>
<?php }} ?>