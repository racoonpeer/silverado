<?php /* Smarty version Smarty-3.1.14, created on 2017-12-17 15:05:36
         compiled from "tpl/frontend/smart/core/product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16853054365a06b2663e0ed1-66478559%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '556a8bd6289518a1bc3e5f76ca5ce21742cc23aa' => 
    array (
      0 => 'tpl/frontend/smart/core/product.tpl',
      1 => 1513515760,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16853054365a06b2663e0ed1-66478559',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06b2664f5e61_26132954',
  'variables' => 
  array (
    'ReplaceItem' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06b2664f5e61_26132954')) {function content_5a06b2664f5e61_26132954($_smarty_tpl) {?><?php if (!isset($_smarty_tpl->tpl_vars['ReplaceItem']->value)){?>
<div class="product-item" id="product_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" data-cid="<?php echo $_smarty_tpl->tpl_vars['item']->value['cid'];?>
">
<?php }?>
    <div class="wrap">
        <div class="fade"></div>
        <div class="img">
            <a href="<?php echo $_smarty_tpl->getSubTemplate ('core/href_item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['item']->value['arCategory'],'arItem'=>$_smarty_tpl->tpl_vars['item']->value), 0);?>
">
                <img src="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['image']['middle_image'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['image']['middle_image'];?>
<?php }?>" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
 <?php echo $_smarty_tpl->tpl_vars['item']->value['pcode'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
 <?php echo $_smarty_tpl->tpl_vars['item']->value['pcode'];?>
"/>
            </a>
            <?php echo $_smarty_tpl->getSubTemplate ("core/product-sticker.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <div class="box-overlay"></div>
            <?php echo $_smarty_tpl->getSubTemplate ("core/buy_button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('list'=>true), 0);?>

        </div>
<?php if ($_smarty_tpl->tpl_vars['item']->value['rating']>0){?>
        <div class="rating v-<?php echo $_smarty_tpl->tpl_vars['item']->value['rating'];?>
"></div>
<?php }?>
        <div class="title">
            <a href="<?php echo $_smarty_tpl->getSubTemplate ('core/href_item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['item']->value['arCategory'],'arItem'=>$_smarty_tpl->tpl_vars['item']->value), 0);?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
        </div>
        <?php echo $_smarty_tpl->getSubTemplate ("core/product_price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
<?php if (!isset($_smarty_tpl->tpl_vars['ReplaceItem']->value)){?>
</div>
<?php }?><?php }} ?>