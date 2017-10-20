<?php /* Smarty version Smarty-3.1.14, created on 2017-10-17 22:23:36
         compiled from "tpl/frontend/smart/core/head.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5604324459e658b8583378-25753125%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '304bee3444d4ec425a2eeb78771cc459813bc25d' => 
    array (
      0 => 'tpl/frontend/smart/core/head.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5604324459e658b8583378-25753125',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'arrLangs' => 0,
    'arCategory' => 0,
    'HTMLHelper' => 0,
    'item' => 0,
    'objSettingsInfo' => 0,
    'UrlWL' => 0,
    'arrPageData' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59e658b8704044_55002118',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e658b8704044_55002118')) {function content_59e658b8704044_55002118($_smarty_tpl) {?><head>
<!--[if false]>
                                      MMM                                       
                                      MMM                                       
                                      MMM                                       
                         MM           MMM           MM.                         
                        ,MMMM         MMM        .NMMM.                         
                          MMMM        MMM       .MMMM                           
                           MMMMM      $MM      MMMMM                            
                           . MMMM             MMMM.                             
                              ZMM            .MMO                               
                                                                                    
             MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM.             
            MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM:.           
          DMMMMMMMM               .MMMM~MMMM.                MMM~MMMM           
         MMMM   MMMZ            .NMMMM  .MMMMM              MMMD  MMMM .        
        MMMM.   .MMMD          .MMMM..   ..MMMMD           MMMO   .NMMMM        
      MMMM=      .MMMN        MMMMM         +MMMM         MMM7       MMMM       
    .MMMM.        .MMM=.    ,MMMM             MMMMM    . MMM+        .MMMM+.    
   =MMMM.           MMM.   MMMMM                MMMM   .MMMM           7MMMM    
  MMMM.             .MMM,.MMMM.                  MMMMM MMMM             .MMMM   
 MMMM.               .MMMMMMI                     .MMMMMMM                MMMMD 
MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM.
..MMMM                  MMM                                              NMMMM  
 ..MMMM                 $MMM.                                           MMMM.   
   .MMMMD                MMM .                     MMM               . MMMM     
     .MMMM               =MMM                      DMM              .8MMMD      
      .MMMM.              MMMZ                                      MMMM.       
       .~MMMM              MMM                    +               .MMMM .       
          MMMM             MMMM                 .MMM.            MMMM+          
          .MMMMM.           MMM.                MMMM.           MMMM            
            IMMMM          .MMMM                MMM           ?MMMM             
             .MMMM.         .MMM               MMMN          MMMM               
               $MMMN         ~MMM             ,MMM          MMMM                
                 MMMM         MMMZ           .MMM         MMMM8                 
                  MMMM,       .MMM           MMMM.      .MMMM.                  
                   :MMMM      .MMMM          MMM       ZMMMM.                   
                     MMMM.      MMM.        MMMM.     MMMM:                     
                      MMMM$ .   MMMM       .MMM    ..MMMM                       
                      . MMMM     MMM       MMM7.  .MMMMM.                       
                        .MMMM    ~MMM    .7MMM    MMMM.                         
                          7MMMM ..MMMZ    MMM.  =MMMM                           
                            MMMM.. MMM   MMMM. MMMM,                            
                             MMMMD MMMN .MMM. MMMM                              
                              ,MMMM MMM.MMMMDMMMM                               
                               .MMMMNMMMMMMMMMM,.                               
                                 NMMMMMMMMMMMM                                  
                                   MMMMMMMMM~                                   
                                    MMMMMMM                                     
                                    . MMMM                                      
                                      .N                                        
<!-- <![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['arrLangs']->value[$_smarty_tpl->tpl_vars['lang']->value]['charset'];?>
"/>
    <title><?php echo $_smarty_tpl->tpl_vars['HTMLHelper']->value->prepareHeadTitle($_smarty_tpl->tpl_vars['arCategory']->value);?>
</title>
    <meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['arCategory']->value['meta_key'];?>
"/>
    <meta name="description" content="<?php echo unScreenData($_smarty_tpl->tpl_vars['arCategory']->value['meta_descr']);?>
"/>
<?php if ($_smarty_tpl->tpl_vars['arCategory']->value['module']=="catalog"&&!empty($_smarty_tpl->tpl_vars['item']->value)){?>
    <meta property="og:type" content="product"/>
    <meta property="og:image" content="//<?php echo ($_SERVER['HTTP_HOST']).($_smarty_tpl->tpl_vars['item']->value['image']['big_image']);?>
">
<?php }?>
    <meta property="og:site_name" content="<?php echo $_smarty_tpl->tpl_vars['objSettingsInfo']->value->websiteName;?>
"/>
    <meta property="og:url" content="<?php echo $_smarty_tpl->tpl_vars['UrlWL']->value->getUrl();?>
"/>
    <meta property="og:title" content="<?php echo $_smarty_tpl->tpl_vars['HTMLHelper']->value->prepareHeadTitle($_smarty_tpl->tpl_vars['arCategory']->value);?>
"/>
    <meta property="og:description" content="<?php echo unScreenData($_smarty_tpl->tpl_vars['arCategory']->value['meta_descr']);?>
">
<?php if ($_smarty_tpl->tpl_vars['arCategory']->value['meta_robots']){?>
    <meta name="robots" content="<?php echo $_smarty_tpl->tpl_vars['arCategory']->value['meta_robots'];?>
"/>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['objSettingsInfo']->value->logo){?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi">
    <link rel="apple-touch-icon" sizes="120x120" href="/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/icons/favicon-16x16.png">
    <link rel="manifest" href="/images/icons/manifest.json">
    <link rel="mask-icon" href="/images/icons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrPageData']->value['headCss']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    <link href="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['headCss'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
" type="text/css" rel="stylesheet"/>
<?php endfor; endif; ?>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrPageData']->value['headScripts']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['arrPageData']->value['headScripts'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
"></script>
<?php endfor; endif; ?>
    <?php echo $_smarty_tpl->getSubTemplate ('core/header-extra.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</head><?php }} ?>