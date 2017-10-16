<?php /* Smarty version Smarty-3.1.14, created on 2017-10-14 13:22:44
         compiled from "tpl\frontend\smart\core\breadcrumb.tpl" */ ?>
<?php /*%%SmartyHeaderCode:461959e1e5742ea006-82628236%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07c1aa5c519787d71897528606cafb481205edf3' => 
    array (
      0 => 'tpl\\frontend\\smart\\core\\breadcrumb.tpl',
      1 => 1507971576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '461959e1e5742ea006-82628236',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arrBreadCrumb' => 0,
    'sKey' => 0,
    'sItem' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59e1e5744455b8_14986043',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e1e5744455b8_14986043')) {function content_59e1e5744455b8_14986043($_smarty_tpl) {?>
<?php if (count($_smarty_tpl->tpl_vars['arrBreadCrumb']->value)>1){?>
<div class="breadcrumbs">
    <ul itemscope itemtype="http://schema.org/BreadcrumbList">
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a href="/">
                <a itemprop="item" href="/">Silverado</a>
                <meta itemprop="position" content="1"/>
            </a>
        </li>
<?php  $_smarty_tpl->tpl_vars['sItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sItem']->_loop = false;
 $_smarty_tpl->tpl_vars['sKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arrBreadCrumb']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['sItem']->key => $_smarty_tpl->tpl_vars['sItem']->value){
$_smarty_tpl->tpl_vars['sItem']->_loop = true;
 $_smarty_tpl->tpl_vars['sKey']->value = $_smarty_tpl->tpl_vars['sItem']->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['iteration']++;
?>
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a href="<?php echo $_smarty_tpl->tpl_vars['sKey']->value;?>
">
                <span itemprop="name"><?php echo $_smarty_tpl->tpl_vars['sItem']->value;?>
</span>
                <meta itemprop="position" content="<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['i']['iteration']+1;?>
"/>
            </a>
        </li>
<?php } ?>
    </ul>
</div>
<?php }?><?php }} ?>