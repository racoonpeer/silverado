<?php /* Smarty version Smarty-3.1.14, created on 2018-05-06 21:03:20
         compiled from "tpl/frontend/smart/ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4382623025aef436859e3f9-70971228%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10751c41a5fdbad1e2979b32851fcf22444ed89d' => 
    array (
      0 => 'tpl/frontend/smart/ajax.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4382623025aef436859e3f9-70971228',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'arrLangs' => 0,
    'arrPageData' => 0,
    'arCategory' => 0,
    'objSettingsInfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5aef43687a0b95_54494071',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aef43687a0b95_54494071')) {function content_5aef43687a0b95_54494071($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['arrLangs']->value[$_smarty_tpl->tpl_vars['lang']->value]['charset'];?>
" />
    <title><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['headTitle'];?>
</title>
    <meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['arCategory']->value['meta_key'];?>
" />
    <meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['arCategory']->value['meta_descr'];?>
" />
<?php if ($_smarty_tpl->tpl_vars['arCategory']->value['meta_robots']){?>
        <meta name="robots" content="<?php echo $_smarty_tpl->tpl_vars['arCategory']->value['meta_robots'];?>
" />
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['objSettingsInfo']->value->logo){?>
    <link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['objSettingsInfo']->value->logo;?>
" type="image/x-icon" />
    <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['objSettingsInfo']->value->logo;?>
" type="image/x-icon" />
<?php }?>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['css_dir'];?>
style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['css_dir'];?>
style-ajax.css" />
    <!--[if IE 6]>
        <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['css_dir'];?>
style-ie6.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['css_dir'];?>
style-ajax-ie6.css" />
    <![endif]-->

    <script type="text/javascript" src="/js/jquery/jquery-<?php echo @constant('WLCMS_JQUERY_VERSION');?>
.min.js"></script>
    <script type="text/javascript" src="/js/jquery/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="/js/jquery/jquery.migrate.1.2.1.js"></script>
<?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['headCss'])){?>
    <?php echo implode($_smarty_tpl->tpl_vars['arrPageData']->value['headCss'],"\n    ");?>


<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['headScripts'])){?>
    <?php echo implode($_smarty_tpl->tpl_vars['arrPageData']->value['headScripts'],"\n    ");?>


<?php }?>
    <script type="text/javascript" src="/js/scripts_ajax.js"></script>
</head>
<body><!-- wrapper -->
<!-- ++++++++++ Start Page Content +++++++++++++++++++++++++++++++++++++++++ -->
<?php if (!empty($_smarty_tpl->tpl_vars['arCategory']->value['module'])){?>
<?php echo $_smarty_tpl->getSubTemplate ((('module/').($_smarty_tpl->tpl_vars['arCategory']->value['module'])).('.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }else{ ?>
                    Ajax Модуль не загружен
<?php }?>
<!-- ++++++++++ End Page Content +++++++++++++++++++++++++++++++++++++++++++ -->
    <!-- wrapper eof -->

<?php echo $_smarty_tpl->getSubTemplate ('core/footer-extra.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


</body>
</html><?php }} ?>