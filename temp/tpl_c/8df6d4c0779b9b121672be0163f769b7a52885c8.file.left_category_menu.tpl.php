<?php /* Smarty version Smarty-3.1.14, created on 2017-10-21 00:18:17
         compiled from "tpl/backend/weblife/common/left_category_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:198168117959ea6819abb087-27986439%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8df6d4c0779b9b121672be0163f769b7a52885c8' => 
    array (
      0 => 'tpl/backend/weblife/common/left_category_menu.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '198168117959ea6819abb087-27986439',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'categoryTree' => 0,
    'arrPageData' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59ea6819d04a97_97583051',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ea6819d04a97_97583051')) {function content_59ea6819d04a97_97583051($_smarty_tpl) {?><?php if (!empty($_smarty_tpl->tpl_vars['categoryTree']->value)){?>
<div id="left_block">
   <ul class="filetree category_tree">
       <li>
           <a href="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['admin_url'];?>
">
               &nbsp;<img src="/images/admin/treeview/folder.png" />&nbsp;<?php echo @constant('HEAD_ROOT_LEVEL');?>

           </a>
<?php if (!empty($_smarty_tpl->tpl_vars['categoryTree']->value)){?>
            <ul>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['categoryTree']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <li class="<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['pid']==$_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']){?> active collapsable<?php }?>">
                <?php if (!$_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['module']||(isset($_smarty_tpl->tpl_vars['arrPageData']->value['allowedSubPageModules'])&&in_array($_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['module'],$_smarty_tpl->tpl_vars['arrPageData']->value['allowedSubPageModules']))){?>
                    <a href="<?php echo (($_smarty_tpl->tpl_vars['arrPageData']->value['admin_url']).("&pid=")).($_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
" class="<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['pid']==$_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']){?>selected<?php }?>">
                        <?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['pid']==$_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']){?>
                            &nbsp;<img src="/images/admin/treeview/folder.png" />  &nbsp;
                        <?php }else{ ?>
                            &nbsp;<img src="/images/admin/treeview/folder-closed.png" />  &nbsp;
                        <?php }?>
                       <?php echo $_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
 
                       <?php if ($_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['active']==0){?>(<?php echo @constant('HEAD_INACTIVE');?>
)<?php }?>
                    </a>
                <?php }else{ ?>
                    <span class="<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['pid']==$_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']){?>selected<?php }?>">
                        <?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['pid']==$_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']){?>
                            &nbsp;<img src="/images/admin/treeview/folder.png" />  &nbsp;
                        <?php }else{ ?>
                            &nbsp;<img src="/images/admin/treeview/folder-closed.png" />  &nbsp;
                        <?php }?>
                        <?php echo $_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
 
                        <?php if ($_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['active']==0){?>(<?php echo @constant('HEAD_INACTIVE');?>
)<?php }?>
                    </span>
                <?php }?>
                &nbsp;<a href="<?php echo (($_smarty_tpl->tpl_vars['arrPageData']->value['admin_url']).("&task=editItem&itemID=")).($_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
">
                    <img src="/images/operation/edit.png" height="10"/>
                </a>

<?php if (!empty($_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['i']['index']]['childrens'])){?>
<!-- ++++++++++ Start Tree Childrens +++++++++++++++++++++++++++++++++++++++ -->
<?php echo $_smarty_tpl->getSubTemplate ('common/tree_category_childrens.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('dependID'=>$_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'],'arrChildrens'=>$_smarty_tpl->tpl_vars['categoryTree']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['childrens']), 0);?>

<!-- ++++++++++ End Tree Childrens +++++++++++++++++++++++++++++++++++++++++ -->
<?php }?>
            </li>
<?php endfor; endif; ?>
        </ul> 
<?php }?>
    </ul>
</div>
<?php }?><?php }} ?>