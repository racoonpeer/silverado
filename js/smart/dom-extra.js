function replaceSeoText (timeout) {
    timeout = timeout||100;
    if (typeof jQuery != "undefined") {
        var source = $("#seo_text"),
            target = $(".seo-text-container");
        target.html(source);
    } else {
        setTimeout(replaceSeoText, timeout);
    }
}

setTimeout(replaceSeoText, 100);