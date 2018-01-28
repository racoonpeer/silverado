<?php /* Smarty version Smarty-3.1.14, created on 2017-12-17 12:40:28
         compiled from "tpl/frontend/smart/menu/mobile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13327175105a36499c2c42b2-36585345%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e96ab525d7ac0589291bd6c95d34256f37d1b894' => 
    array (
      0 => 'tpl/frontend/smart/menu/mobile.tpl',
      1 => 1513506848,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13327175105a36499c2c42b2-36585345',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'marginLevel' => 0,
    'arItems' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a36499c60fd89_89132917',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a36499c60fd89_89132917')) {function content_5a36499c60fd89_89132917($_smarty_tpl) {?><?php if (!isset($_smarty_tpl->tpl_vars['marginLevel']->value)){?><?php $_smarty_tpl->tpl_vars['marginLevel'] = new Smarty_variable(0, null, 0);?><?php }?>
<ul class="main-menu">
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arItems']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    <li class="<?php if (!empty($_smarty_tpl->tpl_vars['arItems']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['i']['index']]['subcategories'])){?>sublevels<?php }?>">
        <a href="<?php echo $_smarty_tpl->getSubTemplate ('core/href.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['arItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]), 0);?>
" class="<?php if ($_smarty_tpl->tpl_vars['arItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['is_stock']){?>bold stock<?php }?> <?php if ($_smarty_tpl->tpl_vars['arItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['opened']){?>current<?php }?>"><?php echo $_smarty_tpl->tpl_vars['arItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
</a>
<?php if (!empty($_smarty_tpl->tpl_vars['arItems']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['i']['index']]['subcategories'])){?>
        <div class="dropdown">
            <div class="container">
                <a href="#" class="return">Назад</a>
                <ul>
                    <li>
                        <a href="<?php echo $_smarty_tpl->getSubTemplate ('core/href.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['arItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]), 0);?>
" class="bold">Все <span class="lowercase"><?php echo $_smarty_tpl->tpl_vars['arItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
</span></a>
                    </li>
                    <?php echo $_smarty_tpl->getSubTemplate ("menu/mobile-sub.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arItems'=>$_smarty_tpl->tpl_vars['arItems']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['subcategories'],'break'=>5), 0);?>

                </ul>
            </div>
        </div>
<?php }?>
    </li>
<?php endfor; endif; ?>
</ul><?php }} ?>