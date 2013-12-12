/*===EVENT HANDLERS===*/
$(document).ready(function() {
    $('body').addClass('js');
    $menu = $('#menu');
    $view = $('#viewport');
    device = '';
});

$(window).load(function() {
    getDeviceType();
    enhanceYoutube();
});

$(window).resize($.debounce(250, debounce));

function debounce() {
    if($('body').hasClass('menu-open')) {
        resizeMenu();
    };
};

$('#menu_btn, #open_menu').click(function(e) {
    e.preventDefault();
    $('body').toggleClass('menu-open');

    if($('body').hasClass('menu-open')) {
        // open
        $menu.animate({'left':0}, function() {
            resizeMenu();
        });
    } else {
        // close
        closeMenu();
    }
});

function resizeMenu() {
    $menu.css({'bottom':''});
    menuH = $menu.height();
    $menu.css({'bottom':0});
    $view.height(menuH);
};

function closeMenu() {
    $menu.animate({'left':'100%'}, 300, function() {
        $view.height('');
    });
};

$("#menu").swipe({
    swipeRight:function(event, distance, duration, fingerCount) {
        $('body').toggleClass('menu-open');
        closeMenu();
    }
});

/*===IMAGEVIEWER===*/
$('.imagebox img').live('click', function(e) {
    e.preventDefault();
    $('.iv').addClass('iv-show');
    $('.iv-image-wrapper img').attr('src', $(this).parent()[0].href);
});

$('.iv-image-wrapper').click(function(e) {
    if(e.target.tagName != 'IMG') {
        closeIV();
    }
});

$(document).keyup(function(e) {
    if (e.keyCode == 27) {
        closeIV();
    }
});

function closeIV() {
    $('.iv').removeClass('iv-show');
}

$('#load_more').click(function(e) {
    nBefore = $('.imagebox').size();
    append($(this).data('page'));
});

/*===APPEND===*/
var appending = false;
var start     = 16;

function append(page) {
    if(appending == false) {
        appending = true;
        $('#load_more').addClass('loading');
        $.ajax({
            type: "GET",
            url: "includes/loadMore.php",
            data: {start: start, page: page},
            dataType: 'html',
            success: function(data) {
                appending = false;
                start += 8;
                $('.imagebox_wrapper').append(data);
                $('#load_more').removeClass('loading');
                if($(data).find('.imagebox').prevObject.length < 8) {
                    $('#load_more').hide();
                }
            },
            error: function() {
                $('#load_more').removeClass('loading');
                alert("A problem has a occurred. Please try again.");
            }
        });
    }
};

/*===FUNCTIONS===*/
function getDeviceType() {
    var w = $(window).width();
    if(w < 480) {
        device = 'mobile';
    } else if(w >= 480 && w < 720) {
        device = 'tablet';
    } else {
        device = 'desktop';
    }
};

function enhanceYoutube() {
    if(device == 'desktop') {
        var $yt   = $('.youtube_embed');
        var embed = $yt.data('embed');
        $yt.replaceWith('<div class="youtube_wrapper"><iframe class="youtube_embed" src="' + embed + '" frameborder="0" allowfullscreen></iframe></div>');
    }
}