<?php /* Smarty version Smarty-3.1.14, created on 2017-11-11 10:50:10
         compiled from "tpl/backend/weblife/common/breadcrumb.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1960823325a06b9c2221e28-70201482%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1aad169288541a58b9a2effffc2d98c3af823af' => 
    array (
      0 => 'tpl/backend/weblife/common/breadcrumb.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1960823325a06b9c2221e28-70201482',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arrBreadCrumb' => 0,
    'arrPageData' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06b9c22ee162_42929484',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06b9c22ee162_42929484')) {function content_5a06b9c22ee162_42929484($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrBreadCrumb']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
    <?php if (!$_smarty_tpl->getVariable('smarty')->value['section']['i']['last']){?>
        <?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['path_arrow'];?>

        <?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['module']=='main'){?>
            <a href="<?php echo ((($_smarty_tpl->tpl_vars['arrPageData']->value['admin_url']).('&pid=')).($_smarty_tpl->tpl_vars['arrBreadCrumb']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'])).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url']);?>
" class="bc_path"><?php echo $_smarty_tpl->tpl_vars['arrBreadCrumb']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
</a>
        <?php }else{ ?>
            <a href="<?php echo ((($_smarty_tpl->tpl_vars['arrPageData']->value['admin_url']).('&cid=')).($_smarty_tpl->tpl_vars['arrBreadCrumb']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'])).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url']);?>
" class="bc_path"><?php echo $_smarty_tpl->tpl_vars['arrBreadCrumb']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
</a>  
        <?php }?>
    <?php }?>
<?php endfor; endif; ?>

<?php }} ?>