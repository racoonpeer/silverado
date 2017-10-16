<?php /* Smarty version Smarty-3.1.14, created on 2017-10-14 13:22:45
         compiled from "tpl\frontend\smart\ajax\filter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1738359e1e57535d6c3-57220298%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93f153294352056bbee8710c2058738933db8c33' => 
    array (
      0 => 'tpl\\frontend\\smart\\ajax\\filter.tpl',
      1 => 1507971576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1738359e1e57535d6c3-57220298',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arrPageData' => 0,
    'filter' => 0,
    'filterID' => 0,
    'arKey' => 0,
    'arItem' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59e1e575aa4cf8_86096712',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e1e575aa4cf8_86096712')) {function content_59e1e575aa4cf8_86096712($_smarty_tpl) {?><div class="filters">
<?php  $_smarty_tpl->tpl_vars['filter'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['filter']->_loop = false;
 $_smarty_tpl->tpl_vars['filterID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arrPageData']->value['filters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['filter']->key => $_smarty_tpl->tpl_vars['filter']->value){
$_smarty_tpl->tpl_vars['filter']->_loop = true;
 $_smarty_tpl->tpl_vars['filterID']->value = $_smarty_tpl->tpl_vars['filter']->key;
?>
<?php if (!empty($_smarty_tpl->tpl_vars['filter']->value['children'])){?>
    <div class="section <?php if ($_smarty_tpl->tpl_vars['filter']->value['type']=='price'){?>price-filter<?php }?>" id="filter_<?php echo $_smarty_tpl->tpl_vars['filterID']->value;?>
">
        <h4><?php echo $_smarty_tpl->tpl_vars['filter']->value['title'];?>
</h4>

<?php if ($_smarty_tpl->tpl_vars['filter']->value['type']=='price'){?>
        <div class="price-slider">
            <div id="slider_range" data-url="<?php echo $_smarty_tpl->tpl_vars['filter']->value['children']['url'];?>
" data-masks="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter']->value['children']['masks'], ENT_QUOTES, 'UTF-8', true);?>
" data-selected="<?php if ($_smarty_tpl->tpl_vars['filter']->value['children']['selected']['min']||$_smarty_tpl->tpl_vars['filter']->value['children']['selected']['max']){?>1<?php }else{ ?>0<?php }?>"></div>
        </div>
        <p><span id="slider_min">0</span> - <span id="slider_max">450</span> грн</p>
        <script type="text/javascript">
            window.addEventListener("DOMContentLoaded", initPriceSlider, false);
            function initPriceSlider (timeout) {
                timeout = timeout||100;
                if (typeof jQuery != "undefined" && typeof noUiSlider != "undefined") {
                    // Price range slider
                    var slider_range = document.getElementById("slider_range"),
                        slider_min   = document.getElementById("slider_min"),
                        slider_max   = document.getElementById("slider_max");
                    noUiSlider.create(slider_range, {
                        start: [
                            <?php if ($_smarty_tpl->tpl_vars['filter']->value['children']['selected']['min']){?><?php echo round($_smarty_tpl->tpl_vars['filter']->value['children']['selected']['min']);?>
<?php }else{ ?><?php echo round($_smarty_tpl->tpl_vars['filter']->value['children']['min']);?>
<?php }?>,
                            <?php if ($_smarty_tpl->tpl_vars['filter']->value['children']['selected']['max']){?><?php echo round($_smarty_tpl->tpl_vars['filter']->value['children']['selected']['max']);?>
<?php }else{ ?><?php echo round($_smarty_tpl->tpl_vars['filter']->value['children']['max']);?>
<?php }?>
                        ],
                        connect: true,
                        range: {
                            min: parseInt(<?php echo round($_smarty_tpl->tpl_vars['filter']->value['children']['min']);?>
),
                            max: parseInt(<?php echo round($_smarty_tpl->tpl_vars['filter']->value['children']['max']);?>
)
                        }
                    });
                    slider_range.noUiSlider.on("update", function (values, handle) {
                        var value = values[handle];
                        if (handle) {
                            slider_max.innerText = Math.ceil(value);
                        } else {
                            slider_min.innerText = Math.floor(value);
                        }
                    });
                    slider_range.noUiSlider.on("change", function () {
                        window.location.href = createPriceUrl($(slider_range));
                    });
                } else setTimeout("initPriceSlider", timeout);
            }
            function createPriceUrl(obj) {
                var slider_min = document.getElementById("slider_min"),
                    slider_max = document.getElementById("slider_max"),
                    masks      = obj.data('masks'),
                    url        = decodeURIComponent(obj.data('url')),
                    min        = parseInt(slider_min.innerHTML),
                    max        = parseInt(slider_max.innerHTML);
                url = url.replace(masks['<?php echo UrlFiltersRange::KEY_MIN;?>
'], min);
                if ((max*1) == 0) url = url.replace(masks['<?php echo UrlFiltersRange::KEY_SEP_MAX;?>
'], '');
                url = url.replace(masks['<?php echo UrlFiltersRange::KEY_MAX;?>
'], max);
                return url;
            }
        </script>

<?php }elseif($_smarty_tpl->tpl_vars['filter']->value['type']=='brand'||$_smarty_tpl->tpl_vars['filter']->value['type']=='category'){?>
        <ul>
<?php  $_smarty_tpl->tpl_vars['arItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['arItem']->_loop = false;
 $_smarty_tpl->tpl_vars['arKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['filter']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['arItem']->key => $_smarty_tpl->tpl_vars['arItem']->value){
$_smarty_tpl->tpl_vars['arItem']->_loop = true;
 $_smarty_tpl->tpl_vars['arKey']->value = $_smarty_tpl->tpl_vars['arItem']->key;
?>
            <?php echo $_smarty_tpl->getSubTemplate ("ajax/_filter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('fid'=>$_smarty_tpl->tpl_vars['filterID']->value,'aid'=>$_smarty_tpl->tpl_vars['arKey']->value,'value'=>'id','title'=>'title','item'=>$_smarty_tpl->tpl_vars['arItem']->value,'template'=>$_smarty_tpl->tpl_vars['filter']->value['template']), 0);?>

<?php } ?>
        </ul>

<?php }elseif($_smarty_tpl->tpl_vars['filter']->value['type']=='range'){?>   
        <ul>
<?php  $_smarty_tpl->tpl_vars['arItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['arItem']->_loop = false;
 $_smarty_tpl->tpl_vars['arKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['filter']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['arItem']->key => $_smarty_tpl->tpl_vars['arItem']->value){
$_smarty_tpl->tpl_vars['arItem']->_loop = true;
 $_smarty_tpl->tpl_vars['arKey']->value = $_smarty_tpl->tpl_vars['arItem']->key;
?>
            <?php echo $_smarty_tpl->getSubTemplate ("ajax/_filter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('fid'=>$_smarty_tpl->tpl_vars['filterID']->value,'aid'=>$_smarty_tpl->tpl_vars['arKey']->value,'value'=>'alias','title'=>'title','item'=>$_smarty_tpl->tpl_vars['arItem']->value,'template'=>$_smarty_tpl->tpl_vars['filter']->value['template']), 0);?>
 
<?php } ?>
        </ul>

<?php }else{ ?>
        <ul>
<?php  $_smarty_tpl->tpl_vars['arItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['arItem']->_loop = false;
 $_smarty_tpl->tpl_vars['arKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['filter']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['arItem']->key => $_smarty_tpl->tpl_vars['arItem']->value){
$_smarty_tpl->tpl_vars['arItem']->_loop = true;
 $_smarty_tpl->tpl_vars['arKey']->value = $_smarty_tpl->tpl_vars['arItem']->key;
?>
            <?php echo $_smarty_tpl->getSubTemplate ("ajax/_filter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('fid'=>$_smarty_tpl->tpl_vars['filterID']->value,'aid'=>$_smarty_tpl->tpl_vars['arKey']->value,'value'=>'alias','title'=>'title','item'=>$_smarty_tpl->tpl_vars['arItem']->value,'template'=>$_smarty_tpl->tpl_vars['filter']->value['template']), 0);?>

<?php } ?>
        </ul>
<?php }?>
    </div>
<?php }?> 
<?php } ?>
</div><?php }} ?>