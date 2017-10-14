<?php /* Smarty version Smarty-3.1.14, created on 2017-10-08 19:24:22
         compiled from "tpl/backend/weblife/ajax/access_settings.tpl" */ ?>
<?php /*%%SmartyHeaderCode:157802971759ac6ce70adf79-82979683%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3de425aab4fec18e6b91e47bd3eff5b9dcc038fb' => 
    array (
      0 => 'tpl/backend/weblife/ajax/access_settings.tpl',
      1 => 1507479411,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '157802971759ac6ce70adf79-82979683',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59ac6ce73d7999_07906871',
  'variables' => 
  array (
    'availableModules' => 0,
    'gid' => 0,
    'arModules' => 0,
    'arItem' => 0,
    'uid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ac6ce73d7999_07906871')) {function content_59ac6ce73d7999_07906871($_smarty_tpl) {?>
<ul>
    <li>
        <label>
            <input type="checkbox" value="auth" <?php if (in_array('auth',$_smarty_tpl->tpl_vars['availableModules']->value)){?>checked<?php }?> 
                   class="checkboxes auth" onchange="SelectCheckBox(this, '#group_<?php echo $_smarty_tpl->tpl_vars['gid']->value;?>
');"/> авторизация
        </label>
    </li>
</ul>
        
<?php if (!empty($_smarty_tpl->tpl_vars['arModules']->value)){?>
    <ul>
        <?php  $_smarty_tpl->tpl_vars['arItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['arItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arModules']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['m']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['arItem']->key => $_smarty_tpl->tpl_vars['arItem']->value){
$_smarty_tpl->tpl_vars['arItem']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['m']['iteration']++;
?>
            <li>
                <label>
                    <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['arItem']->value['module'];?>
" 
                           <?php if (!in_array('auth',$_smarty_tpl->tpl_vars['availableModules']->value)){?>disabled<?php }elseif(in_array($_smarty_tpl->tpl_vars['arItem']->value['module'],$_smarty_tpl->tpl_vars['availableModules']->value)){?>checked<?php }?> 
                           class="checkboxes" onchange="SelectCheckBox(this, '#group_<?php echo $_smarty_tpl->tpl_vars['gid']->value;?>
');"/> <?php echo $_smarty_tpl->tpl_vars['arItem']->value['title'];?>

                </label>
            </li>
            <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['m']['iteration']%3==0){?></ul><ul><?php }?>
        <?php } ?>
    </ul>
    <div class="clear"></div>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['uid']->value)&&!empty($_smarty_tpl->tpl_vars['uid']->value)){?>
    <input type="button" class="buttons left" style="margin-right:10px;" data-gid="<?php echo $_smarty_tpl->tpl_vars['gid']->value;?>
" data-action='reset' 
           onclick="getAccessSettings(this);" value="Восстановить значения по умолчанию"/>
<?php }?>
<input type="button" class="buttons" data-gid="<?php echo $_smarty_tpl->tpl_vars['gid']->value;?>
" data-action='save' onclick="getAccessSettings(this);" value="Сохранить"/><?php }} ?>