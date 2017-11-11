<?php /* Smarty version Smarty-3.1.14, created on 2017-11-11 11:14:58
         compiled from "tpl/frontend/smart/ajax/_filter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8928018565a06bf929e0452-40224322%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '8928018565a06bf929e0452-40224322',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
    'template' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06bf92b4cdc4_48153166',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06bf92b4cdc4_48153166')) {function content_5a06bf92b4cdc4_48153166($_smarty_tpl) {?>
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