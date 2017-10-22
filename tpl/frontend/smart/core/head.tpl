<head>
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
    <meta http-equiv="Content-Type" content="text/html; charset=<{$arrLangs.$lang.charset}>"/>
    <title><{$HTMLHelper->prepareHeadTitle($arCategory)}></title>
    <meta name="keywords" content="<{$arCategory.meta_key}>"/>
    <meta name="description" content="<{$arCategory.meta_descr|unScreenData}>"/>
<{if $arCategory.module=="catalog" AND !empty($item)}>
    <meta property="og:type" content="product"/>
    <meta property="og:image" content="//<{$smarty.server.HTTP_HOST|cat:$item.image.big_image}>">
<{/if}>
    <meta property="og:site_name" content="<{$objSettingsInfo->websiteName}>"/>
    <meta property="og:url" content="<{$UrlWL->getUrl()}>"/>
    <meta property="og:title" content="<{$HTMLHelper->prepareHeadTitle($arCategory)}>"/>
    <meta property="og:description" content="<{$arCategory.meta_descr|unScreenData}>">
<{if $arCategory.meta_robots}>
    <meta name="robots" content="<{$arCategory.meta_robots}>" id="meta_robots"/>
<{/if}>
<{if $objSettingsInfo->logo}>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi">
    <link rel="apple-touch-icon" sizes="120x120" href="/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/icons/favicon-16x16.png">
    <link rel="manifest" href="/images/icons/manifest.json">
    <link rel="mask-icon" href="/images/icons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
<{/if}>
<{section name=i loop=$arrPageData.headCss}>
    <link href="<{$arrPageData.headCss[i]}>" type="text/css" rel="stylesheet"/>
<{/section}>
<{section name=i loop=$arrPageData.headScripts}>
    <script type="text/javascript" src="<{$arrPageData.headScripts[i]}>"></script>
<{/section}>
    <{include file='core/header-extra.tpl'}>
</head>