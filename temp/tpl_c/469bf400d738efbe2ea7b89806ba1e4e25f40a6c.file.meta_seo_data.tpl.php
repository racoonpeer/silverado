<?php /* Smarty version Smarty-3.1.14, created on 2017-10-08 19:21:05
         compiled from "tpl/backend/weblife/common/meta_seo_data.tpl" */ ?>
<?php /*%%SmartyHeaderCode:90234598559ac6fd862e836-72675394%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '469bf400d738efbe2ea7b89806ba1e4e25f40a6c' => 
    array (
      0 => 'tpl/backend/weblife/common/meta_seo_data.tpl',
      1 => 1507479412,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '90234598559ac6fd862e836-72675394',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59ac6fd89532f0_00440612',
  'variables' => 
  array (
    'item' => 0,
    'arrPageData' => 0,
    'seoTable' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ac6fd89532f0_00440612')) {function content_59ac6fd89532f0_00440612($_smarty_tpl) {?><tr>
    <td colspan="2">
        <strong><?php echo @constant('HEAD_META_DATA');?>
</strong><br/><br/>
        <div class="inline"><?php echo @constant('HEAD_KEYWORDS');?>
</div>
        <input type="text" name="meta_key" id="meta_key" size="94" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['meta_key'];?>
" /><br/><br/>
        <div class="inline"><?php echo @constant('HEAD_DESCRIPTION');?>
 </div>
        <input type="text" name="meta_descr" id="meta_descr" size="94" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['meta_descr'];?>
" /><br/><br/>
        <div class="inline"><?php echo @constant('HEAD_ROBOTS');?>
</div>
        <select name="meta_robots">
            <option value=""> &nbsp; <?php echo @constant('HEAD_NOT_SELECT');?>
 &nbsp; </option>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrPageData']->value['robots']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <option value="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['robots'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
"<?php if ($_smarty_tpl->tpl_vars['item']->value['meta_robots']==$_smarty_tpl->tpl_vars['arrPageData']->value['robots'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]){?> selected<?php }?>> &nbsp; <?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['robots'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
 &nbsp; </option>
<?php endfor; endif; ?>
        </select>
    </td>
    <td class="buttons_row" valign="top" width="145" align="center">
        <!-- ++++++++++ Start Buttons ++++++++++++++++++++++++++++++++++++++++++++++ -->
        <?php echo $_smarty_tpl->getSubTemplate ('common/buttons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('itemID'=>$_smarty_tpl->tpl_vars['item']->value['id'],'task'=>$_smarty_tpl->tpl_vars['arrPageData']->value['task'],'deleteIDLimit'=>0), 0);?>

        <!-- ++++++++++ End Buttons ++++++++++++++++++++++++++++++++++++++++++++++++ -->
    </td>
</tr>
<tr>
    <td colspan="2">
        <strong><?php echo @constant('HEAD_SEO_DATA');?>
</strong><br/><br/>
        <div class="inline"><?php echo @constant('HEAD_SEO_TITLE');?>
</div>
        <input type="text" name="seo_title" id="seo_title" size="94" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['seo_title'];?>
"/><br/><br/>
        <div class="inline"><?php echo @constant('HEAD_SEO_PATH');?>
</div>
        <input type="text" size="48" name="seo_path" id="seo_path" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['seo_path'];?>
"/>
        <input type="button" value="<?php echo @constant('HEAD_GENERATE');?>
" style="float: right;  margin: 0 35px 0 0;" class="buttons" onclick="if(this.form.title.value.length==0){
            alert('<?php echo @constant('ALERT_EMPTY_PAGE_TITLE');?>
');
            this.form.title.focus();
            return false;
        } else {
            generateSeoPath(this.form.seo_path, this.form.title.value<?php if ($_smarty_tpl->tpl_vars['arrPageData']->value['module']=="catalog"){?>+'-'+this.form.pcode.value<?php }?>, '<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['module'];?>
'<?php if (isset($_smarty_tpl->tpl_vars['seoTable']->value)&&$_smarty_tpl->tpl_vars['item']->value['id']){?>, <?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
, '<?php echo $_smarty_tpl->tpl_vars['seoTable']->value;?>
'<?php }?>);
        }"/>
    </td>
    <td class="buttons_row">&nbsp;</td>
</tr>
<?php if (isset($_smarty_tpl->tpl_vars['item']->value['seo_text'])){?>
<tr>
    <td colspan="2">
        <strong><?php echo @constant('HEAD_SEO_TEXT');?>
</strong><br/><br/>
        <textarea name="seo_text" id="seoText" style="width: 100%; height: 250px;"><?php echo $_smarty_tpl->tpl_vars['item']->value['seo_text'];?>
</textarea>
    </td>
    <td class="buttons_row">&nbsp;</td>
</tr>
<?php }?><?php }} ?>