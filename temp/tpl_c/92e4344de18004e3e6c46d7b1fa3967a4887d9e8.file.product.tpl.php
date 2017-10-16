<?php /* Smarty version Smarty-3.1.14, created on 2017-10-16 14:04:23
         compiled from "tpl\frontend\smart\core\product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:903259e492377f22f3-98714965%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '92e4344de18004e3e6c46d7b1fa3967a4887d9e8' => 
    array (
      0 => 'tpl\\frontend\\smart\\core\\product.tpl',
      1 => 1507971576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '903259e492377f22f3-98714965',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ReplaceItem' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59e49237ae0bc3_34137332',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e49237ae0bc3_34137332')) {function content_59e49237ae0bc3_34137332($_smarty_tpl) {?><?php if (!isset($_smarty_tpl->tpl_vars['ReplaceItem']->value)){?>
<div class="product-item" id="product_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" data-cid="<?php echo $_smarty_tpl->tpl_vars['item']->value['cid'];?>
">
<?php }?>
    <div class="wrap">
        <div class="fade"></div>
        <div class="img">
            <a href="<?php echo $_smarty_tpl->getSubTemplate ('core/href_item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['item']->value['arCategory'],'arItem'=>$_smarty_tpl->tpl_vars['item']->value), 0);?>
">
                <img data-original="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['image']['middle_image'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['image']['middle_image'];?>
<?php }?>" class="lazy" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
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