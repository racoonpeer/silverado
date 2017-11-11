<?php /* Smarty version Smarty-3.1.14, created on 2017-11-11 11:15:34
         compiled from "tpl/frontend/smart/core/product-dialog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18334399045a06bfb65d3cd2-73238216%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4863dc309a006f932c83433893c853d30b99193a' => 
    array (
      0 => 'tpl/frontend/smart/core/product-dialog.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18334399045a06bfb65d3cd2-73238216',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06bfb66ecf41_05576780',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06bfb66ecf41_05576780')) {function content_5a06bfb66ecf41_05576780($_smarty_tpl) {?><div class="product-dialog clearfix">
    <div class="product-title">
        <a href="<?php echo $_smarty_tpl->getSubTemplate ("core/href_item.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['item']->value['arCategory'],'arItem'=>$_smarty_tpl->tpl_vars['item']->value,'params'=>''), 0);?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
    </div>
    <div class="pull-left product-image">
        <div class="screen">
            <a href="<?php echo $_smarty_tpl->getSubTemplate ("core/href_item.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['item']->value['arCategory'],'arItem'=>$_smarty_tpl->tpl_vars['item']->value,'params'=>''), 0);?>
" data-original="<?php echo $_smarty_tpl->tpl_vars['item']->value['image']['big_image'];?>
">
                <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['image']['middle_image'];?>
" alt=""/>
            </a>
        </div>
    </div>
    <div class="product-flypage details clearfix">
        <?php echo $_smarty_tpl->getSubTemplate ("core/product-sticker.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


        <?php echo $_smarty_tpl->getSubTemplate ("core/buy_button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('list'=>false), 0);?>

<?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_smarty_tpl->tpl_vars['optionID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
 $_smarty_tpl->tpl_vars['optionID']->value = $_smarty_tpl->tpl_vars['option']->key;
?>
        <div class="options">
            <form>
                <?php echo $_smarty_tpl->getSubTemplate ("core/_option.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('list'=>false,'types'=>array("select","radio","image")), 0);?>

            </form>
        </div>
<?php } ?>
    </div>
</div><?php }} ?>