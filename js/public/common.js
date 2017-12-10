/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var objBasket = new CBasket(),
    Basket = objBasket.init(),
    objModal = new CModal(),
    Modal = objModal.init();
    
Modernizr.Detectizr.detect({
    // option for enabling HTML classes of all features (not only the true features) to be added
    addAllFeaturesAsClass: false,
    // option for enabling detection of device
    detectDevice: true,
    // option for enabling detection of device model
    detectDeviceModel: true,
    // option for enabling detection of screen size
    detectScreen: true,
    // option for enabling detection of operating system type and version
    detectOS: true,
    // option for enabling detection of browser type and version
    detectBrowser: true,
    // option for enabling detection of common browser plugins
    detectPlugins: true
});

$(function(){
    // clear event on anchor links
    $(document).delegate("a", "click", function (e) {
        var href = $(this).attr("href"),
            rexp = new RegExp("^\#([A-z0-9]+)?");
        if (href.match(rexp)!==null) {
            e.preventDefault();
            if (href.length > 1) {
                var anchor = href.substring(1),
                    target = document.getElementById(anchor);
                if ($(target).length) {
                    var offset = $(target).offset();
                    $("html, body").animate({
                        scrollTop: Math.floor(offset.top - 100)
                    }, 400);
                }
            }
        }
    });
    // Init slidebar
    var sb_controller = new slidebars();
    sb_controller.init();
    // Init modal
    Modal.construct();
    // Scroll-top button
    $(window).on("scroll", function() {
        var a = $(".scroll-top"),
            sh = window.pageYOffset || document.documentElement.scrollTop,
            dh = Math.max(
                document.body.scrollHeight, document.documentElement.scrollHeight,
                document.body.offsetHeight, document.documentElement.offsetHeight,
                document.body.clientHeight, document.documentElement.clientHeight
            );
        if (sh >= Math.floor(dh/3)) a.addClass("scroll-on");
        else a.removeClass("scroll-on");
    });
    $(".scroll-top").on("click", function(){
        $("html, body").animate({
            scrollTop: 0
        }, 400);
    });
    // Lazy load images
    LazyLoadImages();
    // Init basket
    Basket.construct();
    // toggle mobile menu
    $(".header-container").on("click", ".btn-nav", function(){
        sb_controller.toggle("mobile-menu");
        $(this).toggleClass("cross");
        if (sb_controller.getActiveSlidebar()) $("html,body").addClass("noscroll");
        else $("html,body").removeClass("noscroll");
    });
    // Change options
    $(document).on("change", ".product-flypage .options input", function(){
        var label = $(this).closest(".options").find(".option-label"),
            text  = $(this).data("label"),
            checked = $(this).is(":checked");
        if (checked) label.text(text);
    });
    // Selections
    var selections = $(".selections");
    if (selections.length) {
        $.map(selections, function(selection){
            var $slick = $(selection).find(".slick-ready");
            $slick.slick({
                infinite: false,
                prevArrow: "<button type=\"button\" class=\"slick-prev slick-arrow slick-disabled\" role=\"button\"></button>",
                nextArrow: "<button type=\"button\" class=\"slick-next slick-arrow slick-disabled\" role=\"button\"></button>",
                slidesPerRow: 6,
                slidesToShow: 6,
                slidesToScroll: 6,
                responsive: [
                    {
                        breakpoint: 1340,
                        settings: {
                            slidesPerRow: 4,
                            slidesToShow: 4,
                            slidesToScroll: 4
                        }
                    },
                    {
                        breakpoint: 990,
                        settings: {
                            slidesPerRow: 3,
                            slidesToShow: 3,
                            slidesToScroll: 3
                        }
                    },
                    {
                        breakpoint: 640,
                        settings: {
                            slidesPerRow: 2,
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    }
                ]
            });
        });
    }
    // Live search autocomplete
    $(".header-container").on("click", ".search-toggle", function(){
        $(this).toggleClass("toggle-on");
    });
    $(".header-container").on("mouseenter", ".searchbar", function(){
        $(this).addClass("over");
    }).on("mouseleave", ".searchbar", function(){
        $(this).removeClass("over");
    });
    $("body").on("click", ".searchbar", function(e){
        e.stopPropagation();
    }).on("click", function(){
        var sb = $(".searchbar"),
            ls = $(".live-search"),
            st = $(".search-toggle");
        if (ls.length && !sb.hasClass("over")) {
            ls.remove();
        }
    });
    $('#qSearchText').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: $('#searchForm').attr("action"),
                type: 'GET',
                dataType: 'json',
                data: {
                    stext: request.term
                }, 
                success: function(json) {
                    $(".live-search").remove();
                    $("#searchForm").removeClass("loading");
                    if (json.output) $('#searchForm').closest(".searchbar").append(json.output);
                },
                beforeSend: function(){
                    $('#searchForm').addClass("loading");
                }
            });
        },
        minLength: 3
    });
});

function LazyLoadImages(){
    $("img.lazy").lazyload({
        skip_invisible : false,
        event: "load"
    });
}

function setZoom(el, eq) {
    eq = parseInt(eq)||2;
    $(el).zoom({
        magnify: eq,
        touch: true,
        url: $(el).data("original")
    });
}

function unSetZoom(el) {
    $(el).trigger('zoom.destroy');
}

// Equal height for div's in roduct grid
function equalGrid () {
    var Grid = $(".product-grid").find(".product-item, .load-more");
    if (Grid.length) {
        equalheight(Grid);
    }
}
function equalheight (container) {
    var currentTallest = 0,
        currentRowStart = 0,
        rowDivs = new Array(),
        $el,
        topPosition = 0;
    $(container).each(function() {
        $el = $(this);
        $($el).height('auto')
        topPostion = $el.position().top;
        if (currentRowStart != topPostion) {
            for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }
            rowDivs.length = 0; // empty the array
            currentRowStart = topPostion;
            currentTallest = $el.height();
            rowDivs.push($el);
        } else {
            rowDivs.push($el);
            currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
        }
        for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
            rowDivs[currentDiv].height(currentTallest);
        }
    });
}

function CModal() {
    var Modal = {
        opened: false,
        instance: null,
        construct: function() {
            var self = this;
            self.instance = $('#modalDialog').remodal();
        },
        open: function(url) {
            var self = this;
            $.ajax({
                url: url,
                dataType: "json",
                complete: function (response) {
                    if (response.status==200) {
                        var json = response.responseJSON;
                        if (json.output) {
                            $("#modalDialog").children(".remodal-content").html(json.output);
                            self.instance.open();
                            self.opened = true;
                        }
                    }
                },
                beforeSend: function () {
                    self.beforeOpen();
                }
            }); return false;
        },
        close: function() {
            var self = this;
            self.instance.close();
            self.opened = false;
            return false;
        },
        beforeOpen: function() {
            Basket.close();
            Basket.closeDialog();
        }
    };
    this.init = function() {
        return Modal;
    }
};

function CBasket() {
    var Basket = {
        body: null,
        items: new Array(),
        opened: false,
        dialogOpened: false,
        dialog: null,
        slidebar: null,
        basket_url: null,
        minicart: 'minicart', // Minicart widget ID
        basket: 'basketLayout', // Basket module layout ID
        minibasket: 'minibasket', // Checkout module layout ID
        construct: function () {
            var self = this;
            self.slidebar = new slidebars();
            self.slidebar.init();
            self.body = $("#sbIndex");
            self.dialog = $('#basketDialog').remodal();
            $(document).on('closed', '#basketDialog', function (e) {
                self.closeDialog();
                console.log('Modal is closed' + (e.reason ? ', reason: ' + e.reason : ''));
            });
            $(window).bind("keypress", function (e) {
                console.log(e.which);
                if (e.which == 27 && self.opened) self.close();
            });
        },
        setUrl: function (basket_url) {
            var self = this;
            self.basket_url = basket_url;
        },
        add: function(ID, QTY, SetNewQty) {
            var self = this;
            ID = !empty(ID)? ID :false;
            QTY = parseInt(QTY)||1;
            SetNewQty = SetNewQty||0;
            if (typeof SetNewQty == 'undefined') SetNewQty = 0;
            if (ID) {
                $.ajax({
                    url: self.basket_url,
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        action: 'add',
                        itemID: ID,
                        qty: QTY,
                        setNewQty: SetNewQty
                    },
                    complete: function (response) {
                        if (response.status=="200") {
                            if (!self.opened) self.open();
                            self.update();
                        }
                    }
                });
            }
        },
        remove: function(ID){
            var self = this;
            ID = !empty(ID)? ID: false;
            if (ID) {
                $.ajax({
                    url: self.basket_url,
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        action: 'remove',
                        itemID: ID
                    },
                    complete: function (response) {
                        if (response.status=="200") self.update();
                    }
                });
            }
        },
        update: function(){
            var self = this;
            $.ajax({
                url: self.basket_url,
                type: 'GET',
                dataType: 'json',
                data: {
                    action: 'update'
                }, 
                complete: function (response) {
                    if (response.status=="200") {
                        var json = response.responseJSON;
                        if (json.output) {
                            if (!empty(json.output.basket) && !empty($('#'+self.basket))) {
                                $(document).find('#'+self.basket).html(json.output.basket);
                                $(window.parent.document).find('#'+self.basket).html(json.output.basket);
                            }
                            if (!empty(json.output.minicart) && !empty($('#'+self.minicart))) {
                                $(document).find('#'+self.minicart).replaceWith(json.output.minicart);
                                $(window.parent.document).find('#'+self.minicart).replaceWith(json.output.minicart);
                            }
                            if (!empty(json.output.minibasket) && !empty($('#'+self.minibasket))) {
                                $(document).find('#'+self.minibasket).html(json.output.minibasket);
                                $(window.parent.document).find('#'+self.minibasket).html(json.output.minibasket);
                            }
                            if (!empty(json.output.isEmpty) && !empty($("#"+self.basket))) {
                                var slider = $("#"+self.basket).find(".watched-slider");
                                if (!empty(slider)) {
                                    slider.swiper({
                                        slidesPerView: "auto",
                                        freeMode: true,
                                        spaceBetween: 24,
                                        scrollbar: slider.find(".swiper-scrollbar"),
                                        scrollbarHide: true,
                                        scrollbarDraggable: true,
                                        nextButton: slider.find(".swiper-button-next"),
                                        prevButton: slider.find(".swiper-button-prev"),
                                    });
                                }
                            }
                        }
                        if (json.output.items) self.updateItems(json.output.items);
                        self.updateButtons();
                    }
                }
            });
        },
        clear: function(){
            var self = this;
            $.ajax({
                url: self.basket_url,
                type: 'GET',
                dataType: 'json',
                data: {
                    action: 'clear'
                }, 
                complete: function (response) {
                    if (response.status=="200") self.update();
                }
            });
        },
        open: function () {
            var self = this;
            self.closeDialog();
            if (!self.opened) {
                self.slidebar.toggle("drop-basket");
                self.body.addClass("shift");
                $("html,body").addClass("noscroll");
                self.opened = true;
            }
        },
        close: function () {
            var self = this;
            if (self.opened) {
                self.slidebar.toggle("drop-basket");
                $("html,body").removeClass("noscroll");
                self.body.removeClass("shift");
                self.opened = false;
            }
            // close mobile filters if needed
            if (typeof MobileFilters != "undefined") MobileFilters.close();
        },
        openDialog: function (url) {
            var self = this;
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                data: {
                    action: "basketDialog"
                },
                complete: function (response) {
                    if (response.status==200) {
                        var json = response.responseJSON;
                        if (json.output) {
                            $("#basketDialog").children(".remodal-content").html(json.output);
                            self.dialog.open();
                            self.dialogOpened = true;
                            setTimeout(function(){
                                var screen = $("#basketDialog").find(".product-image .screen a");
                                setZoom(screen, 1);
                            }, 100);
                        }
                    }
                },
                beforeSend: function () {
                    self.close();
                    self.closeDialog();
                }
            });
        },
        closeDialog: function () {
            var self = this;
            $("#basketDialog").children(".remodal-content").html("");
            self.dialog.close();
            self.dialogOpened = false;
        },
        updateItems: function (items) {
            var self = this;
            self.items = new Array();
            for (var idKey in items) self.items.push(idKey);
        },
        updateButtons: function () {
            var self = this,
                buttons = $(".product-flypage .add-to-cart");
            $.map(buttons, function(button, i){
                var key     = $(button).data("key"),
                    url     = $(button).data("url"),
                    in_cart = in_array(key, self.items),
                    onclick;
                if (in_cart) $(button).addClass("in-cart");
                else $(button).removeClass("in-cart");
                if (in_cart) {
                    onclick = "Basket.open();";
                } else {
                    onclick = "Basket.add('"+key+"', 1, 0);";
                }
                $(button).attr("onclick", onclick);
            });
        },
        changeOptions: function (ID, item, list) {
            var optionsInputs = $(item).find("*[id^='options_" + ID + "']"),
                idKey = ID;
            if (optionsInputs.length) {
                idKey += "|";
                $.each(optionsInputs, function (i, input) {
                    if (input.type=="radio" && !input.checked) return;
                    var optionID = $(input).data("optionid"),
                        similar  = $(item).find("input[data-optionid='" + optionID + "']"),
                        arValues = new Array();
                    if (similar.length) {
                        $.each(similar, function (j, cb) {
                            if (cb.checked) arValues.push(cb.value);
                        });
                    } else {
                        arValues.push(input.value);
                    }
                    idKey += $(input).data("optionid") + "=" + implode(",", arValues) + "/";
                });
            }
            $.ajax({
                url: '/interactive/ajax.php',
                type: 'GET',
                dataType: 'json',
                data: {
                    zone: 'site',
                    action: 'AjaxChangeProductOptions',
                    idKey: idKey,
                    list: list
                },
                success: function (json) {
                    if (json.button) {
                        $(item).find(".buttons").replaceWith(json.button);
                    }
                    if (json.price) {
                        $(item).find(".price").replaceWith(json.price);
                    }
                }
            });
            return false;
        }
    };
    this.init = function () {
        return Basket;
    };
}

function empty(mixed_var) {
    return (mixed_var==="" || mixed_var===0 || mixed_var==="0" || mixed_var===null || mixed_var===false || mixed_var==='undefined' || typeof(mixed_var)==='undefined' || (is_array(mixed_var) && mixed_var.length===0));
}

function isset(e,tt,tt1){
    var t = new Array(),
        type = typeof e;;
    if (typeof tt != 'undefined') t[t.length] = tt;
    if (typeof tt1 != 'undefined') t[t.length] = tt1;
    if (type != 'undefined' && e != null){
        if (t.length>0){
            for (var j=0;j<t.length;j++){
                if (e.length<=0 && ((type == 'string' && t[j] == 'string') || (type == 'object' && t[j] == 'array'))) {
                    return false;
                }
            }
        }
        return true;
    } else {
        return false;
    }
    return 0;
}

function is_array(mixed_var) {
    return (mixed_var instanceof Array);
}

function in_array(needle, haystack, strict) {
    var found = false, key, strict = !!strict;
    if (haystack.constructor === Object) {
        for (key in haystack) {
            if ((strict && haystack[key]===needle) || (!strict && haystack[key]==needle)) {
                found = true;
                break;
            }
        }
    } else if (haystack.constructor === Array) {
        for (var key = 0; key < haystack.length; key++) {
            if ((strict && haystack[key]===needle) || (!strict && haystack[key]==needle)) {
                found = true;
                break;
            }
        }
    }
    return found;
}

function implode(glue, pieces) {
    return ((pieces instanceof Array) ? pieces.join(glue) : pieces);
}

function array_key_exists ( key, search ) {
    if (!search || (search.constructor !== Array && search.constructor !== Object) ){
        return false;
    }
    return search[key] !== undefined;
}

function number_format(number, decimals, dec_point, thousands_sep) {
    var i, j, kw, kd, km;
    // input sanitation & defaults
    if(isNaN(decimals = Math.abs(decimals)) ){
        decimals = 2;
    }
    if( dec_point == undefined ){
        dec_point = ",";
    }
    if( thousands_sep == undefined ){
        thousands_sep = ".";
    }
    i = parseInt(number = (+number || 0).toFixed(decimals)) + "";
    if ((j = i.length) > 3 ){
        j = j % 3;
    } else{
        j = 0;
    }
    km = (j ? i.substr(0, j) + thousands_sep : "");
    kw = i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands_sep);
    kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).replace(/-/, 0).slice(2) : "")
    return km + kw + kd;
}

var Base64 = {
    // private property
    _keyStr : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
    // public method for encoding
    encode : function (input) {
        var output = "";
        var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
        var i = 0;
        input = Base64._utf8_encode(input);
        while (i < input.length) {
            chr1 = input.charCodeAt(i++);
            chr2 = input.charCodeAt(i++);
            chr3 = input.charCodeAt(i++);
            enc1 = chr1 >> 2;
            enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
            enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
            enc4 = chr3 & 63;
            if (isNaN(chr2)) {enc3 = enc4 = 64;
            } else if (isNaN(chr3)) {enc4 = 64;}
            output = output +
            this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) +
            this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);
        }return output;
    },
    // public method for decoding
    decode : function (input) {
        var output = "";
        var chr1, chr2, chr3;
        var enc1, enc2, enc3, enc4;
        var i = 0;
        input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");
        while (i < input.length) {
            enc1 = this._keyStr.indexOf(input.charAt(i++));
            enc2 = this._keyStr.indexOf(input.charAt(i++));
            enc3 = this._keyStr.indexOf(input.charAt(i++));
            enc4 = this._keyStr.indexOf(input.charAt(i++));
            chr1 = (enc1 << 2) | (enc2 >> 4);
            chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
            chr3 = ((enc3 & 3) << 6) | enc4;
            output = output + String.fromCharCode(chr1);
            if (enc3 != 64) {output = output + String.fromCharCode(chr2);}
            if (enc4 != 64) {output = output + String.fromCharCode(chr3);}
        }
        output = Base64._utf8_decode(output);
        return output;
    },
    // private method for UTF-8 encoding
    _utf8_encode : function (string) {
        string = string.replace(/\r\n/g,"\n");
        var utftext = "";
        for (var n = 0; n < string.length; n++) {
            var c = string.charCodeAt(n);
            if (c < 128) {utftext += String.fromCharCode(c);}
            else if((c > 127) && (c < 2048)) {
                utftext += String.fromCharCode((c >> 6) | 192);
                utftext += String.fromCharCode((c & 63) | 128);
            } else {
                utftext += String.fromCharCode((c >> 12) | 224);
                utftext += String.fromCharCode(((c >> 6) & 63) | 128);
                utftext += String.fromCharCode((c & 63) | 128);
            }
        }return utftext;
    },
    // private method for UTF-8 decoding
    _utf8_decode : function (utftext) {
        var string = "";
        var i = 0;
        var c = c1 = c2 = 0;
        while ( i < utftext.length ) {
            c = utftext.charCodeAt(i);
            if (c < 128) {
                string += String.fromCharCode(c);
                i++;
            } else if((c > 191) && (c < 224)) {
                c2 = utftext.charCodeAt(i+1);
                string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
                i += 2;
            } else {
                c2 = utftext.charCodeAt(i+1);
                c3 = utftext.charCodeAt(i+2);
                string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
                i += 3;
            }
        }return string;
    }
}