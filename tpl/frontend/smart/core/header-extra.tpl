<script type="text/javascript">
    function initBasket (timeout) {
        if (typeof jQuery != "undefined" && typeof Basket != "undefined") {
            Basket.setUrl("<{include file="core/href.tpl" arCategory=$arrModules.basket}>");
        } else {
            setTimeout(function(){
                initBasket(timeout);
            }, timeout);
        }
    } initBasket(100);
</script>
<{*<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="//www.googletagmanager.com/gtag/js?id=UA-111714543-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-111714543-1');
</script>*}>
<{if !$IS_DEV}>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-111714543-1', 'auto');
    ga('require', 'displayfeatures');
    ga('send', 'pageview');
</script>
<{/if}>
<{$trackingEcommerceJS}>