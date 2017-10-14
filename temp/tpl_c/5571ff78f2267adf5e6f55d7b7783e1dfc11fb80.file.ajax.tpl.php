<?php /* Smarty version Smarty-3.1.14, created on 2017-10-08 22:37:19
         compiled from "tpl/backend/weblife/ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:173060149959bba2ca215621-13672383%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5571ff78f2267adf5e6f55d7b7783e1dfc11fb80' => 
    array (
      0 => 'tpl/backend/weblife/ajax.tpl',
      1 => 1507479410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '173060149959bba2ca215621-13672383',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59bba2ca25c656_22986844',
  'variables' => 
  array (
    'arrPageData' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59bba2ca25c656_22986844')) {function content_59bba2ca25c656_22986844($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $_smarty_tpl->getSubTemplate ('common/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </head>
    <body class="highslide_ajax">
        <div id="win">
            
            <div id="main_content">
                <div id="content">
<!-- ++++++++++ Start Page Content +++++++++++++++++++++++++++++++++++++++++ -->
<?php echo $_smarty_tpl->getSubTemplate ((('ajax/').($_smarty_tpl->tpl_vars['arrPageData']->value['module'])).('.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!-- ++++++++++ End Page Content +++++++++++++++++++++++++++++++++++++++++++ -->
                </div>
            </div>
            <div id="footer"></div>
        </div>
    </body>
</html><?php }} ?>