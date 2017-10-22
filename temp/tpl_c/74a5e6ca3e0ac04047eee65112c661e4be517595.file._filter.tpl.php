<?php /* Smarty version Smarty-3.1.14, created on 2017-10-22 22:36:48
         compiled from "tpl/frontend/smart/ajax/_filter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:50668662159e658e19a4d56-20153020%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74a5e6ca3e0ac04047eee65112c661e4be517595' => 
    array (
      0 => 'tpl/frontend/smart/ajax/_filter.tpl',
      1 => 1508700989,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '50668662159e658e19a4d56-20153020',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59e658e1b23371_68724037',
  'variables' => 
  array (
    'item' => 0,
    'template' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e658e1b23371_68724037')) {function content_59e658e1b23371_68724037($_smarty_tpl) {?>
<li class="<?php if ($_smarty_tpl->tpl_vars['item']->value['hidden']){?>hidable hidden<?php }?> <?php if ($_smarty_tpl->tpl_vars['template']->value=="image"){?>inline<?php }?>">
    <a class="filter-element <?php if ($_smarty_tpl->tpl_vars['template']->value=="image"){?>colorbox<?php }else{ ?>checkbox<?php }?> <?php if ($_smarty_tpl->tpl_vars['item']->value['selected']){?>checked<?php }elseif($_smarty_tpl->tpl_vars['item']->value['cnt']==0){?>disabled<?php }?>" href="<?php if ($_smarty_tpl->tpl_vars['item']->value['cnt']>0){?><?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
<?php }else{ ?>#<?php }?>">
<?php if ($_smarty_tpl->tpl_vars['template']->value=="image"){?>
        <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
"/>
<?php }else{ ?>
        <?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
<?php if ($_smarty_tpl->tpl_vars['item']->value['cnt']>0){?> <span class="cnt">(<?php if (!$_smarty_tpl->tpl_vars['item']->value['selected']&&$_smarty_tpl->tpl_vars['item']->value['cnt_diff']>0){?>+<?php echo $_smarty_tpl->tpl_vars['item']->value['cnt_diff'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['cnt'];?>
<?php }?>)</span><?php }?>
<?php }?>
    </a>

</li><?php }} ?>