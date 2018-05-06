<?php /* Smarty version Smarty-3.1.14, created on 2018-04-25 22:08:57
         compiled from "tpl/backend/weblife/common/main_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1576279335a06b9c0c3eae6-58091397%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c28794d4f3a7ea71ac68d1c9e8220536b9582bb' => 
    array (
      0 => 'tpl/backend/weblife/common/main_menu.tpl',
      1 => 1524078443,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1576279335a06b9c0c3eae6-58091397',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06b9c0ceae81_47797347',
  'variables' => 
  array (
    'arrPageData' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06b9c0ceae81_47797347')) {function content_5a06b9c0ceae81_47797347($_smarty_tpl) {?><?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['main_menu'])){?>
    <ul>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrPageData']->value['main_menu']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
        <li class="menu_item<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['module']==$_smarty_tpl->tpl_vars['arrPageData']->value['main_menu'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['module']||($_smarty_tpl->tpl_vars['arrPageData']->value['main_menu'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['module']=='attribute_groups'&&$_smarty_tpl->tpl_vars['arrPageData']->value['module']=='attributes')){?> active<?php }?>">
            <a href="/admin/?module=<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['main_menu'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['module'];?>
"><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['main_menu'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
</a>
<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['main_menu'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['module']=="orders"&&$_smarty_tpl->tpl_vars['arrPageData']->value['new_orders']>0){?>
            <span class="cnt"><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['new_orders'];?>
</span>
<?php }elseif($_smarty_tpl->tpl_vars['arrPageData']->value['main_menu'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['module']=="comments"&&$_smarty_tpl->tpl_vars['arrPageData']->value['new_comments']>0){?>
            <span class="cnt"><?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['new_comments'];?>
</span>
<?php }?>
        </li>
<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['i']['iteration']%8==0){?>
    </ul>
    <ul>
<?php }?>
<?php endfor; endif; ?>
    </ul>   
<?php }?>
<?php }} ?>