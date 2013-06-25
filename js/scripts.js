/*===EVENT HANDLERS===*/

$(document).ready(function() {
    $('body').addClass('js');
    $menu = $('#menu');
    $view = $('#viewport');
    device = '';
    imgsloaded = 0;
});

$(window).load(function() {
    alignThumbnails();
    getDeviceType();
    enhanceYoutube();
});

$(window).resize($.debounce(250, debounce));

function debounce() {
    if($('body').hasClass('menu-open')) {
        resizeMenu();
    };
    alignThumbnails();
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
        alignThumbnails();
    });
};

$("#menu").swipe({
    swipeRight:function(event, distance, duration, fingerCount) {
        $('body').toggleClass('menu-open');
        closeMenu();
    }
});

/* Display the clicked image, hide the rest */
/*$('.image img').click(function(e) {
    e.preventDefault();
    var imageSrc = $(this).parent()[0].href;
    $('.imagebox_wrapper .image').hide();
    $('.imagebox_wrapper').append('<div class="imagebox_open"><img src="' + imageSrc + '"/><p>Click to close</p></div>');

    $('.imagebox_open').click(function() {
        $(this).remove();
        $('.imagebox_wrapper .image').show();
        alignThumbnails();
    });
});*/

/* Scale the imagebox to full width, still floated */
$('.image img').live('click', function(e) {
    e.preventDefault();
    if($(this).hasClass('view')) {
        $(this).removeClass('view');
        $(this).parent().parent().css({'width':'', 'padding-bottom':''});
        alignThumbnails();
    } else {
        $(this).addClass('view');
        var imageSrc = $(this).parent()[0].href;
        var imageW   = $(this).width();
        var imageH   = $(this).height();
        var ratio    = imageH / imageW;
        $(this).attr('src', imageSrc).css({'margin':''});
        $(this).parent().parent().css({'width':'100%', 'padding-bottom':100*ratio+'%'});
    }
});

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

function imgloaded() {
    imgsloaded++;
    var n = $('.imagebox').size() - nBefore;
    // *2 because: http://stackoverflow.com/questions/10816053/jquery-img-added-through-append-triggers-onload-twice
    if(imgsloaded == n*2) {
        alignThumbnails();
        imgsloaded = 0;
    }
}

/*===FUNCTIONS===*/
function alignThumbnails() {
    $('.imagebox').each(function() {
        var container = $(this).width();
        $image        = $('img', this);
        var imageW    = $image.width();
        var imageH    = $image.height();
        if($image.hasClass('portrait')) {
            $image.css({'margin-top': (container - imageH)/2});
        } else {
            $image.css({'margin-left': (container - imageW)/2});
        }
    });
};

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

/*function getWindowWidth() {
    return $(window).width();
};*/