<?php /* Smarty version Smarty-3.1.14, created on 2017-10-17 22:24:53
         compiled from "tpl/frontend/smart/core/product-gallery.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28436280259e6590567c656-29136337%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e54eaf5f6da9dc65bdad9a47e8092fdaa3708ef' => 
    array (
      0 => 'tpl/frontend/smart/core/product-gallery.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28436280259e6590567c656-29136337',
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
  'unifunc' => 'content_59e659058304e2_23467334',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e659058304e2_23467334')) {function content_59e659058304e2_23467334($_smarty_tpl) {?><div class="product-image flypage-gallery">
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