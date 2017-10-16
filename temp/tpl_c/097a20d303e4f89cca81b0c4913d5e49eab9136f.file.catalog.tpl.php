<?php /* Smarty version Smarty-3.1.14, created on 2017-10-16 16:56:46
         compiled from "tpl\frontend\smart\module\catalog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:457359e49253be7520-76478777%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '097a20d303e4f89cca81b0c4913d5e49eab9136f' => 
    array (
      0 => 'tpl\\frontend\\smart\\module\\catalog.tpl',
      1 => 1508162203,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '457359e49253be7520-76478777',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59e492544474d2_07440695',
  'variables' => 
  array (
    'arrPageData' => 0,
    'item' => 0,
    'HTMLHelper' => 0,
    'arItem' => 0,
    'items' => 0,
    'arCategory' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e492544474d2_07440695')) {function content_59e492544474d2_07440695($_smarty_tpl) {?><div class="page-container container clearfix">
    <?php echo $_smarty_tpl->getSubTemplate ('core/breadcrumb.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arrBreadCrumb'=>$_smarty_tpl->tpl_vars['arrPageData']->value['arrBreadCrumb']), 0);?>


<?php if (!empty($_smarty_tpl->tpl_vars['item']->value)){?>
    <div class="product-card clearfix">
        <div class="product-details">
<?php if ($_smarty_tpl->tpl_vars['item']->value['comments_count']>0){?>
            <div class="reviews">
                <div class="rating v-<?php echo $_smarty_tpl->tpl_vars['item']->value['rating'];?>
"></div>
                <a href="#reviews"><?php echo $_smarty_tpl->tpl_vars['item']->value['comments_count'];?>
 <?php echo $_smarty_tpl->tpl_vars['HTMLHelper']->value->getNumEnding($_smarty_tpl->tpl_vars['item']->value['comments_count'],array("отзыв","отзыва","отзывов"));?>
</a>
            </div>
<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['attrGroups'])){?>
            <ul class="attributes">
                <li><strong>Код товара:</strong> <?php echo $_smarty_tpl->tpl_vars['item']->value['pcode'];?>
</li>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['item']->value['attrGroups']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['attrGroups'][$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['i']['index']]['attributes'])){?>
<?php  $_smarty_tpl->tpl_vars['arItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['arItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['attrGroups'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['attributes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['arItem']->key => $_smarty_tpl->tpl_vars['arItem']->value){
$_smarty_tpl->tpl_vars['arItem']->_loop = true;
?>
                <li><strong><?php echo $_smarty_tpl->tpl_vars['arItem']->value['title'];?>
:</strong> <?php echo implode($_smarty_tpl->tpl_vars['arItem']->value['values'],', ');?>
</li>
<?php } ?>
<?php }?>
<?php endfor; endif; ?>
            </ul>
<?php }?>
            <div class="share">
                <a href="#" class="fb" onclick="Share.facebook(location.href, document.title, 'http://<?php echo ($_SERVER['HTTP_HOST']).($_smarty_tpl->tpl_vars['item']->value['image']['big_image']);?>
');"></a>
                <a href="#" class="gp" onclick="Share.vkontakte(location.href, document.title, 'http://<?php echo ($_SERVER['HTTP_HOST']).($_smarty_tpl->tpl_vars['item']->value['image']['big_image']);?>
');"></a>
                <a href="#" class="tw" onclick="Share.twitter(location.href, document.title);"></a>
            </div>
        </div>
        <?php echo $_smarty_tpl->getSubTemplate ("core/product-gallery.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="product-flypage details clearfix">
            <?php echo $_smarty_tpl->getSubTemplate ("core/product-sticker.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <h1 class="product-title"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
 <?php echo $_smarty_tpl->tpl_vars['item']->value['pcode'];?>
</h1>
            <div class="product-descr"><?php echo $_smarty_tpl->tpl_vars['item']->value['descr'];?>
</div>
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
    </div>
<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['kits'])){?>
    <div class="clearfix"></div>
    <?php echo $_smarty_tpl->getSubTemplate ("core/product-kit.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arItems'=>$_smarty_tpl->tpl_vars['item']->value['kits']), 0);?>

<?php }elseif(!empty($_smarty_tpl->tpl_vars['item']->value['elements'])){?>
    <div class="hr clearfix"></div>
    <?php echo $_smarty_tpl->getSubTemplate ("core/product-selections.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arItems'=>$_smarty_tpl->tpl_vars['item']->value['elements'],'title'=>"Товары в комплекте"), 0);?>

<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['related'])){?>
    <div class="hr clearfix"></div>
    <?php echo $_smarty_tpl->getSubTemplate ("core/product-selections.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arItems'=>$_smarty_tpl->tpl_vars['item']->value['related'],'title'=>"Похожие модели"), 0);?>

<?php }?>
    <div class="clearfix">
        <div class="product-reviews" id="reviews">
            <div class="h1">Отзывы о товаре <em><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['pcode'])){?> <?php echo $_smarty_tpl->tpl_vars['item']->value['pcode'];?>
<?php }?></em></div>
            <?php echo $_smarty_tpl->getSubTemplate ('ajax/comment-form.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('item'=>$_smarty_tpl->tpl_vars['item']->value,'formData'=>array(),'errors'=>array(),'result'=>false,'ajax'=>false), 0);?>

            <button class="form-toggle btn btn-danger btn-l" onclick="Comments.toggleForm();">Оставить отзыв</button>
            <div class="list" id="commentList"></div>
            <script type="text/javascript">
                function initLoadComments (timeout) {
                    if (typeof jQuery != "undefined" && typeof Comments != "undefined")  {
                        Comments.construct();
                        Comments.load("<?php echo $_smarty_tpl->getSubTemplate ("core/href_item.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['item']->value['arCategory'],'arItem'=>$_smarty_tpl->tpl_vars['item']->value,'params'=>"action=loadComments"), 0);?>
");
                    } else setTimeout(function(){
                        initLoadComments (timeout);
                    }, timeout);
                }
                initLoadComments(100);
            </script>
        </div>
    </div>

<?php }elseif(!empty($_smarty_tpl->tpl_vars['items']->value)){?>
    <h1 class="heading-title"><?php echo $_smarty_tpl->tpl_vars['arCategory']->value['title'];?>
</h1>
    <div class="controlbar clearfix">
        <?php echo $_smarty_tpl->getSubTemplate ("ajax/control_filter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ("ajax/control_limit.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ("ajax/control_sort.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="selected-filters" id="selectedFilters">
            <?php echo $_smarty_tpl->getSubTemplate ('ajax/selected_filters.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </div>
    <div class="pull-left column-left" id="filtersForm">
        <?php echo $_smarty_tpl->getSubTemplate ('ajax/filter.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
    <div class="pull-right product-grid clearfix" id="products">
        <?php echo $_smarty_tpl->getSubTemplate ('ajax/products.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('items'=>$_smarty_tpl->tpl_vars['items']->value), 0);?>

    </div>

<?php }else{ ?>
    <?php echo $_smarty_tpl->getSubTemplate ('core/static.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>
</div><?php }} ?>