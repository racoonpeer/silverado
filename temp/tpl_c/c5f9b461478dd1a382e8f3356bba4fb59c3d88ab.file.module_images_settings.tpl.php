<?php /* Smarty version Smarty-3.1.14, created on 2017-11-14 21:30:45
         compiled from "tpl/backend/weblife/common/module_images_settings.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10116001145a0b44655213e0-98512454%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5f9b461478dd1a382e8f3356bba4fb59c3d88ab' => 
    array (
      0 => 'tpl/backend/weblife/common/module_images_settings.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10116001145a0b44655213e0-98512454',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arImages' => 0,
    'module' => 0,
    'index' => 0,
    'aliases' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a0b446583f406_24589224',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a0b446583f406_24589224')) {function content_5a0b446583f406_24589224($_smarty_tpl) {?><div class="image">
    <div class="right add_image">
        <input class="image_title" type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['arImages']->value['title'])){?><?php echo $_smarty_tpl->tpl_vars['arImages']->value['title'];?>
<?php }?>" name="arModulesImg[<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
][title]" placeholder="краткое название"/><br/><br/>
        <input class="column_name" type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['arImages']->value['column'])){?><?php echo $_smarty_tpl->tpl_vars['arImages']->value['column'];?>
<?php }?>" name="arModulesImg[<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
][column]" placeholder="колонка"/><br/><br/>
        <input class="parent_table" type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['arImages']->value['ptable'])){?><?php echo $_smarty_tpl->tpl_vars['arImages']->value['ptable'];?>
<?php }?>" name="arModulesImg[<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
][ptable]" placeholder="родительская таблица (имя константы)"/><br/><br/>
        <input class="files_table"  type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['arImages']->value['ftable'])){?><?php echo $_smarty_tpl->tpl_vars['arImages']->value['ftable'];?>
<?php }?>" name="arModulesImg[<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
][ftable]" placeholder="таблица для файлов (имя константы)"/><br/><br/>
        <input type="button" class="buttons right" value="Удалить изображение" onclick="removeImage(this);"/><br/>
    </div>

    <div class="left">
        <table border="1" cellspacing="1" cellpadding="1" style="width:auto" class="list user"> 
            <tr>
                <td id="headb" width="31"  align="center">Вкл</td>
                <td id="headb" width="40"  align="left">Размер</td>
                <td id="headb" width="100" align="center">Ширина</td>
                <td id="headb" width="100" align="center">Высота</td>
                <td id="headb" width="100" align="center">Заливка</td>
            </tr>

            <tr>
                <td width="31" ></td>
                <td width="130">параметры сжатия</td>
                <td width="100"  align="center">
                    <input type="text" class="nosize_field" 
                           name="arModulesImg[<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
][max_width]" size="10" value="<?php if (isset($_smarty_tpl->tpl_vars['arImages']->value['max_width'])){?><?php echo $_smarty_tpl->tpl_vars['arImages']->value['max_width'];?>
<?php }?>" /> px
                </td>
                <td width="100"  align="center">
                    <input type="text" class="nosize_field" 
                           name="arModulesImg[<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
][max_height]" size="10" value="<?php if (isset($_smarty_tpl->tpl_vars['arImages']->value['max_height'])){?><?php echo $_smarty_tpl->tpl_vars['arImages']->value['max_height'];?>
<?php }?>"/> px
                </td>
                <td width="100"  align="center" ></td>
            </tr>
            
            <tr> 
                <td width="31" align="center"></td>
                <td width="40"> параметры обрезки</td>
                <td width="100" align="center">
                    <input type="text" class="nosize_field crop width" size="10" value="<?php if (isset($_smarty_tpl->tpl_vars['arImages']->value['crop_width'])){?><?php echo $_smarty_tpl->tpl_vars['arImages']->value['crop_width'];?>
<?php }?>"
                           name="arModulesImg[<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
][crop_width]"/> px 
                </td>
                <td width="100" align="center">
                    <input type="text" class="nosize_field crop height" size="10" value="<?php if (isset($_smarty_tpl->tpl_vars['arImages']->value['crop_height'])){?><?php echo $_smarty_tpl->tpl_vars['arImages']->value['crop_height'];?>
<?php }?>"
                           name="arModulesImg[<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
][crop_height]"/> px 
                </td>
                <td width="100" align="center">
                        #<input type="text" size="10" class="nosize_field" value="<?php if (isset($_smarty_tpl->tpl_vars['arImages']->value['crop_color'])){?><?php echo $_smarty_tpl->tpl_vars['arImages']->value['crop_color'];?>
<?php }?>"
                            name="arModulesImg[<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
][crop_color]" />
                </td>
            </tr>
            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['aliases']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
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
                <tr> 
                    <td width="31" align="center">
                        <input type="checkbox" <?php if (isset($_smarty_tpl->tpl_vars['arImages']->value['aliases'])&&array_key_exists($_smarty_tpl->tpl_vars['aliases']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']],$_smarty_tpl->tpl_vars['arImages']->value['aliases'])){?>checked<?php }?> class="nosize_field disable_params" onclick="toogleParams(this)"/>
                    </td>
                    <td width="40">
                        <?php echo $_smarty_tpl->tpl_vars['aliases']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>

                    </td>
                    <td width="100" align="center">
                        <input type="text" class="nosize_field param width" size="10"  value="<?php if (isset($_smarty_tpl->tpl_vars['arImages']->value['aliases'])&&array_key_exists($_smarty_tpl->tpl_vars['aliases']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']],$_smarty_tpl->tpl_vars['arImages']->value['aliases'])){?><?php echo $_smarty_tpl->tpl_vars['arImages']->value['aliases'][$_smarty_tpl->tpl_vars['aliases']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]]['width'];?>
<?php }?>"
                               name="arModulesImg[<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
][arMiniatures][<?php echo $_smarty_tpl->tpl_vars['aliases']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
][width]"/> px 
                    </td>
                    <td width="100" align="center">
                        <input type="text" class="nosize_field param height" size="10" value="<?php if (isset($_smarty_tpl->tpl_vars['arImages']->value['aliases'])&&array_key_exists($_smarty_tpl->tpl_vars['aliases']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']],$_smarty_tpl->tpl_vars['arImages']->value['aliases'])){?><?php echo $_smarty_tpl->tpl_vars['arImages']->value['aliases'][$_smarty_tpl->tpl_vars['aliases']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]]['height'];?>
<?php }?>"
                               name="arModulesImg[<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
][arMiniatures][<?php echo $_smarty_tpl->tpl_vars['aliases']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
][height]"/> px 
                    </td>
                    <td width="100" align="center"></td>
                </tr>
            <?php endfor; endif; ?>
        </table>
    </div>
    <div class="clear"></div>
</div>

<script type="text/javascript">
    $.each($('.tabsContainer').find('.disable_params'), function() {
        toogleParams(this);
    });
    
    $.each($('.crop'), function() {
        $(this).on('keyup', function() {
            $.each($(this).closest('table').find('.param'), function() {
                recalcRatio($(this));
            });
        });
    });       
    
    $.each($('.param'), function() {
        $(this).on('keyup', function() {
            recalcRatio($(this));
        });
    });
    
    function toogleParams(cb){
        if(!cb.checked) {
            $(cb).closest('tr').find('.param').prop('disabled', true);
        } else {
            $(cb).closest('tr').find('.param').prop('disabled', false);
        }
    }
</script><?php }} ?>