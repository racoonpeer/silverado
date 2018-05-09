<?php /* Smarty version Smarty-3.1.14, created on 2018-05-09 14:17:41
         compiled from "tpl/frontend/smart/module/measure.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20624498925aef43687a9b81-74909844%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36940d65baa3d1114491e32b99cbb518c29adca3' => 
    array (
      0 => 'tpl/frontend/smart/module/measure.tpl',
      1 => 1525864125,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20624498925aef43687a9b81-74909844',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5aef43687f2bd6_73899729',
  'variables' => 
  array (
    'arCategory' => 0,
    'arrModules' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aef43687f2bd6_73899729')) {function content_5aef43687f2bd6_73899729($_smarty_tpl) {?><h2 class="measure-info-title"><?php echo $_smarty_tpl->tpl_vars['arCategory']->value['title'];?>
</h2>
<div class="measure-info"><?php echo $_smarty_tpl->tpl_vars['arCategory']->value['text'];?>
</div>
<div class="measure-calculator">
    <form action="<?php echo $_smarty_tpl->getSubTemplate ("core/href.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['arrModules']->value['measure']), 0);?>
" method="POST" id="ajaxCalcForm">
        <label class="f-label">Длина окружности пальца (мм)</label>
        <input type="text" name="round"/>
        <input type="radio" class="hidden" name="width" id="widthThin" value="thin" checked/>
        <label class="radiobox" for="widthThin">Тонкое кольцо (до 5 мм.)</label><br/>
        <input type="radio" class="hidden" name="width" id="widthThick" value="thick"/>
        <label class="radiobox" for="widthThick">Широкое кольцо (5 мм. и более)</label>
        <button class="btn btn-l btn-danger btn-block">Рассчитать</button>
    </form>
    <div class="result hidden"></div>
</div>
<script type="text/javascript">
    $(function(){
        var Form = $("#ajaxCalcForm");
        Form.ajaxForm({
            dataType: "json",
            success: function(json){
                if (json.errors) {
                    for (var key in json.errors) {
                        Form.find("input[name=\"" + key + "\"]").addClass("error");
                    }
                } else if (json.result) {
                    Form.next(".result").removeClass("hidden").text(json.result);
                }
            },
            beforeSubmit: function(){
                Form.find("input").removeClass("error");
                Form.next(".result").addClass("hidden").text("");
            }
        });
    });
</script><?php }} ?>