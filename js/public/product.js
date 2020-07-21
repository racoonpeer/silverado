/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var objComments = new CComments(),
    Comments = objComments.init(),
    ObjShare = new CShare(),
    Share = ObjShare.init(),
    objProductSet = new CProductSet(),
    ProductSet = objProductSet.init();

$(function(){
    // Init comments
    Comments.construct();
    // Init product sets
    ProductSet.initialize();
    // Product flypage gallery
    var Gallery = $(".product-image"),
        Thumbs  = Gallery.children(".thumbs").find("a"),
        Screen  = Gallery.children(".screen");
    Screen.slick({
        infinite: false,
        slidesPerRow: 1,
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: true,
        lazyLoad: "progressive"
    });
    Screen.on('afterChange', function(event, slick, currentSlide){
        Thumbs.eq(currentSlide).closest("li").siblings("li").removeClass("selected");
        Thumbs.eq(currentSlide).closest("li").addClass("selected");
        $.map(slick.$slides, function(slide, i){
            if (i==currentSlide) setZoom(slide, 1);
            else unSetZoom(slide);
        });
    }).on("contextmenu", function(e){
        e.preventDefault();
        return false;
    });
    Thumbs.on("click", function(e){
        var self = $(this),
            index = self.data("index");
        Screen.slick("slickGoTo", index);
    });
    setZoom(Screen.find(".slick-current.slick-active"), 1);
});

function CProductSet(){
    var ProductSet = {
        wrapper: null,
        items: null,
        construct: function(){
            var self = this;
            self.wrapper = $(".product-set .product-set-blocks");
            self.items = self.wrapper.children(".product-set-block");
        },
        initialize: function(){
            var self = this;
            self.construct();
            self.wrapper.slick({
                dots: false,
                infinite: false,
                slidesToShow: 1,
                draggable: false,
                swipe: false,
                touchMove: false,
                adaptiveHeight: true,
                responsive: [
                    {
                        breakpoint: 900,
                        settings: {
                            arrows: false,
                            dots: true,
                            draggable: true,
                            swipe: true,
                            touchMove: true,
                        }
                    }
                ]
            });
            $(window).bind("resize orientationchange", function(){
                setTimeout(function(){
                    self.wrapper.slick("resize");
                }, 100);
            });
            $.map(self.items, function(item){
                var slider = $(item).find(".swiper-container"),
                    instance = slider.swiper({
                        direction: 'horizontal',
                        spaceBetween: 0,
                        slidesPerView: 3,
                        scrollbar: $(item).find(".swiper-scrollbar"),
                        scrollbarHide: true,
                        scrollbarDraggable: true,
                        slideToClickedSlide: false,
                        nextButton: $(item).find(".swiper-button-next"),
                        prevButton: $(item).find(".swiper-button-prev"),
                        breakpoints: {
                            1280: {
                                slidesPerView: 2,
                            }
                        }
                    });
                $(window).bind("resize orientationchange", function(){
                    setTimeout(function(){
                        instance.onResize();
                    }, 100);
                });
            });
        }
    };
    this.init = function(){
        return ProductSet;
    };
};

function CComments () {
    var Comments = {
        open : false,
        form : null,
        list : null,
        reply: function (id, name) {
            id = parseInt(id)||0;
            var self = this;
            if (id > 0) {
                self.reset();
                if (!self.open) self.openForm();
                $(self.form).find('input[name="cid"]').val(id);
                $(self.form).find('textarea').focus().val(name+", ");
            }
            return false;
        },
        construct: function () {
            var self = this;
            self.form = $(document.getElementById("commentForm"));
            self.list = $(document.getElementById("commentList"));
            self.form.ajaxForm({
                url: window.location.href,
                dataType: "json",
                success: function (json) {
                    if (json.output) {
                        self.form.replaceWith(json.output);
                        setTimeout(function(){
                            self.construct();
                        }, 100);
                    }
                }
            });
        },
        toggleForm: function () {
            var self = this,
                div  = $(".comment-form"),
                btn  = $(".form-toggle");
            div.toggleClass("hidden");
            btn.toggleClass("hidden");
            if (div.hasClass("hidden")) self.reset();
            self.open = btn.hasClass("hidden");
            return false;
        },
        openForm: function () {
            var self = this,
                div  = $(".comment-form"),
                btn  = $(".form-toggle");
            div.removeClass("hidden");
            btn.addClass("hidden");
            self.open = true;
            return false;
        },
        reset: function () {
            var self = this;
            self.form.trigger("reset");
        },
        load: function(url) {
            var self = this;
            $.ajax({
                url: url,
                dataType: "json",
                async: false,
                timeout: 5000,
                beforeSend: function () {
                    self.list.addClass("load");
                },
                success: function (json) {
                    if (json.output) {
                        setTimeout(function(){
                            self.list.removeClass("load").html(json.output);
                        }, 500);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    self.list.removeClass("load");
                    console.log(error + ": " + errorThrown);
                }
            });
            return false;
        }
    };
    this.init = function () {
        return Comments;
    };
}