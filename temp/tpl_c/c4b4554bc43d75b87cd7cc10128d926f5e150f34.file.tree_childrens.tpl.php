<?php /* Smarty version Smarty-3.1.14, created on 2017-12-02 20:48:49
         compiled from "tpl/backend/weblife/common/tree_childrens.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19399992755a22f591343891-77506812%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4b4554bc43d75b87cd7cc10128d926f5e150f34' => 
    array (
      0 => 'tpl/backend/weblife/common/tree_childrens.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19399992755a22f591343891-77506812',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'islist' => 0,
    'arrChildrens' => 0,
    'dependID' => 0,
    'arrPageData' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a22f5918d81a1_43430318',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a22f5918d81a1_43430318')) {function content_5a22f5918d81a1_43430318($_smarty_tpl) {?>

<?php if (isset($_smarty_tpl->tpl_vars['islist']->value)&&$_smarty_tpl->tpl_vars['islist']->value){?>
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
    <li class="<?php if ($_smarty_tpl->tpl_vars['dependID']->value==$_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']||(empty($_smarty_tpl->tpl_vars['dependID']->value)&&$_smarty_tpl->tpl_vars['arrPageData']->value['cid']==$_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'])){?> active<?php }?>">
        <a href="<?php echo (($_smarty_tpl->tpl_vars['arrPageData']->value['admin_url']).("&cid=")).($_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']);?>
">
            &nbsp;<img src="/images/admin/treeview/folder-closed.png" /> 
            <?php echo $_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
 
            [<?php echo count($_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['items']);?>
] 
            <?php if ($_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['active']==0){?>(<?php echo @constant('HEAD_INACTIVE');?>
)<?php }?>
        </a>
<?php if (!empty($_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['i']['index']]['items'])){?>
        <ul>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['j'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['name'] = 'j';
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['items']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total']);
?>
            <li class="<?php if ($_smarty_tpl->tpl_vars['dependID']->value==$_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']||(empty($_smarty_tpl->tpl_vars['dependID']->value)&&$_smarty_tpl->tpl_vars['arrPageData']->value['cid']==$_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'])){?> active<?php }?>">
                <a href="<?php echo ((($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).($_smarty_tpl->tpl_vars['arrPageData']->value['filter_url'])).("&task=editItem&itemID=")).($_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['items'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['id']);?>
">
                    <?php echo $_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['items'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['title'];?>
 
                </a>
            </li>
<?php endfor; endif; ?>
        </ul>
<?php }?>
   
<?php if (!empty($_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['i']['index']]['childrens'])){?>
<!-- ++++++++++ Start Tree Childrens +++++++++++++++++++++++++++++++++++++++ -->
<?php echo $_smarty_tpl->getSubTemplate ('common/tree_childrens.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('dependID'=>$_smarty_tpl->tpl_vars['dependID']->value,'arrChildrens'=>$_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['childrens'],'islist'=>$_smarty_tpl->tpl_vars['islist']->value), 0);?>

<!-- ++++++++++ End Tree Childrens +++++++++++++++++++++++++++++++++++++++++ -->
<?php }?>
     </li>
<?php endfor; endif; ?>
</ul>

<?php }else{ ?>
    <optgroup label="">
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
         <option value="<?php echo $_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
"<?php if ($_smarty_tpl->tpl_vars['dependID']->value==$_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']||(empty($_smarty_tpl->tpl_vars['dependID']->value)&&$_smarty_tpl->tpl_vars['arrPageData']->value['cid']==$_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'])){?>  selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['margin'];?>
<?php echo $_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
 &nbsp; [<?php echo @constant('HEAD_ITEMS');?>
: <?php echo count($_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['items']);?>
] &nbsp; <?php if ($_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['active']==0){?>( <?php echo @constant('HEAD_INACTIVE');?>
 ) &nbsp; <?php }?></option>
<?php if (!empty($_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['i']['index']]['childrens'])){?>
<!-- ++++++++++ Start Tree Childrens +++++++++++++++++++++++++++++++++++++++ -->
<?php echo $_smarty_tpl->getSubTemplate ('common/tree_childrens.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('dependID'=>$_smarty_tpl->tpl_vars['dependID']->value,'arrChildrens'=>$_smarty_tpl->tpl_vars['arrChildrens']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['childrens']), 0);?>

<!-- ++++++++++ End Tree Childrens +++++++++++++++++++++++++++++++++++++++++ -->
<?php }?>    
    <?php endfor; endif; ?>
    </optgroup>
<?php }?><?php }} ?>