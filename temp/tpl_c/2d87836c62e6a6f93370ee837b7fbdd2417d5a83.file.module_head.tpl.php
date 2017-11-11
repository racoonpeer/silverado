<?php /* Smarty version Smarty-3.1.14, created on 2017-11-11 10:50:10
         compiled from "tpl/backend/weblife/common/module_head.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4664674295a06b9c2082748-89289631%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d87836c62e6a6f93370ee837b7fbdd2417d5a83' => 
    array (
      0 => 'tpl/backend/weblife/common/module_head.tpl',
      1 => 1510388918,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4664674295a06b9c2082748-89289631',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arrPageData' => 0,
    'creat_title' => 0,
    'edit_title' => 0,
    'title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06b9c221ae48_92089272',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06b9c221ae48_92089272')) {function content_5a06b9c221ae48_92089272($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['task']=='addItem'){?>
    <div class="title"><?php echo $_smarty_tpl->tpl_vars['creat_title']->value;?>
<?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['arParent']['title'])){?> <?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['arParent']['title'];?>
<?php }?></div>
<?php }elseif($_smarty_tpl->tpl_vars['arrPageData']->value['task']=='editItem'){?>
    <div class="title"><?php echo $_smarty_tpl->tpl_vars['edit_title']->value;?>
<?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['arParent']['title'])){?> <?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['arParent']['title'];?>
<?php }?></div>
<?php }else{ ?>
    <div class="title"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
<?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['arParent']['title'])){?> <?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['arParent']['title'];?>
<?php }?></div>
<?php }?>

<div id="messages" class="<?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['errors'])){?>error<?php }elseif(!empty($_smarty_tpl->tpl_vars['arrPageData']->value['messages'])){?>info<?php }else{ ?>hidden_block<?php }?>">
<?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['errors'])){?>
    <?php echo implode($_smarty_tpl->tpl_vars['arrPageData']->value['errors'],'<br/>');?>

<?php }elseif(!empty($_smarty_tpl->tpl_vars['arrPageData']->value['messages'])){?>
    <?php echo implode($_smarty_tpl->tpl_vars['arrPageData']->value['messages'],'<br/>');?>

<?php }?>
</div>
   
<div class="breadcrumb">
    <?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['task']=='addItem'||$_smarty_tpl->tpl_vars['arrPageData']->value['task']=='editItem'){?>
        <a href="/admin/?module=main">Структура разделов</a> 
        <?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['path_arrow'];?>
 
        <a href="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['admin_url'];?>
" title=""><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</a>
    <?php }elseif(!empty($_smarty_tpl->tpl_vars['arrPageData']->value['arParent'])){?>
        <a href="/admin/?module=main">Структура разделов</a> 
    <?php }?>
    <!-- ++++++++++ Start BreadCrumb +++++++++++++++++++++++++++++++++++++++++++ -->
    <?php echo $_smarty_tpl->getSubTemplate ('common/breadcrumb.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arrBreadCrumb'=>$_smarty_tpl->tpl_vars['arrPageData']->value['arrBreadCrumb']), 0);?>

    <!-- ++++++++++ End BreadCrumb +++++++++++++++++++++++++++++++++++++++++++++ -->
</div>
<div class="clear"></div>
<?php }} ?>