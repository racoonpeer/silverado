/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function(){
    // toggle filter elements
    $("#filtersForm").on("click", ".more", function (e) {
        e.preventDefault();
        $(this).toggleClass("expand");
        $(this).prev("ul").children(".hidable").toggleClass("hidden");
    });
    initUpdatePage(100);
    initFilters('#filtersForm');
//    initFilters('#selected_filters');
});

function initFilters(selector) {
    $(selector).on('click', '.filter-element:not(.disabled)', function(e){
        e.preventDefault();
        var url = $(this).attr('href')||$(this).data('href');
        if (History.enabled) {
            History.pushState(null, document.title, url);
        } else {
            AjaxUpdatePage(url);
        }
    });
}

function initUpdatePage(timeout) {
    if (typeof jQuery != "undefined" && typeof window.History != "undefined") {
        $(window).on("statechange", function() {
            AjaxUpdatePage(window.location.href);
        });
    } else {
        setTimeout(function() {
            initUpdatePage(timeout)
        }, timeout);
    }
}

function AjaxUpdatePage(url) {
    var Filters = $('#filtersForm'),
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

function animateProducts(items){
    $.map(items, function(item){
        var t = $(item).offset().top,
            h = 100;
        $(item).animate({
            opacity: 0,
        }, 160);
    });
}