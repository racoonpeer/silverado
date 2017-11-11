<?php /* Smarty version Smarty-3.1.14, created on 2017-11-11 10:18:46
         compiled from "tpl/frontend/smart/core/buy_button.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18818668865a06b2665ad134-17408847%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d873d2148fc68ad66d7a87a812b3a7fe7c49910' => 
    array (
      0 => 'tpl/frontend/smart/core/buy_button.tpl',
      1 => 1510166471,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18818668865a06b2665ad134-17408847',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'item' => 0,
    'Basket' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06b2666cad42_76787499',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06b2666cad42_76787499')) {function content_5a06b2666cad42_76787499($_smarty_tpl) {?><?php if (!isset($_smarty_tpl->tpl_vars['list']->value)){?>
<?php $_smarty_tpl->tpl_vars['list'] = new Smarty_variable(true, null, 0);?>
<?php }?>
<div class="buttons">
<?php if (!$_smarty_tpl->tpl_vars['list']->value){?>
    <?php echo $_smarty_tpl->getSubTemplate ("core/product_price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="btn-wrap">
<?php }?>
    <button class="btn btn-<?php if (!$_smarty_tpl->tpl_vars['list']->value){?>l btn-danger<?php }else{ ?>s btn-link<?php }?> add-to-cart<?php if ($_smarty_tpl->tpl_vars['Basket']->value->isSetKey($_smarty_tpl->tpl_vars['item']->value['idKey'])){?> in-cart<?php }?>" 
        data-key="<?php echo $_smarty_tpl->tpl_vars['item']->value['idKey'];?>
" 
        data-url="<?php echo $_smarty_tpl->getSubTemplate ('core/href_item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['item']->value['arCategory'],'arItem'=>$_smarty_tpl->tpl_vars['item']->value), 0);?>
" 
        onclick="<?php if ($_smarty_tpl->tpl_vars['list']->value){?>Basket.openDialog($(this).data('url'));<?php }else{ ?><?php if ($_smarty_tpl->tpl_vars['Basket']->value->isSetKey($_smarty_tpl->tpl_vars['item']->value['idKey'])){?>Basket.open();<?php }else{ ?>Basket.add('<?php echo $_smarty_tpl->tpl_vars['item']->value['idKey'];?>
', 1, 0);<?php }?><?php }?>"
        data-text="<?php echo @constant('BUY');?>
" data-alt="<?php echo @constant('IN_CART');?>
">
    </button>
    
<?php if (!$_smarty_tpl->tpl_vars['list']->value){?>
    </div>
<?php }?>
</div><?php }} ?>