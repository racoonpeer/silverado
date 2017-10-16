<?php /* Smarty version Smarty-3.1.14, created on 2017-10-16 16:20:34
         compiled from "tpl\frontend\smart\core\product-gallery.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1439759e4b222941595-66019697%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c811b81392bdc1aadeb92e0c066fb5e5811a864c' => 
    array (
      0 => 'tpl\\frontend\\smart\\core\\product-gallery.tpl',
      1 => 1507971576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1439759e4b222941595-66019697',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
    'image' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59e4b222a7f415_01558780',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e4b222a7f415_01558780')) {function content_59e4b222a7f415_01558780($_smarty_tpl) {?><div class="product-image flypage-gallery">
    <div class="screen">
<?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['image']->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value){
$_smarty_tpl->tpl_vars['image']->_loop = true;
 $_smarty_tpl->tpl_vars['image']->index++;
 $_smarty_tpl->tpl_vars['image']->first = $_smarty_tpl->tpl_vars['image']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['first'] = $_smarty_tpl->tpl_vars['image']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['index']++;
?>
        <div class="slick-slide <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['i']['first']){?>slick-active<?php }?>" data-original="<?php echo $_smarty_tpl->tpl_vars['image']->value['image'];?>
">
            <img src="<?php echo $_smarty_tpl->tpl_vars['image']->value['big_image'];?>
" alt=""/>
        </div>
<?php } ?>
    </div>
<?php if (count($_smarty_tpl->tpl_vars['item']->value['images'])>1){?>
    <ul class="thumbs">
<?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['image']->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value){
$_smarty_tpl->tpl_vars['image']->_loop = true;
 $_smarty_tpl->tpl_vars['image']->index++;
 $_smarty_tpl->tpl_vars['image']->first = $_smarty_tpl->tpl_vars['image']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['first'] = $_smarty_tpl->tpl_vars['image']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['index']++;
?>
        <li class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['i']['first']){?>selected<?php }?>">
            <a href="#" data-index="<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['i']['index'];?>
">
                <img src="<?php echo $_smarty_tpl->tpl_vars['image']->value['small_image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
"/>
            </a>
        </li>
<?php } ?>
    </ul>
<?php }?>
</div><?php }} ?>