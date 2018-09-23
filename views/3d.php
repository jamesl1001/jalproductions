<h2>3D</h2>

<div class="col col-p">
    <div class="feature">
        <h3>Youtube Playlist</h3>
        <div class="youtube_wrapper">
            <a href="https://www.youtube.com/playlist?list=PLE40E1A4499EEBB5D" target="_blank" data-embed="https://www.youtube.com/embed/videoseries?list=PLE40E1A4499EEBB5D" id="youtube_embed" class="button icon_after icon_after-play youtube_embed">Youtube playlist</a>
        </div>
    </div>
</div>

<div class="col col-s">
    <h3>Stills</h3>
    <div class="imagebox_wrapper">
        <?php
            include 'php/getDeviations.php';
            $html = getDeviations('https://backend.deviantart.com/rss.xml?q=gallery:fu51on/27123361');
            echo $html;
        ?>
    </div>
</div>

<?php include('includes/imageviewer.php'); ?>