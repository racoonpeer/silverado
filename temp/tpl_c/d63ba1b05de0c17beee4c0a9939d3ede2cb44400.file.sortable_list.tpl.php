<?php /* Smarty version Smarty-3.1.14, created on 2017-12-02 20:48:02
         compiled from "tpl/backend/weblife/ajax/sortable_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16417283905a22f5622abf16-63372672%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd63ba1b05de0c17beee4c0a9939d3ede2cb44400' => 
    array (
      0 => 'tpl/backend/weblife/ajax/sortable_list.tpl',
      1 => 1510388859,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16417283905a22f5622abf16-63372672',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a22f562507515_81360288',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a22f562507515_81360288')) {function content_5a22f562507515_81360288($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['item']->value['type']=="attributes"){?>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['item']->value['attributes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<li class="ui-state-default ui-state-disabled" data-gid="<?php echo $_smarty_tpl->tpl_vars['item']->value['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['gid'];?>
">
    <input type="checkbox" name="attributes[]" onchange="toggleBoxState(this);" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
"/> <label title="<?php echo $_smarty_tpl->tpl_vars['item']->value['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['descr'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
 (<?php echo $_smarty_tpl->tpl_vars['item']->value['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['gtitle'];?>
)</label>
</li>
<?php endfor; endif; ?>
<?php }elseif($_smarty_tpl->tpl_vars['item']->value['type']=="filters"){?>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['item']->value['filters']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<li class="ui-state-default ui-state-disabled" data-fid="<?php echo $_smarty_tpl->tpl_vars['item']->value['filters'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
">
    <input type="checkbox" name="filters[<?php echo $_smarty_tpl->tpl_vars['item']->value['filters'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['type'];?>
][]" onchange="toggleBoxState(this);" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['filters'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
"/> <label><?php echo $_smarty_tpl->tpl_vars['item']->value['filters'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
 <strong><?php echo $_smarty_tpl->tpl_vars['item']->value['filters'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['alias'];?>
</strong></label> 
<?php if ($_smarty_tpl->tpl_vars['item']->value['filters'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['tid']==1){?>
    <a href="/admin/?module=brands" target="_blank">
        <img src="/images/operation/edit.png" height="10">
    </a>
<?php }elseif($_smarty_tpl->tpl_vars['item']->value['filters'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['tid']!=1&&!empty($_smarty_tpl->tpl_vars['item']->value['filters'][$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['i']['index']]['aid'])){?>
    <a href="/admin/?module=attributes_values&task=editItem&itemID=<?php echo $_smarty_tpl->tpl_vars['item']->value['filters'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['aid'];?>
&ajax=1" onclick="return hs.htmlExpand(this, {headingText:'<?php echo @constant('ATTRIBUTES');?>
: <?php echo $_smarty_tpl->tpl_vars['item']->value['filters'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
', objectType:'iframe', preserveContent: false, width:910});">
        <img src="/images/operation/edit.png" height="10">
    </a>
<?php }?>
</li>
<?php endfor; endif; ?>
<?php }?><?php }} ?>