<?php /* Smarty version Smarty-3.1.14, created on 2017-10-21 00:18:15
         compiled from "tpl/backend/weblife/admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:68422528959ea6817d33008-57395984%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e9c7bbaef166840c2d31159a862dff2c8d9e87f' => 
    array (
      0 => 'tpl/backend/weblife/admin.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '68422528959ea6817d33008-57395984',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arrPageData' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59ea6817ec6173_50805294',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ea6817ec6173_50805294')) {function content_59ea6817ec6173_50805294($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- ++++++++++ Start TOP Menu +++++++++++++++++++++++++++++++++++++++++++++ -->
<?php echo $_smarty_tpl->getSubTemplate ('common/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!-- ++++++++++ End TOP Menu +++++++++++++++++++++++++++++++++++++++++++++++ -->    
    <body>
        <div id="win">
            <div id="top_head">
                <img alt="" class="logo" src="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['images_dir'];?>
weblife_logo.png" />
                <div class="top_menu">
                    <div class="top_version">
                    <?php echo @constant('WLCMS_VERSION');?>

                    </div>
<!-- ++++++++++ Start TOP Menu +++++++++++++++++++++++++++++++++++++++++++++ -->
<?php echo $_smarty_tpl->getSubTemplate ('common/top_settings.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!-- ++++++++++ End TOP Menu +++++++++++++++++++++++++++++++++++++++++++++++ -->

<!-- ++++++++++ Start LANG Menu ++++++++++++++++++++++++++++++++++++++++++++ -->
<?php echo $_smarty_tpl->getSubTemplate ('common/top_langs.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!-- ++++++++++ End LANG Menu ++++++++++++++++++++++++++++++++++++++++++++++ -->

<!-- ++++++++++ Start LEFT TOP Menu ++++++++++++++++++++++++++++++++++++++++ -->
<?php echo $_smarty_tpl->getSubTemplate ('common/top_logout.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!-- ++++++++++ End LEFT TOP Menu ++++++++++++++++++++++++++++++++++++++++++ -->

<!-- ++++++++++ Start User Info (Welcome) ++++++++++++++++++++++++++++++++++ -->

<!-- ++++++++++ End User Info (Welcome) ++++++++++++++++++++++++++++++++++++ -->
                </div>
            </div>

            <div class="clear"></div>

            <div class="main_menu">
<!-- ++++++++++ Start LEFT TOP Menu ++++++++++++++++++++++++++++++++++++++++ -->
<?php echo $_smarty_tpl->getSubTemplate ('common/main_menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!-- ++++++++++ End LEFT TOP Menu ++++++++++++++++++++++++++++++++++++++++++ -->
            </div>
            <div class="clear"></div>
            
            <div id="main_content">
                <div id="content" class="<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['task']=='addItem'||$_smarty_tpl->tpl_vars['arrPageData']->value['task']=='editItem'||$_smarty_tpl->tpl_vars['arrPageData']->value['module']=='settings'||$_smarty_tpl->tpl_vars['arrPageData']->value['module']=='cms_settings'||$_smarty_tpl->tpl_vars['arrPageData']->value['module']=='users'||$_smarty_tpl->tpl_vars['arrPageData']->value['module']=='customers'){?>editarea<?php }?>">              
<!-- ++++++++++ Start Page Content +++++++++++++++++++++++++++++++++++++++++ -->
<?php echo $_smarty_tpl->getSubTemplate ((('module/').($_smarty_tpl->tpl_vars['arrPageData']->value['module'])).('.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!-- ++++++++++ End Page Content +++++++++++++++++++++++++++++++++++++++++++ -->
                </div>
            </div>
            <div id="footer"></div>
        </div>
    </body>
</html><?php }} ?>