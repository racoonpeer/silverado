<?php /* Smarty version Smarty-3.1.14, created on 2017-10-14 19:17:02
         compiled from "tpl\frontend\smart\module\error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1033859e2387e19d780-82587398%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b3dde7ae7494bcbebabe3e55ca688035f5083f25' => 
    array (
      0 => 'tpl\\frontend\\smart\\module\\error.tpl',
      1 => 1507971576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1033859e2387e19d780-82587398',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'UrlWL' => 0,
    'HTMLHelper' => 0,
    'viewed' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59e2387e721ed3_27138892',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e2387e721ed3_27138892')) {function content_59e2387e721ed3_27138892($_smarty_tpl) {?><div class="page-container container clearfix">
    <div class="error-page">
        <div class="code">4<span>0</span>4</div>
        <h1>�������� �� �������</h1>
        <p>�������� ��� ������� ��� ���� �������� ������ � ������.<br/>
            �������������� ������� ��� ���������<br/>
            �� <a href="/">������� ��������</a></p>
    </div>
<?php $_smarty_tpl->tpl_vars['viewed'] = new Smarty_variable($_smarty_tpl->tpl_vars['HTMLHelper']->value->getLastWatched($_smarty_tpl->tpl_vars['UrlWL']->value), null, 0);?>
<?php if (!empty($_smarty_tpl->tpl_vars['viewed']->value)){?>
    <div class="hr clearfix"></div>
    <?php echo $_smarty_tpl->getSubTemplate ("core/product-selections.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arItems'=>$_smarty_tpl->tpl_vars['viewed']->value,'title'=>"������ ������� �� ������� ��������"), 0);?>

<?php }?>
</div><?php }} ?>