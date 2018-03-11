<?php /* Smarty version Smarty-3.1.14, created on 2018-02-17 20:54:41
         compiled from "tpl/frontend/smart/module/liqpay.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1339723085a8879da3f9fb3-68467540%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db98251f496ebb6eb3cea94c5ef63ebc5f5419be' => 
    array (
      0 => 'tpl/frontend/smart/module/liqpay.tpl',
      1 => 1518893676,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1339723085a8879da3f9fb3-68467540',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a8879da602a54_21834652',
  'variables' => 
  array (
    'arrPageData' => 0,
    'arCategory' => 0,
    'UrlWL' => 0,
    'HTMLHelper' => 0,
    'viewed' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8879da602a54_21834652')) {function content_5a8879da602a54_21834652($_smarty_tpl) {?><div class="page-container container clearfix <?php if (empty($_smarty_tpl->tpl_vars['arrPageData']->value['form'])){?>progress<?php }?>">
    <h1 class="heading-title"><?php echo $_smarty_tpl->tpl_vars['arCategory']->value['title'];?>
</h1>
<?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['form'])){?>
    <?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['form'];?>

<?php }elseif(!empty($_smarty_tpl->tpl_vars['arrPageData']->value['messages'])||!empty($_smarty_tpl->tpl_vars['arrPageData']->value['errors'])){?>
    <div class="<?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['messages'])){?>messages<?php }elseif(!empty($_smarty_tpl->tpl_vars['arrPageData']->value['errors'])){?>errors<?php }?>">
<?php if (!empty($_smarty_tpl->tpl_vars['arrPageData']->value['messages'])){?>
        <?php echo implode($_smarty_tpl->tpl_vars['arrPageData']->value['messages'],"<br>");?>

<?php }elseif(!empty($_smarty_tpl->tpl_vars['arrPageData']->value['errors'])){?>
        <?php echo implode($_smarty_tpl->tpl_vars['arrPageData']->value['errors'],"<br>");?>

<?php }?>
    </div>
    <?php $_smarty_tpl->tpl_vars['viewed'] = new Smarty_variable($_smarty_tpl->tpl_vars['HTMLHelper']->value->getLastWatched($_smarty_tpl->tpl_vars['UrlWL']->value), null, 0);?>
<?php if (!empty($_smarty_tpl->tpl_vars['viewed']->value)){?>
    <div class="hr clearfix"></div>
    <?php echo $_smarty_tpl->getSubTemplate ("core/product-selections.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arItems'=>$_smarty_tpl->tpl_vars['viewed']->value,'title'=>"Товары которые вы недавно смотрели"), 0);?>

<?php }?>
<?php }?>
</div><?php }} ?>