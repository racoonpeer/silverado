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
<{*script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', '{��� ���}']);
    _gaq.push(['_trackPageview']);
    <{$trackingEcommerceJS}>
    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script*}>