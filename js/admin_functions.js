function openTab (url) {
    window.open(url);
};

function popUp(url) {
    var arWindowInfo = new Array();
    arWindowInfo['w'] = 640;
    arWindowInfo['h'] = 480;
    arWindowInfo['l'] = 300;
    arWindowInfo['t'] = 200;
    popUpExact(url, arWindowInfo);
};

function popUpExact(url, arWindowInfo) {
    day = new Date();
    id = day.getTime();
    eval("page" + id + " = window.open(url, '" + id + "', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=1,width="+arWindowInfo['w']+",height="+arWindowInfo['h']+",left="+arWindowInfo['l']+",top="+arWindowInfo['t']+"');");
};

function manageSelections(bt, sel1, sel2) {
    if(bt.checked){
        sel1.disabled = true;
        sel2.disabled = false;
    } else {
        sel1.disabled = false;
        sel2.disabled = true;
    }
};

function isNumber(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
};

function hideApplyBut(sel, but, parentID) {
    if(parentID != sel.value){
        but.style.display='none';
    } else if(parentID == sel.value){
        but.style.display='';
    }
};

function toggleBox(a, elementId) {
    if($('#'+elementId).css('display')=='none'){
        $('#'+elementId).css('display', '');
        $(a).removeClass( 'down' );
        $(a).addClass( 'up' );
    } else {
        $('#'+elementId).css('display', 'none');
        $(a).removeClass( 'up' );
        $(a).addClass( 'down' );
    }
};

function toggleByClass(a, elementId, classname) {
    if($('#'+elementId+' .'+classname).hasClass('hidden_block')){
        $('#'+elementId+' .'+classname).removeClass('hidden_block');
        $(a).removeClass( 'down' );
        $(a).addClass( 'up' );
    } else {
        $('#'+elementId+' .'+classname).addClass('hidden_block');
        $(a).removeClass( 'up' );
        $(a).addClass( 'down' );
    }
};

function clearInput(elementId) {
    document.getElementById(elementId).value = '';
};

function generateSeoPath(obj, str, pref) {
    var itemID = arguments[3]||0,
        seoTable = arguments[4]||"";
    $.getJSON(
        "/interactive/ajax.php",
        {
            zone    : "admin",
            action  : "generateSeoPath",
            path    : encodeURIComponent(str),
            prefix  : encodeURIComponent(pref),
            itemID  : itemID,
            seoTable: seoTable
        },
        function(data, textStatus){
            if(textStatus=='success'){
                if(data.seo_path!='') obj.value = data.seo_path;
            }
        }
    );
};

function showImg(el, url){
    $('#image').attr('src', url);
    $('#image').removeClass('hidden_block');
    $(el).mousemove(function(e) {
        $('#image').offset({
          top: e.pageY - $('#image').outerHeight(),
          left: e.pageX - $('#image').outerWidth()
        });
    }).mouseleave(function() {
        $('#image').addClass('class', 'hidden_block');
        $('#image').attr('src', '');
    });
};

function empty(mixed_var) {
    return (mixed_var==="" || mixed_var===0 || mixed_var==="0" || mixed_var===null || mixed_var===false || mixed_var==='undefined' || typeof(mixed_var)==='undefined' || (is_array(mixed_var) && mixed_var.length===0));
};

function is_array( mixed_var ) {
    return ( mixed_var instanceof Array );
};

function is_object( mixed_var ){
    if(mixed_var instanceof Array) {
        return false;
    } else {
        return (mixed_var !== null) && (typeof( mixed_var ) == 'object');
    }
};

function implode(glue, pieces) {
    return ((pieces instanceof Array) ? pieces.join(glue) : pieces);
};

function in_array(needle, haystack, strict) {
    var found = false, key, strict = !!strict;
    for (key in haystack) {
        if ((strict && haystack[key]===needle) || (!strict && haystack[key]==needle)) {
            found = true;
            break;
        }
    } return found;
};

function array_key_exists (key, search) {
    if (!search || (search.constructor !== Array && search.constructor !== Object)){
        return false;
    } return search[key] !== undefined;
};

function count( mixed_var, mode ) {
    var key, cnt = 0;
    if( mode == 'COUNT_RECURSIVE' ) mode = 1;
    if( mode != 1 ) mode = 0;
    for (key in mixed_var){
        cnt++;
        if( mode==1 && mixed_var[key] && (mixed_var[key].constructor === Array || mixed_var[key].constructor === Object) ){
            cnt += count(mixed_var[key], 1);
        }
    }
    return cnt;
};

function strpos (haystack, needle, offset) {
    var i = haystack.indexOf( needle, offset ); // returns -1
    return i >= 0 ? i : false;
};

function SelectCheckBox(cb, container){  
    if(typeof container == 'undefind')
        container = 'document';
    if($(cb).hasClass('check_all')) {
        $(".checkboxes", container).prop('checked', $(cb).prop('checked'));
    } else {
        var inputs_count = $(".checkboxes:not(.check_all)", container).length;
        var checked_inputs_count = $(".checkboxes:checked:not(.check_all)", container).length;
        if(inputs_count>0){
           $(".checkboxes.check_all", container).attr('checked', (inputs_count == checked_inputs_count) ? true : false);
        }
    }
};

function toggleHiddenFields() {
    var arItems = $('table.list').find('td.hidden');
    $(arItems).each(function(i, item){
        if($(item).is(':hidden') == false) {
            $(item).hide();
        } else {
            $(item).show();
        }
    });
};

Tabs = {
    container: '.tabsContainer',
    hash: window.location.hash,
    hashForm: false,
    __construct: function() {
        var _self = this;
        _self.hash = window.location.hash;
    },
    setUp: function() {
        var _self = this;
        _self.__construct();
        $(document).find(_self.container).each(function(c, container) {
            var controls = $(container).children('.nav').children('li').children('a'),
                tabs = $(container).children('.tabs').children('li'),
                form = $(container).closest("form");
            $(controls).bind('click', function() {
                $(controls).each(function(i, el) {
                    $(el).removeClass('active');
                });
                $(tabs).each(function(i, el) {
                    $(el).removeClass('active');
                });
                var target = $(container).children('.tabs').children('li#tab_' + $(this).data('target'));
                $(this).addClass('active');
                $(target).addClass('active');
                if ($('#currentTab').length) $('#currentTab').val($(this).data('target'));
                if (_self.hashForm) {
                    var hash = "#" + $(this).data('target'),
                        action = $(form).attr("action");
                    if (strpos(action, "#")) action = action.replace(/\#+([\w\d,A-z,À-ÿ¨¸])+?$/, hash);
                    else action += hash;
                    $(form).attr("action", action);
                }
            });
        });
        _self.hashOpenTabs();
    },
    hashOpenTabs: function() {
        var _self = this,
            controls = $(_self.container).children('.nav').children('li').children('a'),
            tabs = $(_self.container).children('.tabs').children('li'),
            form = $(_self.container).closest('form');
        _self.__construct();
        if (!empty(_self.hash)) {
            _self.hash = _self.hash.replace(/^\#+/, "");
            $.each(controls, function(i, item) {
                var target = $(item).data("target");
                if (target == _self.hash) {
                    $(item).closest("li").siblings("li").children("a").removeClass("active");
                    $(item).addClass("active");
                }
            });
            $.each(tabs, function(i, item) {
                var id = item.id,
                    hs = "tab_" + _self.hash;
                if (id == hs) {
                    $(item).siblings("li").removeClass("active");
                    $(item).addClass("active");
                }
            });
            if (_self.hashForm) {
                var hash = "#" + _self.hash,
                    action = $(form).attr("action");
                if (strpos(action, "#")) {
                    action = action.replace(/\#+([\w\d,A-z,À-ÿ¨¸])+?$/, _self.hash);
                } else {
                    action += hash;
                }
                $(form).attr("action", action);
            }
        }
    },
    hashFormInit: function() {
        this.hashForm = true;
    }
};

function MoveToSeoPath() {
    $('.tabsContainer').find('a.active').removeClass('active');
    $('.tabsContainer').find('li.active').removeClass('active');  
    $('.tabsContainer').find('#tab_seo').addClass('active');
    $('.tabsContainer').find('a[data-target="seo"]').addClass('active');
    $('#seo_path').focus();
};