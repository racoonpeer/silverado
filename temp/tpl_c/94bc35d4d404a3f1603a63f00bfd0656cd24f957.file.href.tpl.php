<?php /* Smarty version Smarty-3.1.14, created on 2017-10-14 13:22:26
         compiled from "tpl\frontend\smart\core\href.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1880459e1e562e262a9-82628263%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94bc35d4d404a3f1603a63f00bfd0656cd24f957' => 
    array (
      0 => 'tpl\\frontend\\smart\\core\\href.tpl',
      1 => 1507971576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1880459e1e562e262a9-82628263',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'params' => 0,
    'arCategory' => 0,
    'UrlWL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59e1e563071ab8_20473775',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e1e563071ab8_20473775')) {function content_59e1e563071ab8_20473775($_smarty_tpl) {?><?php if (!isset($_smarty_tpl->tpl_vars['params']->value)){?><?php $_smarty_tpl->tpl_vars['params'] = new Smarty_variable('', null, 0);?><?php }?><?php echo $_smarty_tpl->tpl_vars['UrlWL']->value->buildCategoryUrl($_smarty_tpl->tpl_vars['arCategory']->value,$_smarty_tpl->tpl_vars['params']->value);?>
<?php }} ?>