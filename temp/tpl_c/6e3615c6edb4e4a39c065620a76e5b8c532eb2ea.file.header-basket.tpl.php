<?php /* Smarty version Smarty-3.1.14, created on 2017-10-08 12:05:18
         compiled from "tpl/frontend/smart/core/header-basket.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32880543959d9ea4e423038-85714811%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e3615c6edb4e4a39c065620a76e5b8c532eb2ea' => 
    array (
      0 => 'tpl/frontend/smart/core/header-basket.tpl',
      1 => 1506977744,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32880543959d9ea4e423038-85714811',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arCategory' => 0,
    'arrModules' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59d9ea4e46ff61_68231645',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59d9ea4e46ff61_68231645')) {function content_59d9ea4e46ff61_68231645($_smarty_tpl) {?>
<div class="header-container">
    <div class="section-middle container clearfix">
        <div class="lt">
            <div class="logo">
<?php if ($_smarty_tpl->tpl_vars['arCategory']->value['module']!="home"){?>
                <a href="/"></a>
<?php }?>
            </div>
        </div>
        <div class="phones">
            <a href="tel:+380990549540">099 0549540</a>&emsp;
            <a href="tel:+380960549540">096 0549540</a>&emsp;
            <a href="tel:+380930549540">093 0549540</a>
<?php if (isset($_smarty_tpl->tpl_vars['arrModules']->value['callback'])){?>
            <div class="hint">заказать <a href="#" onclick="return Modal.open('<?php echo $_smarty_tpl->getSubTemplate ("core/href.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['arrModules']->value['callback']), 0);?>
');">обратный звонок</a></div>
<?php }?>
        </div>
    </div>
</div><?php }} ?>