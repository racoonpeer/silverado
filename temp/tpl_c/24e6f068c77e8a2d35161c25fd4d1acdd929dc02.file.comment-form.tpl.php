<?php /* Smarty version Smarty-3.1.14, created on 2017-11-11 11:15:22
         compiled from "tpl/frontend/smart/ajax/comment-form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19555615065a06bfaa727db7-29782447%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24e6f068c77e8a2d35161c25fd4d1acdd929dc02' => 
    array (
      0 => 'tpl/frontend/smart/ajax/comment-form.tpl',
      1 => 1508620422,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19555615065a06bfaa727db7-29782447',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'IS_AJAX' => 0,
    'result' => 0,
    'errors' => 0,
    'formData' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06bfaa90b190_07177316',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06bfaa90b190_07177316')) {function content_5a06bfaa90b190_07177316($_smarty_tpl) {?><?php if (!$_smarty_tpl->tpl_vars['IS_AJAX']->value){?>
<div class="comment-form hidden">
    <div class="h3">�������� ����� ��� ������� ������</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['result']->value&&$_smarty_tpl->tpl_vars['result']->value=="success"){?>
    <div class="f-result" id="commentResult">
        ������� �� ��� �����!<br/>
        ����� ����������� ��������� �� ����� ����������� �� ���� ��������
        <script type="text/javascript">
            setTimeout(function(){
                var div  = document.getElementById("commentResult"),
                    form = document.getElementById("commentForm");
                Comments.toggleForm();
                $(form).removeClass("hidden");
                $(div).remove();
            }, 3000);
        </script>
    </div>
<?php }?>
    <form action="" method="POST" id="commentForm" class="<?php if ($_smarty_tpl->tpl_vars['result']->value&&$_smarty_tpl->tpl_vars['result']->value=="success"){?>hidden<?php }?>">
        <label>�����������</label>
        <textarea name="descr" class="<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['descr'])){?>error<?php }?>"><?php if (isset($_smarty_tpl->tpl_vars['formData']->value['descr'])){?><?php echo $_smarty_tpl->tpl_vars['formData']->value['descr'];?>
<?php }?></textarea>
        <label>���� ���</label>
        <input type="text" name="title" value="<?php if (isset($_smarty_tpl->tpl_vars['formData']->value['title'])){?><?php echo $_smarty_tpl->tpl_vars['formData']->value['title'];?>
<?php }?>" class="<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['title'])){?>error<?php }?>"/>
        <label>��. �����</label>
        <input type="email" name="email" value="<?php if (isset($_smarty_tpl->tpl_vars['formData']->value['email'])){?><?php echo $_smarty_tpl->tpl_vars['formData']->value['email'];?>
<?php }?>" class="<?php if (isset($_smarty_tpl->tpl_vars['errors']->value['email'])){?>error<?php }?>"/>
        <div class="f-rating">
            <span></span>
            <input id="r5" type="radio" name="rating" value="5" <?php if (isset($_smarty_tpl->tpl_vars['formData']->value['rating'])&&$_smarty_tpl->tpl_vars['formData']->value['rating']==5){?>checked<?php }?>>
            <label title="" for="r5"></label>
            <input id="r4" type="radio" name="rating" value="4" <?php if (isset($_smarty_tpl->tpl_vars['formData']->value['rating'])&&$_smarty_tpl->tpl_vars['formData']->value['rating']==4){?>checked<?php }?>>
            <label title="" for="r4"></label>
            <input id="r3" type="radio" name="rating" value="3" <?php if (isset($_smarty_tpl->tpl_vars['formData']->value['rating'])&&$_smarty_tpl->tpl_vars['formData']->value['rating']==3){?>checked<?php }?>>
            <label title="" for="r3"></label>
            <input id="r2" type="radio" name="rating" value="2" <?php if (isset($_smarty_tpl->tpl_vars['formData']->value['rating'])&&$_smarty_tpl->tpl_vars['formData']->value['rating']==2){?>checked<?php }?>>
            <label title="" for="r2"></label>
            <input id="r1" type="radio" name="rating" value="1" <?php if (isset($_smarty_tpl->tpl_vars['formData']->value['rating'])&&$_smarty_tpl->tpl_vars['formData']->value['rating']==1){?>checked<?php }?>>
            <label title="" for="r1"></label>
        </div>
        <button type="submit" class="btn btn-l btn-danger btn-com">��������� �����</button>
        <input type="hidden" name="cid" value="<?php if (isset($_smarty_tpl->tpl_vars['formData']->value['cid'])){?><?php echo $_smarty_tpl->tpl_vars['formData']->value['cid'];?>
<?php }else{ ?>0<?php }?>"/>
        <input type="hidden" name="pid" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"/>
        <input type="hidden" name="module" value="catalog"/>
        <input type="hidden" name="comment" value="1"/>
    </form>
<?php if (!$_smarty_tpl->tpl_vars['IS_AJAX']->value){?>
    <a href="#" class="f-close" onclick="Comments.toggleForm();">&times;</a>
</div>
<?php }?><?php }} ?>