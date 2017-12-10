<?php /* Smarty version Smarty-3.1.14, created on 2017-11-19 23:25:44
         compiled from "tpl/frontend/smart/core/static.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13304421345a11f6d878c4b0-28348950%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d10327ad76019b2a09c61131eb319de79f03080' => 
    array (
      0 => 'tpl/frontend/smart/core/static.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13304421345a11f6d878c4b0-28348950',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arCategory' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a11f6d88ae295_33485204',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a11f6d88ae295_33485204')) {function content_5a11f6d88ae295_33485204($_smarty_tpl) {?><div class="page-body-content">
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