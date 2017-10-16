<?php /* Smarty version Smarty-3.1.14, created on 2017-10-16 14:04:54
         compiled from "tpl\frontend\smart\ajax\_filter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:601559e492568162b1-56345442%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc24d10c676c4ab22fbc0edb45a8b39df306416b' => 
    array (
      0 => 'tpl\\frontend\\smart\\ajax\\_filter.tpl',
      1 => 1507971576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '601559e492568162b1-56345442',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
    'template' => 0,
    'filter' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59e49256c3e2b2_84359988',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e49256c3e2b2_84359988')) {function content_59e49256c3e2b2_84359988($_smarty_tpl) {?>
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