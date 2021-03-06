/*===EVENT HANDLERS===*/
$(document).ready(function() {
    $('body').addClass('js');
    if(isTouch()) {
        $('body').addClass('touch');
    }
    $menu = $('#menu');
    $view = $('#viewport');
    device = '';
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
var $iv      = $('.iv'),
    $ivImg   = $('.iv-image-wrapper img'),
    $ivLeft  = $('.iv-left'),
    $ivRight = $('.iv-right'),

    ivOpen = false,

    openImageRef,
    prevImageRef,
    nextImageRef,
    firstImageRef,
    lastImageRef,

    startX,
    startTime,
    elapsedTime,
    distX;

// EVENT HANDLERS
$('.imagebox').live('click', function(e) {
    openIV(e, $(this));
});

$ivLeft.click(function() {
    goLeft();
});

$ivRight.click(function() {
    goRight();
});

$('.iv-image-wrapper').click(function() {
    closeIV();
});

$(window).on('hashchange', function() {
    hashChange();
});

// FUNCTIONS
function getFirstLast() {
    firstImageRef = $('.imagebox:first-child');
    lastImageRef  = $('.imagebox:last-child');
}

function openIV(e, $this) {
    if($this.parent().hasClass('no-iv')) { return false; }
    if(e != null) { e.preventDefault(); }
    ivOpen = true;
    $iv.addClass('iv-show');
    $ivImg.attr('src', $this[0].href);
    openImageRef = $this;
    prevImageRef = openImageRef.prev();
    nextImageRef = openImageRef.next();
    getFirstLast();
    firstOrLast();
    $(document).on('keyup', handleKeys);
    location.hash = $this[0].childNodes[0].title.split(' ').join('_');
    $('meta[name=viewport]').attr('content', 'width=device-width, initial-scale=1, user-scalable=yes');
}

function goLeft() {
    clearImage();
    $ivImg.attr('src', prevImageRef[0].href);
    location.hash = prevImageRef[0].childNodes[0].title.split(' ').join('_');
    prevImageRef = openImageRef.prev().prev();
    nextImageRef = openImageRef;
    openImageRef = openImageRef.prev();
    firstOrLast();
}

function goRight() {
    clearImage();
    $ivImg.attr('src', nextImageRef[0].href);
    location.hash = nextImageRef[0].childNodes[0].title.split(' ').join('_');
    prevImageRef = openImageRef;
    nextImageRef = openImageRef.next().next();
    openImageRef = openImageRef.next();
    firstOrLast();
}

function clearImage() {
    $ivImg.attr('src', '');
}

function firstOrLast() {
    if(openImageRef[0] == firstImageRef[0]) {
        $iv.addClass('first');
        return 'first';
    } else if(openImageRef[0] == lastImageRef[0]) {
        $iv.addClass('last');
        return 'last';
    } else {
        resetNav();
        return null;
    }
}

function resetNav() {
    $iv.removeClass('first last');
}

function handleKeys(e) {
    if(ivOpen) {
        switch(e.keyCode) {
        case 27:
            closeIV();
            break;
        case 37:
            if(firstOrLast() != 'first') {
                goLeft();
            }
            break;
        case 39:
            if(firstOrLast() != 'last') {
                goRight();
            }
            break;
        }
    }
}

function closeIV() {
    ivOpen = false;
    $iv.removeClass('iv-show');
    resetNav();
    $(document).off('keyup', handleKeys);
    location.hash = '💩';
    $('meta[name=viewport]').attr('content', 'width=device-width, initial-scale=1, user-scalable=no');
}

function hashChange() {
    if(location.hash == '💩') {
        closeIV();
    }
}

(function openIVIfHashPresent() {
    var hashElem = $('.imagebox>img[title="' + location.hash.slice(1).split('_').join(' ') + '"]');

    if(hashElem.length > 0) {
        openIV(null, hashElem.parent());
    }
})();

/*===FUNCTIONS===*/
var w;

(function getDeviceType() {
    w = $(window).width();
    if(w < 480) {
        device = 'mobile';
    } else if(w >= 480 && w < 720) {
        device = 'tablet';
    } else {
        device = 'desktop';
    }
})();

function isTouch() {
    if(('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch) {
        return true;
    } else {
        return false;
    }
}

(function enhanceYoutube() {
    if(device == 'desktop') {
        var $yt   = $('#youtube_embed');
        var embed = $yt.data('embed');
        $yt.parent().replaceWith('<div class="youtube_wrapper youtube_wrapper--loaded"><iframe class="youtube_embed" src="' + embed + '" frameborder="0" allowfullscreen></iframe></div>');
    }
})();