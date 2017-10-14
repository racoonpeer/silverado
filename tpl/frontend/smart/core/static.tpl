<div class="page-body-content">
    <h2><{$arCategory.title}></h2>
    <{if !empty($arCategory.text)}>
        <{$arCategory.text}>
    <{else}>
        <br /><br /><br />
        <center><{$smarty.const.NO_CONTENT}></center>
    <{/if}>
</div>