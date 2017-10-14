<?php /* Smarty version Smarty-3.1.14, created on 2017-10-08 19:17:52
         compiled from "tpl/backend/weblife/common/top_logout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:47729030859ac6ce63be8d5-56324924%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb23358407836a9e0e10ab892e6d60945ac5e87e' => 
    array (
      0 => 'tpl/backend/weblife/common/top_logout.tpl',
      1 => 1507479412,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47729030859ac6ce63be8d5-56324924',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59ac6ce63e9335_47331527',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ac6ce63e9335_47331527')) {function content_59ac6ce63e9335_47331527($_smarty_tpl) {?><div class="top_logout">
    <a href="/index.php" target="_blank"><?php echo @constant('TOPLINK_PREVIEW_SITE');?>
</a>
    <a href="/admin.php?action=logout&last_url=<?php echo urlencode($_SERVER['REQUEST_URI']);?>
"><?php echo @constant('TOPLINK_LOGOUT');?>
</a>
</div>
<?php }} ?>