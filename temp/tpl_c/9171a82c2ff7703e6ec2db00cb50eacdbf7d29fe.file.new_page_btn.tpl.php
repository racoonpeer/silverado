<?php /* Smarty version Smarty-3.1.14, created on 2017-10-08 19:17:52
         compiled from "tpl/backend/weblife/common/new_page_btn.tpl" */ ?>
<?php /*%%SmartyHeaderCode:66711076959ac6fd194e693-09903312%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9171a82c2ff7703e6ec2db00cb50eacdbf7d29fe' => 
    array (
      0 => 'tpl/backend/weblife/common/new_page_btn.tpl',
      1 => 1507479412,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '66711076959ac6fd194e693-09903312',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59ac6fd1a41098_71772567',
  'variables' => 
  array (
    'shortcut' => 0,
    'arrPageData' => 0,
    'title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ac6fd1a41098_71772567')) {function content_59ac6fd1a41098_71772567($_smarty_tpl) {?><div class="addNew" <?php if (isset($_smarty_tpl->tpl_vars['shortcut']->value)&&$_smarty_tpl->tpl_vars['shortcut']->value){?>style="width:auto;"<?php }?>>
    <?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['task']!='addItem'&&$_smarty_tpl->tpl_vars['arrPageData']->value['task']!='editItem'){?>
        <a  <?php if (isset($_smarty_tpl->tpl_vars['shortcut']->value)&&$_smarty_tpl->tpl_vars['shortcut']->value){?>style="padding-right:5px;"<?php }?> href="<?php echo ($_smarty_tpl->tpl_vars['arrPageData']->value['current_url']).("&task=addItem");?>
"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</a>
    <?php }?>
</div>
    
<?php if (isset($_smarty_tpl->tpl_vars['shortcut']->value)&&$_smarty_tpl->tpl_vars['shortcut']->value){?>
    <div class="addNew" style="width:auto; padding-right:5px">
        <a <?php if (isset($_smarty_tpl->tpl_vars['shortcut']->value)&&$_smarty_tpl->tpl_vars['shortcut']->value){?>style="padding-right:5px;"<?php }?> href="/admin.php?module=shortcuts<?php if (isset($_smarty_tpl->tpl_vars['arrPageData']->value['cid'])&&$_smarty_tpl->tpl_vars['arrPageData']->value['cid']>0){?>&cid=<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['cid'];?>
<?php }?>&task=addItem&object_module=<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['module'];?>
">ÿנכûך</a>
    </div>
<?php }?><?php }} ?>