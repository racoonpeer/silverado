/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var objFilters = new CFilters(),
    Filters = objFilters.init(),
    MobileFilters = objFilters.init_mobile();

$(function(){
    Filters.setup();
    MobileFilters.setup();
    initUpdatePage(100);
});

function initFilterEvents(selector) {
    $(selector).on('click', '.filter-element:not(.disabled)', function(e){
        e.preventDefault();
        var url = $(this).attr('href')||$(this).data('href');
        forceUpdatePage(url);
    });
}

function initUpdatePage(timeout) {
    if (typeof jQuery != "undefined" && typeof window.History != "undefined") {
        $(window).on("statechange", function() {
            AjaxUpdatePage(window.location.href);
        });
    } else {
        setTimeout(function() {
            initUpdatePage(timeout);
        }, timeout);
    }
}

function AjaxUpdatePage(url) {
    var Filters = $('#filtersForm'),
        FiltersPopup = $('#filtersFormPopup'),
        Selected = $("#selected_filters"),
        Products = $("#products"),
        CFilter = $("#control_filter"),
        Limit = $("#control_limit"),
        Sort = $("#control_sort"),
        HTitle = $(".heading-title"),
        SText = $(".seo-text"),
        STitle = document.getElementsByTagName("title")[0],
        MDescr = document.getElementsByName("description")[0],
        MKey = document.getElementsByName("keywords")[0];
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: {
            ajaxUpdate: 1
        },
        beforeSend: function() {
            Filters.addClass('load');
            var items = Products.children(".product-item");
            if (items.length) {
                animateProducts(items);
            }
        },
        success: function(json) {
            if (json) {
                if (json.filters) Filters.html(json.filters);
                if (json.filters_popup) FiltersPopup.html(json.filters_popup);
                if (typeof json.selected_filters != "undefined") Selected.html(json.selected_filters);
                if (json.products) Products.html(json.products);
                if (json.control_sort) Sort.replaceWith(json.control_sort);
                if (json.control_limit) Limit.replaceWith(json.control_limit);
                if (json.control_filter) CFilter.replaceWith(json.control_filter);
                if (json.seo_title) {
                    STitle.innerHtml = json.seo_title;
                    document.title = json.seo_title;
                }
                if (json.meta_descr) {
                    $(MDescr).attr("content", json.meta_descr);
                }
                if (json.meta_key) {
                    $(MKey).attr("content", json.meta_key);
                }
                var metaRobots = $('#meta_robots');
                if (json.meta_robots) {
                    var metaTag = '<meta name="robots" content="' + json.meta_robots + '" id="meta_robots"/>';
                    if (metaRobots.length) {
                        $(metaRobots).replaceWith(metaTag);
                    } else {
                        $('head').append(metaTag);
                    }
                } else if (metaRobots) {
                    metaRobots.remove();
                }
                if (json.h_title && HTitle.length) {
                    HTitle.text(json.h_title);
                }
                if (json.bestkit_slider) {
                    $(BestKit).replaceWith(json.bestkit_slider);
                }
                Filters.removeClass('load');
                $('.scroll-top').trigger('click');
                LazyLoadImages();
            }
        }
    });
    return false;
}

function forceUpdatePage(url){
    if (History.enabled) {
        History.pushState(null, document.title, url);
    } else {
        AjaxUpdatePage(url);
    }
}

function animateProducts(items){
    $.map(items, function(item){
        var t = $(item).offset().top,
            h = 100;
        $(item).animate({
            opacity: 0,
        }, 160);
    });
}

function CFilters(){
    var Filters = {
        form: null,
        construct: function(){
            var self = this;
            self.form = $('#filtersForm');
        },
        setup: function(){
            var self = this;
            self.construct();
            // toggle filter elements
            self.form.on("click", ".more", function(e){
                e.preventDefault();
                $(this).toggleClass("expand");
                $(this).prev("ul").children(".hidable").toggleClass("hidden");
            });
            initFilterEvents(self.form);
        }
    },
    MobileFilters = {
        root: null,
        body: null,
        form: null,
        slidebar: null,
        sections: null,
        active: false,
        construct: function(){
            var self = this;
            self.form = $('#filtersFormPopup');
            self.body = $("#sbIndex");
            self.root = $("html,body");
            self.slidebar = new slidebars();
            self.slidebar.init();
        },
        setup: function(){
            var self = this;
            self.construct();
            // toggle filter elements
            self.form.on("click", ".h4", function(e){
                e.preventDefault();
                self.toggleSection($(this).closest(".section"));
            });
            initFilterEvents(self.form);
        },
        toggle: function () {
            var self = this;
            if (self.active) self.close();
            else self.open();
        },
        open: function () {
            var self = this;
            self.beforeOpen();
            self.slidebar.open("filter-popup");
            self.body.addClass("shift").addClass("overlay");
            self.root.addClass("noscroll");
            self.active = true;
        },
        beforeOpen: function () {
            var self = this;
        },
        close: function () {
            var self = this;
            $.map(self.sections, function (section) {
                self.closeSection(section);
            });
            self.slidebar.close("filter-popup");
            self.body.removeClass("shift").removeClass("overlay");
            self.root.removeClass("noscroll");
            self.active = false;
        },
        openSection: function (section) {
            var self = this;
            $(section).addClass("expanded");
        },
        closeSection: function (section) {
            var self = this;
            $(section).removeClass("expanded");
        },
        toggleSection: function (section) {
            var self = this;
            if ($(section).hasClass("expanded")) self.closeSection(section);
            else self.openSection(section);
        },
        apply: function(){
            var self = this;
            self.close();
        },
        cancel: function () {
            var self = this;
            self.close();
        }
    };
    this.init = function(){
        return Filters;
    };
    this.init_mobile = function(){
        return MobileFilters;
    };
}