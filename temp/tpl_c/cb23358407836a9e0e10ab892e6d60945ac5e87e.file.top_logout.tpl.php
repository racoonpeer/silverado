<?php /* Smarty version Smarty-3.1.14, created on 2017-11-11 10:50:08
         compiled from "tpl/backend/weblife/common/top_logout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10353774085a06b9c0bf4c20-73020779%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb23358407836a9e0e10ab892e6d60945ac5e87e' => 
    array (
      0 => 'tpl/backend/weblife/common/top_logout.tpl',
      1 => 1510389014,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10353774085a06b9c0bf4c20-73020779',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'objSettingsInfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06b9c0c390a3_66453286',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06b9c0c390a3_66453286')) {function content_5a06b9c0c390a3_66453286($_smarty_tpl) {?><div class="top_logout">
    <a href="<?php echo $_smarty_tpl->tpl_vars['objSettingsInfo']->value->websiteUrl;?>
" target="_blank"><?php echo @constant('TOPLINK_PREVIEW_SITE');?>
</a>
    <a href="/admin/?action=logout&last_url=<?php echo urlencode($_SERVER['REQUEST_URI']);?>
"><?php echo @constant('TOPLINK_LOGOUT');?>
</a>
</div>
<?php }} ?>