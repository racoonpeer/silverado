<{if ($arCategory.module=="home" or ($arCategory.module=="catalog" and empty($item))) and !empty($arCategory.seo_text)}>
<div class="seo-text"><{$arCategory.seo_text}></div>
<{/if}>