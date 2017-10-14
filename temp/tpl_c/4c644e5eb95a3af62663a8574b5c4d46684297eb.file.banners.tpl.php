<?php /* Smarty version Smarty-3.1.14, created on 2017-10-08 19:31:29
         compiled from "tpl/frontend/smart/core/banners.tpl" */ ?>
<?php /*%%SmartyHeaderCode:50082124859ac720746a780-66802574%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c644e5eb95a3af62663a8574b5c4d46684297eb' => 
    array (
      0 => 'tpl/frontend/smart/core/banners.tpl',
      1 => 1507479415,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '50082124859ac720746a780-66802574',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59ac72075bdc36_55552115',
  'variables' => 
  array (
    'position' => 0,
    'maxitems' => 0,
    'Banners' => 0,
    'arrItems' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ac72075bdc36_55552115')) {function content_59ac72075bdc36_55552115($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars['arrItems'] = new Smarty_variable($_smarty_tpl->tpl_vars['Banners']->value->getBanners($_smarty_tpl->tpl_vars['position']->value,$_smarty_tpl->tpl_vars['maxitems']->value), null, 0);?>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrItems']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = (int)$_smarty_tpl->tpl_vars['maxitems']->value;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max']);
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
<?php if ($_smarty_tpl->tpl_vars['position']->value==1){?>
<div class="item left-side">
    <?php echo $_smarty_tpl->tpl_vars['arrItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['content'];?>

</div>
<?php }elseif($_smarty_tpl->tpl_vars['position']->value==2){?>
<div class="item right-side">
    <?php echo $_smarty_tpl->tpl_vars['arrItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['content'];?>

</div>
<?php }?>
<?php endfor; endif; ?><?php }} ?>