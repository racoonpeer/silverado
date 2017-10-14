<?php /* Smarty version Smarty-3.1.14, created on 2017-10-08 20:07:45
         compiled from "tpl/frontend/smart/core/static.tpl" */ ?>
<?php /*%%SmartyHeaderCode:68693954759ac728363c3c8-87766556%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d10327ad76019b2a09c61131eb319de79f03080' => 
    array (
      0 => 'tpl/frontend/smart/core/static.tpl',
      1 => 1507479416,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '68693954759ac728363c3c8-87766556',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59ac728371c5d9_11845164',
  'variables' => 
  array (
    'arCategory' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ac728371c5d9_11845164')) {function content_59ac728371c5d9_11845164($_smarty_tpl) {?><div class="page-body-content">
    <h2><?php echo $_smarty_tpl->tpl_vars['arCategory']->value['title'];?>
</h2>
    <?php if (!empty($_smarty_tpl->tpl_vars['arCategory']->value['text'])){?>
        <?php echo $_smarty_tpl->tpl_vars['arCategory']->value['text'];?>

    <?php }else{ ?>
        <br /><br /><br />
        <center><?php echo @constant('NO_CONTENT');?>
</center>
    <?php }?>
</div><?php }} ?>