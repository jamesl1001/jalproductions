<!DOCTYPE HTML>
<html>
<head>
    <?php include('includes/head.php'); ?>
</head>
<body class="<?php include('includes/bodyclass.php'); ?>">
    <?php include('includes/header.php'); ?>

    <div id="viewport">
        <div id="page">
            <h2>Art &amp; Design</h2>

            <div class="col col-p">
                <div class="feature">
                    <h3>Feature: <span>Triforce Eagle</span></h3>
                    <img src="http://th05.deviantart.net/fs70/PRE/f/2012/013/8/6/863848d2a94808986e7521af2e9bbab5-d4m6md6.jpg" alt="Triforce Eagle"/>
                </div>
            </div>

            <div class="col col-s">
                <h3>More</h3>
                <div class="imagebox_wrapper">
                    <?php
                        include 'includes/getDeviations.php';
                        $html = getDeviations('http://backend.deviantart.com/rss.xml?q=gallery:fu51on/27123352', 16);
                        echo $html;
                    ?>
                </div>
            
                <!-- <div class="button" id="load_more" data-page="artdesign">load more <noscript>(requires Javascript)</noscript></div> -->
            </div>

            <?php include('includes/imageviewer.php'); ?>
        </div>

        <?php include('includes/menu.php'); ?>
    </div>

    <?php include('includes/scripts.php'); ?>
</body>
</html>