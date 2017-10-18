/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var objHomeSlider = new CHomeSlider(),
    HomeSlider = objHomeSlider.init();
    
$(window).on("load", function(){
    HomeSlider.setup();
});

function CHomeSlider(){
    var HomeSlider = {
        slider: null,
        isMobile: false,
        mobileWidth: 990,
        setup: function(){
            var self = this;
            self.construct();
            $(window).on("resize orientationchange", function(e){
                self.checkViewport();
                
            });
        },
        construct: function(){
            var self = this;
            self.slider = $(".banner-container").children(".container");
            self.checkViewport();
        },
        initSlider: function(){
            var self = this;
            if (self.isMobile) {
                $(self.slider).slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    speed: 300,
                    autoplay: false,
                    autoplaySpeed: 5000,
                    dots: false,
                    infinite: false,
                    adaptiveHeight: true,
                    arrows: false,
                });
            } else $(self.slider).slick('unslick');
        },
        checkViewport: function(){
            var self = this,
                w = verge.viewportW();
            if (w <= self.mobileWidth) self.isMobile = true;
            else self.isMobile = false;
            self.initSlider();
        }
    };
    this.init = function(){
        return HomeSlider;
    }
}