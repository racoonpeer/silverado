<?php /* Smarty version Smarty-3.1.14, created on 2017-10-21 00:18:16
         compiled from "tpl/backend/weblife/common/top_langs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:155763873459ea68180f8f82-69576668%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eaa7701a0edd8af8079db242ddb20a5f597ee907' => 
    array (
      0 => 'tpl/backend/weblife/common/top_langs.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155763873459ea68180f8f82-69576668',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arrLangs' => 0,
    'lnKey' => 0,
    'lang' => 0,
    'arLnItem' => 0,
    'arLangsUrls' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59ea6818197296_74078983',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ea6818197296_74078983')) {function content_59ea6818197296_74078983($_smarty_tpl) {?><div class="top_langs">
    <?php if (count($_smarty_tpl->tpl_vars['arrLangs']->value)>1){?>
        <?php  $_smarty_tpl->tpl_vars['arLnItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['arLnItem']->_loop = false;
 $_smarty_tpl->tpl_vars['lnKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arrLangs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['arLnItem']->key => $_smarty_tpl->tpl_vars['arLnItem']->value){
$_smarty_tpl->tpl_vars['arLnItem']->_loop = true;
 $_smarty_tpl->tpl_vars['lnKey']->value = $_smarty_tpl->tpl_vars['arLnItem']->key;
?>
            <?php if ($_smarty_tpl->tpl_vars['lnKey']->value==$_smarty_tpl->tpl_vars['lang']->value){?>
                <span class="active"><?php echo $_smarty_tpl->tpl_vars['arLnItem']->value['title'];?>
</span>
            <?php }else{ ?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['arLangsUrls']->value[$_smarty_tpl->tpl_vars['lnKey']->value];?>
" title="<?php echo $_smarty_tpl->tpl_vars['arLnItem']->value['title'];?>
">
                    <?php echo $_smarty_tpl->tpl_vars['arLnItem']->value['title'];?>

                </a>
            <?php }?>
        <?php } ?>
    <?php }?>
</div><?php }} ?>