$(document).ready(function () {


    // Form
    if ($('form.form-add').length) {
        $('head').append($('<link />', {
            rel: 'stylesheet',
            href: '/bundles/formadd/css/form.css',
            type: 'text/css'
        }));

        $.getScript('/bundles/formadd/js/form.js').done(function () {
            $('form.form-add').show();
        });
    }

    if ($('.form-add .error').length) {
        setTimeout(function () {
            var offset = $('.error').offset().top;
            $('html,body').animate({
                scrollTop: offset - 100
            }, 500);
        }, 300);
    }

});


$('a').on('click', function (e) {
    if ($(this).attr('href')) {
        var hash = this.hash;
        if (hash != '' && hash != 'toggle_nav') {
            e.preventDefault();
            setTimeout(function () {
                var offset = $(hash).position().top;
                $('html,body').animate({
                    scrollTop: offset
                }, 500);
            }, 300);
        }
    }
});


$('.mmenu a').on('click', function () {
    var heightplus = window.innerWidth < 1200 ? 80 : 180;
    var pagepath = window.location.pathname;
    var href = $(this).attr('href');
    var linkpath = href.substring(2, 3) == '#' ? '/' : href;
    $('.mmenu').removeClass('active');
    $('.hamburger').removeClass('is-active');
    if (pagepath === linkpath) {
        var hash = href.substring(2);
        setTimeout(function () {
            var offset = $(hash).position().top;
            $('html,body').animate({
                scrollTop: offset - heightplus
            }, 500);
        }, 300);
        return false;
    }
});


function removeHash() {
    var uri = window.location.toString();
    if (uri.indexOf("#") > 0) {
        var clean_uri = uri.substring(0, uri.indexOf("#"));
        window.history.replaceState({}, document.title, clean_uri);
    }
}

var hash = window.location.hash;
if ($(hash).length) {
    removeHash();
    var heightplus = window.innerWidth < 1200 ? 80 : 142;
    setTimeout(function () {
        var offset = $(hash).position().top;
        $('html,body').animate({
            scrollTop: offset - heightplus
        }, 500);
    }, 300);
}

$('header a.menu').on('click', function (e) {
    e.preventDefault();
    if ($('.mmenu').hasClass('active')) {
        $('.hamburger').removeClass('is-active');
        $('.mmenu').removeClass('active');
    }
    else {
        $('.hamburger').addClass('is-active');
        $('.mmenu').addClass('active');
    }
});

// Toggleboxes
$('.togglepoint').on('click', function () {
    var $$ = $(this);
    if ($$.hasClass('opened')) {
        $$.removeClass('opened').siblings('.togglecont').slideUp(500);
    }
    else {
        $('.togglepoint.opened').removeClass('opened').siblings('.togglecont').slideUp();
        $$.addClass('opened').siblings('.togglecont').slideDown(500);
    }
});

$(document).on('keyup', function (e) {
    if (e.key == "Escape" && $('.mmenu').hasClass('opened')) {
        $('header a.menu').trigger('click');
    }
});

// reload by change mobile - desktop
var ww = window.innerWidth;
var limit1 = 768;

function refresh() {
    ww <= limit1 ? (location.reload(true)) : (ww >= limit1 ? (location.reload(true)) : ww = limit1);
}
var tOut;
$(window).resize(function () {
    var resW = window.innerWidth;
    clearTimeout(tOut);
    if ((ww > limit1 && resW <= limit1) || (ww < limit1 && resW >= limit1)) {
        tOut = setTimeout(refresh, 100);
    }
});

$('body').on('click', 'span.tooltip', function () {
    $('.tooltip_content').not($(this).children('.tooltip_content')).hide();
    $(this).parent().children('.tooltip_content').toggle();
    // $(this).children('.tooltip_content').children('.tooltip_close').toggle();
});

$('body').on('click', '.tooltip_close', function () {
    $('.tooltip_content').hide();
});

$('body').on('click', '.showAllFunctions', function () {
    $('.package__functions').toggleClass('show-all');
    $('.showAllFunctions').toggleClass('active');
});
