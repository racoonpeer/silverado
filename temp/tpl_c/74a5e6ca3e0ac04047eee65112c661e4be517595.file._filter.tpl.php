<?php /* Smarty version Smarty-3.1.14, created on 2017-10-08 19:23:43
         compiled from "tpl/frontend/smart/ajax/_filter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:159481226359ac727f053770-98448906%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74a5e6ca3e0ac04047eee65112c661e4be517595' => 
    array (
      0 => 'tpl/frontend/smart/ajax/_filter.tpl',
      1 => 1507479415,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159481226359ac727f053770-98448906',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59ac727f1c12e6_46992220',
  'variables' => 
  array (
    'item' => 0,
    'template' => 0,
    'filter' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ac727f1c12e6_46992220')) {function content_59ac727f1c12e6_46992220($_smarty_tpl) {?>
<li class="<?php if ($_smarty_tpl->tpl_vars['item']->value['hidden']){?>hidable hidden<?php }?> <?php if ($_smarty_tpl->tpl_vars['template']->value=="image"){?>inline<?php }?>">
    <input type="checkbox" 
           id="filter_<?php echo $_smarty_tpl->tpl_vars['filter']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" 
           data-url="<?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
" 
           onchange="window.location.href=$(this).data('url');" 
           <?php if ($_smarty_tpl->tpl_vars['item']->value['selected']){?>checked<?php }elseif($_smarty_tpl->tpl_vars['item']->value['cnt']==0){?>disabled<?php }?>/>

    <label class="<?php if ($_smarty_tpl->tpl_vars['template']->value=="image"){?>colorbox<?php }else{ ?>checkbox<?php }?> <?php if ($_smarty_tpl->tpl_vars['item']->value['selected']){?>checked<?php }elseif($_smarty_tpl->tpl_vars['item']->value['cnt']==0){?>disabled<?php }?>" for="filter_<?php echo $_smarty_tpl->tpl_vars['filter']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
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
    </label>
</li><?php }} ?>