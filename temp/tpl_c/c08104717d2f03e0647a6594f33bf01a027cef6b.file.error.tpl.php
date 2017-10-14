<?php /* Smarty version Smarty-3.1.14, created on 2017-10-08 19:39:52
         compiled from "tpl/frontend/smart/module/error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:106758195159ac7127715d88-80515577%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c08104717d2f03e0647a6594f33bf01a027cef6b' => 
    array (
      0 => 'tpl/frontend/smart/module/error.tpl',
      1 => 1507479418,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '106758195159ac7127715d88-80515577',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59ac7127785ae2_05350452',
  'variables' => 
  array (
    'UrlWL' => 0,
    'HTMLHelper' => 0,
    'viewed' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ac7127785ae2_05350452')) {function content_59ac7127785ae2_05350452($_smarty_tpl) {?><div class="page-container container clearfix">
    <div class="error-page">
        <div class="code">4<span>0</span>4</div>
        <h1>Страница не найдена</h1>
        <p>Возможно она удалена или была допущена ошибка в адресе.<br/>
            Воспользуйтесь поиском или вернитесь<br/>
            на <a href="/">главную страницу</a></p>
    </div>
<?php $_smarty_tpl->tpl_vars['viewed'] = new Smarty_variable($_smarty_tpl->tpl_vars['HTMLHelper']->value->getLastWatched($_smarty_tpl->tpl_vars['UrlWL']->value), null, 0);?>
<?php if (!empty($_smarty_tpl->tpl_vars['viewed']->value)){?>
    <div class="hr clearfix"></div>
    <?php echo $_smarty_tpl->getSubTemplate ("core/product-selections.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arItems'=>$_smarty_tpl->tpl_vars['viewed']->value,'title'=>"Товары которые вы недавно смотрели"), 0);?>

<?php }?>
</div><?php }} ?>