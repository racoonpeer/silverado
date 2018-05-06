function replaceSeoText (timeout) {
    timeout = timeout||100;
    if (typeof jQuery != "undefined") {
        var source = $(".seo-text"),
            target = $(".seo-text-container");
        target.prepend(source);
        target.on("click", ".readmore", function(e){
            e.preventDefault();
            source.toggleClass("expanded");
        });
    } else {
        setTimeout(replaceSeoText, timeout);
    }
}

setTimeout(replaceSeoText, 100);