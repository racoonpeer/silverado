<!-- Items Start -->
<{* DISPLAY ITEM FIRST IF NOT EMPTY *}>
<{if !empty($item)}>
    <div><{$item.created|date_format:"%d.%m.%Y"}></div>
    <h2><{$item.title}></h2>
    <form method="POST" action="">
        <input type="image" name="pdf" src="/images/public/icons/pdf.png" value="1"/>
    </form>
    <br/>
    <{$item.fulldescr}>
    <a href="<{$arrPageData.backurl}>"><{$smarty.const.URL_BACK_TO_LIST}></a>

<{* DISPLAY ITEMS LIST IF NOT EMPTY *}>
<{elseif !empty($items)}>
    <table width="100%" cellspacing="0" cellpadding="0">
        <tbody>
<{section name=i loop=$items}>
            <tr>
                <td>
                    <div><{$items[i].created|date_format:"%d.%m.%Y"}></div>
                    <a href="<{include file='core/href_item.tpl' arCategory=$items[i].arCategory arItem=$items[i]}>">
                        <h3><{$items[i].title}></h3>
                    </a>
                    <{$items[i].descr}>
                    <a href="<{include file='core/href_item.tpl' arCategory=$items[i].arCategory arItem=$items[i]}>">
                        <{$smarty.const.BUTTON_MORE}>
                    </a>
                </td>
            </tr>
<{/section}>
        </tbody>
    </table>

<{if $arrPageData.total_pages>1}>
<!-- ++++++++++ Start PAGER ++++++++++++++++++++++++++++++++++++++++++++++++ -->
<{include file='core/pager.tpl' arrPager=$arrPageData.pager page=$arrPageData.page showTitle=0 showFirstLast=0 showPrevNext=1 showAll=1}>
<!-- ++++++++++ End PAGER ++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<{/if}>

<{* DISPLAY CATEGORY INFO *}>
<{else}>
<{include file='core/static.tpl'}>
<{/if}>
<!-- Items end-->
