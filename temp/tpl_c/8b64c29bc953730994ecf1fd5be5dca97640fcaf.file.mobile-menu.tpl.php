<?php /* Smarty version Smarty-3.1.14, created on 2017-10-16 14:04:21
         compiled from "tpl\frontend\smart\core\mobile-menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1624359e492358daaa0-24256529%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b64c29bc953730994ecf1fd5be5dca97640fcaf' => 
    array (
      0 => 'tpl\\frontend\\smart\\core\\mobile-menu.tpl',
      1 => 1508088273,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1624359e492358daaa0-24256529',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arCategory' => 0,
    'catalogMenu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59e49235973099_31407654',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e49235973099_31407654')) {function content_59e49235973099_31407654($_smarty_tpl) {?><div class="mobile-menu" off-canvas="mobile-menu left shift" id="mobileMenu">
    <a class="m-logo <?php if ($_smarty_tpl->tpl_vars['arCategory']->value['module']=="home"){?>noclick<?php }?>" href="<?php if ($_smarty_tpl->tpl_vars['arCategory']->value['module']=="home"){?>#<?php }else{ ?>/<?php }?>"></a>
    <div class="menu-wrap">
        <?php echo $_smarty_tpl->getSubTemplate ("menu/catalog.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arItems'=>$_smarty_tpl->tpl_vars['catalogMenu']->value,'marginLevel'=>0), 0);?>

    </div>
</div><?php }} ?>