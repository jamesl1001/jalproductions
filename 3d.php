<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
    <?php include('includes/head.php'); ?>
</head>
<body class="<?php include('includes/bodyclass.php'); ?>">
    <?php include('includes/header.php'); ?>

    <div id="viewport">
        <div id="page">
            <h2>3D</h2>

            <div class="col col-p">
                <div class="feature">
                    <h3>Youtube Playlist</h3>
                    <a href="http://www.youtube.com/playlist?list=PLE40E1A4499EEBB5D" target="_blank" data-embed="http://www.youtube.com/embed/videoseries?list=PLE40E1A4499EEBB5D&amp;autoplay=0" class="button icon_after icon_after-play youtube_embed">Youtube playlist</a>
                </div>
            </div>

            <div class="col col-s">
                <h3>Stills</h3>
                <div class="imagebox_wrapper">
                    <?php
                        include 'includes/getDeviations.php';
                        $_SESSION['loaded-threed'] = (isset($_SESSION['loaded-threed'])) ? $_SESSION['loaded-threed'] : 16;
                        $html = getDeviations('http://backend.deviantart.com/rss.xml?q=gallery:fu51on/27123361', $_SESSION['loaded-threed']);
                        echo $html;
                    ?>
                </div>
                
                <div class="button" id="load_more" data-page="threed">load more <noscript>(requires Javascript)</noscript></div>
            </div>

            <?php include('includes/imageviewer.php'); ?>
        </div>

        <?php include('includes/menu.php'); ?>
    </div>

    <?php include('includes/scripts.php'); ?>
</body>
</html>