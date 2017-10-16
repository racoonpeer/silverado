<?php /* Smarty version Smarty-3.1.14, created on 2017-10-14 13:22:29
         compiled from "tpl\frontend\smart\core\buy_button.tpl" */ ?>
<?php /*%%SmartyHeaderCode:511259e1e5655704c8-90231375%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5beb27acc346cff60629e525efe2d183e076989' => 
    array (
      0 => 'tpl\\frontend\\smart\\core\\buy_button.tpl',
      1 => 1507971576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '511259e1e5655704c8-90231375',
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
  'unifunc' => 'content_59e1e56585dfe9_18559170',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e1e56585dfe9_18559170')) {function content_59e1e56585dfe9_18559170($_smarty_tpl) {?><?php if (!isset($_smarty_tpl->tpl_vars['list']->value)){?>
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