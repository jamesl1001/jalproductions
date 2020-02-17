<div class="centre">
    <span id="jalproductions">JaL Productions</span>
    <p class="center_italic">Multimedia Technology and Design Portfolio</p>

    <div class="button_wrapper">
        <a href="3d"><div class="button seventh icon_after icon_after-3d">3D</div></a>
        <a href="artdesign"><div class="button seventh icon_after icon_after-artdesign">Art &amp; Design</div></a>
        <a href="flash"><div class="button seventh icon_after icon_after-flash">Flash</div></a>
        <a href="music"><div class="button seventh icon_after icon_after-music">Music</div></a>
        <a href="photography"><div class="button seventh icon_after icon_after-photography">Photography</div></a>
        <a href="programming"><div class="button seventh icon_after icon_after-programming">Programming</div></a>
        <a href="web"><div class="button seventh icon_after icon_after-web">Web</div></a>
    </div>

    <div class="feature">
        <a href="https://www.youtube.com/watch?v=iQtAZdkXWVU" target="_blank" data-embed="https://www.youtube.com/embed/iQtAZdkXWVU?color=white&amp;modestbranding=1&amp;rel=0" id="youtube_embed"><img src="https://img.youtube.com/vi/iQtAZdkXWVU/maxresdefault.jpg" alt="Snail Caravan &mdash; 3D Animation"/></a>
    </div>

    <div class="new_site_banner"><a href="https://jamesalexanderlee.co.uk"><img src="https://jamesalexanderlee.co.uk/img/old-site-banner.png"/></a></div>

    <style>
        .new_site_banner {
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,.85);
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .new_site_banner img {
            width: 100%;
            max-width: 1200px;
            outline: 1px solid #fff;
        }

        .new_site_banner::before {
            content: '';
            width: 40px;
            height: 40px;
            background-image: url(img/header_sprites-x2.png);
            background-repeat: no-repeat;
            background-position: center -320px;
            position: fixed;
            top: 80px;
            cursor: pointer;
        }
    </style>

    <script>
        var banner = document.querySelector('.new_site_banner');

        banner.addEventListener('click', function(e) {
            if(e.target.tagName !== 'IMG') {
                banner.style.display = 'none';
            }
        });
    </script>
</div>