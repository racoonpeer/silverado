<?php /* Smarty version Smarty-3.1.14, created on 2017-10-14 14:02:37
         compiled from "tpl\frontend\smart\core\product-comments.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1642259e1eecde6d077-16192632%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '694bd78ac158cf6f4794c2f1612481b671fa532e' => 
    array (
      0 => 'tpl\\frontend\\smart\\core\\product-comments.tpl',
      1 => 1507971576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1642259e1eecde6d077-16192632',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'comments' => 0,
    'HTMLHelper' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59e1eece3af630_03768137',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e1eece3af630_03768137')) {function content_59e1eece3af630_03768137($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['comments']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
<div class="item">
    <p>
<?php if (!empty($_smarty_tpl->tpl_vars['comments']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['i']['index']]['rating'])){?>
        <div class="rating v-<?php echo $_smarty_tpl->tpl_vars['comments']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rating'];?>
"></div>
<?php }?>
        <?php echo unScreenData($_smarty_tpl->tpl_vars['comments']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['descr']);?>

    </p>
    <strong><?php echo $_smarty_tpl->tpl_vars['comments']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
</strong>, <span><?php if (!empty($_smarty_tpl->tpl_vars['comments']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['i']['index']]['createdDate'])){?><?php echo $_smarty_tpl->tpl_vars['comments']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['createdDate'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['HTMLHelper']->value->RuDateFormat($_smarty_tpl->tpl_vars['comments']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['created']);?>
<?php }?></span>

</div>
<?php endfor; endif; ?>
<?php if ($_smarty_tpl->tpl_vars['pager']->value['pages']>1){?>
<div class="pagination">
    <ul>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['pager']->value['pages']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
        <li class="<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['i']['iteration']==$_smarty_tpl->tpl_vars['pager']->value['page']){?>cur<?php }?>">
<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['i']['iteration']!=$_smarty_tpl->tpl_vars['pager']->value['page']){?>
            <a href="<?php echo (($_smarty_tpl->tpl_vars['pager']->value['url']).("&npage=")).($_smarty_tpl->getVariable('smarty')->value['section']['i']['iteration']);?>
" onclick="return Comments.load(this.href);" class="pag-hover">
<?php }?>
            <?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['iteration'];?>

<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['i']['iteration']!=$_smarty_tpl->tpl_vars['pager']->value['page']){?>
            </a>
<?php }?>
        </li>
<?php endfor; endif; ?>
    </ul>
</div>
<?php }?><?php }} ?>