<?php /* Smarty version Smarty-3.1.14, created on 2017-10-08 19:17:51
         compiled from "tpl/backend/weblife/common/head.tpl" */ ?>
<?php /*%%SmartyHeaderCode:154553244659ac6ce6258073-43066908%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19a59ba70c2d872d7b3c0a3db1ee949c50c5fc00' => 
    array (
      0 => 'tpl/backend/weblife/common/head.tpl',
      1 => 1507479412,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '154553244659ac6ce6258073-43066908',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59ac6ce62f2a35_33663682',
  'variables' => 
  array (
    'lang' => 0,
    'arrLangs' => 0,
    'arrPageData' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ac6ce62f2a35_33663682')) {function content_59ac6ce62f2a35_33663682($_smarty_tpl) {?><head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['arrLangs']->value[$_smarty_tpl->tpl_vars['lang']->value]['charset'];?>
" />
    <title><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['headTitle'];?>
</title>
    <meta name="viewport" content="width=1048">
    <meta name="MobileOptimized" content="1048" />
    <meta name="HandheldFriendly" content="true" />
    <link href="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['css_dir'];?>
admin.css" rel="stylesheet" type="text/css" />
    <link href="/js/jquery/themes/smoothness/jquery.ui.theme.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['images_dir'];?>
weblife.ico" rel="shortcut icon" />
    <link href="/js/libs/highslide/highslide.css" type="text/css" rel="stylesheet" />
    <script src="/js/jquery/jquery-<?php echo @constant('WLCMS_JQUERY_VERSION');?>
.min.js" type="text/javascript"></script>
    <script src="/js/jquery/jquery.easing.1.3.js" type="text/javascript"></script>
    <script src="/js/jquery/ui/jquery-ui.custom.js" type="text/javascript"></script>
    <script type="text/javascript" src="/js/jquery/jquery.migrate.1.2.1.js"></script>
    <script type="text/javascript" src="/js/jquery/treeview/jquery.treeview.js"></script>
    <script src="/js/libs/highslide/highslide-full.packed.js" type="text/javascript"></script>
    <script src="/js/libs/highslide/langs/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
.js" type="text/javascript"></script>
    <script src="/js/libs/highslide/highslide.config.admin.js" type="text/javascript"></script>
<?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['headCss'])){?>
    <?php echo implode($_smarty_tpl->tpl_vars['arrPageData']->value['headCss'],"\n        ");?>

<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['headScripts'])){?>
    <?php echo implode($_smarty_tpl->tpl_vars['arrPageData']->value['headScripts'],"\n        ");?>

<?php }?>
    <script src="/js/select_drag.js" type="text/javascript"></script>
    <script src="/js/libs/tiny_mce/tiny_mce.js" type="text/javascript"></script>
    <script src="/js/libs/tiny_mce/tiny_mce_config.js" type="text/javascript"></script>
    <script src="/js/admin_functions.js" type="text/javascript"></script>
    <script src="/js/admin_extra.js" type="text/javascript"></script>
</head><?php }} ?>