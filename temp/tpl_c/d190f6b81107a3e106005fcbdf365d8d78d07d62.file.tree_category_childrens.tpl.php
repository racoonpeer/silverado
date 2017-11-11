<?php /* Smarty version Smarty-3.1.14, created on 2017-11-11 10:50:10
         compiled from "tpl/backend/weblife/common/tree_category_childrens.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4916383725a06b9c2623d65-02094124%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd190f6b81107a3e106005fcbdf365d8d78d07d62' => 
    array (
      0 => 'tpl/backend/weblife/common/tree_category_childrens.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4916383725a06b9c2623d65-02094124',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arrChildrens' => 0,
    'dependID' => 0,
    'arrPageData' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06b9c2791ab7_77145858',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06b9c2791ab7_77145858')) {function content_5a06b9c2791ab7_77145858($_smarty_tpl) {?>

<ul>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrChildrens']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    <li class="<?php if ($_smarty_tpl->tpl_vars['dependID']->value==$_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']||(empty($_smarty_tpl->tpl_vars['dependID']->value)&&$_smarty_tpl->tpl_vars['arrPageData']->value['pid']==$_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'])){?> active<?php }?>">
        <a href="<?php echo (($_smarty_tpl->tpl_vars['arrPageData']->value['admin_url']).("&pid=")).($_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
">
            <?php if ($_smarty_tpl->tpl_vars['dependID']->value==$_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']||(empty($_smarty_tpl->tpl_vars['dependID']->value)&&$_smarty_tpl->tpl_vars['arrPageData']->value['pid']==$_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'])){?>
                &nbsp;<img src="/images/admin/treeview/folder.png" /> 
            <?php }else{ ?>
                &nbsp;<img src="/images/admin/treeview/folder-closed.png" /> 
            <?php }?>
            <?php echo $_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
 
            <?php if ($_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['active']==0){?>(<?php echo @constant('HEAD_INACTIVE');?>
)<?php }?>
        </a>
        <a href="<?php echo ((((($_smarty_tpl->tpl_vars['arrPageData']->value['admin_url']).("&task=editItem")).("&pid=")).($_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['pid'])).("&itemID=")).($_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
">
            <img src="/images/operation/edit.png" height="10"/>
        </a>
    
<?php if (!empty($_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['i']['index']]['childrens'])){?>
<!-- ++++++++++ Start Tree Childrens +++++++++++++++++++++++++++++++++++++++ -->
<?php echo $_smarty_tpl->getSubTemplate ('common/tree_category_childrens.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arrChildrens'=>$_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['childrens']), 0);?>

<!-- ++++++++++ End Tree Childrens +++++++++++++++++++++++++++++++++++++++++ -->
<?php }?>
    </li>
<?php endfor; endif; ?>
</ul><?php }} ?>