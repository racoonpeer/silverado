<?php /* Smarty version Smarty-3.1.14, created on 2017-11-11 11:12:27
         compiled from "tpl/backend/weblife/common/pager.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1891721565a06befb95dc66-43292534%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd97fafaf3bb22ec20e0b95e458696b5f8377eea2' => 
    array (
      0 => 'tpl/backend/weblife/common/pager.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1891721565a06befb95dc66-43292534',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'showTitle' => 0,
    'showFirstLast' => 0,
    'arrPager' => 0,
    'showPrevNext' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06befbb0e7a2_03160195',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06befbb0e7a2_03160195')) {function content_5a06befbb0e7a2_03160195($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['showTitle']->value){?><?php echo @constant('SITE_PAGES');?>
:<?php }?>
<?php if ($_smarty_tpl->tpl_vars['showFirstLast']->value){?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['arrPager']->value['baseurl'];?>
" class="pager first"><?php echo @constant('SITE_PAGER_FIRST');?>
</a>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['showPrevNext']->value){?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['arrPager']->value['baseurl'];?>
<?php if ($_smarty_tpl->tpl_vars['arrPager']->value['prev']>1){?><?php echo ('&page=').($_smarty_tpl->tpl_vars['arrPager']->value['prev']);?>
<?php }?>" class="pager prev"><?php echo @constant('SITE_PAGER_PREV');?>
</a>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrPager']->value['pages']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<?php if ($_smarty_tpl->tpl_vars['arrPager']->value['sep']==$_smarty_tpl->tpl_vars['arrPager']->value['pages'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]){?>
    <span class="pager sep"><?php echo $_smarty_tpl->tpl_vars['arrPager']->value['pages'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
</span>
<?php }else{ ?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['arrPager']->value['baseurl'];?>
<?php if ($_smarty_tpl->tpl_vars['arrPager']->value['pages'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]>1){?><?php echo ('&page=').($_smarty_tpl->tpl_vars['arrPager']->value['pages'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]);?>
<?php }?>" class="pager<?php if ($_smarty_tpl->tpl_vars['page']->value==$_smarty_tpl->tpl_vars['arrPager']->value['pages'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]){?> active<?php }?>"><?php echo $_smarty_tpl->tpl_vars['arrPager']->value['pages'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
</a>
<?php }?>
<?php endfor; endif; ?>

<?php if ($_smarty_tpl->tpl_vars['showPrevNext']->value){?>
    <a href="<?php echo (($_smarty_tpl->tpl_vars['arrPager']->value['baseurl']).('&page=')).($_smarty_tpl->tpl_vars['arrPager']->value['next']);?>
" class="pager next"><?php echo @constant('SITE_PAGER_NEXT');?>
</a>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['showFirstLast']->value){?>
    <a href="<?php echo (($_smarty_tpl->tpl_vars['arrPager']->value['baseurl']).('&page=')).($_smarty_tpl->tpl_vars['arrPager']->value['last']);?>
" class="pager last"><?php echo @constant('SITE_PAGER_LAST');?>
</a>
<?php }?>

<?php }} ?>