<?php /* Smarty version Smarty-3.1.14, created on 2017-10-20 21:56:36
         compiled from "tpl/frontend/smart/core/static.tpl" */ ?>
<?php /*%%SmartyHeaderCode:42685298959ea46e4117f05-08895877%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '42685298959ea46e4117f05-08895877',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arCategory' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59ea46e42414b5_50641789',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ea46e42414b5_50641789')) {function content_59ea46e42414b5_50641789($_smarty_tpl) {?><div class="page-body-content">
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